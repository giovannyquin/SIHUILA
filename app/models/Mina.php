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
        
        public function titularMinero()
        {
            return $this->hasMany('TitularMinero', 'id_mina');
        }
    }