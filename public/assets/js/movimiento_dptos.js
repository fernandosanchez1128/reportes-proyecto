/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_dpto').click(function () {
        $.get("movimiento_dptos",
            {inicio: $(inicio_cuenta).val(),fin: $(fin_cuenta).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_dptos").empty();

                var chart = AmCharts.makeChart( "chart_dptos", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [ {
                        "text": "Departamentos con mas movimiento de dinero",
                        "size": 16
                    } ],
                    "dataProvider": data,
                    "valueField": "movimiento",
                    "titleField": "nombre_dpto",
                    "startEffect": "elastic",
                    "startDuration": 2,
                    "labelRadius": 15,
                    "innerRadius": "50%",
                    "depth3D": 10,
                    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                    "angle": 15,
                    "export": {
                        "enabled": true
                    }
                } );
                jQuery( '.chart-input' ).off().on( 'input change', function() {
                    var property = jQuery( this ).data( 'property' );
                    var target = chart;
                    var value = Number( this.value );
                    chart.startDuration = 0;

                    if ( property == 'innerRadius' ) {
                        value += "%";
                    }

                    target[ property ] = value;
                    chart.validateNow();
                });
            })
        .fail(function() {
                $("#chart_dptos").empty();
                $("#chart_dptos").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});