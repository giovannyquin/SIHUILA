<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Producto extends Eloquent{
    protected $table="producto";
    protected $fillable= array("vendedor_id", "descripcion", "precio");
    
    public static function agregarProducto($input)
    {
        $respuesta = array();
        $reglas = array(
            "vendedor_id" => "required",
            "descripcion" => array("required", "max:255"),
            "precio" => array("required", "integer"),
        );
        
        $validator = Validator::make($input, $reglas);
        
        if($validator->fails())
        {
            $respuesta["mensaje"] = $validator;
            $respuesta["error"] = true;
        }
        else
        {
            $producto = static::create($input);
            
            $respuesta["mensaje"]= "Producto creado!";
            $respuesta["error"]= false;
            $respuesta["data"] = $producto;
            
        }
        return $respuesta;
    }
}