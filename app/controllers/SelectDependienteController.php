<?php

class SelectDependienteController extends BaseController
{
    function select()
    {
        if(Request::ajax()){
            $opcion= Input::get("opcion");
            switch($opcion)
            {
                case "TipoAspPreg":
                    $id=Input::get("dato");
                    $tipo= TipoAspectosPreguntas::whereId_aspecto_preg($id);
                    return $tipo->lists("nombre", "id_tipo_asp_preg");
                break;
                case "NumPreg":
                    $idaspecto=Input::get("aspecto");
                    $tipoenc=Input::get("tipoenc");
                    $preg= Pregunta::whereId_aspecto($idaspecto)
                            ->whereId_tipo_encuesta($tipoenc)->get();
                    if($preg->count())
                    {
                        return $preg->lists("num_pregunta", "id_pregunta");
                    }
                    else
                    {
                        $preg= Pregunta::whereId_tipo_encuesta($tipoenc)
                                ->get();
                        if($preg->count())
                        {
                            $maxpreg= Pregunta::whereId_tipo_encuesta($tipoenc)
                                ->max('num_pregunta');
                             //return (array("0" => $maxpreg));
                            $preg2= Pregunta::whereId_tipo_encuesta($tipoenc)
                                                ->whereNum_pregunta($maxpreg)->get();
                            return $preg2->lists("num_pregunta", "id_pregunta");
                        }
                        else
                        {
                            return (array("0" => "0"));
                        }                        
                    }
                    
                break;
                case "mostrarVereda":
                    $municipio=Input::get("dato");
                    $vereda= Vereda::whereId_municipio($municipio);
                    return $vereda->lists("nombre_vereda", "id_vereda");
                break;
                case "mostrarMunicipio":
                    $depto=Input::get("dato");
                    $municipio= Municipio::whereId_departamento($depto);
                    return $municipio->lists("nombre_municipio", "id_municipio");
                break;
            } 
        }
    }
}

