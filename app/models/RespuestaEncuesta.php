<?php

class RespuestaEncuesta extends Eloquent{
    protected $table = 'ENCrespuesta_encuesta';
    protected $primaryKey = 'id_respuesta';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function respuesta()
    {
        return $this->belongsTo('Respuesta');
    }
}
