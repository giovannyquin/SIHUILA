@extends("SbAdmin.index")

@section("Titulo")
     Encuestados
@stop

@section("NombrePagina")
     Encuestados
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
    @if(isset($encuestado))
        @if($encuestado->count())
            <h3>Actualizar Encuestados</h3>
            {{ Form::open(array("url"=> "Encuestado/". $encuestado->num_docu_enc, "method" => "PUT")) }}
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        {{Form::label("txtNumDocu", "Escribir el Número del Documento")}}
                        {{Form::text("txtNumDocu", Input::old('txtNumDocu') ? Input::old('txtNumDocu') : isset($encuestado->num_docu_enc) ? $encuestado->num_docu_enc : null, array("class" => "form-control", "placeholder" => "Número del Documento"))}}
                        @if($errors->has("txtNumDocu"))
                        @foreach($errors->get("txtNumDocu") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        {{Form::label("txtPrimerNombre", "Escribir el primer nombre")}}
                        {{Form::text("txtPrimerNombre", Input::old('txtPrimerNombre') ? Input::old('txtPrimerNombre') : isset($encuestado->primer_nombre) ? $encuestado->primer_nombre : null, array("class" => "form-control", "placeholder" => "Primer Nombre"))}}
                        @if($errors->has("txtPrimerNombre"))
                        @foreach($errors->get("txtPrimerNombre") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        {{Form::label("txtSegundoNombre", "Escribir el segundo nombre")}}
                        {{Form::text("txtSegundoNombre", Input::old('txtSegundoNombre') ? Input::old('txtSegundoNombre') : isset($encuestado->segundo_nombre) ? $encuestado->segundo_nombre : null, array("class" => "form-control", "placeholder" => "Segundo Nombre"))}}
                        @if($errors->has("txtSegundoNombre"))
                        @foreach($errors->get("txtSegundoNombre") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        {{Form::label("txtPrimerApe", "Escribir el primer apellido")}}
                        {{Form::text("txtPrimerApe", Input::old('txtPrimerApe') ? Input::old('txtPrimerNombre') : isset($encuestado->primer_apellido) ? $encuestado->primer_apellido : null, array("class" => "form-control", "placeholder" => "Primer Apellido"))}}
                        @if($errors->has("txtPrimerApe"))
                        @foreach($errors->get("txtPrimerApe") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        {{Form::label("txtSegundoApe", "Escribir el segundo apellido")}}
                        {{Form::text("txtSegundoApe", Input::old('txtSegundoApe') ? Input::old('txtPrimerNombre') : isset($encuestado->segundo_apellido) ? $encuestado->segundo_apellido : null, array("class" => "form-control", "placeholder" => "Segundo Apellido"))}}
                        @if($errors->has("txtSegundoApe"))
                        @foreach($errors->get("txtSegundoApe") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
            <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                    {{Form::label("selMuni", "Municipio")}}
                    {{Form::select("selMuni", $arrMuni, isset($encuestado->municipio) ? $encuestado->municipio : null) }}
                    @if($errors->has("selMuni"))
                    @foreach($errors->get("selMuni") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-md-4">
                    {{Form::label("selVereda", "Vereda")}}
                    {{Form::select("selVereda", $arrVereda, isset($encuestado->vereda) ? $encuestado->vereda : null) }}
                    @if($errors->has("selVereda"))
                    @foreach($errors->get("selVereda") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
                </div>
            </div>
        <div class="row col-xs-2">
            {{Form::submit("Actualizar", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('Encuestado/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{ Form::close() }}
        @endif
    @else
        <h3> Crear Encuestados</h3>
        {{ Form::open(array("route" => "Encuestado.create", "method" => "get")) }}
        <div class="row">
            <div class="col-xs-12 col-md-3">
                {{Form::label("txtNumDocu", "Escribir el Número del Documento")}}
                {{Form::text("txtNumDocu", Input::old('txtNumDocu'), array("class" => "form-control", "placeholder" => "Número del Documento"))}}
                @if($errors->has("txtNumDocu"))
                @foreach($errors->get("txtNumDocu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5">
                {{Form::label("txtPrimerNombre", "Escribir el primer nombre")}}
                {{Form::text("txtPrimerNombre", Input::old('txtPrimerNombre'), array("class" => "form-control", "placeholder" => "Primer Nombre"))}}
                @if($errors->has("txtPrimerNombre"))
                @foreach($errors->get("txtPrimerNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5">
                {{Form::label("txtSegundoNombre", "Escribir el segundo nombre")}}
                {{Form::text("txtSegundoNombre", Input::old('txtSegundoNombre'), array("class" => "form-control", "placeholder" => "Segundo Nombre"))}}
                @if($errors->has("txtSegundoNombre"))
                @foreach($errors->get("txtSegundoNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5">
                {{Form::label("txtPrimerApe", "Escribir el primer apellido")}}
                {{Form::text("txtPrimerApe", Input::old('txtPrimerApe'), array("class" => "form-control", "placeholder" => "Primer Apellido"))}}
                @if($errors->has("txtPrimerApe"))
                @foreach($errors->get("txtPrimerApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5">
                {{Form::label("txtSegundoApe", "Escribir el segundo apellido")}}
                {{Form::text("txtSegundoApe", Input::old('txtSegundoApe'), array("class" => "form-control", "placeholder" => "Segundo Apellido"))}}
                @if($errors->has("txtSegundoApe"))
                @foreach($errors->get("txtSegundoApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selMuni", "Municipio")}}
                {{Form::select("selMuni", $arrMuni, null) }}
                @if($errors->has("selMuni"))
                @foreach($errors->get("selMuni") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selVereda", "Vereda")}}
                {{Form::select("selVereda", array("" => "Seleccione.."), null) }}
                @if($errors->has("selVereda"))
                @foreach($errors->get("selVereda") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('Encuestado/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id, array("id" => "hidTipoEnc"))}}
        {{Form::close()}}
    @endif
</div>
@stop
@section("JsJQuery")
    <script>
   
		$('#selMuni').change(function(){ 
                    $.post("{{ url('selectDependientes')}}",
			{ dato: $(this).val(),
                            opcion: 'mostrarVereda'},
                            function(data) {
				$('#selVereda').empty();
                                $('#selVereda').append("<option value=''>" + "Seleccione.." + "</option>");
				$.each(data, function(key, element) {
					$('#selVereda').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
		});
	
        </script>
@stop
