<?php

class Contaminantes  extends Eloquent{
    protected $table='SIcontaminantes';
    protected $primaryKey = 'id_planta';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function Plantael(){
        return $this->belongsTo('PlantaBeneficio', 'id_planta', 'id_planta');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return Contaminantes::where('id_planta','=', $id_mina)
                ->where('contaminate_agregado','=', $otros_campos['contaminate_agregado'])
                ->first();
    }
    
    
}

