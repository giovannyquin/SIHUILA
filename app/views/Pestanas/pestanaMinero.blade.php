@extends("SbAdmin.index")
@foreach ($minas as $mina)
    
    @endforeach
@section("Titulo")
    Aspectos  Mineros
@stop

@section("NombrePagina")
    {{ link_to("ListarFrentes/{$mina->id_minamina}", $mina->nombre_mina) }} / Aspectos Mineros
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($minas as $mina)
    @endforeach
    @foreach ($detalle as $detalle)
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
		@foreach ($arrInfra as $arrInfra)
    <div class="row"></div>
    @endforeach
		@foreach ($arrEquMaq as $arrEquMaq)
    <div class="row"></div>
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
<!--            <li >{{ link_to("pestanaJuridico/{$mina->id_mina}", "Juridico") }}</li>-->
            <li class="active"><a href="#minero" data-toggle="tab">Minero</a></li>
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>
            <li class="">{{ link_to("pestanaGeologica/{$mina->id_mina}", "Geologico") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    @if(Session::get("id_mina"))
            <div class="alert alert-success">{{ Session::get("id_mina")}}</div>
        @endif
		{{ Form::open(array("route"=>"pestanaMinero.store")) }}
    <p class="bg-primary text-center" >Ubicación Georeferenciacion del Frente de la Bocamina (coordenas planas)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnUbiGeo" id="btnUbiGeo" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>

		<div class="row" id="divUbiGeo">
			<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{ Form::label("selFrente[]", "Frente o Bocamina", array("class" => "control-label")) }}
							{{ Form::select("selFrente[]",$comFrenteBocamina) }}
							@if($errors->has("selFrente[]"))
									@foreach($errors->get("selFrente") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{ Form::label("txtNorte[]", 'Norte (X)', array("class" => "control-label")) }}
							{{ Form::text("txtNorte[]",Input::old("txtNorte[]") ? Input::old('txtNorte[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Norte (X)','autocomplete'=>'off')) }}
							@if($errors->has("txtNorte[]"))
									@foreach($errors->get("txtNorte[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{ Form::label("txtEste[]", 'Este (Y)', array("class" => "control-label")) }}
							{{ Form::text("txtEste[]",Input::old("txtEste[]") ? Input::old('txtEste[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Este (Y)','autocomplete'=>'off')) }}
							@if($errors->has("txtEste[]"))
									@foreach($errors->get("txtEste[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-2">
							{{ Form::label("txtAltura[]", 'Altura (msnm)', array("class" => "control-label")) }}
							{{ Form::text("txtAltura[]",Input::old("txtAltura[]") ? Input::old('txtAltura[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Altura (msnm)','autocomplete'=>'off')) }}
							@if($errors->has("txtAltura[]"))
									@foreach($errors->get("txtAltura[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
					<div class="form-group form-group-sm col-xs-12 col-sm-1">
							{{ Form::label("selEstadoFrente[]", "Estado", array("class" => "control-label")) }}
							{{ Form::select("selEstadoFrente[]",$arrTipEstado) }}
							@if($errors->has("selEstadoFrente[]"))
									@foreach($errors->get("selEstadoFrente[]") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
			</div>
		</div>	
		@foreach($arrEstado as $estado)
			<div class="row">
				<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selFrente[]", "Frente o Bocamina", array("class" => "control-label")) }}
								{{ Form::select("selFrente[]",$comFrenteBocamina,isset($estado['frente_bocamina']) ? $estado['frente_bocamina']:null) }}
								@if($errors->has("selFrente[]"))
										@foreach($errors->get("selFrente") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("txtNorte[]", 'Norte (X)', array("class" => "control-label")) }}
								{{ Form::text("txtNorte[]",Input::old("txtNorte[]") ? Input::old('txtNorte[]'):isset($estado['norte']) ? $estado['norte']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Norte (X)','autocomplete'=>'off')) }}
								@if($errors->has("txtNorte[]"))
										@foreach($errors->get("txtNorte[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("txtEste[]", 'Este (Y)', array("class" => "control-label")) }}
								{{ Form::text("txtEste[]",Input::old("txtEste[]") ? Input::old('txtEste[]'):isset($estado['este']) ? $estado['este']:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Este (Y)','autocomplete'=>'off')) }}
								@if($errors->has("txtEste[]"))
										@foreach($errors->get("txtEste[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("txtAltura[]", 'Altura (msnm)', array("class" => "control-label")) }}
								{{ Form::text("txtAltura[]",Input::old("txtAltura[]") ? Input::old('txtAltura[]'):isset($estado['altura']) ? $estado['altura']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Altura (msnm)','autocomplete'=>'off')) }}
								@if($errors->has("txtAltura[]"))
										@foreach($errors->get("txtAltura[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-1">
								{{ Form::label("selEstadoFrente[]", "Estado", array("class" => "control-label")) }}
								{{ Form::select("selEstadoFrente[]",$arrTipEstado,isset($estado['id_estado']) ? $estado['id_estado']:null) }}
								@if($errors->has("selEstadoFrente[]"))
										@foreach($errors->get("selEstadoFrente[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('geoMultipleElim',array($estado['id_mina'],$estado['frente_bocamina'],$estado['id_estado'],'PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTurnos", 'Turnos/día', array("class" => "control-label")) }}
            {{ Form::text("txtTurnos",Input::old("txtTurnos") ? Input::old('txtTurnos'):isset($geo->turno_dia) ? $geo->turno_dia:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Turnos','autocomplete'=>'off')) }}
            @if($errors->has("txtTurnos"))
                @foreach($errors->get("txtTurnos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtDias", 'Días/Semana', array("class" => "control-label")) }}
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

		@foreach($arrMinPpal as $minppal)
		@endforeach
    <p class="bg-primary text-center" >Producción Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProd", "Mineral", array("class" => "control-label")) }}
            {{ Form::select("selMineralProd",$comMineral,isset($minppal->id_mineral) ? $minppal->id_mineral:null,array('class'=>'form-control')) }}
            @if($errors->has("selMineralProd"))
                @foreach($errors->get("selMineralProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProd", "Unidad", array("class" => "control-label")) }}
            {{ Form::select("selUnidadProd",$comUnidad,isset($minppal->id_unidad) ? $minppal->id_unidad : null,array('class'=>'form-control')) }}
            @if($errors->has("selUnidadProd"))
                @foreach($errors->get("selUnidadProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidad", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidad",Input::old("txtCantidad") ? Input::old('txtCantidad'):isset($minppal->cantidad) ? $minppal->cantidad:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Cantidad','autocomplete'=>'off')) }}
            @if($errors->has("txtCantidad"))
                @foreach($errors->get("txtCantidad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProd", "Año", array("class" => "control-label")) }}
            {{ Form::select('selAgnoProd',$arrAgno,isset($minppal->agno) ? $minppal->agno:null,array('class'=>'form-control')) }}
            @if($errors->has("selAgnoProd"))
                @foreach($errors->get("selAgnoProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProd", "Mes", array("class" => "control-label")) }}
            {{ Form::select('selMesProd',$arrMes,isset($produccion->mes) ? $minppal->mes : null,array('class'=>'form-control')) }}
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
            {{ Form::textarea("txtObsProd",Input::old("txtObsProd") ? Input::old('txtObsProd'):isset($minppal->observaciones_produccion) ? $minppal->observaciones_produccion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsProd"))
                @foreach($errors->get("txtObsProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>

    <p class="bg-primary text-center" >Producción Otro Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnProOtrMin" id="btnProOtrMin" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divProOtrMin">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProdOtro[]", "Mineral", array("class" => "control-label")) }}
            {{ Form::select("selMineralProdOtro[]",$comMineral,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array('class'=>'form-control')) }}
            @if($errors->has("selMineralProdOtro[]"))
                @foreach($errors->get("selMineralProdOtro[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProdOtro[]", "Unidad", array("class" => "control-label")) }}
            {{ Form::select("selUnidadProdOtro[]",$comUnidad,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array('class'=>'form-control')) }}
            @if($errors->has("selUnidadProdOtro[]"))
                @foreach($errors->get("selUnidadProdOtro[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidadOtro[]", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidadOtro[]", Input::old("txtCantidadOtro"),
                            array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidadOtro[]"))
                @foreach($errors->get("txtCantidadOtro[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProdOtro[]", "Año", array("class" => "control-label")) }}
            {{ Form::select("selAgnoProdOtro[]",$arrAgno,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array("class"=>"form-control")) }}
            @if($errors->has("selAgnoProdOtro[]"))
                @foreach($errors->get("selAgnoProdOtro[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        
				<div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProdOtro[]", "Mes", array("class" => "control-label")) }}
            {{ Form::select("selMesProdOtro[]",$arrMes,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array('class'=>'form-control')) }}
            @if($errors->has("selMesProdOtro[]"))
                @foreach($errors->get("selMesProdOtro[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
		</div>

		@foreach($arrMinOtro as $minotro)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selMineralProdOtro[]", "Mineral", array("class" => "control-label")) }}
								{{ Form::select("selMineralProdOtro[]",$comMineral,isset($minotro['id_mineral']) ? $minotro['id_mineral']:null,array("class"=>"form-control")) }}
								@if($errors->has("selMineralProdOtro[]"))
										@foreach($errors->get("selMineralProdOtro[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selUnidadProdOtro[]", "Unidad", array("class" => "control-label")) }}
								{{ Form::select("selUnidadProdOtro[]",$comUnidad,isset($minotro['id_unidad']) ? $minotro['id_unidad']:null,array("class"=>"form-control")) }}
								@if($errors->has("selUnidadProdOtro[]"))
										@foreach($errors->get("selUnidadProdOtro[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("txtCantidadOtro[]",'Cantidad', array("class" => "control-label")) }}
								{{ Form::text("txtCantidadOtro[]",Input::old("txtCantidadOtro[]") ? Input::old('txtCantidadOtro[]'):isset($minotro['cantidad']) ? $minotro['cantidad']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtCantidadOtro[]"))
										@foreach($errors->get("txtCantidadOtro[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selAgnoProdOtro[]", "Año", array("class" => "control-label")) }}
								{{ Form::select("selAgnoProdOtro[]",$arrAgno,isset($minotro['agno']) ? $minotro['agno']:null,array("class"=>"form-control")) }}
								@if($errors->has("selAgnoProdOtro[]"))
										@foreach($errors->get("selAgnoProdOtro[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selMesProdOtro[]", "Mes", array("class" => "control-label")) }}
								{{ Form::select("selMesProdOtro[]",$arrMes,isset($minotro['mes']) ? $minotro['mes']:null,array("class"=>"form-control")) }}
								@if($errors->has("selMesProdOtro[]"))
										@foreach($errors->get("selMesProdOtro[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<a href="" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsProdOtro", 'Observaciones', array("class" => "control-label")) }}
						{{ Form::textarea("txtObsProdOtro",Input::old("txtObsProdOtro") ? Input::old('txtObsProdOtro'):isset($detalle->obser_produc_otro_mineral) ? $detalle->obser_produc_otro_mineral:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsProdOtro"))
                @foreach($errors->get("txtObsProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>


    <p class="bg-primary text-center" >Talento Humano</p>
    <p class="bg-primary text-center" >Responsable de Explotación Permanente</p>

<!---------------------------------------- Responsable de Explotacion Permanente ---------------------------------------------->

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnResExpPer" id="btnResExpPer" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divResExpPer">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfPer[]", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPer[]",Input::old("txtEmpPer[]") ? Input::old('txtProfPer[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfPer[]"))
                @foreach($errors->get("txtProfPer[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPer[]", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old('txtProfPer[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Empleados','autocomplete'=>'off')) }}
            @if($errors->has("txtEmpPer[]"))
                @foreach($errors->get("txtEmpPer[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}
            {{Form::select("selConPer[]",$comTipoContrato,isset($yi) ? $yi:null,array("class"=>"form-control")) }}
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
								{{ Form::label("txtProfPer[]",'Número de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtProfPer[]",Input::old("txtProfPer[]") ? Input::old('txtProfPer[]'):isset($talhumresexpper['num_profesionales']) ? $talhumresexpper['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfPer[]"))
										@foreach($errors->get("txtProfPer[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpPer[]",'Número de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old('txtEmpPer[]'):isset($talhumresexpper['num_empleados']) ? $talhumresexpper['num_empleados']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtEmpPer[]"))
										@foreach($errors->get("txtEmpPer[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-2">
								{{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}
								{{ Form::select("selConPer[]",$comTipoContrato,isset($talhumresexpper['tipo_contrato']) ? $talhumresexpper['tipo_contrato']:null,array("class"=>"form-control")) }}
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


<!---------------------------------------- Responsable de Explotación Temporal ---------------------------------------------->
    <p class="bg-primary text-center" >Responsable de Explotación Temporal</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnResExpTem" id="btnResExpTem" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divResExpTem">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfTem[]", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old('txtProfTem[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfTem[]"))
                @foreach($errors->get("txtProfTem[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTem[]", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTem[]",Input::old("txtEmpTem[]") ? Input::old('txtEmpTem[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Empleados','autocomplete'=>'off')) }}
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
								{{ Form::label("txtProfTem[]",'Número de Profesionales', array("class" => "control-label")) }}
								{{Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old('txtProfTem[]'):isset($talhumresexptem['num_profesionales']) ? $talhumresexptem['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfTem[]"))
										@foreach($errors->get("txtProfTem[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpTem[]",'Número de Profesionales', array("class" => "control-label")) }}
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

<!---------------------------------------- Responsable de Explotación Temporal ---------------------------------------------->


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
            {{Form::label("txtProfPerOpe[]", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old('txtProfPerOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfPerOpe[]"))
                @foreach($errors->get("txtProfPerOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPerOpe[]", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPerOpe[]",Input::old("txtEmpPerOpe[]") ? Input::old('txtEmpPerOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Empleados','autocomplete'=>'off')) }}
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
								{{Form::label("txtProfPerOpe[]",'Número de Profesionales', array("class" => "control-label")) }}
								{{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old('txtProfPerOpe[]'):isset($talhumopeper['num_profesionales']) ? $talhumopeper['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfPerOpe[]"))
										@foreach($errors->get("txtProfPerOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpPerOpe[]",'Número de Profesionales', array("class" => "control-label")) }}
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
            {{Form::label("txtProfTemOpe[]", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old('txtProfTemOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("txtProfTemOpe[]"))
                @foreach($errors->get("txtProfTemOpe[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTemOpe[]", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTemOpe[]",Input::old("txtEmpTemOpe[]") ? Input::old('txtEmpTemOpe[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Número de Empleados','autocomplete'=>'off')) }}
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
								{{Form::label("txtProfTemOpe[]",'Número de Profesionales', array("class" => "control-label")) }}
								{{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old('txtProfTemOpe[]'):isset($talhumopetem['num_profesionales']) ? $talhumopetem['num_profesionales']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfTemOpe[]"))
										@foreach($errors->get("txtProfTemOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{ Form::label("txtEmpTemOpe[]",'Número de Profesionales', array("class" => "control-label")) }}
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

    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsRecHum", 'Observaciones', array("class" => "control-label")) }}
						{{ Form::textarea("txtObsRecHum",Input::old("txtObsRecHum") ? Input::old('txtObsRecHum'):isset($detalle->obser_recur_hum) ? $detalle->obser_recur_hum:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsRecHum"))
                @foreach($errors->get("txtObsRecHum") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>

<!---------------------------------------- Operador Temporal ---------------------------------------------->

    <p class="bg-primary text-center" >Seguridad Social</p>
    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnRegSal" id="btnRegSal" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divRegSal">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenSalud[]", "Regimen", array("class" => "control-label")) }}
            {{Form::select("selRegimenSalud[]",$arrTipRegimen,Input::old("selRegimenSalud[]") ? Input::old('selRegimenSalud[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("selRegimenSalud"))
                @foreach($errors->get("selRegimenSalud") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantSalud[]", 'Número de Personas (Salud)', array("class" => "control-label")) }}
						{{ Form::text("txtCantSalud[]",Input::old("txtCantSalud[]") ? Input::old('txtCantSalud[]'):null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
            @if($errors->has("txtCantSalud[]"))
                @foreach($errors->get("txtCantSalud[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>
		@foreach($arrRegSalud as $regsalud)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("selRegimenSalud[]", "Regimen", array("class" => "control-label")) }}
								{{Form::select("selRegimenSalud[]",$arrTipRegimen,Input::old("selRegimenSalud[]") ? Input::old('selRegimenSalud[]'):isset($regsalud['id_regimen']) ? $regsalud['id_regimen']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("txtProfTemOpe[]"))
										@foreach($errors->get("txtProfTemOpe[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("txtCantSalud[]", 'Número de Personas (Salud)', array("class" => "control-label")) }}
								{{ Form::text("txtCantSalud[]",Input::old("txtCantSalud[]") ? Input::old('txtCantSalud[]'):isset($regsalud['numero']) ? $regsalud['numero']:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
								@if($errors->has("txtCantSalud[]"))
										@foreach($errors->get("txtCantSalud[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
							<a href="{{route('seguridadSocialElim',array($regsalud['id_mina'],$regsalud['id_regimen'],$regsalud['id_tipo_seguridad'],$regsalud['id_tipo_mineria'],'PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnRegPen" id="btnRegPen" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divRegPen">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenPension[]", "Regimen", array("class" => "control-label")) }}
            {{Form::select("selRegimenPension[]",$arrTipRegimen,Input::old("selRegimenPension[]") ? Input::old('selRegimenPension[]'):null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
            @if($errors->has("selRegimenPension[]"))
                @foreach($errors->get("selRegimenPension[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantPension[]", 'Número de Personas (Pension)', array("class" => "control-label")) }}
						{{ Form::text("txtCantPension[]",Input::old("txtCantPension[]") ? Input::old('txtCantPension[]'):null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
            @if($errors->has("txtCantPension[]"))
                @foreach($errors->get("txtCantPension[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>
		@foreach($arrRegPension as $regpension)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("selRegimenPension[]", "Regimen", array("class" => "control-label")) }}
								{{Form::select("selRegimenPension[]",$arrTipRegimen,Input::old("selRegimenPension[]") ? Input::old('selRegimenPension[]'):isset($regpension['id_regimen']) ? $regpension['id_regimen']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("selRegimenPension[]"))
										@foreach($errors->get("selRegimenPension[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("txtCantPension[]", 'Número de Personas (Pension)', array("class" => "control-label")) }}
								{{ Form::text("txtCantPension[]",Input::old("txtCantPension[]") ? Input::old('txtCantPension[]'):isset($regpension['numero']) ? $regpension['numero']:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
								@if($errors->has("txtCantPension[]"))
										@foreach($errors->get("txtCantPension[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
							<a href="{{route('seguridadSocialElim',array($regpension['id_mina'],$regpension['id_regimen'],$regpension['id_tipo_seguridad'],$regpension['id_tipo_mineria'],'PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
					 </div>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnRegRieLab" id="btnRegRieLab" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divRegRieLab">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenRiesgos[]", "Regimen", array("class" => "control-label")) }}
            {{Form::select("selRegimenRiesgos[]",$arrTipRegimen,Input::old("selRegimenRiesgos[]") ? Input::old("selRegimenSalud[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}
            @if($errors->has("selRegimenSalud"))
                @foreach($errors->get("selRegimenRiesgos[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantRiesgos[]", "Número de Personas (Riesgos Laborales)", array("class" => "control-label")) }}
						{{ Form::text("txtCantRiesgos[]",Input::old("txtCantRiesgos[]") ? Input::old("txtCantRiesgos[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}
            @if($errors->has("txtCantRiesgos[]"))
                @foreach($errors->get("txtCantRiesgos[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>
		@foreach($arrRegRiesgos as $regriesgos)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("selRegimenRiesgos[]", "Regimen", array("class" => "control-label")) }}
								{{Form::select("selRegimenRiesgos[]",$arrTipRegimen,Input::old("selRegimenRiesgos[]") ? Input::old('selRegimenRiesgos[]'):isset($regriesgos['id_regimen']) ? $regriesgos['id_regimen']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("selRegimenRiesgos[]"))
										@foreach($errors->get("selRegimenRiesgos[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("txtCantRiesgos[]", 'Número de Personas (Riesgos Laborales)', array("class" => "control-label")) }}
								{{ Form::text("txtCantRiesgos[]",Input::old("txtCantRiesgos[]") ? Input::old('txtCantRiesgos[]'):isset($regriesgos['numero']) ? $regriesgos['numero']:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
								@if($errors->has("txtCantRiesgos[]"))
										@foreach($errors->get("txtCantRiesgos[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
							<a href="{{route('seguridadSocialElim',array($regriesgos['id_mina'],$regriesgos['id_regimen'],$regriesgos['id_tipo_seguridad'],$regriesgos['id_tipo_mineria'],'PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnRegNinguno" id="btnRegNinguno" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divRegNinguno">
	    <div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenNinguno[]", "Regimen", array("class" => "control-label")) }}
            {{Form::select("selRegimenNinguno[]",$arrTipRegimen,Input::old("selRegimenNinguno[]") ? Input::old("selRegimenNinguno[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}
            @if($errors->has("selRegimenNinguno[]"))
                @foreach($errors->get("selRegimenNinguno[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantNinguno[]", "Número de Personas (Ninguno)", array("class" => "control-label")) }}
						{{ Form::text("txtCantNinguno[]",Input::old("txtCantNinguno[]") ? Input::old("txtCantNinguno[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}
            @if($errors->has("txtCantNinguno[]"))
                @foreach($errors->get("txtCantNinguno[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    	</div>
		</div>
		@foreach($arrRegNinguno as $regninguno)
				<div class="row">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("selRegimenNinguno[]", "Regimen", array("class" => "control-label")) }}
								{{Form::select("selRegimenNinguno[]",$arrTipRegimen,Input::old("selRegimenNinguno[]") ? Input::old('selRegimenNinguno[]'):isset($regninguno['id_regimen']) ? $regninguno['id_regimen']:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Profesionales','autocomplete'=>'off')) }}
								@if($errors->has("selRegimenNinguno[]"))
										@foreach($errors->get("selRegimenNinguno[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
						<div class="form-group form-group-sm col-xs-12 col-sm-3">
								{{ Form::label("txtCantNinguno[]", 'Número de Personas (Ninguno)', array("class" => "control-label")) }}
								{{ Form::text("txtCantNinguno[]",Input::old("txtCantNinguno[]") ? Input::old('txtCantNinguno[]'):isset($regninguno['numero']) ? $regninguno['numero']:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Personas','autocomplete'=>'off')) }}
								@if($errors->has("txtCantNinguno[]"))
										@foreach($errors->get("txtCantNinguno[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
							<a href="{{route('seguridadSocialElim',array($regninguno['id_mina'],$regninguno['id_regimen'],$regninguno['id_tipo_seguridad'],$regninguno['id_tipo_mineria'],'PestanaMineroController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

    <p class="bg-primary text-center" >Plano</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selTipoMina", "Tipo Mineria", array("class" => "control-label")) }}
            {{ Form::select("selTipoMina",$comTipoMineria,isset($plano->id_tipo_mineria) ? $plano->id_tipo_mineria : null,array("class"=>"form-control")) }}
            @if($errors->has("selTipoMina"))
                @foreach($errors->get("selTipoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
          {{ Form::label("selPlanos", "Cuenta con Planos", array("class" => "control-label")) }}
          {{ Form::select("selPlanos",$comSiNo,isset($plano->resultado) ? $plano->resultado : null,array("class"=>"form-control")) }}
            @if($errors->has("selPlanos"))
                @foreach($errors->get("selPlanos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selTipoPlano", "Tipo Plano", array("class" => "control-label")) }}
						{{ Form::select("selTipoPlano",$arrTipPlano,isset($plano->tipo_plano) ? $plano->tipo_plano : null,array("class"=>"form-control")) }}
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
    <p class="bg-primary text-center" >Método de Explotación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMetodoET", "Método de Explotación", array("class" => "control-label")) }}
            {{ Form::select("selMetodoET",$comMetExplotacion,isset($metodoexplotacion->id_topologia) ? $metodoexplotacion->id_topologia : null,array("class"=>"form-control")) }}
            @if($errors->has("selMetodoET"))
                @foreach($errors->get("selMetodoET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("selTaludes", "Condiciones de Taludes y Bermas", array("class" => "control-label")) }}
            {{ Form::select("selTaludes",$arrConTalues,isset($metodoexplotacion->cond_talude) ? $metodoexplotacion->cond_talude : null,array("class"=>"form-control")) }}
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
            {{ Form::select("selArranque",$comSisArranque,isset($metodoexplotacion->sis_arranque) ? $metodoexplotacion->sis_arranque : null,array("class"=>"form-control")) }}
            @if($errors->has("selArranque"))
                @foreach($errors->get("selArranque") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTransporte", "Sistema de Transporte", array("class" => "control-label")) }}
            {{ Form::select("selTransporte",$comSisTransporte,isset($metodoexplotacion->sis_transporte) ? $metodoexplotacion->sis_transporte : null,array("class"=>"form-control")) }}
            @if($errors->has("selTransporte"))
                @foreach($errors->get("selTransporte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selCargue", "Sistema de Cargue", array("class" => "control-label")) }}
            {{ Form::select("selCargue",$comSisCargue,isset($metodoexplotacion->sis_cargue) ? $metodoexplotacion->sis_cargue : null,array("class"=>"form-control")) }}
            @if($errors->has("selCargue"))
                @foreach($errors->get("selCargue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
     <div class="form-group form-group-sm col-xs-12 col-sm-9">
			{{ Form::label("txtObservacion", 'Observación', array("class" => "control-label")) }}
			{{ Form::textarea("txtObservacion",Input::old("txtObservacion") ? Input::old('txtObservacion'):isset($metodoexplotacion->obser_general) ? $metodoexplotacion->obser_general:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones General','autocomplete'=>'off')) }}
			@if($errors->has("txtObservacion"))
					@foreach($errors->get("txtObservacion") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
			@endif
     </div>
		</div>
    <p class="bg-primary text-center" >Infraestructura de Producción - Beneficio Y Transformación</p>
    <?php #echo count($arrInfra); ?>
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoInf", "Tipo de Infraestructura", array("class" => "control-label")) }}
            {{ Form::select("selTipoInf",$arrTipInfre,isset($arrInfra->id_tipologia) ? $arrInfra->id_tipologia : null ,array("class"=>"form-control")) }}
            @if($errors->has("selTipoInf"))
                @foreach($errors->get("selTipoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoInf", "Estado de Infraestructura", array("class" => "control-label")) }}
						{{ Form::select("selEstadoInf",$comBuReMa,isset($arrInfra->estado) ? $arrInfra->estado : null,array("class"=>"form-control")) }}
            @if($errors->has("selEstadoInf"))
                @foreach($errors->get("selEstadoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordNorte", 'Coordenada Norte', array("class" => "control-label")) }}
						{{ Form::text("txtCoordNorte",Input::old("txtCoordNorte") ? Input::old('txtCoordNorte'):isset($arrInfra->coordenada_norte) ? $arrInfra->coordenada_norte:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Coordenada Norte','autocomplete'=>'off')) }}
            @if($errors->has("txtCoordNorte"))
                @foreach($errors->get("txtCoordNorte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordEste", 'Coordenada Este', array("class" => "control-label")) }}
            {{ Form::text("txtCoordEste", Input::old("txtCoordEste") ? Input::old('txtCoordEste'):isset($arrInfra->coordenada_este) ? $arrInfra->coordenada_este:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Coordenada Este','autocomplete'=>'off')) }}
            @if($errors->has("txtCoordEste"))
                @foreach($errors->get("txtCoordEste") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidad", 'Capacidad', array("class" => "control-label")) }}
						{{ Form::text("txtCapacidad", Input::old("txtCapacidad") ? Input::old('txtCapacidad'):isset($arrInfra->capacidad) ? $arrInfra->capacidad:null,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Capacidad','autocomplete'=>'off')) }}
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
            {{Form::textarea("txtObsInf",Input::old("txtObsInf") ? Input::old("txtObsInf") : isset($arrInfra->observaciones_infraestructura) ? $arrInfra->observaciones_infraestructura : null,array("class"=>"form-control","placeholder"=>"Observaciones","autocomplete"=>"off")) }}
            @if($errors->has("txtObsInf"))
                @foreach($errors->get("txtObsInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Equipos y Maquinaria</p>
    <?php #var_dump($arrEquMaq); ?>
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoEquipo", "Tipo de Equipo", array("class" => "control-label")) }}
						{{ Form::select("selTipoEquipo",$arrTipInfre,isset($arrEquMaq->id_tipologia) ? $arrEquMaq->id_tipologia : null,array('class'=>'form-control')) }}
						@if($errors->has("selTipoEquipo"))
                @foreach($errors->get("selTipoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoEquipo", "Estado o Condici�n", array("class" => "control-label")) }}
            {{ Form::select("selEstadoEquipo",$arrEstEquMaq,Input::old("selEstadoEquipo") ? Input::old("selEstadoEquipo"):isset($arrEquMaq->estado) ? $arrEquMaq->estado:null,array('class'=>'form-control')) }}
            @if($errors->has("selEstadoEquipo"))
                @foreach($errors->get("selEstadoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidadEstado", 'Capacidad o Potencia', array("class" => "control-label")) }}
            {{Form::text("txtCapacidadEstado",Input::old("txtCapacidadEstado") ? Input::old("txtCapacidadEstado") : isset($arrEquMaq->capacidad_potencia) ? $arrEquMaq->capacidad_potencia : null,array("class"=>"form-control","placeholder"=>"Capacidad o Potencia","autocomplete"=>"off")) }}
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
            {{ Form::select("selTipoComb",$arrTipCombustible,Input::old("selTipoComb") ? Input::old("selTipoComb"):isset($arrEquMaq->tipo_combustible) ? $arrEquMaq->tipo_combustible:null,array('class'=>'form-control')) }}
            @if($errors->has("selTipoComb"))
                @foreach($errors->get("selTipoComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCantidadComb", 'Cantidad de Combustible', array("class" => "control-label")) }}
						{{Form::text("txtCantidadComb",Input::old("txtCantidadComb") ? Input::old("txtCantidadComb") : isset($arrEquMaq->capacidad_potencia) ? $arrEquMaq->capacidad_potencia : null,array("class"=>"form-control","placeholder"=>"Cantidad de Combustible","autocomplete"=>"off")) }}
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
            {{Form::textarea("txtObsEquipo",Input::old("txtObsEquipo") ? Input::old("txtObsEquipo") : isset($arrEquMaq->observaciones_equipo) ? $arrEquMaq->observaciones_equipo : null,array("class"=>"form-control","placeholder"=>"Observaciones","autocomplete"=>"off")) }}
            @if($errors->has("txtObsEquipo"))
                @foreach($errors->get("txtObsEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Condiciones de Ventilación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMonGas", "Monitor de Gas", array("class" => "control-label")) }}
            {{ Form::select("selMonGas",$comSiNo,isset($detalle->monitor_gases) ? $detalle->monitor_gases : null,array("class"=>"form-control")) }}
            @if($errors->has("selMonGas"))
                @foreach($errors->get("selMonGas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTablero", "Tableros de Medición", array("class" => "control-label")) }}
            {{ Form::select("selTablero",$comSiNo,isset($detalle->tableros_medicion) ? $detalle->tableros_medicion : null,array("class"=>"form-control")) }}
            @if($errors->has("selTablero"))
                @foreach($errors->get("selTablero") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtFrenVenti", 'Frente Bajo Tierra', array("class" => "control-label")) }}
            {{ Form::select("txtFrenVenti",$comSiNo,isset($detalle->frente_bajo_tierra) ? $detalle->frente_bajo_tierra : null,array("class"=>"form-control")) }}
            @if($errors->has("txtFrenVenti"))
                @foreach($errors->get("txtFrenVenti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" >Instalaciones Eléctricas</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selEnergia", "Energía Eléctrica", array("class" => "control-label")) }}
            {{ Form::select("selEnergia",$comSiNo,isset($detalle->energia_electrica) ? $detalle->energia_electrica : null,array('class'=>'form-control')) }}
            @if($errors->has("selEnergia"))
                @foreach($errors->get("selEnergia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoFuente", "Tipo de Fuente de Energia", array("class" => "control-label")) }}
            {{ Form::select("selTipoFuente",$comTipFuenteEneria,isset($detalle->tipo_fuente_energia) ? $detalle->tipo_fuente_energia : null,array('class'=>'form-control')) }}
            @if($errors->has("selTipoFuente"))
                @foreach($errors->get("selTipoFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDisparador", "Disparadores de Seguridad", array("class" => "control-label")) }}
            {{ Form::select("selDisparador",$comSiNo,isset($detalle->disparadores_seguridad) ? $detalle->disparadores_seguridad : null,array('class'=>'form-control')) }}
            @if($errors->has("selDisparador"))
                @foreach($errors->get("selDisparador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selInstalaElec", "Instalaciones Eléctricas", array("class" => "control-label")) }}
            {{ Form::select("selInstalaElec",$comSiNo,isset($detalle->instalacion_electrica) ? $detalle->instalacion_electrica : null,array('class'=>'form-control')) }}
            @if($errors->has("selInstalaElec"))
                @foreach($errors->get("selInstalaElec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtTensionUti", 'Tensión Utilizada', array("class" => "control-label")) }}
            {{ Form::text("txtTensionUti",Input::old("txtTensionUti") ? Input::old('txtTensionUti'):isset($detalle->tension_utilizada) ? $detalle->tension_utilizada:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Valor en Voltios','autocomplete'=>'off')) }}
            @if($errors->has("txtTensionUti"))
                @foreach($errors->get("txtTensionUti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center" > Aspecto Económico </p>
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
            {{ Form::select("selDestinoEco",$comDesCosVenBocamina,isset($detalle->id_destino) ? $detalle->id_destino : null,array('class'=>'form-control')) }}
            @if($errors->has("selDestinoEco"))
                @foreach($errors->get("selDestinoEco") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-6">
				{{ Form::label("txtObser", 'Observaciones', array("class" => "control-label")) }}
				{{ Form::textarea("txtObser",Input::old("txtObser") ? Input::old('txtObser'):isset($detalle->obser_econo) ? $detalle->obser_econo:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
				@if($errors->has("txtObser"))
					@foreach($errors->get("txtObser") as $error)
						<span class="help-block alert alert-danger">  * {{ $error }} </span>
					@endforeach
				@endif
     	</div>
		</div>
		<p class="bg-primary text-center" > Explosivos </p>
    <div class="row">
			<div class="form-group form-group-sm col-xs-12 col-sm-4">
					{{ Form::label("selExplosivo", "Explosivos", array("class" => "control-label")) }}
					{{ Form::select("selExplosivo",$comSiNo,isset($detalle->explosivo) ? $detalle->explosivo:null,array('class'=>'form-control')) }}
					@if($errors->has("selExplosivo"))
							@foreach($errors->get("selExplosivo") as $error)
								<span class="help-block alert alert-danger">  * {{ $error }} </span>
							@endforeach
					@endif
			</div>
			<div class="form-group form-group-sm col-xs-12 col-sm-3">
					{{ Form::label("selPermisoExplosivo", "Cuenta con permiso",array("class"=>"control-label")) }}
					{{ Form::select("selPermisoExplosivo",$comSiNo,isset($detalle->permiso_explosivo) ? $detalle->permiso_explosivo:null,array('class'=>'form-control')) }}
					@if($errors->has("selPermisoExplosivo"))
							@foreach($errors->get("selPermisoExplosivo") as $error)
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
		var contenedor1      = $("#divResExpPer"); //ID del contenedor
		var AddButton       = $("#btnResExpPer"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divResExpPer div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnResExpPer").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{ Form::label("txtProfPer[]","Número de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfPer[]",Input::old("txtEmpPer[]") ? Input::old("txtProfPer[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfPer[]"))'+
                			'@foreach($errors->get("txtProfPer[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{ Form::label("txtEmpPer[]","Número de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpPer[]",Input::old("txtEmpPer[]") ? Input::old("txtEmpPer[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Empleados","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtEmpPer"))'+
                			'@foreach($errors->get("txtEmpPer[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            				'{{ Form::label("selConPer[]", "Tipo de Contrato", array("class" => "control-label")) }}'+
            				'{{Form::select("selConPer[]",$comTipoContrato,isset($yi) ? $yi:null,array("class"=>"form-control")) }}'+
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

		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divResExpTem"); //ID del contenedor
		var AddButton       = $("#btnResExpTem"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divResExpTem div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnResExpTem").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{ Form::label("txtProfTem[]","Número de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfTem[]",Input::old("txtProfTem[]") ? Input::old("txtProfTem[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfTem[]"))'+
                			'@foreach($errors->get("txtProfTem[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{ Form::label("txtEmpTem[]","Número de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpTem[]",Input::old("txtEmpTem[]") ? Input::old("txtEmpTem[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Empleados","autocomplete"=>"off")) }}'+
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

		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor3      = $("#divOpePer"); //ID del contenedor
		var AddButton       = $("#btnOpePer"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divOpePer div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnOpePer").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{Form::label("txtProfPerOpe[]","Número de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfPerOpe[]",Input::old("txtProfPerOpe[]") ? Input::old("txtProfPerOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfPerOpe[]"))'+
                			'@foreach($errors->get("txtProfPerOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{Form::label("txtEmpPerOpe[]","Número de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpPerOpe[]",Input::old("txtEmpTem[]") ? Input::old("txtEmpPerOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Empleados","autocomplete"=>"off")) }}'+
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

		
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor4      = $("#divOpeTem"); //ID del contenedor
		var AddButton       = $("#btnOpeTem"); //ID del Botón Agregar
		var x = $("#divOpeTem div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnOpeTem").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
            				'{{Form::label("txtProfTemOpe[]","Número de Profesionales", array("class" => "control-label")) }}'+
            				'{{ Form::text("txtProfTemOpe[]",Input::old("txtProfTemOpe[]") ? Input::old("txtProfTemOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Profesionales","autocomplete"=>"off")) }}'+
            				'@if($errors->has("txtProfTemOpe[]"))'+
                			'@foreach($errors->get("txtProfTemOpe[]") as $error)'+
                  			'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                			'@endforeach'+
            				'@endif'+
        					'</div>'+
        					'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
										'{{Form::label("txtEmpTemOpe[]","Número de Empleados", array("class" => "control-label")) }}'+
										'{{ Form::text("txtEmpTemOpe[]",Input::old("txtEmpTemOpe[]") ? Input::old("txtEmpTemOpe[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Número de Empleados","autocomplete"=>"off")) }}'+
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
        return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor5     = $("#divUbiGeo"); //ID del contenedor
		var AddButton       = $("#btnUbiGeo"); //ID del Botón Agregar
		var x = $("#divUbiGeo div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnUbiGeo").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{ Form::label("selFrente[]", "Frente o Bocamina", array("class" => "control-label")) }}'+
							'{{ Form::select("selFrente[]",$comFrenteBocamina) }}'+
							'@if($errors->has("selFrente[]"))'+
									'@foreach($errors->get("selFrente") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{ Form::label("txtNorte[]", "Norte (X)", array("class" => "control-label")) }}'+
							'{{ Form::text("txtNorte[]",Input::old("txtNorte[]") ? Input::old("txtNorte[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Norte (X)","autocomplete"=>"off")) }}'+
							'@if($errors->has("txtNorte[]"))'+
									'@foreach($errors->get("txtNorte[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{ Form::label("txtEste[]", "Este (Y)", array("class" => "control-label")) }}'+
							'{{ Form::text("txtEste[]",Input::old("txtEste[]") ? Input::old("txtEste[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Este (Y)","autocomplete"=>"off")) }}'+
							'@if($errors->has("txtEste[]"))'+
									'@foreach($errors->get("txtEste[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{ Form::label("txtAltura[]", "Altura (msnm)", array("class" => "control-label")) }}'+
							'{{ Form::text("txtAltura[]",Input::old("txtAltura[]") ? Input::old("txtAltura[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Altura (msnm)","autocomplete"=>"off")) }}'+
							'@if($errors->has("txtAltura[]"))'+
									'@foreach($errors->get("txtAltura[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-1">'+
							'{{ Form::label("selEstadoFrente[]", "Estado", array("class" => "control-label")) }}'+
							'{{ Form::select("selEstadoFrente[]",$arrTipEstado) }}'+
							'@if($errors->has("selEstadoFrente[]"))'+
									'@foreach($errors->get("selEstadoFrente[]") as $error)'+
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
		var contenedor6     = $("#divProOtrMin"); //ID del contenedor
		var AddButton       = $("#btnProOtrMin"); //ID del Botón Agregar
		var x = $("#divProOtrMin div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnProOtrMin").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{ Form::label("selMineralProdOtro[]", "Mineral", array("class" => "control-label")) }}'+
            '{{ Form::select("selMineralProdOtro[]",$comMineral,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array("class"=>"form-control")) }}'+
            '@if($errors->has("selMineralProdOtro[]"))'+
                '@foreach($errors->get("selMineralProdOtro[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{ Form::label("selUnidadProdOtro[]", "Unidad", array("class" => "control-label")) }}'+
            '{{ Form::select("selUnidadProdOtro[]",$comUnidad,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array("class"=>"form-control")) }}'+
            '@if($errors->has("selUnidadProdOtro[]"))'+
                '@foreach($errors->get("selUnidadProdOtro[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{ Form::label("txtCantidadOtro[]", "Cantidad", array("class" => "control-label")) }}'+
            '{{ Form::text("txtCantidadOtro[]", Input::old("txtCantidadOtro"),array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}'+
            '@if($errors->has("txtCantidadOtro[]"))'+
                '@foreach($errors->get("txtCantidadOtro[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{ Form::label("selAgnoProdOtro[]", "Año", array("class" => "control-label")) }}'+
            '{{ Form::select("selAgnoProdOtro[]",$arrAgno,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array("class"=>"form-control")) }}'+
            '@if($errors->has("selAgnoProdOtro[]"))'+
                '@foreach($errors->get("selAgnoProdOtro[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{ Form::label("selMesProdOtro[]", "Mes", array("class" => "control-label")) }}'+
            '{{ Form::select("selMesProdOtro[]",$arrMes,isset($selMineralProdOtro) ? $selMineralProdOtro:null,array("class"=>"form-control")) }}'+
            '@if($errors->has("selMesProdOtro[]"))'+
                '@foreach($errors->get("selMesProdOtro[]") as $error)'+
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
		var contenedor7     = $("#divRegSal"); //ID del contenedor
		var AddButton       = $("#btnRegSal"); //ID del Botón Agregar
		var x = $("#divRegSal div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnRegSal").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("selRegimenSalud[]", "Regimen", array("class" => "control-label")) }}'+
            '{{Form::select("selRegimenSalud[]",$arrTipRegimen,Input::old("selRegimenSalud[]") ? Input::old("selRegimenSalud[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}'+
            '@if($errors->has("selRegimenSalud[]"))'+
                '@foreach($errors->get("selRegimenSalud") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("txtCantSalud[]", "Número de Personas (Salud)", array("class" => "control-label")) }}'+
						'{{ Form::text("txtCantSalud[]",Input::old("txtCantSalud[]") ? Input::old("txtCantSalud[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}'+
            '@if($errors->has("txtCantSalud[]"))'+
                '@foreach($errors->get("txtCantSalud[]") as $error)'+
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
		var contenedor8     = $("#divRegPen"); //ID del contenedor
		var AddButton       = $("#btnRegPen"); //ID del Botón Agregar
		var x = $("#divRegPen div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnRegPen").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("selRegimenPension[]", "Regimen", array("class" => "control-label")) }}'+
            '{{Form::select("selRegimenPension[]",$arrTipRegimen,Input::old("selRegimenPension[]") ? Input::old("selRegimenPension[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}'+
            '@if($errors->has("selRegimenPension[]"))'+
                '@foreach($errors->get("selRegimenPension[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("txtCantPension[]", "Número de Personas (Pension)", array("class" => "control-label")) }}'+
						'{{ Form::text("txtCantPension[]",Input::old("txtCantPension[]") ? Input::old("txtCantPension[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}'+
            '@if($errors->has("txtCantPension[]"))'+
                '@foreach($errors->get("txtCantPension[]") as $error)'+
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


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor9     = $("#divRegRieLab"); //ID del contenedor
		var AddButton       = $("#btnRegRieLab"); //ID del Botón Agregar
		var x = $("#divRegRieLab div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnRegRieLab").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("selRegimenRiesgos[]", "Regimen", array("class" => "control-label")) }}'+
            '{{Form::select("selRegimenRiesgos[]",$arrTipRegimen,Input::old("selRegimenRiesgos[]") ? Input::old("selRegimenSalud[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}'+
            '@if($errors->has("selRegimenSalud[]"))'+
                '@foreach($errors->get("selRegimenRiesgos[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("txtCantRiesgos[]", "Número de Personas (Riesgos Laborales)", array("class" => "control-label")) }}'+
						'{{ Form::text("txtCantRiesgos[]",Input::old("txtCantRiesgos[]") ? Input::old("txtCantRiesgos[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}'+
            '@if($errors->has("txtCantRiesgos[]"))'+
                '@foreach($errors->get("txtCantRiesgos[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
					
			'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor9).append(temporal);
			x++; //text box increment
        return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor10     = $("#divRegNinguno"); //ID del contenedor
		var AddButton       = $("#btnRegNinguno"); //ID del Botón Agregar
		var x = $("#divRegNinguno div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnRegNinguno").click(function () { 
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									 '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("selRegimenNinguno[]", "Regimen", array("class" => "control-label")) }}'+
            '{{Form::select("selRegimenNinguno[]",$arrTipRegimen,Input::old("selRegimenNinguno[]") ? Input::old("selRegimenNinguno[]"):null ,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Profesionales","autocomplete"=>"off")) }}'+
            '@if($errors->has("selRegimenNinguno[]"))'+
                '@foreach($errors->get("selRegimenNinguno[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{ Form::label("txtCantNinguno[]", "Número de Personas (Ninguno)", array("class" => "control-label")) }}'+
						'{{ Form::text("txtCantNinguno[]",Input::old("txtCantNinguno[]") ? Input::old("txtCantNinguno[]"):null,array("class"=>"form-control col-xs-12 col-sm-3","placeholder"=>"Personas","autocomplete"=>"off")) }}'+
            '@if($errors->has("txtCantNinguno[]"))'+
                '@foreach($errors->get("txtCantNinguno[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
					
			'</div>'+

								  	'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
								'</div>';
			$(contenedor10).append(temporal);
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
