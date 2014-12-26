<?php

class ResultadoMultiple extends Eloquent{
    protected $table = 'ENCresultado_multiple';
    protected $primaryKey = 'num_docu_enc';
    protected $fillable = ['*'];
    public $timestamps = false;
    

}
