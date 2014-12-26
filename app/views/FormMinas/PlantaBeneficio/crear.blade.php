@extends("SbAdmin.index")

@section("Titulo")
     Planta de Beneficio
@stop

@section("NombrePagina")
     Planta de Beneficio
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
    @if(isset($planta))
        @if($planta->count())
            <h3>Actualizar Plantas de Benficio ({{ $frente->nombre_mina }})</h3>
            {{ Form::open(array("url"=> "PlantaBeneficio/". $planta->id_planta, "method" => "PUT")) }}
                <div class="row">
            <div class="col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Escribir el Nombre del frente minero")}}
                {{Form::text("txtNombre", Input::old('txtNombre') ? Input::old('txtNombre') : isset($planta->nombre) ? $planta->nombre : null, 
                            array("class" => "form-control", "placeholder" => "Nombre"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-7">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc') ? Input::old('txtDesc') : isset($planta->descripcion) ? $planta->descripcion : null, 
                            array("class" => "form-control", "placeholder" => "Descripción", "size" => "30x3"))}}
                @if($errors->has("txtDesc"))
                @foreach($errors->get("txtDesc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Actualizar", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('PlantaBeneficio/'.$frente->id_mina, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidFrente", $frente->id_mina)}}
        {{ Form::close() }}
        @endif
    @else
        <h3> Crear Planta de Beneficio ({{ $frente->nombre_mina }})</h3>
        {{ Form::open(array("route" => "PlantaBeneficio.create", "method" => "get")) }}
        <div class="row">
            <div class="col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Escribir el Nombre de la unidad minera")}}
                {{Form::text("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Nombre"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-7">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc'), 
                            array("class" => "form-control", "placeholder" => "Descripción", "size" => "30x3"))}}
                @if($errors->has("txtDesc"))
                @foreach($errors->get("txtDesc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('PlantaBeneficio/'.$frente->id_mina, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidFrente", $frente->id_mina, array("id" => "hidFrente"))}}
        {{Form::close()}}
    @endif
</div>
@stop
@section("JsJQuery")

@stop
