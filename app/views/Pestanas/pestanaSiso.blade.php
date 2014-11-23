<div class="marketing">
    {{ Form::open(array("url" => "pestanaSiso")) }}
    <p class="bg-primary text-center">Información Laboral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMenor", "Número de Menores de Edad", array("class" => "control-label")) }}
            {{ Form::text("txtMenor", Input::old("txtMenor"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Menores de Edad", "autocomplete" => "off")) }}
            @if($errors->has("txtMenor"))
                @foreach($errors->get("txtMenor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMujeres", "Número de Mujeres", array("class" => "control-label")) }}
            {{ Form::text("txtMujeres", Input::old("txtMujeres"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Mujeres", "autocomplete" => "off")) }}
            @if($errors->has("txtMujeres"))
                @foreach($errors->get("txtMujeres") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Aspectos Generales</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnSegSoc" id="btnSegSoc" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSeg1" id="selSeg1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selSeg1"))
                @foreach($errors->get("selSeg1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSegSi1" id="selSegSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSegSi1"))
                @foreach($errors->get("selSegSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAccLab", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAccLab", Input::old("txtHalAccLab"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAccLab"))
                @foreach($errors->get("txtHalAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr class="bg-primary">
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selAccLab", "Han ocurrido accidentes laborales", array("class" => "control-label")) }}
            <select name="selAccLab" id="selAccLab">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAccLab"))
                @foreach($errors->get("selAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtAccLab", "Cuantos Accidentes", array("class" => "control-label")) }}
            {{ Form::text("txtAccLab", Input::old("txtMujeres"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Accidentes", "autocomplete" => "off")) }}
            @if($errors->has("txtAccLab"))
                @foreach($errors->get("txtAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selRepAccLab", "Han reportado", array("class" => "control-label")) }}
            <select name="selRepAccLab" id="selRepAccLab">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selRepAccLab"))
                @foreach($errors->get("selRepAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnElBas" id="btnElBas" class="btn btn-warning btn-xs" value="Agregar Campo">
    </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selElBas1", "La empresa cuenta con elementos basicos para atencion de emergencias", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selElBas1" id="selElBas1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selElBas1"))
                @foreach($errors->get("selElBas1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selEleBasSi1" id="selEleBasSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEleBasSi1"))
                @foreach($errors->get("selEleBasSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEleBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEleBas", Input::old("txtHalEleBas"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEleBas"))
                @foreach($errors->get("txtHalEleBas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selBrig", "La empresa cuenta con brigadista o socorredor minero", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selBrig" id="selBrig">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selBrig"))
                @foreach($errors->get("selBrig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalBrig", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalBrig", Input::old("txtHalBrig"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalBrig"))
                @foreach($errors->get("txtHalBrig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selRegHig", "La empresa cuenta con un reglamento de higiene y seguridad industrial publicado, programa de gestion de la seguridad y/o Programa de Salud Ocupacional", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selRegHig" id="selRegHig">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selRegHig"))
                @foreach($errors->get("selRegHig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalRegHig", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalRegHig", Input::old("txtHalRegHig"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalRegHig"))
                @foreach($errors->get("txtHalRegHig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCopaso", "La empresa cuenta con un COPASO o VIGIA DE LA SEGURIDAD", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selCopaso" id="selCopaso">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selCopaso"))
                @foreach($errors->get("selCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtCopaso", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtCopaso", Input::old("txtCopaso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtCopaso"))
                @foreach($errors->get("txtCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenal", "Se evidencia  señalizacion en la empresa", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSenal" id="selSenal">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSenal"))
                @foreach($errors->get("selSenal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtCopaso", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtCopaso", Input::old("txtCopaso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtCopaso"))
                @foreach($errors->get("txtCopaso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnProt" id="btnProt" class="btn btn-warning btn-xs" value="Agregar Campo">
    </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selBotProt1", "Se evidencia uso de elementos de proteccion personal EPP por parte de los trabajadores", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selBotProt1" id="selBotProt1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selBotProt1"))
                @foreach($errors->get("selBotProt1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selProtSi1" id="selProtSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selProtSi1"))
                @foreach($errors->get("selProtSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProt", Input::old("txtHalProt"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalProt"))
                @foreach($errors->get("txtHalProt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnProtSop" id="btnProtSop" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selProtSop1", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selProtSop1" id="selProtSop1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selProtSop1"))
                @foreach($errors->get("selProtSop1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selProtSopSi1" id="selProtSopSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selProtSopSi1"))
                @foreach($errors->get("selProtSopSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProtSop", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProtSop", Input::old("txtHalProtSop"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalProtSop"))
                @foreach($errors->get("txtHalProtSop") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selInsSan", "La empresa cuenta con Instalaciones sanitarias destinadas para el aseo del personal y cambio de ropa de trabajo; aquellas deberán contar con duchas, lavamanos, sanitarios y suministro de agua potable", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selInsSan" id="selInsSan">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selInsSan"))
                @foreach($errors->get("selInsSan") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalInsSan", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalInsSan", Input::old("txtHalInsSan"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalInsSan"))
                @foreach($errors->get("txtHalInsSan") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPozSep", "Se evidencia pozo septico", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selPozSep" id="selPozSep">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selPozSep"))
                @foreach($errors->get("selPozSep") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPozSep", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPozSep", Input::old("txtHalPozSep"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPozSep"))
                @foreach($errors->get("txtHalPozSep") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnSerBas" id="btnSerBas" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSerBas1", "La empresa cuenta servicios basicos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSerBas1" id="selSerBas1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selSerBas1"))
                @foreach($errors->get("selSerBas1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSerBasSi1" id="selSerBasSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSerBasSi1"))
                @foreach($errors->get("selSerBasSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSerBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSerBas", Input::old("txtHalSerBas"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSerBas"))
                @foreach($errors->get("txtHalSerBas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCasino", "Se evidencia campamento, restaurante y/o casino", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selCasino" id="selCasino">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selCasino"))
                @foreach($errors->get("selCasino") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCasino", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCasino", Input::old("txtHalCasino"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCasino"))
                @foreach($errors->get("txtHalCasino") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAseo", "Se observa  orden y aseo", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selAseo" id="selAseo">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAseo"))
                @foreach($errors->get("selAseo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAseo", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAseo", Input::old("txtHalAseo"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAseo"))
                @foreach($errors->get("txtHalAseo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCtrlAcc", "Se controla el acceso a los visitantes a la explotación minera", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selCtrlAcc" id="selCtrlAcc">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selCtrlAcc"))
                @foreach($errors->get("selCtrlAcc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCtrlAcc", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCtrlAcc", Input::old("txtHalCtrlAcc"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCtrlAcc"))
                @foreach($errors->get("txtHalCtrlAcc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Riesgo</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selDesli", "Se evidencia presencia  de  deslizamiento, caida de rocas, factible inundacion, posibilidad de incendio, entre otros", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selDesli" id="selDesli">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selDesli"))
                @foreach($errors->get("selDesli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenaliz", "Estan delimitados y/o señalizados", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSenaliz" id="selSenaliz">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSenaliz"))
                @foreach($errors->get("selSenaliz") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesli", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesli", Input::old("txtHalDesli"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesli"))
                @foreach($errors->get("txtHalDesli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEtDelim", "La explotacion presenta delimitadacion de las diferentes zonas? Explotacion, beneficio, baños, etc?", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selEtDelim" id="selEtDelim">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEtDelim"))
                @foreach($errors->get("selEtDelim") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEtDelim", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEtDelim", Input::old("txtHalEtDelim"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEtDelim"))
                @foreach($errors->get("txtHalEtDelim") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCtrRies", "Existen controles para reducir los riesgos en la fuente generadora y en el medio transmisor", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selCtrRies" id="selCtrRies">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selCtrRies"))
                @foreach($errors->get("selCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCtrRies", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCtrRies", Input::old("txtHalCtrRies"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCtrRies"))
                @foreach($errors->get("txtHalCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAplCtrRies", "Se aplican controles para reducir los riesgos en los trabajadores", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selAplCtrRies" id="selAplCtrRies">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAplCtrRies"))
                @foreach($errors->get("selAplCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAplCtrRies", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAplCtrRies", Input::old("txtHalAplCtrRies"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAplCtrRies"))
                @foreach($errors->get("txtHalAplCtrRies") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Aspectos Técnicos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMetET", "Se evidencia un metodo de explotacion definido", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selMetET" id="selMetET">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selMetET"))
                @foreach($errors->get("selMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form:: label("txtTipoMetET", "Cual, o en que consiste", array("class"=> "control-label"))}}
            {{ Form::text("txtTipoMetET", Input::old("txtTipoMetET"),
                           array("class"=>"form-control", "placeholder" => "", "autocomplete" => "off"))}}
            @if($errors->has("txtTipoMetET"))
                @foreach($errors->get("txtTipoMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMetET", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMetET", Input::old("txtHalMetET"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMetET"))
                @foreach($errors->get("txtHalMetET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAbaRec", "Las áreas de trabajo antiguas o abandonadas se encuentran en programa de recuperacion, reforestacion, entre otras", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selAbaRec" id="selAbaRec">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAbaRec"))
                @foreach($errors->get("selAbaRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAbaRec", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAbaRec", Input::old("txtHalAbaRec"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAbaRec"))
                @foreach($errors->get("txtHalAbaRec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEster", "Si en el proceso se generan esteriles, se realiza disposicion adecuada de ellos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selEster" id="selEster">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEster"))
                @foreach($errors->get("selEster") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEster", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEster", Input::old("txtHalEster"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEster"))
                @foreach($errors->get("txtHalEster") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAseCal", "Cuenta la empresa con asesoría externa calificada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selAseCal" id="selAseCal">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAseCal"))
                @foreach($errors->get("selAseCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAseCal", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAseCal", Input::old("txtHalAseCal"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAseCal"))
                @foreach($errors->get("txtHalAseCal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Beneficio y Transformación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnAspBen" id="btnAspBen" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAspBen1", "En el proceso de beneficio y/o transformacion se evidencia alguno de los siguientes aspecto", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selAspBen1" id="selAspBen1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selAspBen1"))
                @foreach($errors->get("selAspBen1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selAspBenSi1" id="selAspBenSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAspBenSi1"))
                @foreach($errors->get("selAspBenSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAspBen", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAspBen", Input::old("txtHalAspBen"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAspBen"))
                @foreach($errors->get("txtHalAspBen") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selProTra", "Se realiza proceso de  transformacion", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selProTra" id="selAseCal">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selProTra"))
                @foreach($errors->get("selProTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesPro", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesPro", Input::old("txtDesPro"), 
                array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesPro"))
                @foreach($errors->get("txtDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesPro", Input::old("txtHalDesPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesPro"))
                @foreach($errors->get("txtHalDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEqProTra", "Emplea equipos en el proceso de beneficio y/o transformacion", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selEqProTra" id="selAseCal">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEqProTra"))
                @foreach($errors->get("selEqProTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesEqPro", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesEqPro", Input::old("txtDesEqPro"), 
                array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesEqPro"))
                @foreach($errors->get("txtDesEqPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEqPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEqPro", Input::old("txtHalEqPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEqPro"))
                @foreach($errors->get("txtHalEqPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Seguridad Minera</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selTalMec", "Existe taller de mecanica para el mantenimiento de la maquinaria pesada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selTalMec" id="selTalMec">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selTalMec"))
                @foreach($errors->get("selTalMec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTalMec", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTalMec", Input::old("txtHalTalMec"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTalMec"))
                @foreach($errors->get("txtHalTalMec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selAlmCom", "Se realiza almacenamiento de combustibles", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selAlmCom" id="selAlmCom">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selAlmCom"))
                @foreach($errors->get("selAlmCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAlmCom", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAlmCom", Input::old("txtHalAlmCom"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAlmCom"))
                @foreach($errors->get("txtHalAlmCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnSenSeg" id="btnSenSeg" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSenSeg1", "La empresa tiene instalada señalización, informativa, preventiva y de seguridad en la zona de explotacion, beneficio y/o transformación", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSenSeg1" id="selSenSeg1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selSenSeg1"))
                @foreach($errors->get("selSenSeg1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selSenSegSi1" id="selSenSegSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selSenSegSi1"))
                @foreach($errors->get("selSenSegSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSenSeg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSenSeg", Input::old("txtHalSenSeg"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSenSeg"))
                @foreach($errors->get("txtHalSenSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEleCump", "Todos los sistemas y equipos eléctricos cumplen a simple vista con normas de seguridad", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selEleCump" id="selEleCump">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEleCump"))
                @foreach($errors->get("selEleCump") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-7">
            {{ Form::label("txtDesEleCump", "Describa", array("class" => "control-label"))}}
            {{ Form::text("txtDesEleCump", Input::old("txtDesEleCump"), 
                array("class" => "form-control", "placeholder" => "Describa", "autocomplete" => "off"))}}
            @if($errors->has("txtDesEleCump"))
                @foreach($errors->get("txtDesEleCump") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDesPro", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDesPro", Input::old("txtHalDesPro"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDesPro"))
                @foreach($errors->get("txtHalDesPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPerExp", "Si la empresa usa explosivos cuenta con el permiso de la autoridad competente para el uso y manejo de explosivos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selPerExp" id="selPerExp">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selPerExp"))
                @foreach($errors->get("selPerExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPerCap", "Cuenta con personal capacitado y competente para su manejo", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selPerCap" id="selPerCap">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selPerCap"))
                @foreach($errors->get("selPerCap") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPerExp", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPerExp", Input::old("txtHalPerExp"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPerExp"))
                @foreach($errors->get("txtHalPerExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selDisEst", "La empresa cumple con las disposiciones establecidas para el uso y almacenamiento y transporte de explosivos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selDisEst" id="selDisEst">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selDisEst"))
                @foreach($errors->get("selDisEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDisEst", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDisEst", Input::old("txtHalDisEst"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDisEst"))
                @foreach($errors->get("txtHalDisEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selMedCom", "Es utilizado algun medio de comunicación y/o señal de comunicación en el cargue y descargue de material", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selMedCom" id="selMedCom">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selMedCom"))
                @foreach($errors->get("selMedCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMedCom", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMedCom", Input::old("txtHalMedCom"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMedCom"))
                @foreach($errors->get("txtHalMedCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selVia", "Las vías en donde circulan los medios de transporte son diferentes a las utilizadas para el recorrido peatonal", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selVia" id="selVia">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selVia"))
                @foreach($errors->get("selVia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalVia", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalVia", Input::old("txtHalVia"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalVia"))
                @foreach($errors->get("txtHalVia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selBueOrg", "La explotación tiene una buena organización con manejo de taludes, botaderos, aspectos locativos, manejo ambiental, metodo de explotacion, proyeccion minera adecuada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selBueOrg" id="selBueOrg">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selBueOrg"))
                @foreach($errors->get("selBueOrg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalBueOrg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalBueOrg", Input::old("txtHalBueOrg"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalBueOrg"))
                @foreach($errors->get("txtHalBueOrg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnZonDeli" id="btnZonDeli" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selZonDel1", "La zona de explotacion, de beneficio y/o transformacion se encuentran delimitadas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selZonDel1" id="selZonDel1">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selZonDel1"))
                @foreach($errors->get("selZonDel1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <select name="selZonDelSi1" id="selZonDelSi1">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selZonDelSi1"))
                @foreach($errors->get("selZonDelSi1") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalZonDel", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalZonDel", Input::old("txtHalZonDel"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalZonDel"))
                @foreach($errors->get("txtHalZonDel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selResPel", "Se generan residuos peligrosos producto del beneficio y/o transformacion del mineral", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selResPel" id="selResPel">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selResPel"))
                @foreach($errors->get("selResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selEvVer", "Se evidencian vertimientos", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selEvVer" id="selEvVer">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEvVer"))
                @foreach($errors->get("selEvVer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalResPel", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalResPel", Input::old("txtHalResPel"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalResPel"))
                @foreach($errors->get("txtHalResPel") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("seTraAl", "Se realizan trabajos en alturas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="seTraAl" id="seTraAl">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("seTraAl"))
                @foreach($errors->get("seTraAl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCapEpp", "Cuentan con la capacitación y los EPP necesarios para realizar esta labor", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selCapEpp" id="selCapEpp">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selCapEpp"))
                @foreach($errors->get("selCapEpp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTraAl", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTraAl", Input::old("txtHalTraAl"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTraAl"))
                @foreach($errors->get("txtHalTraAl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selExti", "La empresa cuenta con suficiente número de extintores para el control de un posible conato de incendio", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            <select name="selExti" id="selExti">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selExti"))
                @foreach($errors->get("selExti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalExti", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalExti", Input::old("txtHalExti"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalExti"))
                @foreach($errors->get("txtHalExti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Observaciones</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObsSiso", "Observaciones", array("class" => "control-label")) }}
            {{ Form::textarea("txtObsSiso", Input::old("txtObsSiso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsSiso"))
                @foreach($errors->get("txtObsSiso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
</div>
