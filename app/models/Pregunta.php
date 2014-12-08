<?php

class Pregunta extends Eloquent{
    protected $table = 'ENCpregunta';
    protected $primaryKey = 'id_pregunta';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public static function validarPregunta($input)
    {
        $respuesta = array();
        $reglas = array(
            "txtNombre" => array("required"),
            "selTipo" => array("required"),
            "selAspPreg" => array("required"),
            "selTipAspPreg" => array("required"),
            "selDesPreg" => array("required"),
        );
        $validator = Validator::make($input, $reglas);
        if($validator->fails())
        {
            $respuesta["mensaje"] = $validator;
            $respuesta["error"] =true;
        }
        else
        {            
            $respuesta["mensaje"] = "Vendedor creado!";
            $respuesta["error"] = false;
            //$respuesta["data"] = $vendedor;
        }
        return $respuesta;
    }
    
    /*
     * Metodo para especificar el orden del numero donde ingresara la pregunta
     * @Autor Giovanny Quintero
     * @Fecha 06-Dic-2014
     * @param $numSelect Integer
     */
    public function validarNum($numSelect, $idTipoEnc)
    {
        if($numSelect==0)
        {
            $var=1;
        }
        else
        {
            $numSelect=$numSelect+1;
            $preg= Pregunta::whereId_tipo_encuesta($idTipoEnc)->whereNum_pregunta($numSelect)->get();
            if($preg->count())
            {
                $preg2= Pregunta::whereId_tipo_encuesta($idTipoEnc)
                                    ->where("num_pregunta", ">=", $numSelect)
                                        ->select("id_pregunta")->get();
                foreach($preg2 as $p)
                {
                    //campo para actualizar las preguntas con numero posterior
                }
            }
            $var=$numSelect;
        }
        return $var;
    }
}
