@extends("SbAdmin.index")

@section("Titulo")
    Aspectos Ambientales
@stop

@section("NombrePagina")
    Aspectos Ambientales
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($mina as $mina)
    <div class="row"></div>
    @endforeach
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
            <li class="">{{ link_to("pestanaBiodiversidad/{$mina->id_mina}", "Biodiversidad") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("route"=>"pestanaAmbiental.store")) }}
    <p class="bg-primary text-center">Componente Fisico (Uso del recurso Hídrico)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selFueAfe","Existe una fuente hídrica afectada por el proceso de explotación minera")}}
            {{Form::select("selFueAfe", $arrSiNo,isset($ambiental->fue_afe) ? $ambiental->fue_afe : null) }}
            @if($errors->has("selFueAfe"))
                @foreach($errors->get("selFueAfe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selTipFue","La fuente es")}}
            {{Form::select("selTipFue", $arrTipFue,isset($ambiental->tipo_fuente) ? $ambiental->tipo_fuente : null) }}
            @if($errors->has("selTipFue"))
                @foreach($errors->get("selTipFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selTipFueAfe","Fuente afectada")}}
            {{Form::select("selTipFueAfe", $arrTipFueAfe,isset($ambiental->tipo_fuente_afe) ? $ambiental->tipo_fuente_afe : null) }}
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
            {{Form::select("selTipFueSup", $arrTipFueSup,isset($ambiental->tipo_fuente_sup) ? $ambiental->tipo_fuente_sup : null) }}
            @if($errors->has("selTipFueSup"))
                @foreach($errors->get("selTipFueSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{Form::label("txtNomFueSup","Nombre de la Fuente")}}
            {{Form::text("txtNomFueSup", Input::old("txtNomFueSup") ? Input::old("txtNomFueSup") : isset($ambiental->nombre_fuente_sup) ? $ambiental->nombre_fuente_sup : null,
                        array("class" => "form-control", "placeholder" => "Fuente Subterránea", "autocomplete" => "off")) }}
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
            {{Form::select("selTipFueSub", $arrTipFueSub,isset($ambiental->tipo_fuente_sub) ? $ambiental->tipo_fuente_sub : null) }}
            @if($errors->has("selTipFueSub"))
                @foreach($errors->get("selTipFueSub") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{Form::label("txtNomFueSub","Nombre de la Fuente")}}
            {{Form::text("txtNomFueSub", Input::old("txtNomFueSub") ? Input::old("txtNomFueSub") : isset($ambiental->nombre_fuente_sup) ? $ambiental->nombre_fuente_sup : null,
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
            {{Form::label("txtFueX","Ubicación de la fuente (coordenadas geográficas)")}}
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
            {{Form::label("txtDistFue", "A qué distancia del frente de explotación se encuentra la fuente afectada (mts)")}}
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
            {{Form::select("selUsoHidri", $arrSiNo,isset($ambiental->uso_hidrico) ? $ambiental->uso_hidrico : null) }}
            @if($errors->has("selUsoHidri"))
                @foreach($errors->get("selUsoHidri") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selUsoTipo","Cúal es su uso")}}
            {{Form::select("selUsoTipo", $arrTipoUso,isset($ambiental->tipo_uso_hid) ? $ambiental->tipo_uso_hid : null) }}
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
            {{Form::select("selConsAgua", $arrSiNo,isset($ambiental->consesion_agua) ? $ambiental->consesion_agua : null) }}
            @if($errors->has("selConsAgua"))
                @foreach($errors->get("selConsAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtRadi","Num radicado")}}
            {{Form::text("txtRadi", Input::old("txtRadi") ? Input::old("txtRadi") : isset($ambiental->radicado_consesion) ? $ambiental->radicado_consesion : null,
                array("class" => "form-control", "placeholder" => "Num radicado", "autocomplete" => "off")) }}
            @if($errors->has("txtRadi"))
                @foreach($errors->get("txtRadi") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selTipAfecCal","Qué tipo de afectación en calidad se evidencia en la fuente hídrica")}}
            {{Form::select("selTipAfecCal", $arrTipAfecCal,isset($ambiental->afec_calidad_hidri) ? $ambiental->afec_calidad_hidri : null) }}
            @if($errors->has("selTipAfecCal"))
                @foreach($errors->get("selTipAfecCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("txtDescAfeCal","Num radicado")}}
            {{Form::text("txtDescAfeCal", Input::old("txtDescAfeCal") ? Input::old("txtDescAfeCal") : isset($ambiental->desc_afec_calidad_hidri) ? $ambiental->desc_afec_calidad_hidri : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
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
            {{Form::select("selManAgua", $arrSiNo,isset($ambiental->manejo_agua) ? $ambiental->manejo_agua : null) }}
            @if($errors->has("selManAgua"))
                @foreach($errors->get("selManAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selTipManAgua","Qué tipo de manejo se le realiza a las aguas lluvias")}}
            {{Form::select("selTipManAgua", $arrTiManAgu,isset($ambiental->tipo_manejo_agua) ? $ambiental->tipo_manejo_agua : null) }}
            @if($errors->has("selTipManAgua"))
                @foreach($errors->get("selTipManAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selProRec","Se realiza proceso de recirculación de las aguas")}}
            {{Form::select("selProRec", $arrSiNo,isset($ambiental->proc_recir) ? $ambiental->proc_recir : null) }}
            @if($errors->has("selProRec"))
                @foreach($errors->get("selProRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selDerAgua","Existe vertimiento de aguas a una fuente superficial o a un drenaje natural")}}
            {{Form::select("selDerAgua", $arrSiNo,isset($ambiental->vertim_agua) ? $ambiental->vertim_agua : null) }}
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
            {{Form::label("selPerVert","Requiere  permiso de vertimientos")}}
            {{Form::select("selPerVert", $arrSiNo,isset($ambiental->permiso_vertim) ? $ambiental->permiso_vertim : null) }}
            @if($errors->has("selPerVert"))
                @foreach($errors->get("selPerVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Recurso Atmosférico</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selEmisAtm","Existen emisiones atmosfericas")}}
            {{Form::select("selEmisAtm", $arrSiNo,isset($ambiental->emision_atmo) ? $ambiental->emision_atmo : null) }}
            @if($errors->has("selEmisAtm"))
                @foreach($errors->get("selEmisAtm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selTipEmAt","Tipo de emisiones atmosféricas  encontradas")}}
            {{Form::select("selTipEmAt", $arrTipEmAt,isset($ambiental->tipo_emision_atm) ? $ambiental->tipo_emision_atm : null) }}
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
            {{Form::select("selFueEmAt", $arrFueEmAt,isset($ambiental->fuente_emision_atm) ? $ambiental->fuente_emision_atm : null) }}
            @if($errors->has("selFueEmAt"))
                @foreach($errors->get("selFueEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selPerEmisAtm","Tiene permiso de emisiones atmosféricas")}}
            {{Form::select("selPerEmisAtm", $arrSiNo,isset($ambiental->permiso_emision_atmo) ? $ambiental->permiso_emision_atmo : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selAnaEmAt","Ha realizado análisis de emisiones atmosféricas. (material particulado)")}}
            {{Form::select("selAnaEmAt", $arrSiNo,isset($ambiental->analisis_em_at) ? $ambiental->analisis_em_at : null) }}
            @if($errors->has("selAnaEmAt"))
                @foreach($errors->get("selAnaEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selQuemas","Realizan quemas")}}
            {{Form::select("selQuemas", $arrSiNo,isset($ambiental->quemas) ? $ambiental->quemas : null) }}
            @if($errors->has("selQuemas"))
                @foreach($errors->get("selQuemas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipManConAt","Tipos de manejo o mitigación a la contaminación atmosferica")}}
            {{Form::select("selTipManConAt", $arrTipManConAm,isset($ambiental->tipo_man_con_am) ? $ambiental->tipo_man_con_am : null) }}
            @if($errors->has("selTipManConAt"))
                @foreach($errors->get("selTipManConAt") as $error)
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
            {{Form::select("selGenRui", $arrSiNo,isset($ambiental->genera_ruido) ? $ambiental->genera_ruido : null) }}
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
            {{Form::select("selMonRui", $arrSiNo,isset($ambiental->monit_ruido) ? $ambiental->monit_ruido : null) }}
            @if($errors->has("selMonRui"))
                @foreach($errors->get("selMonRui") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
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
    </div>
    <div class="row">
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
    <p class="bg-primary text-center">Recurso Suelo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMonRui","Se ha realizado descapote en la zona")}}
            {{Form::select("selDescZon", $arrSiNo,isset($ambiental->desc_zona) ? $ambiental->desc_zona : null) }}
            @if($errors->has("selDescZon"))
                @foreach($errors->get("selDescZon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selBanMat","Cuenta con un banco de materia orgánica")}}
            {{Form::select("selBanMat", $arrSiNo,isset($ambiental->banco_mat_org) ? $ambiental->banco_mat_org : null) }}
            @if($errors->has("selBanMat"))
                @foreach($errors->get("selBanMat") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMatEst","Se produce material esteril en la explotación")}}
            {{Form::select("selMatEst", $arrSiNo,isset($ambiental->material_esteril) ? $ambiental->material_esteril : null) }}
            @if($errors->has("selMatEst"))
                @foreach($errors->get("selMatEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selManMatEst","Desarrolla un manejo adecuado del material esteril en zodme? (zonas de deposito)")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selManMatEst", $arrSiNo,isset($ambiental->man_material_esteril) ? $ambiental->man_material_esteril : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActCie[]","Qué actividades de cierre y abandono se desarrollan")}}
            {{Form::select("selActCie[]", $arrActCie, null) }}
            @if($errors->has("selActCie[]"))
                @foreach($errors->get("selActCie[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Residuos Sólidos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipRes","Qué tipo de residuos se generan")}}
            {{Form::select("selTipRes", $arrTipRes,isset($ambiental->tipo_residuos) ? $ambiental->tipo_residuos : null) }}
            @if($errors->has("selTipRes"))
                @foreach($errors->get("selTipRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selClasFue","Se realiza clasificación en la fuente")}}
            {{Form::select("selClasFue", $arrSiNo,isset($ambiental->clas_fuente) ? $ambiental->clas_fuente : null) }}
            @if($errors->has("selClasFue"))
                @foreach($errors->get("selClasFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selEntResi","Entrega los residuos clasificados a  gestores externos")}}
            {{Form::select("selEntResi", $arrSiNo,isset($ambiental->entrega_residuos) ? $ambiental->entrega_residuos : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selDispFinRes","La disposición final de los residuos se realiza en el frente de explotación")}}
            {{Form::select("selDispFinRes", $arrDispFinRes,isset($ambiental->disp_final_residuos) ? $ambiental->disp_final_residuos : null) }}
            @if($errors->has("selDispFinRes"))
                @foreach($errors->get("selDispFinRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selExpET","Requiere de explosivos para la explotación")}}
            {{Form::select("selExpET", $arrSiNo,isset($ambiental->req_explosivos_et) ? $ambiental->req_explosivos_et : null) }}
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
            {{Form::textarea("txtDispCarET", Input::old("txtDispCarET") ? Input::old("txtDispCarET") : isset($ambiental->disp_car_cajas_et) ? $ambiental->disp_car_cajas_et : null,
                array("class" => "form-control", "placeholder" => "Forma de disposición", "autocomplete" => "off")) }}
            @if($errors->has("txtDispCarET"))
                @foreach($errors->get("txtDispCarET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Componente Biotico (Recurso Flora)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selCobVeg","Cuando inicio la explotación encontro cobertura vegetal")}}
            {{Form::select("selCobVeg", $arrSiNo,isset($ambiental->cobertura_vegetal) ? $ambiental->cobertura_vegetal : null) }}
            @if($errors->has("selCobVeg"))
                @foreach($errors->get("selCobVeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActDes","Desarrolló actividades de desmonte? (cobertura vegetal) ")}}
            {{Form::select("selActDes", $arrSiNo,isset($ambiental->acti_desmonte) ? $ambiental->acti_desmonte : null) }}
            @if($errors->has("selActDes"))
                @foreach($errors->get("selActDes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipCobVeg","Tipo de cobertura vegetal que encontro")}}
            {{Form::select("selTipCobVeg", $arrTipCobVeg,isset($ambiental->tipo_cob_vegetal) ? $ambiental->tipo_cob_vegetal : null) }}
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
            {{Form::select("selCobReti", $arrCobReti,isset($ambiental->cobertura_retirada) ? $ambiental->cobertura_retirada : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selDescCobVeg[]","Descripcion de la cobertura vegetal de sus alrededores")}}
            {{Form::select("selDescCobVeg[]", $arrDescCobVeg, null) }}
            @if($errors->has("selDescCobVeg[]"))
                @foreach($errors->get("selDescCobVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selEspVeg","Dentro del desarrollo de la explotación minera utiliza especies vegetales")}}
            {{Form::select("selEspVeg", $arrSiNo,isset($ambiental->especies_vegetales) ? $ambiental->especies_vegetales : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
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
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selActPermAm","Las actividades de uso forestal realizadas, obtuvieron permiso ambiental")}}
            {{Form::select("selActPermAm", $arrSiNo,isset($ambiental->permisos_act_forestal) ? $ambiental->permisos_act_forestal : null) }}
            @if($errors->has("selActPermAm"))
                @foreach($errors->get("selActPermAm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipoActPermAm","Si rpta anterior fue si, eliga tipo de permiso")}}
            {{Form::select("selTipoActPermAm", $arrTipoActPermAm,isset($ambiental->tipo_permisos_act_forestal) ? $ambiental->tipo_permisos_act_forestal : null) }}
            @if($errors->has("selTipoActPermAm"))
                @foreach($errors->get("selTipoActPermAm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtNumActPermAm","Si rpta anterior fue si, eliga tipo de permiso")}}
            {{Form::text("txtNumActPermAm", Input::old("txtNumActPermAm") ? Input::old("txtNumActPermAm") : isset($especie_vegetal->num_permisos_act_forestal) ? $especie_vegetal->num_permisos_act_forestal : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
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
            {{Form::select("selActComFor", $arrSiNo,isset($ambiental->compens_forestal) ? $ambiental->compens_forestal : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtEspec","Especie")}}
            {{Form::text("txtEspec", Input::old("txtEspec") ? Input::old("txtEspec") : isset($act_comp_for->especie) ? $act_comp_for->especie : null,
                array("class" => "form-control", "placeholder" => "Especie", "autocomplete" => "off")) }}
            @if($errors->has("txtEspec"))
                @foreach($errors->get("txtEspec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCantCompFor","Cantidad")}}
            {{Form::text("txtCantCompFor", Input::old("txtCantCompFor") ? Input::old("txtCantCompFor") : isset($act_comp_for->cantidad) ? $act_comp_for->cantidad : null,
                array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantCompFor"))
                @foreach($errors->get("txtCantCompFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("selVerComFor","Vereda")}}
            {{Form::select("selVerComFor", $arrVereda,isset($act_comp_for->vereda) ? $act_comp_for->vereda : null) }}
            @if($errors->has("selVerComFor"))
                @foreach($errors->get("selVerComFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtXCompFor","Coor X")}}
            {{Form::text("txtXCompFor", Input::old("txtXCompFor") ? Input::old("txtXCompFor") : isset($act_comp_for->ccor_x) ? $act_comp_for->ccor_x : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("txtXCompFor"))
                @foreach($errors->get("txtXCompFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtYCompFor","Coor Y")}}
            {{Form::text("txtYCompFor", Input::old("txtYCompFor") ? Input::old("txtYCompFor") : isset($act_comp_for->ccor_y) ? $act_comp_for->ccor_y : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtYCompFor"))
                @foreach($errors->get("txtYCompFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selResHid","Se respeta la ronda de protección hidrica  de las fuentes aledañas a la explotación o utilizadas por la explotación")}}
            {{Form::select("selResHid", $arrSiNo,isset($ambiental->respeto_ronda_hidrica) ? $ambiental->respeto_ronda_hidrica : null) }}
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
            {{Form::textarea("txtDesEsp", Input::old("txtDesEsp") ? Input::old("txtDesEsp") : isset($ambiental->desc_especies_encontr) ? $ambiental->desc_especies_encontr : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
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
            {{Form::select("selAreaProt", $arrSiNo,isset($ambiental->area_protegida) ? $ambiental->area_protegida : null) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selDentroResFor","Se encuentran  dentro de la reserva forestal Ley 2")}}
            {{Form::select("selDentroResFor", $arrSiNo,isset($ambiental->dentro_res_forestal) ? $ambiental->dentro_res_forestal : null) }}
            @if($errors->has("selDentroResFor"))
                @foreach($errors->get("selDentroResFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selSusArRes","Tiene algún proceso de sustracción del área de reserva")}}
            {{Form::select("selSusArRes", $arrSiNo,isset($ambiental->proceso_sustraccion) ? $ambiental->proceso_sustraccion : null) }}
            @if($errors->has("selSusArRes"))
                @foreach($errors->get("selSusArRes") as $error)
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
            {{Form::text("txtEspZona[]", Input::old("txtEspZona[]") ? Input::old("txtEspZona[]") : isset($especies_animales->nombre_comun) ? $especies_animales->nombre_comun : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtEspZona[]"))
                @foreach($errors->get("txtEspZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtUsoZona[]","Uso")}}
            {{Form::text("txtUsoZona[]", Input::old("txtUsoZona[]") ? Input::old("txtUsoZona[]") : isset($especies_animales->uso) ? $especies_animales->uso : null,
                array("class" => "form-control", "placeholder" => "Nombre Común", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoZona[]"))
                @foreach($errors->get("txtUsoZona[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selAmeAni","Cuál es la mayor amenaza para los animales silvestres en esta zona")}}
            {{Form::select("selAmeAni", $arrAmeAni,isset($ambiental->amenaza_animales) ? $ambiental->amenaza_animales : null) }}
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
            {{Form::label("txtAmeFaun","Cuales son las amenazas  naturales sobre la fauna")}}
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
            {{Form::select("selPesZon", $arrSiNo,isset($ambiental->pesca_zona) ? $ambiental->pesca_zona : null) }}
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
            {{Form::text("txtPezCons", Input::old("txtPezCons") ? Input::old("txtPezCons") : isset($ambiental->peces_consumo) ? $ambiental->peces_consumo : null,
                array("class" => "form-control", "placeholder" => "Peces de mayor consumo", "autocomplete" => "off")) }}
            @if($errors->has("txtPezCons"))
                @foreach($errors->get("txtPezCons") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Visita al beneficiadero o planta de transformación del mineral (Recurso Hidríco)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selUsoHidZon","Hace usos del recurso hídrico en el proceso de beneficio o transformación del mineral")}}
            {{Form::select("selUsoHidZon", $arrSiNo,isset($ambiental->uso_hidrico) ? $ambiental->uso_hidrico : null) }}
            @if($errors->has("selUsoHidZon"))
                @foreach($errors->get("selUsoHidZon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selPerAgua","Cuenta con permiso de concesión de aguas")}}
            {{Form::select("selPerAgua", $arrSiNo,isset($ambiental->perm_concesion_agua) ? $ambiental->perm_concesion_agua : null) }}
            @if($errors->has("selPerAgua"))
                @foreach($errors->get("selPerAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtNumPerAgua","Si rpta anterior es Sí, Número")}}
            {{Form::text("txtNumPerAgua", Input::old("txtNumPerAgua") ? Input::old("txtNumPerAgua") : isset($ambiental->num_perm_conc_agua) ? $ambiental->num_perm_conc_agua : null,
                array("class" => "form-control", "placeholder" => "Número Permiso", "autocomplete" => "off")) }}
            @if($errors->has("txtNumPerAgua"))
                @foreach($errors->get("txtNumPerAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtVigPerAgua","Si rpta anterior es Sí, Vigencia en dias")}}
            {{Form::text("txtVigPerAgua", Input::old("txtVigPerAgua") ? Input::old("txtVigPerAgua") : isset($ambiental->vigencia_perm_conc_agua) ? $ambiental->vigencia_perm_conc_agua : null,
                array("class" => "form-control", "placeholder" => "Vigencia en días Permiso", "autocomplete" => "off")) }}
            @if($errors->has("txtVigPerAgua"))
                @foreach($errors->get("txtVigPerAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipAflu","Qué tipo de afluente utiliza en el proceso de beneficio o transformación")}}
            {{Form::select("selTipAflu", $arrTipAflu,isset($ambiental->tipo_afluente) ? $ambiental->tipo_afluente : null) }}
            @if($errors->has("selTipAflu"))
                @foreach($errors->get("selTipAflu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("txtNomFuente","Nombre de la fuente")}}
            {{Form::text("txtNomFuente", Input::old("txtNomFuente") ? Input::old("txtNomFuente") : isset($ambiental->nombre_fuente) ? $ambiental->nombre_fuente : null,
                array("class" => "form-control", "placeholder" => "Nombre de la fuente", "autocomplete" => "off")) }}
            @if($errors->has("txtNomFuente"))
                @foreach($errors->get("txtNomFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtDistABoc","A qué distancia de la planta de beneficio se encuentra la bocatoma (metros)")}}
            {{Form::text("txtDistABoc", Input::old("txtDistABoc") ? Input::old("txtDistABoc") : isset($ambiental->distancia_planta_bocatoma) ? $ambiental->distancia_planta_bocatoma : null,
                array("class" => "form-control", "placeholder" => "Distancia", "autocomplete" => "off")) }}
            @if($errors->has("txtDistABoc"))
                @foreach($errors->get("txtDistABoc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesRecHid","Describa el uso del recurso hídrico dentro del proceso")}}
            {{Form::textarea("txtDesRecHid", Input::old("txtDesRecHid") ? Input::old("txtDesRecHid") : isset($ambiental->desc_recurso_didrico) ? $ambiental->desc_recurso_didrico : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDesRecHid"))
                @foreach($errors->get("txtDesRecHid") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtCaudalUti","Caudal utilizado (l/s) ")}}
            {{Form::text("txtCaudalUti", Input::old("txtCaudalUti") ? Input::old("txtCaudalUti") : isset($ambiental->caudal_usado) ? $ambiental->caudal_usado : null,
                array("class" => "form-control", "placeholder" => "Caudal Utilizado", "autocomplete" => "off")) }}
            @if($errors->has("txtCaudalUti"))
                @foreach($errors->get("txtCaudalUti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selAfeHid","Qué tipo de afectación en calidad y cantidad se evidencia en el recurso hídrico")}}
            {{Form::select("selAfeHid", $arrAfeHid,isset($ambiental->afe_hidrica) ? $ambiental->afe_hidrica : null) }}
            @if($errors->has("selAfeHid"))
                @foreach($errors->get("selAfeHid") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnContam" id="btnContam" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divContam">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtContAgua[]","Agregue los contaminantes que se le agregan al agua dentro del proceso")}}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::text("txtContAgua[]", Input::old("txtContAgua[]") ? Input::old("txtContAgua[]") : null,
                array("class" => "form-control", "placeholder" => "Un solo contaminante", "autocomplete" => "off")) }}
            @if($errors->has("txtContAgua[]"))
                @foreach($errors->get("txtContAgua[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selManAguaLluv","Se realiza manejo de aguas lluvias en la planta de beneficio")}}
            {{Form::select("selManAguaLluv", $arrSiNo,isset($ambiental->manejo_agua_lluvia) ? $ambiental->manejo_agua_lluvia : null) }}
            @if($errors->has("selManAguaLluv"))
                @foreach($errors->get("selManAguaLluv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selMTipAguaLluv","Qué tipo de manejo se le realiza a las aguas lluvias")}}
            {{Form::select("selMTipAguaLluv", $arrTipManAguLluv,isset($ambiental->tipo_manejo_agua_lluvia) ? $ambiental->tipo_manejo_agua_lluvia : null) }}
            @if($errors->has("selMTipAguaLluv"))
                @foreach($errors->get("selMTipAguaLluv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Vertimiento</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selVerFue","Existe vertimiento de aguas a una fuente superficial o a un drenaje natural")}}
            {{Form::select("selVerFue", $arrSiNo,isset($ambiental->vertimiento_fuente) ? $ambiental->vertimiento_fuente : null) }}
            @if($errors->has("selVerFue"))
                @foreach($errors->get("selVerFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipVer","Tipo de Vertimento")}}
            {{Form::select("selTipVer", $arrTipVert,isset($ambiental->tipo_vertimiento) ? $ambiental->tipo_vertimiento : null) }}
            @if($errors->has("selTipVer"))
                @foreach($errors->get("selTipVer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            Ubicación del vertimiento (coordenadas geográficas)
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtVerX","X")}}
            {{Form::text("txtVerX", Input::old("txtVerX") ? Input::old("txtVerX") : isset($ambiental->vertimiento_x) ? $ambiental->vertimiento_x : null,
                array("class" => "form-control", "placeholder" => "X", "autocomplete" => "off")) }}
            @if($errors->has("txtVerX"))
                @foreach($errors->get("txtVerX") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtVerY","Y")}}
            {{Form::text("txtVerY", Input::old("txtVerY") ? Input::old("txtVerY") : isset($ambiental->vertimiento_y) ? $ambiental->vertimiento_y : null,
                array("class" => "form-control", "placeholder" => "Y", "autocomplete" => "off")) }}
            @if($errors->has("txtVerY"))
                @foreach($errors->get("txtVerY") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtVerZ","Z")}}
            {{Form::text("txtVerZ", Input::old("txtVerZ") ? Input::old("txtVerZ") : isset($ambiental->vertimiento_z) ? $ambiental->vertimiento_z : null,
                array("class" => "form-control", "placeholder" => "Z", "autocomplete" => "off")) }}
            @if($errors->has("txtVerZ"))
                @foreach($errors->get("txtVerZ") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtCaudVert","Caudal (l/s)")}}
            {{Form::text("txtCaudVert", Input::old("txtCaudVert") ? Input::old("txtCaudVert") : isset($ambiental->vertimiento_caudal) ? $ambiental->vertimiento_caudal : null,
                array("class" => "form-control", "placeholder" => "Caudal", "autocomplete" => "off")) }}
            @if($errors->has("txtCaudVert"))
                @foreach($errors->get("txtCaudVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selPerVert","Tiene permiso de vertimientos")}}
            {{Form::select("selPerVert", $arrSiNo,isset($ambiental->vertimiento_permiso) ? $ambiental->vertimiento_permiso : null) }}
            @if($errors->has("selPerVert"))
                @foreach($errors->get("selPerVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNumVert","Si la rpta anterior fue Si, Número")}}
            {{Form::text("txtNumVert", Input::old("txtNumVert") ? Input::old("txtNumVert") : isset($ambiental->vertimiento_num_permiso) ? $ambiental->vertimiento_num_permiso : null,
                array("class" => "form-control", "placeholder" => "Número Permiso", "autocomplete" => "off")) }}
            @if($errors->has("txtNumVert"))
                @foreach($errors->get("txtNumVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNumRadVert","Si la rpta anterior fue Si, Num radicado")}}
            {{Form::text("txtNumRadVert", Input::old("txtNumRadVert") ? Input::old("txtNumRadVert") : isset($ambiental->vertimiento_num_radicado) ? $ambiental->vertimiento_num_radicado : null,
                array("class" => "form-control", "placeholder" => "Número Radicado", "autocomplete" => "off")) }}
            @if($errors->has("txtNumRadVert"))
                @foreach($errors->get("txtNumRadVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selPlanTrat","Cuenta con planta de tratamiento de aguas producto del beneficio o transformación")}}
            {{Form::select("selPlanTrat", $arrSiNo,isset($ambiental->planta_tratamiento) ? $ambiental->planta_tratamiento : null) }}
            @if($errors->has("selPlanTrat"))
                @foreach($errors->get("selPlanTrat") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipTratAgu","Qué tipo de tratamiento le realiza a las aguas residuales")}}
            {{Form::select("selTipTratAgu", $arrTipTratAgu,isset($ambiental->tipo_trat_agua_resid) ? $ambiental->tipo_trat_agua_resid : null) }}
            @if($errors->has("selTipTratAgu"))
                @foreach($errors->get("selTipTratAgu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesProTra","Describa el proceso de tratamiento de la planta")}}
            {{Form::textarea("txtDesProTra", Input::old("txtDesProTra") ? Input::old("txtDesProTra") : isset($ambiental->proc_trat_planta) ? $ambiental->proc_trat_planta : null,
                array("class" => "form-control", "placeholder" => "Número Radicado", "autocomplete" => "off")) }}
            @if($errors->has("txtDesProTra"))
                @foreach($errors->get("txtDesProTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selProCir","Se realiza proceso de circulación de las aguas del beneficio")}}
            {{Form::select("selProCir", $arrSiNo,isset($ambiental->proc_circ_agua) ? $ambiental->proc_circ_agua : null) }}
            @if($errors->has("selProCir"))
                @foreach($errors->get("selProCir") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipManAgSer","Qué tipo de manejo realiza a las aguas servidas")}}
            {{Form::select("selTipManAgSer", $arrManAguSer,isset($ambiental->tipo_man_agua_serv) ? $ambiental->tipo_man_agua_serv : null) }}
            @if($errors->has("selTipManAgSer"))
                @foreach($errors->get("selTipManAgSer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNumTrab","Número de Trabajadores")}}
            {{Form::text("txtNumTrab", Input::old("txtNumTrab") ? Input::old("txtNumTrab") : isset($ambiental->num_trabajador) ? $ambiental->num_trabajador : null,
                array("class" => "form-control", "placeholder" => "Número trabajadores", "autocomplete" => "off")) }}
            @if($errors->has("txtNumTrab"))
                @foreach($errors->get("txtNumTrab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Recurso Atmosférico</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selEmAt","Existen emisiones atmosfericas en la planta de beneficio")}}
            {{Form::select("selEmAt", $arrSiNo,isset($ambiental->emision_atmos_pla_ben) ? $ambiental->emision_atmos_pla_ben : null) }}
            @if($errors->has("selEmAt"))
                @foreach($errors->get("selEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipEmAt","Tipo de Fuente")}}
            {{Form::select("selTipEmAt", $arrTipEmAt,isset($ambiental->tipo_emis_atmos_pla_ben) ? $ambiental->tipo_emis_atmos_pla_ben : null) }}
            @if($errors->has("selTipEmAt"))
                @foreach($errors->get("selTipEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesFuAtm","Describa la fuente de emisiones atmosféricas dentro del proceso")}}
            {{Form::textarea("txtDesFuAtm", Input::old("txtDesFuAtm") ? Input::old("txtDesFuAtm") : isset($ambiental->desc_fuente_atmos) ? $ambiental->desc_fuente_atmos : null,
                array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
            @if($errors->has("txtDesFuAtm"))
                @foreach($errors->get("txtDesFuAtm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selMinHor","El proceso de beneficio o transformación del mineral requiere del uso de hornos")}}
            {{Form::select("selMinHor", $arrSiNo,isset($ambiental->mineral_uso_horno) ? $ambiental->mineral_uso_horno : null) }}
            <span class="help-block">  * Si la respuesta es afirmativa diligenciar formato hornos </span>
            @if($errors->has("selMinHor"))
                @foreach($errors->get("selMinHor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selPerEmAt","Tiene permiso de emisiones atmosféricas")}}
            {{Form::select("selPerEmAt", $arrSiNo,isset($ambiental->permiso_em_atmos) ? $ambiental->permiso_em_atmos : null) }}
            <span class="help-block">  * Si la respuesta es afirmativa diligenciar formato hornos </span>
            @if($errors->has("selPerEmAt"))
                @foreach($errors->get("selPerEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNumPerEmAt","Número")}}
            {{Form::text("txtNumPerEmAt", Input::old("txtNumPerEmAt") ? Input::old("txtNumPerEmAt") : isset($ambiental->num_permiso_em_atmos) ? $ambiental->num_permiso_em_atmos : null,
                array("class" => "form-control", "placeholder" => "Número", "autocomplete" => "off")) }}
            @if($errors->has("txtNumPerEmAt"))
                @foreach($errors->get("txtNumPerEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtRadPerEmAt","Radicado")}}
            {{Form::text("txtRadPerEmAt", Input::old("txtRadPerEmAt") ? Input::old("txtRadPerEmAt") : isset($ambiental->radi_permiso_em_atmos) ? $ambiental->radi_permiso_em_atmos : null,
                array("class" => "form-control", "placeholder" => "Radicado", "autocomplete" => "off")) }}
            @if($errors->has("txtRadPerEmAt"))
                @foreach($errors->get("txtRadPerEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selAnaEmAt","Ha realizado análisis de emisiones atmosféricas")}}
            {{Form::select("selAnaEmAt", $arrSiNo,isset($ambiental->analisis_em_atmos) ? $ambiental->analisis_em_atmos : null) }}
            @if($errors->has("selAnaEmAt"))
                @foreach($errors->get("selAnaEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtPerAnaEmAt","Quien")}}
            {{Form::text("txtPerAnaEmAt", Input::old("txtPerAnaEmAt") ? Input::old("txtPerAnaEmAt") : isset($ambiental->persona_analisis_em_atmos) ? $ambiental->persona_analisis_em_atmos : null,
                array("class" => "form-control", "placeholder" => "Quien", "autocomplete" => "off")) }}
            @if($errors->has("txtPerAnaEmAt"))
                @foreach($errors->get("txtPerAnaEmAt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selResMon","Resultados de los monitoreos (mg/m3)")}}
            {{Form::select("selResMon", $arrResMon,isset($ambiental->resultado_monitores) ? $ambiental->resultado_monitores : null) }}
            @if($errors->has("selResMon"))
                @foreach($errors->get("selResMon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtDisVivCer","A qué distancia se encuentran viviendas cercanas (metros)")}}
            {{Form::text("txtDisVivCer", Input::old("txtDisVivCer") ? Input::old("txtDisVivCer") : isset($ambiental->distancia_vivi_cercana) ? $ambiental->distancia_vivi_cercana : null,
                array("class" => "form-control", "placeholder" => "Distancia en metros", "autocomplete" => "off")) }}
            @if($errors->has("txtDisVivCer"))
                @foreach($errors->get("txtDisVivCer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selGenRuido","Hay generación de ruido")}}
            {{Form::select("selGenRuido", $arrSiNo,isset($ambiental->generacion_ruido) ? $ambiental->generacion_ruido : null) }}
            @if($errors->has("selGenRuido"))
                @foreach($errors->get("selGenRuido") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtFuGenRu","Fuente de generación de ruido")}}
            {{Form::text("txtFuGenRu", Input::old("txtFuGenRu") ? Input::old("txtFuGenRu") : isset($ambiental->fuente_ruido_atm) ? $ambiental->fuente_ruido_atm : null,
                array("class" => "form-control", "placeholder" => "Fuente de generación", "autocomplete" => "off")) }}
            @if($errors->has("txtFuGenRu"))
                @foreach($errors->get("txtFuGenRu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selMonRuido","Se ha realizado monitoreo de ruido")}}
            {{Form::select("selMonRuido", $arrSiNo,isset($ambiental->monit_ruido_atm) ? $ambiental->monit_ruido_atm : null) }}
            @if($errors->has("selMonRuido"))
                @foreach($errors->get("selMonRuido") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtPerMonRui","Quien")}}
            {{Form::text("txtPerMonRui", Input::old("txtPerMonRui") ? Input::old("txtPerMonRui") : isset($ambiental->persona_monit_ruido) ? $ambiental->persona_monit_ruido : null,
                array("class" => "form-control", "placeholder" => "Quien", "autocomplete" => "off")) }}
            @if($errors->has("txtPerMonRui"))
                @foreach($errors->get("txtPerMonRui") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Recurso Suelo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selImpSuel","Qué tipo de impacto al suelo se esta generando")}}
            {{Form::select("selImpSuel", $arrImpSuel,isset($ambiental->impacto_suelo) ? $ambiental->impacto_suelo : null) }}
            @if($errors->has("selImpSuel"))
                @foreach($errors->get("selImpSuel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesTipImp","Describa el tipo de impacto")}}
            {{Form::textarea("txtDesTipImp", Input::old("txtDesTipImp") ? Input::old("txtDesTipImp") : isset($ambiental->tipo_imp_suelo) ? $ambiental->tipo_imp_suelo : null,
                array("class" => "form-control", "placeholder" => "Tipo de Impacto", "autocomplete" => "off")) }}
            @if($errors->has("txtDesTipImp"))
                @foreach($errors->get("txtDesTipImp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selUsoSobr","Qué hace con los lodos, arenas y/o sobrantes sólidos del beneficio")}}
            {{Form::select("selUsoSobr", $arrUsoSobr,isset($ambiental->uso_sobrantes) ? $ambiental->uso_sobrantes : null) }}
            @if($errors->has("selUsoSobr"))
                @foreach($errors->get("selUsoSobr") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtCanSobr","Cantidad de sobrantes sólidos del proceso de beneficio (Kg/ mes)")}}
            {{Form::text("txtCanSobr", Input::old("txtCanSobr") ? Input::old("txtCanSobr") : isset($ambiental->cantidad_sobrantes) ? $ambiental->cantidad_sobrantes : null,
                array("class" => "form-control", "placeholder" => "Cantidad de sobrantes", "autocomplete" => "off")) }}
            @if($errors->has("txtCanSobr"))
                @foreach($errors->get("txtCanSobr") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Residúos Sólidos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipResGen","Qué tipo de residuos se generan")}}
            {{Form::select("selTipResGen", $arrTipResGen,isset($ambiental->tipo_resi_genera) ? $ambiental->tipo_resi_genera : null) }}
            @if($errors->has("selTipResGen"))
                @foreach($errors->get("selTipResGen") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selClasFueRes","Se realiza clasificación en la fuente")}}
            {{Form::select("selClasFueRes", $arrSiNo,isset($ambiental->clas_fuente_res) ? $ambiental->clas_fuente_res : null) }}
            @if($errors->has("selClasFueRes"))
                @foreach($errors->get("selClasFueRes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selClasResExt","Entrega los residuos clasificados a externos")}}
            {{Form::select("selClasResExt", $arrSiNo,isset($ambiental->residuos_externo) ? $ambiental->residuos_externo : null) }}
            @if($errors->has("selClasResExt"))
                @foreach($errors->get("selClasResExt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            Nombre los gestores externos que hacen la dispocisión final
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtResIns","Residuos inservibles:")}}
            {{Form::text("txtResIns", Input::old("txtResIns") ? Input::old("txtResIns") : isset($ambiental->residuos_inservible) ? $ambiental->residuos_inservible : null,
                array("class" => "form-control", "placeholder" => "Inservibles", "autocomplete" => "off")) }}
            @if($errors->has("txtResIns"))
                @foreach($errors->get("txtResIns") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtResRec","Residuos recuperables:")}}
            {{Form::text("txtResRec", Input::old("txtResRec") ? Input::old("txtResRec") : isset($ambiental->residuos_recuperable) ? $ambiental->residuos_recuperable : null,
                array("class" => "form-control", "placeholder" => "Recuperables", "autocomplete" => "off")) }}
            @if($errors->has("txtResRec"))
                @foreach($errors->get("txtResRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtResRec","Residuos peligrosos o especiales:")}}
            {{Form::text("txtResPel", Input::old("txtResPel") ? Input::old("txtResPel") : isset($ambiental->residuos_peligroso) ? $ambiental->residuos_peligroso : null,
                array("class" => "form-control", "placeholder" => "Peligrosos o especiales", "autocomplete" => "off")) }}
            @if($errors->has("txtResPel"))
                @foreach($errors->get("txtResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selDisResi"," La disposición final de los residuos se realiza en")}}
            {{Form::select("selDisResi", $arrDisResi,isset($ambiental->disposicion_residuos) ? $ambiental->disposicion_residuos : null) }}
            @if($errors->has("selDisResi"))
                @foreach($errors->get("selDisResi") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Componente Fisico (Uso del recurso Hídrico)</p>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$mina->id_mina) }}
    {{ Form::close() }}
</div>
@stop

@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}


@stop