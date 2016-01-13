<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome_brayan');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('home', 'Auth\AuthController@modificacion');
Route::get('test-ajax', 'Auth\AuthController@ajax');
Route::get('promocion_venta_volumen_online', 'Controlador_reportes_brayan@promocion_venta_volumen_online');
Route::get('promocion_venta_volumen_reseller', 'Controlador_reportes_brayan@promocion_venta_volumen_reseller');
Route::get('paises_reseller', 'Controlador_reportes_brayan@paises_reseller');
Route::get('paises_online', 'Controlador_reportes_brayan@paises_online');
Route::get('productos_no_venden', 'Controlador_reportes_brayan@productos_no_venden');
Route::get('presupuesto_dpto', 'Controlador_reportes_brayan@presupuesto_dpto');


