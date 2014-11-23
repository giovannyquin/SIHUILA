@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("JsJQuery")
    {{ HTML::script('js/FormMinas/FormMinas.js') }}
@stop
@section("SeccionTrabajo")
@if(Session::get("id_mina"))
            <div class="alert alert-success">{{ Session::get("id_mina")}}</div>
        @endif
<div class="container-fluid">
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#juridico" data-toggle="tab">Juridico</a></li>
            <li class=""><a href="#minero" data-toggle="tab">Minero</a></li>
            <li class=""><a href="#ambiental" data-toggle="tab">Ambiental</a></li>
            <li class=""><a href="#siso" data-toggle="tab">Siso</a></li>
            <li class=""><a href="#biodiversidad" data-toggle="tab">Biodiversidad</a></li>
          </ul>
          <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
                <div class="tab-pane active" id="juridico">
                    <p>Placeholder 1</p>
                </div>
                <div class="tab-pane" id="minero">
                    <p>Placeholder 2</p>
                </div>
                <div class="tab-pane" id="ambiental">
                    <p>Placeholder 3</p>
                </div>
                <div class="tab-pane" id="siso">
                    <p>Placeholder</p>
                </div>
                <div class="tab-pane" id="biodiversidad">
                    <p>Placeholder</p>
                </div>
          </div>
        </div>
</div>
@stop

