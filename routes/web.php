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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/landing', function () {
    return view('landing-page');
})->name('landing');

Route::get('/condominios-y-villas-en-venta', [PublicPagesController::class, 'inventory'])->name('inventory');
Route::get('/condominios-en-venta', [PublicPagesController::class, 'condos'])->name('condos');
Route::get('/villas-en-venta', [PublicPagesController::class, 'villas'])->name('villas');
Route::get('/propiedad-en-venta-en-el-tigre/{property_type}-{name}', [PublicPagesController::class, 'unit'])->name('unit');
Route::get('/busqueda', [PublicPagesController::class, 'search'])->name('search');
Route::get('/contacto', [PublicPagesController::class, 'contact'])->name('contact');
Route::get('/avances-de-obra', [PublicPagesController::class, 'construction'])->name('construction');

Route::get('/aviso-de-privacidad', function () {
    return view('privacy-policy');
})->name('privacy');

Route::post('/send-message', [ PublicPagesController::class, 'sendMail'])->name('send.email')->middleware(ProtectAgainstSpam::class);