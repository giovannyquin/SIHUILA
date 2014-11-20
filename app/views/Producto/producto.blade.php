@extends("SbAdmin.index")

@section("Titulo")
    Página de Inicio de creación de Productos
@stop

@section("NombrePagina")
    Pagina de Inicio de creación de Productos
@stop

@section("SeccionTrabajo")
<div class="row marketing">
    <h3>Crear Producto</h3>
    {{ Form::open(array("url"=>"producto")) }}
        @if(Session::get("mensaje"))
            <div class="alert alert-success">{{ Session::get("mensaje")}}</div>
        @endif
        <div class="row">
            <div class="form-group col-xs-3">
                {{ Form::label("descripcion", "Descripción") }}
                {{ Form::text("descripcion", Input::old("descripcion"), 
                                array("class" => "form-control", "placeholder" => "Descripción del producto", "autocomplete"=> "off")) }}
            </div>
        </div>
        @if($errors->has("descripcion"))
        <div class="row">
            <div class="alert alert-danger col-xs-3">
                @foreach($errors->get("descripcion") as $error)
                    * {{ $error }} <br />
                @endforeach
            </div>
        </div>
        @endif
        <div class="row">
            <div class="form-group col-xs-3">
                {{ Form::label("precio", "Precio") }}
                {{ Form::text("precio", Input::old("precio"), array("class" => "form-control", "placeholder" => "precio del producto", "autocomplete" => "off")) }}
            </div>
        </div>
        @if($errors->has("precio"))
        <div class="row">
            <div class="alert alert-danger col-xs-3">
                @foreach($errors->get("precio") as $error)
                    * {{ $error }} <br />
                @endforeach
            </div>
        </div>
        @endif
        <!-- Creamos un select para escoger quien es el dueño del producto -->
        <div class="row">
            <div class="form-group col-xs-3">
                {{ Form::label("vendedor_id","Vendedor") }}
                <select class="form-control" name="vendedor_id">
                    @foreach($vendedores as $vendedor)
                        <option value="{{$vendedor->id}}">{{$vendedor->nombre." ".$vendedor->apellido}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($errors->has("vendedor_id"))
        <div class="alert alert-danger">
            @foreach($errors->get("vendedor_id") as $error)
                * {{ $error }} <br />
            @endforeach
        </div>
        @endif
        {{ Form::submit("Guardar", array("class" => "btn btn-success")) }}
        {{ Form::button("Resetear", array("class" => "btn btn-default")) }}
    {{Form::close()}}
</div>
<h3>Productos</h3>
<div class="list-group">
    @foreach($productos as $producto)
    <a href="#" class="list-group-item">{{$producto->descripcion." ".$producto->precio}}</a>
    @endforeach
</div>
@stop