<?php

class TipoAspectosPreguntas extends Eloquent{
    protected $table = 'ENCtipo_asp_preg';
    protected $primaryKey = 'id_tipo_asp_preg';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function aspectoPreguntas()
    {
        return $this->belongsTo('AspectosPreguntas');
    }

}
