<?php

class AspectosPreguntasController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       $Aspecto= AspectosPreguntas::whereId_tipo_encuesta($id)->get();
       //return dd($Aspecto);
       return View::make("Encuesta.pestanaAspecto", 
               array("tipoEncuesta"=> $id, 
                        "Aspecto" => $Aspecto,
                    ));
   }   
   
   public function create() { 
       $id=Input::get("hidTipoEnc");
       $aspecto= new AspectosPreguntas();
       $aspecto->id_tipo_encuesta=$id;
       $aspecto->nombre=Input::get("txtNombre");
       $aspecto->descripcion=Input::get("txtDesc");
       $aspecto->save();
       return Redirect::action('AspectosPreguntasController@show', array($id));
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
        $Aspecto = AspectosPreguntas::find($id);
        return View::make("Encuesta.Aspecto.crear", array("aspecto" => $Aspecto));
   }
   
   public function update($id) { 
       $aspecto = AspectosPreguntas::find($id);
       $aspecto->nombre=Input::get("txtNombre");
       $aspecto->descripcion=Input::get("txtDesc");
       $aspecto->save();
       return Redirect::action('AspectosPreguntasController@show', array($aspecto->id_tipo_encuesta));
   }
   
   public function destroy($id) { 
       echo "Eliminar";
       $aspecto = AspectosPreguntas::find($id);
       $id_tipo_enc = $aspecto->id_tipo_encuesta;
       $aspecto->delete();
       return Redirect::action('AspectosPreguntasController@show', array($id_tipo_enc));
   }
   
   public function crear($id)
   {
       
   }
   
}