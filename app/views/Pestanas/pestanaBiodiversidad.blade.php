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
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="">{{ link_to("pestanaSiso/{$mina->id_mina}", "Siso") }}</li>
            <li class="active"><a href="#" data-toggle="tab">Biodiversidad</a></li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("url" => "pestanaBiodiversidad")) }}
    <p class="bg-primary text-center">Biodiversidad</p>
    <div class="row">
        <p class="text-center">Animales, plantas y árboles de Interés</p>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtNomCom", "Nombre Común", array("class" => "control-label")) }}
            {{ Form::text("txtNomCom", Input::old("txtNomCom"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Nombre común", "autocomplete" => "off")) }}
            @if($errors->has("txtNomCom"))
                @foreach($errors->get("txtNomCom") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtUso", "Úso que le damos", array("class" => "control-label")) }}
            {{ Form::text("txtUso", Input::old("txtUso"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Úso", "autocomplete" => "off")) }}
            @if($errors->has("txtUso"))
                @foreach($errors->get("txtUso") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtDonde", "Dónde lo encontramos", array("class" => "control-label")) }}
            {{ Form::text("txtDonde", Input::old("txtDonde"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Dónde", "autocomplete" => "off")) }}
            @if($errors->has("txtDonde"))
                @foreach($errors->get("txtDonde") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtNomComDes", "Nombre Común de las desaparecidas", array("class" => "control-label")) }}
            {{ Form::text("txtNomComDes", Input::old("txtNomComDes"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Nombre común", "autocomplete" => "off")) }}
            @if($errors->has("txtNomComDes"))
                @foreach($errors->get("txtNomComDes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtUsoD", "Úso que le dabamos", array("class" => "control-label")) }}
            {{ Form::text("txtUsoD", Input::old("txtUsoD"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Úso", "autocomplete" => "off")) }}
            @if($errors->has("txtUsoD"))
                @foreach($errors->get("txtUsoD") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtDondeL", "Dónde lo encontrabamos", array("class" => "control-label")) }}
            {{ Form::text("txtDondeL", Input::old("txtDondeL"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Dónde", "autocomplete" => "off")) }}
            @if($errors->has("txtDondeL"))
                @foreach($errors->get("txtDondeL") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
</div>
@stop