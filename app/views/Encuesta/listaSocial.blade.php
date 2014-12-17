@extends("SbAdmin.index")

@section("Titulo")
    Encuesta Social
@stop

@section("NombrePagina")
    Encuesta Social
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Encuesta Social </h3>
    <!--<p> {{ link_to ('datosMina/create', 'Crear nueva Mina') }} </p>-->
    @if($TipoEncuesta->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Link </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Resultados </th>
          </tr>
          </thead>
          <tbody>
          {{$a=1}}
          @foreach($TipoEncuesta as $TipoEncuesta)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $TipoEncuesta->nombre }} </td>
                <td style="text-align: center;"> {{ link_to('Encuestado/'.$TipoEncuesta->id_tipo_encuesta.'/', 'Editar') }} </td>
                <td style="text-align: center;"> {{ link_to('ResultadoTipo/'.$TipoEncuesta->id_tipo_encuesta.'/', 'Ir a Resultados') }} </td>
             </tr>
             {{$a++}}
          @endforeach
          
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado MTipos de Encuesta </p>
    @endif
</div>
@stop
@section("JsJQuery")
    
@stop