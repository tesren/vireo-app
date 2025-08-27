<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Mail\NewLead;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\ConstructionUpdate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PublicPagesController extends Controller
{
    public function sendMail(Request $request){

        $validator = Validator::make( $request->all(), [
            'full_name'       => 'required|string|min:1|max:255',
            'email'      => 'required|email|string|max:255',
            'phone'      => 'required|numeric',
            'messsage'    => 'nullable|string|max:500',
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()->withInput()->with(['errors'=> $validator->errors()->all()]);
        }
        else{
            $msg = new Message();

            $msg->name = $request->input('full_name');
            $msg->email = $request->input('email');
            $msg->phone = $request->input('phone');
            $msg->method = $request->input('contact_method');
            $msg->content = $request->input('message');
            $msg->url = $request->input('url');

            $msg->save();

            //solo en landing de agendar cita
            //$contact_pref = $request->input('contact_method');
            $ap_date = $request->input('ap_date');
            $ap_time = $request->input('ap_time');

            //solo landing page de cotizador
            $unit_id = $request->input('down_unit_id');
            $plan_id = $request->input('down_plan_id');

            //para el webhook
            $type = "Contacto desde el sitio web de Virēo living";

            /* if( isset($contact_pref) ){
                $msg->ap_time = $ap_time;
                $msg->ap_date = $ap_date;
                $msg->contact_pref = $contact_pref;
                $type = 'El cliente dejó sus datos y está interesado en una cita en Virēo Living el día '.$ap_date.' a las '.$ap_time;  
            } */
            
            //solo landing page de cotizador
            if( isset($unit_id) ){

                $unit = Unit::find($unit_id);
                $plan = PaymentPlan::find($plan_id);

                $msg->unit = $unit;
                $msg->plan = $plan;

                $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                ->loadView( 'pdf.payment_plan', [
                    'unit' => $unit,
                    'plan' => $plan,
                ]);

                $type = 'El cliente descargó una cotización de la unidad '.$unit->name.' y el plan de pago '.$plan->name;  
            }

            if( app()->getLocale() == 'es' ){
                $lang = 'Español';
            }
            else{
                $lang = 'Inglés';
            }

            //Envíamos webhook
            $webhookUrl = 'https://cloud.punto401.com/webhook/7bed19ac-6acc-4233-8ca5-b6d72cdbf680';

            // Datos que deseas enviar en el cuerpo de la solicitud
            $data = [
                'name' => $msg->name,
                'email' => $msg->email,
                'phone' => $msg->phone,
                'url' => $msg->url,
                'method' => $msg->method,
                'content' => $msg->content,
                'interest' => 'Condominios',
                'development' => 'Virēo Living',
                'lang' => $lang,
                'type'  => $type,
                'created_at' => $msg->created_at,
            ];

            $n8nUser = env('N8N_AUTH_USER');
            $n8nPass = env('N8N_AUTH_PASS');
            
            // Enviar la solicitud POST al webhook
            $response = Http::withBasicAuth($n8nUser, $n8nPass)->post($webhookUrl, $data);
    

            //$email = Mail::to('info@domusvallarta.com')->bcc('ventas@punto401.com');
        
            //$email = Mail::to('erick@punto401.com');
            
            //$email->send(new NewLead($msg));

            if( isset($pdf) ){
                return $pdf->stream();
            }
            
            return redirect()->back()->with('message', 'Gracias, su mensaje ha sido enviado');
        }    
    }

    public function inventory(){

        $units = Unit::inRandomOrder()->paginate(12)->appends(request()->query());

        return view('inventory', compact('units'));
    }

    public function condos(){

        $units = Unit::whereIn('unit_type_id', [1,2,4])->orderBy('price', 'asc')->paginate(12)->appends(request()->query());

        return view('inventory', compact('units'));
    }

    public function villas(){

        $units = Unit::where('unit_type_id', 3)->orderBy('price', 'asc')->paginate(12)->appends(request()->query());

        return view('inventory', compact('units'));
    }

    public function unit($tower, $property_type, $name){

        $unit = Unit::where('tower_name', $tower)->where('name', 'like', $name)->firstOrFail();

        return view('unit', compact('unit'));
    }

    public function contact(){
        return view('contact');
    }

    public function construction(){

        $const_updates = ConstructionUpdate::orderByDesc('date')->get();

        $latest_update = ConstructionUpdate::latest()->first();

        $latest_img = $latest_update->portrait_path;

        return view('construction', compact('const_updates', 'latest_img'));
    }

    public function search(Request $request){

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $bedrooms = $request->input('bedrooms');
        $property_type = $request->input('property_type');

        if( !isset($min_price) or empty($min_price) ){
            $min_price = 0;
        }

        if( !isset($max_price) or empty($max_price) ){
            $max_price = 99999999999;
        }

        $units = Unit::where('price', '>=', $min_price)->where('price', '<=', $max_price)->where('status', '!=', 'Vendida');

        if( isset($bedrooms) and !empty($bedrooms) ){
            switch ($bedrooms) {
                case 1:
                    $type_ids = [4,8];
                    break;

                case 2:
                    $type_ids = [1,7];
                    break;

                case 3:
                    $type_ids = [2,6];
                    break;

                case 4:
                    $type_ids = [3];
                    break;
                
                default:
                    $type_ids = [1,2,3,4,6,7,8];
                    break;
            }

            $units = $units->whereIn('unit_type_id', $type_ids);
        }

        if( isset($property_type) and !empty($property_type) ){
            switch ($property_type) {
                case 'Villa':
                    $ptype_ids = [3];
                    break;

                case 'Condominio':
                    $ptype_ids = [1,2,4,6,7,8];
                    break;
                
                default:
                    $ptype_ids = [1,2,3,4];
                    break;
            }

            $units = $units->whereIn('unit_type_id', $ptype_ids);
        }

        $units = $units->orderBy('price', 'asc')->paginate(12)->appends(request()->query());

        $request->flash();

        return view('inventory', compact('units'));
    }

    public function graphicInventory(){
        $towerA_units = Unit::where('tower_name', 'A')->get();
        $towerB_units = Unit::where('tower_name', 'B')->get();
        $units = Unit::all();
        
        return view('graphic-inventory', compact('towerA_units', 'towerB_units', 'units'));
    }

    public function graphicTest(){
        $towerA_units = Unit::where('tower_name', 'A')->get();
        $towerB_units = Unit::where('tower_name', 'B')->get();
        $units = Unit::all();
        
        return view('graphic-inventory-test', compact('towerA_units', 'towerB_units', 'units'));
    }
}
