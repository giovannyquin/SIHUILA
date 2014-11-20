@extends("SbAdmin.index")

@section("Titulo")
    Formulario de Usuarios
@stop

@section("NombrePagina")
    Formulario de Usuarios
@stop
@section("JsJQuery")
    <script src="js/FormMinas/FormMinas.js"></script>
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#juridico" data-toggle="tab">Juridico</a></li>
            <li class=""><a href="#minero" data-toggle="tab">Minero</a></li>
            <li class=""><a href="#ambiental" data-toggle="tab">Ambiental</a></li>
            <li class=""><a href="#tab4" data-toggle="tab">Help</a></li>
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
            <div class="tab-pane" id="tab4">
              <p>Placeholder</p>
            </div>
          </div>
        </div>
</div>
@stop

