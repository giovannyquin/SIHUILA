<?php

class EspeciesAnimalesController extends BaseController{
    public function eliminar($id,$nomComun,$pestana) { 
        $arr['nombre_comun']=$nomComun;
        $sele= EspeciesAnimales::find($id,$arr);
        DB::table('SIespecies_animales')
                ->where('id_mina','=',$id)
                ->where('nombre_comun','=',$nomComun)
                ->delete();
        return Redirect::action($pestana.'@show',array($id));

        if (Request::ajax()){
             return Response::json(array (
                 'success' => true,
                 'msg'     => 'Usuario ' . $sele->$asunto . ' eliminado',
                 'id'      => $sele->id_mina,
                 'topologia' => $sele->id_topologia,
                 'asunto'    => $sele->asunto
             ));
        }else{
            return Redirect::action('PestanaSisoController@show', array($id));
        }
    }

}

