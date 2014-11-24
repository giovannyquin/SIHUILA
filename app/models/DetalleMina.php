<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class DetalleMina extends Eloquent{
        protected $table = 'SIdetalle_minas';
        protected $primaryKey = 'id_mina';
        public $timestamps = false;
    }
