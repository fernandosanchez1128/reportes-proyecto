/**
 * Created by fernando on 14/12/2015.
 */


$(document).ready(function () {
    $('#graph_inventario').click(function () {
        inicio = $(inicio_inventario).val();
        var fecha = inicio.split("-");
        var f = new Date(fecha[0],fecha[1]);
        f.setMonth(f.getMonth()+ parseInt($(meses).val()))
        var fin = f.getFullYear()  + "-" + (f.getMonth() ) ;
        console.log (inicio)
        console.log (fin)



        $.get("mvto_inventario",
            {inicio: $(inicio_inventario).val(),fin: fin}, //datos enviados
            function (data) {          //datos recibidos
                $("#chart_inventario").empty();
                var html ='<div class="container" style="width:100%"> <table id="myTable" class="table table-hover"> \
                <thead> \
                <tr> \
                <th>Codigo</th> \
                <th>nombre</th> \
                </thead> \
                <tbody>';
                for (i in data )
                {
                    html += '<tr>';
                    html += '<td>';
                    html += data[i].ProductAlternateKey;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].name;
                    html += '</td>';
                }
                html += '</tbody> \
                </table>\
                </div>';

                $("#chart_inventario").html(html);
                $('#myTable').DataTable();

            })
        .fail(function() {
                $("#chart_inventario").empty();
                $("#chart_inventario").html(" <br> <br> <br> <br> <br>   <p align= 'center'>  error cargando la tabla</p>");
        })
    });
});