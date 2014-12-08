@extends("SbAdmin.index")

@section("Titulo")
    Crear Aspectos de Preguntas
@stop

@section("NombrePagina")
    Crear Aspectos de Preguntas
@stop
@section("JsJQuery")
    
@stop
@section("SeccionTrabajo")
<div class="marketing">
    @if(Session::get("mensaje"))
            <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get("mensaje")}}</div>
        @endif
    @if(isset($tiporpta))
        @if($tiporpta->count())
            <h3>Actualizar Tipos Aspectos Preguntas</h3>
            {{ Form::open(array("url"=> "TipoRespuestas/". $tiporpta->id_tipo_rpta, "method" => "PUT")) }}
            <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Nombre respuesta")}}
                {{Form::text("txtNombre", Input::old('txtNombre') ? Input::old("txtNombre") : isset($tiporpta->nombre) ? $tiporpta->nombre : null , array("class" => "form-control", "placeholder" => "Nombre"))}}
                @if($errors->has("txtNombre"))
                @foreach($errors->get("txtNombre") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-12">
                <span class="help-block">  El Nombre de Respuesta aparecerá en los menús desplegables para seleccionar el tipo de respuesta que usted quiera. Debe ser breve y describir las posibles respuestas para este tipo. El campo Label es un área de texto ya donde se puede dar una descripción de esta cuestión y, posiblemente, explicar cómo responder (es decir, cuanto todo lo que corresponda) la etiqueta será visible para los usuarios al tomar la encuesta. Se usa para explicar la pregunta o respuestas, de lo contrario dejarlo en blanco. </span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selModo", "Modo de Respuesta")}}
                {{Form::select("selModo", $modoRpta, isset($tiporpta->id_modo_rpta) ? $tiporpta->id_modo_rpta : null )}}
            </div>
        </div>
        <div class="row">
            <ul>
                <li>MO-UR = Multiple opción, una posible rspuesta puede ser escogida.</li>
                <li>MO-MR = Multiple opción, mas de una posible opción puede ser escogida.</li>
                <li>TL = Area de Texto Largo, Tamaño Ilimitado de escritura.</li>
                <li>TC = Area de Texto Corto,Máximo 255 caracteres.</li>
            </ul>
        </div>
        <hr>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-12">
                {{Form::label("", "Valores de Respuestas (Sólo para tipos de respuestas MO-UR MO-MR)")}}
                
            </div>
        </div>
        <div class="row">
            <ul>
                <li>Debe proporcionar una lista de respuestas posibles si se ha seleccionado MO-UR o MO-MR para un tipo de respuesta.</li>
                <li>Lista de una respuesta por cuadro de texto en las casillas de abajo. Utilice el botón en la parte inferior de las casillas para agregar más cajas para obtener más respuestas. La orden que la lista de las respuestas que aquí es el orden en que serán presentados en las encuestas.</li>
                <li>Puedes opcionalmente asignar un valor numerico a cada calor de la respuesta que se ofrece.</li>
            </ul>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-1 col-md-1">
                Num
            </div>
            <div class="form-group form-group-sm col-xs-8 col-md-8 text-center">
                Nombre Respuesta
            </div>
            <div class="form-group form-group-sm col-xs-2 col-md-2">
                Valor Numerico
            </div>
        </div>
        <?php $a=1; ?>
        @foreach($respuestasE as $respuestas)
            <div class="row">
            <div class="form-group form-group-sm col-xs-1 col-md-1">
                {{$a}}
            </div>
            <div class="form-group form-group-sm col-xs-8 col-md-8 text-center">
                {{Form::text("txtNomRpta[$a]", Input::old("txtNomRpta[$a]") ? Input::old("txtNomRpta[$a]") : isset($respuestas->nombre) ? $respuestas->nombre : null, array("class" => "form-control", "placeholder" => "Nombre Rpta"))}}
            </div>
            <div class="form-group form-group-sm col-xs-2 col-md-2">
                {{Form::text("txtValorRpta[$a]", Input::old("txtValorRpta[$a]") ? Input::old("txtValorRpta[$a]") : isset($respuestas->valor_numerico) ? $respuestas->valor_numerico : null, array("class" => "form-control", "placeholder" => "Valor Rpta"))}}
            </div>
                {{Form::hidden("hidIdResp[$a]", $respuestas->id_respuesta)}}
                <?php $a++; ?>
        </div>
        @endforeach
        @for ($i = $a; $i <= 10; $i++)
        <div class="row">
            <div class="form-group form-group-sm col-xs-1 col-md-1">
                {{$i}}
            </div>
            <div class="form-group form-group-sm col-xs-8 col-md-8 text-center">
                {{Form::text("txtNomRpta[$i]", Input::old("txtNomRpta[$i]"), array("class" => "form-control", "placeholder" => "Nombre Rpta"))}}
            </div>
            <div class="form-group form-group-sm col-xs-2 col-md-2">
                {{Form::text("txtValorRpta[$i]", Input::old("txtValorRpta[$i]"), array("class" => "form-control", "placeholder" => "Valor Rpta"))}}
            </div>
        </div>
        {{Form::hidden("hidIdResp[$i]", '')}}
        @endfor
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('TipoRespuestas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{ Form::close() }}
        @endif
    @else
        <h3> Crear Tipos de Respuestas con sus respuestas </h3>
        {{ Form::open(array("route" => "TipoRespuestas.create", "method" => "get")) }}
        
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("txtNombre", "Nombre respuesta")}}
                {{Form::text("txtNombre", Input::old('txtNombre'), array("class" => "form-control", "placeholder" => "Nombre"))}}
            </div>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-12">
                <span class="help-block">  El Nombre de Respuesta aparecerá en los menús desplegables para seleccionar el tipo de respuesta que usted quiera. Debe ser breve y describir las posibles respuestas para este tipo. El campo Label es un área de texto ya donde se puede dar una descripción de esta cuestión y, posiblemente, explicar cómo responder (es decir, cuanto todo lo que corresponda) la etiqueta será visible para los usuarios al tomar la encuesta. Se usa para explicar la pregunta o respuestas, de lo contrario dejarlo en blanco. </span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-4">
                {{Form::label("selModo", "Modo de Respuesta")}}
                {{Form::select("selModo", $modoRpta, null )}}
            </div>
        </div>
        <div class="row">
            <ul>
                <li>MO-UR = Multiple opción, una posible rspuesta puede ser escogida.</li>
                <li>MO-MR = Multiple opción, mas de una posible opción puede ser escogida.</li>
                <li>TL = Area de Texto Largo, Tamaño Ilimitado de escritura.</li>
                <li>TC = Area de Texto Corto,Máximo 255 caracteres.</li>
            </ul>
        </div>
        <hr>
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-md-12">
                {{Form::label("", "Valores de Respuestas (Sólo para tipos de respuestas MO-UR MO-MR)")}}
                
            </div>
        </div>
        <div class="row">
            <ul>
                <li>Debe proporcionar una lista de respuestas posibles si se ha seleccionado MO-UR o MO-MR para un tipo de respuesta.</li>
                <li>Lista de una respuesta por cuadro de texto en las casillas de abajo. Utilice el botón en la parte inferior de las casillas para agregar más cajas para obtener más respuestas. La orden que la lista de las respuestas que aquí es el orden en que serán presentados en las encuestas.</li>
                <li>Puedes opcionalmente asignar un valor numerico a cada calor de la respuesta que se ofrece.</li>
            </ul>
        </div>
        <div class="row">
            <div class="form-group form-group-sm col-xs-1 col-md-1">
                Num
            </div>
            <div class="form-group form-group-sm col-xs-8 col-md-8 text-center">
                Nombre Respuesta
            </div>
            <div class="form-group form-group-sm col-xs-2 col-md-2">
                Valor Numerico
            </div>
        </div>
        @for ($i = 1; $i <= 10; $i++)
        <div class="row">
            <div class="form-group form-group-sm col-xs-1 col-md-1">
                {{$i}}
            </div>
            <div class="form-group form-group-sm col-xs-8 col-md-8 text-center">
                {{Form::text("txtNomRpta[]", Input::old("txtNomRpta[]"), array("class" => "form-control", "placeholder" => "Nombre Rpta"))}}
            </div>
            <div class="form-group form-group-sm col-xs-2 col-md-2">
                {{Form::text("txtValorRpta[]", Input::old("txtValorRpta[]"), array("class" => "form-control", "placeholder" => "Valor Rpta"))}}
            </div>
        </div>
        @endfor
        <div class="row col-xs-2">
            {{Form::submit("Crear", array("class" => "form-control btn btn-primary"))}}
        </div>
        <div class="row col-xs-2">
                    {{ link_to('TipoRespuestas/'.$id, 'Cancelar', array("class" => "form-control btn btn-success")) }}
                </div>
        {{Form::hidden("hidTipoEnc", $id)}}
        {{Form::close()}}
    @endif
</div>
@stop
