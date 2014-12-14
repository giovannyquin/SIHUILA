<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class GeoMultiple extends Eloquent{
        protected $table = 'SIgeo_multiple';
        protected $primaryKey = 'id_mina';
        public $timestamps=false;
        public $incrementing=false;
    
        public function MinaSel(){
            return $this->belongsTo('Mina', 'id_mina', 'id_mina');
        }

        public static function find($id_mina, $otros_campos= array()){

            return GeoMultiple::where('id_mina','=', $id_mina)
                    ->where('id_estado','=', $otros_campos['id_estado'])
                    ->where('frente_bocamina','=', $otros_campos['frente_bocamina'])
                    ->first();
        }
    }
