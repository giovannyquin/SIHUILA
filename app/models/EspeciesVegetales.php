<?php

class EspeciesVegetales extends Eloquent{
    protected $table='SIespecies_vegetales';
    protected $primaryKey = 'id_planta';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function Plantael(){
        return $this->belongsTo('PlantaBeneficio', 'id_planta', 'id_planta');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return EspeciesVegetales::where('id_planta','=', $id_mina)
                ->where('nombre_comun','=', $otros_campos['nombre_comun'])
                ->first();
    }
    
    
}

