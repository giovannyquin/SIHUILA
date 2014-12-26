<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FormMinaController extends BaseController
{
    public function cargarPestanas($id)
    {
        if(!Session::get("id_mina"))
        {
            Session::put("id_mina", $id);
            Session::flash("id_mina", $id);
        }
        
       $mina=Mina::find($id);
       $deptno=Departamento::all();
       $combox=$deptno->lists('nombre_departamento','id_departamento');
       $comDeptno=array('' => "Seleccione ... ")+$combox;
       $munici=Municipio::all();
       $combox=$munici->lists('nombre_municipio','id_municipio');
       $comMunici=array('' => "Seleccione ... ")+$combox;
       $vereda=Vereda::all();
       $combox=$vereda->lists('nombre_vereda','id_vereda');
       $comVereda=array('' => "Seleccione ... ")+$combox;
       //echo $mina->id_mina;
       //return View::make('FormMinas.formMinas',compact('comDeptno','comMunici','comVereda'),array('mina'=>$mina));
       //return View::make('FormMinas.FormMinas');
       return Redirect::to('formMinas')->with('mina',$mina);
       //return Redirect::to('formMinas');
    }
    public function index() {
            
    }
    
    public function show($id) {
        $mina= Mina::find($id);
        //return Redirect::to('formMinas')->with('mina',$mina);
        return View::make("FormMinas.FormMinas", array("mina", $mina));
    }
    public function create() { 
      
    }
    public function store() {
        
    }
    
    public function edit($id) { 
       
   }
   
   public function update($id) { 

   }
   
   public function destroy($id) { 
       
   }
}