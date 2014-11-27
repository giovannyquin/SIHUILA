<?php

class TitularMinero extends Eloquent{
    protected $table='SItitular_minero';
    protected $primaryKey = 'id_mina';
    //protected $fillable=["*"];
    public $incrementing =false;
    
    public function MinaTit()
    {
        return $this->belongsTo('Mina', 'id_mina', 'id_mina');
    }
    
    public static function find($id_mina, $ced_titular= array())
    {
        
        return TitularMinero::where('id_mina','=', $id_mina)
                ->where('ced_titular','=', $ced_titular)
                ->first();
    }
    
    
}

