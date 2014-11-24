<?php

class PestanaJuridicoController extends BaseController{
   public function index() {
       //$this->show(Session::get(id_mina));
   }

   public function show($pestanaJuridico) { 
       $mina= Mina::whereId_mina($pestanaJuridico)->get();
       $detalle = DetalleMina::whereId_mina($pestanaJuridico)->get();
       $titular = TitularMinero::where('id_mina','=',$pestanaJuridico)->get();
       $arraySelOperacion=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipCon=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPTIT')->lists('descripcion_toplogia', 'id_topologia');
       $arrayActoTer=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipoRen=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPREN')->lists('descripcion_toplogia', 'id_topologia');;
       $arrayInsFor=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipoInsFor=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','INSLEG')->lists('descripcion_toplogia', 'id_topologia');;
       $arraySubTit=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       //return dd($arrayTipCon);
       return View::make("Pestanas.pestanaJuridico", 
               array("minas"=> $mina, 
                        "detalle" => $detalle,
                        "titular" => $titular,
                        "selOperacion" => $arraySelOperacion,
                        "tipTitulo" => $arrayTipCon,
                        "actoTer" => $arrayActoTer,
                        "tipoRen" => $arrayTipoRen,
                        "InstFor" => $arrayInsFor,
                        "TipoInsFor" => $arrayTipoInsFor,
                        "subTit" => $arraySubTit
                    ));
   }   
   
   public function create() { 
      
   }
   
