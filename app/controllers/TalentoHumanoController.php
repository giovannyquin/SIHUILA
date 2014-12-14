<?php

class TalentoHumanoController extends BaseController{
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
       $tale= TalentoHumano::find($id,$arr);
       DB::table('SItalento_humano')
                    ->where('id_mina','=',$id)
                    ->where('tipo_contrato','=',$tipo_contrato)
                    ->where('asunto','=',$asunto)
                    ->delete();
       
       return Redirect::action($pestana.'@show', array($id));
   }
   
   
}