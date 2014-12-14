<?php

class Encuestado extends Eloquent{
    protected $table = 'ENCencuestado';
    protected $primaryKey = 'num_docu_enc';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public static function validarEncuestado($input)
    {
        $respuesta = array();
        $reglas = array(
            "txtNumDocu" => array("required", "integer"),
            "txtPrimerNombre" => array("required"),
            "txtPrimerApe" => array("required"),
            "selMuni" => array("required"),
        );
        $validator = Validator::make($input, $reglas);
        if($validator->fails())
        {
            $respuesta["mensaje"] = $validator;
            $respuesta["error"] =true;
        }
        else
        {            
            $respuesta["mensaje"] = "Encuestado creado!";
            $respuesta["error"] = false;
            //$respuesta["data"] = $vendedor;
        }
        return $respuesta;
    }
}
