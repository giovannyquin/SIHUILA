<div class="marketing">
    {{ Form::open(array("url" => "pestanaJuridico")) }}
    <p class="bg-primary row" style="alignment-adjust: center">Identificación de población sujeto y grado de formalización</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selOperacion">Las operaciones mineras se encuentran bajo el amparo de algun titulos minero?</label>
            <select name="selOperacion" id="selOperacion">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selOperacion"))
                @foreach($errors->get("selOperacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtPlaca","Número de la Placa", array("class" => "control-label")) }}
            {{ Form::text("txtPlaca", Input::old("txtPlaca"), array("class" => "form-control", "placeholder" => "Número de Placa", "autocomplete" => "off")) }}
            @if($errors->has("txtPlaca"))
                @foreach($errors->get("txtPlaca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selTipo","Tipo de Contrato", array("class" => "control-label")) }}
            <!-- Controller: $selTipo = Topologia::all()->lists('id', 'descripcion_topologia');
                $selected = array();
                View::make("pestanaJuridico", compact('selTipo', 'selected')); -->
            {{ Form::select('selTipo') }}
            @if($errors->has("selTipo"))
                @foreach($errors->get("selTipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selPto", "PTO Aprobado")}}
            {{ Form::select("selPto", array("" => "Seleccione..",
                                            "Si" => "Sí",
                                            "No" => "No"))}}
            @if($errors->has("selPto"))
                @foreach($errors->get("selPto") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selLicencia", "Licencia Ambiental")}}
            {{ Form::select("selLicencia", array("" => "Seleccione..",
                                            "Si" => "Sí",
                                            "No" => "No"))}}
            @if($errors->has("selLicencia"))
                @foreach($errors->get("selLicencia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selActoAdmTerm", "Acto Administrativo Terminado")}}
            {{ Form::select("selActoAdmTerm", array("" => "Seleccione..",
                                            "Si" => "Sí",
                                            "No" => "No"))}}
            @if($errors->has("selActoAdmTerm"))
                @foreach($errors->get("selActoAdmTerm") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
</div>

