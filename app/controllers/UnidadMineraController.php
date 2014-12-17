<?php

class UnidadMineraController extends BaseController{
   
    public function index() {
       $unidad = MinaMina::all();
       if(count($unidad))
       {
           foreach($unidad as $uni)
           { 
               $depto[$uni->id_minamina]= Departamento::whereId_departamento($uni->id_depto)->distinct()
                       ->lists('nombre_departamento');
               $muni[$uni->id_minamina] = Municipio::whereId_municipio($uni->id_municipio)->distinct()
                       ->lists('nombre_municipio');
               $vereda[$uni->id_minamina]= Vereda::whereId_vereda($uni->id_vereda)->distinct()
                       ->lists('nombre_vereda');
           }   
       }
       else
       {
           $depto= null;
           $muni=null;
           $vereda= null;
       }
       return View::make('FormMinas.listarUnidadesMinas')
               ->with('unidad', $unidad)
                ->with('depto', $depto)
                ->with('municipio', $muni)
                ->with('vereda', $vereda);
   }

   public function show($id) {  
        
   }   
   
   public function create() { 
       
       $respuesta = MinaMina::validarUnidad(Input::all());
        if($respuesta["error"]== true)
        {
            return Redirect::action('UnidadMineraController@formCrear')
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            $unidad = new MinaMina();
            $unidad->nombre=trim(Input::get("txtNombre"));
            $unidad->id_depto= Input::get("selDeptoMina");
            $unidad->id_municipio= Input::get("selMuniMina");
            $unidad->id_vereda= Input::get("selVeredaMina");
            $unidad->descripcion= trim(Input::get("txtDesc"));
            $unidad->save();
            return Redirect::action('UnidadMineraController@formCrear')->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function store() { 
       
   }
   
   public function edit($id) { 
        $unidad = MinaMina::find($id); //return dd($unidad);
        $depto= array("" => "Seleccione..")+  Departamento::all()->lists('nombre_departamento', 'id_departamento');
        $muni= array("" => "Seleccione..")+Municipio::whereId_departamento($unidad->id_depto)->lists('nombre_municipio', 'id_municipio');
        $vereda= array("" => "Seleccione..")+Vereda::whereId_municipio($unidad->id_municipio)->lists('nombre_vereda', 'id_vereda');
        return View::make("FormMinas.UnidadMinera.crear", array($id))
                ->with("unidad", $unidad)
                ->with("muni", $muni)
                ->with("vereda", $vereda)
                ->with("depto", $depto);
   }
   
   public function update($id) { 
       $respuesta = MinaMina::validarUnidad(Input::all());
        if($respuesta["error"]== true)
        {
            return Redirect::action('UnidadMineraController@edit', array($id))
                    ->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            //return Input::get("selModo");
            $unidad = MinaMina::find($id);
            $unidad->nombre=trim(Input::get("txtNombre"));
            $unidad->id_depto= Input::get("selDeptoMina");
            $unidad->id_municipio= Input::get("selMuniMina");
            $unidad->id_vereda= Input::get("selVeredaMina");
            $unidad->descripcion= trim(Input::get("txtDesc"));
            $unidad->save();
            return Redirect::action('UnidadMineraController@edit', array($id))->with("mensaje", $respuesta["mensaje"]);
        }
   }
   
   public function destroy($id) { 
       $unidad = MinaMina::find($id);
       $unidad->delete();
       return Redirect::action('UnidadMineraController@index')->with("mensaje" , "Registro Eliminado");
   }
   
   public function formCrear($id='')
   {
       if(!empty($id)) $id=null;
       $arrDpto= array("" => "Seleccione..")+ Departamento::all()->lists('nombre_departamento','id_departamento');
       return View::make("FormMinas.UnidadMinera.crear", 
                            array("id" => $id, 
                                    "arrDpto" => $arrDpto,
                                    ));
   }
   
   /*
    * Metodo para mostrar las minas que los usuarios van a almacenar la información
    * @Autor Giovanny Quintero
    * @fecha 16-Dic-2014
    */
   public function listarUnidades()
   {
       $unidad = MinaMina::all();
       if(count($unidad))
       {
           foreach($unidad as $uni)
           { 
               $depto[$uni->id_minamina]= Departamento::whereId_departamento($uni->id_depto)->distinct()
                       ->lists('nombre_departamento');
               $muni[$uni->id_minamina] = Municipio::whereId_municipio($uni->id_municipio)->distinct()
                       ->lists('nombre_municipio');
               $vereda[$uni->id_minamina]= Vereda::whereId_vereda($uni->id_vereda)->distinct()
                       ->lists('nombre_vereda');
           }   
       }
       else
       {
           $depto= null;
           $muni=null;
           $vereda= null;
       }
       return View::make('FormMinas.UnidadMinera.listarUnidades')
               ->with('unidad', $unidad)
                ->with('depto', $depto)
                ->with('municipio', $muni)
                ->with('vereda', $vereda);
   }
}