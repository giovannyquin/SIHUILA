<?php

class PestanaSisoController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $mina= Mina::whereId_mina($id)->get();
       $detalle = DetalleMina::whereId_mina($id)->get();
       $siso = Siso::whereId_mina($id)->get();
       $arrSiNo= array("" => "Seleccione..", "Si" => "Si", "No" => "No");
       $arrTipSegSoc=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPSEG')->lists('descripcion_toplogia','id_topologia');
       $arrSegSoc= SeleccionMultiple::whereId_mina($id)->whereAsunto('Pago Seg Social')->get();
       $arrTipEleEme=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ATEME')->lists('descripcion_toplogia','id_topologia');
       $arrEleEme= SeleccionMultiple::whereId_mina($id)->whereAsunto('Elementos de Emergencia')->get();
       $arrTipElePro=array(''=>'Seleccione..')+Topologia::whereCod_topologia('EPP')->lists('descripcion_toplogia','id_topologia');
       $arrElePro= SeleccionMultiple::whereId_mina($id)->whereAsunto('Elementos de Proteccion')->get();
       $arrSumElePro= SeleccionMultiple::whereId_mina($id)->whereAsunto('Suministra Elementos de Proteccion')->get();
       $arrTipSerBas=array(''=>'Seleccione..')+Topologia::whereCod_topologia('SERBAS')->lists('descripcion_toplogia','id_topologia');
       $arrSerBas= SeleccionMultiple::whereId_mina($id)->whereAsunto('Servicios Basicos')->get();
       $arrTipAspBen=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ASPBT')->lists('descripcion_toplogia','id_topologia');
       $arrAspBen= SeleccionMultiple::whereId_mina($id)->whereAsunto('Beneficio y Transformacion')->get();
       $arrTipExpBen=array(''=>'Seleccione..')+Topologia::whereCod_topologia('SEEBT')->lists('descripcion_toplogia','id_topologia');
       $arrZonExpDel= SeleccionMultiple::whereId_mina($id)->whereAsunto('Zona de Explotacion Delimitada')->get();
       $arrExpBen= SeleccionMultiple::whereId_mina($id)->whereAsunto('Explotacion y Beneficio')->get();
       return View::make("Pestanas.pestanaSiso",compact('mina','detalle','siso','arrSiNo','arrTipSegSoc','arrSegSoc',
               'arrTipEleEme','arrEleEme','arrTipElePro','arrElePro','arrSumElePro','arrTipSerBas','arrSerBas','arrTipAspBen',
               'arrAspBen','arrTipExpBen','arrExpBen','arrZonExpDel'));
       //return 'Listo Sofia2';
   }   
   
   public function create() { 

   }
   
   public function store() {
#------------------------------------------ Pago Seg Social -----------------------------------------
       if($this->noBlanco(Input::get("selSeg"))){ 
           $selSeg = Input::get("selSeg");
           foreach($selSeg as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selSeg[$clave];
               }
           }
          $selSegSi = Input::get("selSegSi");
          foreach($selSegSi as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['resultado']=$selSegSi[$clave];
                  $arr['asunto']="Pago Seg Social";
                  unset($selMul);
                  $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                  if(is_null($selMul)){ //para crear registros
                      $selMul=new SeleccionMultiple();
                      $selMul->id_mina= Input::get("hidMina");
                      $selMul->id_topologia=$selSeg[$clave];
                      $selMul->asunto="Pago Seg Social";
                      $selMul->resultado=$selSegSi[$clave];
                      $selMul->save();
                  }
                  
              }
          }
       }
#------------------------------------------ Pago Seg Social -----------------------------------------

#------------------------------------------ Elementos de Emergencia ---------------------------------
       if($this->noBlanco(Input::get("selElBas"))){ 
           $selElBas = Input::get("selElBas");
           foreach($selElBas as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selElBas[$clave];
               }
           }
          $selEleBasSi = Input::get("selEleBasSi");
          foreach($selEleBasSi as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['resultado']=$selEleBasSi[$clave];
                  $arr['asunto']="Elementos de Emergencia";
#                  unset($selMulEleBas);
                  $selMulEleBas=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                  if(is_null($selMulEleBas)){ //para crear registros
                      $selMulEleBas=new SeleccionMultiple();
                      $selMulEleBas->id_mina= Input::get("hidMina");
                      $selMulEleBas->id_topologia=$selElBas[$clave];
                      $selMulEleBas->resultado=$selEleBasSi[$clave];
                      $selMulEleBas->asunto="Elementos de Emergencia";
                      $selMulEleBas->save();
                  }
              }
          }
       }
