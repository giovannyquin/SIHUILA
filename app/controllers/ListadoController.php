<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ListadoController extends BaseController
{
    public function listarTipoEncuestas()
    {
        $TipoEncuesta=TipoEncuesta::all();
        return View::make('Encuesta.listaTipoEncuesta')->with('TipoEncuesta', $TipoEncuesta);
    }
}