<?php

class TipoEncuestaController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       $Aspecto= AspectosPreguntas::whereId_tipo_encuesta($id)->get();
       return View::make("Encuesta.pestanaAspecto", 
               array("tipoEncuesta"=> $id, 
                        "Aspecto" => $Aspecto,
                    ));
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