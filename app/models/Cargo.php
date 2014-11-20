<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cargo extends Eloquent
{
   protected $table="SIcargos";
   protected $fillable=array("nombre_cargo", "descripcion_cargo");
}
