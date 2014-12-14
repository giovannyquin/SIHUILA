<?php

class ContaminantesController extends BaseController{
    public function eliminar($id,$nomComun,$pestana) { 
        $arr['contaminate_agregado']=$nomComun;
        $sele= Contaminantes::find($id,$arr);
        DB::table('SIcontaminantes')
                ->where('id_mina','=',$id)
                ->where('contaminate_agregado','=',$nomComun)
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

