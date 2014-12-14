<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class TalentoHumano extends Eloquent{
        protected $table = 'SItalento_humano';
        protected $primaryKey = 'id_mina';
        public $timestamps=false;
        public $incrementing=false;
    
        public function MinaSel(){
            return $this->belongsTo('Mina', 'id_mina', 'id_mina');
        }

        public static function find($id_mina, $otros_campos= array()){

            return TalentoHumano::where('id_mina','=', $id_mina)
                    ->where('tipo_contrato','=', $otros_campos['tipo_contrato'])
                    ->where('asunto','=', $otros_campos['asunto'])
                    ->first();
        }
    }

