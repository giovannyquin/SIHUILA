<?php

class PestanaJuridicoController extends BaseController{
   public function index() {
       //$this->show(Session::get(id_mina));
   }

   public function show($pestanaJuridico) { 
       //$mina= Mina::whereId_mina($pestanaJuridico)->get();
       $mina= Mina::find($pestanaJuridico);
       $detalle = DetalleMina::whereId_mina($pestanaJuridico)->first();
       //$detalle =  DetalleMina::find($pestanaJuridico);
       //$titular= $mina->titularMinero;
       //$titular = $mina->titularMinero()->where('id_mina','=',$pestanaJuridico)->first();
       $titular= TitularMinero::whereId_mina($pestanaJuridico)->first();
       $arraySelOperacion=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipCon=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPTIT')->lists('descripcion_toplogia', 'id_topologia');
       $arrayActoTer=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipoRen=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPREN')->lists('descripcion_toplogia', 'id_topologia');;
       $arrayInsFor=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       $arrayTipoInsFor=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','INSLEG')->lists('descripcion_toplogia', 'id_topologia');;
       $arraySubTit=array(""=>"Seleccione..","Si" => "Sí", "No" => "No");
       //return dd($detalle);
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
       $respuesta= pestanaJuridico::agregarJuridico(Input::all());
       if($respuesta["error"]==true)
       {
           //return var_dump($respuesta["mensaje"]);
           return Redirect::action('PestanaJuridicoController@show', array(1))
                    ->withErrors($respuesta["mensaje"])->withInput();
       }
       else
       {
           $detalle= DetalleMina::find(Input::get("hidMina"));
            //return dd($detalle);
            if(is_null($detalle))
            {
                 $detalle= new DetalleMina();
                 if($this->noBlanco(Input::get("hidMina")))
                     $detalle->id_mina=Input::get("hidMina");
                 if($this->noBlanco(Input::get("selActExtr")))
                     $detalle->extr_min=Input::get("selActExtr");
                 if($this->noBlanco(Input::get("selPto")))
                     $detalle->pto_aprob=Input::get("selPto");
                 if($this->noBlanco(Input::get("selLic")))
                     $detalle->lic_amb=Input::get("selLic");
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
                 if($this->noBlanco(Input::get("selTitDis")))
                     $detalle->titular_negociar= Input::get("selTitDis"); 
                 if($this->noBlanco(Input::get("selInfDis")))
                     $detalle->informal_formalizar= Input::get("selInfDis");
                 
                     $detalle->derechos_reales= input::get("txtDerOpe");
                    $detalle->acciones_op_minera= input::get("txtAccMin");

                     /*$detalle->id_mina=$this->noBlanco(Input::get("hidMina"));
                     $detalle->num_placa_jur=$this->noBlanco(Input::get("txtPlaca"));
                     $detalle->operaciones_amparo=$this->noBlanco(Input::get("selOperacion"));
                     $detalle->tipo_titulo_jur_amp=$this->noBlanco(Input::get("selTipo"));
                     $detalle->acto_terminado_jur= $this->noBlanco(Input::get("selActoTer"));
                     $detalle->tipo_renuncia= $this->noBlanco(Input::get("selRenuncia"));
                     $detalle->operaciones_instrumento= $this->noBlanco(Input::get("selInstForma"));
                     $detalle->tipo_instrumento= $this->noBlanco(Input::get("selTipoInst"));
                     $detalle->estado_instrumento=$this->noBlanco(Input::get("txtEstadoInst"));
                     $detalle->operaciones_superpuestas= $this->noBlanco(Input::get("selSupTit"));
                     $detalle->num_placa_jur_super= $this->noBlanco(Input::get("txtPlacaSup"));
                     $detalle->tipo_titulo_jur_super= $this->noBlanco(Input::get("selTipoSup")); 
                     $detalle->posibilidad_formacion= $this->noBlanco(Input::get("selPosFor"));
                     $detalle->titular_negociar= $this->noBlanco(Input::get("selTitDis")); 
                     $detalle->informal_formalizar= $this->noBlanco(Input::get("selInfDis"));*/
                 $detalle->save();
            }
            else {
                if($this->noBlanco(Input::get("selActExtr")))
                     $detalle->extr_min=Input::get("selActExtr");
                if($this->noBlanco(Input::get("selPto")))
                     $detalle->pto_aprob=Input::get("selPto");
                if($this->noBlanco(Input::get("selLic")))
                     $detalle->lic_amb=Input::get("selLic");
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
                 if($this->noBlanco(Input::get("selTitDis")))
                     $detalle->titular_negociar= Input::get("selTitDis"); 
                 if($this->noBlanco(Input::get("selInfDis")))
                     $detalle->informal_formalizar= Input::get("selInfDis");
                 
                 $detalle->derechos_reales= input::get("txtDerOpe");
                 $detalle->acciones_op_minera= input::get("txtAccMin");

                 /*$detalle->num_placa_jur=$this->noBlanco(Input::get("txtPlaca"));
                     $detalle->operaciones_amparo=$this->noBlanco(Input::get("selOperacion"));
                     $detalle->tipo_titulo_jur_amp=$this->noBlanco(Input::get("selTipo"));
                     $detalle->acto_terminado_jur= $this->noBlanco(Input::get("selActoTer"));
                     $detalle->tipo_renuncia= $this->noBlanco(Input::get("selRenuncia"));
                     $detalle->operaciones_instrumento= $this->noBlanco(Input::get("selInstForma"));
                     $detalle->tipo_instrumento= $this->noBlanco(Input::get("selTipoInst"));
                     $detalle->estado_instrumento=$this->noBlanco(Input::get("txtEstadoInst"));
                     $detalle->operaciones_superpuestas= $this->noBlanco(Input::get("selSupTit"));
                     $detalle->num_placa_jur_super= $this->noBlanco(Input::get("txtPlacaSup"));
                     $detalle->tipo_titulo_jur_super= $this->noBlanco(Input::get("selTipoSup")); 
                     $detalle->posibilidad_formacion= $this->noBlanco(Input::get("selPosFor"));
                     $detalle->titular_negociar= $this->noBlanco(Input::get("selTitDis")); 
                     $detalle->informal_formalizar= $this->noBlanco(Input::get("selInfDis"));*/
                     //return dd($detalle);
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
     //return count($titular);
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
                     //return var_dump($titular);
                     $titular->save();
                 }
                 else
                 {
                     //echo var_dump($titular);
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
                     //echo "<br>".var_dump($titular);
                     //return var_dump($titular);
                     $titular->save();
                     
                 }
            }

            //return dd($arraySelOperacion);
            //return Redirect::route("pestanaJuridico", array("detalle" => $detalle, "selOperacion" => $arraySelOperacion));
            //return View::make("Pestanas.pestanaJuridico", array("minas"=> $mina, "detalle" => $detalle));
            //return Input::all();
            return Redirect::action('PestanaJuridicoController@show', array($detalle->id_mina));
       }
       
   }
   
   public function edit($id) { 
       
   }
   
   public function update($id) { 

   }
   
   public function destroy($id) { 
       
   }

}

