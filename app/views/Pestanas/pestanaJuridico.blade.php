<div class="marketing">
    {{ Form::open(array("url" => "pestanaJuridico")) }}
    <p class="bg-primary" style="alignment-adjust: center">Identificación de población sujeto y grado de formalización</p>
    <p class="bg-primary">Amparo de algún título minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selOperacion">Las operaciones mineras se encuentran bajo el amparo de algún títulos minero?</label>
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
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtPlaca","Número de la Placa (Si la respuesta Sí)", array("class" => "control-label")) }}
            {{ Form::text("txtPlaca", Input::old("txtPlaca"), array("class" => "form-control", "placeholder" => "Número de Placa", "autocomplete" => "off")) }}
            @if($errors->has("txtPlaca"))
                @foreach($errors->get("txtPlaca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selTipo","Tipo de Título Minero", array("class" => "control-label")) }}
            <!-- Controller: $selTipo = Topologia::all()->lists('id', 'descripcion_topologia');
                $selected = array();
                View::make("pestanaJuridico", compact('selTipo', 'selected')); -->
            <select name="selTipo" id="selTipo">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipo"))
                @foreach($errors->get("selTipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <label for="selActoTer">Acto Administrativo Terminado</label>
            <select name="selActoTer" id="selActoTer">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selActoTer"))
                @foreach($errors->get("selActoTer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <label for="selRenuncia">Tipo de Renuncia</label>
            <select name="selRenuncia" id="selRenuncia">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selRenuncia"))
                @foreach($errors->get("selRenuncia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Algún Instrumento para la formalización</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selInstForma">Las operaciones mineras se encuentran bajo algún instrumento para la formalización</label>
            <select name="selInstForma" id="selInstForma">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selInstForma"))
                @foreach($errors->get("selInstForma") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selTipoInst">Defina el Instrumento (Si la respuesta anterior es Sí)</label>
            <select name="selTipoInst" id="selTipoInst">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoInst"))
                @foreach($errors->get("selTipoInst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <label for="selEstadoInst">Estado</label>
            <select name="selEstadoInst" id="selEstadoInst">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selEstadoInst"))
                @foreach($errors->get("selEstadoInst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Superposición sobre algún título minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            <label for="selSupTit">Las operaciones mineras se desarrollan superpuestas sobre algún título minero</label>
            <select name="selSupTit" id="selSupTit">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSupTit"))
                @foreach($errors->get("selSupTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtPlacaSup","Número de la Placa (Si la respuesta anterior es Sí)", array("class" => "control-label")) }}
            {{ Form::text("txtPlacaSup", Input::old("txtPlacaSup"), array("class" => "form-control", "placeholder" => "Número de Placa", "autocomplete" => "off")) }}
            @if($errors->has("txtPlacaSup"))
                @foreach($errors->get("txtPlacaSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoSup","Tipo de Título Minero", array("class" => "control-label")) }}
            <!-- Controller: $selTipo = Topologia::all()->lists('id', 'descripcion_topologia');
                $selected = array();
                View::make("pestanaJuridico", compact('selTipo', 'selected')); -->
            <select name="selTipoSup" id="selTipoSup">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoSup"))
                @foreach($errors->get("selTipoSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    
        <p class="form-group bg-success">Diligenciar los siguientes campos del títular minero si Las operaciones mineras se desarrollan superpuestas sobre algún título minero</p>
    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerTit", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerTit", Input::old("txtPrimerTit"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerTit"))
                @foreach($errors->get("txtPrimerTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoTit", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoTit", Input::old("txtSegundoTit"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoTit"))
                @foreach($errors->get("txtSegundoTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApeTit", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApeTit", Input::old("txtPrimerApeTit"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerApeTit"))
                @foreach($errors->get("txtPrimerApeTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApeTit", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApeTit", Input::old("txtSegundoApeTit"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoApeTit"))
                @foreach($errors->get("txtSegundoApeTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCedTit", "Cédula del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtCedTit", Input::old("txtCedTit"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Cédula del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtCedTit"))
                @foreach($errors->get("txtCedTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtDirecTit", "Dirección del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtDirecTit", Input::old("txtSegundoTit"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Dirección del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtDirecTit"))
                @foreach($errors->get("txtDirecTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtTelTit", "Teléfono del Títular", array("class" => "control-label")) }}
            {{ Form::text("txtTelTit", Input::old("txtTelTit"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Teléfono del Títular", "autocomplete" => "off")) }}
            @if($errors->has("txtTelTit"))
                @foreach($errors->get("txtTelTit") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selPosFor">Posibilidad de Formación</label>
            <select name="selPosFor" id="selPosFor">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selPosFor"))
                @foreach($errors->get("selPosFor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selTitDis">Títular dispuesto a Negociar</label>
            <select name="selTitDis" id="selTitDis">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selTitDis"))
                @foreach($errors->get("selTitDis") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="selInfDis">Informal dispuesto a Formalizarce</label>
            <select name="selInfDis" id="selInfDis">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selInfDis"))
                @foreach($errors->get("selInfDis") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
</div>

