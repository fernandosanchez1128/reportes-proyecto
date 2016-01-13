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
    return view('welcome');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('home', 'Auth\AuthController@modificacion');
Route::get('test-ajax', 'Auth\AuthController@ajax');
Route::get('promociones_vendedores', 'Controlador_reportes@mejores_promociones_vendedores');
Route::get('promociones', 'Controlador_reportes@mejores_promociones_online');
Route::get('monedas_online', 'Controlador_reportes@monedas_online');
Route::get('monedas_vendedores', 'Controlador_reportes@monedas_vendedores');
Route::get('comparativo_ventas', 'Controlador_reportes@comparativo_ventas');
Route::get('movimiento_cuentas', 'Controlador_reportes@movimiento_cuentas');
Route::get('movimiento_dptos', 'Controlador_reportes@movimiento_dptos');
Route::get('mvto_inventario', 'Controlador_reportes@mvto_inventario');



