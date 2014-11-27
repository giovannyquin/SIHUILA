<?php

class SeleccionMultiple extends Eloquent{
    protected $table='SIseleccion_multiple';
    protected $primaryKey = 'id_topologia';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function MinaSel()
    {
        return $this->belongsTo('Mina', 'id_mina', 'id_mina');
    }
    
    public static function find($id_mina, $otros_campos= array())
    {
        
        return SeleccionMultiple::where('id_mina','=', $id_mina)
                ->where('id_topologia','=', $otros_campos['id_topologia'])
                ->where('asunto','=', $otros_campos['asunto'])
                ->first();
    }
    
    
}

