<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Minas extends Eloquent{
    protected $table='SIminas';
    protected $primaryKey="id_mina";
    
    public static function agregarMinas($input){
        return 'Mina almacenada';
#        self::arrayGuardar($input);
    }
    
    protected static function arrayGuardar($input){
        self::$registros["nombre_mina"]=$input["txtNombreMina"];
        self::$registros["depto"]=$input["selDeptoMina"];
        self::$registros["municipio"]=$input["selMunicipioMina"];
        self::$registros["vereda"]=$input["selVeredaMina"];
    }

    
}
