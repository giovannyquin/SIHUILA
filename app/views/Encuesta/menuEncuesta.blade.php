@extends("SbAdmin.index")

@section("Titulo")
    Aspectos de Preguntas
@stop

@section("NombrePagina")
    Aspectos de Preguntas
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Administración de la Encuesta </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-2">
            {{ link_to("AspectosPreguntas/{$id}", "Crear Aspecto", array("class" => "btn btn-primary")) }}
        </div>
        <div class="col-xs-12 col-sm-2">
            {{ link_to("TipoAspectosPreguntas/{$id}", "Crear Tipo Aspecto", array("class" => "btn btn-success")) }}
        </div>
        <div class="col-xs-12 col-sm-2">
            {{ link_to("TipoRespuestas/{$id}", "Crear Tipo rpta/ rptas", array("class" => "btn btn-danger")) }}
        </div>
        <div class="col-xs-12 col-sm-2">
            {{ link_to("Preguntas/{$id}", "Crear Preguntas", array("class" => "btn btn-warning")) }}
        </div>
        
    </div>
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
@stop