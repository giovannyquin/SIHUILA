<?php

class GeoMultipleController extends BaseController{
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
       $arr['frente_bocamina']=$tipo_contrato;
       $arr['id_estado']=$asunto;
#       $sele= SeleccionMultiple::find($id,$arr);
       $tale= GeoMultiple::find($id,$arr);
       DB::table('SIgeo_multiple')
                    ->where('id_mina','=',$id)
                    ->where('frente_bocamina','=',$tipo_contrato)
                    ->where('id_estado','=',$asunto)
                    ->delete();
       
       return Redirect::action($pestana.'@show', array($id));
   }
   
   
}