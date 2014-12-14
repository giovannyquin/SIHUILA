<?php

class SeleccionMultipleController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       
   }   
   
   public function create() { 

   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 

   }
   
   public function update($id) { 

   }
   
   public function destroy($id)
   {
       
   }
   public function eliminar($id,$id_topologia,$asunto,$pestana) { 
       $arr['id_topologia']=$id_topologia;
       $arr['asunto']=$asunto;
       $sele= SeleccionMultiple::find($id, $arr);
       DB::table('SIseleccion_multiple')
                    ->where('id_mina','=', $id)
                    ->where('id_topologia','=', $id_topologia)
                    ->where('asunto','=',$asunto)
                    ->delete();
       
       return Redirect::action($pestana.'@show', array($id));
       if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $sele->$asunto . ' eliminado',
                'id'      => $sele->id_mina,
                'topologia' => $sele->id_topologia,
                'asunto'    => $sele->asunto
            ));
        }
        else
        {
            return Redirect::action('PestanaSisoController@show', array($id));
        }
   }
   
   
}