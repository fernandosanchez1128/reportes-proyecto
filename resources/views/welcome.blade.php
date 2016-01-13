@extends('master')

@section ('css')
    <link href="{{url()}}/assets/css/datapicker/datapicker3.css" rel="stylesheet">
    <link href="{{url()}}/assets/DataTables-1.10.10/media/css/jquery.dataTables.min.css" rel="stylesheet">

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
                Desde
                <input  class = "date_month" name="inicio" id="inicio" value = "2010-01" >

                hasta
                <input class = "date_month" name="fin" id="fin" value = "2014-01">


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
                Desde
                <input  class = "date_month" name="inicio_resell" id="inicio_resell" value = "2010-01" >

                hasta
                <input class = "date_month" name="fin_resell" id="fin_resell" value = "2014-01">


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
                Desde
                <input class = "date_month" name="inicio_mone" id="inicio_mone" value = "2010-10" >

                hasta
                <input  class = "date_month" name="fin_mone" id="fin_mone" value = "2014-01">


                <button type="button" name = "graph_moneda" id = "graph_moneda" class="btn btn-primary" >Graficar</button>


                <div id="chart_monedas" style="height:400px"></div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#monedas_vendedores">Monedas usadas con vendedores</a>
                </h2>
            </div>
            <div id="monedas_vendedores" class = "collapse">
                Desde
                <input  class = "date_month" name="inicio_mone2" id="inicio_mone2" value = "2010-10" >

                hasta
                <input class = "date_month" name="fin_mone2" id="fin_mone2" value = "2014-01">


                <button type="button" name = "graph_moneda2" id = "graph_moneda2" class="btn btn-primary" >Graficar</button>


                <div id="chart_monedas2" style="height:400px"></div>
            </div>
        </div>

    <h1 class="page-header"> Comparativo de ventas </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#comparativo_ventas">Ventas online vs Ventas vendedores </a>
            </h2>
        </div>
        <div id="comparativo_ventas" class = "collapse">
            A&ntildeo
            <input class = "date_year" name="inicio_comp" id="inicio_comp"  >
            <button type="button" name = "graph_comp" id = "graph_comp" class="btn btn-primary" >Graficar</button>


            <div id="chart_comp" style="height:400px"></div>
            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="60" step="1"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="page-header"> Movimiento de dinero </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#movimiento_cuentas">Cuentas con m&aacutes movimiento de dinero </a>
            </h2>
        </div>

        <div id="movimiento_cuentas" class = "collapse">
            Desde
            <input class = "date_month" name="inicio_cuenta" id="inicio_cuenta" value = "2010-01" >

            hasta
            <input  class = "date_month" name="fin_cuenta" id="fin_cuenta" value = "2011-01">


            <button type="button" name = "graph_cuentas" id = "graph_cuentas" class="btn btn-primary" >Graficar</button>


            <div id="chart_cuentas" style="height:400px"></div>
            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="60" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="50" value="10" step="1"/>
                    </div>
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Inner-Radius:</label>
                        <input class="chart-input" data-property="innerRadius" type="range" min="0" max="90" value="50" step="1"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#movimiento_departamentos">Departamentos que m&aacutes mueven dinero </a>
            </h2>
        </div>

        <div id="movimiento_departamentos" class = "collapse">
            Desde
            <input class = "date_month" name="inicio_dpto" id="inicio_dpto" value = "2010-01" >

            hasta
            <input  class = "date_month" name="fin_dpto" id="fin_dpto" value = "2011-01">


            <button type="button" name = "graph_dpto" id = "graph_dpto" class="btn btn-primary" >Graficar</button>


            <div id="chart_dptos" style="height:400px"></div>
            <div class="container-fluid">
                <div class="row text-center" style="overflow:hidden;">
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angle:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="60" value="30" step="1"/>
                    </div>

                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Depth:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="50" value="10" step="1"/>
                    </div>
                    <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Inner-Radius:</label>
                        <input class="chart-input" data-property="innerRadius" type="range" min="0" max="90" value="50" step="1"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="page-header"> Inventario </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#inventario">Productos sin movimientos en inventario </a>
            </h2>
        </div>

        <div id="inventario" class = "collapse">
            Fecha
            <input class = "date_month" name="inicio_inventario" id="inicio_inventario" value = "2011-01" >
            <select id="meses" name = "meses">
                <option value="3">3 Meses</option>
                <option value="6">6 Meses</option>
            </select>


            <button type="button" name = "graph_inventario" id = "graph_inventario" class="btn btn-primary" >Graficar</button>


            <div id="chart_inventario" style="height:450px"></div>
        </div>
    </div>










    <!-- VENTAS PROMOCIONES vs PRODUCTOS -->

    <h1 class="page-header">Ventas Promociones vs Productos</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#promo_vs_prod_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="promo_vs_prod_internet" class = "collapse">
            Desde
            <input type="date_full" class = "date_full" name="inicio_promo_vs_prod_internet" id="inicio_promo_vs_prod_internet"  >

            hasta
            <input type="date_full" class = "date_full" name="fin_promo_vs_prod_internet" id="fin_promo_vs_prod_internet" >

            <div style="color: #720e9e">
            <b>Ventas por:</b>
            <input type="radio" id= "comp_prom_internet" name="comp" value="promocion" checked="checked"> Por Promocion
            <input type="radio" id= "comp_prod_internet" name="comp" value="producto"> Por Producto (Subcategoria)
            </div>

            <button type="button" name = "bt_promocion_vs_producto_internet" id = "bt_promocion_vs_producto_internet" class="btn btn-primary" >Graficar</button>


            <div id="chart_promociones_vs_producto__internet" style="height:400px"></div>

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
                <a data-toggle="collapse" data-parent="#accordion" href="#promo_vs_prod_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="promo_vs_prod_vendedores" class = "collapse">
            Desde
            <input type="date_full" class = "date_full" name="inicio_promo_vs_prod_vendedores" id="inicio_promo_vs_prod_vendedores"  >

            hasta
            <input type="date_full" class = "date_full" name="fin_promo_vs_prod_vendedores" id="fin_promo_vs_prod_vendedores" >

            <div style="color: #720e9e">
                <b>Ventas por:</b>
                <input type="radio" id= "comp_prom_vendedores" name="comp2" value="promocion" checked="checked"> Por Promocion
                <input type="radio" id= "comp_prod_vendedores" name="comp2" value="producto"> Por Producto (Subcategoria)
            </div>

            <button type="button" name = "bt_promocion_vs_producto_vendedores" id = "bt_promocion_vs_producto_vendedores" class="btn btn-primary" >Graficar</button>


            <div id="chart_promociones_vs_producto__vendedores" style="height:400px"></div>

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

            Desde
            <input type="date_year" class = "date_year" name="inicio_ano_ventas" id="inicio_ano_ventas" >

            Hasta
            <input type="date_year" class = "date_year" name="fin_ano_ventas" id="fin_ano_ventas">

            <button type="button" name = "btn_ventas_por_ano_internet" id = "btn_ventas_por_ano_internet" class="btn btn-primary" >Graficar</button>

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

            Desde
            <input type="date_year" class = "date_year" name="inicio_ano_ventas_vendedores" id="inicio_ano_ventas_vendedores" >

            Hasta
            <input type="date_year" class = "date_year" name="fin_ano_ventas_vendedores" id="fin_ano_ventas_vendedores">

            <button type="button" name = "ventas_por_ano_vendedores" id = "ventas_por_ano_vendedores" class="btn btn-primary" >Graficar</button>


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
            <input type="date_year" class = "date_year" name="ventas_mes" id="ventas_mes" >

            <button type="button" name = "btn_ventas_por_mes_internet" id = "btn_ventas_por_mes_internet" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_mes_internet" style="height:400px"></div>

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

            Selecciones año
            <input type="date_year" class = "date_year" name="ventas_mes_vendedores" id="ventas_mes_vendedores" >

            <button type="button" name = "btn_ventas_por_mes_vendedores" id = "btn_ventas_por_mes_vendedores" class="btn btn-primary" >Graficar</button>


            <div id="chart_ventas_mes_vendedores" style="height:400px"></div>

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

            <input type="date_year" class = "date_year" name="ventas_trimestre" id="ventas_trimestre" >

            <button type="button" name = "btn_ventas_por_trimestre_internet" id = "btn_ventas_por_trimestre_internet" class="btn btn-primary" >Graficar</button>

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
            <input type="date_year" class = "date_year" name="ventas_trimestre_vendedores" id="ventas_trimestre_vendedores" >

            <button type="button" name = "btn_ventas_por_trimestre_vendedores" id = "btn_ventas_por_trimestre_vendedores" class="btn btn-primary" >Graficar</button>


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

    <h1 class="page-header">Nivel de ventas por Semestre</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_semestre_por_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_semestre_por_internet" class = "collapse">

            Selecciones el año
            <input type="date_year" class = "date_year" name="ventas_semestre_internet" id="ventas_semestre_internet" >

            <button type="button" name = "btn_ventas_por_semestre_internet" id = "btn_ventas_por_semestre_internet" class="btn btn-primary" >Graficar</button>

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
            <input type="date_year" class = "date_year" name="ventas_semestre_vendedores" id="ventas_semestre_vendedores" >

            <button type="button" name = "btn_ventas_por_semestre_vendedores" id = "btn_ventas_por_semestre_vendedores" class="btn btn-primary" >Graficar</button>


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
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_producto_tiempo_internet">Ventas por internet</a>
            </h2>
        </div>

        <br>


        <div id="ventas_producto_tiempo_internet" class = "collapse">

                                            <!-- CLIENTES VENTAS POR AÑO -->
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#internet_ano">Ventas por producto(subcategoria) en el año</a>
                </h2>
            </div>

            <div id="internet_ano" class = "collapse">

            Seleccione el año
            <input type="date_year" class = "date_year" name="ventas_producto_ano_internet" id="ventas_producto_ano_internet" >


            <button type="button" name = "bt_ventas_producto_ano_internet" id = "bt_ventas_producto_ano_internet" class="btn btn-primary" >Graficar</button>

            <div id="chart_ventas_producto_ano_internet" style="height:400px"></div>

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
                                                <!-- CLIENTES POR MES -->

            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#internet_mes">Ventas por producto(subcategoria) en el mes</a>
                </h2>
            </div>

            <div id="internet_mes" class = "collapse">

                Selecciones Mes
                <input type="date_month" class = "date_month" name="ventas_producto_mes_internet" id="ventas_producto_mes_internet" >

                <button type="button" name = "bt_ventas_producto_mes_internet" id = "bt_ventas_producto_mes_internet" class="btn btn-primary" >Graficar</button>

                <div id="chart_ventas_producto_mes_internet" style="height:400px"></div>

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

            <!-- CLIENTES POR RANGO -->

            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#internet_rango">Ventas por producto(subcategoria) por rango</a>
                </h2>
            </div>

            <div id="internet_rango" class = "collapse">

                Desde
                <input type="date_full" class = "date_full" name="ventas_producto_rango_inicio_internet" id="ventas_producto_rango_inicio_internet" >

                Hasta
                <input type="date_full" class = "date_full" name="ventas_producto_rango_fin_internet" id="ventas_producto_rango_fin_internet" >


                <button type="button" name = "bt_ventas_producto_rango_internet" id = "bt_ventas_producto_rango_internet" class="btn btn-primary" >Graficar</button>

                <div id="chart_ventas_producto_rango_internet" style="height:400px"></div>

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


        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_producto_tiempo_vendedores">Ventas por vendedores</a>
            </h2>
        </div>


        <div id="ventas_producto_tiempo_vendedores" class = "collapse">

            <!-- vendedoresS VENTAS POR AÑO -->
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#vendedores_ano">Ventas por producto(subcategoria) en el año</a>
                </h2>
            </div>

            <div id="vendedores_ano" class = "collapse">

                Seleccione el año
                <input type="date_year" class = "date_year" name="ventas_producto_ano_vendedores" id="ventas_producto_ano_vendedores" >


                <button type="button" name = "bt_ventas_producto_ano_vendedores" id = "bt_ventas_producto_ano_vendedores" class="btn btn-primary" >Graficar</button>

                <div id="chart_ventas_producto_ano_vendedores" style="height:400px"></div>

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
            <!-- vendedoresS POR MES -->

            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#vendedores_mes">Ventas por producto(subcategoria) en el mes</a>
                </h2>
            </div>

            <div id="vendedores_mes" class = "collapse">

                Selecciones Mes
                <input type="date_month" class = "date_month" name="ventas_producto_mes_vendedores" id="ventas_producto_mes_vendedores" >

                <button type="button" name = "bt_ventas_producto_mes_vendedores" id = "bt_ventas_producto_mes_vendedores" class="btn btn-primary" >Graficar</button>

                <div id="chart_ventas_producto_mes_vendedores" style="height:400px"></div>

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

            <!-- vendedoresS POR RANGO -->

            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#vendedores_rango">Ventas por producto(subcategoria) por rango</a>
                </h2>
            </div>

            <div id="vendedores_rango" class = "collapse">

                Desde
                <input type="date_full" class = "date_full" name="ventas_producto_rango2_inicio_vendedores" id="ventas_producto_rango2_inicio_vendedores" >

                Hasta
                <input type="date_full" class = "date_full" name="ventas_producto_rango2_fin_vendedores" id="ventas_producto_rango2_fin_vendedores" >


                <button type="button" name = "bt_ventas_producto_rango_vendedores" id = "bt_ventas_producto_rango_vendedores" class="btn btn-primary" >Graficar</button>

                <div id="chart_ventas_producto_rango_vendedores" style="height:400px"></div>

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
            <input type="date_full" class = "date_full" name="inicio_callcenter" id="inicio_callcenter" >

            hasta
            <input type="date_full" class = "date_full" name="fin_callcenter" id="fin_callcenter">

            <button type="button" name = "bt_callcenter" id = "bt_callcenter" class="btn btn-primary" >Graficar</button>

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
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


    <script  src="{{url()}}/assets/js/promociones_online.js"></script>
    <script  src="{{url()}}/assets/js/promociones_vendedores.js"></script>
    <script  src="{{url()}}/assets/js/monedas_online.js"></script>
    <script  src="{{url()}}/assets/js/monedas_vendedores.js"></script>
    <script  src="{{url()}}/assets/js/comparativo_ventas.js"></script>
    <script  src="{{url()}}/assets/js/movimiento_cuentas.js"></script>
    <script  src="{{url()}}/assets/js/movimiento_dptos.js"></script>
    <script  src="{{url()}}/assets/js/mvto_inventario.js"></script>
    <script  src="{{url()}}/assets/js/datapicker/bootstrap-datapicker.js"></script>
    <script  src="{{url()}}/assets/DataTables-1.10.10/media/js/jquery.dataTables.min.js"> </script>

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

    <script  src="{{url()}}/assets/js/promociones_mas_vendidas.js"></script>
    <script  src="{{url()}}/assets/js/nivel_ventas_ano.js"></script>
    <script  src="{{url()}}/assets/js/nivel_ventas_mes.js"></script>
    <script  src="{{url()}}/assets/js/nivel_ventas_trimestre.js"></script>
    <script  src="{{url()}}/assets/js/nivel_ventas_semestre.js"></script>
    <script  src="{{url()}}/assets/js/ventas_productos_ano.js"></script>
    <script  src="{{url()}}/assets/js/ventas_productos_mes.js"></script>
    <script  src="{{url()}}/assets/js/ventas_productos_rango.js"></script>
    <script  src="{{url()}}/assets/js/callcenter_festivos_laborales.js"></script>


    <script  src="{{url()}}/assets/js/datapicker/bootstrap-datapicker.js"></script>


    <script>

        $( ".date" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: "2005/01/01",
            endDate: "+0d",


        });

        $( ".date_month" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "yyyy-mm",
            startView: "year",
            minViewMode: "months",
            startDate: "2005/01/",
            endDate: "+0m",
        });

        $( ".date_year" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "yyyy",
            startView: "year",
            startDate: "2005",
            minViewMode: "years",
            endDate: "+0m",
        });
        $( ".date_full" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'yyyy-mm-dd',
            startDate: "2005/01/01",
            endDate: "+0d",
        });
    </script>



@stop