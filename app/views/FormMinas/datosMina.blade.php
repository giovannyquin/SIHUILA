@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("SeccionTrabajo")
        <div class="container">
		
			<!-- Codrops top bar --><!--/ Codrops top bar -->
			<section class="main">
				{{ Form::open(array("url" => "datosMina/")) }}
					<h1><span class="sign-up">Datos generales de la mina</span></h1>
                                        <div class="row">
                                            <label>Nombre</label>
                                            <input type="text" name="txtNombreMina">
                                        </div>
                                        <div class="row">
                                            <label>Departamento</label>
						 {{ Form::select("selDeptoMina", $comDeptno, null, array("id" => "selDeptoMina")) }}
                                        </div>
                                        <div class="row">
                                            <label>Municipio</label>
						<select name="selMuniMina" id="selMuniMina">
							<option value="">Seleccione..</option>
							
						</select>
                                        </div>
                                        <div class="row">
                                            <label>Vereda</label>
						<select name="selVeredaMina" id="selVeredaMina">
							<option value="">Seleccione..</option>
							
						</select>
                                        </div>
                                        <div class="row">
                                            <label for="areDescripcionMina">Descripcion</label>
						<textarea rows="4" cols="35" name="areDescripcionMina" id="areDescripcionMina">
						</textarea>
                                        </div>
                                        <div class="row">
                                            <input type="submit" name="submit" value="Crear">
							<!--<input type="submit" name="submit" value="Limpiar">-->
                                        </div>
				{{ Form::close() }}
			</section>
			
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