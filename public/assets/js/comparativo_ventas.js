/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_comp').click(function () {
        $.get("comparativo_ventas",
            {inicio: $(inicio_comp).val(),fin: $(fin_comp).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_comp").empty();
                data[0].name="ventas online"
                data[1].name="ventas vendedores"
                var chart = AmCharts.makeChart("chart_comp", {
                    "type": "pie",
                    "theme": "light",
                    "innerRadius": "40%",
                    "gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
                    "dataProvider": data,
                    "balloonText": "[[value]]",
                    "valueField": "sum",
                    "titleField": "name",
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
                $("#chart_comp").empty();
                $("#chart_comp").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico</p>");
        })
    });
});