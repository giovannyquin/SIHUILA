<?php

class TipoRespuesta extends Eloquent{
    protected $table = 'ENCtipo_rpta';
    protected $primaryKey = 'id_tipo_rpta';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function modoRpta()
    {
        return $this->belongsTo('ModoRespuesta');
    }
    
    public function respuesta()
    {
        return $this->hasMany('Respuesta', 'id_tipo_rpta');
    }
    
    public static function validarTipoRpta($input)
    {
        $respuesta = array();
        
        $reglas = array(
            "txtNombre" => array("required", "max:200"),
            "selModo" => array("required", "max:100"),
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

}
