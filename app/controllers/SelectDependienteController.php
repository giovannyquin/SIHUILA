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
                        return (array("0" => "0"));
                    }
                    
                break;
            } 
        }
    }
}

