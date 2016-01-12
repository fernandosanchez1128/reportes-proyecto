@extends('master')
@section ('css')
    <link href="{{url()}}/assets/css/datapicker/datepicker3.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
@stop
@section ('content')

    <h1 class="page-header"> Comparativo de promociones </h1>
    {{--<select id="id_ajax" name="ajax" >--}}
    {{--<option value = "ajax1"> ajax1 </option>--}}
    {{--<option value = "ajax2"> ajax2 </option>--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#value">Ventas en internet</a>
            </h2>
        </div>
        <div id="value" class = "collapse">


            <button type="button" name = "graph_promotion" id = "graph_promotion" class="btn btn-primary" >Graficar</button>


            <div id="chartdiv" style="height:400px"></div>
            <div class="row text-center" style="overflow:hidden;">
                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Top Radius:</label>
                    <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Angle:</label>
                    <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Depth:</label>
                    <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#value2">Ventas vendedores</a>
            </h2>
        </div>
        <div id="value2" class = "collapse">



            <button type="button" name = "graph_promotion2" id = "graph_promotion2" class="btn btn-primary" >Graficar</button>


            <div id="chartdiv2" style="height:400px"></div>
            <div class="row text-center" style="overflow:hidden;">
                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Top Radius:</label>
                    <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Angle:</label>
                    <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Depth:</label>
                    <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                </div>
            </div>
        </div>
    </div>


    <h1 class="page-header"> Monedas usadas en las ventas </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#monedas_online">Monedas usadas online</a>
            </h2>
        </div>
        <div id="monedas_online" class = "collapse">



            <button type="button" name = "graph_moneda" id = "graph_moneda" class="btn btn-primary" >Graficar</button>


            <div id="chart_monedas" style="height:400px"></div>
            <div class="row text-center" style="overflow:hidden;">
                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Top Radius:</label>
                    <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Angle:</label>
                    <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                </div>

                <div class="col-sm-3" style="float: none !important;display: inline-block;">
                    <label class="text-left">Depth:</label>
                    <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                </div>
            </div>
        </div>
    </div>


    <!-- VENTAS PROMOCIONES vs PRODUCTOS -->

    <h1 class="page-header">Ventas Promociones vs Productos</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_por_internet" class = "collapse">
            Desde
            <input type="date" class = "date" name="inicio_promo" id="inicio_promo"  >

            hasta
            <input type="date" class = "date" name="fin_promo" id="fin_promo" >

            <div style="color: #720e9e">
            <b>Elija la comparacion:</b>
            <input type="radio" id= "comp_prom" name="comp" value="promocion" checked="checked"> Por Promocion
            <input type="radio" id= "comp_prod" name="comp" value="producto"> Por Producto
            </div>

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_promociones_mas_vendida" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_por_vendedores" class = "collapse">
            Desde
            <input type="date" class = "date" name="inicio_promo" id="inicio_promo" >

            hasta
            <input type="date" class = "date" name="fin_promo" id="fin_promo">

            <div style="color: #720e9e">
                <b>Elija la comparacion:</b>
                <input type="radio" name="comp" value="promocion"> Por Promocion
                <input type="radio" name="comp" value="producto"> Por Producto
            </div>

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_promociones_mas_vendida" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- VENTAS POR AÑO -->

    <h1 class="page-header">Nivel de ventas por año</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_ano_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_ano_por_internet" class = "collapse">

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_ano_internet" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_ano_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_ano_por_vendedores" class = "collapse">

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_ano_vendedores" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <!-- VENTAS POR MES -->
    <h1 class="page-header">Nivel de ventas por mes</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_mes_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_mes_por_internet" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano" id="ventas_ano" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_ano_internet" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_mes_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_mes_por_vendedores" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano" id="ventas_ano" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_ano_vendedores" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- VENTAS POR TRIMESTRE -->
    <h1 class="page-header">Nivel de ventas por Trimestre</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_trimestre_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_trimestre_por_internet" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano_trimestre_internet" id="ventas_ano_trimestre_internet" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_trimestre_internet" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_trimestre_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_trimestre_por_vendedores" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano_trimestre_vendedores" id="ventas_ano_trimestre_vendedores" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_trimestre_vendedores" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- VENTAS POR Semestre -->

    <h1 class="page-header">Nivel de ventas por Trimestre</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_semestre_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_semestre_por_internet" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano_semestre_internet" id="ventas_ano_semestre_internet" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_semestre_internet" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_semestre_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_semestre_por_vendedores" class = "collapse">

            Selecciones el año
            <input type="date" class = "date" name="ventas_ano_semestre_vendedores" id="ventas_ano_semestre_vendedores" >

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_semestre_vendedores" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- VENTAS POR PRODUCTO EN EL TIEMPO -->
    <h1 class="page-header">Ventas por producto en el tiempo</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_producto_tiempo">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_producto_tiempo" class = "collapse">

            Desde
            <input type="date" class = "date" name="inicio_prod" id="inicio_prod" >

            hasta
            <input type="date" class = "date" name="fin_prod" id="fin_prod">

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_producto_tiempo_internet" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_tiempo_por_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_tiempo_por_vendedores" class = "collapse">

            Desde
            <input type="date" class = "date" name="inicio_prod" id="inicio_prod" >

            hasta
            <input type="date" class = "date" name="fin_prod" id="fin_prod">

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_producto_tiempo_vendedores" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- LLAMADAS AL CALL CENTER -->
    <h1 class="page-header">Llamadas al callcenter</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#llamadas_callcenter">Dias Festivos vs dias laborales </a>
            </h2>
        </div>

        <br>


        <div id="llamadas_callcenter" class = "collapse">

            Desde
            <input type="date" class = "date" name="inicio_callcenter" id="inicio_callcenter" >

            hasta
            <input type="date" class = "date" name="fin_callcenter" id="fin_callcenter">

            <button type="button" name = "graph_promocion" id = "graph_promocion" class="btn btn-primary" >Graficar</button>

            <div id="chart_llamadas_callcenter" style="height:400px"></div>

            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Top Radius:</label>
                        <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                    </div>
                </div>
            </div>
        </div>



    </div>


@stop
@section('js')
    @parent
    {{--<script src="{{url()}}/assets/js/grafico.js">--}}
    {{--$(document).ready(function () {--}}
    {{--$('#id_ajax').change(function () {--}}
    {{--$.get("{{ url('promociones')}}",--}}
    {{--{option: $(this).val()}, //datos enviados--}}
    {{--function (data) {           //datos recibidos--}}
    {{--$('#reporte').empty();--}}
    {{--});--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
    <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js"></script>
    <script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>


<!--
    <script  src="{{url()}}/assets/js/promociones_online.js"></script>
    <script  src="{{url()}}/assets/js/promociones_vendedores.js"></script>
    <script  src="{{url()}}/assets/js/monedas_online.js"></script>
    <script  src="{{url()}}/assets/js/grafico.js"></script>
    <script  src="{{url()}}/assets/js/grafico2.js"></script> -->
    <script  src="{{url()}}/assets/js/promociones_mas_vendidas.js"></script>
    <script  src="{{url()}}/assets/js/datapicker/bootstrap-datapicker.js"></script>


    <script>
        $( ".date" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'yyyy/mm/dd',
            startDate: "2005/01/01",
            endDate: "+0d",
        });
    </script>

@stop