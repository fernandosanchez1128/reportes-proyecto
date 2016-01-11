/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_cuentas').click(function () {
        $.get("movimiento_cuentas",
            {inicio: $(inicio_cuenta).val(),fin: $(fin_cuenta).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_cuentas").empty();

                var chart = AmCharts.makeChart( "chart_cuentas", {
                    "type": "pie",
                    "theme": "light",
                    "titles": [ {
                        "text": "Movimiento De Dinero En Cuentas",
                        "size": 16
                    } ],
                    "dataProvider": data,
                    "valueField": "movimiento",
                    "titleField": "descripcion",
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
                $("#chart_cuentas").empty();
                $("#chart_cuentas").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});