@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($minas as $mina)
    <div class="row">{{$mina->nombre_mina}}</div>
    @endforeach
    @foreach ($detalle as $detalle)
    <div class="row"></div>
    @endforeach
    @foreach ($responsable as $responsable)
    <div class="row"></div>
    @endforeach
    @foreach ($operador as $operador)
    <div class="row"></div>
    @endforeach
    @foreach ($geo as $geo)
    <div class="row"></div>
    @endforeach
    @foreach ($produccion as $produccion)
    <div class="row"></div>
    @endforeach
    @foreach ($talentohumano as $talentohumano)
    <div class="row">
		</div>
    @endforeach 
    @foreach ($plano as $plano)
    <div class="row"></div>
    @endforeach
    @foreach ($metodoexplotacion as $metodoexplotacion)
    <div class="row"></div>
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li >{{ link_to("pestanaJuridico/{$mina->id_mina}", "Juridico") }}</li>
            <li class="active"><a href="#minero" data-toggle="tab">Minero</a></li>
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>
            <li class="">{{ link_to("pestanaBiodiversidad/{$mina->id_mina}", "Biodiversidad") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    @if(Session::get("id_mina"))
            <div class="alert alert-success">{{ Session::get("id_mina")}}</div>
        @endif
		{{ Form::open(array("route"=>"pestanaMinero.store")) }}
    <p class="bg-primary text-center" >Fecha de la Visita</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="txtFecha" class="control-label">fecha en que se realizó la visita</label>
						{{ Form::text("txtFecha",Input::old('txtFecha') ? Input::old('txtFecha'):isset($detalle->fecha_visita) ? $detalle->fecha_visita:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Fecha de la Visita','autocomplete'=>'off')) }}

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
            {{ Form::label("txtDireccion", "DirecciÃ³n", array("class" => "control-label")) }}
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
            {{ Form::select("selDepto",$comDeptno,isset($responsable->depto) ? $responsable->depto : null) }}
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
            {{ Form::select("selMunicipio",$comMunici,isset($responsable->municipio) ? $responsable->municipio : null) }}
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
            {{ Form::select("selVereda",$comVereda, isset($responsable->vereda) ? $responsable->vereda : null) }}
            @if($errors->has("selVereda"))
                @foreach($errors->get("selVereda") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTelefono", "TelÃ©fono", array("class" => "control-label")) }}
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
            {{ Form::label("txtNombreMina", "Nombre de la Mina", array("class" => "control-label")) }}
            {{ Form::text("txtNombreMina",Input::old("txtNombreMina") ? Input::old('txtNombreMina'):isset($mina->nombre_mina) ? $mina->nombre_mina:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Nombre de la Mina','autocomplete'=>'off')) }}
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
            {{ Form::label("txtArea", 'Ã�rea de la Mina en HectÃ¡reas', array("class" => "control-label")) }}
            {{ Form::text("txtArea",Input::old("txtArea") ? Input::old('txtArea'):isset($detalle->area) ? $detalle->area:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Ã�rea de la Mina en HectÃ¡reas','autocomplete'=>'off')) }}
            @if($errors->has("txtArea"))
                @foreach($errors->get("txtArea") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDeptoMina", "Departamento", array("class" => "control-label")) }}
            {{ Form::select("selDeptoMina",$comDeptno,isset($mina->depto) ? $mina->depto : null) }}
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
            {{ Form::select("selMunicipioMina",$comMunici,isset($mina->municipio) ? $mina->municipio : null) }}
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
            {{ Form::select("selVeredaMina",$comVereda,isset($mina->municipio) ? $mina->vereda : null) }}
            @if($errors->has("selVeredaMina"))
                @foreach($errors->get("selVeredaMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
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
    <p class="bg-primary text-center" >UbicaciÃ³n Georeferenciacion del Frente de la Bocamina (coordenas planas)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selFrente", "Frente o Bocamina", array("class" => "control-label")) }}
            {{ Form::select("selFrente",$comFrenteBocamina,isset($detalle->id_mineral) ? $detalle->id_mineral : null) }}
            @if($errors->has("selFrente"))
                @foreach($errors->get("selFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtNorte", 'Norte (X)', array("class" => "control-label")) }}
            {{ Form::text("txtNorte",Input::old("txtNorte") ? Input::old('txtNorte'):isset($geo->norte) ? $geo->norte:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Norte','autocomplete'=>'off')) }}
            @if($errors->has("txtNorte"))
                @foreach($errors->get("txtNorte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtEste", 'Este (Y)', array("class" => "control-label")) }}
            {{ Form::text("txtEste",Input::old("txtEste") ? Input::old('txtEste'):isset($geo->este) ? $geo->este:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Este','autocomplete'=>'off')) }}
            @if($errors->has("txtEste"))
                @foreach($errors->get("txtEste") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtAltura", 'Altura (msnm)', array("class" => "control-label")) }}
            {{ Form::text("txtAltura",Input::old("txtAltura") ? Input::old('txtAltura'):isset($geo->altura) ? $geo->altura:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Altura','autocomplete'=>'off')) }}
            @if($errors->has("txtAltura"))
                @foreach($errors->get("txtAltura") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoFrente", "Estado", array("class" => "control-label")) }}
            <select name="selEstadoFrente" id="selEstadoFrente">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selEstadoFrente"))
                @foreach($errors->get("selEstadoFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTurnos", 'Turnos/dÃ­a', array("class" => "control-label")) }}
            {{ Form::text("txtTurnos",Input::old("txtTurnos") ? Input::old('txtTurnos'):isset($geo->turno_dia) ? $geo->turno_dia:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Turnos','autocomplete'=>'off')) }}
            @if($errors->has("txtTurnos"))
                @foreach($errors->get("txtTurnos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtDias", 'DÃ­as/Semana', array("class" => "control-label")) }}
            {{ Form::text("txtDias",Input::old("txtDias") ? Input::old('txtDias'):isset($geo->dias_semana) ? $geo->dias_semana:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Dias','autocomplete'=>'off')) }}
            @if($errors->has("txtDias"))
                @foreach($errors->get("txtDias") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtHoras", 'Hotas/Turno', array("class" => "control-label")) }}
            {{ Form::text("txtHoras",Input::old("txtHoras") ? Input::old('txtHoras'):isset($geo->horas_turno) ? $geo->horas_turno:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Horas','autocomplete'=>'off')) }}
            @if($errors->has("txtHoras"))
                @foreach($errors->get("txtHoras") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsFrente", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsFrente",Input::old("txtObsFrente") ? Input::old('txtObsFrente'):isset($geo->observaciones_geo) ? $geo->observaciones_geo:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsFrente"))
                @foreach($errors->get("txtObsFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >ProducciÃ³n Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProd", "Mineral", array("class" => "control-label")) }}
            {{ Form::select("selMineralProd",$comMineral,isset($produccion->id_mineral) ? $produccion->id_mineral : null) }}
            @if($errors->has("selMineralProd"))
                @foreach($errors->get("selMineralProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProd", "Unidad", array("class" => "control-label")) }}
            {{ Form::select("selUnidadProd",$comUnidad,isset($produccion->id_unidad) ? $produccion->id_unidad : null) }}
            @if($errors->has("selUnidadProd"))
                @foreach($errors->get("selUnidadProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidad", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidad",Input::old("txtCantidad") ? Input::old('txtCantidad'):isset($produccion->cantidad) ? $produccion->cantidad:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Cantidad','autocomplete'=>'off')) }}
            @if($errors->has("txtCantidad"))
                @foreach($errors->get("txtCantidad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProd", "AÃ±o", array("class" => "control-label")) }}
            {{ Form::selectYear('selAgnoProd',2000,2015,isset($produccion->agno) ? $produccion->agno : null) }}
            @if($errors->has("selAgnoProd"))
                @foreach($errors->get("selAgnoProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProd", "Mes", array("class" => "control-label")) }}
            {{ Form::selectMonth('selMesProd',isset($produccion->mes) ? $produccion->mes : null) }}
            @if($errors->has("selMesProd"))
                @foreach($errors->get("selMesProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsProd", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsProd",Input::old("txtObsProd") ? Input::old('txtObsProd'):isset($produccion->observaciones_produccion) ? $produccion->observaciones_produccion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsProd"))
                @foreach($errors->get("txtObsProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >ProducciÃ³n Otro Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProdOtro", "Mineral", array("class" => "control-label")) }}
            {{ Form::select("selMineralProdOtro",$comMineral,isset($produccion->id_mineral) ? $produccion->id_mineral : null) }}
            @if($errors->has("selMineralProdOtro"))
                @foreach($errors->get("selMineralProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProdOtro", "Unidad", array("class" => "control-label")) }}
            {{ Form::select("selUnidadProdOtro",$comUnidad,isset($produccion->id_unidad) ? $produccion->id_unidad : null) }}
            @if($errors->has("selUnidadProdOtro"))
                @foreach($errors->get("selUnidadProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidadOtro", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidadOtro", Input::old("txtCantidadOtro"),
                            array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidadOtro"))
                @foreach($errors->get("txtCantidadOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProdOtro", "AÃ±o", array("class" => "control-label")) }}
            <select name="selAgnoProdOtro" id="selAgnoProdOtro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selAgnoProdOtro"))
                @foreach($errors->get("selAgnoProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProdOtro", "Mes", array("class" => "control-label")) }}
            <select name="selMesProdOtro" id="selMesProdOtro">
                <option value="">Seleccione..</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
            @if($errors->has("selMesProdOtro"))
                @foreach($errors->get("selMesProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsProdOtro", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsProdOtro", Input::old("txtObsProdOtro"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsProdOtro"))
                @foreach($errors->get("txtObsProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Talento Humano</p>
    <p class="bg-primary text-center" >Responsable de ExplotaciÃ³n Permanente</p>

<!---------------------------------------- Responsable de Explotacion Permanente ---------------------------------------------->

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnResExpPer" id="btnResExpPer" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divResExpPer">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfPer[]", 'NÃºmero de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPer[]",Input::old("txtEmpPer[]") ? Input::old('txtProfPer[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfPer[]"))
                @foreach($errors->get("txtProfPer[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPer[]", 'NÃºmero de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old('txtProfPer[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Empleados','autocomplete'=>'off')) }}
            @if($errors->has("txtEmpPer[]"))
                @foreach($errors->get("txtEmpPer[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}
            {{Form::select("selConPer[]",$comTipoContrato) }}
            @if($errors->has("selConPer[]"))
                @foreach($errors->get("selConPer[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
	    </div>
    </div>

		@foreach($arrTalHumResExpPer as $talhumresexpper)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtProfPer[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtProfPer[]",Input::old("txtProfPer[]") ? Input::old('txtProfPer[]'):isset($talhumresexpper['num_profesionales']) ? $talhumresexpper['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfPer[]"))
										@foreach($errors->get("txtProfPer[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpPer[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old('txtEmpPer[]'):isset($talhumresexpper['num_empleados']) ? $talhumresexpper['num_empleados']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtEmpPer[]"))
										@foreach($errors->get("txtEmpPer[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}
								{{ Form::select("selConPer[]",$comTipoContrato,isset($talhumresexpper['tipo_contrato']) ? $talhumresexpper['tipo_contrato']:null) }}
								@if($errors->has("selConPer[]"))
										@foreach($errors->get("selConPer[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('talentoHumanoElim',array($talhumresexpper['id_mina'],$talhumresexpper['tipo_contrato'],'RESPONSABLE EXPLOTACION PERMANENTE','PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

<!---------------------------------------- Responsable de Explotacion Permanente ---------------------------------------------->


<!---------------------------------------- Responsable de ExplotaciÃ³n Temporal ---------------------------------------------->
    <p class="bg-primary text-center" >Responsable de ExplotaciÃ³n Temporal</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnResExpTem" id="btnResExpTem" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divResExpTem">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfTem[]", 'NÃºmero de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old('txtProfTem[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfTem[]"))
                @foreach($errors->get("txtProfTem[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTem[]", 'NÃºmero de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTem[]",Input::old("txtEmpTem[]") ? Input::old('txtEmpTem[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Empleados','autocomplete'=>'off')) }}
            @if($errors->has("txtEmpTem[]"))
                @foreach($errors->get("txtEmpTem[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selConTem[]", "Tipo de Contrato", array("class" => "control-label")) }}
            {{Form::select("selConTem[]",$comTipoContrato) }}
            @if($errors->has("selConTem[]"))
                @foreach($errors->get("selConTem[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
	    </div>
    </div>

		@foreach($arrTalHumResExpTem as $talhumresexptem)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtProfTem[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old('txtProfTem[]'):isset($talhumresexptem['num_profesionales']) ? $talhumresexptem['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfTem[]"))
										@foreach($errors->get("txtProfTem[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpTem[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtEmpTem[]",Input::old("txtEmpTem[]") ? Input::old('txtEmpTem[]'):isset($talhumresexptem['num_empleados']) ? $talhumresexptem['num_empleados']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtEmpTem[]"))
										@foreach($errors->get("txtEmpTem[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selConTem[]", "Tipo de Contrato", array("class" => "control-label")) }}
								{{ Form::select("selConTem[]",$comTipoContrato,isset($talhumresexptem['tipo_contrato']) ? $talhumresexptem['tipo_contrato']:null) }}
								@if($errors->has("selConTem[]"))
										@foreach($errors->get("selConTem[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('talentoHumanoElim',array($talhumresexptem['id_mina'],$talhumresexptem['tipo_contrato'],'RESPONSABLE EXPLOTACION TEMPORAL','PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

<!---------------------------------------- Responsable de ExplotaciÃ³n Temporal ---------------------------------------------->


<!---------------------------------------- Operador Permanente ---------------------------------------------->
    <p class="bg-primary text-center" >Operador Permanente</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnOpePer" id="btnOpePer" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divOpePer">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtProfPerOpe[]", 'NÃºmero de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old('txtProfPerOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfPerOpe[]"))
                @foreach($errors->get("txtProfPerOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPerOpe[]", 'NÃºmero de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPerOpe[]",Input::old("txtEmpPerOpe[]") ? Input::old('txtEmpPerOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Empleados','autocomplete'=>'off')) }}
            @if($errors->has("txtEmpPerOpe[]"))
                @foreach($errors->get("txtEmpPerOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selConPerOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}
            {{Form::select("selConPerOpe[]",$comTipoContrato) }}
            @if($errors->has("selConPerOpe[]"))
                @foreach($errors->get("selConPerOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
	    </div>
    </div>

		@foreach($arrTalHumOpePer as $talhumopeper)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("txtProfPerOpe[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old('txtProfPerOpe[]'):isset($talhumopeper['num_profesionales']) ? $talhumopeper['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfPerOpe[]"))
										@foreach($errors->get("txtProfPerOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpPerOpe[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtEmpPerOpe[]",Input::old("txtEmpPerOpe[]") ? Input::old('txtEmpPerOpe[]'):isset($talhumopeper['num_empleados']) ? $talhumopeper['num_empleados']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtEmpPerOpe[]"))
										@foreach($errors->get("txtEmpPerOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{Form::label("selConPerOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}
								{{ Form::select("selConPerOpe[]",$comTipoContrato,isset($talhumopeper['tipo_contrato']) ? $talhumopeper['tipo_contrato']:null) }}
								@if($errors->has("selConPerOpe[]"))
										@foreach($errors->get("selConPerOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('talentoHumanoElim',array($talhumopeper['id_mina'],$talhumopeper['tipo_contrato'],'OPERADOR PERMANENTE','PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

<!---------------------------------------- Operador Permanente ---------------------------------------------->


<!---------------------------------------- Operador Temporal ---------------------------------------------->
    <p class="bg-primary text-center" >Operador Temporal</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnOpeTem" id="btnOpeTem" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divOpeTem">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtProfTemOpe[]", 'NÃºmero de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old('txtProfTemOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfTemOpe[]"))
                @foreach($errors->get("txtProfTemOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTemOpe[]", 'NÃºmero de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTemOpe[]",Input::old("txtEmpTemOpe[]") ? Input::old('txtEmpTemOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'NÃºmero de Empleados','autocomplete'=>'off')) }}
            @if($errors->has("txtEmpTemOpe[]"))
                @foreach($errors->get("txtEmpTemOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selConEmpOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}
            {{Form::select("selConEmpOpe[]",$comTipoContrato) }}
            @if($errors->has("selConEmpOpe[]"))
                @foreach($errors->get("selConPerOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
	    </div>
    </div>

		@foreach($arrTalHumOpeTem as $talhumopetem)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("txtProfTemOpe[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old('txtProfTemOpe[]'):isset($talhumopetem['num_profesionales']) ? $talhumopetem['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfTemOpe[]"))
										@foreach($errors->get("txtProfTemOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpTemOpe[]",'NÃºmero de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtEmpTemOpe[]",Input::old("txtEmpTemOpe[]") ? Input::old('txtEmpTemOpe[]'):isset($talhumopetem['num_empleados']) ? $talhumopetem['num_empleados']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtEmpTemOpe[]"))
										@foreach($errors->get("txtEmpTemOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{Form::label("selConEmpOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}
								{{ Form::select("selConEmpOpe[]",$comTipoContrato,isset($talhumopetem['tipo_contrato']) ? $talhumopetem['tipo_contrato']:null) }}
								@if($errors->has("selConEmpOpe[]"))
										@foreach($errors->get("selConEmpOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('talentoHumanoElim',array($talhumopetem['id_mina'],$talhumopetem['tipo_contrato'],'OPERADOR TEMPORAL','PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

<!---------------------------------------- Operador Temporal ---------------------------------------------->

    <p class="bg-primary text-center" >Seguridad Social</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenSalud", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenSalud" id="selRegimenSalud">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenSalud"))
                @foreach($errors->get("selRegimenSalud") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantSalud", 'NÃºmero de Personas (Salud)', array("class" => "control-label")) }}
            {{ Form::text("txtCantSalud", Input::old("txtCantSalud"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantSalud"))
                @foreach($errors->get("txtCantSalud") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenPension", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenPension" id="selRegimenPension">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenPension"))
                @foreach($errors->get("selRegimenPension") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantPension", 'NÃºmero de Personas (PensiÃ³n)', array("class" => "control-label")) }}
            {{ Form::text("txtCantPension", Input::old("txtCantPension"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantPension"))
                @foreach($errors->get("txtCantPension") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenRiesgos", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenRiesgos" id="selRegimenRiesgos">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenRiesgos"))
                @foreach($errors->get("selRegimenRiesgos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantRiesgos", 'NÃºmero de Personas (Riesgos Laborales)', array("class" => "control-label")) }}
            {{ Form::text("txtCantRiesgos", Input::old("txtCantRiesgos"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantRiesgos"))
                @foreach($errors->get("txtCantRiesgos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenNinguno", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenNinguno" id="selRegimenNinguno">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenNinguno"))
                @foreach($errors->get("selRegimenNinguno") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantNinguno", 'NÃºmero de Personas (Ninguno)', array("class" => "control-label")) }}
            {{ Form::text("txtCantNinguno", Input::old("txtCantNinguno"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantNinguno"))
                @foreach($errors->get("txtCantNinguno") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Plano</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoMina", "Tipo Mineria", array("class" => "control-label")) }}
            {{ Form::select("selTipoMina",$comTipoMineria,isset($plano->id_tipo_mineria) ? $plano->id_tipo_mineria : null) }}
            @if($errors->has("selTipoMina"))
                @foreach($errors->get("selTipoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          {{ Form::label("selPlanos", "Cuenta con Planos", array("class" => "control-label")) }}
          {{ Form::select("selPlanos",$comSiNo,isset($plano->resultado) ? $plano->resultado : null) }}
            @if($errors->has("selPlanos"))
                @foreach($errors->get("selPlanos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selTipoPlano", "Tipo Plano", array("class" => "control-label")) }}
            <select name="selTipoPlano" id="selTipoPlano">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoPlano"))
                @foreach($errors->get("selTipoPlano") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("txtFechaPlano", 'Fecha de Actualizacion (fecha General Plano de Labores)', array("class" => "control-label")) }}
            {{ Form::text("txtFechaPlano",Input::old("txtFechaPlano") ? Input::old('txtFechaPlano'):isset($plano->fecha_actualizacion) ? $plano->fecha_actualizacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Fecha de Actualizacion','autocomplete'=>'off')) }}
            @if($errors->has("txtFechaPlano"))
                @foreach($errors->get("txtFechaPlano") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >MÃ©todo de ExplotaciÃ³n</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("selMetodoET", "MÃ©todo de ExplotaciÃ³n", array("class" => "control-label")) }}
            {{ Form::select("selMetodoET",$comMetExplotacion,isset($metodoexplotacion->id_topologia) ? $metodoexplotacion->id_topologia : null) }}
            @if($errors->has("selMetodoET"))
                @foreach($errors->get("selMetodoET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("selTaludes", "Condiciones de Taludes y Bermas", array("class" => "control-label")) }}
            {{ Form::select("selMetodoET",$comBuReMa,isset($metodoexplotacion->resultado) ? $metodoexplotacion->resultado : null) }}
            @if($errors->has("selTaludes"))
                @foreach($errors->get("selTaludes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selArranque", "Sistema de Arranque", array("class" => "control-label")) }}
            {{ Form::select("selArranque",$comSisArranque,isset($metodoexplotacion->resultado) ? $metodoexplotacion->resultado : null) }}
            @if($errors->has("selArranque"))
                @foreach($errors->get("selArranque") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtArranque", 'ObservaciÃ³n', array("class" => "control-label")) }}
            {{ Form::textarea("txtArranque", Input::old("txtArranque"),
                            array("class" => "form-control", "placeholder" => "ObservaciÃ³n", "autocomplete" => "off")) }}
            @if($errors->has("txtArranque"))
                @foreach($errors->get("txtArranque") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTransporte", "Sistema de Transporte", array("class" => "control-label")) }}
            {{ Form::select("selTransporte",$comSisTransporte,isset($metodoexplotacion->resultado) ? $metodoexplotacion->resultado : null) }}
            @if($errors->has("selTransporte"))
                @foreach($errors->get("selTransporte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtTransporte", 'ObservaciÃ³n', array("class" => "control-label")) }}
            {{ Form::textarea("txtTransporte", Input::old("txtTransporte"),
                            array("class" => "form-control", "placeholder" => "ObservaciÃ³n", "autocomplete" => "off")) }}
            @if($errors->has("txtTransporte"))
                @foreach($errors->get("txtTransporte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selCargue", "Sistema de Cargue", array("class" => "control-label")) }}
            {{ Form::select("selCargue",$comSisCargue,isset($metodoexplotacion->resultado) ? $metodoexplotacion->resultado : null) }}
            @if($errors->has("selCargue"))
                @foreach($errors->get("selCargue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtCargue", 'ObservaciÃ³n', array("class" => "control-label")) }}
            {{ Form::textarea("txtCargue", Input::old("txtCargue"),
                            array("class" => "form-control", "placeholder" => "ObservaciÃ³n", "autocomplete" => "off")) }}
            @if($errors->has("txtCargue"))
                @foreach($errors->get("txtCargue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Infraestructura de ProducciÃ³n - Beneficio Y TransformaciÃ³n</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoInf", "Tipo de Infraestructura", array("class" => "control-label")) }}
            <select name="selTipoInf" id="selTipoInf">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoInf"))
                @foreach($errors->get("selTipoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoInf", "Estado de Infraestructura", array("class" => "control-label")) }}
            <select name="selEstadoInf" id="selEstadoInf">
                <option value="">Seleccione..</option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Malo">Malo</option>
            </select>
            @if($errors->has("selEstadoInf"))
                @foreach($errors->get("selEstadoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordNorte", 'Coordenada Norte', array("class" => "control-label")) }}
            {{ Form::text("txtCoordNorte", Input::old("txtCoordNorte"),
                            array("class" => "form-control", "placeholder" => "Coordenada Norte", "autocomplete" => "off")) }}
            @if($errors->has("txtCoordNorte"))
                @foreach($errors->get("txtCoordNorte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordEste", 'Coordenada Este', array("class" => "control-label")) }}
            {{ Form::text("txtCoordEste", Input::old("txtCoordEste"),
                            array("class" => "form-control", "placeholder" => "Coordenada Este", "autocomplete" => "off")) }}
            @if($errors->has("txtCoordEste"))
                @foreach($errors->get("txtCoordEste") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidad", 'Capacidad', array("class" => "control-label")) }}
            {{ Form::text("txtCapacidad", Input::old("txtCapacidad"),
                            array("class" => "form-control", "placeholder" => "Capacidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCapacidad"))
                @foreach($errors->get("txtCapacidad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsInf", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsInf", Input::old("txtObsInf"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsInf"))
                @foreach($errors->get("txtObsInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Equipos y Maquinaria</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoEquipo", "Tipo de Equipo", array("class" => "control-label")) }}
            <select name="selTipoEquipo" id="selTipoEquipo">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoEquipo"))
                @foreach($errors->get("selTipoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoEquipo", "Estado o CondiciÃ³n", array("class" => "control-label")) }}
            <select name="selEstadoEquipo" id="selEstadoEquipo">
                <option value="">Seleccione..</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            @if($errors->has("selEstadoEquipo"))
                @foreach($errors->get("selEstadoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidadEstado", 'Capacidad o Potencia', array("class" => "control-label")) }}
            {{ Form::text("txtCapacidadEstado", Input::old("txtCapacidadEstado"),
                            array("class" => "form-control", "placeholder" => "Capacidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCapacidadEstado"))
                @foreach($errors->get("txtCapacidadEstado") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoComb", "Tipo de Combustible", array("class" => "control-label")) }}
            <select name="selTipoComb" id="selTipoComb">
                <option value="">Seleccione..</option>
                <option value="Gasolina">Gasolina</option>
                <option value="ACPM">ACPM</option>
            </select>
            @if($errors->has("selTipoComb"))
                @foreach($errors->get("selTipoComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCantidadComb", 'Cantidad de Combustible', array("class" => "control-label")) }}
            {{ Form::text("txtCantidadComb", Input::old("txtCantidadComb"),
                            array("class" => "form-control", "placeholder" => "Cantidad de Combustible", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidadComb"))
                @foreach($errors->get("txtCantidadComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsEquipo", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsEquipo", Input::old("txtObsEquipo"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsEquipo"))
                @foreach($errors->get("txtObsEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Condiciones de VentilaciÃ³n</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMonGas", "Monitor de Gas", array("class" => "control-label")) }}
            {{ Form::select("selMonGas",$comSiNo,isset($detalle->monitor_gases) ? $detalle->monitor_gases : null) }}
            @if($errors->has("selMonGas"))
                @foreach($errors->get("selMonGas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTablero", "Tableros de MediciÃ³n", array("class" => "control-label")) }}
            {{ Form::select("selTablero",$comSiNo,isset($detalle->tableros_medicion) ? $detalle->tableros_medicion : null) }}
            @if($errors->has("selTablero"))
                @foreach($errors->get("selTablero") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtFrenVenti", 'Frente Bajo Tierra', array("class" => "control-label")) }}
            {{ Form::select("txtFrenVenti",$comSiNo,isset($detalle->frente_bajo_tierra) ? $detalle->frente_bajo_tierra : null) }}
            @if($errors->has("txtFrenVenti"))
                @foreach($errors->get("txtFrenVenti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Instalaciones ElÃ©ctricas</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selEnergia", "EnergÃ­a ElÃ©ctrica", array("class" => "control-label")) }}
            {{ Form::select("selEnergia",$comSiNo,isset($detalle->energia_electrica) ? $detalle->energia_electrica : null) }}
            @if($errors->has("selEnergia"))
                @foreach($errors->get("selEnergia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoFuente", "Tipo de Fuente de Energia", array("class" => "control-label")) }}
            {{ Form::select("selTipoFuente",$comTipFuenteEneria,isset($detalle->tipo_fuente_energia) ? $detalle->tipo_fuente_energia : null) }}
            @if($errors->has("selTipoFuente"))
                @foreach($errors->get("selTipoFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDisparador", "Disparadores de Seguridad", array("class" => "control-label")) }}
            {{ Form::select("selDisparador",$comSiNo,isset($detalle->disparadores_seguridad) ? $detalle->disparadores_seguridad : null) }}
            @if($errors->has("selDisparador"))
                @foreach($errors->get("selDisparador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selInstalaElec", "Instalaciones ElÃ©ctricas", array("class" => "control-label")) }}
            {{ Form::select("selInstalaElec",$comSiNo,isset($detalle->instalacion_electrica) ? $detalle->instalacion_electrica : null) }}
            @if($errors->has("selInstalaElec"))
                @foreach($errors->get("selInstalaElec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtTensionUti", 'TensiÃ³n Utilizada', array("class" => "control-label")) }}
            {{ Form::text("txtTensionUti",Input::old("txtTensionUti") ? Input::old('txtTensionUti'):isset($detalle->tension_utilizada) ? $detalle->tension_utilizada:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Valor en Voltios','autocomplete'=>'off')) }}
            @if($errors->has("txtTensionUti"))
                @foreach($errors->get("txtTensionUti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" > Aspecto EconÃ³mico </p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCostoTon", 'Costo Tonelada en frente o bocamina', array("class" => "control-label")) }}
            {{ Form::text("txtCostoTon",Input::old("txtPrecioVenta") ? Input::old('txtPrecioVenta'):isset($detalle->costo_tonelada) ? $detalle->costo_tonelada:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Costo Tonelada','autocomplete'=>'off')) }}
            @if($errors->has("txtCostoTon"))
                @foreach($errors->get("txtCostoTon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtPrecioVenta", 'Precio de Venta', array("class" => "control-label")) }}
            {{ Form::text("txtPrecioVenta",Input::old("txtPrecioVenta") ? Input::old('txtPrecioVenta'):isset($detalle->precio_venta) ? $detalle->precio_venta:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Precio de Venta','autocomplete'=>'off')) }}
            @if($errors->has("txtPrecioVenta"))
                @foreach($errors->get("txtPrecioVenta") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selDestinoEco", "Destino", array("class" => "control-label")) }}
            {{ Form::select("selDestinoEco",$comDesCosVenBocamina,isset($detalle->id_destino) ? $detalle->id_destino : null) }}
            @if($errors->has("selDestinoEco"))
                @foreach($errors->get("selDestinoEco") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <br />
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$mina->id_mina) }}
    {{ Form::close() }}
</div>
@stop

@section("JsJQuery")
    {{ HTML::script('js/FormMinas/FormMinas.js') }}
		{{ HTML::script('js/restfulizer.js') }}

<script>
		
		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor1      = $("#divResExpPer"); //ID del contenedor
		var AddButton       = $("#btnResExpPer"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divResExpPer div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnResExpPer").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{ Form::label("txtProfPer[]","NÃºmero de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfPer[]",Input::old("txtEmpPer[]") ? Input::old("txtProfPer[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfPer[]"))'+
                			'@foreach($errors->get("txtProfPer[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{ Form::label("txtEmpPer[]","NÃºmero de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old("txtEmpPer[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Empleados","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtEmpPer"))'+
                			'@foreach($errors->get("txtEmpPer[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            				'{{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}'+
            				'{{Form::select("selConPer[]",$comTipoContrato) }}'+
            				'@if($errors->has("selConPer[]"))'+
                			'@foreach($errors->get("selConPer[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor1).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		
		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor2      = $("#divResExpTem"); //ID del contenedor
		var AddButton       = $("#btnResExpTem"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divResExpTem div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnResExpTem").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{ Form::label("txtProfTem[]","NÃºmero de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old("txtProfTem[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfTem[]"))'+
                			'@foreach($errors->get("txtProfTem[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{ Form::label("txtEmpTem[]","NÃºmero de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpTem[]",Input::old("txtEmpTem[]") ? Input::old("txtEmpTem[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Empleados","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtEmpTem[]"))'+
                			'@foreach($errors->get("txtEmpTem[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            				'{{ Form::label("selConTem[]", "Tipo de Contrato", array("class" => "control-label")) }}'+
            				'{{Form::select("selConTem[]",$comTipoContrato) }}'+
            				'@if($errors->has("selConTem[]"))'+
                			'@foreach($errors->get("selConTem[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor2).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		
		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor3      = $("#divOpePer"); //ID del contenedor
		var AddButton       = $("#btnOpePer"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divOpePer div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnOpePer").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{Form::label("txtProfPerOpe[]","NÃºmero de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old("txtProfPerOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfPerOpe[]"))'+
                			'@foreach($errors->get("txtProfPerOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{Form::label("txtEmpPerOpe[]","NÃºmero de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpPerOpe[]",Input::old("txtEmpTem[]") ? Input::old("txtEmpPerOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Empleados","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtEmpPerOpe[]"))'+
                			'@foreach($errors->get("txtEmpPerOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            				'{{ Form::label("selConPerOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}'+
            				'{{Form::select("selConPerOpe[]",$comTipoContrato) }}'+
            				'@if($errors->has("selConPerOpe[]"))'+
                			'@foreach($errors->get("selConPerOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor3).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		
		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor4      = $("#divOpeTem"); //ID del contenedor
		var AddButton       = $("#btnOpeTem"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divOpeTem div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnOpeTem").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{Form::label("txtProfTemOpe[]","NÃºmero de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old("txtProfTemOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfTemOpe[]"))'+
                			'@foreach($errors->get("txtProfTemOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{Form::label("txtEmpTemOpe[]","NÃºmero de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpTemOpe[]",Input::old("txtEmpTemOpe[]") ? Input::old("txtEmpTemOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"NÃºmero de Empleados","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtEmpTemOpe[]"))'+
                			'@foreach($errors->get("txtEmpTemOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            				'{{ Form::label("selConEmpOpe[]", "Tipo de Contrato", array("class" => "control-label")) }}'+
            				'{{Form::select("selConEmpOpe[]",$comTipoContrato) }}'+
            				'@if($errors->has("selConEmpOpe[]"))'+
                			'@foreach($errors->get("selConEmpOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor4).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });


    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });

</script>


@stop
