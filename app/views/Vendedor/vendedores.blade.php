@extends("SbAdmin.index")

@section("Titulo")
    Página de Inicio de Vendedores
@stop

@section("NombrePagina")
    Pagina de Inicio de Vendedores
@stop

@section("SeccionTrabajo")
<div class="jumbotron">
    <h3>Tienda</h3>
    <p class="lead">Se pueden crear vendedores y productos en sus secciones </p>
</div>

<div class="row marketing">
    @foreach($vendedores as $vendedor)
    <div class="panel panel-primary">
        <div class="panel-heading">
            {{ $vendedor->nombre." ".$vendedor->apellido}}
        </div>
        <ul class="list-group">
            @foreach($vendedor->productos as $producto)
            <li class="list-group-item">
                {{ $producto->descripcion." ".$producto->precio}}
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
@stop