#------------------------------------------ Elementos de Emergencia ---------------------------------

#------------------------------------------ Elementos de Proteccion ---------------------------------
       if($this->noBlanco(Input::get("selBotProt"))){ 
           $selBotProt = Input::get("selBotProt");
           foreach($selBotProt as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selBotProt[$clave];
               }
           }
          $selProtSi = Input::get("selProtSi");
          foreach($selProtSi as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['resultado']=$selProtSi[$clave];
                  $arr['asunto']="Elementos de Proteccion";
#                  unset($selMulElePro);
                  $selMulElePro=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                  if(is_null($selMulElePro)){ //para crear registros
                      $selMulElePro=new SeleccionMultiple();
                      $selMulElePro->id_mina= Input::get("hidMina");
                      $selMulElePro->id_topologia=$selBotProt[$clave];
                      $selMulElePro->resultado=$selProtSi[$clave];
                      $selMulElePro->asunto="Elementos de Proteccion";
                      $selMulElePro->save();
                  }
              }
          }
       }
#------------------------------------------ Elementos de Proteccion ---------------------------------

#------------------------------------------ Suministra Elementos de Proteccion ---------------------------------
       if($this->noBlanco(Input::get("selProtSop"))){ 
           $selProtSop = Input::get("selProtSop");
           foreach($selProtSop as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selProtSop[$clave];
               }
           }
          $selProtSopSi = Input::get("selProtSopSi");
          foreach($selProtSopSi as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['resultado']=$selProtSopSi[$clave];
                  $arr['asunto']="Suministra Elementos de Proteccion";
                  unset($selMulSumElePro);
                  echo $selMulSumElePro=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                  #return $selMulSumElePro;
                  if(is_null($selMulSumElePro)){ //para crear registros
                      $selMulSumElePro=new SeleccionMultiple();
                      $selMulSumElePro->id_mina= Input::get("hidMina");
                      $selMulSumElePro->id_topologia=$selProtSop[$clave];
                      $selMulSumElePro->resultado=$selProtSopSi[$clave];
                      $selMulSumElePro->asunto="Suministra Elementos de Proteccion";
                      $selMulSumElePro->save();
                  }
              }
          }
       }
#------------------------------------------ Suministra Elementos de Proteccion ---------------------------------

#------------------------------------------ Servicios Basicos ---------------------------------
       if($this->noBlanco(Input::get("selSerBas"))){ 
           $selSerBas = Input::get("selSerBas");
           foreach($selSerBas as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selSerBas[$clave];
               }
           }
          $selSerBasSi = Input::get("selSerBasSi");
          foreach($selSerBasSi as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['resultado']=$selSerBasSi[$clave];
                  $arr['asunto']="Servicios Basicos";
                  unset($selMulSerBas);
                  echo $selMulSerBas=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                  #return $selMulSumElePro;
                  if(is_null($selMulSerBas)){ //para crear registros
                      $selMulSerBas=new SeleccionMultiple();
                      $selMulSerBas->id_mina= Input::get("hidMina");
                      $selMulSerBas->id_topologia=$selSerBas[$clave];
                      $selMulSerBas->resultado=$selSerBasSi[$clave];
                      $selMulSerBas->asunto="Servicios Basicos";
                      $selMulSerBas->save();
                  }
              }
          }
       }
#------------------------------------------ Servicios Basicos ---------------------------------

