<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Mina extends Eloquent{
        protected $table = 'SIminas';
        protected $primaryKey="id_mina";
        protected $fillable= array("id_mina, nombre_mina");
        
        
        
        public function detalleMina()
        {
            return $this->hasOne('DetalleMina','id_mina');
        }
        
        public function seleccionMultiple()
        {
            return $this->hasOne('SeleccionMultiple','id_mina');
        }
        
        /*
         * Metodo para validar los input del formulario de creacion de frentes mineros
         * @Autor Giovanny Quintero
         * @Fecha 14-Dic-2014
         */
        public static function validarFrente($input)
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