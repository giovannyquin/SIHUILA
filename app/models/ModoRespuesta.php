<?php

class ModoRespuesta extends Eloquent{
    protected $table = 'ENCmodo_rpta';
    protected $primaryKey = 'id_modo_rpta';
    protected $fillable = ['*'];
    public $timestamps = false;
    
    public function tipoRpta()
    {
        return $this->hasMany('TipoRespuesta', 'id_modo_rpta');
    }

}
