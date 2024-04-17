<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\PublicPagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::localized(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/landing', function () {
        return view('landing-page');
    })->name('landing');

    Route::get( Lang::uri('/condominios-y-villas-en-venta'), [PublicPagesController::class, 'inventory'])->name('inventory');
    Route::get( Lang::uri('/condominios-en-venta'), [PublicPagesController::class, 'condos'])->name('condos');
    Route::get( Lang::uri('/villas-en-venta'), [PublicPagesController::class, 'villas'])->name('villas');
    Route::get( Lang::uri('/propiedad-en-venta-en-el-tigre').'/{property_type}-{name}-{tower}', [PublicPagesController::class, 'unit'])->name('unit');
    Route::get( Lang::uri('/busqueda'), [PublicPagesController::class, 'search'])->name('search');
    Route::get( Lang::uri('/contacto') , [PublicPagesController::class, 'contact'])->name('contact');
    Route::get( Lang::uri('/avances-de-obra') , [PublicPagesController::class, 'construction'])->name('construction');
    Route::get( Lang::uri('/inventario-grafico') , [PublicPagesController::class, 'graphicInventory'])->name('graphic.inventory');

    Route::get( Lang::uri('/aviso-de-privacidad'), function () { return view('privacy-policy');} )->name('privacy');

});

Route::post('/send-message', [ PublicPagesController::class, 'sendMail'])->name('send.email')->middleware(ProtectAgainstSpam::class);

Route::get('/vireo-optimize', function() {
    Artisan::call('optimize');
    return ('Optimizado');
});