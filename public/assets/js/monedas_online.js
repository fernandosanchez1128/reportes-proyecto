/**
 * Created by fernando on 14/12/2015.
 */
$(document).ready(function () {
    $('#graph_moneda').click(function () {
        $.get("monedas_online",
            {inicio: $(inicio_mone).val(),fin: $(fin_mone).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#chartdiv").empty();
                //var text = '{"country":"John Johnson","visits":100,"color":"#FF6600"}';
                var colors=    ['#0D8ECF','#FF6600', '#FCD202', '#B0DE09', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#333333', '#990000']
                //for (i = 0; i < data.length; i++) {
                //    if (i >= colors.length) {
                //        data[i].count = 10
                //    }
                //    else {
                //        data[i].count = 10
                //    }
                //}

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
                $("#chartdiv").empty();
                $("#chartdiv").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico");
        })
    });
});