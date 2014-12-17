@extends("SbAdmin.index")

@section("Titulo")
     Frente Minero
@stop

@section("NombrePagina")
     Frente Minero
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
    @if(isset($frente))
        @if($frente->count())
            <h3>Actualizar Frentes Minero ({{ $unidad->nombre }})</h3>
            {{ Form::open(array("url"=> "FrenteMinero/". $frente->id_mina, "method" => "PUT")) }}
                <div class="row">
            <div class="col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Escribir el Nombre del frente minero")}}
                {{Form::text("txtNombre", Input::old('txtNombre') ? Input::old('txtNombre') : isset($frente->nombre_mina) ? $frente->nombre_mina : null, 
                            array("class" => "form-control", "placeholder" => "Nombre"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selDeptoMina", "Departamento")}}
                {{Form::select("selDeptoMina", $depto, isset($frente->depto) ? $frente->depto : null) }}
                @if($errors->has("selDeptoMina"))
                @foreach($errors->get("selDeptoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selMuniMina", "Municipio")}}
                {{Form::select("selMuniMina", $muni, isset($frente->municipio) ? $frente->municipio : null) }}
                @if($errors->has("selMuniMina"))
                @foreach($errors->get("selMuniMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selVeredaMina", "Vereda")}}
                {{Form::select("selVeredaMina", $vereda, isset($frente->vereda) ? $frente->vereda : null) }}
                @if($errors->has("selVeredaMina"))
                @foreach($errors->get("selVeredaMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-7">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc') ? Input::old('txtDesc') : isset($frente->descripcion_mina) ? $frente->descripcion_mina : null, 
                            array("class" => "form-control", "placeholder" => "Descripción", "size" => "30x3"))}}
                @if($errors->has("txtDesc"))
                @foreach($errors->get("txtDesc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Actualizar", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('FrenteMinero/'.$frente->id_minamina, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $unidad->id_minamina)}}
        {{ Form::close() }}
        @endif
    @else
        <h3> Crear Frente Minero ({{ $unidad->nombre }})</h3>
        {{ Form::open(array("route" => "FrenteMinero.create", "method" => "get")) }}
        <div class="row">
            <div class="col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Escribir el Nombre de la unidad minera")}}
                {{Form::text("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Nombre"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selDeptoMina", "Departamento")}}
                {{Form::select("selDeptoMina", $arrDpto, null) }}
                @if($errors->has("selDeptoMina"))
                @foreach($errors->get("selDeptoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selMuniMina", "Municipio")}}
                {{Form::select("selMuniMina", array("" => "Seleccione.."), null) }}
                @if($errors->has("selMuniMina"))
                @foreach($errors->get("selMuniMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selVeredaMina", "Vereda")}}
                {{Form::select("selVeredaMina", array("" => "Seleccione.."), null) }}
                @if($errors->has("selVeredaMina"))
                @foreach($errors->get("selVeredaMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-7">
                {{Form::label("txtDesc", "Descripción")}}
                {{Form::textarea("txtDesc", Input::old('txtDesc'), 
                            array("class" => "form-control", "placeholder" => "Descripción", "size" => "30x3"))}}
                @if($errors->has("txtDesc"))
                @foreach($errors->get("txtDesc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('FrenteMinero/'.$unidad->id_minamina, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidUnidad", $unidad->id_minamina, array("id" => "hidUnidad"))}}
        {{Form::close()}}
    @endif
</div>
@stop
@section("JsJQuery")
    <script>
        $('#selDeptoMina').change(function(){ 
                    $.post("{{ url('selectDependientes')}}",
			{ dato: $(this).val(),
                            opcion: 'mostrarMunicipio'},
                            function(data) {
				$('#selMuniMina').empty();
                                $('#selMuniMina').append("<option value=''>" + "Seleccione.." + "</option>");
				$.each(data, function(key, element) {
					$('#selMuniMina').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
		});
   
		$('#selMuniMina').change(function(){ 
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
	
        </script>
@stop
