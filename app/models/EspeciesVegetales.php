<?php

class EspeciesVegetales extends Eloquent{
    protected $table='SIespecies_vegetales';
    protected $primaryKey = 'id_mina';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function MinaSel(){
        return $this->belongsTo('Mina', 'id_mina', 'id_mina');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return EspeciesVegetales::where('id_mina','=', $id_mina)
                ->where('nombre_comun','=', $otros_campos['nombre_comun'])
                ->first();
    }
    
    
}

