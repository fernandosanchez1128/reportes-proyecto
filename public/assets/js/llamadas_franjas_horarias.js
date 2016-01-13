/**
 * Created by USUARIO on 07/01/2016.
 */
$(document).ready(function () {
    $('#graph_llamadas').click(function () {
        $llam_check=document.getElementById("comp_llam").checked;
        $resp_check=document.getElementById("comp_resp").checked;
        $orde_check=document.getElementById("comp_orde").checked;
        $prob_check=document.getElementById("comp_prob").checked;
        $metodo_llamado="llamadas_sumallamadas";
        $nom_columna="Shift";
        if ($llam_check){
            $metodo_llamado="llamadas_sumallamadas";
            $nom_columna="Shift";
        }
        if ($resp_check){
            $metodo_llamado="llamadas_sumarespuestas";
            $nom_columna="Shift";
        }
        if ($orde_check){
            $metodo_llamado="llamadas_sumaordenes";
            $nom_columna="Shift";
        }
        if ($prob_check){
            $metodo_llamado="llamadas_sumaissues";
            $nom_columna="Shift";
        }
        $.get($metodo_llamado,

            {inicio: $(inicio_llamadas).val(),fin: $(fin_llamadas).val()}, //datos enviados

            function (data) {

                //datos recibidos

                $("#chart_llamadas_franjas_horarias").empty();
                //var text = '{"country":"John Johnson","visits":100,"color":"#FF6600"}';
                var colors=    ['#0D8ECF','#FF6600', '#FCD202', '#B0DE09', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#333333', '#990000']
                for (i = 0; i < data.length; i++) {
                    if (i >= colors.length) {
                        data[i].color = colors[i-colors.length];
                    }
                    else {
                        data[i].color = colors[i];
                    }
                }
                var chart = AmCharts.makeChart("chart_llamadas_franjas_horarias", {
                    "theme": "light",
                    "type": "serial",
                    "startDuration": 2,
                    "dataProvider": data,
                    "valueAxes": [{
                        "position": "left",
                        "axisAlpha":0,
                        "gridAlpha":0
                    }],
                    "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "colorField": "color",
                        "fillAlphas": 0.85,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "topRadius":1,
                        "valueField": "sum"
                    }],
                    "depth3D": 40,
                    "angle": 30,
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": $nom_columna,
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
                $("#chart_llamadas_franjas_horarias").empty();
                $("#chart_llamadas_franjas_horarias").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando el grafico");
            })
    });
});