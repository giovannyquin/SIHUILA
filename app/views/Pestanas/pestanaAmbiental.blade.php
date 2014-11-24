@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("JsJQuery")
    {{ HTML::script('js/FormMinas/FormMinas.js') }}
@stop
@section("SeccionTrabajo")
<div class="container-fluid">
    @foreach ($minas as $mina)
    <div class="row">{{$mina->nombre_mina}}</div>
    @endforeach
    @foreach ($detalle as $detalle)
    <div class="row">{{$detalle->num_placa_jur}}</div>
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
    {{ Form::open(array("url" => "pestanaAmbiental")) }}
    <p class="bg-primary text-center">Morfología de Talud</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMorfologia", "Morfología", array("class" => "control-label"))}}
            <select name="SelMorfologia" id="SelMorfologia">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMorfologia"))
                @foreach($errors->get("SelMorfologia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelPendiente", "Pendiente", array("class" => "control-label"))}}
            <select name="SelPendiente" id="SelPendiente">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelPendiente"))
                @foreach($errors->get("SelPendiente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelCategoria", "Categoria", array("class" => "control-label"))}}
            <select name="SelCategoria" id="SelCategoria">
                <option value="">Seleccione..</option>
            </select>
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
            {{ Form::textarea("txtObsMorfo", Input::old("txtObsMorfo"),
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
            <select name="SelRoca" id="SelRoca">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelRoca"))
                @foreach($errors->get("SelRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEst", "Estructura", array("class" => "control-label"))}}
            <select name="SelEst" id="SelEst">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelEst"))
                @foreach($errors->get("SelEst") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtLitologia", 'Litologia', array("class" => "control-label")) }}
            {{ Form::text("txtLitologia", Input::old("txtLitologia"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Litologia", "autocomplete" => "off")) }}
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
            <select name="SelFracturacion" id="SelFracturacion">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelFracturacion"))
                @foreach($errors->get("SelFracturacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMeteorizacion", "Meteorización", array("class" => "control-label"))}}
            <select name="SelMeteorizacion" id="SelMeteorizacion">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMeteorizacion"))
                @foreach($errors->get("SelMeteorizacion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-8">
            {{ Form::label("txtGsi", 'GSI', array("class" => "control-label")) }}
            {{ Form::text("txtGsi", Input::old("txtGsi"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Litologia", "autocomplete" => "off")) }}
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
            <select name="SelColuvion" id="SelColuvion">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelColuvion"))
                @foreach($errors->get("SelColuvion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelAluvial", "Aluvial", array("class" => "control-label"))}}
            <select name="SelAluvial" id="SelAluvial">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelAluvial"))
                @foreach($errors->get("SelAluvial") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRelleno", "Relleno", array("class" => "control-label"))}}
            <select name="SelRelleno" id="SelRelleno">
                <option value="">Seleccione..</option>
            </select>
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
    <p class="bg-primary text-center">Fenómenos de Remoción en Masa</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelErosion", "Erosión", array("class" => "control-label"))}}
            <select name="SelErosion" id="SelErosion">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelErosion"))
                @foreach($errors->get("SelErosion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovRoca", "Mov Roca", array("class" => "control-label"))}}
            <select name="SelMovRoca" id="SelMovRoca">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMovRoca"))
                @foreach($errors->get("SelMovRoca") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelMovSuelo", "Mov Suelo", array("class" => "control-label"))}}
            <select name="SelMovSuelo" id="SelMovSuelo">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMovSuelo"))
                @foreach($errors->get("SelMovSuelo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelEstilo", "Estilo", array("class" => "control-label"))}}
            <select name="SelEstilo" id="SelEstilo">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelEstilo"))
                @foreach($errors->get("SelEstilo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelActividad", "Actividad", array("class" => "control-label"))}}
            <select name="SelActividad" id="SelActividad">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelActividad"))
                @foreach($errors->get("SelActividad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{Form::label("SelRepet", "Secuencia de Repetición", array("class" => "control-label"))}}
            <select name="SelRepet" id="SelRepet">
                <option value="">Seleccione..</option>
            </select>
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
            {{ Form::text("txtAnchoM", Input::old("txtAnchoM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Ancho", "autocomplete" => "off")) }}
            @if($errors->has("txtAnchoM"))
                @foreach($errors->get("txtAnchoM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtLongitudM", 'Longitud', array("class" => "control-label")) }}
            {{ Form::text("txtLongitudM", Input::old("txtLongitudM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Longitud", "autocomplete" => "off")) }}
            @if($errors->has("txtLongitudM"))
                @foreach($errors->get("txtLongitudM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfundidadM", 'Profundidad', array("class" => "control-label")) }}
            {{ Form::text("txtProfundidadM", Input::old("txtProfundidadM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Profundidad", "autocomplete" => "off")) }}
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
            {{ Form::textarea("txtObservacionM", Input::old("txtObservacionM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Profundidad", "autocomplete" => "off")) }}
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
            {{ Form::text("txtDescCausaM", Input::old("txtDescCausaM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Descripción", "autocomplete" => "off")) }}
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
            {{ Form::text("txtInterM", Input::old("txtInterM"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "intercalada de arcillolitas y areniscas.", "autocomplete" => "off")) }}
            @if($errors->has("txtInterM"))
                @foreach($errors->get("txtInterM") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Condiciones de Agua</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelCondA", "Condiciones de Agua", array("class" => "control-label"))}}
            <select name="SelCondA" id="SelCondA">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelCondA"))
                @foreach($errors->get("SelCondA") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-success text-center">Estado de las Obras</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelAlcant", "Alcantarilla", array("class" => "control-label"))}}
            <select name="SelAlcant" id="SelAlcant">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelAlcant"))
                @foreach($errors->get("SelAlcant") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCuneta", "Cuneta", array("class" => "control-label"))}}
            <select name="SelCuneta" id="SelCuneta">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelCuneta"))
                @foreach($errors->get("SelCuneta") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelCanales", "Canales", array("class" => "control-label"))}}
            <select name="SelCanales" id="SelCanales">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelCanales"))
                @foreach($errors->get("SelCanales") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDrenes", "Drenes", array("class" => "control-label"))}}
            <select name="SelDrenes" id="SelDrenes">
                <option value="">Seleccione..</option>
            </select>
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
            <select name="SelEncole" id="SelEncole">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelEncole"))
                @foreach($errors->get("SelEncole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelDescole", "Descole", array("class" => "control-label"))}}
            <select name="SelDescole" id="SelDescole">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelDescole"))
                @foreach($errors->get("SelDescole") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::label("SelOtrosAgua", "Otros", array("class" => "control-label"))}}
            <select name="SelOtrosAgua" id="SelOtrosAgua">
                <option value="">Seleccione..</option>
            </select>
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
            <select name="SelHum" id="SelHum">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelHum"))
                @foreach($errors->get("SelHum") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Vegetación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelVege", "Vegetación", array("class" => "control-label"))}}
            <select name="SelVege" id="SelVege">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelVege"))
                @foreach($errors->get("SelVege") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelIncli", "Inclinación", array("class" => "control-label"))}}
            <select name="SelIncli" id="SelIncli">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("SelIncli"))
                @foreach($errors->get("SelIncli") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelAfectC", "Afectación Cobertura Vegetal", array("class" => "control-label"))}}
            <select name="SelAfectC" id="SelAfectC">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelAfectC"))
                @foreach($errors->get("SelAfectC") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionV", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionV", Input::old("txtObservacionV"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observación", "autocomplete" => "off")) }}
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
            {{Form::label("SelMuro", "Muro gaviones", array("class" => "control-label"))}}
            <select name="SelMuro" id="SelMuro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMuro"))
                @foreach($errors->get("SelMuro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroC", "Muro concreto", array("class" => "control-label"))}}
            <select name="SelMuroC" id="SelMuroC">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMuroC"))
                @foreach($errors->get("SelMuroC") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelMuroO", "Otro", array("class" => "control-label"))}}
            <select name="SelMuroO" id="SelMuroO">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelMuroO"))
                @foreach($errors->get("SelMuroO") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObservacionCon", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtObservacionCon", Input::old("txtObservacionCon"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observación", "autocomplete" => "off")) }}
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
            {{ Form::textarea("txtRecomendacionCon", Input::old("txtRecomendacionCon"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Recomendaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtRecomendacionCon"))
                @foreach($errors->get("txtRecomendacionCon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Otros Aspectos</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelActAnt", "Actividad Antrópica", array("class" => "control-label"))}}
            <select name="SelActAnt" id="SelActAnt">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelActAnt"))
                @foreach($errors->get("SelActAnt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{Form::label("SelEstViv", "Estado de las Viviendas", array("class" => "control-label"))}}
            <select name="SelEstViv" id="SelEstViv">
                <option value="">Seleccione..</option>
            </select>
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
            {{ Form::textarea("txtObservacionOtroA", Input::old("txtObservacionOtroA"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
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
            {{ Form::textarea("txtDescG", Input::old("txtDescG"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
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
            <select name="SelTipPro" id="SelTipPro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("SelTipPro"))
                @foreach($errors->get("SelTipPro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtElev", 'Elevación', array("class" => "control-label")) }}
            {{ Form::text("txtElev", Input::old("txtElev"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Elevación", "autocomplete" => "off")) }}
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
</div>
@stop