   public function store() { 
       $detalle= DetalleMina::find(Input::get("hidMina"));
       //return dd($detalle);
       if(is_null($detalle))
       {
            $detalle= new DetalleMina();
            if($this->noBlanco(Input::get("hidMina")))
                $detalle->id_mina=Input::get("hidMina");
            if($this->noBlanco(Input::get("txtPlaca")))
                $detalle->num_placa_jur=Input::get("txtPlaca");
            if($this->noBlanco(Input::get("selOperacion")))
                $detalle->operaciones_amparo=Input::get("selOperacion");
            if($this->noBlanco(Input::get("selTipo")))
                $detalle->tipo_titulo_jur_amp=Input::get("selTipo");
            if($this->noBlanco(Input::get("selActoTer")))
                $detalle->acto_terminado_jur= Input::get("selActoTer");
            if($this->noBlanco(Input::get("selRenuncia")))
                $detalle->tipo_renuncia= Input::get("selRenuncia");
            if($this->noBlanco(Input::get("selInstForma")))
                $detalle->operaciones_instrumento= Input::get("selInstForma");
            if($this->noBlanco(Input::get("selTipoInst")))
                $detalle->tipo_instrumento= Input::get("selTipoInst");
            if($this->noBlanco(Input::get("txtEstadoInst")))
                $detalle->estado_instrumento=Input::get("txtEstadoInst");
            if($this->noBlanco(Input::get("selSupTit")))
                $detalle->operaciones_superpuestas= Input::get("selSupTit");
            if($this->noBlanco(Input::get("txtPlacaSup")))
                $detalle->num_placa_jur_super= Input::get("txtPlacaSup");
            if($this->noBlanco(Input::get("selTipoSup")))
                $detalle->tipo_titulo_jur_super= Input::get("selTipoSup"); 
            if($this->noBlanco(Input::get("selPosFor")))
                $detalle->posibilidad_formacion= Input::get("selPosFor");
            
            $detalle->save();
       }
       else {
           if($this->noBlanco(Input::get("txtPlaca")))
                $detalle->num_placa_jur=Input::get("txtPlaca");
            if($this->noBlanco(Input::get("selOperacion")))
                $detalle->operaciones_amparo=Input::get("selOperacion");
            if($this->noBlanco(Input::get("selTipo")))
                $detalle->tipo_titulo_jur_amp=Input::get("selTipo");
            if($this->noBlanco(Input::get("selActoTer")))
                $detalle->acto_terminado_jur= Input::get("selActoTer");
            if($this->noBlanco(Input::get("selRenuncia")))
                $detalle->tipo_renuncia= Input::get("selRenuncia");
            if($this->noBlanco(Input::get("selInstForma")))
                $detalle->operaciones_instrumento= Input::get("selInstForma");
            if($this->noBlanco(Input::get("selTipoInst")))
                $detalle->tipo_instrumento= Input::get("selTipoInst");
            if($this->noBlanco(Input::get("txtEstadoInst")))
                $detalle->estado_instrumento=Input::get("txtEstadoInst");
            if($this->noBlanco(Input::get("selSupTit")))
                $detalle->operaciones_superpuestas= Input::get("selSupTit");
            if($this->noBlanco(Input::get("txtPlacaSup")))
                $detalle->num_placa_jur_super= Input::get("txtPlacaSup");
            if($this->noBlanco(Input::get("selTipoSup")))
                $detalle->tipo_titulo_jur_super= Input::get("selTipoSup");
            if($this->noBlanco(Input::get("selPosFor")))
                $detalle->posibilidad_formacion= Input::get("selPosFor");
            $detalle->save();
       }
       /******* Guardamos y actualizamos el titular_minero *********/
       if($this->noBlanco(Input::get("txtCedTit")))
       {
           /*$titular= TitularMinero::whereId_mina(Input::get("hidMina"))
                   ->whereCedula_titular(Input::get("txtCedTit"))->get();*/
           /*$titular = TitularMinero::where(function($query){
               $query->where('id_mina', '=',Input::get("hidMina"))
                       ->where('cedula_titular', '=', Input::get("txtCedTit"));
           })->first();*/
           $titular = TitularMinero::where('id_mina', '=',Input::get("hidMina"))
                   ->where('cedula_titular', '=', Input::get("txtCedTit"))->first();
//return var_dump($titular);
            /*$titular= DB::table('SItitular')
                    ->join('SIminas', 'SItitular.id_mina', '=', 'SIminas.id_mina')
                    ->where('SItitular.cedula_titular', '=', Input::get("txtCedTit"));*/
            if(is_null($titular))
            {
                $titular= new TitularMinero();
                if($this->noBlanco(Input::get("txtCedTit")))
                     $titular->cedula_titular= Input::get("txtCedTit");
                if($this->noBlanco(Input::get("hidMina")))
                    $titular->id_mina=Input::get("hidMina");
                if($this->noBlanco(Input::get("txtPrimerTit")))
                     $titular->primer_nombre= Input::get("txtPrimerTit");
                if($this->noBlanco(Input::get("txtSegundoTit")))
                     $titular->segundo_nombre= Input::get("txtSegundoTit");
                if($this->noBlanco(Input::get("txtPrimerApeTit")))
                     $titular->primer_apellido= Input::get("txtPrimerApeTit");
                if($this->noBlanco(Input::get("txtSegundoApeTit")))
                     $titular->segundo_apellido= Input::get("txtSegundoApeTit");
                
                if($this->noBlanco(Input::get("txtDirecTit")))
                     $titular->direccion_titular= Input::get("txtDirecTit");
                if($this->noBlanco(Input::get("txtTelTit")))
                     $titular->telefono_titular= Input::get("txtTelTit");
                $titular->save();
            }
            else
            {
                if($this->noBlanco(Input::get("txtCedTit")))
                     $titular->cedula_titular= Input::get("txtCedTit");
                if($this->noBlanco(Input::get("txtPrimerTit")))
                     $titular->primer_nombre= Input::get("txtPrimerTit");
                if($this->noBlanco(Input::get("txtSegundoTit")))
                     $titular->segundo_nombre= Input::get("txtSegundoTit");
                if($this->noBlanco(Input::get("txtPrimerApeTit")))
                     $titular->primer_apellido= Input::get("txtPrimerApeTit");
                if($this->noBlanco(Input::get("txtSegundoApeTit")))
                     $titular->segundo_apellido= Input::get("txtSegundoApeTit");
                if($this->noBlanco(Input::get("txtDirecTit")))
                     $titular->direccion_titular= Input::get("txtDirecTit");
                if($this->noBlanco(Input::get("txtTelTit")))
                     $titular->telefono_titular= Input::get("txtTelTit");
                $titular->save();
            }
       }
       
       $arraySelOperacion=array("selOperacion" => array(""=>"Seleccione..","Si" => "Sí", "No" => "No"));
       //return dd($arraySelOperacion);
       $mina= Mina::whereId_mina($detalle->id_mina)->get();
       //return Redirect::route("pestanaJuridico", array("detalle" => $detalle, "selOperacion" => $arraySelOperacion));
       //return View::make("Pestanas.pestanaJuridico", array("minas"=> $mina, "detalle" => $detalle));
       //return Input::all();
       return Redirect::action('PestanaJuridicoController@show', array(1))->with("detalle", $detalle)->with("selOperacion", $arraySelOperacion);
   }
   
   public function edit($id) { 
       
   }
   
   public function update($id) { 

   }
   
   public function destroy($id) { 
       
   }

}

