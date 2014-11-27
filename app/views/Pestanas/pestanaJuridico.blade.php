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
<div class="container-fluid">
   
  
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#juridico" data-toggle="tab">Juridico</a></li>
            <li class="">{{ link_to("pestanaMinero/{$minas->id_mina}", "Minero") }}</li>
            <li class="">{{ link_to("pestanaAmbiental/{$minas->id_mina}", "Ambiental") }}</li>
            <li class="">{{ link_to("pestanaSiso/{$minas->id_mina}", "Siso") }}</li>
            <li class="">{{ link_to("pestanaBiodiversidad/{$minas->id_mina}", "Biodiversidad") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("route" => "pestanaJuridico.store")) }}
     @if(Session::get("mensaje"))
        <div class="alert alert-success">{{ Session::get("mensaje")}}</div>
    @endif
    <p class="bg-primary text-center"  style="alignment-adjust: center">Identificación de población sujeto y grado de formalización</p>
    <p class="bg-primary text-center" >Amparo de algún título minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selOperacion">Las operaciones mineras se encuentran bajo el amparo de algún títulos minero?</label>
            {{Form::select("selOperacion", $selOperacion, isset($detalle->operaciones_amparo) ? $detalle->operaciones_amparo : null )}}
            @if($errors->has("selOperacion"))operaciones_amparo
                @foreach($errors->get("selOperacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtPlaca","Número de la Placa (Si la respuesta Sí)", array("class" => "control-label")) }}
            {{ Form::text("txtPlaca", Input::old('txtPlaca') ? Input::old('txtPlaca') : isset($detalle->num_placa_jur) ? $detalle->num_placa_jur : null ,
                        array("class" => "form-control", "placeholder" => "Número de Placa", "autocomplete" => "off")) }}
            @if($errors->has("txtPlaca"))
                @foreach($errors->get("txtPlaca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipo","Tipo de Título Minero", array("class" => "control-label")) }}
            {{ Form::select("selTipo", $tipTitulo, isset($detalle->tipo_titulo_jur_amp) ? $detalle->tipo_titulo_jur_amp : null) }}
            @if($errors->has("selTipo"))
                @foreach($errors->get("selTipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <label for="selActoTer">Acto Administrativo Terminado</label>
            {{Form::select("selActoTer", $actoTer, isset($detalle->acto_terminado_jur) ? $detalle->acto_terminado_jur : null )}}
            @if($errors->has("selActoTer"))
                @foreach($errors->get("selActoTer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            <label for="selRenuncia">Tipo de Renuncia</label>
            {{Form::select("selRenuncia", $tipoRen, isset($detalle->tipo_renuncia) ? $detalle->tipo_renuncia : null)}}
            @if($errors->has("selRenuncia"))
                @foreach($errors->get("selRenuncia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Algún Instrumento para la formalización</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selInstForma">Las operaciones mineras se encuentran bajo algún instrumento para la formalización</label>
            {{Form::select("selInstForma", $InstFor, isset($detalle->operaciones_instrumento) ? $detalle->operaciones_instrumento : null )}}
            @if($errors->has("selInstForma"))
                @foreach($errors->get("selInstForma") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selTipoInst">Defina el Instrumento (Si la respuesta anterior es Sí)</label>
            {{Form::select("selTipoInst", $TipoInsFor, isset($detalle->tipo_instrumento) ? $detalle->tipo_instrumento : null )}}
            @if($errors->has("selTipoInst"))
                @foreach($errors->get("selTipoInst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="txtEstadoInst">Estado</label>
            {{ Form::text("txtEstadoInst", Input::old('txtEstadoInst') ? Input::old('txtEstadoInst') : isset($detalle->estado_instrumento) ? $detalle->estado_instrumento : null, 
                array("class" => "form-control", "placeholder" => "Estado", "autocomplete" => "off")) }}
            @if($errors->has("txtEstadoInst"))
                @foreach($errors->get("txtEstadoInst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Superposición sobre algún título minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selSupTit">Las operaciones mineras se desarrollan superpuestas sobre algún título minero</label>
            {{Form::select("selSupTit", $subTit, isset($detalle->operaciones_superpuestas) ? $detalle->operaciones_superpuestas : null)}}
            @if($errors->has("selSupTit"))
                @foreach($errors->get("selSupTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtPlacaSup","Número de la Placa (Si la respuesta anterior es Sí)", array("class" => "control-label")) }}
            {{ Form::text("txtPlacaSup", Input::old('txtPlacaSup') ? Input::old('txtPlacaSup') : isset($detalle->num_placa_jur_super) ? $detalle->num_placa_jur_super : null, 
                array("class" => "form-control", "placeholder" => "Número de Placa", "autocomplete" => "off")) }}
            @if($errors->has("txtPlacaSup"))
                @foreach($errors->get("txtPlacaSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoSup","Tipo de Título Minero", array("class" => "control-label")) }}
            
            {{Form::select("selTipoSup", $tipTitulo, isset($detalle->tipo_titulo_jur_super) ? $detalle->tipo_titulo_jur_super : null)}}
            @if($errors->has("selTipoSup"))
                @foreach($errors->get("selTipoSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="form-group bg-success">Diligenciar los siguientes campos del títular minero si Las operaciones mineras se desarrollan superpuestas sobre algún título minero</p>
    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerTit", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerTit", Input::old('txtPrimerTit') ? Input::old('txtPrimerTit') : isset($titular->primer_nombre) ? $titular->primer_nombre : null,
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerTit"))
                @foreach($errors->get("txtPrimerTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoTit", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoTit", Input::old('txtSegundoTit') ? Input::old('txtSegundoTit') : isset($titular->segundo_nombre) ? $titular->segundo_nombre : null,
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoTit"))
                @foreach($errors->get("txtSegundoTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApeTit", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApeTit",
                Input::old('txtPrimerApeTit') ? Input::old('txtPrimerApeTit') : isset($titular->primer_apellido) ? $titular->primer_apellido : null,
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerApeTit"))
                @foreach($errors->get("txtPrimerApeTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApeTit", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApeTit", 
                Input::old('txtSegundoApeTit') ? Input::old('txtSegundoApeTit') : isset($titular->segundo_apellido) ? $titular->segundo_apellido : null,
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoApeTit"))
                @foreach($errors->get("txtSegundoApeTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCedTit", "Cédula del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtCedTit", 
                Input::old('txtCedTit') ? Input::old('txtCedTit') : isset($titular->cedula_titular) ? $titular->cedula_titular : null,
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Cédula del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtCedTit"))
                @foreach($errors->get("txtCedTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtDirecTit", "Dirección del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtDirecTit", 
                Input::old('txtDirecTit') ? Input::old('txtDirecTit') : isset($titular->direccion_titular) ? $titular->direccion_titular : null,
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Dirección del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtDirecTit"))
                @foreach($errors->get("txtDirecTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtTelTit", "Teléfono del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtTelTit", 
                Input::old('txtTelTit') ? Input::old('txtTelTit') : isset($titular->telefono_titular) ? $titular->telefono_titular : null,
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Teléfono del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtTelTit"))
                @foreach($errors->get("txtTelTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selPosFor">Posibilidad de Formación</label>
            
            {{Form::select("selPosFor", $selOperacion, isset($detalle->posibilidad_formacion) ? $detalle->posibilidad_formacion : null)}}
            @if($errors->has("selPosFor"))
                @foreach($errors->get("selPosFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selTitDis">Títular dispuesto a Negociar</label>
            {{Form::select("selTitDis", $selOperacion, isset($detalle->titular_negociar) ? $detalle->titular_negociar : null)}}
            @if($errors->has("selTitDis"))
                @foreach($errors->get("selTitDis") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selInfDis">Informal dispuesto a Formalizarce</label>
            {{Form::select("selInfDis", $selOperacion, isset($detalle->informal_formalizar) ? $detalle->informal_formalizar : null)}}
            @if($errors->has("selInfDis"))
                @foreach($errors->get("selInfDis") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <br />
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$minas->id_mina) }}
    {{Form::close()}}
</div>
@stop