#------------------------------------------ Beneficio y Transformacion ---------------------------------
       if($this->noBlanco(Input::get("selAspBen"))){ 
           $selAspBen = Input::get("selAspBen");
           foreach($selAspBen as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selAspBen[$clave];
               }
           }
          
           if($this->noBlanco(Input::get("selAspBenSi"))){ 
                $selAspBenSi=Input::get("selAspBenSi");

                foreach($selAspBenSi as $clave => $valor){
                   if($this->noBlanco($valor)){
                       $arr['resultado']=$selAspBenSi[$clave];
                       $arr['asunto']="Beneficio y Transformacion";
                       unset($selMulBenTra);
                       echo $selMulSerBas=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                       #return $selMulSumElePro;
                       if(is_null($selMulSerBas)){ //para crear registros
                           $selMulBenTra=new SeleccionMultiple();
                           $selMulBenTra->id_mina= Input::get("hidMina");
                           $selMulBenTra->id_topologia=$selAspBen[$clave];
                           $selMulBenTra->resultado=$selAspBenSi[$clave];
                           $selMulBenTra->asunto="Beneficio y Transformacion";
                           $selMulBenTra->save();
                       }
                   }
               }
           }
       }
#------------------------------------------ Beneficio y Transformacion ---------------------------------

#------------------------------------------ Explotacion y Beneficio ---------------------------------
       if($this->noBlanco(Input::get("selSenSeg"))){ 
           $selSenSeg = Input::get("selSenSeg");
           foreach($selSenSeg as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selSenSeg[$clave];
               }
           }
           if($this->noBlanco(Input::get("selSenSegSi"))){ 
                $selSenSegSi=Input::get("selSenSegSi");

                foreach($selSenSegSi as $clave => $valor){
                   if($this->noBlanco($valor)){
                       $arr['resultado']=$selSenSegSi[$clave];
                       $arr['asunto']="Explotacion y Beneficio";
                       unset($selMulExpBen);
                       echo $selMulExpBen=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                       #return $selMulSumElePro;
                       if(is_null($selMulExpBen)){ //para crear registros
                           $selMulExpBen=new SeleccionMultiple();
                           $selMulExpBen->id_mina= Input::get("hidMina");
                           $selMulExpBen->id_topologia=$selSenSeg[$clave];
                           $selMulExpBen->resultado=$selSenSegSi[$clave];
                           $selMulExpBen->asunto="Explotacion y Beneficio";
                           $selMulExpBen->save();
                       }
                   }
               }
           }
       }
#------------------------------------------ Explotacion y Beneficio ---------------------------------

#------------------------------------------ Zona de Explotacion Delimitada ---------------------------------
       if($this->noBlanco(Input::get("selZonDel"))){ 
           $selZonDel = Input::get("selZonDel");
           foreach($selZonDel as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selZonDel[$clave];
               }
           }
           if($this->noBlanco(Input::get("selZonDelSi"))){ 
                $selZonDelSi=Input::get("selZonDelSi");

                foreach($selZonDelSi as $clave => $valor){
                   if($this->noBlanco($valor)){
                       $arr['resultado']=$selZonDelSi[$clave];
                       $arr['asunto']="Zona de Explotacion Delimitada";
                       unset($selMulExpBenDel);
                       echo $selMulExpBenDel=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                       #return $selMulSumElePro;
                       if(is_null($selMulExpBenDel)){ //para crear registros
                           $selMulExpBenDel=new SeleccionMultiple();
                           $selMulExpBenDel->id_mina= Input::get("hidMina");
                           $selMulExpBenDel->id_topologia=$selZonDel[$clave];
                           $selMulExpBenDel->resultado=$selZonDelSi[$clave];
                           $selMulExpBenDel->asunto="Zona de Explotacion Delimitada";
                           $selMulExpBenDel->save();
                       }
                   }
               }
           }
       }
#------------------------------------------ Zona de Explotacion Delimitada ---------------------------------

