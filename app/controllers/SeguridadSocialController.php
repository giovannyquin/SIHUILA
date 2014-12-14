<?php

class SeguridadSocialController extends BaseController{
   public function index() {
   }

   public function show($id) { 
   }   
   
   public function create() { 
   }
   
   public function store() { 
   }
   
   public function edit($id) { 
   }
   
   public function update($id) { 
   }
   
   public function destroy($id){
       
   }
   public function eliminar($id,$tipo_contrato,$asunto,$pestana) { 
       $arr['tipo_contrato']=$tipo_contrato;
       $arr['asunto']=$asunto;
#       $sele= SeleccionMultiple::find($id,$arr);
       $tale= SeguridadSocial::find($id,$arr);
       DB::table('SIseguridad_social')->where('id_mina','=',$id)
               ->where('id_regimen','=', $otros_campos['id_regimen'])
               ->where('id_tipo_seguridad','=', $otros_campos['id_tipo_seguridad'])
               ->where('id_tipo_mineria','=', $otros_campos['asuid_tipo_minerianto'])     
               ->delete();
       
       return Redirect::action($pestana.'@show', array($id));
   }
   
   
}