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


Route::get('ventas_ano_especifico', 'Controlador_reportes_nelson@ventas_por_ano_especifico');
Route::get('ventas_ano_especifico_vendedores', 'Controlador_reportes_nelson@ventas_por_ano_especifico_vendedores');


Route::get('ventas_mes_especifico', 'Controlador_reportes_nelson@ventas_por_mes_especifico');
Route::get('ventas_mes_especifico_vendedores', 'Controlador_reportes_nelson@ventas_por_mes_especifico_vendedores');

Route::get('ventas_trimestre_agrupado', 'Controlador_reportes_nelson@ventas_por_trimestre_agrupado');
Route::get('ventas_trimestre_agrupado_vendedores', 'Controlador_reportes_nelson@ventas_por_trimestre_agrupado_vendedores');

Route::get('ventas_semestre_agrupado', 'Controlador_reportes_nelson@ventas_por_semestre_agrupado');
Route::get('ventas_semestre_agrupado_vendedores', 'Controlador_reportes_nelson@ventas_por_semestre_agrupado_vendedores');



Route::get('ventas_internet_por_producto_agrupado_ano', 'Controlador_reportes_nelson@ventas_internet_por_producto_agrupado_ano');
Route::get('ventas_vendedores_por_producto_agrupado_ano', 'Controlador_reportes_nelson@ventas_vendedores_por_producto_agrupado_ano');

Route::get('ventas_internet_por_producto_agrupado_mes', 'Controlador_reportes_nelson@ventas_internet_por_producto_agrupado_mes');
Route::get('ventas_vendedores_por_producto_agrupado_mes', 'Controlador_reportes_nelson@ventas_vendedores_por_producto_agrupado_mes');

Route::get('ventas_internet_por_producto_agrupado_rango', 'Controlador_reportes_nelson@ventas_internet_por_producto_agrupado_rango');
Route::get('ventas_vendedores_por_producto_agrupado_rango', 'Controlador_reportes_nelson@ventas_vendedores_por_producto_agrupado_rango');

Route::get('callcenter_labora_festivos', 'Controlador_reportes_nelson@callcenter_laboral_vs_festivos');


