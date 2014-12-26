<?php

class PlantaBeneficio extends Eloquent{
    protected $table = 'SIplanta_beneficio';
    protected $primaryKey="id_planta";
    protected $fillable= ['*'];

    public static function validarPlanta($input)
    {
        $respuesta = array();
        $reglas = array(
            "txtNombre" => array("required"),
        );
        $validator = Validator::make($input, $reglas);
        if($validator->fails())
        {
            $respuesta["mensaje"] = $validator;
            $respuesta["error"] =true;
        }
        else
        {            
            $respuesta["mensaje"] = "Registro Almacenado!";
            $respuesta["error"] = false;
            //$respuesta["data"] = $vendedor;
        }
        return $respuesta;
    }
}