<?php

class Contaminantes  extends Eloquent{
    protected $table='SIcontaminantes';
    protected $primaryKey = 'id_mina';
    //protected $fillable=["*"];
    public $incrementing =false;
    public $timestamps = false;
    
    public function MinaSel(){
        return $this->belongsTo('Mina', 'id_mina', 'id_mina');
    }
    
    public static function find($id_mina,$otros_campos=array()){        
        return Contaminantes::where('id_mina','=', $id_mina)
                ->where('contaminate_agregado','=', $otros_campos['contaminate_agregado'])
                ->first();
    }
    
    
}

