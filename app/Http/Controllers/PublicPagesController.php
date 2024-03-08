<?php

namespace App\Http\Controllers;

use App\Mail\NewLead;
use App\Models\Message;
use Illuminate\Http\Request;
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
            $msg->content = $request->input('message');
            $msg->url = $request->input('url');

            $msg->save();

            //solo en landing de agendar cita
            $contact_pref = $request->input('contact_method');
            $ap_date = $request->input('ap_date');
            $ap_time = $request->input('ap_time');

            //solo landing page de cotizador
            $unit_id = $request->input('down_unit_id');
            $plan_id = $request->input('down_plan_id');

            //para el webhook
            $type = "Contacto desde el sitio web de Caza Mabó";

            if( isset($contact_pref) ){
                $msg->ap_time = $ap_time;
                $msg->ap_date = $ap_date;
                $msg->contact_pref = $contact_pref;
                $type = 'El cliente dejó sus datos y está interesado en una cita en Caza Mabó el día '.$ap_date.' a las '.$ap_time;  
            }
            
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
            $webhookUrl = 'https://hooks.zapier.com/hooks/catch/4710110/3fvqx5c/';

            // Datos que deseas enviar en el cuerpo de la solicitud
            $data = [
                'name' => $msg->name,
                'email' => $msg->email,
                'phone' => $msg->phone,
                'url' => $msg->url,
                'content' => $msg->content,
                'interest' => 'Condominios',
                'development' => 'Virēo Living',
                'lang' => $lang,
                'type'  => $type,
                'created_at' => $msg->created_at,
            ];

            // Enviar la solicitud POST al webhook
            //$response = Http::post($webhookUrl, $data);


            //$email = Mail::to('info@domusvallarta.com')->bcc('ventas@punto401.com');
        
            $email = Mail::to('erick@punto401.com');
            
            $email->send(new NewLead($msg));

            if( isset($pdf) ){
                return $pdf->stream();
            }
            
            return redirect()->back()->with('message', 'Gracias, su mensaje ha sido enviado');
        }    
    }
}
