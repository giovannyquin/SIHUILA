@extends("SbAdmin.index")

@section("Titulo")
    Aspectos Mineros
@stop

@section("NombrePagina")
    {{ link_to("ListarUnidades/{$mina->id_minamina}", $mina->nombre) }} / Aspectos Mineros
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($detalle as $detalle)
    <div class="row"></div>
    @endforeach
    @foreach ($operador as $operador)
    <div class="row"></div>
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li>{{ link_to("pestanaJuridico/{$mina->id_minamina}", "Juridico") }}</li>
            <li class="active"><a href="#minero" data-toggle="tab">Minero</a></li>
          </ul>
    </div>
</div>
<div class="marketing">
    @if(Session::get("id_mina"))
            <div class="alert alert-success">{{ Session::get("id_mina")}}</div>
        @endif
		{{ Form::open(array("route"=>"pestanaMineroUnidad.store")) }}
    <p class="bg-primary text-center" >Diagnostico de Formalización Minera</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMineral", "Mineral", array("class" => "control-label")) }}
            {{ Form::select("selMineral",$comMineral,isset($detalle->id_mineral) ? $detalle->id_mineral : null) }}
            @if($errors->has("selMineral"))
                @foreach($errors->get("selMineral") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDeptoMina", "Departamento", array("class" => "control-label")) }}
            {{ Form::select("selDeptoMina",$comDeptno,isset($mina->id_depto) ? $mina->id_depto : null) }}
            @if($errors->has("selDeptoMina"))
                @foreach($errors->get("selDeptoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMunicipioMina", "Municipio", array("class" => "control-label")) }}
            {{ Form::select("selMunicipioMina",$comMunici,isset($mina->id_municipio) ? $mina->id_municipio : null) }}
            @if($errors->has("selMunicipioMina"))
                @foreach($errors->get("selMunicipioMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selVeredaMina", "Vereda", array("class" => "control-label")) }}
            {{ Form::select("selVeredaMina",$comVereda,isset($mina->id_vereda) ? $mina->id_vereda : null) }}
            @if($errors->has("selVeredaMina"))
                @foreach($errors->get("selVeredaMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="txtFecha" class="control-label">fecha en que se realizó la visita</label>
            {{ Form::text("txtFecha",Input::old('txtFecha') ? Input::old('txtFecha'):isset($detalle->fecha_visita) ? $detalle->fecha_visita:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'YYYY/MM/DD','autocomplete'=>'off')) }}
            @if($errors->has("txtFecha"))
                @foreach($errors->get("txtFecha") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Datos Generales del responsable explotación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCedula", "Cedula Responsable", array("class" => "control-label")) }}
            {{ Form::text('txtCedula',Input::old('txtCedula') ? Input::old('txtCedula'):isset($responsable->ced_responsable) ? $responsable->ced_responsable:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Cedula Responsable','autocomplete'=>'off')) }}
				</div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimer", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text('txtPrimer',Input::old('txtPrimer') ? Input::old('txtPrimer'):isset($responsable->primer_nombre) ? $responsable->primer_nombre:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Primer Nombre','autocomplete'=>'off')) }}

            @if($errors->has("txtPrimer"))
                @foreach($errors->get("txtPrimer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundo", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundo",Input::old("txtSegundo") ? Input::old('txtSegundo'):isset($responsable->segundo_nombre) ? $responsable->segundo_nombre:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Segundo Nombre','autocomplete'=>'off')) }}
            @if($errors->has("txtSegundo"))
                @foreach($errors->get("txtSegundo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApe", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApe",Input::old("txtPrimerApe") ? Input::old('txtPrimerApe'):isset($responsable->primer_apellido) ? $responsable->primer_apellido:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Primer Apellido','autocomplete'=>'off')) }}
            @if($errors->has("txtPrimerApe"))
                @foreach($errors->get("txtPrimerApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApe", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApe",Input::old("txtSegundoApe") ? Input::old('txtSegundoApe'):isset($responsable->segundo_apellido) ? $responsable->segundo_apellido:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Segundo Apellido','autocomplete'=>'off')) }}
            @if($errors->has("txtSegundoApe"))
                @foreach($errors->get("txtSegundoApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("txtDireccion", "Dirección", array("class" => "control-label")) }}
            {{ Form::text("txtDireccion",Input::old("txtDireccion") ? Input::old('txtDireccion'):isset($responsable->direccion) ? $responsable->direccion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Direccion','autocomplete'=>'off')) }}
            @if($errors->has("txtDireccion"))
                @foreach($errors->get("txtDireccion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selDepto", "Departamento", array("class" => "control-label")) }}
            {{ Form::select("selDepto",$comDeptnoRes,isset($responsable->depto) ? $responsable->depto : null) }}
            @if($errors->has("selDepto"))
                @foreach($errors->get("selDepto") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMunicipio", "Municipio", array("class" => "control-label")) }}
            {{ Form::select("selMunicipio",$comMuniciRes, isset($responsable->municipio) ? $responsable->municipio : null) }}
            @if($errors->has("selMunicipio"))
                @foreach($errors->get("selMunicipio") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selVereda", "Vereda", array("class" => "control-label")) }}
            {{ Form::select("selVereda",$comVeredaRes, isset($responsable->vereda) ? $responsable->vereda : null) }}
            @if($errors->has("selVereda"))
                @foreach($errors->get("selVereda") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTelefono", "Teléfono", array("class" => "control-label")) }}
            {{ Form::text("txtTelefono",Input::old("txtTelefono") ? Input::old('txtTelefono'):isset($responsable->telefono_responsable) ? $responsable->telefono_responsable:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Telefono','autocomplete'=>'off')) }}
            @if($errors->has("txtTelefono"))
                @foreach($errors->get("txtTelefono") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCelular", "Celular", array("class" => "control-label")) }}
            {{ Form::text("txtCelular",Input::old("txtCelular") ? Input::old('txtCelular'):isset($responsable->celular_responsable) ? $responsable->celular_responsable:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Celular','autocomplete'=>'off')) }}
            @if($errors->has("txtCelular"))
                @foreach($errors->get("txtCelular") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCorreo", "Correo", array("class" => "control-label")) }}
            {{ Form::text("txtCorreo",Input::old("txtCorreo") ? Input::old('txtCorreo'):isset($responsable->correo_responsable) ? $responsable->correo_responsable:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Correo Electronico','autocomplete'=>'off')) }}
            @if($errors->has("txtCorreo"))
                @foreach($errors->get("txtCorreo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
    </div>
    <p class="bg-primary text-center" >Datos del Operador Minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCedulaOperador", "Cedula", array("class" => "control-label")) }}
            {{ Form::text("txtCedulaOperador",Input::old("txtCedulaOperador") ? Input::old('txtCedulaOperador'):isset($operador->ced_operador) ? $operador->ced_operador:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Cedula','autocomplete'=>'off')) }}
            @if($errors->has("txtCedulaOperador"))
                @foreach($errors->get("txtCedulaOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerOperador", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerOperador",Input::old("txtPrimerOperador") ? Input::old('txtPrimerOperador'):isset($operador->primer_nombre) ? $operador->primer_nombre:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Primer Nombre','autocomplete'=>'off')) }}
            @if($errors->has("txtPrimerOperador"))
                @foreach($errors->get("txtPrimerOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoOperador", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoOperador",Input::old("txtSegundoOperador") ? Input::old('txtSegundoOperador'):isset($operador->segundo_nombre) ? $operador->segundo_nombre:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Segundo Nombre','autocomplete'=>'off')) }}
            @if($errors->has("txtSegundoOperador"))
                @foreach($errors->get("txtSegundoOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApeOperador", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApeOperador",Input::old("txtPrimerApeOperador") ? Input::old('txtPrimerApeOperador'):isset($operador->primer_apellido) ? $operador->primer_apellido:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Primer Apellido','autocomplete'=>'off')) }}
            @if($errors->has("txtPrimerApeOperador"))
                @foreach($errors->get("txtPrimerApeOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApeOperador", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApeOperador",Input::old("txtSegundoApeOperador") ? Input::old('txtSegundoApeOperador'):isset($operador->segundo_apellido) ? $operador->segundo_apellido:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Segundo Apellido','autocomplete'=>'off')) }}
            @if($errors->has("txtSegundoApeOperador"))
                @foreach($errors->get("txtSegundoApeOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Datos Generales de la Mina</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtNombreMina", "Nombre de la unidad minera", array("class" => "control-label")) }}
            {{ Form::text("txtNombreMina",Input::old("txtNombreMina") ? Input::old('txtNombreMina'):isset($mina->nombre_mina) ? $mina->nombre_mina:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Nombre','autocomplete'=>'off')) }}
            @if($errors->has("txtNombreMina"))
                @foreach($errors->get("txtNombreMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEstadoEtapa", "Estado Actual de la Etapa", array("class" => "control-label")) }}
            {{ Form::text("txtEstadoEtapa",Input::old("txtEstadoEtapa") ? Input::old('txtEstadoEtapa'):isset($detalle->estado_actual_etapa) ? $detalle->estado_actual_etapa:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Estado Actual de la Etapa','autocomplete'=>'off')) }}
            @if($errors->has("txtEstadoEtapa"))
                @foreach($errors->get("txtEstadoEtapa") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtArea", 'Área de la Mina en Hectáreas', array("class" => "control-label")) }}
            {{ Form::text("txtArea",Input::old("txtArea") ? Input::old('txtArea'):isset($detalle->area) ? $detalle->area:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Área de la Mina en Hectáreas','autocomplete'=>'off')) }}
            @if($errors->has("txtArea"))
                @foreach($errors->get("txtArea") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
		<br /><br />
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$mina->id_minamina) }}
    {{ Form::close() }}
</div>
@stop

@section("JsJQuery")
    {{ HTML::script('js/FormMinas/FormMinas.js') }}
    {{ HTML::script('js/restfulizer.js') }}
<script>
$('#selDeptoMina').change(function(){ 
        $.post("{{ url('selectDependientes')}}",
            { dato: $(this).val(),
                opcion: 'mostrarMunicipio'},
                function(data) {
                    $('#selMunicipioMina').empty();
                    $('#selVeredaMina').empty();
                    $('#selMunicipioMina').append("<option value=''>" + "Seleccione.." + "</option>");
                    $('#selVeredaMina').append("<option value=''>" + "Seleccione.." + "</option>");
                    $.each(data, function(key, element) {
                            $('#selMunicipioMina').append("<option value='" + key + "'>" + element + "</option>");
                    });
            });
    });
   
    $('#selMunicipioMina').change(function(){ 
        $.post("{{ url('selectDependientes')}}",
            { dato: $(this).val(),
                opcion: 'mostrarVereda'},
                function(data) {
                    $('#selVeredaMina').empty();
                    $('#selVeredaMina').append("<option value=''>" + "Seleccione.." + "</option>");
                    $.each(data, function(key, element) {
                            $('#selVeredaMina').append("<option value='" + key + "'>" + element + "</option>");
                    });
            });
    });
    
$('#selDepto').change(function(){ 
        $.post("{{ url('selectDependientes')}}",
            { dato: $(this).val(),
                opcion: 'mostrarMunicipio'},
                function(data) {
                    $('#selMunicipio').empty();
                    $('#selVereda').empty();
                    $('#selMunicipio').append("<option value=''>" + "Seleccione.." + "</option>");
                    $('#selVereda').append("<option value=''>" + "Seleccione.." + "</option>");
                    $.each(data, function(key, element) {
                            $('#selMunicipio').append("<option value='" + key + "'>" + element + "</option>");
                    });
            });
    });
   
$('#selMunicipio').change(function(){ 
    $.post("{{ url('selectDependientes')}}",
        { dato: $(this).val(),
            opcion: 'mostrarVereda'},
            function(data) {
                $('#selVereda').empty();
                $('#selVereda').append("<option value=''>" + "Seleccione.." + "</option>");
                $.each(data, function(key, element) {
                        $('#selVereda').append("<option value='" + key + "'>" + element + "</option>");
                });
        });
});
</script>
@stop
