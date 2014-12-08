<?php

class TipoEncuesta extends Eloquent{
    protected $table = 'ENCtipo_encuesta';
    protected $primaryKey = 'id_tipo_encuesta';
    protected $fillable = ['*'];
    public $timestamps = false;

}
