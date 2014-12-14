<?php

class CompesacionForestalController extends BaseController{
    public function eliminar($id,$especie,$pestana) { 
        $arr['especie']=$especie;
        $sele= CompensacionForestal::find($id,$arr);
        DB::table('SIcompensacion_forestal')
                ->where('id_mina','=', $id)
                ->where('especie','=', $especie)
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

