<?php

class PestanaSisoController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $mina= Mina::whereId_mina($id)->get();
       $detalle = DetalleMina::whereId_mina($id)->get();
       $arrayTipSegu=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPSEG')->lists('descripcion_toplogia', 'id_topologia');
       $SegSoc= SeleccionMultiple::whereId_mina($id)->whereAsunto('Pago Seg Social')->get();
       $arraySiNo= array("" => "Seleccione..", "Si" => "Si", "No" => "No");
       //return dd($SegSoc);
       return View::make("Pestanas.pestanaSiso", 
               array("minas"=> $mina, 
                        "detalle" => $detalle,
                        "SelSegSoc" => $arrayTipSegu,
                        "SegSoc" => $SegSoc,
                        "arraySiNo" => $arraySiNo,
                    ));
       //return 'Listo Sofia2';
   }   
   
   public function create() { 

   }
   
   public function store() { 
       $hid_mina= Input::get("hidMina");
       $selSeg= Input::get("selSeg");
       $selSegSi= Input::get("selSegSi");
       
       foreach($selSeg as $clave => $valor)
       {
           if($this->noBlanco($valor))
           {
                $arr['id_topologia']=$selSeg[$clave];
                $arr['asunto']="Pago Seg Social";
                unset($selMul);
                echo $selMul= SeleccionMultiple::find($hid_mina,$arr);
                if(is_null($selMul)) //para crear registros
                {
                    $selMul= new SeleccionMultiple();
                    $selMul->id_mina= Input::get("hidMina");
                    $selMul->id_topologia=$selSeg[$clave];
                    $selMul->resultado=$selSegSi[$clave];
                    $selMul->asunto='Pago Seg Social';
                    $selMul->save();
                }
                else // para actualizar registros
                {
                    // cuando hay multiples llaves primarias se debe hacer de esta manera
                    // laravel solo aguanta con eloquent cuando existe una llave primaria unicamente
                    DB::table('SIseleccion_multiple')
                    ->where('id_mina','=', Input::get("hidMina"))
                    ->where('id_topologia','=', $selSeg[$clave])
                    ->where('asunto','=','Pago Seg Social')
                    ->update(array('resultado' => $selSegSi[$clave]));
                }
                //echo var_dump($selMul);
                
           }
           
           
       }
       return Redirect::action('PestanaSisoController@show', array($hid_mina));
   }
   
   public function edit($id) { 

   }
   
   public function update($id) { 

   }
   
   public function destroy($id) { 

   }
   
   public function grabarDetalleMina($id){

   }
   
}