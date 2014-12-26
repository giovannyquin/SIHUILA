<?php

class PlantaBeneficioController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       
       $frente= Mina::whereId_mina($id)->first();
       $planta= PlantaBeneficio::whereId_mina($id)->get();
       $unidad= MinaMina::whereId_minamina($frente->id_minamina)->first();
       //return dd($depto);
       return View::make("FormMinas.PlantaBeneficio.listarPlantasBeneficio", 
               array("unidad"=> $unidad, 
                        "frente" => $frente,
                        "planta" =>$planta,
                    ));
   }   
   
   public function create() { 
       $respuesta = PlantaBeneficio::validarPlanta(Input::all());
       $id_frente=Input::get("hidFrente");
        if($respuesta["error"]== true)
        {
            return Redirect::action('PlantaBeneficioController@formCrear', array($id_frente))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $planta = new PlantaBeneficio();
            $planta->nombre= Input::get("txtNombre");
            $planta->descripcion= Input::get("txtDesc");
            $planta->id_mina = $id_frente;
            $planta->save();
            return Redirect::action('PlantaBeneficioController@show', array($planta->id_mina))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
       $planta= PlantaBeneficio::find($id);
       $frente= Mina::whereId_mina($planta->id_mina)->first();
       $unidad= MinaMina::whereId_minamina($frente->id_minamina)->first();
        return View::make("FormMinas.PlantaBeneficio.crear", 
                           array("unidad"=> $unidad, 
                                "frente" => $frente,
                                "planta" =>$planta,
                            ));

   }
   
   public function update($id) { 
       $respuesta = PlantaBeneficio::validarPlanta(Input::all());
       $id_frente=Input::get("hidFrente");
        if($respuesta["error"]== true)
        {
            return Redirect::action('PlantaBeneficioController@edit', array($id_frente))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $planta = PlantaBeneficio::find($id);
            $planta->nombre= Input::get("txtNombre");
            $planta->descripcion= Input::get("txtDesc");
            $planta->save();
            return Redirect::action('PlantaBeneficioController@show', array($planta->id_mina))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       $planta = PlantaBeneficio::find($id);
       $frente= $planta->id_mina;
       $planta->delete();
       return Redirect::action('PlantaBeneficioController@show', array($frente))->with("mensaje" , "Registro Eliminado");
   }
   
   public function formCrear($id_frente)
   {
       $frente= Mina::find($id_frente);
       $unidad= MinaMina::whereId_minamina($frente->id_minamina);
       return View::make("FormMinas.PlantaBeneficio.crear", 
                            array("id" => $id_frente, 
                                    "frente" => $frente,
                                    "unidad" => $unidad,
                                    ));
   }
   
   /*
    * Metodo para mostrar las plantas de beneficio de los frentes que van a ser trabajadas
    * @Autor Giovanny Quintero
    * @Fecha 17-Dic-2014
    * @Param $id id del frente minero del cual se van a listar las plantas
    */
   public function listarPlantas($id) {  
       
       $frente= Mina::whereId_mina($id)->first();
       $planta= PlantaBeneficio::whereId_mina($id)->get();
       $unidad= MinaMina::whereId_minamina($frente->id_minamina)->first();
       //return dd($depto);
       return View::make("FormMinas.PlantaBeneficio.listarPlantas", 
               array("unidad"=> $unidad, 
                        "frente" => $frente,
                        "planta" =>$planta,
                    ));
   }
}