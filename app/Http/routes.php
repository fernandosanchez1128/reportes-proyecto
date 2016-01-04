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
Route::get('promociones', 'Controlador_reportes_nelson@ventas_por_promocion');
Route::get('productos', 'Controlador_reportes_nelson@ventas_por_producto');

