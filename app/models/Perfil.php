<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Perfil extends Eloquent
{
    protected $table='SIperfiles';
    protected $fillable=array("nombre_perfil", "descripcion_perfil");
}