<?php

class EncuestadoController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
        /*$encuestado= DB::table('ENCresultado')
                         ->join('ENCencuestado', 'ENCresultado.num_docu_enc', '=', 'ENCencuestado.num_docu_enc')
                         ->where('ENCresultado.id_encuesta', '=', $id)
                         ->select('ENCencuestado.num_docu_enc','ENCencuestado.primer_nombre','ENCencuestado.segundo_nombre', 'ENCencuestado.primer_apellido', 'ENCencuestado.segundo_apellido')
                         ->distinct() 
                        ->get();*/
        $encuestado = Encuestado::all();
        $arrMuni= array("" => "Seleccione..")+ Municipio::whereId_departamento(41)->lists("nombre_municipio", "id_municipio");
       //return dd($arrMuni);
       return View::make("Encuesta.encuestado", 
               array("tipoEncuesta"=> $id, 
                        "encuestado" => $encuestado,
                        "arrMuni" => $arrMuni,
                    ));
   }   
   
   public function create() { 
       
       $respuesta = Encuestado::validarEncuestado(Input::all());
       $tipo_enc=Input::get("hidTipoEnc");
        if($respuesta["error"]== true)
        {
            return Redirect::action('EncuestadoController@formCrear', array($tipo_enc))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            $encuestado = new Encuestado();
            $encuestado->num_docu_enc=Input::get("txtNumDocu");
            $encuestado->primer_nombre= Input::get("txtPrimerNombre");
            $encuestado->segundo_nombre= Input::get("txtSegundoNombre");
            $encuestado->primer_apellido= Input::get("txtPrimerApe");
            $encuestado->segundo_apellido= Input::get("txtSegundoApe");
            $encuestado->usuario_creo=  Auth::user()->id;
            $encuestado->municipio= Input::get("selMuni");
            $encuestado->vereda= Input::get("selVereda");
            $encuestado->save();
            return Redirect::action('EncuestadoController@formCrear', array($tipo_enc))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
        

   }
   
   public function update($id) { 
       $respuesta = Encuestado::validarEncuestado(Input::all());
       $tipo_enc=Input::get("hidTipoEnc");
        if($respuesta["error"]== true)
        {
            return Redirect::action('EncuestadoController@formActualizar', array("tipo_enc" => $tipo_enc, "num_docu" => $id))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $encuestado = Encuestado::find($id);
            $encuestado->primer_nombre= Input::get("txtPrimerNombre");
            $encuestado->segundo_nombre= Input::get("txtSegundoNombre");
            $encuestado->primer_apellido= Input::get("txtPrimerApe");
            $encuestado->segundo_apellido= Input::get("txtSegundoApe");
            $encuestado->municipio= Input::get("selMuni");
            $encuestado->vereda= Input::get("selVereda");
            $encuestado->save();
            return Redirect::action('EncuestadoController@show', array($tipo_enc))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       
   }
   
   public function formCrear($id_tipo_enc)
   {
       $arrMuni= array("" => "Seleccione..")+ Municipio::whereId_departamento(41)
               ->orderBy("nombre_municipio")
               ->lists("nombre_municipio", "id_municipio");
       return View::make("Encuesta.Encuestado.crear", 
                            array("id" => $id_tipo_enc, 
                                    "arrMuni" => $arrMuni,
                                    ));
   }
   
   public function formActualizar($id_tipo_enc, $num_docu)
   {
        $encuestado = Encuestado::find($num_docu);
        $arrMuni= array("" => "Seleccione..")+ Municipio::whereId_departamento(41)
               ->orderBy("nombre_municipio")
               ->lists("nombre_municipio", "id_municipio");
        $arrVereda= array("" => "Seleccione..")+ Vereda::whereId_municipio($encuestado->municipio)
               ->orderBy("nombre_vereda")
               ->lists("nombre_vereda", "id_vereda");
        return View::make("Encuesta.Encuestado.crear", 
                            array("encuestado" => $encuestado,
                                    "id" => $id_tipo_enc,
                                    "arrMuni" => $arrMuni,
                                    "arrVereda" => $arrVereda,
                                    ));   
   }
   
   public function eliminar($tipoEnc, $numDocu)
   { 
       $encuestado = Encuestado::find($numDocu);
       $encuestado->delete();
       return Redirect::action('EncuestadoController@show', array($tipoEnc))->with("mensaje" , "Registro Eliminado");
   
   }
   
}