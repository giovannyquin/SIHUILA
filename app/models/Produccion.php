<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Produccion extends Eloquent{
        protected $table = 'SIproduccion';
        protected $primaryKey = 'id_mina';
        public $timestamps=false;
    }

