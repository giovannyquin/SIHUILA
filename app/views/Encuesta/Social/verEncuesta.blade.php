@extends("SbAdmin.index")

@section("Titulo")
    Encuestado
@stop

@section("NombrePagina")
    Encuestado
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Encuesta Social </h3>
    <!--recrremos los aspectos-->
    @foreach($aspecto as $aspectos)
    <div class="row">
        <p class="bg-primary text-center">{{ $aspectos->nombre }}</p>
    </div>
    <?php //var_dump($tipoAspectos); ?>
        <!-- recorremos arreglo de los tipos de aspectos, como vienen como coleccion se pueden trabajr obteto->propiedad-->
        <?php reset($tipoAspectos[$aspectos->id_aspecto_preg]);
        while($tipoA=current($tipoAspectos[$aspectos->id_aspecto_preg]))
        {
            next($tipoAspectos[$aspectos->id_aspecto_preg]);?>
            <!-- recorremos el array Tipo de Aspectos como objeto, ya que viene como coleccion-->
            @foreach($tipoA as $tipo)
            @if($tipo->nombre<>$aspectos->nombre)
            <div class="row">
                <p class="bg-primary text-center">{{$tipo->nombre}}</p>
            </div>
            @endif
            <!-- recorremos arreglos de las preguntas. como vienen como coleccion se pueden trabajar objeto->propiedad-->
            <?php
        //var_dump($preguntas[$aspectos->id_aspecto_preg][$tipo->id_tipo_asp_preg]);
                reset($preguntas[$aspectos->id_aspecto_preg][$tipo->id_tipo_asp_preg]);
                while($pregunta=current($preguntas[$aspectos->id_aspecto_preg][$tipo->id_tipo_asp_preg]))
                {
                    next($preguntas[$aspectos->id_aspecto_preg][$tipo->id_tipo_asp_preg]);
                    ?>
                    <!-- recorremos el array de preguntas como objeto, ya que viene como coleccion-->
                    @foreach($pregunta as $pre)
                    
                    <?php
                    reset($modoPre[$pre->id_pregunta]);
                    while($modo=current($modoPre[$pre->id_pregunta]))
                    {
                        next($modoPre[$pre->id_pregunta]);
                        $busqueda=strpos($modo->nombre, 'Texto');
                        if($busqueda!==FALSE) // solo para modo de respuesta con TEXTO
                        {                            
                            unset($rr); //limpiamos variable
                            ?>
                            @foreach($resultadoTexto[$pre->id_pregunta][$tipoEncuesta][$num_docu] as $rr)
                        
                            @endforeach
                            @if($modo->nombre=='Texto Largo')
                                <div class="row">
                                    <div class="col-xs-12 col-md-8">
                                        {{Form::label($pre->id_pregunta, $pre->num_pregunta.'. '.$pre->nombre)}}
                                        {{Form::textarea($pre->id_pregunta, Input::old($pre->id_pregunta) ? Input::old($pre->id_pregunta) : isset($rr->valor_respuesta) ? $rr->valor_respuesta : null, 
                                                    array("class" => "form-control", "placeholder" => "Responder", "size" => "30x3", "onBlur" => "javascript:guardaTexto(  $pre->id_pregunta, $tipoEncuesta, $num_docu, this.value )"))}}
                                        @if($errors->has($pre->id_pregunta))
                                            @foreach($errors->get($pre->id_pregunta) as $error)
                                              <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @elseif($modo->nombre=='Texto Número')
                                <div class="row">
                                    <div class="form-group form-group-sm col-xs-12 col-md-4">
                                        {{Form::label($pre->id_pregunta, $pre->num_pregunta.'. '.$pre->nombre)}}
                                        {{Form::text($pre->id_pregunta, Input::old($pre->id_pregunta) ? Input::old($pre->id_pregunta) : isset($rr->valor_respuesta) ? $rr->valor_respuesta : null, 
                                                    array("class" => "form-control", "placeholder" => "Número", "onBlur" => "javascript:guardaTexto(  $pre->id_pregunta, $tipoEncuesta, $num_docu, this.value )")) }}
                                        @if($errors->has($pre->id_pregunta))
                                            @foreach($errors->get($pre->id_pregunta) as $error)
                                              <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @elseif($modo->nombre=='Texto Corto')
                                <div class="row">
                                    <div class="form-group form-group-sm col-xs-12 col-md-4">
                                        {{Form::label($pre->id_pregunta, $pre->num_pregunta.'. '.$pre->nombre)}}
                                        {{Form::text($pre->id_pregunta, Input::old($pre->id_pregunta) ? Input::old($pre->id_pregunta) : isset($rr->valor_respuesta) ? $rr->valor_respuesta : null, 
                                                    array("class" => "form-control", "placeholder" => "Número", "onBlur" => "javascript:guardaTexto(  $pre->id_pregunta, $tipoEncuesta, $num_docu, this.value )")) }}
                                        @if($errors->has($pre->id_pregunta))
                                            @foreach($errors->get($pre->id_pregunta) as $error)
                                              <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                            
                    <?php
                        }
                        else // se viene por aca cuando son de selección
                        {
                    ?>
                            @if($modo->nombre=='Múltiple Opción - Única Respuesta')
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    {{Form::label($pre->id_pregunta, $pre->num_pregunta.'. '.$pre->nombre)}}
                                </div>
                            </div>
                            @foreach($resultado[$pre->id_pregunta][$tipoEncuesta][$num_docu] as $tt)
                            
                            @endforeach
                                <?php                                
                                reset($tipoRpta[$pre->id_pregunta]);
                                while($tipoRp=current($tipoRpta[$pre->id_pregunta]))
                                {
                                    @next($tipoRpta[$pre->id_pregunta]);
                                    if(isset($tt) && $tt->id_respuesta==$tipoRp->id_respuesta){ $checkTrue=true; unset($tt); }
                                    else unset($checkTrue);
                                ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            {{ Form::radio($pre->id_pregunta, $tipoRp->id_respuesta, isset($checkTrue) ? true : null,  
                                                array("onClick" => "javascript:guardaRadio(  $pre->id_pregunta, $tipoEncuesta, $num_docu, this.value )")) }}
                                            {{Form::label($pre->id_pregunta, $tipoRp->nombre, array("class" => "radio-inline"))}}
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                        @if($errors->has($pre->id_pregunta))
                                            @foreach($errors->get($pre->id_pregunta) as $error)
                                              <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                                        @endif
                                        
                            @elseif($modo->nombre=='Múltiple Opción - Múltiple Respuesta')
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    {{Form::label($pre->id_pregunta, $pre->num_pregunta.'. '.$pre->nombre)}}
                                </div>
                            </div>
                                <?php
                                reset($tipoRpta[$pre->id_pregunta]);
                                while($tipoRp=current($tipoRpta[$pre->id_pregunta]))
                                {
                                    @next($tipoRpta[$pre->id_pregunta]);
                                    if(isset($resultadoMultiple[$pre->id_pregunta][$tipoEncuesta][$num_docu][$tipoRp->id_respuesta])) 
                                        $chBox=true;
                                    else
                                        $chBox=false;
                                ?>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        {{ Form::checkbox($pre->id_pregunta, $tipoRp->id_respuesta, $chBox,  array("onClick" => "javascript:guardaCheck(  $pre->id_pregunta, $tipoEncuesta, $num_docu, this.value, this.checked )")) }}
                                        {{Form::label($pre->id_pregunta, $tipoRp->nombre, array("class" => "radio-inline"))}}
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                        @if($errors->has($pre->id_pregunta))
                                            @foreach($errors->get($pre->id_pregunta) as $error)
                                              <span class="help-block alert alert-danger">  * {{ $error }} </span>
                                            @endforeach
                                        @endif        
                            @endif
                    <?php
                        }
                    }
                    ?>
                    @endforeach
            <?php
                }
            ?>
            @endforeach
    <?php
        }
    ?>
    @endforeach
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
<script>
    function guardaTexto(id_pregunta, tipoEncuesta, num_docu, valor)
    {
        $.post("{{ url('guardaEncuestaSocial')}}",
			{ id_pregunta: id_pregunta,
                            tipoEncuesta: tipoEncuesta,
                            num_docu: num_docu,
                            valor: valor,
                            opcion: 'guardaTextoNum'},
                            function(data) {
				
			});
    }
    
    function guardaRadio(id_pregunta, tipoEncuesta, num_docu, valor)
    {
        $.post("{{ url('guardaEncuestaSocial')}}",
			{ id_pregunta: id_pregunta,
                            tipoEncuesta: tipoEncuesta,
                            num_docu: num_docu,
                            id_respuesta: valor,
                            opcion: 'guardaUnicaRpta'},
                            function(data) {
				
			});
    }
    
    function guardaCheck(id_pregunta, tipoEncuesta, num_docu, valor, estado)
    {
        //alert(estado);
        if(estado==true) chec='SI';
        else chec='NO';
        $.post("{{ url('guardaEncuestaSocial')}}",
			{ id_pregunta: id_pregunta,
                            tipoEncuesta: tipoEncuesta,
                            num_docu: num_docu,
                            id_respuesta: valor,
                            estado: chec,
                            opcion: 'guardaMultipleRpta'},
                            function(data) {
				
			});
    }
</script>
@stop