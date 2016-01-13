@extends('master')

@section ('css')
    <link href="{{url()}}/assets/css/datapicker/datapicker3.css" rel="stylesheet">

@stop
@section ('content')

    <h1 class="page-header"> Total de ventas de producto </h1>
    {{--<select id="id_ajax" name="ajax" >--}}
    {{--<option value = "ajax1"> ajax1 </option>--}}
    {{--<option value = "ajax2"> ajax2 </option>--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_prod_internet">Ventas por categoria por internet</a>
            </h2>
        </div>
        <div id="ventas_prod_internet" class = "collapse">
            Desde
            <input  class = "date_month" name="inicio" id="inicio" value = "2010-01" >

            hasta
            <input class = "date_month" name="fin" id="fin" value = "2014-01">


            <button type="button" name = "graph_categories" id = "graph_categories" class="btn btn-primary" >Graficar</button>


            <div id="chart_prod_internet" style="height:400px"></div>
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
                <a data-toggle="collapse" data-parent="#accordion" href="#ventas_prod_reseller">Ventas por categoria de resellers</a>
            </h2>
        </div>
        <div id="ventas_prod_reseller" class = "collapse">
            Desde
            <input  class = "date_month" name="inicio_resell" id="inicio_resell" value = "2010-01" >

            hasta
            <input class = "date_month" name="fin_resell" id="fin_resell" value = "2014-01">


            <button type="button" name = "graph_categories2" id = "graph_categories2" class="btn btn-primary" >Graficar</button>


            <div id="chart_prod_reseller" style="height:400px"></div>
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



    <h1 class="page-header">Llamadas por franjas horarias</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#llamadas_franjas">Llamadas por franjas horarias en dias laborales</a>
            </h2>
        </div>
        <div id="llamadas_franjas" class = "collapse">
            Desde
            <input class = "date_month" name="inicio_llamadas" id="inicio_llamadas"  value = "2010-01">

            hasta
            <input class = "date_month" name="fin_llamadas" id="fin_llamadas" value = "2014-01">

            <div style="color: #720e9e">
                <b>Elija la comparacion:</b>
                <input type="radio" id= "comp_llam" name="comp" value="llamadas" checked="checked"> Total llamadas
                <input type="radio" id= "comp_resp" name="comp" value="respuestas"> Respuestas automaticas
                <input type="radio" id= "comp_orde" name="comp" value="ordenes"> Total ordenes
                <input type="radio" id= "comp_prob" name="comp" value="producto"> Total problemas
            </div>

            <button type="button" name = "graph_llamadas" id = "graph_llamadas" class="btn btn-primary" >Graficar</button>


            <div id="chart_llamadas_franjas_horarias" style="height:400px"></div>

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


    <h1 class="page-header">Mayores compradores</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#mayores_compradores">Perfiles de los mayores compradores</a>
            </h2>
        </div>
        <div id="mayores_compradores" class = "collapse">
            Desde
            <input class = "date_month" name="inicio_mcompradores" id="inicio_mcompradores"  value = "2010-01">

            hasta
            <input class = "date_month" name="fin_mcompradores" id="fin_mcompradores" value = "2014-01">

            <button type="button" name = "graph_mcompradores" id = "graph_mcompradores" class="btn btn-primary" >Mostrar</button>
            <br>
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even){background-color: #f2f2f2}
            </style>

            <div id="table_div" style="float: none !important;display: inline-block;"></div>
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


    <script  src="{{url()}}/assets/js/ventas_productos_categorias.js"></script>
    <script  src="{{url()}}/assets/js/llamadas_franjas_horarias.js"></script>
    <script  src="{{url()}}/assets/js/ventas_productos_categorias_reseller.js"></script>
    <script  src="{{url()}}/assets/js/datapicker/bootstrap-datapicker.js"></script>
    <script type="text/javascript" src="{{url()}}/assets/js/mayores_compradores.js"></script>



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
    </script>

@stop