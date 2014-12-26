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
    @if(isset($tipoaspecto))
        @if($tipoaspecto->count())
            <h3>Actualizar Tipos Aspectos Preguntas</h3>
            {{ Form::open(array("url"=> "TipoAspectosPreguntas/". $tipoaspecto->id_tipo_asp_preg, "method" => "PUT")) }}
            <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-md-4">
                    {{Form::label("selAspecto", "Aspectos")}}
                    {{Form::select("selAspecto", $aspecto, $tipoaspecto->id_aspecto_preg ? $tipoaspecto->id_aspecto_preg : null )}}
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-md-6">
                    {{Form::label("txtNombre", "Nombre")}}
                    {{Form::text("txtNombre", $tipoaspecto->nombre, array("class" => "form-control", "placeholder" => "Nombre"))}}
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-md-6">
                    {{Form::label("txtDesc", "Descripción")}}
                    {{Form::textarea("txtDesc", $tipoaspecto->descripcion, array("class" => "form-control", "placeholder" => "Descripción"))}}
                </div>
            </div>
            <div class="row">
                <div class="row col-xs-2">
                    {{Form::submit("Actualizar", array("class" => "form-control btn btn-primary"))}}
                </div>
                <div class="row col-xs-2">
                    {{ link_to('TipoAspectosPreguntas/'.$tipoaspecto->id_tipo_encuesta, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
            </div>
            {{ Form::close() }}
        @endif
    @else
        <h3> Crear Tipo Aspectos de Preguntas </h3>
        {{ Form::open(array("route" => "TipoAspectosPreguntas.create", "method" => "get")) }}
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selAspecto", "Aspectos")}}
                {{Form::select("selAspecto", $aspecto, null )}}
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Nombre")}}
                {{Form::text("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Nombre"))}}
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc'), array("class" => "form-control", "placeholder" => "Descripción"))}}
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('TipoAspectosPreguntas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{Form::close()}}
    @endif
</div>
@stop
