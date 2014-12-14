<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class SeguridadSocial extends Eloquent{
        protected $table = 'SIseguridad_social';
        protected $primaryKey = 'id_mina';
        public $timestamps=false;
        public $incrementing=false;
    
        public function MinaSel(){
            return $this->belongsTo('Mina', 'id_mina', 'id_mina');
        }

        public static function find($id_mina, $otros_campos= array()){

            return SeguridadSocial::where('id_mina','=', $id_mina)
                    ->where('id_regimen','=',$otros_campos['id_regimen'])
                    ->where('id_tipo_seguridad','=',$otros_campos['id_tipo_seguridad'])
                    ->where('id_tipo_mineria','=',$otros_campos['id_tipo_mineria'])
                    ->first();
        }
    }

