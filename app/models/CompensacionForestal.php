<?php

class CompensacionForestal extends Eloquent{
    protected $table='SIcompensacion_forestal';
    protected $primaryKey='id_planta';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function Plantael(){
        return $this->belongsTo('PlantaBeneficio', 'id_planta', 'id_planta');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return CompensacionForestal::where('id_planta','=', $id_mina)
                ->where('especie','=', $otros_campos['especie'])
                ->first();
    }
    
    
}

