@extends('master')
@section ('css')
    <link href="{{url()}}/assets/css/datapicker/datepicker3.css" rel="stylesheet">
@stop
@section ('content')

    <h1 class="page-header"> Comparativo de promociones </h1>
    {{--<select id="id_ajax" name="ajax" >--}}
        {{--<option value = "ajax1"> ajax1 </option>--}}
        {{--<option value = "ajax2"> ajax2 </option>--}}
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#value">Ventas en internet</a>
                </h2>
            </div>
            <div id="value" class = "collapse">
                Desde
                <input type="date" name="inicio" id="inicio" value = "29-10-2010" >

                hasta
                <input type="date" name="fin" id="fin" value = "28-01-2014">


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
                    <a data-toggle="collapse" data-parent="#accordion" href="#value2">Ventas por detal</a>
                </h2>
            </div>
            <div id="value2" class = "collapse">
                Desde
                <input type="date" name="inicio_resell" id="inicio_resell" value = "29-10-2010" >

                hasta
                <input type="date" name="fin_resell" id="fin_resell" value = "28-01-2014">


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
    <script src="http://www.amcharts.com/lib/3/themes/dark.js"></script>

    <script  src="{{url()}}/assets/js/option.js"></script>
    <script  src="{{url()}}/assets/js/grafico.js"></script>
    <script  src="{{url()}}/assets/js/datapicker/bootstrap-datapicker.js"></script>

    <script>
        $( "#inicio" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
        $( "#fin" ).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
    </script>

@stop