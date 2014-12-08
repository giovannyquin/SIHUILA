<?php

class AspectosPreguntas extends Eloquent{
    protected $table = 'ENCaspecto_preguntas';
    protected $primaryKey = 'id_aspecto_preg';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function tipoAspPreg()
    {
        return $this->hasMany('TipoAspectosPreguntas');
    }

}
