<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MinaMina extends Eloquent{
    protected $table = 'SIminas_minas';
    protected $primaryKey="id_minamina";
    protected $fillable= array("id_mina, nombre_mina");

    public function Mina()
    {
        return $this->hasOne('Mina','id_minamina');
    }
    
    public function titularMinero()
    {
        return $this->hasMany('TitularMinero', 'id_minamina','id_minamina');
    }
    
    public function detalleMinaMina()
        {
            return $this->hasOne('DetalleMinaMina','id_minamina');
        }
    
    public static function validarUnidad($input)
    {
        $respuesta = array();
        $reglas = array(
            "txtNombre" => array("required"),
            "selDeptoMina" => array("required"),
            "selMuniMina" => array("required"),
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