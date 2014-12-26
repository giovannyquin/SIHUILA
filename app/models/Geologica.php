<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Geologica extends Eloquent{
        protected $table = 'SIgeologica';
        protected $primaryKey = 'id_mina';
        public $timestamps=false;
#        public $incrementing=false;
    }
