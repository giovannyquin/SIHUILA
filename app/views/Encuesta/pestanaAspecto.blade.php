@extends("SbAdmin.index")

@section("Titulo")
    Aspectos de Preguntas
@stop

@section("NombrePagina")
    Aspectos de Preguntas
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Aspectos de Preguntas </h3>
    <div class="row">
        {{ link_to("AspPregCrear/{$tipoEncuesta}", "Crear Aspecto", array("class" => "btn btn-primary")) }}
    </div>
    @if(isset($Aspecto) && $Aspecto->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Descripción </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($Aspecto as $Aspecto)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $Aspecto->nombre }} </td>
                <td style="text-align: center;"> {{ $Aspecto->descripcion }} </td>
                <td style="text-align: center;"> {{ link_to('AspectosPreguntas/'.$Aspecto->id_aspecto_preg.'/edit', 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('AspectosPreguntas/'.$Aspecto->id_aspecto_preg, 'Eliminar', array("class" => "btn btn-danger", "data-method" => "delete", "rel" => "noflow")) }} </td>
             </tr>
             <?php $a++; ?>
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
{{ HTML::script('js/restfulizer.js') }}
@stop