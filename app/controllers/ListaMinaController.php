<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ListaMinaController extends BaseController
{
    public function listarMinas()
    {
        $mina=Mina::all();
        $deptno=Departamento::all();
        $munici=Municipio::all();
        $vereda=Vereda::all();
        $combox=$deptno->lists('nombre_departamento','id_departamento');
        $comDeptno=array('' => "Seleccione ... ")+$combox;
        $combox=$munici->lists('nombre_municipio','id_municipio');
        $comMunici=array('' => "Seleccione ... ")+$combox;
        $combox=$vereda->lists('nombre_vereda','id_vereda');
        $comVereda=array('' => "Seleccione ... ")+$combox;
        return View::make('FormMinas.listaMinas', compact('comDeptno','comMunici','comVereda'))->with('mina', $mina)->with('deptno', $deptno)
                                            ->with('munici',$munici)->with('vereda',$vereda);
    }
}