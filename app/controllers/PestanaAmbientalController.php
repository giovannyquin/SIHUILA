<?php

class PestanaAmbientalController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $mina= Mina::whereId_mina($id)->get();
       $detalle = DetalleMina::whereId_mina($id)->get();
       return View::make("Pestanas.pestanaAmbiental", 
               array("minas"=> $mina, 
                        "detalle" => $detalle,
                    ));
       //return 'Listo Sofia2';
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
   
   public function grabarDetalleMina($id){

   }
   
}