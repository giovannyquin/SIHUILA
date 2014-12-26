<?php

class EncuestaSocialController extends BaseController
{
    public function mostrarEncuesta($tipo_en, $num_docu)
    {
        $aspecto= AspectosPreguntas::whereId_tipo_encuesta($tipo_en)->orderBy('id_aspecto_preg', 'asc')->get();
        //return dd($aspecto);
        foreach($aspecto as $aspectos)
        {
            $asID=trim($aspectos->id_aspecto_preg);
            $tipoAspectos[$asID]= TipoAspectosPreguntas::whereId_tipo_encuesta($tipo_en)
                                        ->whereId_aspecto_preg($aspectos->id_aspecto_preg)
                                        ->orderBy('id_aspecto_preg', 'asc')->get();
            foreach($tipoAspectos[$asID] as $tipo)
            {
                $tipoID=trim($tipo->id_tipo_asp_preg);
                $preguntas[$asID][$tipoID] = Pregunta::whereId_tipo_encuesta($tipo_en)
                                            ->whereId_aspecto($aspectos->id_aspecto_preg)
                                            ->whereId_tipo_asp_preg($tipoID)
                                            ->orderBy('id_aspecto', 'asc', 'num_pregunta', 'asc')->get();
                foreach($preguntas[$asID][$tipoID] as $pre)
                {
                    $pregID=$pre->id_pregunta;
                    $modoPre[$pregID]=DB::table('ENCpregunta')
                                        ->join('ENCtipo_rpta', 'ENCpregunta.id_tipo_rpta', '=', 'ENCtipo_rpta.id_tipo_rpta')
                                        ->where('ENCpregunta.id_pregunta', '=', $pregID)
                                        ->join('ENCmodo_rpta', 'ENCtipo_rpta.id_modo_rpta', '=', 'ENCmodo_rpta.id_modo_rpta')
                                        ->select('ENCmodo_rpta.nombre','ENCmodo_rpta.id_modo_rpta', 'ENCpregunta.num_pregunta')
                                        ->distinct() 
                                        ->orderBy('ENCpregunta.num_pregunta', 'asc')
                                       ->get();
                    $tipoRpta[$pregID]=DB::table('ENCpregunta')
                                            ->join('ENCrespuesta_encuesta', 'ENCpregunta.id_tipo_rpta', '=', 'ENCrespuesta_encuesta.id_tipo_rpta')
                                            ->where('ENCpregunta.id_pregunta', '=', $pregID)
                                            ->where('ENCrespuesta_encuesta.id_tipo_encuesta', '=', $tipo_en)
                                            ->select('ENCrespuesta_encuesta.id_respuesta', 'ENCrespuesta_encuesta.nombre', 'ENCrespuesta_encuesta.valor_numerico')
                                            ->distinct()
                                            ->orderBy('valor_numerico', 'asc')
                                            ->get();
                    $resultado[$pregID][$tipo_en][$num_docu]=  Resultado::whereId_encuesta($tipo_en)
                                                                            ->whereNum_docu_enc($num_docu)
                                                                            ->whereId_pregunta($pregID)
                                                                            ->get()
                                                                            ;
                    $resultadoTexto[$pregID][$tipo_en][$num_docu]=  ResultadoTexto::whereId_tipo_encuesta($tipo_en)
                                                                            ->whereNum_docu_enc($num_docu)
                                                                            ->whereId_pregunta($pregID)
                                                                            ->get();
                    $resultMultiple[$pregID][$tipo_en][$num_docu]=  ResultadoMultiple::whereId_encuesta($tipo_en)
                                                                            ->whereNum_docu_enc($num_docu)
                                                                            ->whereId_pregunta($pregID)
                                                                            ->get();
                    /*recorremos el array para guardar todas las respuestas*/
                    foreach($resultMultiple[$pregID][$tipo_en][$num_docu] as $res)
                    {
                        $idrpta=$res->id_respuesta;
                        $resultadoMultiple[$pregID][$tipo_en][$num_docu][$idrpta]=$idrpta;
                    }
                                                                            
                }
            }   
        }
        //return dd($resultadoTexto);
        if(!isset($resultadoMultiple)) $resultadoMultiple=null;
        return View::make("Encuesta.Social.verEncuesta", 
                array("aspecto" => $aspecto,
                    "tipoAspectos" => $tipoAspectos,
                    "preguntas" => $preguntas,
                    "modoPre" => $modoPre,
                    "tipoRpta" => $tipoRpta,
                    "tipoEncuesta" => $tipo_en,
                    "num_docu" => $num_docu,
                    "resultado" => $resultado,
                    "resultadoTexto" => $resultadoTexto,
                    "resultadoMultiple" => $resultadoMultiple,
                        ));
        
    }
    
