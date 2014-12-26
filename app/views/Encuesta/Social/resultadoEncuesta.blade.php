@extends("SbAdmin.index")

@section("Titulo")
    Resultado
@stop

@section("NombrePagina")
    Resultado
@stop
@section("css")
{{ HTML::style('css/jquery-ui.css') }}
@stop
@section("SeccionTrabajo")
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="marketing">
    <h3> Resultados Encuesta Social </h3>
    <!--recrremos los aspectos-->
    @foreach($pregunta as $pregunta)
    <div class="row">
        <p class="bg-primary text-center">{{ $pregunta->nombre }}</p>
    </div>
        @foreach($respuestas[$pregunta->num_pregunta] as $resp)
            <?php
            $busqueda=strpos($resp->nombre, 'Texto');
            ?>
<!--            solo para modo de respuesta con TEXTO-->
            @if($busqueda!==FALSE)  
                <div class="row">
                    <div class="col-xs-2">Total Respuestas</div>
                    <div class="col-xs-1">{{$resultadoPregTexto[$pregunta->num_pregunta]}}</div>
                    <div class="col-xs-9">{{HTML::link('#','Ver Rptas', 
                                array("onClick" => "javascript:ModalJQueryForm($pregunta->id_pregunta, $pregunta->id_tipo_encuesta)"))}}</div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-6">{{$resp->nombre}}</div>
                    <div class="col-xs-6">{{$resultadoResp[$pregunta->num_pregunta][$resp->id_respuesta]}}</div>
                </div>
            
            @endif
        @endforeach
        @if(isset($resultadoPreg[$pregunta->num_pregunta]))
        <div class="row">
            <div class="col-xs-2">Total</div>
            <div class="col-xs-10">{{$resultadoPreg[$pregunta->num_pregunta]}}</div>
        </div>
        
        <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Respuestas', '%'],
                    @foreach($respuestas[$pregunta->num_pregunta] as $respu)
                    ['{{$respu->nombre}} [{{$resultadoResp[$pregunta->num_pregunta][$respu->id_respuesta]}}]',  {{$resultadoRespPorc[$pregunta->num_pregunta][$respu->id_respuesta]}}],
                    @endforeach
                  ]);

                  var options = {
                    title: 'Preguntas',
                    
                    bar: {groupWidth: "50%"},
                    vAxis: {title: 'Respuestas',  titleTextStyle: {color: 'red'}}
                  };

                  var chart = new google.visualization.BarChart(document.getElementById({{$pregunta->num_pregunta}}));

                  chart.draw(data, options);
                }
              </script>
            <div class="row" >
                <div class="" id="{{$pregunta->num_pregunta}}">
                    
                </div>
            </div>
        
        @endif
        
    @endforeach
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
{{ HTML::script('js/jquery-ui.js') }}
<script>
    function ModalJQueryForm(id_pregunta, id_tipo_encuesta){
        var iframe = $('<iframe style="display:none; min-width: 99%;" src="{{ url("mostrarResulTexto/'+id_pregunta+'/'+id_tipo_encuesta+'")}}"  />');
        // UI Dialog
        iframe.dialog({
            title: "Ver Respuestas",
                        show: {
                                effect: "blind",
                                duration: 200
                        },
                        hide: {
                                effect: "blind",
                                duration: 200
                        },
                        close: function(event, ui) { 
                                //window.location.reload(); 
                        },
                        height: 500,
                        width: 800,
                        modal: true
        });

        iframe.dialog('open');
        return false;
    }
</script>
@stop