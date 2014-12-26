@extends("SbAdmin.index")

@section("Titulo")
    Aspectos Ambientales
@stop

@section("NombrePagina")
    Aspectos Ambientales
@stop
@section("SeccionTrabajo")
<div class="container-fluid">    

    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#" data-toggle="tab">Ambiental</a></li>
            <!--<li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>-->
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("route"=>"pestanaAmbientalPlanta.store")) }}
    <p class="bg-primary text-center">Visita al beneficiadero o planta de transformación del mineral (Recurso Hidríco)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selUsoHidZon","Hace usos del recurso hídrico en el proceso de beneficio o transformación del mineral")}}
            {{Form::select("selUsoHidZon",$arrSiNo,isset($ambiental->uso_recurso_hidrico) ? $ambiental->uso_recurso_hidrico : null,array("class"=>"form-control")) }}
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
            {{Form::select("selPerAgua", $arrSiNo,isset($ambiental->perm_concesion_agua) ? $ambiental->perm_concesion_agua : null,array("class"=>"form-control")) }}
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
            {{Form::select("selTipAflu",$arrTipAflu,isset($ambiental->tipo_afluente) ? $ambiental->tipo_afluente : null,array("class"=>"form-control")) }}
            @if($errors->has("selTipAflu"))
                @foreach($errors->get("selTipAflu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNomFuente","Nombre de la fuente")}}
            {{Form::text("txtNomFuente", Input::old("txtNomFuente") ? Input::old("txtNomFuente") : isset($ambiental->nombre_fuente) ? $ambiental->nombre_fuente : null,
                array("class" => "form-control", "placeholder" => "Nombre de la fuente", "autocomplete" => "off")) }}
            @if($errors->has("txtNomFuente"))
                @foreach($errors->get("txtNomFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("txtDistABoc","A qué distancia de la planta de beneficio se encuentra la bocatoma (metros)")}}
            {{Form::text("txtDistABoc", Input::old("txtDistABoc") ? Input::old("txtDistABoc") : isset($ambiental->distancia_planta_bocatoma) ? $ambiental->distancia_planta_bocatoma : null,array("class" => "form-control", "placeholder" => "Distancia", "autocomplete" => "off")) }}
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
            {{Form::textarea("txtDesRecHid", Input::old("txtDesRecHid") ? Input::old("txtDesRecHid") : isset($ambiental->desc_recurso_hidrico) ? $ambiental->desc_recurso_hidrico : null,array("class" => "form-control", "placeholder" => "Descripción", "autocomplete" => "off")) }}
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
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selAfeHid","Qué tipo de afectación en calidad y cantidad se evidencia en el recurso hídrico")}}
            {{Form::select("selAfeHid",$arrAfeHid,isset($ambiental->afe_hidrica) ? $ambiental->afe_hidrica : null,array("class"=>"form-control")) }}
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
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtContAgua[]","Agregue los contaminantes que se le agregan al agua dentro del proceso")}}
            {{Form::text("txtContAgua[]", Input::old("txtContAgua[]") ? Input::old("txtContAgua[]"):null,array("class" => "form-control", "placeholder" => "Un solo contaminante","autocomplete" => "off")) }}
            @if($errors->has("txtContAgua[]"))
                @foreach($errors->get("txtContAgua[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>
		@foreach($arrContaminate as $contaminate)
			<div class="row">
				<div class="row container">
				<div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("txtContAgua[]","Agregue los contaminantes que se le agregan al agua dentro del proceso")}}
						{{Form::text("txtContAgua[]",Input::old("txtContAgua[]") ? Input::old('txtContAgua[]'):isset($contaminate->contaminate_agregado) ? $contaminate->contaminate_agregado:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtContAgua[]"))
                @foreach($errors->get("txtContAgua[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
					<a href="{{route('contaminanteElim',array($contaminate['id_planta'],$contaminate['contaminate_agregado'],'PestanaAmbientalPlantaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach
    
		
		
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selManAguaLluv","Se realiza manejo de aguas lluvias en la planta de beneficio")}}
            {{Form::select("selManAguaLluv",$arrSiNo,isset($ambiental->manejo_agua_lluvia) ? $ambiental->manejo_agua_lluvia : null,array("class"=>"form-control")) }}
            @if($errors->has("selManAguaLluv"))
                @foreach($errors->get("selManAguaLluv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selMTipAguaLluv","Qué tipo de manejo se le realiza a las aguas lluvias")}}
            {{Form::select("selMTipAguaLluv", $arrTipManAguLluv,isset($ambiental->tipo_manejo_agua_lluvia) ? $ambiental->tipo_manejo_agua_lluvia : null,array("class"=>"form-control")) }}
            @if($errors->has("selMTipAguaLluv"))
                @foreach($errors->get("selMTipAguaLluv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseVistaBenf","Observaciones Vistas al Beneficiadero")}}
				{{Form::textarea("txtObseVistaBenf", Input::old("txtObseVistaBenf") ? Input::old("txtObseVistaBenf") : isset($ambiental->observ_vista_benf) ? $ambiental->observ_vista_benf : null,array("class" => "form-control", "placeholder" => "Oservaciones visitas al benificiadero", "autocomplete" => "off")) }}
				@if($errors->has("txtObseVistaBenf"))
						@foreach($errors->get("txtObseVistaBenf") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>

    <p class="bg-primary text-center">Vertimiento</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selVerFue","Existe vertimiento de aguas a una fuente superficial o a un drenaje natural")}}
            {{Form::select("selVerFue", $arrSiNo,isset($ambiental->vertimiento_fuente) ? $ambiental->vertimiento_fuente : null,array("class"=>"form-control")) }}
            @if($errors->has("selVerFue"))
                @foreach($errors->get("selVerFue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipVer","Tipo de Vertimento")}}
            {{Form::select("selTipVer", $arrTipVert,isset($ambiental->tipo_vertimiento) ? $ambiental->tipo_vertimiento : null,array("class"=>"form-control")) }}
            @if($errors->has("selTipVer"))
                @foreach($errors->get("selTipVer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            Ubicación del vertimiento (coordenadas planas)
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
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCaudVert","Caudal (l/s)")}}
            {{Form::text("txtCaudVert", Input::old("txtCaudVert") ? Input::old("txtCaudVert") : isset($ambiental->vertimiento_caudal) ? $ambiental->vertimiento_caudal : null,array("class" => "form-control", "placeholder" => "Caudal", "autocomplete" => "off")) }}
            @if($errors->has("txtCaudVert"))
                @foreach($errors->get("txtCaudVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("selPerVert","Tiene permiso de vertimientos")}}
            {{Form::select("selPerVert", $arrSiNo,isset($ambiental->vertimiento_permiso) ? $ambiental->vertimiento_permiso : null,array("class"=>"form-control")) }}
            @if($errors->has("selPerVert"))
                @foreach($errors->get("selPerVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNumVert","Si la rpta anterior fue Si, Número")}}
            {{Form::text("txtNumVert", Input::old("txtNumVert") ? Input::old("txtNumVert") : isset($ambiental->vertimiento_num_permiso) ? $ambiental->vertimiento_num_permiso : null,array("class" => "form-control", "placeholder" => "Número Permiso", "autocomplete" => "off")) }}
            @if($errors->has("txtNumVert"))
                @foreach($errors->get("txtNumVert") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
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
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{Form::label("selPlanTrat","Cuenta con planta de tratamiento de aguas producto del beneficio o transformación")}}
            {{Form::select("selPlanTrat", $arrSiNo,isset($ambiental->planta_tratamiento) ? $ambiental->planta_tratamiento : null,array("class"=>"form-control")) }}
            @if($errors->has("selPlanTrat"))
                @foreach($errors->get("selPlanTrat") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{Form::label("selTipTratAgu","Qué tipo de tratamiento le realiza a las aguas residuales")}}
            {{Form::select("selTipTratAgu", $arrTipTratAgu,isset($ambiental->tipo_trat_agua_resid) ? $ambiental->tipo_trat_agua_resid : null,array("class"=>"form-control")) }}
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
                array("class" => "form-control", "placeholder" => "Desripcion del proceso", "autocomplete" => "off")) }}
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
            {{Form::select("selProCir", $arrSiNo,isset($ambiental->proc_circ_agua) ? $ambiental->proc_circ_agua : null,array("class"=>"form-control")) }}
            @if($errors->has("selProCir"))
                @foreach($errors->get("selProCir") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipManAgSer","Qué tipo de manejo realiza a las aguas servidas")}}
            {{Form::select("selTipManAgSer", $arrTipManjAgu,isset($ambiental->tipo_manej_agua_resid) ? $ambiental->tipo_manej_agua_resid : null,array("class"=>"form-control")) }}
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
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseVertimiento","Observaciones Vertimeinto")}}
				{{Form::textarea("txtObseVertimiento", Input::old("txtObseVertimiento") ? Input::old("txtObseVertimiento") : isset($ambiental->observ_vertimiento) ? $ambiental->observ_vertimiento : null,array("class" => "form-control", "placeholder" => "Oservaciones vertimiento", "autocomplete" => "off")) }}
				@if($errors->has("txtObseVertimiento"))
						@foreach($errors->get("txtObseVertimiento") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>
	
		<p class="bg-primary text-center">Recurso Atmosférico</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{Form::label("selEmiAtmo","Existen emisiones atmosfericas en la planta de beneficio ")}}
            {{Form::select("selEmiAtmo",$arrSiNo,isset($ambiental->emisi_atmos) ? $ambiental->emisi_atmos : null,array("class"=>"form-control")) }}
            @if($errors->has("selEmiAtmo"))
                @foreach($errors->get("selEmiAtmo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("selTipFuente","Tipo de fuente")}}
            {{Form::select("selTipFuente",$arrTipFue,isset($ambiental->tipo_fuente) ? $ambiental->tipo_fuente : null,array("class"=>"form-control")) }}
            @if($errors->has("selTipFuente"))
                @foreach($errors->get("selTipFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
     </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{Form::label("txtDesFuente"," Describa la fuente de emisiones atmosféricas dentro del proceso")}}
            {{Form::textarea("txtDesFuente", Input::old("txtDesFuente") ? Input::old("txtDesFuente") : isset($ambiental->descr_fuente) ? $ambiental->descr_fuente : null,array("class" => "form-control", "placeholder" => "Desripcion de la fuente de emision", "autocomplete" => "off")) }}
            @if($errors->has("txtDesFuente"))
                @foreach($errors->get("txtDesFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selPerEmiAtmo","Tiene permiso de emisiones atmosféricas")}}
				{{Form::select("selPerEmiAtmo",$arrSiNo,isset($ambiental->per_emisi_atmos) ? $ambiental->per_emisi_atmos : null,array("class"=>"form-control")) }}
				@if($errors->has("selEmiAtmo"))
						@foreach($errors->get("selPerEmiAtmo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
					{{Form::label("txtNumPerEmiAtmo","Si rpta anterior es Sí, Número")}}
					{{Form::text("txtNumPerEmiAtmo", Input::old("txtNumPerEmiAtmo") ? Input::old("txtNumPerEmiAtmo") : isset($ambiental->num_perm_emisi_atmos) ? $ambiental->num_perm_emisi_atmos : null,
							array("class" => "form-control", "placeholder" => "Número Permiso", "autocomplete" => "off")) }}
					@if($errors->has("txtNumPerEmiAtmo"))
							@foreach($errors->get("txtNumPerEmiAtmo") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
					{{Form::label("txtNumRadiEmiAtmo","Si rpta anterior es Sí, Numero Radicado")}}
					{{Form::text("txtNumRadiEmiAtmo", Input::old("txtNumRadiEmiAtmo") ? Input::old("txtNumRadiEmiAtmo") : isset($ambiental->num_radi_perm_emisi_atmos) ? $ambiental->num_radi_perm_emisi_atmos : null,
							array("class" => "form-control", "placeholder" => "Numero del Radicado Permiso", "autocomplete" => "off")) }}
					@if($errors->has("txtNumRadiEmiAtmo"))
							@foreach($errors->get("txtNumRadiEmiAtmo") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selAnalEmiAtmo","Ha realizado análisis de emisiones atmosféricas")}}
				{{Form::select("selAnalEmiAtmo",$arrSiNo,isset($ambiental->anal_emisi_atmos) ? $ambiental->anal_emisi_atmos : null,array("class"=>"form-control")) }}
				@if($errors->has("selAnalEmiAtmo"))
						@foreach($errors->get("selAnalEmiAtmo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-6">
					{{Form::label("txtQuieAnalEmiAtmo","Si rpta anterior es Sí, Quien")}}
					{{Form::text("txtQuieAnalEmiAtmo", Input::old("txtQuieAnalEmiAtmo") ? Input::old("txtQuieAnalEmiAtmo") : isset($ambiental->quien_anal_emisi_atmos) ? $ambiental->quien_anal_emisi_atmos : null,
							array("class" => "form-control", "placeholder" => "Quien realiza analisis", "autocomplete" => "off")) }}
					@if($errors->has("txtQuieAnalEmiAtmo"))
							@foreach($errors->get("txtQuieAnalEmiAtmo") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
<?php /*?>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selResulMonitoreo","Resultados de los monitoreos (mg/m3)")}}
				{{Form::select("selResulMonitoreo",$arrResulMonit,isset($ambiental->resul_monit) ? $ambiental->resul_monit : null,array("class"=>"form-control")) }}
				@if($errors->has("selResulMonitoreo"))
						@foreach($errors->get("selResulMonitoreo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
<?php */?>
    </div>
		
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            Resultados de los monitoreos (mg/m3)
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtMP","MP")}}
            {{Form::text("txtMP", Input::old("txtMP") ? Input::old("txtMP") : isset($ambiental->resul_moni_mp) ? $ambiental->resul_moni_mp : null,
                array("class" => "form-control", "placeholder" => "MP", "autocomplete" => "off")) }}
            @if($errors->has("txtMP"))
                @foreach($errors->get("txtMP") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtSO2","SO2")}}
            {{Form::text("txtSO2", Input::old("txtSO2") ? Input::old("txtSO2") : isset($ambiental->resul_moni_so2) ? $ambiental->resul_moni_so2 : null,
                array("class" => "form-control", "placeholder" => "SO2", "autocomplete" => "off")) }}
            @if($errors->has("txtSO2"))
                @foreach($errors->get("txtSO2") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
					{{Form::label("txtNox","Nox")}}
					{{Form::text("txtNox", Input::old("txtNox") ? Input::old("txtNox") : isset($ambiental->resul_moni_nox) ? $ambiental->resul_moni_nox : null,
							array("class" => "form-control", "placeholder" => "Nox", "autocomplete" => "off")) }}
					@if($errors->has("txtNox"))
							@foreach($errors->get("txtNox") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
        </div>
    </div>


    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-6">
				{{Form::label("txtDistVivCer","A qué distancia se encuentran viviendas cercanas")}}
				{{Form::text("txtDistVivCer",Input::old("txtDistVivCer") ? Input::old("txtDistVivCer") : isset($ambiental->dist_viv_cer) ? $ambiental->dist_viv_cer : null,
							array("class" => "form-control", "placeholder" => "Distancia de las viviendas cercanas", "autocomplete" => "off")) }}
				@if($errors->has("txtDistVivCer"))
						@foreach($errors->get("txtDistVivCer") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
					{{Form::label("selGeneRui","Hay generación de ruido")}}
					{{Form::select("selGeneRui",$arrSiNo,isset($ambiental->gene_ruid) ? $ambiental->gene_ruid : null,array("class"=>"form-control")) }}
					@if($errors->has("selGeneRui"))
							@foreach($errors->get("selGeneRui") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("txtFuenRuid","Fuente Ruido")}}
				{{Form::text("txtFuenRuid",Input::old("txtFuenRuid") ? Input::old("txtFuenRuid") : isset($ambiental->fuen_ruid) ? $ambiental->fuen_ruid : null,array("class" => "form-control", "placeholder" => "Fuente Generacion Ruido", "autocomplete" => "off")) }}
				@if($errors->has("txtFuenRuid"))
						@foreach($errors->get("txtFuenRuid") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>

    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selMoniRuid","Ha realizado monitoreo del ruido")}}
				{{Form::select("selMoniRuid",$arrSiNo,isset($ambiental->moni_ruido) ? $ambiental->moni_ruido : null,array("class"=>"form-control")) }}
				@if($errors->has("selMoniRuid"))
						@foreach($errors->get("selMoniRuid") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-6">
					{{Form::label("txtQuieMoniRuido","Si rpta anterior es Sí, Quien")}}
					{{Form::text("txtQuieMoniRuido", Input::old("txtQuieMoniRuido") ? Input::old("txtQuieMoniRuido") : isset($ambiental->quien_moni_ruido) ? $ambiental->quien_moni_ruido : null,
							array("class" => "form-control", "placeholder" => "Quien realiza monitoreo ruido", "autocomplete" => "off")) }}
					@if($errors->has("txtQuieMoniRuido"))
							@foreach($errors->get("txtQuieMoniRuido") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
		</div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseRecurAtmos","Observaciones Recurso Atmosferico")}}
				{{Form::textarea("txtObseRecurAtmos", Input::old("txtObseRecurAtmos") ? Input::old("txtObseRecurAtmos") : isset($ambiental->observ_recur_atmos) ? $ambiental->observ_recur_atmos : null,array("class" => "form-control", "placeholder" => "Oservaciones recurso atmosferico", "autocomplete" => "off")) }}
				@if($errors->has("txtObseRecurAtmos"))
						@foreach($errors->get("txtObseRecurAtmos") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>

		<p class="bg-primary text-center">Recurso Suelo</p>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selTipImpSuel","Que tipo de impacto al suelo se esta generando")}}
				{{Form::select("selTipImpSuel",$arrTipImpSuel,isset($ambiental->tip_imp_suel) ? $ambiental->tip_imp_suel : null,array("class"=>"form-control")) }}
				@if($errors->has("selTipImpSuel"))
						@foreach($errors->get("selTipImpSuel") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-8">
				{{Form::label("txtDesTipImp","Descripcion Tipo Impacto")}}
				{{Form::textarea("txtDesTipImp", Input::old("txtDesTipImp") ? Input::old("txtDesTipImp") : isset($ambiental->des_tip_imp) ? $ambiental->des_tip_imp : null,array("class" => "form-control", "placeholder" => "Descripcion Tipo de Impacto", "autocomplete" => "off")) }}
				@if($errors->has("txtDesTipImp"))
						@foreach($errors->get("txtDesTipImp") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selHaceSobrSoli","Que se hace con sobrantes solidos")}}
				{{Form::select("selHaceSobrSoli",$arrSobrSolido,isset($ambiental->sobr_sol_benf) ? $ambiental->sobr_sol_benf : null,array("class"=>"form-control")) }}
				@if($errors->has("selHaceSobrSoli"))
						@foreach($errors->get("selHaceSobrSoli") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-8">
				{{Form::label("txtCantSobr","Cantidad de sobrantes sólidos del proceso de beneficio (Kg/ mes)")}}
				{{Form::textarea("txtCantSobr", Input::old("txtCantSobr") ? Input::old("txtCantSobr") : isset($ambiental->cant_sobr) ? $ambiental->cant_sobr : null,array("class" => "form-control", "placeholder" => "Cantidad de sobrante", "autocomplete" => "off")) }}
				@if($errors->has("txtCantSobr"))
						@foreach($errors->get("txtCantSobr") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-12">
				{{Form::label("txtObseRecurSuelo","Observaciones Recurso Suelo")}}
				{{Form::textarea("txtObseRecurSuelo", Input::old("txtObseRecurSuelo") ? Input::old("txtObseRecurSuelo") : isset($ambiental->observ_recur_suelo) ? $ambiental->observ_recur_suelo : null,array("class" => "form-control", "placeholder" => "Oservaciones recurso suelo", "autocomplete" => "off")) }}
				@if($errors->has("txtObseRecurSuelo"))
						@foreach($errors->get("txtObseRecurSuelo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>

		<p class="bg-primary text-center">Residuo Sólido</p>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selTipResGen","Qué tipo de residuos se generan")}}
				{{Form::select("selTipResGen",$arrTipResGen,isset($ambiental->tip_resi_genr) ? $ambiental->tip_resi_genr : null,array("class"=>"form-control")) }}
				@if($errors->has("selTipResGen"))
						@foreach($errors->get("selTipResGen") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selClasFuen","Se realiza clasificación en la fuente")}}
				{{Form::select("selClasFuen",$arrSiNo,isset($ambiental->clas_fuen) ? $ambiental->clas_fuen : null,array("class"=>"form-control")) }}
				@if($errors->has("selClasFuen"))
						@foreach($errors->get("selClasFuen") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selEntClasExt","Entrega los residuos clasificados a externos")}}
				{{Form::select("selEntClasExt",$arrSiNo,isset($ambiental->entre_clas_ext) ? $ambiental->entre_clas_ext : null,array("class"=>"form-control")) }}
				@if($errors->has("selEntClasExt"))
						@foreach($errors->get("selEntClasExt") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            Nombre los gestores externos que hacen la dispocisión final 
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtResidInser","Residuos inservibles:")}}
            {{Form::text("txtResidInser", Input::old("txtResidInser") ? Input::old("txtResidInser") : isset($ambiental->resid_inser) ? $ambiental->resid_inser : null,
                array("class" => "form-control", "placeholder" => "Residuos inservibles", "autocomplete" => "off")) }}
            @if($errors->has("txtResidInser"))
                @foreach($errors->get("txtResidInser") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtResidRecup","Residuos recuperables:")}}
            {{Form::text("txtResidRecup", Input::old("txtResidRecup") ? Input::old("txtResidRecup") : isset($ambiental->resid_recup) ? $ambiental->resid_recup : null,
                array("class" => "form-control", "placeholder" => "Residuo recuperable", "autocomplete" => "off")) }}
            @if($errors->has("txtResidRecup"))
                @foreach($errors->get("txtResidRecup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
					{{Form::label("txtResidPelig","Residuos peligrosos o especiales:")}}
					{{Form::text("txtResidPelig", Input::old("txtResidPelig") ? Input::old("txtResidPelig") : isset($ambiental->resid_pelig) ? $ambiental->resid_pelig : null,
							array("class" => "form-control", "placeholder" => "Residuos peligrosos", "autocomplete" => "off")) }}
					@if($errors->has("txtResidPelig"))
							@foreach($errors->get("txtResidPelig") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selDisRes","Disposición final de los residuos")}}
				{{Form::select("selDisRes",$arrDisFinRes,isset($ambiental->dis_fin_resi) ? $ambiental->dis_fin_resi : null,array("class"=>"form-control")) }}
				@if($errors->has("selDisRes"))
						@foreach($errors->get("selDisRes") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-9">
				{{Form::label("txtObseResiSolido","Observaciones Residuo Solido")}}
				{{Form::textarea("txtObseResiSolido", Input::old("txtObseResiSolido") ? Input::old("txtObseResiSolido") : isset($ambiental->observ_resi_soli) ? $ambiental->observ_resi_soli : null,array("class" => "form-control", "placeholder" => "Oservaciones Residuo Solido", "autocomplete" => "off")) }}
				@if($errors->has("txtObseResiSolido"))
						@foreach($errors->get("txtObseResiSolido") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>


		<p class="bg-primary text-center">Componente Biotico</p>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selCobeVege","Cuando inicio el montaje de la planta de beneficio encontró cobertura vegetal")}}
				{{Form::select("selCobeVege",$arrSiNo,isset($ambiental->cobe_vege) ? $ambiental->cobe_vege : null,array("class"=>"form-control")) }}
				@if($errors->has("selCobeVege"))
						@foreach($errors->get("selCobeVege") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selDesCobeVege","Desarrolló actividades de desmonte (cobertura vegetal)")}}
				{{Form::select("selDesCobeVege",$arrSiNo,isset($ambiental->des_cobe_vege) ? $ambiental->des_cobe_vege : null,array("class"=>"form-control")) }}
				@if($errors->has("selDesCobeVege"))
						@foreach($errors->get("selDesCobeVege") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selTipCobeVege","Tipo de cobertura vegetal que encontro")}}
				{{Form::select("selTipCobeVege",$arrTipCobeVege,isset($ambiental->tipo_cobe_vege) ? $ambiental->tipo_cobe_vege : null,array("class"=>"form-control")) }}
				@if($errors->has("selTipCobeVege"))
						@foreach($errors->get("selTipCobeVege") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>

    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selCobeReti","Que hizo con la cobertura retirada")}}
				{{Form::select("selCobeReti",$arrCobeVegeReti,isset($ambiental->cobe_vege_reti) ? $ambiental->cobe_vege_reti : null,array("class"=>"form-control")) }}
				@if($errors->has("selCobeReti"))
						@foreach($errors->get("selCobeReti") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selDescCobeVege","Descripcion de la cobertura vegetal de sus alrededores")}}
				{{Form::select("selDescCobeVege",$arrDescCobeVege,isset($ambiental->desc_cobe_vege) ? $ambiental->desc_cobe_vege : null,array("class"=>"form-control")) }}
				@if($errors->has("selDescCobeVege"))
						@foreach($errors->get("selDescCobeVege") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selUtiEspeVege","Dentro del desarrollo del beneficio minero utiliza especies vegetales")}}
				{{Form::select("selUtiEspeVege",$arrSiNo,isset($ambiental->uti_espe_vege) ? $ambiental->uti_espe_vege : null,array("class"=>"form-control")) }}
				@if($errors->has("selUtiEspeVege"))
						@foreach($errors->get("selUtiEspeVege") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnDesaBeneMine" id="btnDesaBeneMine" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divDesaBeneMine">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNomEspVeg[]","Nombre Comun")}}
            {{Form::text("txtNomEspVeg[]",Input::old("txtNomEspVeg[]") ? Input::old("txtNomEspVeg[]"):null,array("class" => "form-control", "placeholder" => "Nombre Comun","autocomplete" => "off")) }}
            @if($errors->has("txtNomEspVeg[]"))
                @foreach($errors->get("txtNomEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtUsoEspVeg[]","Uso")}}
            {{Form::text("txtUsoEspVeg[]",Input::old("txtUsoEspVeg[]") ? Input::old("txtUsoEspVeg[]"):null,array("class" => "form-control", "placeholder" => "Uso","autocomplete" => "off")) }}
            @if($errors->has("txtUsoEspVeg[]"))
                @foreach($errors->get("txtUsoEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtOrigExtr[]","Origen Extraccion")}}
            {{Form::text("txtOrigExtr[]",Input::old("txtOrigExtr[]") ? Input::old("txtOrigExtr[]"):null,array("class" => "form-control", "placeholder" => "Origen Extraccion","autocomplete" => "off")) }}
            @if($errors->has("txtOrigExtr[]"))
                @foreach($errors->get("txtOrigExtr[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>
		@foreach($arrEspeciesVegetales as $especiesvegetales)
			<div class="row">
				<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("txtNomEspVeg[]","Nombre Comun")}}
            {{Form::text("txtNomEspVeg[]",Input::old("txtNomEspVeg[]") ? Input::old("txtNomEspVeg[]"):isset($especiesvegetales->nombre_comun) ? $especiesvegetales->nombre_comun:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtNomEspVeg[]"))
                @foreach($errors->get("txtNomEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtUsoEspVeg[]","Uso")}}
            {{Form::text("txtUsoEspVeg[]",Input::old("txtUsoEspVeg[]") ? Input::old("txtUsoEspVeg[]"):isset($especiesvegetales->uso) ? $especiesvegetales->uso:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtUsoEspVeg[]"))
                @foreach($errors->get("txtUsoEspVeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("txtOrigExtr[]","Origen Extraccion")}}
            {{Form::text("txtOrigExtr[]",Input::old("txtOrigExtr[]") ? Input::old("txtOrigExtr[]"):isset($especiesvegetales->origen_extraccion) ? $especiesvegetales->origen_extraccion:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtOrigExtr[]"))
                @foreach($errors->get("txtOrigExtr[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>

					<a href="{{route('especieVegetalElim',array($especiesvegetales['id_planta'],$especiesvegetales['nombre_comun'],'PestanaAmbientalPlantaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
			</div>
		@endforeach


		<div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selPermAmbie","Las activiades de uso forestal realizadas, obtuvieron permiso ambiental")}}
				{{Form::select("selPermAmbie",$arrSiNo,isset($ambiental->perm_ambie) ? $ambiental->perm_ambie : null,array("class"=>"form-control")) }}
				@if($errors->has("selPermAmbie"))
						@foreach($errors->get("selPermAmbie") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selTipoPerm","Tipo Permiso")}}
				{{Form::select("selTipoPerm",$arrTipoPerm,isset($ambiental->tipo_permi) ? $ambiental->tipo_permi : null,array("class"=>"form-control")) }}
				@if($errors->has("selTipoPerm"))
						@foreach($errors->get("selTipoPerm") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-2">
				{{Form::label("txtNumPerm","Numero del Permiso")}}
				{{Form::text("txtNumPerm",Input::old("txtNumPerm") ? Input::old("txtNumPerm"):isset($ambiental->num_perm) ? $ambiental->num_perm:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
				@if($errors->has("txtNumPerm"))
						@foreach($errors->get("txtNumPerm") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
				{{Form::label("selCompFores","Realiza actividades de compensacion forestal")}}
				{{Form::select("selCompFores",$arrSiNo,isset($ambiental->comp_fores) ? $ambiental->comp_fores : null,array("class"=>"form-control")) }}
				@if($errors->has("selCompFores"))
						@foreach($errors->get("selCompFores") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnCompForestal" id="btnCompForestal" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divCompForestal">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtEspec[]","Especie")}}
            {{Form::text("txtEspec[]",Input::old("txtEspec[]") ? Input::old("txtEspec[]"):null,array("class" => "form-control", "placeholder" => "Especie","autocomplete" => "off")) }}
            @if($errors->has("txtEspec[]"))
                @foreach($errors->get("txtEspec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCantCompFor[]","Cantidad")}}
            {{Form::text("txtCantCompFor[]",Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]"):null,array("class" => "form-control", "placeholder" => "Cantidad","autocomplete" => "off")) }}
            @if($errors->has("txtCantCompFor[]"))
                @foreach($errors->get("txtCantCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtVerComFor[]","Vereda")}}
            {{Form::text("txtVerComFor[]",Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]"):null,array("class" => "form-control", "placeholder" => "Vereda","autocomplete" => "off")) }}
            @if($errors->has("txtVerComFor[]"))
                @foreach($errors->get("txtVerComFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtXCompFor[]","Coordenada X")}}
            {{Form::text("txtXCompFor[]",Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]"):null,array("class" => "form-control", "placeholder" => "Coordena X","autocomplete" => "off")) }}
            @if($errors->has("txtXCompFor[]"))
                @foreach($errors->get("txtXCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtYCompFor[]","Coordenada Y")}}
            {{Form::text("txtYCompFor[]",Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]"):null,array("class" => "form-control", "placeholder" => "Coordena Y","autocomplete" => "off")) }}
            @if($errors->has("txtYCompFor[]"))
                @foreach($errors->get("txtYCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>


	@foreach($arrCompensacionForestal as $compensacionforestal)
		<div class="row">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtEspec[]","Especie")}}
            {{Form::text("txtEspec[]",Input::old("txtEspec[]") ? Input::old("txtEspec[]"):isset($compensacionforestal->especie) ? $compensacionforestal->especie:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtEspec[]"))
                @foreach($errors->get("txtEspec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtCantCompFor[]","Cantidad")}}
            {{Form::text("txtCantCompFor[]",Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]"):isset($compensacionforestal->cantidad) ? $compensacionforestal->cantidad:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtCantCompFor[]"))
                @foreach($errors->get("txtCantCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtVerComFor[]","Vereda")}}
            {{Form::text("txtVerComFor[]",Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]"):isset($compensacionforestal->vereda) ? $compensacionforestal->vereda:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtVerComFor[]"))
                @foreach($errors->get("txtVerComFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtXCompFor[]","Coordenada X")}}
            {{Form::text("txtXCompFor[]",Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]"):isset($compensacionforestal->ccor_x) ? $compensacionforestal->ccor_x:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtXCompFor[]"))
                @foreach($errors->get("txtXCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("txtYCompFor[]","Coordenada Y")}}
            {{Form::text("txtYCompFor[]",Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]"):isset($compensacionforestal->ccor_y) ? $compensacionforestal->ccor_y:null ,array('class'=>'form-control col-xs-12 col-sm-3','autocomplete'=>'off')) }}
            @if($errors->has("txtYCompFor[]"))
                @foreach($errors->get("txtYCompFor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
					<a href="{{route('compesacionForestalElim',array($compensacionforestal['id_planta'],$compensacionforestal['especie'],'PestanaAmbientalPlantaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
			</div>
		</div>
	 @endforeach


		<div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selRondaProtHidr","Se respeta la ronda de protección hidrica")}}
				{{Form::select("selRondaProtHidr",$arrSiNo,isset($ambiental->rond_prot) ? $ambiental->rond_prot : null,array("class"=>"form-control")) }}
				@if($errors->has("selRondaProtHidr"))
						@foreach($errors->get("selRondaProtHidr") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-5">
					{{Form::label("txtAnchoRond","Ancho de la ronda (metros)")}}
					{{Form::text("txtAnchoRond",Input::old("txtAnchoRond") ? Input::old("txtAnchoRond"):isset($ambiental->ancho_rond) ? $ambiental->ancho_rond:null ,array('class'=>'form-control col-xs-12 col-sm-3',"placeholder"=>"Ancho de la Ronda",'autocomplete'=>'off')) }}
					@if($errors->has("txtAnchoRond"))
							@foreach($errors->get("txtAnchoRond") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-11">
				{{Form::label("txtDescEspeEnco","Descripcion de especies encontradas")}}
				{{Form::textarea("txtDescEspeEnco",Input::old("txtDescEspeEnco") ? Input::old("txtDescEspeEnco"):isset($ambiental->desc_espe_encon) ? $ambiental->desc_espe_encon:null ,array('class'=>'form-control col-xs-12 col-sm-3',"placeholder"=>"Descripcion especies encontradas",'autocomplete'=>'off')) }}
				@if($errors->has("txtDescEspeEnco"))
						@foreach($errors->get("txtDescEspeEnco") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>

		<div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
				{{Form::label("selActiPesca","Se realizan actividades de pesca")}}
				{{Form::select("selActiPesca",$arrSiNo,isset($ambiental->acti_pesca) ? $ambiental->acti_pesca : null,array("class"=>"form-control")) }}
				@if($errors->has("selActiPesca"))
						@foreach($errors->get("selActiPesca") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-7">
					{{Form::label("txtPecesMayoCons","Peces de mayor consumo")}}
					{{Form::textarea("txtPecesMayoCons",Input::old("txtPecesMayoCons") ? Input::old("txtPecesMayoCons"):isset($ambiental->peces_mayo_cons) ? $ambiental->peces_mayo_cons:null ,array('class'=>'form-control col-xs-12 col-sm-3',"placeholder"=>"Peces de Mayor Consumo",'autocomplete'=>'off')) }}
					@if($errors->has("txtPecesMayoCons"))
							@foreach($errors->get("txtPecesMayoCons") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-11">
				{{Form::label("txtObsCompBiot","Observaciones Componente Biotico")}}
				{{Form::textarea("txtObsCompBiot",Input::old("txtObsCompBiot") ? Input::old("txtObsCompBiot"):isset($ambiental->obs_comp_biot) ? $ambiental->obs_comp_biot:null ,array('class'=>'form-control col-xs-12 col-sm-3',"placeholder"=>"Descripcion especies encontradas",'autocomplete'=>'off')) }}
				@if($errors->has("txtObsCompBiot"))
						@foreach($errors->get("txtObsCompBiot") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
		</div>
		
		<br /><br /><br />
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    <?php /*?>{{ Form::hidden("hidMina",$mina->id_mina) }}<?php */?>
		{{ Form::hidden("hidPlanta",$planta->id_planta) }}
    {{ Form::close() }}
</div>
@stop

@section("JsJQuery")
    {{ HTML::script('js/FormMinas/FormMinas.js') }}
		{{ HTML::script('js/restfulizer.js') }}

<script>
		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor1      = $("#divDesaBeneMine"); //ID del contenedor
		var AddButton       = $("#btnDesaBeneMine"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divDesaBeneMine div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnDesaBeneMine").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::label("txtNomEspVeg[]","Nombre Comun")}}'+
            '{{Form::text("txtNomEspVeg[]",Input::old("txtNomEspVeg[]") ? Input::old("txtNomEspVeg[]"):null,array("class" => "form-control", "placeholder" => "Nombre Comun","autocomplete" => "off")) }}'+
            '@if($errors->has("txtNomEspVeg[]"))'+
                '@foreach($errors->get("txtNomEspVeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            '{{Form::label("txtUsoEspVeg[]","Uso")}}'+
            '{{Form::text("txtUsoEspVeg[]",Input::old("txtUsoEspVeg[]") ? Input::old("txtUsoEspVeg[]"):null,array("class" => "form-control", "placeholder" => "Uso","autocomplete" => "off")) }}'+
            '@if($errors->has("txtUsoEspVeg[]"))'+
                '@foreach($errors->get("txtUsoEspVeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            '{{Form::label("txtOrigExtr[]","Origen Extraccion")}}'+
            '{{Form::text("txtOrigExtr[]",Input::old("txtOrigExtr[]") ? Input::old("txtOrigExtr[]"):null,array("class" => "form-control", "placeholder" => "Origen Extraccion","autocomplete" => "off")) }}'+
            '@if($errors->has("txtOrigExtr[]"))'+
                '@foreach($errors->get("txtOrigExtr[]") as $error)'+
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


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divCompForestal"); //ID del contenedor
		var AddButton       = $("#btnCompForestal"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divCompForestal div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnCompForestal").click(function () {
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtEspec[]","Especie")}}'+
            '{{Form::text("txtEspec[]",Input::old("txtEspec[]") ? Input::old("txtEspec[]"):null,array("class" => "form-control", "placeholder" => "Especie","autocomplete" => "off")) }}'+
            '@if($errors->has("txtEspec[]"))'+
                '@foreach($errors->get("txtEspec[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtCantCompFor[]","Cantidad")}}'+
            '{{Form::text("txtCantCompFor[]",Input::old("txtCantCompFor[]") ? Input::old("txtCantCompFor[]"):null,array("class" => "form-control", "placeholder" => "Cantidad","autocomplete" => "off")) }}'+
            '@if($errors->has("txtCantCompFor[]"))'+
                '@foreach($errors->get("txtCantCompFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtVerComFor[]","Vereda")}}'+
            '{{Form::text("txtVerComFor[]",Input::old("txtVerComFor[]") ? Input::old("txtVerComFor[]"):null,array("class" => "form-control", "placeholder" => "Vereda","autocomplete" => "off")) }}'+
            '@if($errors->has("txtVerComFor[]"))'+
                '@foreach($errors->get("txtVerComFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtXCompFor[]","Coordenada X")}}'+
            '{{Form::text("txtXCompFor[]",Input::old("txtXCompFor[]") ? Input::old("txtXCompFor[]"):null,array("class" => "form-control", "placeholder" => "Coordena X","autocomplete" => "off")) }}'+
            '@if($errors->has("txtXCompFor[]"))'+
                '@foreach($errors->get("txtXCompFor[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::label("txtYCompFor[]","Coordenada Y")}}'+
            '{{Form::text("txtYCompFor[]",Input::old("txtYCompFor[]") ? Input::old("txtYCompFor[]"):null,array("class" => "form-control", "placeholder" => "Coordena Y","autocomplete" => "off")) }}'+
            '@if($errors->has("txtYCompFor[]"))'+
                '@foreach($errors->get("txtYCompFor[]") as $error)'+
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
			var temporal='<div class="row container">'+
			'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{Form::label("txtContAgua[]","Agregue los contaminantes que se le agregan al agua dentro del proceso")}}'+
            '{{Form::text("txtContAgua[]", Input::old("txtContAgua[]") ? Input::old("txtContAgua[]"):null,array("class" => "form-control", "placeholder" => "Un solo contaminante","autocomplete" => "off")) }}'+
            '@if($errors->has("txtContAgua[]"))'+
                '@foreach($errors->get("txtContAgua[]") as $error)'+
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