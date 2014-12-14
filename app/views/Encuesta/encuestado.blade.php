@extends("SbAdmin.index")

@section("Titulo")
    Encuestado
@stop

@section("NombrePagina")
    Encuestado
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Datos de Encuestados</h3>
    <div class="row">
        {{ link_to("EncuestadoCrear/{$tipoEncuesta}", "Crear Encuestado", array("class" => "btn btn-primary")) }}
    </div>
    @if(isset($encuestado) && count($encuestado))
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Num Documento </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($encuestado as $encuestado)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $encuestado->num_docu_enc }} </td>
                <td style="text-align: center;"> {{ $encuestado->primer_nombre.' '.$encuestado->segundo_nombre.' '.$encuestado->primer_apellido.' '.$encuestado->segundo_apellido }} </td>                
                <td style="text-align: center;"> {{ link_to('EncuestaSocial/'.$tipoEncuesta.'/'.$encuestado->num_docu_enc, 'Entrar a Encuesta', array("class" => "btn btn-info btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('EncuestadoCrear/'.$tipoEncuesta.'/'.$encuestado->num_docu_enc, 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('EncuestadoElim/'.$tipoEncuesta.'/'.$encuestado->num_docu_enc, 'Eliminar', array("class" => "btn btn-danger", "data-method" => "delete", "rel" => "noflow")) }} </td>
             </tr>
             <?php $a++; ?>
          @endforeach
          
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado Registros </p>
    @endif
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
@stop