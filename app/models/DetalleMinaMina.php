<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class DetalleMinaMina extends Eloquent{
        protected $table = 'SIdetalle_minasminas';
        protected $primaryKey = 'id_minamina';
        protected $fillable = ['*'];
        public $timestamps = false;
        
        public function MinaMina()
        {
            $this->belongsTo('MinaMina', 'id_minamina');
        }            
    }
