@extends("SbAdmin.index")

@section("Titulo")
    Página de Inicio de creación de vendedores
@stop

@section("NombrePagina")
    Pagina de Inicio de creación de Vendedores
@stop

@section("SeccionTrabajo")
<div class="row marketing">
    <h3>Crear Vendedor</h3>
    {{ Form::open(array("url" => "vendedor")) }}
        <!-- El mensaje que se envia por el redirect en el controlador lo podemos obtener con la funcion get de la clase Session -->
        @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
        <div class="row">
            <div class="form-group col-xs-3">
                {{ Form::label("nombre", "Nombre") }}
                {{ Form::text("nombre", Input::old("nombre"), 
                                array("class" => "form-control", "placeholder" => "nombre vendedor", "autocomplete" => "off")
                             ) }}
            </div>
            </div>
        <!-- Verificamos si hubo algún error en el campo -->
        @if( $errors->has("nombre"))
        <div class="row">
            <div class="form-group alert alert-danger col-xs-3">
                @foreach($errors->get("nombre") as $error)
                    * {{$error}} <br />
                @endforeach
            </div>
        </div>
        @endif
        
        <div class="row">
            <div class="form-group col-xs-3">
                {{ Form::label("apellido", "Apellido") }}
                {{ Form::text("apellido", Input::old("apellido"), 
                                array("class" => "form-control", "placeholder" => "apellido vendedor", "autocomplete" =>"off")
                              ) }}
            </div>
            </div>
            @if($errors->has("apellido"))
                <div class="row">
                    <div class="alert alert-danger col-xs-3">
                        @foreach($errors->get("apellido") as $error)
                            * {{ $error }} <br />
                        @endforeach
                    </div>
                </div>
            @endif
        
        <div class="row">
            <div class="form-group col-xs-3">
        {{ Form::submit("Guardar", array("class" => "btn btn-success")) }}
        {{ Form::reset("Resetar", array("class" => "btn btn-default")) }}
            </div>
        </div>
    {{ Form::close() }}
</div>
<h3>Vendedores</h3>
<div class="list-group">
    @foreach($vendedores as $vendedor)
    <a href="#" class="list-group-item">{{ $vendedor->nombre. " ". $vendedor->apellido }}</a>
    @endforeach
</div>
@stop