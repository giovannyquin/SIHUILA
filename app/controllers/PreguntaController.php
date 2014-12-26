<?php

class PreguntaController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       
       $pregunta= Pregunta::whereId_tipo_encuesta($id)->get();
       
       if(!is_null($pregunta) && $pregunta->count())
       {
           foreach($pregunta as $pregunta2)
           {
               $aspecto= AspectosPreguntas::find($pregunta2->id_aspecto);
                $tipoaspecto = TipoAspectosPreguntas::find($pregunta2->id_tipo_asp_preg); 
                $tiporpta= TipoRespuesta::find($pregunta2->id_tipo_rpta);
           }
           
       }
       else
       {
            $aspecto= null;
            $tipoaspecto= null;
            $tiporpta= null;
       }
       //return dd($Aspecto);
       return View::make("Encuesta.pestanaPregunta", 
               array("tipoEncuesta"=> $id, 
                        "pregunta" => $pregunta,
                        "aspecto" => $aspecto,
                        "tipoaspecto" => $tipoaspecto,
                        "tiporpta" => $tiporpta,
                    ));
   }   
   
   public function create() { 
       
       $respuesta = Pregunta::validarPregunta(Input::all());
       $tipo_enc=Input::get("hidTipoEnc");
        if($respuesta["error"]== true)
        {
            return Redirect::action('PreguntaController@formCrear', array($tipo_enc))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            $pregunta = new Pregunta();
            $pregunta->id_tipo_encuesta=Input::get("hidTipoEnc");
            $pregunta->id_aspecto= Input::get("selAspPreg");
            $pregunta->id_tipo_asp_preg= Input::get("selTipAspPreg");
            $pregunta->id_tipo_rpta= Input::get("selTipo");
            $pregunta->nombre= Input::get("txtNombre");
            $numPre=$pregunta->validarNum(Input::get("selDesPreg"), Input::get("hidTipoEnc"));
            $pregunta->num_pregunta=$numPre;
            $pregunta->save();
            return Redirect::action('PreguntaController@show', array($tipo_enc))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
        $pregunta = Pregunta::find($id);
        $id_tipo_enc= $pregunta->id_tipo_encuesta;
        $aspecto= array("" => "Seleccione..")+AspectosPreguntas::find($pregunta->id_aspecto)->lists('nombre', 'id_aspecto_preg');
        $tipoaspecto= array("" => "Seleccione..")+ TipoAspectosPreguntas::find($pregunta->id_tipo_asp_preg)->lists("nombre", "id_tipo_asp_preg");
        $tiporpta= array("" => "Seleccione..")+ TipoRespuesta::find($pregunta->id_tipo_rpta)->lists("nombre", "id_tipo_rpta");
        $numpreg= array("" => "Seleccione..")+Pregunta::whereId_aspecto($pregunta->id_aspecto)
                            ->whereId_tipo_encuesta($pregunta->id_tipo_encuesta)->lists("num_pregunta", "id_pregunta");
        return View::make("Encuesta.Pregunta.crear", 
                            array("id" => $id_tipo_enc, 
                                    "tipoRpta" => $tiporpta,
                                    "aspPreg" => $aspecto,
                                    "tipoasppreg" => $tipoaspecto,
                                    "pregunta" => $pregunta,
                                    "numpreg" => $numpreg));

   }
   
   public function update($id) { 
       $respuesta = Pregunta::validarPregunta(Input::all());
       $tipo_enc=Input::get("hidTipoEnc");
        if($respuesta["error"]== true)
        {
            return Redirect::action('PreguntaController@formCrear', array($tipo_enc))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $pregunta = Pregunta::find($id);
            $pregunta->id_aspecto= Input::get("selAspPreg");
            $pregunta->id_tipo_asp_preg= Input::get("selTipAspPreg");
            $pregunta->id_tipo_rpta= Input::get("selTipo");
            $pregunta->nombre= Input::get("txtNombre");
            if($pregunta->id_pregunta<>Input::get("selDesPreg"))
            {
                //codigo para actualizar informacion del numero de la pregunta
            }
            $pregunta->save();
            return Redirect::action('PreguntaController@show', array($tipo_enc))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       $pregunta = Pregunta::find($id);
       $tipo_enc= $pregunta->id_tipo_encuesta;
       $pregunta->delete();
       return Redirect::action('PreguntaController@show', array($tipo_enc))->with("mensaje" , "Registro Eliminado");
   }
   
   public function formCrear($id_tipo_enc)
   {
       $TipoRpta= DB::table('ENCtipo_rpta')
                         ->join('ENCrespuestas', 'ENCtipo_rpta.id_tipo_rpta', '=', 'ENCrespuestas.id_tipo_rpta')
                         ->join('ENCrespuesta_encuesta', 'ENCrespuestas.id_respuesta', '=', 'ENCrespuesta_encuesta.id_respuesta')
                         ->where('ENCrespuesta_encuesta.id_tipo_encuesta', '=', $id_tipo_enc)
                         ->select('ENCtipo_rpta.nombre', 'ENCtipo_rpta.id_tipo_rpta');
       $AspPreg= array("" => "Seleccione..")+AspectosPreguntas::whereId_tipo_encuesta($id_tipo_enc)->lists("nombre", "id_aspecto_preg");
       //return dd($TipoRpta);
       $tipoRpta= array("" => "Seleccione..")+ $TipoRpta->lists('nombre', 'id_tipo_rpta');
       return View::make("Encuesta.Pregunta.crear", 
                            array("id" => $id_tipo_enc, 
                                    "tipoRpta" => $tipoRpta,
                                    "aspPreg" => $AspPreg));
   }
   
   public function formActualizar($id_tipo_enc, $id_tipo_resp)
   {
       
   }
   
}