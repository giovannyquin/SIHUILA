<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class DatosMinaController extends BaseController{
       public function index() {
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
                return View::make('FormMinas.datosMina', compact('comDeptno','comMunici','comVereda'))->with('deptno', $deptno)->with('munici',$munici)->with('vereda',$vereda);           
       }

       public function show($id) {
           return 'Sofia show DatosMina';
       }
       
       public function Create() { 
           $mina=Mina::all();
           $deptno=Departamento::all();
           $munici=Municipio::all();
           $vereda=Vereda::all();
           return View::make('FormMinas.datosMina', 
                              array('mina'=>$mina,'deptno'=>$deptno, 
                                    'munici'=>$munici,'vereda'=>$vereda)
                            );
       }
       
       public function store() { 
           $mina = new Mina();
           $mina->nombre_mina = Input::get('txtNombreMina');
           $mina->descripcion_mina = Input::get('areDescripcionMina');
           $mina->depto = Input::get('selDeptoMina');
           $mina->municipio = Input::get('selMuniMina');
           $mina->vereda = Input::get('selVeredaMina');
           $mina->save();
           return Redirect::to('datosMina')->with('mina',$mina);
       }
       
       public function edit($id){
           $mina=Mina::find($id);
           $deptno=Departamento::all();
           $combox=$deptno->lists('nombre_departamento','id_departamento');
           $comDeptno=array('' => "Seleccione ... ")+$combox;
           $munici=Municipio::all();
           $combox=$munici->lists('nombre_municipio','id_municipio');
           $comMunici=array('' => "Seleccione...")+$combox;
           $vereda=Vereda::all();
           $combox=$vereda->lists('nombre_vereda','id_vereda');
           $comVereda=array('' => "Seleccione ... ")+$combox;
           return View::make('Pestanas.pestanaMinero',compact('comDeptno','comMunici','comVereda'),array('mina'=>$mina));
       }
       
       public function update($id) { 
       }
       
       public function destroy($id) { 
       }
    }