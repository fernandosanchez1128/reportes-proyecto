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
Route::get('promociones2', 'Controlador_reportes@mejores_promociones_online');
Route::get('monedas_online', 'Controlador_reportes@monedas_online');
Route::get('monedas_vendedores', 'Controlador_reportes@monedas_vendedores');
Route::get('comparativo_ventas', 'Controlador_reportes@comparativo_ventas');
Route::get('movimiento_cuentas', 'Controlador_reportes@movimiento_cuentas');
Route::get('movimiento_dptos', 'Controlador_reportes@movimiento_dptos');
Route::get('mvto_inventario', 'Controlador_reportes@mvto_inventario');


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


Route::get('ventas_productos_categorias_internet', 'Controlador_reportes@ventas_productos_categorias_internet');
Route::get('ventas_productos_categorias_reseller', 'Controlador_reportes@ventas_productos_categorias_reseller');
Route::get('llamadas_sumaissues', 'Controlador_reportes@llamadas_sumaissues');
Route::get('llamadas_sumaordenes', 'Controlador_reportes@llamadas_sumaordenes');
Route::get('llamadas_sumarespuestas', 'Controlador_reportes@llamadas_sumarespuestas');
Route::get('llamadas_sumallamadas', 'Controlador_reportes@llamadas_sumallamadas');
Route::get('mayores_compradores', 'Controlador_reportes@mayores_compradores');
