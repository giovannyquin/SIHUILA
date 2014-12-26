@extends("SbAdmin.index")
@foreach ($mina as $mina)
@endforeach
@section("Titulo")
    Aspectos Siso Subterráneo
@stop

@section("NombrePagina")
    {{ link_to("ListarFrentes/{$mina->id_minamina}", $mina->nombre_mina) }} / Aspectos Siso Subterráneo
@stop

@section("SeccionTrabajo")
<div class="container-fluid">
    
    @foreach ($detalle as $detalle)
    <div class="row">{{$detalle->num_placa_jur}}</div>
    @endforeach
    @foreach ($siso as $siso)
    @endforeach
    
    <div class="tabbable" style="margin-bottom: 18px;">
          <ul class="nav nav-tabs">
            <li class="">{{ link_to("pestanaMinero/{$mina->id_mina}", "Minero") }}</li>
            <li class="">{{ link_to("pestanaAmbiental/{$mina->id_mina}", "Ambiental") }}</li>
            <li class="active"><a href="#" data-toggle="tab">Siso</a></li>
            <li class="">{{ link_to("pestanaGeologica/{$mina->id_mina}", "Geologico") }}</li>
          </ul>
    </div>
</div>
<div class="marketing">
    {{ Form::open(array("url" => "pestanaSiso")) }}
    <p class="bg-primary text-center">Información Laboral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMenor", "Número de Menores de Edad", array("class" => "control-label")) }}
            {{ Form::text("txtMenor", Input::old("txtMenor", object_get($siso,'num_menores')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Menores de Edad", "autocomplete" => "off")) }}
            @if($errors->has("txtMenor"))
                @foreach($errors->get("txtMenor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtMujeres", "Número de Mujeres", array("class" => "control-label")) }}
            {{ Form::text("txtMujeres", Input::old("txtMujeres", object_get($siso,'num_mujeres')),
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
    <div class="row" id='divSegSoc'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-7">
                {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSeg[]",$arrTipSegSoc,null )}}
                @if($errors->has("selSeg[]"))
                    @foreach($errors->get("selSeg[]") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSegSi[]",$arrSiNo,isset($seleccion_multiple->resultado) ? $seleccion_multiple->resultado:null )}}
                @if($errors->has("selSegSi[]"))
                    @foreach($errors->get("selSegSi[]") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
        </div>

        @foreach($arrSegSoc as $segsoc)           
            <div class="row container">
                <div class="form-group form-group-sm col-xs-12 col-sm-7">
                    {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-2">
                    {{Form::select("selSeg[]", $arrTipSegSoc, isset($segsoc['id_topologia']) ? $segsoc['id_topologia'] : null )}}
                    @if($errors->has("selSeg[]"))
                        @foreach($errors->get("selSeg[]") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-2">
                    {{Form::select("selSegSi[]", $arrSiNo, isset($segsoc['resultado']) ? $segsoc['resultado'] : null )}}
                    @if($errors->has("selSegSi[]"))
                        @foreach($errors->get("selSegSi[]") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    @endif
                </div>
                <a href="{{route('seleccionMultipleElim',array($segsoc['id_mina'],$segsoc['id_topologia'],'Pago Seg Social','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAccLab", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAccLab", Input::old("txtHalAccLab", object_get($siso,'hall_acc_lab')),
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
            {{ Form::label("selAccLab","Han ocurrido accidentes laborales", array("class" => "control-label")) }}
            {{Form::select("selAccLab",$arrSiNo,isset($siso['acci_laboral']) ? $siso['acci_laboral'] : null )}}
            @if($errors->has("selAccLab"))
                @foreach($errors->get("selAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtAccLab", "Cuantos Accidentes", array("class" => "control-label")) }}
            {{ Form::text("txtAccLab",Input::old('txtAccLab', object_get($siso,'num_acc')),array('class'=>'form-control col-xs-12 col-sm-3','placeholder'=>'Litologia','autocomplete'=>'off')) }}
            @if($errors->has("txtAccLab"))
                @foreach($errors->get("txtAccLab") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selRepAccLab", "Se Han reportado", array("class" => "control-label")) }}
            {{Form::select("selRepAccLab",$arrSiNo,isset($siso['report_acc']) ? $siso['report_acc'] : null )}}
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
            <input type="button" name="btnEleSeg" id="btnEleSeg" class="btn btn-warning btn-xs" value="Agregar Campo">
    		</div>
    </div>    
    <div class="row" id='divEleSeg'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                            {{ Form::label("selElBas[]", "La empresa cuenta con elementos básicos para atención de emergencias", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                            {{Form::select("selElBas[]",$arrTipEleEme,null )}}
                            @if($errors->has("selElBas[]"))
                                            @foreach($errors->get("selElBas[]") as $error)
                                                    <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                            @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                            {{Form::select("selEleBasSi[]",$arrSiNo,null )}}
                            @if($errors->has("selEleBasSi[]"))
                                            @foreach($errors->get("selEleBasSi[]") as $error)
                                                    <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                            @endif
            </div>
        </div>
    </div>
    @foreach($arrEleEme as $arreleeme)           
        <div class="row">
                <div class="form-group form-group-sm col-xs-12 col-sm-6">
                                {{ Form::label("selElBas[]","La empresa cuenta con elementos básicos para atención de emergencias",array("class" => "control-label")) }}
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-3">
                                {{Form::select("selElBas[]",$arrTipEleEme,isset($arreleeme['id_topologia']) ? $arreleeme['id_topologia'] : null )}}
                                @if($errors->has("selElBas[]"))
                                                @foreach($errors->get("selElBas[]") as $error)
                                                        <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                                @endforeach
                                @endif
                </div>
                <div class="form-group form-group-sm col-xs-12 col-sm-2">
                                {{Form::select("selEleBasSi[]", $arrSiNo, isset($arreleeme['resultado']) ? $arreleeme['resultado'] : null )}}
                                @if($errors->has("selEleBasSi[]"))
                                                @foreach($errors->get("selEleBasSi[]") as $error)
                                                        <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                                @endforeach
                                @endif
                </div>
                        <a href="{{route('seleccionMultipleElim',array($arreleeme['id_mina'],$arreleeme['id_topologia'],'Elementos de Emergencia','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
        </div>
    @endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEleBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEleBas", Input::old("txtHalEleBas", object_get($siso,'hall_elem_basico')),
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
            {{Form::select("selBrig",$arrSiNo,isset($siso['brigadista']) ? $siso['brigadista'] : null )}}
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
            {{ Form::textarea("txtHalBrig", Input::old("txtHalBrig", object_get($siso,'hall_brigdaista')),
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
            {{ Form::label("selRegHig", "La empresa cuenta con un reglamento de higiene y seguridad industrial publicado, programa de gestión de la seguridad y/o Programa de Salud Ocupacional", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selRegHig",$arrSiNo,isset($siso['reg_pub']) ? $siso['reg_pub'] : null )}}
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
            {{ Form::textarea("txtHalRegHig", Input::old("txtHalRegHig", object_get($siso,'hall_reglamento_igiene')),
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
            {{Form::select("selCopaso",$arrSiNo,isset($siso['copaso']) ? $siso['copaso'] : null )}}
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
            {{ Form::textarea("txtCopaso", Input::old("txtCopaso", object_get($siso,'hall_copaso')),
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
            {{ Form::label("selSenal", "Se evidencia  señalización en la empresa", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenal",$arrSiNo,isset($siso['segnal']) ? $siso['segnal'] : null )}}
            @if($errors->has("selSenal"))
                @foreach($errors->get("selSenal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtSenal", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtSenal", Input::old("txtSenal", object_get($siso,'hall_senalizacion')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtSenal"))
                @foreach($errors->get("txtSenal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          <input type="button" name="btnElePro" id="btnElePro" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row" id='divElePro'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                {{ Form::label("selBotProt[]", "Se evidencia uso de elementos de protección personal EPP por parte de los trabajadores", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selBotProt[]",$arrTipElePro,null )}}
                @if($errors->has("selBotProt[]"))
                    @foreach($errors->get("selBotProt[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selProtSi[]",$arrSiNo,null )}}
                @if($errors->has("selProtSi[]"))
                    @foreach($errors->get("selProtSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @foreach($arrElePro as $arrelepro)           
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                {{ Form::label("selBotProt[]", "Se evidencia uso de elementos de protección personal EPP por parte de los trabajadores", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selBotProt[]",$arrTipElePro,isset($arrelepro['id_topologia']) ? $arrelepro['id_topologia'] : null )}}
                @if($errors->has("selBotProt[]"))
                    @foreach($errors->get("selBotProt[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selProtSi[]", $arrSiNo, isset($arrelepro['resultado']) ? $arrelepro['resultado'] : null )}}
                @if($errors->has("selProtSi[]"))
                    @foreach($errors->get("selProtSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <a href="{{route('seleccionMultipleElim',array($arrelepro['id_mina'],$arrelepro['id_topologia'],'Elementos de Proteccion','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
        </div>
    @endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProt", Input::old("txtHalProt", object_get($siso,'hall_prot_epp')),
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
          <input type="button" name="btnSumElePro" id="btnSumElePro" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>    
    <div class="row" id='divSumElePro'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                {{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selProtSop[]",$arrTipElePro,null )}}
                @if($errors->has("selProtSop[]"))
                    @foreach($errors->get("selProtSop[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selProtSopSi[]",$arrSiNo,null )}}
                @if($errors->has("selProtSopSi[]"))
                    @foreach($errors->get("selProtSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @foreach($arrSumElePro as $arrsumelepro)           
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                {{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selProtSop[]",$arrTipElePro,isset($arrsumelepro['id_topologia']) ? $arrsumelepro['id_topologia'] : null )}}
                @if($errors->has("selProtSop[]"))
                    @foreach($errors->get("selProtSop[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div> 
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selProtSopSi[]",$arrSiNo, isset($arrsumelepro['resultado']) ? $arrsumelepro['resultado'] : null )}}
                @if($errors->has("selProtSopSi[]"))
                    @foreach($errors->get("selProtSopSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <a href="{{route('seleccionMultipleElim',array($arrsumelepro['id_mina'],$arrsumelepro['id_topologia'],'Suministra Elementos de Proteccion','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
        </div>
    @endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalProtSop", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalProtSop", Input::old("txtHalProtSop", object_get($siso,'hall_sumin_elem_prot')),
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
            {{Form::select("selInsSan",$arrSiNo, isset($siso['inst_san']) ? $siso['inst_san'] : null )}}
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
            {{ Form::textarea("txtHalInsSan", Input::old("txtHalInsSan", object_get($siso,'hall_inst_sanitaria')),
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
            {{Form::select("selPozSep",$arrSiNo, isset($siso['pozo_sep']) ? $siso['pozo_sep'] : null )}}
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
            {{ Form::textarea("txtHalPozSep", Input::old("txtHalPozSep", object_get($siso,'hall_pozo_septico')),
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
    <div class="row" id='divSerBas'>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                {{ Form::label("selSerBas[]", "La empresa cuenta con servicios básicos", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selSerBas[]",$arrTipSerBas,null )}}
                @if($errors->has("selSerBas[]"))
                    @foreach($errors->get("selSerBas[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selSerBasSi[]",$arrSiNo,null )}}
                @if($errors->has("selSerBasSi[]"))
                    @foreach($errors->get("selSerBasSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @foreach($arrSerBas as $arrserbas)           
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-6">
                            {{ Form::label("selSerBas[]", "La empresa cuenta con servicios básicos", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{Form::select("selSerBas[]",$arrTipSerBas,isset($arrserbas['id_topologia']) ? $arrserbas['id_topologia'] : null )}}
                @if($errors->has("selSerBas[]"))
                    @foreach($errors->get("selSerBas[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSerBasSi[]",$arrSiNo, isset($arrserbas['resultado']) ? $arrserbas['resultado'] : null )}}
                @if($errors->has("selSerBasSi[]"))
                    @foreach($errors->get("selSerBasSi[]") as $error)
                            <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <a href="{{route('seleccionMultipleElim',array($arrserbas['id_mina'],$arrserbas['id_topologia'],'Servicios Basicos','PestanaSisoController')) }}" data-method="delete" rel="nofollow" class="btn btn-danger btn-xs">&times;</a>
        </div>
    @endforeach


    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSerBas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSerBas", Input::old("txtHalSerBas", object_get($siso,'hall_servico_basico')),
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
            {{ Form::label("selCasino", "A nivel patio se evidencia campamento, restaurante y/o casino", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCasino",$arrSiNo, isset($siso['campamento']) ? $siso['campamento'] : null )}}
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
            {{ Form::textarea("txtHalCasino", Input::old("txtHalCasino", object_get($siso,'hall_campamento')),
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
            {{ Form::label("selAseo", "A nivel patio se observa  orden y aseo", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAseo",$arrSiNo, isset($siso['orden']) ? $siso['orden'] : null )}}
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
            {{ Form::textarea("txtHalAseo", Input::old("txtHalAseo", object_get($siso,'hall_aseo')),
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
            {{ Form::label("selCtrlAcc", "Se prohibe el ingreso a particulares", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCtrlAcc",$arrSiNo, isset($siso['control_visitantes']) ? $siso['control_visitantes'] : null )}}
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
            {{ Form::textarea("txtHalCtrlAcc", Input::old("txtHalCtrlAcc", object_get($siso,'hall_control_acceso')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCtrlAcc"))
                @foreach($errors->get("txtHalCtrlAcc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Condiciones de Ingreso</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selIngInc", "El ingreso a la mina se realiza caminando por un inclinado", array("class" => "control-label")) }}
            {{Form::select("selIngInc",$arrSiNo, isset($siso['ingreso_inclinado']) ? $siso['ingreso_inclinado'] : null )}}
            @if($errors->has("selIngInc"))
                @foreach($errors->get("selIngInc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMani", "Tiene Manilas", array("class" => "control-label")) }}
            {{Form::select("selMani",$arrSiNo, isset($siso['manila_inclinado']) ? $siso['manila_inclinado'] : null )}}
            @if($errors->has("selMani"))
                @foreach($errors->get("selMani") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEscPal", "Tiene Escaleras - pasos", array("class" => "control-label")) }}
            {{Form::select("selEscPal",$arrSiNo, isset($siso['escalera_inclinado']) ? $siso['escalera_inclinado'] : null )}}
            @if($errors->has("selEscPal"))
                @foreach($errors->get("selEscPal") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtOtroIncl", "Otro, cual", array("class" => "control-label")) }}
            {{ Form::text("txtOtroIncl", Input::old("txtOtroIncl", object_get($siso,'otro_inclinado')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Otro", "autocomplete" => "off")) }}
            @if($errors->has("txtOtroIncl"))
                @foreach($errors->get("txtOtroIncl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCondSegDesc", "Si el único acceso a la mina es por el sistema de transporte (malacate - vagoneta) presenta el sistema condiciones adecuadas de seguridad para el descenso del personal", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCondSegDesc",$arrSiNo, isset($siso['seguridad_descenso']) ? $siso['seguridad_descenso'] : null )}}
            @if($errors->has("selCondSegDesc"))
                @foreach($errors->get("selCondSegDesc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selNivOxig", "Los niveles de oxígeno al ingreso a la mina están por encima del 19%", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selNivOxig",$arrSiNo, isset($siso['nivel_oxigeno']) ? $siso['nivel_oxigeno'] : null )}}
            @if($errors->has("selNivOxig"))
                @foreach($errors->get("selNivOxig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("txtNivOxig", "Cuanto", array("class" => "control-label")) }}
            {{ Form::text("txtNivOxig", Input::old("txtNivOxig", object_get($siso,'num_nivel_oxigeno')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Cuanto", "autocomplete" => "off")) }}
            @if($errors->has("txtNivOxig"))
                @foreach($errors->get("txtNivOxig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalNivOxig", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalNivOxig", Input::old("txtHalNivOxig", object_get($siso,'hall_nivel_oxigeno')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalNivOxig"))
                @foreach($errors->get("txtHalNivOxig") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selConRiesgo", "Se aplican controles para reducir los riesgos en los trabajadores", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selConRiesgo",$arrSiNo, isset($siso['control_riesgo_trab']) ? $siso['control_riesgo_trab'] : null )}}
            @if($errors->has("selConRiesgo"))
                @foreach($errors->get("selConRiesgo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalConRiesgo", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalConRiesgo", Input::old("txtHalConRiesgo", object_get($siso,'hall_control_riesgo_trab')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalConRiesgo"))
                @foreach($errors->get("txtHalConRiesgo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Ventilación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPlanAct", "La empresa cuenta con planos actualizados de la mina", array("class" => "control-label")) }}
            {{Form::select("selPlanAct",$arrSiNo, isset($siso['plano_actual']) ? $siso['plano_actual'] : null )}}
            @if($errors->has("selPlanAct"))
                @foreach($errors->get("selPlanAct") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selCirVent", "En el plano se define circuito de ventilacion", array("class" => "control-label")) }}
            {{Form::select("selCirVent",$arrSiNo, isset($siso['circuito_vent']) ? $siso['circuito_vent'] : null )}}
            @if($errors->has("selCirVent"))
                @foreach($errors->get("selCirVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPlanAct", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPlanAct", Input::old("txtHalPlanAct", object_get($siso,'hall_plano_act')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPlanAct"))
                @foreach($errors->get("txtHalPlanAct") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selTipoVent", "Qué tipo de ventilacion emplea", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selTipoVent",$arrTipoVent, isset($siso['tipo_ventilacion']) ? $siso['tipo_ventilacion'] : null )}}
            @if($errors->has("selTipoVent"))
                @foreach($errors->get("selTipoVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTipoVent", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTipoVent", Input::old("txtHalTipoVent", object_get($siso,'hall_tipo_ventilacion')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTipoVent"))
                @foreach($errors->get("txtHalTipoVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selFugaVent", "El ducto de ventilación presenta fugas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selFugaVent",$arrSiNo, isset($siso['fuga_ventilacion']) ? $siso['fuga_ventilacion'] : null )}}
            @if($errors->has("selFugaVent"))
                @foreach($errors->get("selFugaVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalFugaVent", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalFugaVent", Input::old("txtHalFugaVent", object_get($siso,'hall_fuga_ventilacion')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalFugaVent"))
                @foreach($errors->get("txtHalFugaVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selLabAnt", "Existen labores antiguas o abandonadas", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selLabAnt",$arrSiNo, isset($siso['labores_antiguas']) ? $siso['labores_antiguas'] : null )}}
            @if($errors->has("selLabAnt"))
                @foreach($errors->get("selLabAnt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalLabAnt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalLabAnt", Input::old("txtHalLabAnt", object_get($siso,'hall_labores_antiguas')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalLabAnt"))
                @foreach($errors->get("txtHalLabAnt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selLabSen", "Si hay labores antiguas o abandonadas, estan señalizadas o selladas hermeticamente", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selLabSen",$arrSiNo, isset($siso['labores_senalizadas']) ? $siso['labores_senalizadas'] : null )}}
            @if($errors->has("selLabSen"))
                @foreach($errors->get("selLabSen") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalLabSen", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalLabSen", Input::old("txtHalLabSen", object_get($siso,'hall_labores_senalizadas')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalLabSen"))
                @foreach($errors->get("txtHalLabSen") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSupVent", "Se realiza supervisión de la ventilación de todas las labores subterráneas", array("class" => "control-label")) }}
            {{Form::select("selSupVent",$arrSiNo, isset($siso['superv_ventilacion']) ? $siso['superv_ventilacion'] : null )}}
            @if($errors->has("selSupVent"))
                @foreach($errors->get("selSupVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("txtFrecSup", "Con qué frecuencia", array("class" => "control-label")) }}
            {{ Form::text("txtFrecSup", Input::old("txtFrecSup", object_get($siso,'frecuencia_superv')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Frecuencia", "autocomplete" => "off")) }}
            @if($errors->has("txtFrecSup"))
                @foreach($errors->get("txtFrecSup") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSupVent", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSupVent", Input::old("txtHalSupVent", object_get($siso,'hall_superv_ventilacion')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSupVent"))
                @foreach($errors->get("txtHalSupVent") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selEntSalCir", "Cuenta con entrada y salida independiente el circuito de ventilación", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selEntSalCir",$arrSiNo, isset($siso['ent_salida_indep']) ? $siso['ent_salida_indep'] : null )}}
            @if($errors->has("selEntSalCir"))
                @foreach($errors->get("selEntSalCir") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEntSalCir", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEntSalCir", Input::old("txtHalEntSalCir", object_get($siso,'hall_ent_salida_indep')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEntSalCir"))
                @foreach($errors->get("txtHalEntSalCir") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selAseExt", "Cuenta la empresa con asesoría externa calificada", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selAseExt",$arrSiNo, isset($siso['asesoria_externa']) ? $siso['asesoria_externa'] : null )}}
            @if($errors->has("selAseExt"))
                @foreach($errors->get("selAseExt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalAseExt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalAseExt", Input::old("txtHalAseExt", object_get($siso,'hall_asesoria_externa')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalAseExt"))
                @foreach($errors->get("txtHalAseExt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Atmósfera Minera</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <input type="button" name="btnMedGas" id="btnMedGas" class="btn btn-warning btn-xs" value="Agregar Campo">
        </div>
    </div>
    <div class="row" id="divMedGas">
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{ Form::label("selGas[]", "Gas", array("class" => "control-label")) }}
            {{Form::select("selGas[]",$arrTipGas, null )}}
            @if($errors->has("selGas[]"))
                @foreach($errors->get("selGas[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{ Form::label("txt1Lec[]", "1 Lectura", array("class" => "control-label")) }}
            {{ Form::textarea("txt1Lec[]", Input::old("txt1Lec[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Lectura", "autocomplete" => "off")) }}
            @if($errors->has("txt1Lec[]"))
                @foreach($errors->get("txt1Lec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txt1Labor[]", "labor", array("class" => "control-label")) }}
            {{ Form::textarea("txt1Labor[]", Input::old("txt1Labor[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Labor", "autocomplete" => "off")) }}
            @if($errors->has("txt1Labor[]"))
                @foreach($errors->get("txt1Labor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{ Form::label("txt2Lec[]", "2 Lectura", array("class" => "control-label")) }}
            {{ Form::textarea("txt2Lec[]", Input::old("txt2Lec[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Lectura", "autocomplete" => "off")) }}
            @if($errors->has("txt2Lec[]"))
                @foreach($errors->get("txt2Lec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txt2Labor[]", "labor", array("class" => "control-label")) }}
            {{ Form::textarea("txt2Labor[]", Input::old("txt2Labor[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Labor", "autocomplete" => "off")) }}
            @if($errors->has("txt2Labor[]"))
                @foreach($errors->get("txt2Labor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-1">
            {{ Form::label("txt3Lec[]", "3 Lectura", array("class" => "control-label")) }}
            {{ Form::textarea("txt3Lec[]", Input::old("txt3Lec[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Lectura", "autocomplete" => "off")) }}
            @if($errors->has("txt3Lec[]"))
                @foreach($errors->get("txt3Lec[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txt3Labor[]", "labor", array("class" => "control-label")) }}
            {{ Form::textarea("txt3Labor[]", Input::old("txt2Labor[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Labor", "autocomplete" => "off")) }}
            @if($errors->has("txt3Labor[]"))
                @foreach($errors->get("txt3Labor[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtSupVlp[]", "Supera Vlp", array("class" => "control-label")) }}
            {{ Form::textarea("txtSupVlp[]", Input::old("txtSupVlp[]"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Supera", "autocomplete" => "off")) }}
            @if($errors->has("txtSupVlp[]"))
                @foreach($errors->get("txtSupVlp[]") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selNivOxiCirc", "Los niveles de oxígenos están por encima del 19% en lugares donde hay circulación de personal", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selNivOxiCirc",$arrSiNo, isset($siso['nivel_oxi_perso']) ? $siso['nivel_oxi_perso'] : null )}}
            @if($errors->has("selNivOxiCirc"))
                @foreach($errors->get("selNivOxiCirc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalNivOxiCirc", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalNivOxiCirc", Input::old("txtHalNivOxiCirc", object_get($siso,'hall_nivel_oxig_circula')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalNivOxiCirc"))
                @foreach($errors->get("txtHalNivOxiCirc") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selMultiGas", "La empresa cuenta con multidetector de gases", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selMultiGas",$arrSiNo, isset($siso['multidetector_gas']) ? $siso['multidetector_gas'] : null )}}
            @if($errors->has("selMultiGas"))
                @foreach($errors->get("selMultiGas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMultiGas", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMultiGas", Input::old("txtHalMultiGas", object_get($siso,'hall_multidetector_gas')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMultiGas"))
                @foreach($errors->get("txtHalMultiGas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selTabCtril", "Cuenta con tablero de control de gases y se evidencia su diligenciamiento", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selTabCtril",$arrSiNo, isset($siso['tablero_control']) ? $siso['tablero_control'] : null )}}
            @if($errors->has("selTabCtril"))
                @foreach($errors->get("selTabCtril") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTabCtrl", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTabCtrl", Input::old("txtHalTabCtrl", object_get($siso,'hall_tablero_control')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTabCtrl"))
                @foreach($errors->get("txtHalTabCtrl") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Sostenimiento</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selSosArt", "La empresa utiliza sostenimiento artificial", array("class" => "control-label")) }}
            {{Form::select("selSosArt",$arrSiNo, isset($siso['sostenimiento_artificial']) ? $siso['sostenimiento_artificial'] : null )}}
            @if($errors->has("selSosArt"))
                @foreach($errors->get("selSosArt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCualSos", "Cual", array("class" => "control-label")) }}
            {{ Form::text("txtCualSos", Input::old("txtCualSos", object_get($siso,'cual_sostenimiento')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Cual", "autocomplete" => "off")) }}
            @if($errors->has("txtCualSos"))
                @foreach($errors->get("txtCualSos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtMatSos", "En qué material", array("class" => "control-label")) }}
            {{ Form::text("txtMatSos", Input::old("txtMatSos", object_get($siso,'material_sostenimiento')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Material", "autocomplete" => "off")) }}
            @if($errors->has("txtMatSos"))
                @foreach($errors->get("txtMatSos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalsosArt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalsosArt", Input::old("txtHalsosArt", object_get($siso,'hall_sostenimiento_artificial')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalsosArt"))
                @foreach($errors->get("txtHalsosArt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selSupSos", "La empresa realiza supervision y mantenimiento del sistema de sostenimiento", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSupSos",$arrSiNo, isset($siso['supervision_sostenimiento']) ? $siso['supervision_sostenimiento'] : null )}}
            @if($errors->has("selSupSos"))
                @foreach($errors->get("selSupSos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSupSos", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSupSos", Input::old("txtHalSupSos", object_get($siso,'hall_supervision_sostenimiento')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSupSos"))
                @foreach($errors->get("txtHalSupSos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selTecProv", "La empresa aplica técnicas provisionales de sostenimiento en los frente de explotación (canastas, tacos)", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selTecProv",$arrSiNo, isset($siso['tecnicas_provisionales']) ? $siso['tecnicas_provisionales'] : null )}}
            @if($errors->has("selTecProv"))
                @foreach($errors->get("selTecProv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTecProv", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTecProv", Input::old("txtHalTecProv", object_get($siso,'hall_tecnicas_prov')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTecProv"))
                @foreach($errors->get("txtHalTecProv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Seguridad Minera</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selMetEtD", "Se observa algun metodo de explotacion definido", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selMetEtD",$arrSiNo, isset($siso['metodo_et_definido']) ? $siso['metodo_et_definido'] : null )}}
            @if($errors->has("selMetEtD"))
                @foreach($errors->get("selMetEtD") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMetEtD", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMetEtD", Input::old("txtHalMetEtD", object_get($siso,'hall_metodo_et_defin')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMetEtD"))
                @foreach($errors->get("txtHalMetEtD") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selSenInt", "En el interior de la mina se observa  señalización instalada , informativa, preventiva y de seguridad . Refléctiva y/o fluorescente y/o luminosa.", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selSenInt",$arrSiNo, isset($siso['senalizacion_interior']) ? $siso['senalizacion_interior'] : null )}}
            @if($errors->has("selSenInt"))
                @foreach($errors->get("selSenInt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalSenInt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalSenInt", Input::old("txtHalSenInt", object_get($siso,'hall_senalizacion_interior')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalSenInt"))
                @foreach($errors->get("txtHalSenInt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selEqSeg", "Todos los sistemas y equipos eléctricos a simple vista tienen especfificaciones de seguridad", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selEqSeg",$arrSiNo, isset($siso['equipo_esp_seguridad']) ? $siso['equipo_esp_seguridad'] : null )}}
            @if($errors->has("selEqSeg"))
                @foreach($errors->get("selEqSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEqSeg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEqSeg", Input::old("txtHalEqSeg", object_get($siso,'hall_equipo_esp_seguridad')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEqSeg"))
                @foreach($errors->get("txtHalEqSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selEqComb", "Son utilizados equipos de bombeo u otros que funcionen con combustible en el interior de la mina", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selEqComb",$arrSiNo, isset($siso['equipo_func_comb']) ? $siso['equipo_func_comb'] : null )}}
            @if($errors->has("selEqComb"))
                @foreach($errors->get("selEqComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalEqComb", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalEqComb", Input::old("txtHalEqComb", object_get($siso,'hall_equipo_func_comb')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalEqComb"))
                @foreach($errors->get("txtHalEqComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selDispTra", "La empresa cumple con las disposiciones establecidas para el transporte en labores subterráneas en el Decreto 1335 de 1987, o aquella norma que lo modifique o derogue.", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selDispTra",$arrSiNo, isset($siso['trans_subt_norma']) ? $siso['trans_subt_norma'] : null )}}
            @if($errors->has("selDispTra"))
                @foreach($errors->get("selDispTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalDispTra", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalDispTra", Input::old("txtHalDispTra", object_get($siso,'hall_trans_subt_norma')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalDispTra"))
                @foreach($errors->get("txtHalDispTra") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selPermExp", "Si la empresa usa explosivos cuanta con permiso de la autoridad competente", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selPermExp",$arrSiNo, isset($siso['permiso_explo']) ? $siso['permiso_explo'] : null )}}
            @if($errors->has("selPermExp"))
                @foreach($errors->get("selPermExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPermExp", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPermExp", Input::old("txtHalPermExp", object_get($siso,'hall_trans_subt_norma')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPermExp"))
                @foreach($errors->get("txtHalPermExp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("selPolv", "La  empresa cuenta con polvorines", array("class" => "control-label")) }}
            {{Form::select("selPolv",$arrSiNo, isset($siso['polvorines']) ? $siso['polvorines'] : null )}}
            @if($errors->has("selPolv"))
                @foreach($errors->get("selPolv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("txtLugPol", "Dónde", array("class" => "control-label")) }}
            {{ Form::text("txtLugPol", Input::old("txtLugPol", object_get($siso,'hall_trans_subt_norma')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Lugar", "autocomplete" => "off")) }}
            @if($errors->has("txtLugPol"))
                @foreach($errors->get("txtLugPol") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalPolv", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalPolv", Input::old("txtHalPolv", object_get($siso,'hall_polvorines')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalPolv"))
                @foreach($errors->get("txtHalPolv") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selMedComu", "La empresa cuenta con un medio de comunicación entre el punto de operación del malacate y los puntos de cargue y descargue de las vagonetas.", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selMedComu",$arrSiNo, isset($siso['medio_comu']) ? $siso['medio_comu'] : null )}}
            @if($errors->has("selMedComu"))
                @foreach($errors->get("selMedComu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMedComu", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMedComu", Input::old("txtHalMedComu", object_get($siso,'hall_medio_comu')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMedComu"))
                @foreach($errors->get("txtHalMedComu") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selNicNor", "Las vias en donde circulan vagonetas y personal cuentan con nichos de resguardos en cumplimiento con la norma.", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selNicNor",$arrSiNo, isset($siso['nichos_norma']) ? $siso['nichos_norma'] : null )}}
            @if($errors->has("selNicNor"))
                @foreach($errors->get("selNicNor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalNicNor", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalNicNor", Input::old("txtHalNicNor", object_get($siso,'hall_nichos_norma')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalNicNor"))
                @foreach($errors->get("txtHalNicNor") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selVago", "Las vagonetas utilizadas por la empresa cuentan con un sistema de seguridad que evite que este se desboque ante una ruptura intempestiva del cable", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selVago",$arrSiNo, isset($siso['vagonetas_segur']) ? $siso['vagonetas_segur'] : null )}}
            @if($errors->has("selVago"))
                @foreach($errors->get("selVago") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalVago", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalVago", Input::old("txtHalNicNor", object_get($siso,'hall_vagonetas_segur')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalVago"))
                @foreach($errors->get("txtHalVago") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selCabEmp", "Se realiza inspección del cable empleado", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selCabEmp",$arrSiNo, isset($siso['inspecc_cable']) ? $siso['inspecc_cable'] : null )}}
            @if($errors->has("selCabEmp"))
                @foreach($errors->get("selCabEmp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalCabEmp", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalCabEmp", Input::old("txtHalCabEmp", object_get($siso,'hall_inspecc_cable')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalCabEmp"))
                @foreach($errors->get("txtHalCabEmp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selTraAlt", "Los trabajadores que realizan trabajos en alturas (tolva, rumbones) cuentan con la capacitacióny los EPP necesarios para realizar esta labor", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selTraAlt",$arrSiNo, isset($siso['trabajos_alturas']) ? $siso['trabajos_alturas'] : null )}}
            @if($errors->has("selTraAlt"))
                @foreach($errors->get("selTraAlt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalTraAlt", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalTraAlt", Input::old("txtHalTraAlt", object_get($siso,'hall_trab_alturas')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalTraAlt"))
                @foreach($errors->get("txtHalTraAlt") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("selMalaSeg", " El malacate cuenta con guarda de seguridad en los sistemas de transmisión de fuerza y tambor de arrollamiento de cable", array("class" => "control-label")) }}
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{Form::select("selMalaSeg",$arrSiNo, isset($siso['malacate_segur']) ? $siso['malacate_segur'] : null )}}
            @if($errors->has("selMalaSeg"))
                @foreach($errors->get("selMalaSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtHalMalaSeg", "Hallazgos", array("class" => "control-label")) }}
            {{ Form::textarea("txtHalMalaSeg", Input::old("txtHalMalaSeg", object_get($siso,'hall_malacate_segur')),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Hallazgos", "autocomplete" => "off")) }}
            @if($errors->has("txtHalMalaSeg"))
                @foreach($errors->get("txtHalMalaSeg") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary text-center">Observaciones</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-12">
            {{ Form::label("txtObsSiso", "Observaciones", array("class" => "control-label")) }}
            {{ Form::textarea("txtObsSiso", Input::old("txtObsSiso", object_get($siso,'observaciones')),
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
    {{ Form::hidden("hidMina",$mina->id_mina) }}
    {{Form::close()}}
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
<script>
		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor1      = $("#divSegSoc"); //ID del contenedor
		var AddButton       = $("#btnSegSoc"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSegSoc div").length + 1;
    $("#btnSegSoc").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-7">'+  
											'{{ Form::label("selSeg[]", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
													'{{Form::select("selSeg[]",$arrTipSegSoc,null )}}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
													'{{Form::select("selSegSi[]",$arrSiNo,isset($seleccion_multiple->resultado) ? $seleccion_multiple->resultado:null )}}'+ 
											'</div><a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor1).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor2      = $("#divEleSeg"); //ID del contenedor
		var AddButton       = $("#btnEleSeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divEleSeg div").length + 1;
    $("#btnEleSeg").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
												'{{ Form::label("selElBas1", "La empresa cuenta con elementos basicos para atencion de emergencias", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
												'{{Form::select("selElBas[]",$arrTipEleEme,null )}}'+
												'@if($errors->has("selElBas[]"))'+
													'@foreach($errors->get("selElBas[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
												'{{Form::select("selEleBasSi[]",$arrSiNo,null )}}'+
												'@if($errors->has("selEleBasSi[]"))'+
													'@foreach($errors->get("selEleBasSi[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor2).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor3      = $("#divElePro"); //ID del contenedor
		var AddButton       = $("#btnElePro"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divElePro div").length + 1;
    $("#btnElePro").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
											'{{ Form::label("selBotProt[]", "Se evidencia uso de elementos de proteccion personal EPP por parte de los trabajadores", array("class" => "control-label")) }}'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
												'{{Form::select("selBotProt[]",$arrTipElePro,null )}}'+
												'@if($errors->has("selBotProt[]"))'+
													'@foreach($errors->get("selBotProt[]") as $error)'+
														'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
													'@endforeach'+
												'@endif'+
											'</div>'+
											'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
											'{{Form::select("selProtSi[]",$arrSiNo,null )}}'+
											'@if($errors->has("selProtSi[]"))'+
												'@foreach($errors->get("selProtSi[]") as $error)'+
													'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
												'@endforeach'+
											'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor3).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor4      = $("#divSumElePro"); //ID del contenedor
		var AddButton       = $("#btnSumElePro"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSumElePro div").length + 1;
    $("#btnSumElePro").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
										'{{ Form::label("selProtSop[]", "La empresa suministra a los trabajadores los elementos de protección personal necesarios y se evidencia soportes de entrega", array("class" => "control-label")) }}'+
										'</div>'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
										'{{Form::select("selProtSop[]",$arrTipElePro,null )}}'+
										'@if($errors->has("selProtSop[]"))'+
											'@foreach($errors->get("selProtSop[]") as $error)'+
												'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
											'@endforeach'+
										'@endif'+
									'</div>'+
									'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
										'{{Form::select("selProtSopSi[]",$arrSiNo,null )}}'+
										'@if($errors->has("selProtSopSi[]"))'+
											'@foreach($errors->get("selProtSopSi[]") as $error)'+
												'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
											'@endforeach'+
										'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor4).append(temporal);
			x++; //text box increment
			return false;
    });

		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor5      = $("#divSerBas"); //ID del contenedor
		var AddButton       = $("#btnSerBas"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSerBas div").length + 1;
    $("#btnSerBas").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
							'{{ Form::label("selSerBas[]", "La empresa cuenta servicios basicos", array("class" => "control-label")) }}'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
							'{{Form::select("selSerBas[]",$arrTipSerBas,null )}}'+
							'@if($errors->has("selSerBas[]"))'+
									'@foreach($errors->get("selSerBas[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
					'</div>'+
					'<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
							'{{Form::select("selSerBasSi[]",$arrSiNo,null )}}'+
							'@if($errors->has("selSerBasSi[]"))'+
									'@foreach($errors->get("selSerBasSi[]") as $error)'+
										'<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
									'@endforeach'+
							'@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor5).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor6      = $("#divAspBen"); //ID del contenedor
		var AddButton       = $("#btnAspBen"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divAspBen div").length + 1;
    $("#btnAspBen").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selAspBen[]", "En el proceso de beneficio y/o transformacion se evidencia alguno de los siguientes aspecto", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selAspBen[]",$arrTipAspBen,null )}}'+
            '@if($errors->has("selAspBen[]"))'+
                '@foreach($errors->get("selAspBen[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selAspBenSi[]",$arrSiNo )}}'+
            '@if($errors->has("selAspBenSi[]"))'+
                '@foreach($errors->get("selAspBenSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor6).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor7      = $("#divSenSeg"); //ID del contenedor
		var AddButton       = $("#btnSenSeg"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divSenSeg div").length + 1;
    $("#btnSenSeg").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selSenSeg[]", "La empresa tiene instalada señalización, informativa, preventiva y de seguridad en la zona de explotacion, beneficio y/o transformación", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selSenSeg[]",$arrTipExpBen,null )}}'+
            '@if($errors->has("selSenSeg[]"))'+
                '@foreach($errors->get("selSenSeg[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selSenSegSi[]",$arrSiNo )}}'+
            '@if($errors->has("selSenSegSi[]"))'+
                '@foreach($errors->get("selSenSegSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor7).append(temporal);
			x++; //text box increment
			return false;
    });


		var MaxInputs       = 8; //Número Maximo de Campos
		var contenedor8      = $("#divZonDeli"); //ID del contenedor
		var AddButton       = $("#btnZonDeli"); //ID del Botón Agregar
		//var x = número de campos existentes en el contenedor
		var x = $("#divZonDeli div").length + 1;
    $("#btnZonDeli").click(function () { 
    var FieldCount = x-1; //para el seguimiento de los campos
			FieldCount++;
			//agregar campo
			var temporal='<div class="row container">'+
										'<div class="form-group form-group-sm col-xs-12 col-sm-6">'+
            '{{ Form::label("selZonDel[]", "La zona de explotacion, de beneficio y/o transformacion se encuentran delimitadas", array("class" => "control-label")) }}'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-3">'+
            '{{Form::select("selZonDel[]",$arrTipExpBen,null )}}'+
            '@if($errors->has("selZonDel[]"))'+
                '@foreach($errors->get("selZonDel[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
        '</div>'+
        '<div class="form-group form-group-sm col-xs-12 col-sm-2">'+
            '{{Form::select("selZonDelSi[]",$arrSiNo )}}'+
            '@if($errors->has("selZonDelSi[]"))'+
                '@foreach($errors->get("selZonDelSi[]") as $error)'+
                  '<span class="help-block alert alert-danger">  * {{ $error }} </span>'+
                '@endforeach'+
            '@endif'+
										'</div>'+
											'<a href="#" class="btn btn-danger btn-xs eliminar">&times;</a>'+
										'</div>';
			$(contenedor8).append(temporal);
			x++; //text box increment
			return false;
    });


    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });

</script>

@stop
