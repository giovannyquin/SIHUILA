@extends("SbAdmin.index")

@section("Titulo")
    Tipos de Encuesta
@stop

@section("NombrePagina")
    Tipos de Encuesta
@stop
@section("JsJQuery")
    
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Tipos de Encuesta </h3>
    <!--<p> {{ link_to ('datosMina/create', 'Crear nueva Mina') }} </p>-->
    @if($TipoEncuesta->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Activa </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Link </th>
          </tr>
          </thead>
          <tbody>
          {{$a=1}}
          @foreach($TipoEncuesta as $TipoEncuesta)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $TipoEncuesta->nombre }} </td>
                <td style="text-align: center;"> @if($TipoEncuesta->activa==0) Activa @endif @if($TipoEncuesta->activa==1) Inactiva @endif</td>
                <td style="text-align: center;"> {{ link_to('MenuEncuesta/'.$TipoEncuesta->id_tipo_encuesta.'/', 'Editar') }} </td>
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
