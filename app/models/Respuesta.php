<?php

class Respuesta extends Eloquent{
    protected $table = 'ENCrespuestas';
    protected $primaryKey = 'id_respuesta';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function respuestaEncuesta()
    {
        return $this->hasOne('RespuestaEncuesta', 'id_respuesta');
    }
    
    public function tipoRpta()
    {
        return $this->belongsTo('TipoRespuesta');
    }

}
