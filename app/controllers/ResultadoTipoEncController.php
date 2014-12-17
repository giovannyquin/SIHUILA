<?php

class ResultadoTipoEncController extends BaseController{
   
   public function resultados($tipo_enc) {
      $pregunta= Pregunta::whereId_tipo_encuesta($tipo_enc)
              ->orderBy('num_pregunta', 'asc')->distinct()->get();
      foreach($pregunta as $preg)
      {
          $respuestas[$preg->num_pregunta]= RespuestaEncuesta::whereId_tipo_encuesta($tipo_enc)
                        ->whereId_tipo_rpta($preg->id_tipo_rpta)->distinct()->get();
          foreach($respuestas[$preg->num_pregunta] as $resp)
          {
                $busqueda=strpos($resp->nombre, 'Texto');
                if($busqueda!==FALSE) // solo para modo de respuesta con TEXTO
                {  
                    $resultadoPregTexto[$preg->num_pregunta]= ResultadoTexto::whereId_tipo_encuesta($tipo_enc)
                                            ->whereId_pregunta($preg->id_pregunta)
                                            ->where('valor_respuesta', '<>','""')
                                            ->distinct()->count();
                }
                else {
                    $tipoRpta= TipoRespuesta::whereId_tipo_rpta($resp->id_tipo_rpta)->get();
                    foreach($tipoRpta as $tipo)
                    {
                        if($tipo->id_modo_rpta==1) // unica respuesta
                        {
                            $resultadoResp[$preg->num_pregunta][$resp->id_respuesta]= Resultado::whereId_encuesta($tipo_enc)
                                            ->whereId_pregunta($preg->id_pregunta)
                                            ->whereId_respuesta($resp->id_respuesta)
                                            ->distinct()->count();
                            $resultadoPreg[$preg->num_pregunta]= Resultado::whereId_encuesta($tipo_enc)
                                            ->whereId_pregunta($preg->id_pregunta)
                                            ->distinct()->count();
                        }
                        elseif($tipo->id_modo_rpta==2) //multiple respuesta
                        {
                            $resultadoResp[$preg->num_pregunta][$resp->id_respuesta]= ResultadoMultiple::whereId_encuesta($tipo_enc)
                                            ->whereId_pregunta($preg->id_pregunta)
                                            ->whereId_respuesta($resp->id_respuesta)
                                            ->distinct()->count();
                            $resultadoPreg[$preg->num_pregunta]= ResultadoMultiple::whereId_encuesta($tipo_enc)
                                            ->whereId_pregunta($preg->id_pregunta)
                                            ->distinct()->count();
                        }      
                        
                    }
                    
                        if($resultadoPreg[$preg->num_pregunta]==0)
                        {
                            $resultadoRespPorc[$preg->num_pregunta][$resp->id_respuesta]= 0;
                        }
                        else
                        {
                            $resultadoRespPorc[$preg->num_pregunta][$resp->id_respuesta]= number_format($resultadoResp[$preg->num_pregunta][$resp->id_respuesta]*100/$resultadoPreg[$preg->num_pregunta],2);
                        }
                    
                    
                }
          }
           
      }
      //return $resultadoResp;
      return View::make("Encuesta.Social.resultadoEncuesta")
                        ->with("pregunta", $pregunta)
                        ->with("respuestas", $respuestas)
                        ->with("resultadoResp", $resultadoResp)
                        ->with("resultadoPreg", $resultadoPreg)
                        ->with("resultadoRespPorc", $resultadoRespPorc)
                        ->with("resultadoPregTexto", $resultadoPregTexto);
   }
   
   public function resultadosTexto($id_pregunta,$id_tipo_encuesta)
   {
       $respuesta= ResultadoTexto::whereId_tipo_encuesta($id_tipo_encuesta)
                                    ->whereId_pregunta($id_pregunta)->distinct()->get();
       foreach($respuesta as $rpta)
       {
           $encuestado[$rpta->num_docu_enc]= Encuestado::whereNum_docu_enc($rpta->num_docu_enc)->get();
           foreach ($encuestado[$rpta->num_docu_enc] as $enc)
           {
               $municipio[$rpta->num_docu_enc]= Municipio::whereId_municipio($enc->municipio)->first();
               $vereda[$rpta->num_docu_enc]= Vereda::whereId_vereda($enc->vereda)->first();
           }
       } //return dd($municipio);
       $pregunta= Pregunta::whereId_pregunta($id_pregunta)->get();
       return View::make("Encuesta.Social.resultadoTexto")
                            ->with("respuesta", $respuesta)
                            ->with("encuestado", $encuestado)
                            ->with("municipio", $municipio)
                            ->with("vereda", $vereda)
                            ->with("pregunta", $pregunta);
   }

}