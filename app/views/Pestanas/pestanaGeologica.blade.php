@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($mina as $mina)
    <div class="row">{{$mina->nombre_mina}}</div>
    @endforeach
    @foreach ($geologia as $geologico)
    <div class="row"></div>
    @endforeach
    @foreach ($detalle as $detalle)
    <div class="row">{{$detalle->num_placa_jur}}</div>
    @endforeach
    @foreach ($morfometria as $morfometria)
    <div class="row"></div>
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="">{{ link_to("pestanaMinero/{$mina->id_mina}", "Minero") }}</li>
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>
            <li class="active"><a href="#" data-toggle="tab">Geologica</a></li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("route"=>"pestanaGeologica.store")) }}
    <p class="bg-primary text-center">Morfología de Talud</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMorfologia", "Morfología", array("class" => "control-label"))}}
            {{Form::select("SelMorfologia",$arrMorfologia,Input::old("SelMorfologia") ? Input::old("SelMorfologia"):isset($geologico->morfologia) ? $geologico->morfologia:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelMorfologia"))
                @foreach($errors->get("SelMorfologia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelPendiente", "Pendiente", array("class" => "control-label"))}}
            {{Form::select("SelPendiente",$arrPendiente,Input::old("SelPendiente") ? Input::old("SelPendiente"):isset($geologico->pendiente) ? $geologico->pendiente:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelPendiente"))
                @foreach($errors->get("SelPendiente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelCategoria", "Categoria", array("class" => "control-label"))}}
            {{Form::select("SelCategoria",$arrCategoria,Input::old("SelCategoria") ? Input::old("SelCategoria"):isset($geologico->categoria) ? $geologico->categoria:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
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
				{{ Form::textarea("txtObsMorfo",Input::old("txtObsMorfo") ? Input::old("txtObsMorfo") : isset($geologico->observ_morfologia) ? $geologico->observ_morfologia : null,array("class"=>"form-control","placeholder"=>"Observaciones","autocomplete"=>"off")) }}
				@if($errors->has("txtObsMorfo"))
						@foreach($errors->get("txtObsMorfo") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
			</div>
    </div>
    <!--<p class="bg-primary text-center">Geología</p>-->
    <p class="bg-primary text-center">Roca</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRoca", "Roca", array("class" => "control-label"))}}
            {{Form::select("SelRoca",$arrRoca,Input::old("SelRoca") ? Input::old("SelRoca"):isset($geologico->roca) ? $geologico->roca:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelRoca"))
                @foreach($errors->get("SelRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEst", "Estructura", array("class" => "control-label"))}}
            {{Form::select("SelEst",$arrEstructura,Input::old("SelEst") ? Input::old("SelEst"):isset($geologico->estructura) ? $geologico->estructura:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelEst"))
                @foreach($errors->get("SelEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtLitologia", 'Litologia', array("class" => "control-label")) }}
            {{ Form::text("txtLitologia",Input::old('txtLitologia') ? Input::old('txtLitologia'):isset($geologico->litologia) ? $geologico->litologia:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Litologia','autocomplete'=>'off')) }}
            @if($errors->has("txtLitologia"))
                @foreach($errors->get("txtLitologia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelFracturacion", "Fracturación", array("class" => "control-label"))}}
            {{Form::select("SelFracturacion",$arrAltMedBaj,Input::old("SelFracturacion") ? Input::old("SelFracturacion"):isset($geologico->fracturacion) ? $geologico->fracturacion:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelFracturacion"))
                @foreach($errors->get("SelFracturacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMeteorizacion", "Meteorización", array("class" => "control-label"))}}
						{{Form::select("SelMeteorizacion",$arrMeteorizacion,Input::old("SelMeteorizacion") ? Input::old("SelMeteorizacion"):isset($geologico->meteorizacion) ? $geologico->meteorizacion:null ,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelMeteorizacion"))
                @foreach($errors->get("SelMeteorizacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtGsi", 'GSI', array("class" => "control-label")) }}
            {{ Form::text("txtGsi",Input::old('txtGsi') ? Input::old('txtGsi'):isset($geologico->gsi) ? $geologico->gsi:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'GSI','autocomplete'=>'off')) }}
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
            {{Form::select("SelColuvion",$arrColuvion,Input::old("SelColuvion") ? Input::old("SelColuvion"):isset($geologico->coluvion) ? $geologico->coluvion : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelColuvion"))
                @foreach($errors->get("SelColuvion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelAluvial", "Aluvial", array("class" => "control-label"))}}
            {{Form::select("SelAluvial",$arrAluvial,Input::old("SelAluvial") ? Input::old("SelAluvial"):isset($geologico->aluvial) ? $geologico->aluvial : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelAluvial"))
                @foreach($errors->get("SelAluvial") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRelleno", "Relleno", array("class" => "control-label"))}}
            {{Form::select("SelRelleno",$arrRelleno,Input::old("SelRelleno") ? Input::old("SelRelleno"):isset($geologico->relleno) ? $geologico->relleno : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
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
            {{ Form::textarea("txtObsSuelo",Input::old('txtObsSuelo') ? Input::old('txtObsSuelo'):isset($geologico->observ_suelo) ? $geologico->observ_suelo:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObsSuelo"))
                @foreach($errors->get("txtObsSuelo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Fenómenos de Remoción en Masa</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelErosion", "Erosión", array("class" => "control-label"))}}
						{{Form::select("SelErosion",$arrErosion,Input::old("SelErosion") ? Input::old("SelErosion"):isset($geologico->erosion) ? $geologico->erosion : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelErosion"))
                @foreach($errors->get("SelErosion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovRoca", "Mov Roca", array("class" => "control-label"))}}
						{{Form::select("SelMovRoca",$arrMovRoca,Input::old("SelMovRoca") ? Input::old("SelMovRoca"):isset($geologico->mov_roca) ? $geologico->mov_roca : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelMovRoca"))
                @foreach($errors->get("SelMovRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovSuelo", "Mov Suelo", array("class" => "control-label"))}}
						{{Form::select("SelMovSuelo",$arrMovSuelo,Input::old("SelMovSuelo") ? Input::old("SelMovSuelo"):isset($geologico->mov_suelo) ? $geologico->mov_suelo : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelMovSuelo"))
                @foreach($errors->get("SelMovSuelo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEstilo", "Estilo", array("class" => "control-label"))}}
						{{Form::select("SelEstilo",$arrEstilo,Input::old("SelEstilo") ? Input::old("SelEstilo"):isset($geologico->estilo) ? $geologico->estilo : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelEstilo"))
                @foreach($errors->get("SelEstilo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelActividad", "Actividad", array("class" => "control-label"))}}
						{{Form::select("SelActividad",$arrActividad,Input::old("SelActividad") ? Input::old("SelActividad"):isset($geologico->actividad) ? $geologico->actividad : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelActividad"))
                @foreach($errors->get("SelActividad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRepet", "Secuencia de Repetición", array("class" => "control-label"))}}
						{{Form::select("SelRepet",$arrSecRep,Input::old("SelRepet") ? Input::old("SelRepet"):isset($geologico->secuencia_repeticion) ? $geologico->secuencia_repeticion : null,array('class'=>'form-control col-xs-1 col-sm-1')) }}
            @if($errors->has("SelRepet"))
                @foreach($errors->get("SelRepet") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
   <p class="bg-primary text-center">Morfometría</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtAnchoM", 'Ancho', array("class" => "control-label")) }}
            {{ Form::text("txtAnchoM",Input::old('txtAnchoM') ? Input::old('txtAnchoM'):isset($geologico->ancho_morfometria) ? $geologico->ancho_morfometria:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Ancho','autocomplete'=>'off')) }}
            @if($errors->has("txtAnchoM"))
                @foreach($errors->get("txtAnchoM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtLongitudM", 'Longitud', array("class" => "control-label")) }}
            {{ Form::text("txtLongitudM",Input::old('txtLongitudM') ? Input::old('txtLongitudM'):isset($geologico->longitud_morfometira) ? $geologico->longitud_morfometira:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Longitud','autocomplete'=>'off')) }}
            @if($errors->has("txtLongitudM"))
                @foreach($errors->get("txtLongitudM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfundidadM", 'Profundidad', array("class" => "control-label")) }}
            {{ Form::text("txtProfundidadM",Input::old('txtProfundidadM') ? Input::old('txtProfundidadM'):isset($geologico->profundidad_morfometria) ? $geologico->profundidad_morfometria:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Produndidad','autocomplete'=>'off')) }}
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
            {{ Form::textarea("txtObservacionM",Input::old('txtObservacionM') ? Input::old('txtObservacionM'):isset($geologico->observ_morfometria) ? $geologico->observ_morfometria:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observacion','autocomplete'=>'off')) }}
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
            {{ Form::text("txtDescCausaM",Input::old('txtDescCausaM') ? Input::old('txtDescCausaM'):isset($geologico->causa) ? $geologico->causa:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
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
            {{ Form::text("txtInterM",Input::old('txtInterM') ? Input::old('txtInterM'):isset($geologico->intercalada_arcillolitas_arenisca) ? $geologico->intercalada_arcillolitas_arenisca:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
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
            {{Form::select("SelCondA[]",$arrCondiAgua,isset($yy) ? $yy : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
				{{Form::select("SelCondA[]",$arrCondiAgua,isset($conagua['id_topologia']) ? $conagua['id_topologia'] : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
				@if($errors->has("SelCondA[]"))
						@foreach($errors->get("SelCondA[]") as $error)
							<span class="help-block alert alert-danger">  * {{ $error }} </span>
						@endforeach
				@endif
				</div>
				<a href="{{route('seleccionMultipleElim', array($conagua['id_mina'],$conagua['id_topologia'],'Condicion Agua','PestanaGeologicaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
			 </div>
			</div>
		@endforeach

    <p class="bg-primary text-center">Estado de las Obras</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelAlcant", "Alcantarilla", array("class" => "control-label"))}}
            {{Form::select("SelAlcant",$arrEstadoObra,isset($geologico->estado_alcantarilla) ? $geologico->estado_alcantarilla : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelAlcant"))
                @foreach($errors->get("SelAlcant") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCuneta", "Cuneta", array("class" => "control-label"))}}
            {{Form::select("SelCuneta",$arrEstadoObra,isset($geologico->estado_cuneta) ? $geologico->estado_cuneta : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelCuneta"))
                @foreach($errors->get("SelCuneta") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCanales", "Canales", array("class" => "control-label"))}}
            {{Form::select("SelCanales",$arrEstadoObra,isset($geologico->estado_canales) ? $geologico->estado_canales : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelCanales"))
                @foreach($errors->get("SelCanales") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDrenes", "Drenes", array("class" => "control-label"))}}
            {{Form::select("SelDrenes",$arrEstadoObra,isset($geologico->estado_drenes) ? $geologico->estado_drenes : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
            {{Form::select("SelEncole",$arrEstadoObra,isset($geologico->estado_encole) ? $geologico->estado_encole : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelEncole"))
                @foreach($errors->get("SelEncole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDescole", "Descole", array("class" => "control-label"))}}
            {{Form::select("SelDescole",$arrEstadoObra,isset($geologico->estado_descole) ? $geologico->estado_descole : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelDescole"))
                @foreach($errors->get("SelDescole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelOtrosAgua", "Otros", array("class" => "control-label"))}}
            {{Form::select("SelOtrosAgua",$arrEstadoObra,isset($geologico->estado_otros) ? $geologico->estado_otros : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelOtrosAgua"))
                @foreach($errors->get("SelOtrosAgua") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelHum", "Hum. Suelo", array("class" => "control-label"))}}
            {{Form::select("SelHum",$arrHumSuelo,isset($geologico->hum_suelo) ? $geologico->hum_suelo : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
							{{Form::label("SelVege[]","Vegetación",array("class" => "control-label"))}}
							{{Form::select("SelVege[]",$arrVegetacion,isset($g) ? $g : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
								{{Form::label("SelVege[]","Vegetación",array("class" => "control-label"))}}
								{{Form::select("SelVege[]",$arrVegetacion,isset($selmulvege['id_topologia']) ? $selmulvege['id_topologia'] : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
								@if($errors->has("SelVege[]"))
										@foreach($errors->get("SelVege[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('seleccionMultipleElim', array($selmulvege['id_mina'],$selmulvege['id_topologia'],'Vegetacion','PestanaGeologicaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					</div>
				</div>
		@endforeach

		<div class="row">
		 <div class="form-group form-group-sm col-xs-12 col-sm-4">
      {{Form::label("SelIncli", "Inclinación", array("class" => "control-label"))}}
      {{Form::select("SelIncli",$arrSiNo,isset($geologico->inclinacion) ? $geologico->inclinacion : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
            {{Form::select("SelAfectC[]",$arrAfecCobVeg,isset($yii) ? $yii : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
								{{Form::label("SelAfectC[]","Afectación Cobertura Vegetal",array("class" => "control-label"))}}
								{{Form::select("SelAfectC[]",$arrAfecCobVeg,isset($selmulafec['id_topologia']) ? $selmulafec['id_topologia'] : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
								@if($errors->has("SelAfectC[]"))
										@foreach($errors->get("SelAfectC[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('seleccionMultipleElim', array($selmulafec['id_mina'],$selmulafec['id_topologia'],'Afectacion Cobertura Vegetal','PestanaGeologicaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach
    
		<div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionV",'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionV",Input::old('txtObservacionV') ? Input::old('txtObservacionV'):isset($geologico->observacion_afectacion) ? $geologico->observacion_afectacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Drecripcion de Causas','autocomplete'=>'off')) }}
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
            {{Form::select("SelMuroGav",$arrEstadoObra,isset($geologico->muro_gaviones) ? $geologico->muro_gaviones : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelMuroGav"))
                @foreach($errors->get("SelMuroGav") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroCon", "Muro concreto", array("class" => "control-label"))}}
            {{Form::select("SelMuroCon",$arrEstadoObra,isset($geologico->muro_concreto) ? $geologico->muro_concreto : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelMuroCon"))
                @foreach($errors->get("SelMuroCon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroOtr", "Otro", array("class" => "control-label"))}}
            {{Form::select("SelMuroOtr",$arrEstadoObra,isset($geologico->muro_otro) ? $geologico->muro_otro : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
            {{ Form::textarea("txtObservacionCon",Input::old('txtObservacionCon') ? Input::old('txtObservacionCon'):isset($geologico->observacion_obras_estabilizacion) ? $geologico->observacion_obras_estabilizacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
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
            {{ Form::textarea("txtRecomendacionCon",Input::old('txtRecomendacionCon') ? Input::old('txtRecomendacionCon'):isset($geologico->recomendaciones_obras_estabilizacion) ? $geologico->recomendaciones_obras_estabilizacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Recomedaciones','autocomplete'=>'off')) }}
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
            {{Form::select("SelActAnt[]",$arrActvAntro,isset($yii) ? $yii : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
								{{Form::select("SelActAnt[]",$arrActvAntro,isset($selactantro['id_topologia']) ? $selactantro['id_topologia'] : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
								@if($errors->has("SelActAnt[]"))
										@foreach($errors->get("SelActAnt[]") as $error)
											<span class="help-block alert alert-danger">  * {{ $error }} </span>
										@endforeach
								@endif
						</div>
								<a href="{{route('seleccionMultipleElim', array($selactantro['id_mina'],$selactantro['id_topologia'],'Actividad Antropica','PestanaGeologicaController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
					 </div>
				</div>
		@endforeach

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelEstViv", "Estado de las Viviendas", array("class" => "control-label"))}}
            {{Form::select("SelEstViv",$arrEstadoObra,isset($geologico->estado_vivienda) ? $geologico->estado_vivienda : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
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
            {{ Form::textarea("txtObservacionOtroA",Input::old('txtObservacionOtroA') ? Input::old('txtObservacionOtroA'):isset($geologico->observacion_otros_apectos) ? $geologico->observacion_otros_apectos:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Observaciones','autocomplete'=>'off')) }}
            @if($errors->has("txtObservacionOtroA"))
                @foreach($errors->get("txtObservacionOtroA") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Descripción general</p>
    <div class="row">
          <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtDescG", 'Descripción general', array("class" => "control-label")) }}
            {{ Form::textarea("txtDescG",Input::old('txtDescG') ? Input::old('txtDescG'):isset($geologico->descripcion_general) ? $geologico->descripcion_general:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Descripción General','autocomplete'=>'off')) }}
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
            {{Form::select("SelTipPro",$arrTipoProceso,isset($geologico->tipo_proceso) ? $geologico->tipo_proceso : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}
            @if($errors->has("SelTipPro"))
                @foreach($errors->get("SelTipPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtElev", 'Elevación', array("class" => "control-label")) }}
            {{ Form::text("txtElev",Input::old('txtElev') ? Input::old('txtElev'):isset($geologico->elevacion) ? $geologico->elevacion:null ,array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Elevacion','autocomplete'=>'off')) }}
            @if($errors->has("txtElev"))
                @foreach($errors->get("txtElev") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
		<br />
<!--
    <p class="bg-primary text-center">Fotos</p>
    <div class="row">
        
    </div>
    <p class="bg-primary text-center">Esquema</p>
    <div class="row">
-->        
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
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor      = $("#divConAgua"); //ID del contenedor
		var AddButton       = $("#btnConAgua"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divConAgua div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos
    $("#btnConAgua").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
									'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
											'{{Form::label("SelCondA[]", "Condiciones de Agua", array("class" => "control-label"))}}'+
											'{{Form::select("SelCondA[]",$arrCondiAgua,isset($yy) ? $yy : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}'+
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

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divVegetacion"); //ID del contenedor
		var AddButton       = $("#btnVegetacion"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divVegetacion div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnVegetacion").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
											'{{Form::label("SelVege[]", "Vegetación", array("class" => "control-label"))}}'+
											'{{Form::select("SelVege[]",$arrVegetacion,isset($g) ? $g : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}'+
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


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor3      = $("#divAfectacion"); //ID del contenedor
		var AddButton       = $("#btnAfectacion"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divAfectacion div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnAfectacion").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
												'{{Form::label("SelAfectC[]", "Afectación Cobertura Vegetal", array("class" => "control-label"))}}'+
												'{{Form::select("SelAfectC[]",$arrAfecCobVeg,isset($yii) ? $yii : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}'+
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


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor4      = $("#divActiAntr"); //ID del contenedor
		var AddButton       = $("#btnActiAntr"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divActiAntr div").length + 1;
		var FieldCount = x-1; //para el seguimiento de los campos

    $("#btnActiAntr").click(function () { 
//    if(x <= MaxInputs) {//max input box allowed
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-4">'+
												'{{Form::label("SelActAnt[]", "Actividad Antrópica", array("class" => "control-label"))}}'+
												'{{Form::select("SelActAnt[]",$arrActvAntro,isset($yii) ? $yii : null,array("class"=>"form-control col-xs-1 col-sm-1")) }}'+
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
