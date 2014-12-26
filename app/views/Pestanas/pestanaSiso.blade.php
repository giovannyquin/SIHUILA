@extends("SbAdmin.index")
@foreach ($mina as $mina)
@endforeach
@section("Titulo")
    Aspectos Siso
@stop

@section("NombrePagina")
    {{ link_to("ListarFrentes/{$mina->id_minamina}", $mina->nombre_mina) }} / Aspectos Siso
@stop

@section("SeccionTrabajo")
<div class="container-fluid">
    
    @foreach ($detalle as $detalle)
    <div class="row">{{$detalle->num_placa_jur}}</div>
    @endforeach
    @foreach ($siso as $siso)
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="">{{ link_to("pestanaMinero/{$mina->id_mina}", "Minero") }}</li>
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="active"><a href="#" data-toggle="tab">Siso</a></li>
            <li class="">{{ link_to("pestanaGeologica/{$mina->id_mina}", "Geologico") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("url" => "pestanaSiso")) }}
    <p class="bg-primary text-center">Información Laboral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMenor", "Número de Menores de Edad", array("class" => "control-label")) }}
            {{ Form::text("txtMenor", Input::old("txtMenor"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Menores de Edad", "autocomplete" => "off")) }}
            @if($errors->has("txtMenor"))
                @foreach($errors->get("txtMenor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMujeres", "Número de Mujeres", array("class" => "control-label")) }}
            {{ Form::text("txtMujeres", Input::old("txtMujeres"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Mujeres", "autocomplete" => "off")) }}
            @if($errors->has("txtMujeres"))
                @foreach($errors->get("txtMujeres") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Aspectos Generales</p>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnSegSoc" id="btnSegSoc" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id='divSegSoc'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-7">
                {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSeg[]",$arrTipSegSoc,null )}}
                @if($errors->has("selSeg[]"))
                    @foreach($errors->get("selSeg[]") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSegSi[]",$arrSiNo,isset($seleccion_multiple->resultado) ? $seleccion_multiple->resultado:null )}}
                @if($errors->has("selSegSi[]"))
                    @foreach($errors->get("selSegSi[]") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
        </div>

        @foreach($arrSegSoc as $segsoc)           
            <div class="row container">
                <div class="form-group form-group-sm col-xs-12 col-sm-7">
                    {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-2">
                    {{Form::select("selSeg[]", $arrTipSegSoc, isset($segsoc['id_topologia']) ? $segsoc['id_topologia'] : null )}}
                    @if($errors->has("selSeg[]"))
                        @foreach($errors->get("selSeg[]") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-2">
                    {{Form::select("selSegSi[]", $arrSiNo, isset($segsoc['resultado']) ? $segsoc['resultado'] : null )}}
                    @if($errors->has("selSegSi[]"))
                        @foreach($errors->get("selSegSi[]") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                </div>
                <a href="{{route('seleccionMultipleElim',array($segsoc['id_mina'],$segsoc['id_topologia'],'Pago Seg Social','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAccLab", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAccLab", Input::old("txtHalAccLab"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAccLab"))
                @foreach($errors->get("txtHalAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr class="bg-primary">
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selAccLab","Han ocurrido accidentes laborales", array("class" => "control-label")) }}
            {{Form::select("selAccLab",$arrSiNo,isset($siso['acci_laboral']) ? $siso['acci_laboral'] : null )}}
            @if($errors->has("selAccLab"))
                @foreach($errors->get("selAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtAccLab", "Cuantos Accidentes", array("class" => "control-label")) }}
            {{ Form::text("txtAccLab",Input::old('txtAccLab') ? Input::old('txtAccLab'):isset($siso->num_acc) ? $siso->num_acc:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Litologia','autocomplete'=>'off')) }}
            @if($errors->has("txtAccLab"))
                @foreach($errors->get("txtAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selRepAccLab", "Han reportado", array("class" => "control-label")) }}
            {{Form::select("selRepAccLab",$arrSiNo,isset($siso['report_acc']) ? $siso['report_acc'] : null )}}
            @if($errors->has("selRepAccLab"))
                @foreach($errors->get("selRepAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnEleSeg" id="btnEleSeg" class="btn btn-warning btn-xs" value="Agregar Campo">
    		</div>
    </div>    
    <div class="row" id='divEleSeg'>
        <div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selElBas[]", "La empresa cuenta con elementos basicos para atencion de emergencias", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selElBas[]",$arrTipEleEme,null )}}
							@if($errors->has("selElBas[]"))
									@foreach($errors->get("selElBas[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selEleBasSi[]",$arrSiNo,null )}}
							@if($errors->has("selEleBasSi[]"))
									@foreach($errors->get("selEleBasSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
				</div>
		</div>
		@foreach($arrEleEme as $arreleeme)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selElBas[]","La empresa cuenta con elementos basicos para atencion de emergencias",array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selElBas[]",$arrTipEleEme,isset($arreleeme['id_topologia']) ? $arreleeme['id_topologia'] : null )}}
							@if($errors->has("selElBas[]"))
									@foreach($errors->get("selElBas[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selEleBasSi[]", $arrSiNo, isset($arreleeme['resultado']) ? $arreleeme['resultado'] : null )}}
							@if($errors->has("selEleBasSi[]"))
									@foreach($errors->get("selEleBasSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arreleeme['id_mina'],$arreleeme['id_topologia'],'Elementos de Emergencia','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEleBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEleBas", Input::old("txtHalEleBas"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEleBas"))
                @foreach($errors->get("txtHalEleBas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selBrig", "La empresa cuenta con brigadista o socorredor minero", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selBrig",$arrSiNo,isset($siso['brigadista']) ? $siso['brigadista'] : null )}}
            @if($errors->has("selBrig"))
                @foreach($errors->get("selBrig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalBrig", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalBrig", Input::old("txtHalBrig"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalBrig"))
                @foreach($errors->get("txtHalBrig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selRegHig", "La empresa cuenta con un reglamento de higiene y seguridad industrial publicado, programa de gestion de la seguridad y/o Programa de Salud Ocupacional", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selRegHig",$arrSiNo,isset($siso['reg_pub']) ? $siso['reg_pub'] : null )}}
            @if($errors->has("selRegHig"))
                @foreach($errors->get("selRegHig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalRegHig", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalRegHig", Input::old("txtHalRegHig"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalRegHig"))
                @foreach($errors->get("txtHalRegHig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCopaso", "La empresa cuenta con un COPASO o VIGIA DE LA SEGURIDAD", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCopaso",$arrSiNo,isset($siso['copaso']) ? $siso['copaso'] : null )}}
            @if($errors->has("selCopaso"))
                @foreach($errors->get("selCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtCopaso", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtCopaso", Input::old("txtCopaso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtCopaso"))
                @foreach($errors->get("txtCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenal", "Se evidencia  señalizacion en la empresa", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenal",$arrSiNo,isset($siso['segnal']) ? $siso['segnal'] : null )}}
            @if($errors->has("selSenal"))
                @foreach($errors->get("selSenal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtCopaso", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtCopaso", Input::old("txtCopaso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtCopaso"))
                @foreach($errors->get("txtCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          <input type="button" name="btnElePro" id="btnElePro" class="btn btn-warning btn-xs" value="Agregar Campo">
    		</div>
    </div>    
		<div class="row" id='divElePro'>
			<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selBotProt[]", "Se evidencia uso de elementos de proteccion personal EPP por parte de los trabajadores", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selBotProt[]",$arrTipElePro,null )}}
							@if($errors->has("selBotProt[]"))
									@foreach($errors->get("selBotProt[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selProtSi[]",$arrSiNo,null )}}
							@if($errors->has("selProtSi[]"))
									@foreach($errors->get("selProtSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
			</div>
		</div>
		@foreach($arrElePro as $arrelepro)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selBotProt[]", "Se evidencia uso de elementos de proteccion personal EPP por parte de los trabajadores", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selBotProt[]",$arrTipElePro,isset($arrelepro['id_topologia']) ? $arrelepro['id_topologia'] : null )}}
							@if($errors->has("selBotProt[]"))
									@foreach($errors->get("selBotProt[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selProtSi[]", $arrSiNo, isset($arrelepro['resultado']) ? $arrelepro['resultado'] : null )}}
							@if($errors->has("selProtSi[]"))
									@foreach($errors->get("selProtSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arrelepro['id_mina'],$arrelepro['id_topologia'],'Elementos de Proteccion','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProt", Input::old("txtHalProt"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalProt"))
                @foreach($errors->get("txtHalProt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          <input type="button" name="btnSumElePro" id="btnSumElePro" class="btn btn-warning btn-xs" value="Agregar Campo">
    		</div>
    </div>    
		<div class="row" id='divSumElePro'>
			<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selProtSop[]",$arrTipElePro,null )}}
							@if($errors->has("selProtSop[]"))
									@foreach($errors->get("selProtSop[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selProtSopSi[]",$arrSiNo,null )}}
							@if($errors->has("selProtSopSi[]"))
									@foreach($errors->get("selProtSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
			</div>
		</div>
		@foreach($arrSumElePro as $arrsumelepro)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selProtSop[]",$arrTipElePro,isset($arrsumelepro['id_topologia']) ? $arrsumelepro['id_topologia'] : null )}}
							@if($errors->has("selProtSop[]"))
									@foreach($errors->get("selProtSop[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selProtSopSi[]",$arrSiNo, isset($arrsumelepro['resultado']) ? $arrsumelepro['resultado'] : null )}}
							@if($errors->has("selProtSopSi[]"))
									@foreach($errors->get("selProtSopSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arrsumelepro['id_mina'],$arrsumelepro['id_topologia'],'Suministra Elementos de Proteccion','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProtSop", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProtSop", Input::old("txtHalProtSop"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalProtSop"))
                @foreach($errors->get("txtHalProtSop") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selInsSan", "La empresa cuenta con Instalaciones sanitarias destinadas para el aseo del personal y cambio de ropa de trabajo; aquellas deberán contar con duchas, lavamanos, sanitarios y suministro de agua potable", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selInsSan",$arrSiNo, isset($siso['inst_san']) ? $siso['inst_san'] : null )}}
            @if($errors->has("selInsSan"))
                @foreach($errors->get("selInsSan") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalInsSan", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalInsSan", Input::old("txtHalInsSan"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalInsSan"))
                @foreach($errors->get("txtHalInsSan") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPozSep", "Se evidencia pozo septico", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selPozSep",$arrSiNo, isset($siso['pozo_sep']) ? $siso['pozo_sep'] : null )}}
            @if($errors->has("selPozSep"))
                @foreach($errors->get("selPozSep") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPozSep", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPozSep", Input::old("txtHalPozSep"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPozSep"))
                @foreach($errors->get("txtHalPozSep") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          <input type="button" name="btnSerBas" id="btnSerBas" class="btn btn-warning btn-xs" value="Agregar Campo">
    		</div>
    </div>    
		<div class="row" id='divSerBas'>
			<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selSerBas[]", "La empresa cuenta servicios basicos", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selSerBas[]",$arrTipSerBas,null )}}
							@if($errors->has("selSerBas[]"))
									@foreach($errors->get("selSerBas[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selSerBasSi[]",$arrSiNo,null )}}
							@if($errors->has("selSerBasSi[]"))
									@foreach($errors->get("selSerBasSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
			</div>
		</div>
		@foreach($arrSerBas as $arrserbas)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selSerBas[]", "La empresa cuenta servicios basicos", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selSerBas[]",$arrTipSerBas,isset($arrserbas['id_topologia']) ? $arrserbas['id_topologia'] : null )}}
							@if($errors->has("selSerBas[]"))
									@foreach($errors->get("selSerBas[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selSerBasSi[]",$arrSiNo, isset($arrserbas['resultado']) ? $arrserbas['resultado'] : null )}}
							@if($errors->has("selSerBasSi[]"))
									@foreach($errors->get("selSerBasSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arrserbas['id_mina'],$arrserbas['id_topologia'],'Servicios Basicos','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSerBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSerBas", Input::old("txtHalSerBas"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSerBas"))
                @foreach($errors->get("txtHalSerBas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCasino", "Se evidencia campamento, restaurante y/o casino", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCasino",$arrSiNo, isset($siso['campamento']) ? $siso['campamento'] : null )}}
            @if($errors->has("selCasino"))
                @foreach($errors->get("selCasino") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCasino", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCasino", Input::old("txtHalCasino"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCasino"))
                @foreach($errors->get("txtHalCasino") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAseo", "Se observa  orden y aseo", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAseo",$arrSiNo, isset($siso['orden']) ? $siso['orden'] : null )}}
            @if($errors->has("selAseo"))
                @foreach($errors->get("selAseo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAseo", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAseo", Input::old("txtHalAseo"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAseo"))
                @foreach($errors->get("txtHalAseo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCtrlAcc", "Se controla el acceso a los visitantes a la explotación minera", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCtrlAcc",$arrSiNo, isset($siso['control_visitantes']) ? $siso['control_visitantes'] : null )}}
            @if($errors->has("selCtrlAcc"))
                @foreach($errors->get("selCtrlAcc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCtrlAcc", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCtrlAcc", Input::old("txtHalCtrlAcc"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCtrlAcc"))
                @foreach($errors->get("txtHalCtrlAcc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Riesgo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selDesli", "Se evidencia presencia  de  deslizamiento, caida de rocas, factible inundacion, posibilidad de incendio, entre otros", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selDesli",$arrSiNo, isset($siso['desliz']) ? $siso['desliz'] : null )}}
            @if($errors->has("selDesli"))
                @foreach($errors->get("selDesli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenaliz", "Estan delimitados y/o señalizados", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenaliz",$arrSiNo, isset($siso['desliz_delim']) ? $siso['desliz_delim'] : null )}}
            @if($errors->has("selSenaliz"))
                @foreach($errors->get("selSenaliz") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesli", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesli", Input::old("txtHalDesli"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesli"))
                @foreach($errors->get("txtHalDesli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEtDelim", "La explotacion presenta delimitadacion de las diferentes zonas? Explotacion, beneficio, baños, etc?", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selEtDelim",$arrSiNo, isset($siso['delim_zonas']) ? $siso['delim_zonas'] : null )}}
            @if($errors->has("selEtDelim"))
                @foreach($errors->get("selEtDelim") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEtDelim", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEtDelim", Input::old("txtHalEtDelim"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEtDelim"))
                @foreach($errors->get("txtHalEtDelim") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCtrRies", "Existen controles para reducir los riesgos en la fuente generadora y en el medio transmisor", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCtrRies",$arrSiNo, isset($siso['control_reduc_ries']) ? $siso['control_reduc_ries'] : null )}}
            @if($errors->has("selCtrRies"))
                @foreach($errors->get("selCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCtrRies", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCtrRies", Input::old("txtHalCtrRies"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCtrRies"))
                @foreach($errors->get("txtHalCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAplCtrRies", "Se aplican controles para reducir los riesgos en los trabajadores", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAplCtrRies",$arrSiNo, isset($siso['reduc_ries_trab']) ? $siso['reduc_ries_trab'] : null )}}
            @if($errors->has("selAplCtrRies"))
                @foreach($errors->get("selAplCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAplCtrRies", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAplCtrRies", Input::old("txtHalAplCtrRies"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAplCtrRies"))
                @foreach($errors->get("txtHalAplCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Aspectos Técnicos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMetET", "Se evidencia un metodo de explotacion definido", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selMetET",$arrSiNo, isset($siso['met_et_def']) ? $siso['met_et_def'] : null )}}
            @if($errors->has("selMetET"))
                @foreach($errors->get("selMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form:: label("txtTipoMetET", "Cual, o en que consiste", array("class"=> "control-label"))}}
            {{ Form::text("txtTipoMetET", Input::old("txtTipoMetET"),
                           array("class"=>"form-control", "placeholder" => "", "autocomplete" => "off"))}}
            @if($errors->has("txtTipoMetET"))
                @foreach($errors->get("txtTipoMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMetET", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMetET", Input::old("txtHalMetET"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMetET"))
                @foreach($errors->get("txtHalMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAbaRec", "Las áreas de trabajo antiguas o abandonadas se encuentran en programa de recuperacion, reforestacion, entre otras", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selAbaRec",$arrSiNo, isset($siso['area_trab_ant']) ? $siso['area_trab_ant'] : null )}}
            @if($errors->has("selAbaRec"))
                @foreach($errors->get("selAbaRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAbaRec", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAbaRec", Input::old("txtHalAbaRec"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAbaRec"))
                @foreach($errors->get("txtHalAbaRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEster", "Si en el proceso se generan esteriles, se realiza disposicion adecuada de ellos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selEster",$arrSiNo, isset($siso['disp_ester']) ? $siso['disp_ester'] : null )}}
            @if($errors->has("selEster"))
                @foreach($errors->get("selEster") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEster", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEster", Input::old("txtHalEster"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEster"))
                @foreach($errors->get("txtHalEster") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAseCal", "Cuenta la empresa con asesoría externa calificada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selAseCal",$arrSiNo, isset($siso['ase_ext_cal']) ? $siso['ase_ext_cal'] : null )}}
            @if($errors->has("selAseCal"))
                @foreach($errors->get("selAseCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAseCal", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAseCal", Input::old("txtHalAseCal"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAseCal"))
                @foreach($errors->get("txtHalAseCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Beneficio y Transformación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnAspBen" id="btnAspBen" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    
		<div class="row" id='divAspBen'>
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAspBen[]", "En el proceso de beneficio y/o transformacion se evidencia alguno de los siguientes aspecto", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAspBen[]",$arrTipAspBen,null )}}
            @if($errors->has("selAspBen[]"))
                @foreach($errors->get("selAspBen[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAspBenSi[]",$arrSiNo )}}
            @if($errors->has("selAspBenSi[]"))
                @foreach($errors->get("selAspBenSi[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>

		@foreach($arrAspBen as $arraspben)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selAspBen[]", "En el proceso de beneficio y/o transformacion se evidencia alguno de los siguientes aspecto", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selAspBen[]",$arrTipAspBen,isset($arraspben['id_topologia']) ? $arraspben['id_topologia'] : null )}}
							@if($errors->has("selAspBen[]"))
									@foreach($errors->get("selAspBen[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selAspBenSi[]",$arrSiNo, isset($arraspben['resultado']) ? $arraspben['resultado'] : null )}}
							@if($errors->has("selAspBenSi[]"))
									@foreach($errors->get("selAspBenSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arraspben['id_mina'],$arraspben['id_topologia'],'Beneficio y Transformacion','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAspBen", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAspBen", Input::old("txtHalAspBen"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAspBen"))
                @foreach($errors->get("txtHalAspBen") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selProTra", "Se realiza proceso de  transformacion", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selProTra",$arrSiNo,isset($siso['proc_transf']) ? $siso['proc_transf']:null )}}
            @if($errors->has("selProTra"))
                @foreach($errors->get("selProTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesPro", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesPro",Input::old("txtDesPro"),array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesPro"))
                @foreach($errors->get("txtDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesPro", Input::old("txtHalDesPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesPro"))
                @foreach($errors->get("txtHalDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEqProTra", "Emplea equipos en el proceso de beneficio y/o transformacion", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selEqProTra",$arrSiNo,isset($siso['equipo_trans']) ? $siso['equipo_trans']:null )}}
            @if($errors->has("selEqProTra"))
                @foreach($errors->get("selEqProTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesEqPro", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesEqPro", Input::old("txtDesEqPro"), 
                array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesEqPro"))
                @foreach($errors->get("txtDesEqPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEqPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEqPro", Input::old("txtHalEqPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEqPro"))
                @foreach($errors->get("txtHalEqPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Seguridad Minera</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selTalMec", "Existe taller de mecanica para el mantenimiento de la maquinaria pesada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selTalMec",$arrSiNo,isset($siso['taller_meca']) ? $siso['taller_meca']:null )}}
            @if($errors->has("selTalMec"))
                @foreach($errors->get("selTalMec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTalMec", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTalMec", Input::old("txtHalTalMec"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTalMec"))
                @foreach($errors->get("txtHalTalMec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAlmCom", "Se realiza almacenamiento de combustibles", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selAlmCom",$arrSiNo,isset($siso['alma_comb']) ? $siso['alma_comb']:null )}}
            @if($errors->has("selAlmCom"))
                @foreach($errors->get("selAlmCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAlmCom", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAlmCom", Input::old("txtHalAlmCom"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAlmCom"))
                @foreach($errors->get("txtHalAlmCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnSenSeg" id="btnSenSeg" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
		<div class="row" id='divSenSeg'>
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenSeg[]", "La empresa tiene instalada señalización, informativa, preventiva y de seguridad en la zona de explotacion, beneficio y/o transformación", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenSeg[]",$arrTipExpBen,null )}}
            @if($errors->has("selSenSeg[]"))
                @foreach($errors->get("selSenSeg[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenSegSi[]",$arrSiNo )}}
            @if($errors->has("selSenSegSi[]"))
                @foreach($errors->get("selSenSegSi[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>

		@foreach($arrExpBen as $arrexpben)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selSenSeg[]", "La empresa tiene instalada señalización, informativa, preventiva y de seguridad en la zona de explotacion, beneficio y/o transformación", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selSenSeg[]",$arrTipExpBen,isset($arrexpben['id_topologia']) ? $arrexpben['id_topologia'] : null )}}
							@if($errors->has("selSenSeg[]"))
									@foreach($errors->get("selSenSeg[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selSenSegSi[]",$arrSiNo, isset($arrexpben['resultado']) ? $arrexpben['resultado'] : null )}}
							@if($errors->has("selSenSegSi[]"))
									@foreach($errors->get("selSenSegSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arrexpben['id_mina'],$arrexpben['id_topologia'],'Explotacion y Beneficio','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSenSeg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSenSeg", Input::old("txtHalSenSeg"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSenSeg"))
                @foreach($errors->get("txtHalSenSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEleCump", "Todos los sistemas y equipos eléctricos cumplen a simple vista con normas de seguridad", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selEleCump",$arrSiNo,isset($siso['sistem_segu']) ? $siso['sistem_segu']:null )}}
            @if($errors->has("selEleCump"))
                @foreach($errors->get("selEleCump") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesEleCump", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesEleCump", Input::old("txtDesEleCump"), 
                array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesEleCump"))
                @foreach($errors->get("txtDesEleCump") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesPro", Input::old("txtHalDesPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesPro"))
                @foreach($errors->get("txtHalDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPerExp", "Si la empresa usa explosivos cuenta con el permiso de la autoridad competente para el uso y manejo de explosivos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selPerExp",$arrSiNo,isset($siso['perm_explo']) ? $siso['perm_explo']:null )}}
            @if($errors->has("selPerExp"))
                @foreach($errors->get("selPerExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPerCap", "Cuenta con personal capacitado y competente para su manejo", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selPerCap",$arrSiNo,isset($siso['personal_explo']) ? $siso['personal_explo']:null )}}
            @if($errors->has("selPerCap"))
                @foreach($errors->get("selPerCap") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPerExp", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPerExp", Input::old("txtHalPerExp"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPerExp"))
                @foreach($errors->get("txtHalPerExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selDisEst", "La empresa cumple con las disposiciones establecidas para el uso y almacenamiento y transporte de explosivos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selDisEst",$arrSiNo,isset($siso['disposicion_explo']) ? $siso['disposicion_explo']:null )}}
            @if($errors->has("selDisEst"))
                @foreach($errors->get("selDisEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDisEst", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDisEst", Input::old("txtHalDisEst"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDisEst"))
                @foreach($errors->get("txtHalDisEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selMedCom", "Es utilizado algun medio de comunicación y/o señal de comunicación en el cargue y descargue de material", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selMedCom",$arrSiNo,isset($siso['comun_cargue']) ? $siso['comun_cargue']:null )}}
            @if($errors->has("selMedCom"))
                @foreach($errors->get("selMedCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMedCom", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMedCom", Input::old("txtHalMedCom"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMedCom"))
                @foreach($errors->get("txtHalMedCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selVia", "Las vías en donde circulan los medios de transporte son diferentes a las utilizadas para el recorrido peatonal", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selVia",$arrSiNo,isset($siso['vias_trans_peato']) ? $siso['vias_trans_peato']:null )}}
            @if($errors->has("selVia"))
                @foreach($errors->get("selVia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalVia", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalVia", Input::old("txtHalVia"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalVia"))
                @foreach($errors->get("txtHalVia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selBueOrg", "La explotación tiene una buena organización con manejo de taludes, botaderos, aspectos locativos, manejo ambiental, metodo de explotacion, proyeccion minera adecuada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selBueOrg",$arrSiNo,isset($siso['buena_org_et']) ? $siso['buena_org_et']:null )}}
            @if($errors->has("selBueOrg"))
                @foreach($errors->get("selBueOrg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalBueOrg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalBueOrg", Input::old("txtHalBueOrg"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalBueOrg"))
                @foreach($errors->get("txtHalBueOrg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnZonDeli" id="btnZonDeli" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
		<div class="row" id='divZonDeli'>
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selZonDel[]", "La zona de explotacion, de beneficio y/o transformacion se encuentran delimitadas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selZonDel[]",$arrTipExpBen,null )}}
            @if($errors->has("selZonDel[]"))
                @foreach($errors->get("selZonDel[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selZonDelSi[]",$arrSiNo )}}
            @if($errors->has("selZonDelSi[]"))
                @foreach($errors->get("selZonDelSi[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>

		@foreach($arrZonExpDel as $arrzonexpdel)           
			<div class="row">
					<div class="form-group form-group-sm col-xs-12 col-sm-6">
							{{ Form::label("selZonDel[]", "La zona de explotacion, de beneficio y/o transformacion se encuentran delimitadas", array("class" => "control-label")) }}
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-3">
							{{Form::select("selZonDel[]",$arrTipExpBen,isset($arrzonexpdel['id_topologia']) ? $arrzonexpdel['id_topologia'] : null )}}
							@if($errors->has("selZonDel[]"))
									@foreach($errors->get("selZonDel[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{Form::select("selZonDelSi[]",$arrSiNo, isset($arrzonexpdel['resultado']) ? $arrzonexpdel['resultado'] : null )}}
							@if($errors->has("selZonDelSi[]"))
									@foreach($errors->get("selZonDelSi[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
						<a href="{{route('seleccionMultipleElim',array($arrzonexpdel['id_mina'],$arrzonexpdel['id_topologia'],'Zona de Explotacion Delimitada','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalZonDel", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalZonDel", Input::old("txtHalZonDel"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalZonDel"))
                @foreach($errors->get("txtHalZonDel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selResPel", "Se generan residuos peligrosos producto del beneficio y/o transformacion del mineral", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selResPel",$arrSiNo,isset($siso['residuos_bene']) ? $siso['residuos_bene']:null )}}
            @if($errors->has("selResPel"))
                @foreach($errors->get("selResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEvVer", "Se evidencian vertimientos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selEvVer",$arrSiNo,isset($siso['vertimentos']) ? $siso['vertimentos']:null )}}
            @if($errors->has("selEvVer"))
                @foreach($errors->get("selEvVer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalResPel", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalResPel", Input::old("txtHalResPel"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalResPel"))
                @foreach($errors->get("txtHalResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("seTraAl", "Se realizan trabajos en alturas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("seTraAl",$arrSiNo,isset($siso['altura']) ? $siso['altura']:null )}}
            @if($errors->has("seTraAl"))
                @foreach($errors->get("seTraAl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCapEpp", "Cuentan con la capacitación y los EPP necesarios para realizar esta labor", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selCapEpp",$arrSiNo,isset($siso['capacit_altura']) ? $siso['capacit_altura']:null )}}
            @if($errors->has("selCapEpp"))
                @foreach($errors->get("selCapEpp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTraAl", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTraAl", Input::old("txtHalTraAl"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTraAl"))
                @foreach($errors->get("txtHalTraAl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selExti", "La empresa cuenta con suficiente número de extintores para el control de un posible conato de incendio", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::select("selExti",$arrSiNo,isset($siso['num_extintor']) ? $siso['num_extintor']:null )}}
            @if($errors->has("selExti"))
                @foreach($errors->get("selExti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalExti", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalExti", Input::old("txtHalExti"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalExti"))
                @foreach($errors->get("txtHalExti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Observaciones</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObsSiso", "Observaciones", array("class" => "control-label")) }}
            {{ Form::textarea("txtObsSiso", Input::old("txtObsSiso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsSiso"))
                @foreach($errors->get("txtObsSiso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$mina->id_mina) }}
    {{Form::close()}}
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
<script>
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor1      = $("#divSegSoc"); //ID del contenedor
		var AddButton       = $("#btnSegSoc"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSegSoc div").length + 1;
    $("#btnSegSoc").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-7">'+  
											'{{ Form::label("selSeg[]", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
													'{{Form::select("selSeg[]",$arrTipSegSoc,null )}}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
													'{{Form::select("selSegSi[]",$arrSiNo,isset($seleccion_multiple->resultado) ? $seleccion_multiple->resultado:null )}}'+ 
											'</div><a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor1).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divEleSeg"); //ID del contenedor
		var AddButton       = $("#btnEleSeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divEleSeg div").length + 1;
    $("#btnEleSeg").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
												'{{ Form::label("selElBas1", "La empresa cuenta con elementos basicos para atencion de emergencias", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
												'{{Form::select("selElBas[]",$arrTipEleEme,null )}}'+
												'@if($errors->has("selElBas[]"))'+
													'@foreach($errors->get("selElBas[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
												'{{Form::select("selEleBasSi[]",$arrSiNo,null )}}'+
												'@if($errors->has("selEleBasSi[]"))'+
													'@foreach($errors->get("selEleBasSi[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor2).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor3      = $("#divElePro"); //ID del contenedor
		var AddButton       = $("#btnElePro"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divElePro div").length + 1;
    $("#btnElePro").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
											'{{ Form::label("selBotProt[]", "Se evidencia uso de elementos de proteccion personal EPP por parte de los trabajadores", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
												'{{Form::select("selBotProt[]",$arrTipElePro,null )}}'+
												'@if($errors->has("selBotProt[]"))'+
													'@foreach($errors->get("selBotProt[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
											'{{Form::select("selProtSi[]",$arrSiNo,null )}}'+
											'@if($errors->has("selProtSi[]"))'+
												'@foreach($errors->get("selProtSi[]") as $error)'+
													'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
												'@endforeach'+
											'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor3).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor4      = $("#divSumElePro"); //ID del contenedor
		var AddButton       = $("#btnSumElePro"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSumElePro div").length + 1;
    $("#btnSumElePro").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
										'{{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}'+
										'</div>'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
										'{{Form::select("selProtSop[]",$arrTipElePro,null )}}'+
										'@if($errors->has("selProtSop[]"))'+
											'@foreach($errors->get("selProtSop[]") as $error)'+
												'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
											'@endforeach'+
										'@endif'+
									'</div>'+
									'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
										'{{Form::select("selProtSopSi[]",$arrSiNo,null )}}'+
										'@if($errors->has("selProtSopSi[]"))'+
											'@foreach($errors->get("selProtSopSi[]") as $error)'+
												'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
											'@endforeach'+
										'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor4).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor5      = $("#divSerBas"); //ID del contenedor
		var AddButton       = $("#btnSerBas"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSerBas div").length + 1;
    $("#btnSerBas").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
							'{{ Form::label("selSerBas[]", "La empresa cuenta servicios basicos", array("class" => "control-label")) }}'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
							'{{Form::select("selSerBas[]",$arrTipSerBas,null )}}'+
							'@if($errors->has("selSerBas[]"))'+
									'@foreach($errors->get("selSerBas[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{Form::select("selSerBasSi[]",$arrSiNo,null )}}'+
							'@if($errors->has("selSerBasSi[]"))'+
									'@foreach($errors->get("selSerBasSi[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor5).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor6      = $("#divAspBen"); //ID del contenedor
		var AddButton       = $("#btnAspBen"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divAspBen div").length + 1;
    $("#btnAspBen").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selAspBen[]", "En el proceso de beneficio y/o transformacion se evidencia alguno de los siguientes aspecto", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selAspBen[]",$arrTipAspBen,null )}}'+
            '@if($errors->has("selAspBen[]"))'+
                '@foreach($errors->get("selAspBen[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selAspBenSi[]",$arrSiNo )}}'+
            '@if($errors->has("selAspBenSi[]"))'+
                '@foreach($errors->get("selAspBenSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor6).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor7      = $("#divSenSeg"); //ID del contenedor
		var AddButton       = $("#btnSenSeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSenSeg div").length + 1;
    $("#btnSenSeg").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selSenSeg[]", "La empresa tiene instalada señalización, informativa, preventiva y de seguridad en la zona de explotacion, beneficio y/o transformación", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selSenSeg[]",$arrTipExpBen,null )}}'+
            '@if($errors->has("selSenSeg[]"))'+
                '@foreach($errors->get("selSenSeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selSenSegSi[]",$arrSiNo )}}'+
            '@if($errors->has("selSenSegSi[]"))'+
                '@foreach($errors->get("selSenSegSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor7).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor8      = $("#divZonDeli"); //ID del contenedor
		var AddButton       = $("#btnZonDeli"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divZonDeli div").length + 1;
    $("#btnZonDeli").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selZonDel[]", "La zona de explotacion, de beneficio y/o transformacion se encuentran delimitadas", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selZonDel[]",$arrTipExpBen,null )}}'+
            '@if($errors->has("selZonDel[]"))'+
                '@foreach($errors->get("selZonDel[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selZonDelSi[]",$arrSiNo )}}'+
            '@if($errors->has("selZonDelSi[]"))'+
                '@foreach($errors->get("selZonDelSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor8).append(temporal);
			x++; //text box increment
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