    public function guardarTextNumero()
    {
        if(Request::ajax()){
            $opcion= Input::get("opcion");
            switch($opcion)
            {
                case 'guardaTextoNum':
                    $id_pregunta= Input::get('id_pregunta');
                    $tipoEncuesta= Input::get('tipoEncuesta');
                    $num_docu= Input::get('num_docu');
                    $valor= Input::get('valor');
                    $resul= ResultadoTexto::whereNum_docu_enc($num_docu)
                                            ->whereId_pregunta($id_pregunta)
                                            ->whereId_tipo_encuesta($tipoEncuesta)
                                            ->get();
                    //return dd($resul->count());
                    if($resul->count()==0)
                    { echo "guardar ".$valor;
                       if(!empty($valor))
                        {
                            $resul = new ResultadoTexto();
                            $resul->id_pregunta=$id_pregunta;
                            $resul->id_tipo_encuesta=$tipoEncuesta;
                            $resul->num_docu_enc=$num_docu;
                            $resul->valor_respuesta=$valor;
                            $resul->save();
                            return "guardo";
                        }
                        
                    }
                    else
                    {
                        if(empty($valor))
                        {
                            DB::table('ENCresultado_texto')
                            ->where('num_docu_enc','=', $num_docu)
                            ->where('id_tipo_encuesta','=', $tipoEncuesta)
                            ->where('id_pregunta','=',$id_pregunta)
                            ->delete();
                        }
                        else
                        {
                            DB::table('ENCresultado_texto')
                            ->where('num_docu_enc','=', $num_docu)
                            ->where('id_tipo_encuesta','=', $tipoEncuesta)
                            ->where('id_pregunta','=',$id_pregunta)
                            ->update(array('valor_respuesta' => $valor));
                        }
                        return "actualizo";
                    }
                break;
                case 'guardaUnicaRpta':
                    $id_pregunta= Input::get('id_pregunta');
                    $tipoEncuesta= Input::get('tipoEncuesta');
                    $num_docu= Input::get('num_docu');
                    $id_respuesta= Input::get('id_respuesta');
                    $resul= Resultado::whereNum_docu_enc($num_docu)
                                            ->whereId_pregunta($id_pregunta)
                                            ->whereId_encuesta($tipoEncuesta)
                                            ->get();
                    //return dd($resul->count());
                    if($resul->count()==0)
                    {
                        $resul = new Resultado();
                        $resul->id_pregunta=$id_pregunta;
                        $resul->id_encuesta=$tipoEncuesta;
                        $resul->num_docu_enc=$num_docu;
                        $resul->id_respuesta=$id_respuesta;
                        $resul->save();
                        //return "guardo";
                    }
                    else
                    {
                        DB::table('ENCresultado')
                        ->where('num_docu_enc','=', $num_docu)
                        ->where('id_encuesta','=', $tipoEncuesta)
                        ->where('id_pregunta','=',$id_pregunta)
                        ->update(array('id_respuesta' => $id_respuesta));
                        //return "actualizo";
                    }
                break;
                case 'guardaMultipleRpta':
                    $id_pregunta= Input::get('id_pregunta');
                    $tipoEncuesta= Input::get('tipoEncuesta');
                    $num_docu= Input::get('num_docu');
                    $id_respuesta= Input::get('id_respuesta');
                    $estado = Input::get('estado');
                    /*$resul= ResultadoMultiple::whereNum_docu_enc($num_docu)
                                            ->whereId_pregunta($id_pregunta)
                                            ->whereId_encuesta($tipoEncuesta)
                                            ->get();*/
                    //return dd($resul->count());
                    if($estado=='SI')
                    {
                         $resul = new ResultadoMultiple();
                        $resul->id_pregunta=$id_pregunta;
                        $resul->id_encuesta=$tipoEncuesta;
                        $resul->num_docu_enc=$num_docu;
                        $resul->id_respuesta=$id_respuesta;
                        $resul->save();
                    }
                    else
                    {
                        DB::table('ENCresultado_multiple')
                        ->where('num_docu_enc','=', $num_docu)
                        ->where('id_encuesta','=', $tipoEncuesta)
                        ->where('id_pregunta','=',$id_pregunta)
                                ->where('id_respuesta','=',$id_respuesta)
                                ->delete();
                    }
                    
                break;
            }
        }
    }
}

