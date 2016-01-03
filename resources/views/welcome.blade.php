@extends('master')
@section ('css')
@stop
@section ('content')

    <h1 class="page-header">Blank</h1>
    <select id="id_ajax" name="ajax" >
        <option value = "ajax1"> ajax1 </option>
        <option value = "ajax2"> ajax2 </option>
    </select>
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
@stop
@section('js')
    @parent
    <script src="{{url()}}/assets/js/grafico.js">
    $(document).ready(function () {
    $('#id_ajax').change(function () {
    $.get("{{ url('promocion')}}",
    {option: $(this).val()}, //datos enviados
    function (data) {           //datos recibidos
    $('#reporte').empty();
    });
    });
    });
    </script>
    <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js"></script>
    <script src="http://www.amcharts.com/lib/3/themes/dark.js"></script>

    <script  src="{{url()}}/assets/js/option.js"></script>
    <script  src="{{url()}}/assets/js/grafico.js"></script>
@stop