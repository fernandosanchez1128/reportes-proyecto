/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_moneda2').click(function () {
        $.get("monedas_vendedores",
            {inicio: $(inicio_mone2).val(),fin: $(fin_mone2).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_monedas2").empty();
                var chart = AmCharts.makeChart("chart_monedas2", {
                    "type": "pie",
                    "theme": "light",
                    "innerRadius": "40%",
                    "gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
                    "dataProvider": data,
                    "balloonText": "[[value]]",
                    "valueField": "count",
                    "titleField": "CurrencyName",
                    "balloon": {
                        "drop": true,
                        "adjustBorderColor": false,
                        "color": "#FFFFFF",
                        "fontSize": 16
                    },
                    "export": {
                        "enabled": true
                    }
                });


            })
        .fail(function() {
                $("#chart_monedas2").empty();
                $("#chart_monedas2").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});