#------------------------------------------ Tabla SISO -----------------------------------------
       $siso=Siso::find(Input::get("hidMina"));
       if(is_null($siso)){
           $siso= new Siso();
           if($this->noBlanco(Input::get("hidMina"))) $siso->id_mina=Input::get("hidMina");
       }
       if($this->noBlanco(Input::get("selAccLab"))) $siso->acci_laboral=Input::get("selAccLab");
       if($this->noBlanco(Input::get("txtAccLab"))) $siso->num_acc=Input::get("txtAccLab");
       if($this->noBlanco(Input::get("selRepAccLab"))) $siso->report_acc=Input::get("selRepAccLab");
       if($this->noBlanco(Input::get("selBrig"))) $siso->brigadista=Input::get("selBrig");
       if($this->noBlanco(Input::get("selRegHig"))) $siso->reg_pub=Input::get("selRegHig");
       if($this->noBlanco(Input::get("selCopaso"))) $siso->copaso=Input::get("selCopaso");
       if($this->noBlanco(Input::get("selSenal"))) $siso->segnal=Input::get("selSenal");
       if($this->noBlanco(Input::get("selInsSan"))) $siso->inst_san=Input::get("selInsSan");
       if($this->noBlanco(Input::get("selPozSep"))) $siso->pozo_sep=Input::get("selPozSep");
       if($this->noBlanco(Input::get("selCasino"))) $siso->campamento=Input::get("selCasino");
       if($this->noBlanco(Input::get("selAseo"))) $siso->orden=Input::get("selAseo");
       if($this->noBlanco(Input::get("selCtrlAcc"))) $siso->control_visitantes=Input::get("selCtrlAcc");
       if($this->noBlanco(Input::get("selDesli"))) $siso->desliz=Input::get("selDesli");
       if($this->noBlanco(Input::get("selSenaliz"))) $siso->desliz_delim=Input::get("selSenaliz");
       if($this->noBlanco(Input::get("selEtDelim"))) $siso->delim_zonas=Input::get("selEtDelim");
       if($this->noBlanco(Input::get("selCtrRies"))) $siso->control_reduc_ries=Input::get("selCtrRies");
       if($this->noBlanco(Input::get("selAplCtrRies"))) $siso->reduc_ries_trab=Input::get("selAplCtrRies");
       if($this->noBlanco(Input::get("selMetET"))) $siso->met_et_def=Input::get("selMetET");
       if($this->noBlanco(Input::get("selAbaRec"))) $siso->area_trab_ant=Input::get("selAbaRec");
       if($this->noBlanco(Input::get("selEster"))) $siso->disp_ester=Input::get("selEster");
       if($this->noBlanco(Input::get("selAseCal"))) $siso->ase_ext_cal=Input::get("selAseCal");
       if($this->noBlanco(Input::get("selProTra"))) $siso->proc_transf=Input::get("selProTra");
       if($this->noBlanco(Input::get("selEqProTra"))) $siso->equipo_trans=Input::get("selEqProTra");
       if($this->noBlanco(Input::get("selTalMec"))) $siso->taller_meca=Input::get("selTalMec");
       if($this->noBlanco(Input::get("selAlmCom"))) $siso->alma_comb=Input::get("selAlmCom");
       if($this->noBlanco(Input::get("selEleCump"))) $siso->sistem_segu=Input::get("selEleCump");
       if($this->noBlanco(Input::get("selPerExp"))) $siso->perm_explo=Input::get("selPerExp");
       if($this->noBlanco(Input::get("selPerCap"))) $siso->personal_explo=Input::get("selPerCap");
       if($this->noBlanco(Input::get("selDisEst"))) $siso->disposicion_explo=Input::get("selDisEst");
       if($this->noBlanco(Input::get("selMedCom"))) $siso->comun_cargue=Input::get("selMedCom");
       if($this->noBlanco(Input::get("selVia"))) $siso->vias_trans_peato=Input::get("selVia");
       if($this->noBlanco(Input::get("selVia"))) $siso->vias_trans_peato=Input::get("selVia");
       
       if($this->noBlanco(Input::get("selBueOrg"))) $siso->buena_org_et=Input::get("selBueOrg");
       if($this->noBlanco(Input::get("selResPel"))) $siso->residuos_bene=Input::get("selResPel");
       if($this->noBlanco(Input::get("selEvVer"))) $siso->vertimentos=Input::get("selEvVer");
       if($this->noBlanco(Input::get("seTraAl"))) $siso->altura=Input::get("seTraAl");
       if($this->noBlanco(Input::get("selCapEpp"))) $siso->capacit_altura=Input::get("selCapEpp");
       if($this->noBlanco(Input::get("selExti"))) $siso->num_extintor=Input::get("selExti");
       
       $siso->save();
#------------------------------------------ Tabla SISO -----------------------------------------
       return Redirect::action('PestanaSisoController@show',array(Input::get("hidMina")));
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