@extends('master')
@section ('css')
@stop
@section ('content')

    <h1 class="page-header">Blank</h1>
    <select id="id_ajax" name="ajax" >
        <option value = "ajax1"> ajax1 </option>
        <option value = "ajax2"> ajax2 </option>
    </select>
    <div id="content"> ajax1 </div>
@stop
@section('js')
    @parent
    <script>
        $(document).ready(function(){
            $('#id_ajax').change(function(){
                $.get("{{ url('test-ajax')}}",
                        { option: $(this).val() }, //datos enviados
                        function(data) {           //datos recibidos
                            $('#content').empty();
                            $('#content').html(data);
                        });
            });
        });
    </script>

@stop