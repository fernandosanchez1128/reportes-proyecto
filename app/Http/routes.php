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

Route::get('ventas_ano_agrupado', 'Controlador_reportes_nelson@ventas_por_ano_agrupada');

Route::get('ventas_ano_especifico', 'Controlador_reportes_nelson@ventas_por_ano_especifico');

Route::get('ventas_mes_especifico', 'Controlador_reportes_nelson@ventas_por_mes_especifico');

Route::get('ventas_mes_agrupado', 'Controlador_reportes_nelson@ventas_por_mes_agrupado');

Route::get('ventas_trimestre_agrupado', 'Controlador_reportes_nelson@ventas_por_trimestre_agrupado');

Route::get('ventas_trimestre_especifico', 'Controlador_reportes_nelson@ventas_por_trimestre_especifico');

Route::get('ventas_semestre_agrupado', 'Controlador_reportes_nelson@ventas_por_semestre_agrupado');

Route::get('ventas_semestre_especifico', 'Controlador_reportes_nelson@ventas_por_semestre_especifico');

Route::get('ventas_producto_agrupado', 'Controlador_reportes_nelson@ventas_por_producto_agrupado');

Route::get('callcenter_labora_festivos', 'Controlador_reportes_nelson@callcenter_laboral_vs_festivos');


