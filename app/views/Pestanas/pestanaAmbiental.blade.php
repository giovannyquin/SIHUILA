@extends("SbAdmin.index")
@foreach ($mina as $mina)
    
@endforeach
@section("Titulo")
    Aspectos Ambientales
@stop

@section("NombrePagina")
    {{ link_to("ListarFrentes/{$mina->id_minamina}", $mina->nombre_mina) }} / Aspectos Ambientales
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    
    @foreach ($ambiental as $ambiental)
    <div class="row"></div>
    @endforeach
    @foreach ($detalle as $detalle)
    <div class="row"></div>
    @endforeach

    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li >{{ link_to("pestanaJuridico/{$mina->id_mina}", "Juridico") }}</li>
						<li class="">{{ link_to("pestanaMinero/{$mina->id_mina}", "Minero") }}</li>
            <li class="active"><a href="#" data-toggle="tab">Ambiental</a></li>
            <li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>
            <li class="">{{ link_to("pestanaGeologica/{$mina->id_mina}", "Geologico") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("route"=>"pestanaAmbiental.store")) }}
    <p class="bg-primary text-center">Componente Fisico (Uso del recurso Hídrico)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">

            {{Form::label("selFueAfe","Existe una fuente hídrica afectada por el proceso de explotación minera")}}
						{{Form::select("selFueAfe",$arrSiNo,Input::old("selFueAfe") ? Input::old("selFueAfe"):isset($ambiental->fue_afe) ? $ambiental->fue_afe:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selFueAfe"))
                @foreach($errors->get("selFueAfe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>

        <div class="form-group form-group-sm col-xs-12 col-sm-6">

            {{Form::label("selTipFue","La fuente es")}}
            {{Form::select("selTipFue",$arrTipFue,Input::old("selFueAfe") ? Input::old("selFueAfe"):isset($ambiental->tipo_fuente) ? $ambiental->tipo_fuente:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipFue"))
                @foreach($errors->get("selTipFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>

        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("selTipFueAfe","Fuente afectada")}}
            {{Form::select("selTipFueAfe",$arrTipFueAfe,Input::old("selTipFueAfe") ? Input::old("selTipFueAfe"):isset($ambiental->tipo_fuente_afe) ? $ambiental->tipo_fuente_afe:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipFueAfe"))
                @foreach($errors->get("selTipFueAfe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">

            {{Form::label("selTipFueSup","Tipo de fuente Superficial")}}
            {{Form::select("selTipFueSup",$arrTipFueSup,Input::old("selTipFueSup") ? Input::old("selTipFueSup"):isset($ambiental->tipo_fuente_sup) ? $ambiental->tipo_fuente_sup:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipFueSup"))
                @foreach($errors->get("selTipFueSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{Form::label("txtNomFueSup","Nombre de la Fuente")}}
            {{Form::text("txtNomFueSup", Input::old("txtNomFueSup") ? Input::old("txtNomFueSup") : isset($ambiental->nombre_fuente_sup) ? $ambiental->nombre_fuente_sup : null,array("class" => "form-control", "placeholder" => "Fuente Subterránea", "autocomplete" => "off")) }}
            @if($errors->has("txtNomFueSup"))
                @foreach($errors->get("txtNomFueSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipFueSub","Tipo de fuente Subterránea")}}
            {{Form::select("selTipFueSub",$arrTipFueSub,Input::old("selTipFueSub") ? Input::old("selTipFueSub"):isset($ambiental->tipo_fuente_sub) ? $ambiental->tipo_fuente_sub:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipFueSub"))
                @foreach($errors->get("selTipFueSub") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{Form::label("txtNomFueSub","Nombre de la Fuente")}}
            {{Form::text("txtNomFueSub", Input::old("txtNomFueSub") ? Input::old("txtNomFueSub") : isset($ambiental->nombre_fuente_sub) ? $ambiental->nombre_fuente_sub : null,
                array("class" => "form-control", "placeholder" => "Fuente Subterránea", "autocomplete" => "off")) }}
            @if($errors->has("txtNomFueSub"))
                @foreach($errors->get("txtNomFueSub") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtFueX","Ubicación de la fuente (coordenadas planas)")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtFueX", Input::old("txtFueX") ? Input::old("txtFueX") : isset($ambiental->fuente_subx) ? $ambiental->fuente_subx : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("selTipFueSub"))
                @foreach($errors->get("selTipFueSub") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtFueY", Input::old("txtFueY") ? Input::old("txtFueY") : isset($ambiental->fuente_suby) ? $ambiental->fuente_suby : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtFueY"))
                @foreach($errors->get("txtFueY") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtFueZ", Input::old("txtFueZ") ? Input::old("txtFueZ") : isset($ambiental->fuente_subz) ? $ambiental->fuente_subz : null,
                array("class" => "form-control", "placeholder" => "Z", "autocomplete" => "off")) }}
            @if($errors->has("txtFueZ"))
                @foreach($errors->get("txtFueZ") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtDistFue", "A qué distancia del frente de explotación se encuentra la fuente afectada")}}
            {{Form::text("txtDistFue", Input::old("txtDistFue") ? Input::old("txtDistFue") : isset($ambiental->distancia_frente_fuente) ? $ambiental->distancia_frente_fuente : null,
                array("class" => "form-control", "placeholder" => "Distancia en metros", "autocomplete" => "off")) }}
            @if($errors->has("txtDistFue"))
                @foreach($errors->get("txtDistFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selUsoHidri","Uso del recurso Hídrico")}}
            {{Form::select("selUsoHidri",$arrSiNo,Input::old("selUsoHidri") ? Input::old("selUsoHidri"):isset($ambiental->uso_hidrico) ? $ambiental->uso_hidrico:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selUsoHidri"))
                @foreach($errors->get("selUsoHidri") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">

            {{Form::label("selUsoTipo","Cúal es su uso")}}
						{{Form::select("selUsoTipo",$arrTipoUso,Input::old("selUsoTipo") ? Input::old("selUsoTipo"):isset($ambiental->tipo_uso_hid) ? $ambiental->tipo_uso_hid:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selUsoTipo"))
                @foreach($errors->get("selUsoTipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
        {{Form::label("txtObsUsoHid", "Describa el uso del recurso hídrico")}}
            {{Form::textarea("txtObsUsoHid", Input::old("txtObsUsoHid") ? Input::old("txtObsUsoHid") : isset($ambiental->desc_uso_hid) ? $ambiental->desc_uso_hid : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtObsUsoHid"))
                @foreach($errors->get("txtObsUsoHid") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
        {{Form::label("txtCaudal", "Caudal Utilizado (I/S)")}}
            {{Form::text("txtCaudal", Input::old("txtCaudal") ? Input::old("txtCaudal") : isset($ambiental->caudal) ? $ambiental->caudal : null,
                array("class" => "form-control", "placeholder" => "Caudal Utilizado", "autocomplete" => "off")) }}
            @if($errors->has("txtCaudal"))
                @foreach($errors->get("txtCaudal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtBocaX","Coordenadas geográficas de la bocatoma")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtBocaX", Input::old("txtBocaX") ? Input::old("txtBocaX") : isset($ambiental->bocatomax) ? $ambiental->bocatomax : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("txtBocaX"))
                @foreach($errors->get("txtBocaX") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtBocaY", Input::old("txtBocaY") ? Input::old("txtBocaY") : isset($ambiental->bocatomay) ? $ambiental->bocatomay : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtBocaY"))
                @foreach($errors->get("txtBocaY") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::text("txtBocaZ", Input::old("txtBocaZ") ? Input::old("txtBocaZ") : isset($ambiental->bocatomaz) ? $ambiental->bocatomaz : null,
                array("class" => "form-control", "placeholder" => "Z", "autocomplete" => "off")) }}
            @if($errors->has("txtBocaZ"))
                @foreach($errors->get("txtBocaZ") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selConsAgua","Cuenta con consesión de agua")}}
            {{Form::select("selConsAgua",$arrSiNo,Input::old("selConsAgua") ? Input::old("selConsAgua"):isset($ambiental->consesion_agua) ? $ambiental->consesion_agua:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selConsAgua"))
                @foreach($errors->get("selConsAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtRadi","Num radicado")}}
            {{Form::text("txtRadi",Input::old("txtRadi") ? Input::old("txtRadi"):isset($ambiental->radicado_consesion) ? $ambiental->radicado_consesion: null,array("class"=> "form-control","placeholder"=>"Num radicado","autocomplete"=>"off")) }}
            @if($errors->has("txtRadi"))
                @foreach($errors->get("txtRadi") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selTipAfecCal","Qué tipo de afectación en calidad se evidencia en la fuente hídrica")}}
						{{Form::select("selTipAfecCal",$arrTipAfecCal,Input::old("selTipAfecCal") ? Input::old("selTipAfecCal"):isset($ambiental->afec_calidad_hidri) ? $ambiental->afec_calidad_hidri:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipAfecCal"))
                @foreach($errors->get("selTipAfecCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtDescAfeCal","Descripcion Afectacion")}}
            {{Form::text("txtDescAfeCal",Input::old("txtDescAfeCal") ? Input::old("txtDescAfeCal"):isset($ambiental->desc_afec_calidad_hidri) ? $ambiental->desc_afec_calidad_hidri:null,array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDescAfeCal"))
                @foreach($errors->get("txtDescAfeCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selManAgua","Se realiza manejo de aguas lluvias en el frene de explotación")}}
						{{Form::select("selManAgua",$arrSiNo,Input::old("selManAgua") ? Input::old("selManAgua"):isset($ambiental->manejo_agua) ? $ambiental->manejo_agua:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selManAgua"))
                @foreach($errors->get("selManAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selTipManAgua","Qué tipo de manejo se le realiza a las aguas lluvias")}}
            {{Form::select("selTipManAgua",$arrTiManAgu,Input::old("selTipManAgua") ? Input::old("selTipManAgua"):isset($ambiental->tipo_manejo_agua) ? $ambiental->tipo_manejo_agua:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipManAgua"))
                @foreach($errors->get("selTipManAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selProRec","Se realiza proceso de recirculación de las aguas")}}
						{{Form::select("selProRec",$arrSiNo,Input::old("selProRec") ? Input::old("selProRec"):isset($ambiental->proc_recir) ? $ambiental->proc_recir:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selProRec"))
                @foreach($errors->get("selProRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selDerAgua","Existe vertimiento de aguas a una fuente superficial o a un drenaje natural")}}
						{{Form::select("selDerAgua",$arrSiNo,Input::old("selDerAgua") ? Input::old("selDerAgua"):isset($ambiental->vertim_agua) ? $ambiental->vertim_agua:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selDerAgua"))
                @foreach($errors->get("selDerAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtCaudalVert", "Caudal (I/S)")}}
            {{Form::text("txtCaudalVert", Input::old("txtCaudalVert") ? Input::old("txtCaudalVert") : isset($ambiental->caudal_vertimento) ? $ambiental->caudal_vertimento : null,
                array("class" => "form-control", "placeholder" => "Caudal", "autocomplete" => "off")) }}
            @if($errors->has("txtCaudalVert"))
                @foreach($errors->get("txtCaudalVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selReqPerVert","Requiere  permiso de vertimientos")}}
						{{Form::select("selReqPerVert",$arrSiNo,Input::old("selReqPerVert") ? Input::old("selReqPerVert"):isset($ambiental->requiere_permiso_vertim) ? $ambiental->requiere_permiso_vertim:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selReqPerVert"))
                @foreach($errors->get("selReqPerVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseCompFisi","Observaciones Componente Fisico")}}
				{{Form::textarea("txtObseCompFisi", Input::old("txtObseCompFisi") ? Input::old("txtObseCompFisi") : isset($ambiental->observ_compo_fisico) ? $ambiental->observ_compo_fisico : null,
						array("class" => "form-control", "placeholder" => "Oservaciones", "autocomplete" => "off")) }}
				@if($errors->has("txtObseCompFisi"))
						@foreach($errors->get("txtObseCompFisi") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>
    
		
		<p class="bg-primary text-center">Recurso Atmosférico</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selEmisAtm","Existen emisiones atmosfericas")}}
						{{Form::select("selEmisAtm",$arrSiNo,Input::old("selEmisAtm") ? Input::old("selEmisAtm"):isset($ambiental->emision_atmo) ? $ambiental->emision_atmo:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selEmisAtm"))
                @foreach($errors->get("selEmisAtm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipEmAt","Tipo de emisiones atmosféricas  encontradas")}}
						{{Form::select("selTipEmAt",$arrTipEmAt,Input::old("selTipEmAt") ? Input::old("selTipEmAt"):isset($ambiental->tipo_emision_atm) ? $ambiental->tipo_emision_atm:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipEmAt"))
                @foreach($errors->get("selTipEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDescTiAt"," Describa el tipo de emisiones")}}
            {{Form::textarea("txtDescTiAt", Input::old("txtDescTiAt") ? Input::old("txtDescTiAt") : isset($ambiental->desc_tip_em_at) ? $ambiental->desc_tip_em_at : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDescTiAt"))
                @foreach($errors->get("txtDescTiAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selFueEmAt","Fuente de las emisiones atmosféricas")}}
						{{Form::select("selFueEmAt",$arrFueEmAt,Input::old("selFueEmAt") ? Input::old("selFueEmAt"):isset($ambiental->fuente_emision_atm) ? $ambiental->fuente_emision_atm:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selFueEmAt"))
                @foreach($errors->get("selFueEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selPerEmisAtm","Tiene permiso de emisiones atmosféricas")}}
						{{Form::select("selPerEmisAtm",$arrSiNo,Input::old("selPerEmisAtm") ? Input::old("selPerEmisAtm"):isset($ambiental->permiso_emision_atmo) ? $ambiental->permiso_emision_atmo:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selPerEmisAtm"))
                @foreach($errors->get("selPerEmisAtm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtRadPerEm", "Num Radicado")}}
            {{Form::text("txtRadPerEm", Input::old("txtRadPerEm") ? Input::old("txtRadPerEm") : isset($ambiental->radicado_perm_em_at) ? $ambiental->radicado_perm_em_at : null,
                array("class" => "form-control", "placeholder" => "Num de radicado", "autocomplete" => "off")) }}
            @if($errors->has("txtRadPerEm"))
                @foreach($errors->get("txtRadPerEm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selAnaEmAt","Ha realizado análisis de emisiones atmosféricas. (material particulado)")}}
						{{Form::select("selAnaEmAt",$arrSiNo,Input::old("selAnaEmAt") ? Input::old("selAnaEmAt"):isset($ambiental->analisis_em_at) ? $ambiental->analisis_em_at:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selAnaEmAt"))
                @foreach($errors->get("selAnaEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("selQuemas","Realizan quemas")}}
						{{Form::select("selQuemas",$arrSiNo,Input::old("selQuemas") ? Input::old("selQuemas"):isset($ambiental->quemas) ? $ambiental->quemas:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selQuemas"))
                @foreach($errors->get("selQuemas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipManConAt","Tipos de manejo o mitigación a la contaminación atmosferica")}}
						{{Form::select("selTipManConAt",$arrTipManConAm,Input::old("selTipManConAt") ? Input::old("selTipManConAt"):isset($ambiental->tipo_man_con_am) ? $ambiental->tipo_man_con_am:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipManConAt"))
                @foreach($errors->get("selTipManConAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseRecuAtmo","Observaciones Recurso Atmosferico")}}
				{{Form::textarea("txtObseRecuAtmo", Input::old("txtObseRecuAtmo") ? Input::old("txtObseCompFisi") : isset($ambiental->observ_recur_atmo) ? $ambiental->observ_recur_atmo : null,
						array("class" => "form-control", "placeholder" => "Oservaciones", "autocomplete" => "off")) }}
				@if($errors->has("txtObseRecuAtmo"))
						@foreach($errors->get("txtObseRecuAtmo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>

		
    <p class="bg-success text-center">Ruido</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtAreaPob", "A qué distancia se encuentran el área poblada mas cercana (Km)")}}
            {{Form::text("txtAreaPob", Input::old("txtAreaPob") ? Input::old("txtAreaPob") : isset($ambiental->distancia_pob_cerc) ? $ambiental->distancia_pob_cerc : null,
                array("class" => "form-control", "placeholder" => "Num en Km", "autocomplete" => "off")) }}
            @if($errors->has("txtAreaPob"))
                @foreach($errors->get("txtAreaPob") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtNomSec", "Nombre del sector poblado")}}
            {{Form::text("txtNomSec", Input::old("txtNomSec") ? Input::old("txtNomSec") : isset($ambiental->nombre_sec_pob) ? $ambiental->nombre_sec_pob : null,
                array("class" => "form-control", "placeholder" => "Nombre del sector", "autocomplete" => "off")) }}
            @if($errors->has("txtNomSec"))
                @foreach($errors->get("txtNomSec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selGenRui","Existe generación de ruido")}}
						{{Form::select("selGenRui",$arrSiNo,Input::old("selGenRui") ? Input::old("selGenRui"):isset($ambiental->genera_ruido) ? $ambiental->genera_ruido:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selGenRui"))
                @foreach($errors->get("selGenRui") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtFuenteRuido", "Fuente")}}
            {{Form::text("txtFuenteRuido", Input::old("txtFuenteRuido") ? Input::old("txtFuenteRuido") : isset($ambiental->fuente_ruido) ? $ambiental->fuente_ruido : null,
                array("class" => "form-control", "placeholder" => "Fuente del ruido", "autocomplete" => "off")) }}
            @if($errors->has("txtFuenteRuido"))
                @foreach($errors->get("txtFuenteRuido") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMonRui","Se ha realizado monitoreo de ruido")}}
						{{Form::select("selMonRui",$arrSiNo,Input::old("selMonRui") ? Input::old("selMonRui"):isset($ambiental->monit_ruido) ? $ambiental->monit_ruido:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selMonRui"))
                @foreach($errors->get("selMonRui") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtPerMon", "Quien")}}
            {{Form::text("txtPerMon", Input::old("txtPerMon") ? Input::old("txtPerMon") : isset($ambiental->persona_monit) ? $ambiental->persona_monit : null,
                array("class" => "form-control", "placeholder" => "Quien lo realizó", "autocomplete" => "off")) }}
            @if($errors->has("txtPerMon"))
                @foreach($errors->get("txtPerMon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtResRui", "Resultados")}}
            {{Form::textarea("txtResRui", Input::old("txtResRui") ? Input::old("txtResRui") : isset($ambiental->resultados_ruido) ? $ambiental->resultados_ruido : null,
                array("class" => "form-control", "placeholder" => "Resultados", "autocomplete" => "off")) }}
            @if($errors->has("txtResRui"))
                @foreach($errors->get("txtResRui") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
   <div class="row">
		<div class="form-group form-group-sm col-xs-12 col-sm-12">
			{{Form::label("txtObseRuido","Observaciones Ruido")}}
			{{Form::textarea("txtObseRuido",Input::old("txtObseRuido") ? Input::old("txtObseRuido") : isset($ambiental->observ_ruido) ? $ambiental->observ_ruido : null,array("class" => "form-control","placeholder" => "Oservaciones", "autocomplete" => "off")) }}
			@if($errors->has("txtObseRuido"))
					@foreach($errors->get("txtObseRuido") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
		</div>
   </div>

		
    <p class="bg-primary text-center">Recurso Suelo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMonRui","Se ha realizado descapote en la zona")}}
						{{Form::select("selDescZon",$arrSiNo,Input::old("selDescZon") ? Input::old("selDescZon"):isset($ambiental->desc_zona) ? $ambiental->desc_zona:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selDescZon"))
                @foreach($errors->get("selDescZon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selBanMat","Cuenta con un banco de materia orgánica")}}
						{{Form::select("selBanMat",$arrSiNo,Input::old("selBanMat") ? Input::old("selBanMat"):isset($ambiental->banco_mat_org) ? $ambiental->banco_mat_org:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selBanMat"))
                @foreach($errors->get("selBanMat") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMatEst","Se produce material esteril en la explotación")}}
						{{Form::select("selMatEst",$arrSiNo,Input::old("selMatEst") ? Input::old("selMatEst"):isset($ambiental->material_esteril) ? $ambiental->material_esteril:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selMatEst"))
                @foreach($errors->get("selMatEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selManMatEst","Desarrolla un manejo adecuado del material esteril en zodme? (zonas de deposito)")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
						{{Form::select("selManMatEst",$arrSiNo,Input::old("selManMatEst") ? Input::old("selManMatEst"):isset($ambiental->man_material_esteril) ? $ambiental->man_material_esteril:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selManMatEst"))
                @foreach($errors->get("selManMatEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesManMet", "Descripción")}}
            {{Form::textarea("txtDesManMet", Input::old("txtDesManMet") ? Input::old("txtDesManMet") : isset($ambiental->desc_man_materia_org) ? $ambiental->desc_man_materia_org : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDesManMet"))
                @foreach($errors->get("txtDesManMet") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtImpSuel", "Qué tipo de impactos al suelo se están generando en la explotación")}}
            {{Form::textarea("txtImpSuel", Input::old("txtImpSuel") ? Input::old("txtImpSuel") : isset($ambiental->tipo_imp_suelo) ? $ambiental->tipo_imp_suelo : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtImpSuel"))
                @foreach($errors->get("txtImpSuel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnActCier" id="btnActCier" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divActCier">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selActCie[]","Qué actividades de cierre y abandono se desarrollan")}}
            {{Form::select("selActCie[]",$arrActCie,Input::old("selActCie[]") ? Input::old('selActCie[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
						@if($errors->has("selActCie[]"))
                @foreach($errors->get("selActCie[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>
		@foreach($arrSelMulActCie as $selmulactcie)
			<div class="row">
				<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-5">
							{{Form::label("selActCie[]","Qué actividades de cierre y abandono se desarrollan")}}
							{{Form::select("selActCie[]",$arrActCie,Input::old("selActCie[]") ? Input::old('selActCie[]'):isset($selmulactcie->id_topologia) ? $selmulactcie->id_topologia:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
							@if($errors->has("selActCie[]"))
									@foreach($errors->get("selActCie[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<a href="{{route('seleccionMultipleElim',array($selmulactcie['id_mina'],$selmulactcie['id_topologia'],$selmulactcie['asunto'],'PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach

   <div class="row">
		<div class="form-group form-group-sm col-xs-12 col-sm-12">
			{{Form::label("txtObseRecuSuelo","Observaciones Recurso Suelo")}}
			{{Form::textarea("txtObseRecuSuelo",Input::old("txtObseRecuSuelo") ? Input::old("txtObseRecuSuelo") : isset($ambiental->observ_recur_suelo) ? $ambiental->observ_recur_suelo : null,array("class" => "form-control","placeholder" => "Oservaciones", "autocomplete" => "off")) }}
			@if($errors->has("txtObseRecuSuelo"))
					@foreach($errors->get("txtObseRecuSuelo") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
		</div>
   </div>

		
    <p class="bg-primary text-center">Residuos Sólidos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">

            {{Form::label("selTipRes","Qué tipo de residuos se generan")}}
						{{Form::select("selTipRes",$arrTipRes,Input::old("selTipRes") ? Input::old("selTipRes"):isset($ambiental->tipo_residuos) ? $ambiental->tipo_residuos:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selTipRes"))
                @foreach($errors->get("selTipRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selClasFue","Se realiza clasificación en la fuente")}}
						{{Form::select("selClasFue",$arrSiNo,Input::old("selClasFue") ? Input::old("selClasFue"):isset($ambiental->clas_fuente) ? $ambiental->clas_fuente:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selClasFue"))
                @foreach($errors->get("selClasFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selEntResi","Entrega los residuos clasificados a  gestores externos")}}
						{{Form::select("selEntResi",$arrSiNo,Input::old("selEntResi") ? Input::old("selEntResi"):isset($ambiental->entrega_residuos) ? $ambiental->entrega_residuos:null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("selEntResi"))
                @foreach($errors->get("selEntResi") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        {{Form::label("", "Mencione los gestores externos que hacen la dispocisión final")}}
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtResInser", "Residuos inservibles -  Empresa de servicios públicos de ")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::text("txtResInser", Input::old("txtResInser") ? Input::old("txtResInser") : isset($ambiental->residuos_inservibles) ? $ambiental->residuos_inservibles : null,
                array("class" => "form-control", "placeholder" => "Empresa", "autocomplete" => "off")) }}
            @if($errors->has("txtResInser"))
                @foreach($errors->get("txtResInser") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtResRec", "Residuos recuperables  - Empresa de reciclaje ")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::text("txtResRec", Input::old("txtResRec") ? Input::old("txtResRec") : isset($ambiental->residuos_recuperables) ? $ambiental->residuos_recuperables : null,
                array("class" => "form-control", "placeholder" => "Empresa", "autocomplete" => "off")) }}
            @if($errors->has("txtResRec"))
                @foreach($errors->get("txtResRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtResPel", "Residuos peligrosos o especiales ")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::text("txtResPel", Input::old("txtResPel") ? Input::old("txtResPel") : isset($ambiental->residuos_peligrosos) ? $ambiental->residuos_peligrosos : null,
                array("class" => "form-control", "placeholder" => "Residuos", "autocomplete" => "off")) }}
            @if($errors->has("txtResPel"))
                @foreach($errors->get("txtResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">

            {{Form::label("selDispFinRes","La disposición final de los residuos se realiza en el frente de explotación")}}
            {{Form::select("selDispFinRes", $arrDispFinRes,isset($ambiental->disp_final_residuos) ? $ambiental->disp_final_residuos : null,array("class"=>"form-control")) }}
            @if($errors->has("selDispFinRes"))
                @foreach($errors->get("selDispFinRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selExpET","Requiere de explosivos para la explotación")}}
            {{Form::select("selExpET", $arrSiNo,isset($ambiental->req_explosivos_et) ? $ambiental->req_explosivos_et : null,array("class"=>"form-control")) }}
            @if($errors->has("selExpET"))
                @foreach($errors->get("selExpET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDispCarET", "Describa la forma de disposición de carretes y cajas de los explosivos")}}
            {{Form::textarea("txtDispCarET",Input::old("txtDispCarET") ? Input::old("txtDispCarET"):isset($ambiental->disp_car_cajas_et) ? $ambiental->disp_car_cajas_et:null,array("class"=>"form-control","placeholder"=>"Forma de disposición","autocomplete"=>"off")) }}
            @if($errors->has("txtDispCarET"))
                @foreach($errors->get("txtDispCarET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
   <div class="row">
		<div class="form-group form-group-sm col-xs-12 col-sm-12">
			{{Form::label("txtObseResiSolido","Observaciones Residuo Solido")}}
			{{Form::textarea("txtObseResiSolido",Input::old("txtObseResiSolido") ? Input::old("txtObseResiSolido") : isset($ambiental->observ_resid_solido) ? $ambiental->observ_resid_solido : null,array("class" => "form-control","placeholder" => "Oservaciones", "autocomplete" => "off")) }}
			@if($errors->has("txtObseResiSolido"))
					@foreach($errors->get("txtObseResiSolido") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
		</div>
   </div>

    <p class="bg-primary text-center">Componente Biotico (Recurso Flora)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selCobVeg","Cuando inicio la explotación encontro cobertura vegetal")}}
            {{Form::select("selCobVeg", $arrSiNo,isset($ambiental->cobertura_vegetal) ? $ambiental->cobertura_vegetal : null,array("class"=>"form-control")) }}
            @if($errors->has("selCobVeg"))
                @foreach($errors->get("selCobVeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActDes","Desarrolló actividades de desmonte? (cobertura vegetal) ")}}
            {{Form::select("selActDes", $arrSiNo,isset($ambiental->acti_desmonte) ? $ambiental->acti_desmonte : null,array("class"=>"form-control")) }}
            @if($errors->has("selActDes"))
                @foreach($errors->get("selActDes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">

            {{Form::label("selTipCobVeg","Tipo de cobertura vegetal que encontro")}}
            {{Form::select("selTipCobVeg",$arrTipCobVeg,isset($ambiental->tipo_cob_vegetal) ? $ambiental->tipo_cob_vegetal : null,array("class"=>"form-control")) }}
            @if($errors->has("selTipCobVeg"))
                @foreach($errors->get("selTipCobVeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">

            {{Form::label("selCobReti","Qué hizo con la cobertura retirada")}}
            {{Form::select("selCobReti",$arrCobReti,isset($ambiental->cobertura_retirada) ? $ambiental->cobertura_retirada : null,array("class"=>"form-control")) }}
            @if($errors->has("selCobReti"))
                @foreach($errors->get("selCobReti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnDescCobVeg" id="btnDescCobVeg" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divDescCobVeg">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selDescCobVeg[]","Descripcion de la cobertura vegetal de sus alrededores")}}
						{{Form::select("selDescCobVeg[]",$arrDescCobVeg,Input::old("selDescCobVeg[]") ? Input::old("selDescCobVeg[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","autocomplete"=>"off")) }}
            @if($errors->has("selDescCobVeg[]"))
                @foreach($errors->get("selDescCobVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
				</div>
      </div>
    </div>
		@foreach($arrSelMulDescCobVeg as $selmuldesccobveg)
			<div class="row">
				<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-5">
							{{Form::label("selDescCobVeg[]","Descripcion de la cobertura vegetal de sus alrededores")}}
							{{Form::select("selDescCobVeg[]",$arrDescCobVeg,Input::old("selDescCobVeg[]") ? Input::old('selDescCobVeg[]'):isset($selmuldesccobveg->id_topologia) ? $selmuldesccobveg->id_topologia:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
							@if($errors->has("selDescCobVeg[]"))
                @foreach($errors->get("selDescCobVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            	@endif
					</div>
					<a href="{{route('seleccionMultipleElim',array($selmuldesccobveg['id_mina'],$selmuldesccobveg['id_topologia'],$selmuldesccobveg['asunto'],'PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach

		
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selEspVeg","Dentro del desarrollo de la explotación minera utiliza especies vegetales")}}
            {{Form::select("selEspVeg",$arrSiNo,isset($ambiental->especies_vegetales) ? $ambiental->especies_vegetales : null,array("class"=>"form-control")) }}
            @if($errors->has("selEspVeg"))
                @foreach($errors->get("selEspVeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnEspVeg" id="btnEspVeg" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divEspVeg">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNomEspVeg[]","Nombre Común")}}
            {{Form::text("txtNomEspVeg[]",Input::old("Yii") ? Input::old("YII"):isset($especie_vegetal->nombre_comun) ? $especie_vegetal->nombre_comun:null,array("class"=>"form-control","placeholder"=>"Nombre Común","autocomplete"=>"off")) }}
            @if($errors->has("txtNomEspVeg[]"))
                @foreach($errors->get("txtNomEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("txtUsoEspVeg[]", "Usos")}}
            {{Form::text("txtUsoEspVeg[]", Input::old("txtUsoEspVeg[]") ? Input::old("txtUsoEspVeg[]") : isset($especie_vegetal->uso) ? $especie_vegetal->uso : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoEspVeg[]"))
                @foreach($errors->get("txtUsoEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtOrigExtr[]", "Origen  Extracción")}}
            {{Form::text("txtOrigExtr[]", Input::old("txtOrigExtr[]") ? Input::old("txtOrigExtr[]") : isset($especie_vegetal->origen_extraccion) ? $especie_vegetal->origen_extraccion : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtOrigExtr[]"))
                @foreach($errors->get("txtOrigExtr[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
				</div>
    </div>
		@foreach($arrEspecieVegetal as $especie_vegetal)
			<div class="row">
				<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNomEspVeg[]", "Nombre Común")}}
            {{Form::text("txtNomEspVeg[]", Input::old("txtNomEspVeg[]") ? Input::old("txtNomEspVeg[]") : isset($especie_vegetal->nombre_comun) ? $especie_vegetal->nombre_comun : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtNomEspVeg[]"))
                @foreach($errors->get("txtNomEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("txtUsoEspVeg[]", "Usos")}}
            {{Form::text("txtUsoEspVeg[]", Input::old("txtUsoEspVeg[]") ? Input::old("txtUsoEspVeg[]") : isset($especie_vegetal->uso) ? $especie_vegetal->uso : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoEspVeg[]"))
                @foreach($errors->get("txtUsoEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtOrigExtr[]", "Origen  Extracción")}}
            {{Form::text("txtOrigExtr[]", Input::old("txtOrigExtr[]") ? Input::old("txtOrigExtr[]") : isset($especie_vegetal->origen_extraccion) ? $especie_vegetal->origen_extraccion : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtOrigExtr[]"))
                @foreach($errors->get("txtOrigExtr[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
					<a href="{{route('especieVegetalElim',array($especie_vegetal['id_mina'],$especie_vegetal['nombre_comun'],'PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach



    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActPermAm","Las actividades de uso forestal realizadas, obtuvieron permiso ambiental")}}
            {{Form::select("selActPermAm",$arrSiNo,isset($ambiental->permisos_act_forestal) ? $ambiental->permisos_act_forestal:null,array("class"=>"form-control")) }}
            @if($errors->has("selActPermAm"))
                @foreach($errors->get("selActPermAm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
					{{Form::label("selTipoActPermAm","Si rpta anterior fue si, eliga tipo de permiso")}}
					{{Form::select("selTipoActPermAm",$arrTipoActPermAm,isset($ambiental->tipo_permisos_act_forestal) ? $ambiental->tipo_permisos_act_forestal : null,array("class"=>"form-control")) }}
					@if($errors->has("selTipoActPermAm"))
							@foreach($errors->get("selTipoActPermAm") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtNumActPermAm","Si rpta anterior fue si, ingrese el nuemro del permiso")}}
            {{Form::text("txtNumActPermAm",Input::old("txtNumActPermAm") ? Input::old("txtNumActPermAm") : isset($ambiental->num_permisos_act_forestal) ? $ambiental->num_permisos_act_forestal : null,array("class"=>"form-control","placeholder"=>"Nombre Común","autocomplete"=>"off")) }}
            @if($errors->has("txtNumActPermAm"))
                @foreach($errors->get("txtNumActPermAm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActComFor","Realiza actividades de compensacion forestal")}}
            {{Form::select("selActComFor",$arrSiNo,isset($ambiental->compens_forestal) ? $ambiental->compens_forestal : null,array("class"=>"form-control")) }}
            @if($errors->has("selActComFor"))
                @foreach($errors->get("selActComFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnActCompFor" id="btnActCompFor" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divActCompFor">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtEspec[]","Especie")}}
            {{Form::text("txtEspec[]", Input::old("txtEspec[]") ? Input::old("txtEspec[]") : isset($act_comp_for->especie) ? $act_comp_for->especie : null,
                array("class" => "form-control", "placeholder" => "Especie", "autocomplete" => "off")) }}
            @if($errors->has("txtEspec[]"))
                @foreach($errors->get("txtEspec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCantCompFor[]","Cantidad")}}
            {{Form::text("txtCantCompFor[]", Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]") : isset($act_comp_for->cantidad) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantCompFor[]"))
                @foreach($errors->get("txtCantCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">

            {{Form::label("txtVerComFor[]","Vereda")}}
            {{Form::text("txtVerComFor[]", Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]") : isset($act_comp_for->vereda) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Nombre Vereda", "autocomplete" => "off")) }}
						@if($errors->has("txtVerComFor[]"))
                @foreach($errors->get("txtVerComFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{Form::label("txtXCompFor[]","Coor X")}}
            {{Form::text("txtXCompFor[]", Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]") : isset($act_comp_for->ccor_x) ? $act_comp_for->ccor_x : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("txtXCompFor[]"))
                @foreach($errors->get("txtXCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{Form::label("txtYCompFor[]","Coor Y")}}
            {{Form::text("txtYCompFor[]", Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]") : isset($act_comp_for->ccor_y) ? $act_comp_for->ccor_y : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtYCompFor[]"))
                @foreach($errors->get("txtYCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>
    @foreach($arrCompesacionForestal as $act_comp_for)
			
				<div class="row container">
<div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtEspec[]","Especie")}}
            {{Form::text("txtEspec[]", Input::old("txtEspec[]") ? Input::old("txtEspec[]") : isset($act_comp_for->especie) ? $act_comp_for->especie : null,
                array("class" => "form-control", "placeholder" => "Especie", "autocomplete" => "off")) }}
            @if($errors->has("txtEspec[]"))
                @foreach($errors->get("txtEspec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCantCompFor[]","Cantidad")}}
            {{Form::text("txtCantCompFor[]", Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]") : isset($act_comp_for->cantidad) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantCompFor[]"))
                @foreach($errors->get("txtCantCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">

            {{Form::label("txtVerComFor[]","Vereda")}}
            {{Form::text("txtVerComFor[]", Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]") : isset($act_comp_for->vereda) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Nombre Vereda", "autocomplete" => "off")) }}
						@if($errors->has("txtVerComFor[]"))
                @foreach($errors->get("txtVerComFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{Form::label("txtXCompFor[]","Coor X")}}
            {{Form::text("txtXCompFor[]", Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]") : isset($act_comp_for->ccor_x) ? $act_comp_for->ccor_x : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("txtXCompFor[]"))
                @foreach($errors->get("txtXCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{Form::label("txtYCompFor[]","Coor Y")}}
            {{Form::text("txtYCompFor[]", Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]") : isset($act_comp_for->ccor_y) ? $act_comp_for->ccor_y : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtYCompFor[]"))
                @foreach($errors->get("txtYCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
				</div>
				<a href="{{route('compesacionForestalElim',array($act_comp_for['id_mina'],$act_comp_for['especie'],'PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
			</div>
		@endforeach
		
		
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selResHid","Se respeta la ronda de protección hidrica  de las fuentes aledañas a la explotación o utilizadas por la explotación")}}
            {{Form::select("selResHid",$arrSiNo,isset($ambiental->respeto_ronda_hidrica) ? $ambiental->respeto_ronda_hidrica : null,array("class"=>"form-control")) }}
            @if($errors->has("selResHid"))
                @foreach($errors->get("selResHid") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtAncRon","Ancho Ronda (metros)")}}
            {{Form::text("txtAncRon", Input::old("txtAncRon") ? Input::old("txtAncRon") : isset($ambiental->ancho_ronda) ? $ambiental->ancho_ronda : null,
                array("class" => "form-control", "placeholder" => "Ancho de Ronda", "autocomplete" => "off")) }}
            @if($errors->has("txtAncRon"))
                @foreach($errors->get("txtAncRon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesEsp","Descripción de las especies encontradas")}}
            {{Form::textarea("txtDesEsp", Input::old("txtDesEsp") ? Input::old("txtDesEsp") : isset($ambiental->desc_especies_encontr) ? $ambiental->desc_especies_encontr : null,array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDesEsp"))
                @foreach($errors->get("txtDesEsp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selAreaProt","Existen áreas protegidas de tipo Regional, Local y Nacional")}}
            {{Form::select("selAreaProt", $arrSiNo,isset($ambiental->area_protegida) ? $ambiental->area_protegida : null,array("class"=>"form-control")) }}
            @if($errors->has("selAreaProt"))
                @foreach($errors->get("selAreaProt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtCualArPro","Cúal")}}
            {{Form::text("txtCualArPro", Input::old("txtCualArPro") ? Input::old("txtCualArPro") : isset($ambiental->cual_area_prot) ? $ambiental->cual_area_prot : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtCualArPro"))
                @foreach($errors->get("txtCualArPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selDentroResFor","Se encuentran  dentro de la reserva forestal Ley 2")}}
            {{Form::select("selDentroResFor", $arrSiNo,isset($ambiental->dentro_res_forestal) ? $ambiental->dentro_res_forestal : null,array("class"=>"form-control")) }}
            @if($errors->has("selDentroResFor"))
                @foreach($errors->get("selDentroResFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selSusArRes","Tiene algún proceso de sustracción del área de reserva")}}
            {{Form::select("selSusArRes", $arrSiNo,isset($ambiental->proceso_sustraccion) ? $ambiental->proceso_sustraccion : null,array("class"=>"form-control")) }}
            @if($errors->has("selSusArRes"))
                @foreach($errors->get("selSusArRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
   <div class="row">
		<div class="form-group form-group-sm col-xs-12 col-sm-12">
			{{Form::label("txtObseRecuFlora","Observaciones Recurso Flora")}}
			{{Form::textarea("txtObseRecuFlora",Input::old("txtObseRecuFlora") ? Input::old("txtObseRecuFlora") : isset($ambiental->observ_recur_flora) ? $ambiental->observ_recur_flora : null,array("class" => "form-control","placeholder" => "Oservaciones", "autocomplete" => "off")) }}
			@if($errors->has("txtObseRecuFlora"))
					@foreach($errors->get("txtObseRecuFlora") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
		</div>
   </div>


    <p class="bg-primary text-center">Componente Biotico (Recurso Fauna)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            Qué especies animales se encuentran en la zona
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnEspZona" id="btnEspZona" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divEspZona">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtEspZona[]","Nombre Común")}}
            {{Form::text("txtEspZona[]", Input::old("txtEspZona[]") ? Input::old("txtEspZona[]") : isset($especies_animales->nombre_comun) ? $especies_animales->nombre_comun : null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtEspZona[]"))
                @foreach($errors->get("txtEspZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtUsoZona[]","Uso")}}
            {{Form::text("txtUsoZona[]", Input::old("txtUsoZona[]") ? Input::old("txtUsoZona[]") : isset($especies_animales->uso) ? $especies_animales->uso : null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoZona[]"))
                @foreach($errors->get("txtUsoZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    
		@foreach($arrEspecieAnimal as $especies_animales)
			<div class="row">
				<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtEspZona[]","Nombre Común")}}
            {{Form::text("txtEspZona[]", Input::old("txtEspZona[]") ? Input::old("txtEspZona[]") : isset($especies_animales->nombre_comun) ? $especies_animales->nombre_comun : null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtEspZona[]"))
                @foreach($errors->get("txtEspZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtUsoZona[]","Uso")}}
            {{Form::text("txtUsoZona[]", Input::old("txtUsoZona[]") ? Input::old("txtUsoZona[]") : isset($especies_animales->uso) ? $especies_animales->uso : null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoZona[]"))
                @foreach($errors->get("txtUsoZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
					<a href="{{route('especieAnimalElim',array($especies_animales['id_mina'],$especies_animales['nombre_comun'],'PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach
		
		
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">

            {{Form::label("selAmeAni","Cuál es la mayor amenaza para los animales silvestres en esta zona")}}
            {{Form::select("selAmeAni", $arrAmeAni,isset($ambiental->amenaza_animales) ? $ambiental->amenaza_animales : null,array("class"=>"form-control")) }}
            @if($errors->has("selAmeAni"))
                @foreach($errors->get("selAmeAni") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtAniCons","Sabe que animales son consumidos en la zona")}}
            {{Form::text("txtAniCons", Input::old("txtAniCons") ? Input::old("txtAniCons") : isset($ambiental->animales_consumidos) ? $ambiental->animales_consumidos : null,
                array("class" => "form-control", "placeholder" => "Animales Consumidos", "autocomplete" => "off")) }}
            @if($errors->has("txtAniCons"))
                @foreach($errors->get("txtAniCons") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtAniNoVis","Qué especies de animles existían en la zona que ya no son vistas")}}
            {{Form::text("txtAniNoVis", Input::old("txtAniNoVis") ? Input::old("txtAniNoVis") : isset($ambiental->animales_no_vistos) ? $ambiental->animales_no_vistos : null,
                array("class" => "form-control", "placeholder" => "Animales no vistos", "autocomplete" => "off")) }}
            @if($errors->has("txtAniNoVis"))
                @foreach($errors->get("txtAniNoVis") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtAmeFaun","Cuales son las amenazas  naturales sobre la fauna (depredadores)")}}
            {{Form::text("txtAmeFaun", Input::old("txtAmeFaun") ? Input::old("txtAmeFaun") : isset($ambiental->amenazas_natural_fauna) ? $ambiental->amenazas_natural_fauna : null,
                array("class" => "form-control", "placeholder" => "Amenazas naturales", "autocomplete" => "off")) }}
            @if($errors->has("txtAmeFaun"))
                @foreach($errors->get("txtAmeFaun") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selPesZon","Realizan actividades de pesca en la zona")}}
            {{Form::select("selPesZon", $arrSiNo,isset($ambiental->pesca_zona) ? $ambiental->pesca_zona : null,array("class"=>"form-control")) }}
            @if($errors->has("selPesZon"))
                @foreach($errors->get("selPesZon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtPezCons","Cuales son los peces de mayor consumo")}}
            {{Form::text("txtPezCons", Input::old("txtPezCons") ? Input::old("txtPezCons") : isset($ambiental->peces_consumo) ? $ambiental->peces_consumo : null,array("class" => "form-control", "placeholder" => "Peces de mayor consumo", "autocomplete" => "off")) }}
            @if($errors->has("txtPezCons"))
                @foreach($errors->get("txtPezCons") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
   <div class="row">
		<div class="form-group form-group-sm col-xs-12 col-sm-12">
			{{Form::label("txtObseRecuFauna","Observaciones Recurso Fauna")}}
			{{Form::textarea("txtObseRecuFauna",Input::old("txtObseRecuFauna") ? Input::old("txtObseRecuFauna") : isset($ambiental->observ_recur_fauna) ? $ambiental->observ_recur_fauna : null,array("class" => "form-control","placeholder" => "Oservaciones", "autocomplete" => "off")) }}
			@if($errors->has("txtObseRecuFauna"))
					@foreach($errors->get("txtObseRecuFauna") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
		</div>
   </div>
	 <br /><br />
    
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
		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor1      = $("#divActCier"); //ID del contenedor
		var AddButton       = $("#btnActCier"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divActCier div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnActCier").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            '{{Form::label("selActCie[]","Qué actividades de cierre y abandono se desarrollan")}}'+
            '{{Form::select("selActCie[]",$arrActCie,Input::old("selActCie[]") ? Input::old("selActCie[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","autocomplete"=>"off")) }}'+
						'@if($errors->has("selActCie[]"))'+
                '@foreach($errors->get("selActCie[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor1).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divDescCobVeg"); //ID del contenedor
		var AddButton       = $("#btnDescCobVeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divDescCobVeg div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnDescCobVeg").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-5">'+
            '{{Form::label("selDescCobVeg[]","Descripcion de la cobertura vegetal de sus alrededores")}}'+
						'{{Form::select("selDescCobVeg[]",$arrDescCobVeg,Input::old("selDescCobVeg[]") ? Input::old("selDescCobVeg[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","autocomplete"=>"off")) }}'+
            '@if($errors->has("selDescCobVeg[]"))'+
                '@foreach($errors->get("selDescCobVeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor2).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor3      = $("#divActCompFor"); //ID del contenedor
		var AddButton       = $("#btnActCompFor"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divActCompFor div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnActCompFor").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtEspec[]","Especie")}}'+
            '{{Form::text("txtEspec[]",Input::old("txtEspec[]") ? Input::old("txtEspec[]"): null,array("class" => "form-control", "placeholder" => "Especie", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtEspec[]"))'+
                '@foreach($errors->get("txtEspec[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtCantCompFor[]","Cantidad")}}'+
            '{{Form::text("txtCantCompFor[]", Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]") : isset($act_comp_for->cantidad) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtCantCompFor[]"))'+
                '@foreach($errors->get("txtCantCompFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+

            '{{Form::label("txtVerComFor[]","Vereda")}}'+
            '{{Form::text("txtVerComFor[]", Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]") : isset($act_comp_for->vereda) ? $act_comp_for->cantidad : null,array("class" => "form-control", "placeholder" => "Nombre Vereda", "autocomplete" => "off")) }}'+
						'@if($errors->has("txtVerComFor[]"))'+
                '@foreach($errors->get("txtVerComFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+

        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-1">'+
            '{{Form::label("txtXCompFor[]","Coor X")}}'+
            '{{Form::text("txtXCompFor[]", Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]") : isset($act_comp_for->ccor_x) ? $act_comp_for->ccor_x : null,array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtXCompFor[]"))'+
                '@foreach($errors->get("txtXCompFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-1">'+
            '{{Form::label("txtYCompFor[]","Coor Y")}}'+
            '{{Form::text("txtYCompFor[]", Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]") : isset($act_comp_for->ccor_y) ? $act_comp_for->ccor_y : null,array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtYCompFor[]"))'+
                '@foreach($errors->get("txtYCompFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
								  	'</div><a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor3).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor4      = $("#divContam"); //ID del contenedor
		var AddButton       = $("#btnContam"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divContam div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnContam").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{Form::label("txtContAgua[]","Agregue los contaminantes que se le agregan al agua dentro del proceso")}}'+
            '{{Form::text("txtContAgua[]", Input::old("txtContAgua[]") ? Input::old("txtContAgua[]"):null,array("class" => "form-control", "placeholder" => "Un solo contaminante","autocomplete" => "off")) }}'+
            '@if($errors->has("txtContAgua[]"))'+
                '@foreach($errors->get("txtContAgua[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor4).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor5      = $("#divEspVeg"); //ID del contenedor
		var AddButton       = $("#btnEspVeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divEspVeg div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnEspVeg").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
						'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::label("txtNomEspVeg[]","Nombre Común")}}'+
            '{{Form::text("txtNomEspVeg[]",Input::old("yii") ? Input::old("yii"):null,array("class"=>"form-control","placeholder"=>"Nombre Común","autocomplete"=>"off")) }}'+
            '@if($errors->has("txtNomEspVeg[]"))'+
                '@foreach($errors->get("txtNomEspVeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-5">'+
            '{{Form::label("txtUsoEspVeg[]","Usos")}}'+
            '{{Form::text("txtUsoEspVeg[]",Input::old("yii") ? Input::old("yii"):null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtUsoEspVeg[]"))'+
                '@foreach($errors->get("txtUsoEspVeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::label("txtOrigExtr[]", "Origen  Extracción")}}'+
            '{{Form::text("txtOrigExtr[]",Input::old("yii") ? Input::old("yii"): null,array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtOrigExtr[]"))'+
                '@foreach($errors->get("txtOrigExtr[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
								'</div><a href="#" class="btn btn-danger btn-xs eliminar">&times;</a></div>';
			$(contenedor5).append(temporal);
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