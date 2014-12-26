<?php

class FuncionesMostrarElimController extends BaseController
{
    /*
     * Método para mostrar registros de tabla SeleccionMultiple, con un sólo label
     * @Autor Giovsnny Quintero
     * 26-Nov-2014
     */
    public function SelMultiple1label($txtLabel, $id_mina, $selIdTopo, $asunto)
    {
        $otros_campos= array("id_topologia" => $selIdTopo, "asunto" => trim($asunto));
        $selMu= SeleccionMultiple::find($id_mina, $otros_campos);
        $control=0;
        while($control<count($selMu))
        {
        ?>
        <div class="row container">
            <div class="form-group form-group-sm col-xs-12 col-sm-7">
                {{ Form::label("selSeg", "Se evidencia pago de afiliacion de los trabajadores  al dia al sistema de seguridad social", array("class" => "control-label")) }}
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                {{Form::select("selSeg[]", $SelSegSoc, isset($seleccion_multiple->resultado) ? $seleccion_multiple->resultado : null )}}
                @if($errors->has("selSeg[]"))
                    @foreach($errors->get("selSeg[]") as $error)
                      <span class="help-block alert alert-danger">  * {{ $error }} </span>
                    @endforeach
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-2">
                <select name="selSegSi[]" id="selSegSi1">
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
        <?php
        $control++;
        }
    }
}

?>