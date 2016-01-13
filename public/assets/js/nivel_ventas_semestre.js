/**
 * Created by USUARIO on 12/01/2016.
 */

$(document).ready(function () {
    $('#btn_ventas_por_semestre_internet').click(function () {
        console.log("ventaTri");

        $.get("ventas_semestre_agrupado",

            {inicio: $(ventas_semestre_internet).val()}, //datos enviados

            function (data) {

                //datos recibidos

                $("#chartdiv").empty();
                var colors=    ['#0D8ECF','#FF6600', '#FCD202', '#B0DE09', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#333333', '#990000']
                var nombres_semestre = [ "Primer-semestre", "Segundo-semestre"];

                for (i = 0; i < data.length; i++) {
                    if (i >= colors.length) {
                        data[i].color = colors[i-colors.length];
                    }
                    else {
                        data[i].color = colors[i];
                    }

                    data[i].CalendarSemester=nombres_semestre[data[i].CalendarSemester - 1 ]
                }
                console.log(data);
                var chart = AmCharts.makeChart("chart_ventas_semestre_internet", {
                    "theme": "light",
                    "type": "serial",
                    "startDuration": 2,
                    "dataProvider": data,
                    "valueAxes": [{
                        "position": "left",
                        "axisAlpha":0,
                        "gridAlpha":0,
                        "title": "Cantidad de ventas",
                    }],
                    "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "colorField": "color",
                        "fillAlphas": 0.85,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "topRadius":1,
                        "valueField": "count"
                    }],
                    "depth3D": 40,
                    "angle": 30,
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "CalendarSemester",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha":0,
                        "gridAlpha":0

                    },
                    "export": {
                        "enabled": true
                    }

                },0);

                jQuery('.chart-input').off().on('input change',function() {
                    var property	= jQuery(this).data('property');
                    var target		= chart;
                    chart.startDuration = 0;

                    if ( property == 'topRadius') {
                        target = chart.graphs[0];
                    }

                    target[property] = this.value;
                    chart.validateNow();
                });

            })
            .fail(function() {
                $("#chartdiv").empty();
                $("#chartdiv").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico");
            })
    });
});

$(document).ready(function () {
    console.log("Ventatri");
    $('#btn_ventas_por_semestre_vendedores').click(function () {
        $.get("ventas_semestre_agrupado_vendedores",

            {inicio: $(ventas_semestre_vendedores).val()}, //datos enviados

            function (data) {

                //datos recibidos

                $("#chartdiv").empty();
                //var text = '{"country":"John Johnson","visits":100,"color":"#FF6600"}';
                var colors=    ['#0D8ECF','#FF6600', '#FCD202', '#B0DE09', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#333333', '#990000']
                var nombres_semestre = [ "Primer-semestre", "Segundo-semestre"];
                for (i = 0; i < data.length; i++) {
                    if (i >= colors.length) {
                        data[i].color = colors[i-colors.length];
                    }
                    else {
                        data[i].color = colors[i];
                    }
                    data[i].CalendarSemester=nombres_semestre[data[i].CalendarSemester - 1 ]
                }
                console.log(data);
                console.log([value]);
                var chart = AmCharts.makeChart("chart_ventas_semestre_vendedores", {
                    "theme": "light",
                    "type": "serial",
                    "startDuration": 2,
                    "dataProvider": data,
                    "valueAxes": [{
                        "position": "left",
                        "axisAlpha":0,
                        "gridAlpha":0,
                        "title": "Cantidad de ventas",
                    }],
                    "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "colorField": "color",
                        "fillAlphas": 0.85,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "topRadius":1,
                        "valueField": "count"
                    }],
                    "depth3D": 40,
                    "angle": 30,
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "CalendarSemester",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha":0,
                        "gridAlpha":0

                    },
                    "export": {
                        "enabled": true
                    }

                },0);

                jQuery('.chart-input').off().on('input change',function() {
                    var property	= jQuery(this).data('property');
                    var target		= chart;
                    chart.startDuration = 0;

                    if ( property == 'topRadius') {
                        target = chart.graphs[0];
                    }

                    target[property] = this.value;
                    chart.validateNow();
                });

            })
            .fail(function() {
                $("#chartdiv").empty();
                $("#chartdiv").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico");
            })
    });
});


