@extends("SbAdmin.index")

@section("Titulo")
    Crear Preguntas
@stop

@section("NombrePagina")
    Crear Preguntas
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
    @if(isset($pregunta))
        @if($pregunta->count())
            <h3>Actualizar Preguntas</h3>
            {{ Form::open(array("url"=> "Preguntas/". $pregunta->id_pregunta, "method" => "PUT")) }}
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        {{Form::label("txtNombre", "Escribir el texto de la pregunta")}}
                        {{Form::textarea("txtNombre", Input::old('txtNombre') ? Input::old('txtNombre') : isset($pregunta->nombre) ? $pregunta->nombre : null, array("class" => "form-control", "placeholder" => "Pregunta", "size" => "30x3"))}}
                        @if($errors->has("txtNombre"))
                        @foreach($errors->get("txtNombre") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group form-group-sm col-xs-12 col-md-6">
                        {{Form::label("selTipo", "Tipo de Respuesta")}}
                        {{Form::select("selTipo", $tipoRpta, isset($pregunta->id_tipo_rpta) ? $pregunta->id_tipo_rpta : null )}}
                        @if($errors->has("selTipo"))
                        @foreach($errors->get("selTipo") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-sm col-xs-12 col-md-4">
                        {{Form::label("selAspPreg", "Sección a incluir la pregunta")}}
                        {{Form::select("selAspPreg", $aspPreg, isset($pregunta->id_aspecto) ? $pregunta->id_aspecto : null) }}
                        @if($errors->has("selAspPreg"))
                        @foreach($errors->get("selAspPreg") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-sm col-xs-12 col-md-4">
                        {{Form::label("selTipAspPreg", "Subsección a incluir la pregunta")}}
                        {{Form::select("selTipAspPreg", $tipoasppreg, isset($pregunta->id_aspecto) ? $pregunta->id_aspecto : null )}}
                        @if($errors->has("selTipAspPreg"))
                        @foreach($errors->get("selTipAspPreg") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-group-sm col-xs-12 col-md-4">
                        {{Form::label("selDesPreg", "Colocar después de pregunta")}}
                        {{Form::select("selDesPreg", $numpreg, isset($pregunta->num_pregunta) ? $pregunta->num_pregunta : null )}}
                        @if($errors->has("selDesPreg"))
                        @foreach($errors->get("selDesPreg") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                    </div>
                </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('Preguntas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{ Form::close() }}
        @endif
    @else
        <h3> Crear Preguntas</h3>
        {{ Form::open(array("route" => "Preguntas.create", "method" => "get")) }}
        
        <div class="row">
            <div class="col-xs-12 col-md-8">
                {{Form::label("txtNombre", "Escribir el texto de la pregunta")}}
                {{Form::textarea("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Pregunta", "size" => "30x3"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-6">
                {{Form::label("selTipo", "Tipo de Respuesta")}}
                {{Form::select("selTipo", $tipoRpta, null )}}
                @if($errors->has("selTipo"))
                @foreach($errors->get("selTipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selAspPreg", "Sección a incluir la pregunta")}}
                {{Form::select("selAspPreg", $aspPreg, null )}}
                @if($errors->has("selAspPreg"))
                @foreach($errors->get("selAspPreg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selTipAspPreg", "Subsección a incluir la pregunta")}}
                {{Form::select("selTipAspPreg", array("" => "Seleccione.."), null )}}
                @if($errors->has("selTipAspPreg"))
                @foreach($errors->get("selTipAspPreg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selDesPreg", "Colocar después de pregunta")}}
                {{Form::select("selDesPreg", array("" => "Seleccione.."), null )}}
                @if($errors->has("selDesPreg"))
                @foreach($errors->get("selDesPreg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('Preguntas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id, array("id" => "hidTipoEnc"))}}
        {{Form::close()}}
    @endif
</div>
@stop
@section("JsJQuery")
    {{ HTML::script('js/encuesta/crearPreguntas.js') }}
    <script>
   
		$('#selAspPreg').change(function(){ 
                    $.post("{{ url('selectDependientes')}}",
			{ dato: $(this).val(),
                            opcion: 'TipoAspPreg'},
                            function(data) {
				$('#selTipAspPreg').empty();
                                $('#selTipAspPreg').append("<option value=''>" + "Seleccione.." + "</option>");
				$.each(data, function(key, element) {
					$('#selTipAspPreg').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
                    $.post("{{ url('selectDependientes')}}",
			{ tipoenc: $('#hidTipoEnc').val(),
                            aspecto: $(this).val(),                            
                            opcion: 'NumPreg'},
                            function(data) {
				$('#selDesPreg').empty();
                                $('#selDesPreg').append("<option value=''>" + "Seleccione.." + "</option>");
				$.each(data, function(key, element) {
					$('#selDesPreg').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
		});
	
        </script>
@stop
