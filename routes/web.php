<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/loginSuplantar/{idCurso}/{idAlumno}', [App\Http\Controllers\Auth\LoginController::class, 'loginSuplantar'])->name('loginSuplantar');
Route::get('/carrito', [App\Http\Controllers\HomeController::class, 'cart'])->name('carrito');
// Ruta para politica
Route::get('informacion-politica-de-privacidad', function(){
    return redirect('/informacion/politicas');
});
// Ruta para subcripciones
Route::get('suscripcion-anual-sasi', function(){
    return redirect('suscripcion');
});



Route::post('/registro-usuario', [App\Http\Controllers\Auth\LoginController::class, 'registroUsuario'])->name('registroUsuario');
Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirectBlade'])->name('redirectBlade');

Auth::routes();
//rutas front sasi
Route::get('/', [App\Http\Controllers\HomeController::class, 'cajalosandes'])->name('home');
Route::get('/cursos', [App\Http\Controllers\HomeController::class, 'cursos'])->name('cursos');
Route::get('/cursos/{cat}', [App\Http\Controllers\HomeController::class, 'categorias'])->name('categorias');
Route::post('/newsreg', [App\Http\Controllers\HomeController::class, 'newsletter'])->name('registronews');
Route::get('/empresas', [App\Http\Controllers\HomeController::class, 'empresas'])->name('empresas');
Route::get('/sasi-para-empresas', [App\Http\Controllers\HomeController::class, 'empresas'])->name('sasi-para-empresas');
Route::get('/historial-compras', [App\Http\Controllers\HomeController::class, 'historialCompras'])->name('historial-compras');
Route::get('/detalle-curso/{sku}', [App\Http\Controllers\HomeController::class, 'detallecurso'])->name('Detalle');
Route::get('/suscripcion', [App\Http\Controllers\HomeController::class, 'suscripcion'])->name('suscripcion');
Route::get('/informacion/{informacion}', [App\Http\Controllers\HomeController::class, 'informacion'])->name('informacion');
Route::get('/politicas-app', [App\Http\Controllers\HomeController::class, 'politicas'])->name('politicas-app');
//Route::get('/cajalosandes', [App\Http\Controllers\HomeController::class, 'cajalosandes'])->name('cajalosandes');
Route::get('/sasi_kids', [App\Http\Controllers\HomeController::class, 'sasi_kids'])->name('sasi_kids');
Route::post('sasi-kids-send-form', [App\Http\Controllers\ServiceController::class, 'sasiKidsSendForm'])->name('sasiKidsSendForm');
Route::get('get-products-list', [App\Http\Controllers\HomeController::class, 'getProductsList']);

//fin rutas front sasi

//rutas compra sasi
Route::post('/guardar-carrito-session', [App\Http\Controllers\HomeController::class, 'guardarCarritoSesion'])->name('guardarCarritoSesion');
Route::get('/carrito', [App\Http\Controllers\HomeController::class, 'cart'])->name('carrito');
Route::get('/FinalizarCompra', [App\Http\Controllers\HomeController::class, 'finalcart'])->name('FinalizarCompra');
Route::post('/StarBuy', [App\Http\Controllers\HomeController::class, 'initCompra'])->name('ProcesarCompra');
Route::post('/StarBuySuscrition', [App\Http\Controllers\HomeController::class, 'initCompraSuscripcion'])->name('ProcesarCompraSuscripcion');
Route::any('/webpayplus/returnUrl', [App\Http\Controllers\HomeController::class, 'commitTransaction']);
Route::get('/CompraExitosa', [App\Http\Controllers\CompraExitosaController::class, 'index'])->name('CompraExitosa');
Route::get('/CompraRechazada', [App\Http\Controllers\CompraRechazadaController::class, 'index'])->name('CompraRechazada');
Route::post('validacupon', [App\Http\Controllers\HomeController::class, 'validacupon'])->name('validacupon');
Route::post('cuponAutomatico', [App\Http\Controllers\HomeController::class, 'cuponAutomatico'])->name('cuponAutomatico');
Route::get('notifica-pago-rechazado', [App\Http\Controllers\HomeController::class, 'notificaPagoRechazado']);
Route::get('notifica-pago-exitoso', [App\Http\Controllers\HomeController::class, 'notificaPagoAceptado']);
//  fix url boton pago antiguo
Route::get('pago-aceptado-payku', [App\Http\Controllers\HomeController::class, 'notificaPagoAceptado']);
Route::get('notifica-pago', [App\Http\Controllers\HomeController::class, 'notificaPago']);
Route::get('notifica-suscripcion', [App\Http\Controllers\HomeController::class, 'notificaSuscripcion']);
Route::get('/exitocero/{norden}', [App\Http\Controllers\HomeController::class, 'compraceroExitosa']);
Route::view('/rechazocero', 'carrito.CompraRechazada');


//rutas fin compra sasi

//rutas perfil sasi
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::post('/actualizar-session', [App\Http\Controllers\PerfilController::class, 'actualizarSession'])->name('actualizarSession');
Route::post('/editar-perfil', [App\Http\Controllers\PerfilController::class, 'editarPerfil'])->name('editarPerfil');
Route::get('/cerrar-sesion', [App\Http\Controllers\Auth\LoginController::class, 'endSession'])->name('endSession');

//rutas fin perfil sasi

//rutas de proceso de compra

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Politica de uso App
Route::get('/politicas-app', [App\Http\Controllers\HomeController::class, 'politicasApp'])->name('politicas-app');

// Recuperar carro de compra
Route::get('recovery-cart/{nOrden}', [App\Http\Controllers\CartController::class, 'recovery'])->name('recovery');
// Consulta rut caja los Andes
Route::post('consulta-cla', [App\Http\Controllers\ServiceController::class, 'consultaCla']);

// Validador-cla
Route::get('/clavalida/{rut}', [App\Http\Controllers\HomeController::class, 'validadorCla'])->name('validador');
