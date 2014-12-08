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
    @foreach ($morfometria as $morfometria)
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
    <p class="bg-primary text-center">MorfologÃ­a de Talud</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMorfologia", "Morfología", array("class" => "control-label"))}}
            {{ Form::select("SelMorfologia",$arrTipMor,isset($ambiental->tipo_morfologia) ? $ambiental->tipo_morfologia : null) }}
            @if($errors->has("SelMorfologia"))
                @foreach($errors->get("SelMorfologia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelPendiente", "Pendiente", array("class" => "control-label"))}}
            {{ Form::select("SelPendiente",$arrPenMor,isset($ambiental->pend_morfologia) ? $ambiental->pend_morfologia : null) }}
            @if($errors->has("SelPendiente"))
                @foreach($errors->get("SelPendiente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelCategoria", "Categoria", array("class" => "control-label"))}}
            {{ Form::select("SelCategoria",$arrCatMor,isset($ambiental->cat_morfologia) ? $ambiental->cat_morfologia : null) }}
            @if($errors->has("SelCategoria"))
                @foreach($errors->get("SelCategoria") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsMorfo", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsMorfo", Input::old('txtObsMorfo') ? Input::old('txtObsMorfo'):isset($ambiental->observacion_morfo) ? $ambiental->observacion_morfo:null,
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsMorfo"))
                @foreach($errors->get("txtObsMorfo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Geología</p>
    <p class="bg-primary text-center">Roca</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRoca", "Roca", array("class" => "control-label"))}}
            {{ Form::select("SelRoca",$comRoca,isset($ambiental->roca) ? $ambiental->roca : null) }}
            @if($errors->has("SelRoca"))
                @foreach($errors->get("SelRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEst", "Estructura", array("class" => "control-label"))}}
            {{ Form::select("SelEst",$comEstructura,isset($ambiental->estructura) ? $ambiental->estructura : null) }}
            @if($errors->has("SelEst"))
                @foreach($errors->get("SelEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtLitologia", 'Litologia', array("class" => "control-label")) }}
            {{ Form::text("txtLitologia",Input::old('txtLitologia') ? Input::old('txtLitologia'):isset($ambiental->litologia) ? $ambiental->litologia:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Litologia','autocomplete'=>'off')) }}
            @if($errors->has("txtLitologia"))
                @foreach($errors->get("txtLitologia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelFracturacion", "FracturaciÃ³n", array("class" => "control-label"))}}
            {{ Form::select("SelFracturacion",$comFracturacion,isset($ambiental->fracturacion) ? $ambiental->fracturacion : null) }}
            @if($errors->has("SelFracturacion"))
                @foreach($errors->get("SelFracturacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMeteorizacion", "MeteorizaciÃ³n", array("class" => "control-label"))}}
            {{ Form::select("SelMeteorizacion",$comMeteorizacion,isset($ambiental->meteorizacion) ? $ambiental->meteorizacion : null) }}
            @if($errors->has("SelMeteorizacion"))
                @foreach($errors->get("SelMeteorizacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtGsi", 'GSI', array("class" => "control-label")) }}
            {{ Form::text("txtGsi",Input::old('txtGsi') ? Input::old('txtGsi'):isset($ambiental->gsi) ? $ambiental->gsi:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'GSI','autocomplete'=>'off')) }}
            @if($errors->has("txtGsi"))
                @foreach($errors->get("txtGsi") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Suelo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelColuvion", "Coluvión", array("class" => "control-label"))}}
            {{ Form::select("SelColuvion",$comColuvion,isset($ambiental->coluvion) ? $ambiental->coluvion : null) }}
            @if($errors->has("SelColuvion"))
                @foreach($errors->get("SelColuvion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelAluvial", "Aluvial", array("class" => "control-label"))}}
            {{ Form::select("SelAluvial",$comAluvial,isset($ambiental->aluvial) ? $ambiental->aluvial : null) }}
            @if($errors->has("SelAluvial"))
                @foreach($errors->get("SelAluvial") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRelleno", "Relleno", array("class" => "control-label"))}}
            {{ Form::select("SelRelleno",$comRelleno,isset($ambiental->relleno) ? $ambiental->relleno : null) }}
            @if($errors->has("SelRelleno"))
                @foreach($errors->get("SelRelleno") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsSuelo", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsSuelo", Input::old("txtObsSuelo"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsSuelo"))
                @foreach($errors->get("txtObsSuelo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="form-group bg-primary">Fenómenos de Remoción en Masa</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelErosion", "Erosión", array("class" => "control-label"))}}
            {{Form::select("SelErosion",$comErocion,isset($ambiental->erosion) ? $ambiental->erosion : null) }}
            @if($errors->has("SelErosion"))
                @foreach($errors->get("SelErosion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovRoca", "Mov Roca", array("class" => "control-label"))}}
            {{Form::select("SelMovRoca",$comMovRoca,isset($ambiental->mov_roca) ? $ambiental->mov_roca : null) }}
            @if($errors->has("SelMovRoca"))
                @foreach($errors->get("SelMovRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovSuelo", "Mov Suelo", array("class" => "control-label"))}}
            {{Form::select("SelMovSuelo",$comMovSuelo,isset($ambiental->mov_suelo) ? $ambiental->mov_suelo : null) }}
            @if($errors->has("SelMovSuelo"))
                @foreach($errors->get("SelMovSuelo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEstilo", "Estilo", array("class" => "control-label"))}}
            {{Form::select("SelEstilo",$comEstilo,isset($ambiental->estilo) ? $ambiental->estilo : null) }}
            @if($errors->has("SelEstilo"))
                @foreach($errors->get("SelEstilo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelActividad", "Actividad", array("class" => "control-label"))}}
            {{Form::select("SelActividad",$comActividad,isset($ambiental->actividad) ? $ambiental->actividad : null) }}
            @if($errors->has("SelActividad"))
                @foreach($errors->get("SelActividad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRepet", "Secuencia de Repetición", array("class" => "control-label"))}}
            {{Form::select("SelRepet",$comSecRep,isset($ambiental->secuencia_repeticion) ? $ambiental->secuencia_repeticion : null) }}
            @if($errors->has("SelRepet"))
                @foreach($errors->get("SelRepet") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-success">Morfometría</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtAnchoM", 'Ancho', array("class" => "control-label")) }}
            {{ Form::text("txtAnchoM",Input::old('txtAnchoM') ? Input::old('txtAnchoM'):isset($morfometria->ancho) ? $morfometria->ancho:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Ancho','autocomplete'=>'off')) }}
            @if($errors->has("txtAnchoM"))
                @foreach($errors->get("txtAnchoM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtLongitudM", 'Longitud', array("class" => "control-label")) }}
            {{ Form::text("txtLongitudM",Input::old('txtLongitudM') ? Input::old('txtLongitudM'):isset($morfometria->longitud) ? $morfometria->longitud:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Longitud','autocomplete'=>'off')) }}
            @if($errors->has("txtLongitudM"))
                @foreach($errors->get("txtLongitudM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfundidadM", 'Profundidad', array("class" => "control-label")) }}
            {{ Form::text("txtProfundidadM",Input::old('txtProfundidadM') ? Input::old('txtProfundidadM'):isset($morfometria->profundidad) ? $morfometria->profundidad:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Produndidad','autocomplete'=>'off')) }}
            @if($errors->has("txtProfundidadM"))
                @foreach($errors->get("txtProfundidadM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionM", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionM",Input::old('txtObservacionM') ? Input::old('txtObservacionM'):isset($morfometria->observaciones_morfo) ? $morfometria->observaciones_morfo:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observacion','autocomplete'=>'off')) }}
            @if($errors->has("txtObservacionM"))
                @foreach($errors->get("txtObservacionM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtDescCausaM", 'Descripción de Causas', array("class" => "control-label")) }}
            {{ Form::text("txtDescCausaM",Input::old('txtDescCausaM') ? Input::old('txtDescCausaM'):isset($ambiental->causa) ? $ambiental->causa:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
            @if($errors->has("txtDescCausaM"))
                @foreach($errors->get("txtDescCausaM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtInterM", 'intercalada de arcillolitas y areniscas', array("class" => "control-label")) }}
            {{ Form::text("txtInterM",Input::old('txtInterM') ? Input::old('txtInterM'):isset($ambiental->intercalada_arcillolitas_arenisca) ? $ambiental->intercalada_arcillolitas_arenisca:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
            @if($errors->has("txtInterM"))
                @foreach($errors->get("txtInterM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Condiciones de Agua</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnConAgua" id="btnConAgua" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divConAgua">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelCondA[]", "Condiciones de Agua", array("class" => "control-label"))}}
            {{Form::select("SelCondA[]",$comCondiAgua,isset($ambiental->secuencia_repeticion) ? $ambiental->secuencia_repeticion : null) }}
            @if($errors->has("SelCondA[]"))
                @foreach($errors->get("SelCondA[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
       </div>
		</div>
		@foreach($arrConAgua as $conagua)
				<div class="row" id="divConAgua">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("SelCondA[]", "Condiciones de Agua", array("class" => "control-label"))}}
								{{Form::select("SelCondA[]",$comCondiAgua,isset($conagua['id_topologia']) ? $conagua['id_topologia'] : null) }}
								@if($errors->has("SelCondA[]"))
										@foreach($errors->get("SelCondA[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
								<a href="{{route('seleccionMultipleElim', array($conagua['id_mina'],$conagua['id_topologia'],'Condicion Agua','PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
						</div>
					 </div>
				</div>
		@endforeach
    <p class="bg-success text-center">Estado de las Obras</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelAlcant", "Alcantarilla", array("class" => "control-label"))}}
            {{Form::select("SelAlcant",$arrEstadoObra,isset($ambiental->estado_alcantarilla) ? $ambiental->estado_alcantarilla : null) }}
            @if($errors->has("SelAlcant"))
                @foreach($errors->get("SelAlcant") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCuneta", "Cuneta", array("class" => "control-label"))}}
            {{Form::select("SelCuneta",$arrEstadoObra,isset($ambiental->estado_cuneta) ? $ambiental->estado_cuneta : null) }}
            @if($errors->has("SelCuneta"))
                @foreach($errors->get("SelCuneta") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCanales", "Canales", array("class" => "control-label"))}}
            {{Form::select("SelCanales",$arrEstadoObra,isset($ambiental->estado_canales) ? $ambiental->estado_canales : null) }}
            @if($errors->has("SelCanales"))
                @foreach($errors->get("SelCanales") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDrenes", "Drenes", array("class" => "control-label"))}}
            {{Form::select("SelDrenes",$arrEstadoObra,isset($ambiental->estado_drenes) ? $ambiental->estado_drenes : null) }}
            @if($errors->has("SelDrenes"))
                @foreach($errors->get("SelDrenes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelEncole", "Encole", array("class" => "control-label"))}}
            {{Form::select("SelEncole",$arrEstadoObra,isset($ambiental->estado_encole) ? $ambiental->estado_encole : null) }}
            @if($errors->has("SelEncole"))
                @foreach($errors->get("SelEncole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDescole", "Descole", array("class" => "control-label"))}}
            {{Form::select("SelDescole",$arrEstadoObra,isset($ambiental->estado_descole) ? $ambiental->estado_descole : null) }}
            @if($errors->has("SelDescole"))
                @foreach($errors->get("SelDescole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelOtrosAgua", "Otros", array("class" => "control-label"))}}
            {{Form::select("SelOtrosAgua",$arrEstadoObra,isset($ambiental->estado_otros) ? $ambiental->estado_otros : null) }}
            @if($errors->has("SelOtrosAgua"))
                @foreach($errors->get("SelOtrosAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelHum", "Hum. Suelo", array("class" => "control-label"))}}
            {{Form::select("SelHum",$arrHumSuelo,isset($ambiental->hum_suelo) ? $ambiental->hum_suelo : null) }}
            @if($errors->has("SelHum"))
                @foreach($errors->get("SelHum") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Vegetación</p>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnVegetacion" id="btnVegetacion" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divVegetacion">
			<div class="row container">
					<div class="form-group form-group-sm col-xs-12 col-sm-4">
							{{Form::label("SelVege[]", "VegetaciÃ³n", array("class" => "control-label"))}}
							{{Form::select("SelVege[]",$arrVegetacion) }}
							@if($errors->has("SelVege"))
									@foreach($errors->get("SelVege") as $error)
										<span class="help-block alert alert-danger">  * {{ $error }} </span>
									@endforeach
							@endif
					</div>
			</div>
		</div>
		@foreach($arrSelMulVege as $selmulvege)
				<div class="row" id="divVegetacion">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("SelVege[]","VegetaciÃ³n",array("class" => "control-label"))}}
								{{Form::select("SelVege[]",$arrVegetacion,isset($selmulvege['id_topologia']) ? $selmulvege['id_topologia'] : null) }}
								@if($errors->has("SelVege[]"))
										@foreach($errors->get("SelVege[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
								<a href="{{route('seleccionMultipleElim', array($selmulvege['id_mina'],$selmulvege['id_topologia'],'Vegetacion','PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
						</div>
					 </div>
				</div>
		@endforeach

		<div class="row">
		    <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelIncli", "Inclinación", array("class" => "control-label"))}}
            {{Form::select("SelIncli",$arrSiNo,isset($ambiental->inclinacion) ? $ambiental->inclinacion : null) }}
            @if($errors->has("SelIncli"))
                @foreach($errors->get("SelIncli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
		
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnAfectacion" id="btnAfectacion" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divAfectacion">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelAfectC[]", "Afectación Cobertura Vegetal", array("class" => "control-label"))}}
            {{Form::select("SelAfectC[]",$arrAfecCobVeg) }}
            @if($errors->has("SelAfectC"))
                @foreach($errors->get("SelAfectC") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
    </div>
		@foreach($arrSelMulAfec as $selmulafec)
				<div class="row" id="divAfectacion">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("SelAfectC[]","AfectaciÃ³n Cobertura Vegetal",array("class" => "control-label"))}}
								{{Form::select("SelAfectC[]",$arrAfecCobVeg,isset($selmulafec['id_topologia']) ? $selmulafec['id_topologia'] : null) }}
								@if($errors->has("SelAfectC[]"))
										@foreach($errors->get("SelAfectC[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('seleccionMultipleElim', array($selmulafec['id_mina'],$selmulafec['id_topologia'],'Afectacion Cobertura Vegetal','PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach
    
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionV",'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionV",Input::old('txtObservacionV') ? Input::old('txtObservacionV'):isset($ambiental->observacion_afectacion) ? $ambiental->observacion_afectacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
            @if($errors->has("txtObservacionV"))
                @foreach($errors->get("txtObservacionV") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Obras de Estabilización o Protección para los fenómenos de remoción en masa</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroGav", "Muro gaviones", array("class" => "control-label"))}}
            {{Form::select("SelMuroGav",$arrEstadoObra,isset($ambiental->muro_gaviones) ? $ambiental->muro_gaviones : null) }}
            @if($errors->has("SelMuroGav"))
                @foreach($errors->get("SelMuroGav") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroCon", "Muro concreto", array("class" => "control-label"))}}
            {{Form::select("SelMuroCon",$arrEstadoObra,isset($ambiental->muro_concreto) ? $ambiental->muro_concreto : null) }}
            @if($errors->has("SelMuroCon"))
                @foreach($errors->get("SelMuroCon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroOtr", "Otro", array("class" => "control-label"))}}
            {{Form::select("SelMuroOtr",$arrEstadoObra,isset($ambiental->muro_otro) ? $ambiental->muro_otro : null) }}
            @if($errors->has("SelMuroOtr"))
                @foreach($errors->get("SelMuroOtr") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionCon", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionCon",Input::old('txtObservacionCon') ? Input::old('txtObservacionCon'):isset($ambiental->observacion_obras_estabilizacion) ? $ambiental->observacion_obras_estabilizacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObservacionCon"))
                @foreach($errors->get("txtObservacionCon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtRecomendacionCon", 'Recomedaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtRecomendacionCon",Input::old('txtRecomendacionCon') ? Input::old('txtRecomendacionCon'):isset($ambiental->recomendaciones_obras_estabilizacion) ? $ambiental->recomendaciones_obras_estabilizacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Recomedaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtRecomendacionCon"))
                @foreach($errors->get("txtRecomendacionCon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Otros Aspectos</p>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnActiAntr" id="btnActiAntr" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
		<div class="row" id="divActiAntr">
			<div class="row container">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelActAnt[]", "Actividad Antrópica", array("class" => "control-label"))}}
            {{Form::select("SelActAnt[]",$arrActvAntro) }}
            @if($errors->has("SelActAnt[]"))
                @foreach($errors->get("SelActAnt[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
			</div>
		</div>
		@foreach($arrSelActAntro as $selactantro)
				<div class="row" id="divAfectacion">
					<div class="row container">
						<div class="form-group form-group-sm col-xs-12 col-sm-4">
								{{Form::label("SelActAnt[]","Actividad Antropica",array("class" => "control-label"))}}
								{{Form::select("SelActAnt[]",$arrActvAntro,isset($selactantro['id_topologia']) ? $selactantro['id_topologia'] : null) }}
								@if($errors->has("SelActAnt[]"))
										@foreach($errors->get("SelActAnt[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
								<a href="{{route('seleccionMultipleElim', array($selactantro['id_mina'],$selactantro['id_topologia'],'Actividad Antropica','PestanaAmbientalController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
						</div>
					 </div>
				</div>
		@endforeach

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelEstViv", "Estado de las Viviendas", array("class" => "control-label"))}}
            {{Form::select("SelEstViv",$arrEstadoObra,isset($ambiental->estado_vivienda) ? $ambiental->estado_vivienda : null) }}
            @if($errors->has("SelEstViv"))
                @foreach($errors->get("SelEstViv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionOtroA", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionOtroA",Input::old('txtObservacionOtroA') ? Input::old('txtObservacionOtroA'):isset($ambiental->observacion_otros_apectos) ? $ambiental->observacion_otros_apectos:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObservacionOtroA"))
                @foreach($errors->get("txtObservacionOtroA") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">DescripciÃ³n general</p>
    <div class="row">
          <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtDescG", 'Descripción general', array("class" => "control-label")) }}
            {{ Form::textarea("txtDescG",Input::old('txtDescG') ? Input::old('txtDescG'):isset($ambiental->descripcion_general) ? $ambiental->descripcion_general:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'DescripciÃ³n General','autocomplete'=>'off')) }}
            @if($errors->has("txtDescG"))
                @foreach($errors->get("txtDescG") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div> 
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelTipPro", "Tipo de Proceso", array("class" => "control-label"))}}
            {{Form::select("SelTipPro",$arrTipoProceso,isset($ambiental->tipo_proceso) ? $ambiental->tipo_proceso : null) }}
            @if($errors->has("SelTipPro"))
                @foreach($errors->get("SelTipPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtElev", 'Elevación', array("class" => "control-label")) }}
            {{ Form::text("txtElev",Input::old('txtElev') ? Input::old('txtElev'):isset($ambiental->elevacion) ? $ambiental->elevacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Elevacion','autocomplete'=>'off')) }}
            @if($errors->has("txtElev"))
                @foreach($errors->get("txtElev") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Fotos</p>
    <div class="row">
        
    </div>
    <p class="bg-primary text-center">Esquema</p>
    <div class="row">
        
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
    {{ Form::hidden("hidMina",$mina->id_mina) }}
    {{ Form::close() }}
</div>
@stop

@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
<script>
		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor      = $("#divConAgua"); //ID del contenedor
		var AddButton       = $("#btnConAgua"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divConAgua div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnConAgua").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
											'{{Form::label("SelCondA[]", "Condiciones de Agua", array("class" => "control-label"))}}'+
											'{{Form::select("SelCondA[]",$comCondiAgua,isset($ambiental->secuencia_repeticion) ? $ambiental->secuencia_repeticion : null) }}'+
											'@if($errors->has("SelCondA[]"))'+
													'@foreach($errors->get("SelCondA[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
											'@endif'+
									'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										
								'</div>';
			$(contenedor).append(temporal);
			x++; //text box increment
//	    }
        return false;
    });

		var MaxInputs       = 8; //NÃºmero Maximo de Campos
		var contenedor2      = $("#divVegetacion"); //ID del contenedor
		var AddButton       = $("#btnVegetacion"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divVegetacion div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnVegetacion").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
											'{{Form::label("SelVege[]", "VegetaciÃ³n", array("class" => "control-label"))}}'+
											'{{Form::select("SelVege[]",$arrVegetacion) }}'+
											'@if($errors->has("SelVege"))'+
												'@foreach($errors->get("SelVege") as $error)'+
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
		var contenedor3      = $("#divAfectacion"); //ID del contenedor
		var AddButton       = $("#btnAfectacion"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divAfectacion div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnAfectacion").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
												'{{Form::label("SelAfectC[]", "AfectaciÃ³n Cobertura Vegetal", array("class" => "control-label"))}}'+
												'{{Form::select("SelAfectC[]",$arrAfecCobVeg) }}'+
												'@if($errors->has("SelAfectC"))'+
														'@foreach($errors->get("SelAfectC") as $error)'+
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
		var contenedor4      = $("#divActiAntr"); //ID del contenedor
		var AddButton       = $("#btnActiAntr"); //ID del BotÃ³n Agregar
		//var x = nÃºmero de campos existentes en el contenedor
		var x = $("#divActiAntr div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnActiAntr").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
												'{{Form::label("SelActAnt[]", "Actividad AntrÃ³pica", array("class" => "control-label"))}}'+
												'{{Form::select("SelActAnt[]",$arrActvAntro) }}'+
												'@if($errors->has("SelActAnt[]"))'+
														'@foreach($errors->get("SelActAnt[]") as $error)'+
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
