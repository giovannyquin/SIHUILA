@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("JsJQuery")
    
@stop
@section("SeccionTrabajo")
        <div class="container">
		
			<!-- Codrops top bar --><!--/ Codrops top bar -->
			<section class="main">
				{{ Form::open(array("url" => "datosMina/")) }}
					<h1><span class="sign-up">Datos generales de la mina</span></h1>
					<p>
						<label>Nombre</label>
						<input type="text" name="txtNombreMina">
					</p>
					<p>
						<label>Departamento</label>
						 {{ Form::select("selDeptoMina", $comDeptno) }}
					</p>
					<p>
						<label>Municipio</label>
						<select name="selMuniMina" id="selMuniMina">
							<option value="">Seleccione..</option>
							@foreach($munici as $item)
								 <option value="{{ $item->id_municipio }}">{{ $item->nombre_municipio }}</option>
							@endforeach
						</select>
					</p>
					<p>
						<label>Vereda</label>
						<select name="selVeredaMina" id="selVeredaMina">
							<option value="">Seleccione..</option>
							@foreach($vereda as $item)
								 <option value="{{ $item->id_vereda }}">{{ $item->nombre_vereda }}</option>
							@endforeach
						</select>
					</p>
					<p>
						<label>Descripcion</label>
						<textarea rows="4" cols="35" name="areDescripcionMina" id="areDescripcionMina">
						</textarea>
					</p>
					<p>&nbsp;</p>
					<p class="clearfix">
							<input type="submit" name="submit" value="Crear">
							<!--<input type="submit" name="submit" value="Limpiar">-->
			</p>
				{{ Form::close() }}
			</section>
			
    </div>
@stop