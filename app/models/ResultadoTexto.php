<?php

class ResultadoTexto extends Eloquent{
    protected $table = 'ENCresultado_texto';
    protected $primaryKey = 'num_docu_enc';
    protected $fillable = ['*'];
    public $timestamps = false;
    

}
