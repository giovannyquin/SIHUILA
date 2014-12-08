@extends("SbAdmin.index")

@section("Titulo")
    Crear Aspectos de Preguntas
@stop

@section("NombrePagina")
    Crear Aspectos de Preguntas
@stop
@section("JsJQuery")
    
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(isset($aspecto))
        @if($aspecto->count())
            <h3>Actualizar Aspectos Preguntas</h3>
            {{ Form::open(array("url"=> "AspectosPreguntas/". $aspecto->id_aspecto_preg, "method" => "PUT")) }}
            <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-md-6">
                    {{Form::label("txtNombre", "Nombre")}}
                    {{Form::text("txtNombre", $aspecto->nombre, array("class" => "form-control", "placeholder" => "Nombre"))}}
                </div>
                <div class="form-group form-group-sm col-xs-12 col-md-6">
                    {{Form::label("txtDesc", "Descripción")}}
                    {{Form::textarea("txtDesc", $aspecto->descripcion, array("class" => "form-control", "placeholder" => "Descripción"))}}
                </div>
                <div class="row col-xs-3">
                    {{Form::submit("Actualizar", array("class" => "form-control btn btn-primary"))}}
                </div>
                <div class="row col-xs-3">
                    {{ link_to('AspectosPreguntas/'.$aspecto->id_tipo_encuesta, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
            </div>
            {{ Form::close() }}
        @endif
    @else
        <h3> Crear Aspectos de Preguntas </h3>
        {{ Form::open(array("route" => "AspectosPreguntas.create", "method" => "get")) }}
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-6">
                {{Form::label("txtNombre", "Nombre")}}
                {{Form::text("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Nombre"))}}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-md-6">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc'), array("class" => "form-control", "placeholder" => "Descripción"))}}
            </div>
        </div>
        <div class="row col-xs-3">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-3">
                    {{ link_to('AspectosPreguntas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{Form::close()}}
    @endif
</div>
@stop
