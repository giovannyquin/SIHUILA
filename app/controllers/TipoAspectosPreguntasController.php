<?php

class TipoAspectosPreguntasController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       echo "entro";
       $TipoAspecto= TipoAspectosPreguntas::whereId_tipo_encuesta($id)->get();
       //return dd($Aspecto);
       return View::make("Encuesta.pestanaTipoAspecto", 
               array("tipoEncuesta"=> $id, 
                        "TipoAspecto" => $TipoAspecto,
                    ));
   }   
   
   public function create() { 
       $id=Input::get("hidTipoEnc");
       $tipoaspecto= new TipoAspectosPreguntas();
       $tipoaspecto->id_tipo_encuesta=$id;
       $tipoaspecto->id_aspecto_preg=Input::get("selAspecto");
       $tipoaspecto->nombre=Input::get("txtNombre");
       $tipoaspecto->descripcion=Input::get("txtDesc");
       $tipoaspecto->save();
       return Redirect::action('TipoAspectosPreguntasController@show', array($id));
   }
   
   public function store() { 
       
   }
   
   public function edit($id_tipo_asp) { 
        $TipoAspecto = TipoAspectosPreguntas::find($id_tipo_asp);
        $aspecto= array("" => "Seleccione..")+AspectosPreguntas::find($TipoAspecto->id_tipo_encuesta)->lists('nombre', 'id_aspecto_preg');
        return View::make("Encuesta.TipoAspecto.crear", array("tipoaspecto" => $TipoAspecto, "aspecto" => $aspecto));
   }
   
   public function update($id) { 
       $tipoaspecto = TipoAspectosPreguntas::find($id);
       $tipoaspecto->id_aspecto_preg=Input::get("selAspecto");
       $tipoaspecto->nombre=Input::get("txtNombre");
       $tipoaspecto->descripcion=Input::get("txtDesc");
       $tipoaspecto->save();
       return Redirect::action('TipoAspectosPreguntasController@show', array($tipoaspecto->id_tipo_encuesta));
   }
   
   public function destroy($id) { 
       echo "Eliminar";
       $tipoaspecto = TipoAspectosPreguntas::find($id);
       $id_tipo_enc = $tipoaspecto->id_tipo_encuesta;
       $tipoaspecto->delete();
       return Redirect::action('TipoAspectosPreguntasController@show', array($id_tipo_enc));
   }
   
   public function formCrear($id_tipo_enc)
   {
       
       $aspecto= array("" => "Seleccione..")+AspectosPreguntas::whereId_tipo_encuesta($id_tipo_enc)->lists('nombre', 'id_aspecto_preg');
       return View::make("Encuesta.TipoAspecto.crear", array("id" => $id_tipo_enc, "aspecto" => $aspecto));
   }
   
}