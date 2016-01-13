/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_comp').click(function () {
        $.get("comparativo_ventas",
            {inicio: $(inicio_comp).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_comp").empty();
                var nombres_meses = [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
                var json = '[';
                for (i=0;i<data.length;i++)
                {
                    json = json + '{';
                    json = json + "\"mes\" :";
                    json = json +" \""  +  nombres_meses [data[i].month - 1] + "\",";
                    if (data[i].tipo == "vendedores")
                    {
                        if (i+1 < data.length) {
                            json = json + "\"vendedores\" :";
                            json = json + "\"" + data[i].ventas + "\"" + ",";

                            if (data[i].month == data[i + 1].month) {
                                json = json + "\"on-line\" :";
                                json = json + "\"" + data[i + 1].ventas+  "\"";
                                i++;
                            }
                            else {
                                json = json + "\"on-line\" :";
                                json = json + "0";
                            }
                        }
                        else
                        {
                            json = json + "\"vendedores\" :";
                            json = json + "\"" + data[i].ventas + "\"" ;
                        }
                    }
                    else
                    {
                        if (i+1 < data.length) {
                            json = json + "\"on-line\" :";
                            json = json + "\"" + data[i].ventas + "\"" + ",";
                            if (data[i].month == data[i + 1].month) {
                                json = json + "\"vendedores\" :";
                                json = json + "\"" + data[i + 1].ventas+  "\"";
                                i++;
                            }
                            else {
                                json = json + "\"vendedores\" :";
                                json = json + "0";
                            }
                        }
                        else
                        {
                            json = json + "\"on-line\" :";
                            json = json + "\"" + data[i].ventas + "\"" ;
                        }
                    }
                    if (i+1 < data.length)
                    {
                        json = json + '},'
                    }
                    else
                    {
                        json = json + '}'
                    }

                }
                json = json + ']'
                var obj = JSON.parse(json);
                //$('#chart_comp').html (json)

                var chart = AmCharts.makeChart("chart_comp", {
                    "theme": "light",
                    "type": "serial",
                    "dataProvider": obj ,
                    "valueAxes": [{
                        "stackType": "3d",
                        "unit": "",
                        "position": "left",
                        "title": "Nivel de ventas",
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "balloonText": "online : <b>[[value]]</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "title": "on-line",
                        "type": "column",
                        "valueField": "on-line"
                    }, {
                        "balloonText": "vendedores : <b>[[value]]</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "title": "ventas",
                        "type": "column",
                        "valueField": "vendedores"
                    }],
                    "plotAreaFillAlphas": 0.1,
                    "depth3D": 60,
                    "angle": 30,
                    "categoryField": "mes",
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "export": {
                        "enabled": true
                    }
                });
                jQuery('.chart-input').off().on('input change',function() {
                    var property	= jQuery(this).data('property');
                    var target		= chart;
                    chart.startDuration = 0;

                    if ( property == 'topRadius') {
                        target = chart.graphs[0];
                        if ( this.value == 0 ) {
                            this.value = undefined;
                        }
                    }

                    target[property] = this.value;
                    chart.validateNow();
                });


            })
        .fail(function() {
                $("#chart_comp").empty();
                $("#chart_comp").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});