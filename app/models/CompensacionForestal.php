<?php

class CompensacionForestal extends Eloquent{
    protected $table='SIcompensacion_forestal';
    protected $primaryKey='id_mina';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function MinaSel(){
        return $this->belongsTo('Mina', 'id_mina', 'id_mina');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return CompensacionForestal::where('id_mina','=', $id_mina)
                ->where('especie','=', $otros_campos['especie'])
                ->first();
    }
    
    
}

