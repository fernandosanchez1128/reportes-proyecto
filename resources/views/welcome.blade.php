@extends('master')

@section ('css')
    <link href="{{url()}}/assets/css/datapicker/datapicker3.css" rel="stylesheet">

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
                <a data-toggle="collapse" data-parent="#accordion" href="#movimiento_cuentas">Cuentas con mas movimiento de dinero </a>
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
                <a data-toggle="collapse" data-parent="#accordion" href="#movimiento_departamentos">Departamentos que más mueven dinero </a>
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


    <script  src="{{url()}}/assets/js/promociones_online.js"></script>
    <script  src="{{url()}}/assets/js/promociones_vendedores.js"></script>
    <script  src="{{url()}}/assets/js/monedas_online.js"></script>
    <script  src="{{url()}}/assets/js/monedas_vendedores.js"></script>
    <script  src="{{url()}}/assets/js/comparativo_ventas.js"></script>
    <script  src="{{url()}}/assets/js/movimiento_cuentas.js"></script>
    <script  src="{{url()}}/assets/js/movimiento_dptos.js"></script>
    {{--<script  src="{{url()}}/assets/js/grafico.js"></script>--}}
    {{--<script  src="{{url()}}/assets/js/grafico2.js"></script>--}}
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
    </script>

@stop