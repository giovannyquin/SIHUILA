<?php

class FrenteMineroController extends BaseController{
   public function index() {
    
   }

   public function show($id) {  
       $unidad= MinaMina::whereId_minamina($id)->first();
       $frente= Mina::whereId_minamina($id)->get();
       if(count($frente))
       {
           foreach($frente as $fr)
           {
               $depto[$fr->id_mina]= Departamento::whereId_departamento($fr->depto)->distinct()
                       ->lists('nombre_departamento');
               $muni[$fr->id_mina] = Municipio::whereId_municipio($fr->municipio)->distinct()
                       ->lists('nombre_municipio');
               $vereda[$fr->id_mina]= Vereda::whereId_vereda($fr->vereda)->distinct()
                       ->lists('nombre_vereda');
           }
           
       }
       else
       {
           $depto=null;
           $muni=null;
           $vereda=null;
       }
       //return dd($depto);
       return View::make("FormMinas.FrenteMinero.listarFrentes", 
               array("unidad"=> $unidad, 
                        "frente" => $frente,
                        "depto" =>$depto,
                        "muni" => $muni,
                        "vereda" => $vereda,
                    ));
   }   
   
   public function create() { 
       $respuesta = Mina::validarFrente(Input::all());
       $id_unidad=Input::get("hidUnidad");
        if($respuesta["error"]== true)
        {
            return Redirect::action('FrenteMineroController@formCrear', array($id_unidad))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $frente = new Mina();
            $frente->nombre_mina= Input::get("txtNombre");
            $frente->depto= Input::get("selDeptoMina");
            $frente->municipio= Input::get("selMuniMina");
            $frente->vereda= Input::get("selVeredaMina");
            $frente->descripcion_mina= Input::get("txtDesc");
            $frente->id_minamina = $id_unidad;
            $frente->save();
            return Redirect::action('FrenteMineroController@show', array($frente->id_minamina))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
       $frente= Mina::whereId_mina($id)->first();
       $unidad= MinaMina::whereId_minamina($frente->id_minamina)->first();
       $depto= array("" => "Seleccione..")+  Departamento::all()->lists('nombre_departamento', 'id_departamento');
       $muni= array("" => "Seleccione..")+Municipio::whereId_departamento($frente->depto)->lists('nombre_municipio', 'id_municipio');
       $vereda= array("" => "Seleccione..")+Vereda::whereId_municipio($frente->municipio)->lists('nombre_vereda', 'id_vereda');
        return View::make("FormMinas.FrenteMinero.crear", 
                           array("unidad"=> $unidad, 
                                "frente" => $frente,
                                "depto" =>$depto,
                                "muni" => $muni,
                                "vereda" => $vereda,
                            ));

   }
   
   public function update($id) { 
       $respuesta = Mina::validarFrente(Input::all());
        if($respuesta["error"]== true)
        {
            return Redirect::action('FrenteMineroController@edit', array($id))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            $frente = Mina::find($id);
            $frente->nombre_mina= Input::get("txtNombre");
            $frente->depto= Input::get("selDeptoMina");
            $frente->municipio= Input::get("selMuniMina");
            $frente->vereda= Input::get("selVeredaMina");
            $frente->descripcion_mina= Input::get("txtDesc");
            $frente->save();
            return Redirect::action('FrenteMineroController@show', array($frente->id_minamina))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       $frente = Mina::find($id);
       $unidad= $frente->id_minamina;
       $frente->delete();
       return Redirect::action('FrenteMineroController@show', array($unidad))->with("mensaje" , "Registro Eliminado");
   }
   
   public function formCrear($id_unidad)
   {
       $unidad= MinaMina::find($id_unidad);
       $arrDpto= array("" => "Seleccione..")+ Departamento::all()->lists('nombre_departamento','id_departamento');
       return View::make("FormMinas.FrenteMinero.crear", 
                            array("id" => $id_unidad, 
                                    "arrDpto" => $arrDpto,
                                    "unidad" => $unidad,
                                    ));
   }
   
   /*
    * Metodo para listar frentes de las unidades mineras que van a ver los profesioanales
    * @Autor Giovanny Quintero
    * @Fecha 17-Dic-2014
    * @param $id Id de la unidad minera de la cual se va a listar los frentes
    */
   public function listarFrentes($id)
   {
       $unidad= MinaMina::whereId_minamina($id)->first();
       $frente= Mina::whereId_minamina($id)->get();
       if(count($frente))
       {
           foreach($frente as $fr)
           {
               $depto[$fr->id_mina]= Departamento::whereId_departamento($fr->depto)->distinct()
                       ->lists('nombre_departamento');
               $muni[$fr->id_mina] = Municipio::whereId_municipio($fr->municipio)->distinct()
                       ->lists('nombre_municipio');
               $vereda[$fr->id_mina]= Vereda::whereId_vereda($fr->vereda)->distinct()
                       ->lists('nombre_vereda');
           }
           
       }
       else
       {
           $depto=null;
           $muni=null;
           $vereda=null;
       }
       //return dd($depto);
       return View::make("FormMinas.FrenteMinero.listarFrentesMineros", 
               array("unidad"=> $unidad, 
                        "frente" => $frente,
                        "depto" =>$depto,
                        "muni" => $muni,
                        "vereda" => $vereda,
                    ));
   }
   
}