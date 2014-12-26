<?php

class Resultado extends Eloquent{
    protected $table = 'ENCresultado';
    protected $primaryKey = 'num_docu_enc';
    protected $fillable = ['*'];
    public $timestamps = false;
    

}
