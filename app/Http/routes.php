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
Route::get('ventas_productos_categorias_internet', 'Controlador_reportes@ventas_productos_categorias_internet');
Route::get('ventas_productos_categorias_reseller', 'Controlador_reportes@ventas_productos_categorias_reseller');
Route::get('llamadas_sumaissues', 'Controlador_reportes@llamadas_sumaissues');
Route::get('llamadas_sumaordenes', 'Controlador_reportes@llamadas_sumaordenes');
Route::get('llamadas_sumarespuestas', 'Controlador_reportes@llamadas_sumarespuestas');
Route::get('llamadas_sumallamadas', 'Controlador_reportes@llamadas_sumallamadas');
Route::get('mayores_compradores', 'Controlador_reportes@mayores_compradores');
