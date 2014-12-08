<?php

class TipoRespuestaController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       
       $rptaEncuesta= RespuestaEncuesta::whereId_tipo_encuesta($id)->get();
       
       if(!is_null($rptaEncuesta) && $rptaEncuesta->count())
       {
           foreach($rptaEncuesta as $rptaEncuesta)
           {
               $rpta[]= Respuesta::find($rptaEncuesta->id_respuesta);
           }
           foreach($rpta as $rpta)
           {
               $tipoRpta= TipoRespuesta::whereId_tipo_rpta($rpta->id_tipo_rpta)->get();
               
           }
           /*foreach($tipoRpta as $tipoRptas)
           {
               $modoRpta= ModoRespuesta::whereId_modo_rpta($tipoRptas->id_modo_rpta)->first();
           } */   
           $tipoRpta= DB::table('ENCtipo_rpta')
                         ->join('ENCrespuestas', 'ENCtipo_rpta.id_tipo_rpta', '=', 'ENCrespuestas.id_tipo_rpta')
                         ->join('ENCrespuesta_encuesta', 'ENCrespuestas.id_respuesta', '=', 'ENCrespuesta_encuesta.id_respuesta')
                         ->where('ENCrespuesta_encuesta.id_tipo_encuesta', '=', $id)->get();
           $modoRpta=null;
       }
       else
       {
            $rpta= null;
            $tipoRpta= null;
            $modoRpta= ModoRespuesta::all();
       }
       return dd($tipoRpta);
       return View::make("Encuesta.pestanaTipoRpta", 
               array("tipoEncuesta"=> $id, 
                        "rptaEncuesta" => $rptaEncuesta,
                        "rpta" => $rpta,
                        "tipoRpta" => $tipoRpta,
                        "modoRpta" => $modoRpta,
                    ));
   }   
   
   public function create() { 
       
       $respuesta = TipoRespuesta::validarTipoRpta(Input::all());
        if($respuesta["error"]== true)
        {
            return Redirect::action('TipoRespuestaController@show', array($id))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            $id=Input::get("hidTipoEnc");
            $tipoR = new TipoRespuesta();
            $tipoR->id_modo_rpta=Input::get("selModo");
            $tipoR->nombre= Input::get("txtNombre");
            $tipoR->descripcion= Input::get("txtNombre");
            $tipoR->save();
            $DescModo= ModoRespuesta::find(Input::get("selModo"));
            $busqueda=strpos($DescModo->nombre, 'Texto');
            if($busqueda!==FALSE) // solo para modo de respuesta con TEXTO
            {
                $respuestas=new Respuesta();
                $respuestas->id_tipo_rpta= $tipoR->id_tipo_rpta;
                $respuestas->nombre= $tipoR->nombre;
                $respuestas->valor_numerico= 0;
                $respuestas->save();

                $respuestaEnc=new RespuestaEncuesta();
                $respuestaEnc->id_tipo_encuesta= $id;
                $respuestaEnc->id_respuesta= $respuestas->id_respuesta;
                $respuestaEnc->id_tipo_rpta= $tipoR->id_tipo_rpta;
                $respuestaEnc->nombre= $respuestas->nombre;
                $respuestaEnc->valor_numerico= $respuestas->valor_numerico;
                $respuestaEnc->save();
            }
            else // para modo de respuesta con opciones de respuesta
            {
                $txtNomRpta = Input::get("txtNomRpta");
                $txtValorRpta = Input::get("txtValorRpta");
                foreach($txtNomRpta as $clave => $valor){
                    if($this->noBlanco($valor)){
                        $respuestas=new Respuesta();
                        $respuestas->id_tipo_rpta= $tipoR->id_tipo_rpta;
                        $respuestas->nombre= $txtNomRpta[$clave];
                        $respuestas->valor_numerico= $txtValorRpta[$clave];
                        $respuestas->save();

                        $respuestaEnc=new RespuestaEncuesta();
                        $respuestaEnc->id_tipo_encuesta= $id;
                        $respuestaEnc->id_respuesta= $respuestas->id_respuesta;
                        $respuestaEnc->id_tipo_rpta= $tipoR->id_tipo_rpta;
                        $respuestaEnc->nombre= $respuestas->nombre;
                        $respuestaEnc->valor_numerico= $respuestas->valor_numerico;
                        $respuestaEnc->save();
                    }
                }
            }
            return Redirect::action('TipoRespuestaController@show', array($id))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
        
   }
   
   public function update($id) { 
       $respuesta = TipoRespuesta::validarTipoRpta(Input::all());
       $id_tipo_enc=Input::get("hidTipoEnc");
        if($respuesta["error"]== true)
        {
            //return (Input::all());
            return Redirect::action('TipoRespuestaController@formActualizar', array("id_tipo_enc" => $id_tipo_enc, "id" => $id))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            //$id=Input::get("hidTipoEnc");
            $tipoR = TipoRespuesta::find($id); //return dd($id);
            $tipoR->id_modo_rpta=Input::get("selModo");
            $tipoR->nombre= Input::get("txtNombre");
            $tipoR->descripcion= Input::get("txtNombre");
            $tipoR->save();
            $txtNomRpta = Input::get("txtNomRpta");
            $txtValorRpta = Input::get("txtValorRpta");
            $hidIdResp = Input::get("hidIdResp");
            foreach($txtNomRpta as $clave => $valor){
                if($this->noBlanco($valor)){
                    if(empty($hidIdResp[$clave])) //para crear las respuestas
                    {
                        $respuestas=new Respuesta();
                        $respuestas->id_tipo_rpta= $tipoR->id_tipo_rpta;
                        $respuestas->nombre= $txtNomRpta[$clave];
                        $respuestas->valor_numerico= $txtValorRpta[$clave];
                        $respuestas->save();

                        $respuestaEnc=new RespuestaEncuesta();
                        $respuestaEnc->id_tipo_encuesta= $id_tipo_enc;
                        $respuestaEnc->id_respuesta= $respuestas->id_respuesta;
                        $respuestaEnc->id_tipo_rpta= $tipoR->id_tipo_rpta;
                        $respuestaEnc->nombre= $respuestas->nombre;
                        $respuestaEnc->valor_numerico= $respuestas->valor_numerico;
                        $respuestaEnc->save();
                    }
                    else
                    {
                        $respuestas= Respuesta::find($hidIdResp[$clave]);
                        $respuestas->id_tipo_rpta= $tipoR->id_tipo_rpta;
                        $respuestas->nombre= $txtNomRpta[$clave];
                        $respuestas->valor_numerico= $txtValorRpta[$clave];
                        $respuestas->save();
                        
                        $respuestaEnc = RespuestaEncuesta::where('id_respuesta', '=',$hidIdResp[$clave])
                        ->where('id_tipo_encuesta', '=', $id_tipo_enc)
                                ->where('id_tipo_rpta', '=', $tipoR->id_tipo_rpta)
                                ->first();
                        $respuestaEnc->nombre= $respuestas->nombre;
                        $respuestaEnc->valor_numerico= $respuestas->valor_numerico;
                        $respuestaEnc->save();
                    }
                    
                }
            }
            return Redirect::action('TipoRespuestaController@show', array($id_tipo_enc))->with("mensaje", $respuesta["mensaje"]);
            return Redirect::to("vendedor")->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       
   }
   
   public function formCrear($id_tipo_enc)
   {
       $modoRpta= array("" => "Seleccione..")+ ModoRespuesta::all()->lists('nombre', 'id_modo_rpta');
       return View::make("Encuesta.TipoRpta.crear", array("id" => $id_tipo_enc, "modoRpta" => $modoRpta));
   }
   
   public function formActualizar($id_tipo_enc, $id_tipo_resp)
   {
       
       $tiporpta = TipoRespuesta::find($id_tipo_resp);
       $modoRpta= array("" => "Seleccione..")+ ModoRespuesta::all()->lists('nombre', 'id_modo_rpta');;
       $respuestasE= RespuestaEncuesta::whereId_tipo_rpta($id_tipo_resp)->whereId_tipo_encuesta($id_tipo_enc)->get();
       //if(Input::old())
       //return dd(Input::old());
       return View::make("Encuesta.TipoRpta.crear", 
               array("id" => $id_tipo_enc, 
                        "tiporpta" => $tiporpta, 
                        "modoRpta" => $modoRpta,
                        "respuestasE" => $respuestasE));
   }
   
}