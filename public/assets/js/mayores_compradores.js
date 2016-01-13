/**
 * Created by JuanDiego on 12/01/2016.
 */
$(document).ready(function () {
    $('#graph_mcompradores').click(function () {
        $.get("mayores_compradores",
            {inicio: $(inicio_mcompradores).val(),fin: $(fin_mcompradores).val()}, //datos enviados
            function (data) {          //datos recibidos
                $("#table_div").empty();
                console.log(data)

                var html= '<table style=\"overflow-x:auto;\" width=\"100%\"><thead><tr><th></th><th>Total Comprado</th><th>Nacimiento</th><th>Pais</th>' +
                    '<th>Estado Civil</th><th>Sexo</th><th>Ingreso Anual</th><th>Hijos</th>' +
                    '<th>Ocupacion</th><th>Educacion</th></tr></thead><tbody>'

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + (i+1).toString() + '</td>';
                    html += '<td>' + data[i].TotalComprado + '</td>';
                    html += '<td>' + data[i].BirthDate + '</td>';
                    html += '<td>' + data[i].SpanishCountryRegionName + '</td>';
                    html += '<td>' + data[i].MaritalStatus + '</td>';
                    html += '<td>' + data[i].Gender + '</td>';
                    html += '<td>' + data[i].YearlyIncome + '</td>';
                    html += '<td>' + data[i].TotalChildren + '</td>';
                    html += '<td>' + data[i].SpanishOccupation + '</td>';
                    html += '<td>' + data[i].SpanishEducation + '</td>';
                    html += "</tr>";
                }
                html += '</tbody></table>';

                $(html).appendTo('#table_div');
            })
    });
});