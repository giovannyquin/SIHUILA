@extends("Simple.index")

@section("Titulo")
    Resultado de Texto
@stop

@section("NombrePagina")
    Resultado de Texto
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <!--recrremos los aspectos-->
    @foreach($pregunta as $pregunta)
        <div class="row">
            <p class="bg-primary text-center">Pregunta: {{ $pregunta->nombre }}</p>
        </div>
    @endforeach
    <div class="">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Encuestado</th>
                <th>Municipio</th>
                <th>Vereda</th>
                <th>Respuesta</th>
            </tr>
            </thead>
            <tbody>
                <?php $a=1; ?>
                @foreach($respuesta as $resp)
                <tr>
                    <td>{{$a}}</td>
                    @foreach($encuestado[$resp->num_docu_enc] as $enc)
                    <td> {{$enc->primer_nombre.' '.$enc->primer_apellido}}</td>
                    @endforeach
                    <td>{{$municipio[$resp->num_docu_enc]->nombre_municipio }} </td>
                    <td>{{$vereda[$resp->num_docu_enc]->nombre_vereda }} </td>
                    <td>{{$resp->valor_respuesta}}</td>
                    <?php $a++; ?>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
</div>
@stop
