@extends("SbAdmin.index")

@section("Titulo")
    Preguntas de la encuesta
@stop

@section("NombrePagina")
    Preguntas de la encuesta
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Preguntas</h3>
    <div class="row">
        {{ link_to("PreguntaCrear/{$tipoEncuesta}", "Crear Pregunta", array("class" => "btn btn-primary")) }}
    </div>
    @if(isset($pregunta) && $pregunta->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Num Pregunta </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Sección Preg </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Subsección Preg </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Tipo Respuesta </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
              <?php //var_dump($modoRpta); ?>
          @foreach($pregunta as $pregunta)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $pregunta->nombre }} </td>
                <td style="text-align: center;"> {{ $pregunta->num_pregunta }} </td>
                <td style="text-align: center;"> {{ $aspecto->nombre }} </td>
                <td style="text-align: center;"> {{ $tipoaspecto->nombre }} </td>
                <td style="text-align: center;"> {{ $tiporpta->nombre }} </td>
                
                <td style="text-align: center;"> {{ link_to('Preguntas/'.$pregunta->id_pregunta."/edit", 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('Preguntas/'.$pregunta->id_pregunta, 'Eliminar', array("class" => "btn btn-danger", "data-method" => "delete", "rel" => "noflow")) }} </td>
             </tr>
             <?php $a++; ?>
          @endforeach
          
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado Tipos de Respuestas </p>
    @endif
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
@stop