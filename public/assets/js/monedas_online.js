/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_moneda').click(function () {
        $.get("monedas_online",
            {inicio: $(inicio_mone).val(),fin: $(fin_mone).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_monedas").empty();
                var chart = AmCharts.makeChart("chart_monedas", {
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
                $("#chart_monedas").empty();
                $("#chart_monedas").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});