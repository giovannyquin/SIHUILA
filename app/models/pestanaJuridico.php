<?php

class pestanaJuridico
{
    public static function agregarJuridico($input)
    {
        $respuesta= array();
        $reglas=
                array(
                    "txtPlaca" => array("alpha_dash", "max:100"),
                    "selOperacion" => array("alpha"),
                    "selTipo" => array("integer"),
                    "selActoTer" => array("alpha"),
                    "selRenuncia" => array("integer"),
                    "selInstForma" => array("alpha"),
                    "selTipoInst" => array("integer"),
                    "txtEstadoInst" => array("max:300"),
                    "selSupTit" => array("alpha"),
                    "txtPlacaSup" => array("alpha_dash"),
                    "selTipoSup" => array("integer"),
                    "selPosFor" => array("alpha"),
                    "selTitDis" => array("alpha"),
                    "selInfDis" => array("alpha"),
                    "txtPrimerTit" => array("alpha"),
                    "txtSegundoTit" => array("alpha"),
                    "txtPrimerApeTit" => array("alpha"),
                    "txtSegundoApeTit" => array("alpha"),
                    "txtDirecTit" => array("max:100"),
                    "txtTelTit" => array("integer"),
                    "txtCedTit" => array("numeric"),
                );
        $validator = Validator::make($input, $reglas);
        if($validator->fails())
        {
            $respuesta["mensaje"]=$validator;
            $respuesta["error"]=true;
        }
        else
        {
            $respuesta["error"]=false;
            $respuest["mensaje"]="Datos almacenados correctamente";
        }
        return $respuesta;
    }
}
