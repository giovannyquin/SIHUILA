<?php

class TitularMinero extends Eloquent{
    protected $table='SItitular_minero';
    protected $primaryKey = 'id_minamina';
    //protected $fillable=["*"];
    public $incrementing =false;
    
    public function MinaTit()
    {
        return $this->belongsTo('MinaMina', 'id_minamina', 'id_minamina');
    }
    
    public static function find($id_mina, $ced_titular= array())
    {
        
        return TitularMinero::where('id_minamina','=', $id_mina)
                ->where('ced_titular','=', $ced_titular)
                ->first();
    }
    
    
}

