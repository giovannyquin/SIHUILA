<?php

class PestanaAmbientalPlantaController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $planta = PlantaBeneficio::whereId_planta($id)->first();
       $mina=Mina::whereId_mina($planta->id_mina)->first();
       $ambiental=AmbientalPlanta::whereId_planta($id)->first();
       $arrSiNo=array('' => 'Seleccione..','Si'=>'Si','No'=>'No');
       $arrTipAflu=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPAFLU')->lists('descripcion_toplogia','id_topologia');
       $arrAfeHid=array(''=>'Seleccione..')+Topologia::whereCod_topologia('AFEHID')->lists('descripcion_toplogia','id_topologia');
       $arrContaminate=Contaminantes::whereId_planta($id)->get();
       $arrEspeciesVegetales=EspeciesVegetales::whereId_planta($id)->get();
       $arrCompensacionForestal=CompensacionForestal::whereId_planta($id)->get();
       $arrTipManAguLluv=array(''=>'Seleccione..')+Topologia::whereCod_topologia('MANAGULLU')->lists('descripcion_toplogia','id_topologia');
       $arrTipVert=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPVERT')->lists('descripcion_toplogia','id_topologia');
       $arrTipTratAgu=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TRATAGURES')->lists('descripcion_toplogia','id_topologia');
       $arrActCie=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTCIEABA')->lists('descripcion_toplogia','id_topologia');
       $arrDescCobVeg=array(''=>'Seleccione..')+Topologia::whereCod_topologia('COBEVEGE')->lists('descripcion_toplogia','id_topologia');
       $arrTipManjAgu=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPMANAGUS')->lists('descripcion_toplogia','id_topologia');
       $arrTipFue=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPFUENTE')->lists('descripcion_toplogia','id_topologia');
       $arrResulMonit=array(''=>'Seleccione..')+Topologia::whereCod_topologia('RESUMONIT')->lists('descripcion_toplogia','id_topologia');
       $arrTipImpSuel=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPIMPSUEL')->lists('descripcion_toplogia','id_topologia');
       $arrSobrSolido=array(''=>'Seleccione..')+Topologia::whereCod_topologia('PROSOLBENF')->lists('descripcion_toplogia','id_topologia');
       $arrTipResGen=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPRESGEN')->lists('descripcion_toplogia','id_topologia');
       $arrDisFinRes=array(''=>'Seleccione..')+Topologia::whereCod_topologia('DISFINRESI')->lists('descripcion_toplogia','id_topologia');
       $arrTipCobeVege=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPCOBVEG')->lists('descripcion_toplogia','id_topologia');
       $arrCobeVegeReti=array(''=>'Seleccione..')+Topologia::whereCod_topologia('COBRETIRA')->lists('descripcion_toplogia','id_topologia');
       $arrDescCobeVege=array(''=>'Seleccione..')+Topologia::whereCod_topologia('DESCCOBVEG')->lists('descripcion_toplogia','id_topologia');
       $arrTipoPerm=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPPERMAMB')->lists('descripcion_toplogia','id_topologia');
       return View::make('PestanasPlantas.pestanaAmbiental')->with("planta", $planta)
               ->with("mina", $mina)
               ->with("ambiental", $ambiental)
               ->with("arrSiNo", $arrSiNo)
               ->with("arrTipAflu", $arrTipAflu)
               ->with("arrAfeHid", $arrAfeHid)
               ->with("arrContaminate", $arrContaminate)
               ->with("arrEspeciesVegetales", $arrEspeciesVegetales)
               ->with("arrCompensacionForestal", $arrCompensacionForestal)
               ->with("arrTipManAguLluv", $arrTipManAguLluv)
               ->with("arrTipVert", $arrTipVert)
               ->with("arrTipTratAgu", $arrTipTratAgu)
               ->with("arrActCie", $arrActCie)
               ->with("arrDescCobVeg", $arrDescCobVeg)
               ->with("arrTipManjAgu", $arrTipManjAgu)
               ->with("arrTipFue", $arrTipFue)
               ->with("arrResulMonit", $arrResulMonit)
               ->with("arrTipImpSuel", $arrTipImpSuel)
               ->with("arrSobrSolido", $arrSobrSolido)
               ->with("arrTipResGen", $arrTipResGen)
               ->with("arrDisFinRes", $arrDisFinRes)
               ->with("arrTipCobeVege", $arrTipCobeVege)
               ->with("arrCobeVegeReti", $arrCobeVegeReti)
               ->with("arrDescCobeVege", $arrDescCobeVege)
               ->with("arrTipoPerm", $arrTipoPerm)
           ;
   }   
   
   public function create() { 

   }
   
   public function store() { 
#----------------------------------------- Ambiental -----------------------------------------------------------
#      return "Sofia Mi Viday Hare Todo Para Que Estes Bien ".Input::get("hidMina");
       $ambientalPlanta=AmbientalPlanta::find(Input::get("hidPlanta"));
       if(is_null($ambientalPlanta)){
           $ambientalPlanta= new AmbientalPlanta();
           if($this->noBlanco(Input::get("hidPlanta"))) $ambientalPlanta->id_planta=Input::get("hidPlanta");
       }
       if($this->noBlanco(Input::get("selUsoHidZon"))) $ambientalPlanta->uso_recurso_hidrico=Input::get("selUsoHidZon");
       if($this->noBlanco(Input::get("selPerAgua"))) $ambientalPlanta->perm_concesion_agua=Input::get("selPerAgua");
       if($this->noBlanco(Input::get("txtNumPerAgua"))) $ambientalPlanta->num_perm_conc_agua=Input::get("txtNumPerAgua");
       if($this->noBlanco(Input::get("txtVigPerAgua"))) $ambientalPlanta->vigencia_perm_conc_agua=Input::get("txtVigPerAgua");
       if($this->noBlanco(Input::get("selTipAflu"))) $ambientalPlanta->tipo_afluente=Input::get("selTipAflu");
       if($this->noBlanco(Input::get("txtNomFuente"))) $ambientalPlanta->nombre_fuente=Input::get("txtNomFuente");
       if($this->noBlanco(Input::get("txtDistABoc"))) $ambientalPlanta->distancia_planta_bocatoma=Input::get("txtDistABoc");
       if($this->noBlanco(Input::get("txtDesRecHid"))) $ambientalPlanta->desc_recurso_hidrico=Input::get("txtDesRecHid");
       if($this->noBlanco(Input::get("txtCaudalUti"))) $ambientalPlanta->caudal_usado=Input::get("txtCaudalUti");
       if($this->noBlanco(Input::get("selAfeHid"))) $ambientalPlanta->afe_hidrica=Input::get("selAfeHid");
       if($this->noBlanco(Input::get("selManAguaLluv"))) $ambientalPlanta->manejo_agua_lluvia=Input::get("selManAguaLluv");
       if($this->noBlanco(Input::get("selMTipAguaLluv"))) $ambientalPlanta->tipo_manejo_agua_lluvia=Input::get("selMTipAguaLluv");
       if($this->noBlanco(Input::get("txtObseVistaBenf"))) $ambientalPlanta->observ_vista_benf=Input::get("txtObseVistaBenf");
       if($this->noBlanco(Input::get("selVerFue"))) $ambientalPlanta->vertimiento_fuente=Input::get("selVerFue");
       if($this->noBlanco(Input::get("selTipVer"))) $ambientalPlanta->tipo_vertimiento=Input::get("selTipVer");
       if($this->noBlanco(Input::get("txtVerX"))) $ambientalPlanta->vertimiento_x=Input::get("txtVerX");
       if($this->noBlanco(Input::get("txtVerY"))) $ambientalPlanta->vertimiento_y=Input::get("txtVerY");
       if($this->noBlanco(Input::get("txtVerZ"))) $ambientalPlanta->vertimiento_z=Input::get("txtVerZ");
       if($this->noBlanco(Input::get("txtCaudVert"))) $ambientalPlanta->vertimiento_caudal=Input::get("txtCaudVert");
       if($this->noBlanco(Input::get("selPerVert"))) $ambientalPlanta->vertimiento_permiso=Input::get("selPerVert");
       if($this->noBlanco(Input::get("txtNumVert"))) $ambientalPlanta->vertimiento_num_permiso=Input::get("txtNumVert");
       if($this->noBlanco(Input::get("txtNumRadVert"))) $ambientalPlanta->vertimiento_num_radicado=Input::get("txtNumRadVert");
       if($this->noBlanco(Input::get("selPlanTrat"))) $ambientalPlanta->planta_tratamiento=Input::get("selPlanTrat");
       if($this->noBlanco(Input::get("selTipTratAgu"))) $ambientalPlanta->tipo_trat_agua_resid=Input::get("selTipTratAgu");
       if($this->noBlanco(Input::get("txtDesProTra"))) $ambientalPlanta->proc_trat_planta=Input::get("txtDesProTra");
       if($this->noBlanco(Input::get("selProCir"))) $ambientalPlanta->proc_circ_agua=Input::get("selProCir");
       if($this->noBlanco(Input::get("selTipManAgSer"))) $ambientalPlanta->tipo_manej_agua_resid=Input::get("selTipManAgSer");
       if($this->noBlanco(Input::get("txtNumTrab"))) $ambientalPlanta->num_trabajador=Input::get("txtNumTrab");
       if($this->noBlanco(Input::get("txtObseVertimiento"))) $ambientalPlanta->observ_vertimiento=Input::get("txtObseVertimiento");
       if($this->noBlanco(Input::get("selEmiAtmo"))) $ambientalPlanta->emisi_atmos=Input::get("selEmiAtmo");
       if($this->noBlanco(Input::get("selTipFuente"))) $ambientalPlanta->tipo_fuente=Input::get("selTipFuente");
       if($this->noBlanco(Input::get("txtDesFuente"))) $ambientalPlanta->descr_fuente=Input::get("txtDesFuente");
       if($this->noBlanco(Input::get("selPerEmiAtmo"))) $ambientalPlanta->per_emisi_atmos=Input::get("selPerEmiAtmo");
       if($this->noBlanco(Input::get("txtNumPerEmiAtmo"))) $ambientalPlanta->num_perm_emisi_atmos=Input::get("txtNumPerEmiAtmo");
       if($this->noBlanco(Input::get("txtNumRadiEmiAtmo"))) $ambientalPlanta->num_radi_perm_emisi_atmos=Input::get("txtNumRadiEmiAtmo");
       if($this->noBlanco(Input::get("selAnalEmiAtmo"))) $ambientalPlanta->anal_emisi_atmos=Input::get("selAnalEmiAtmo");
       if($this->noBlanco(Input::get("txtQuieAnalEmiAtmo"))) $ambientalPlanta->quien_anal_emisi_atmos=Input::get("txtQuieAnalEmiAtmo");
       if($this->noBlanco(Input::get("txtMP"))) $ambientalPlanta->resul_moni_mp=Input::get("txtMP");
       if($this->noBlanco(Input::get("txtSO2"))) $ambientalPlanta->resul_moni_so2=Input::get("txtSO2");
       if($this->noBlanco(Input::get("txtNox"))) $ambientalPlanta->resul_moni_nox=Input::get("txtNox");
       if($this->noBlanco(Input::get("selResulMonitoreo"))) $ambientalPlanta->resul_monit=Input::get("selResulMonitoreo");
       if($this->noBlanco(Input::get("txtDistVivCer"))) $ambientalPlanta->dist_viv_cer=Input::get("txtDistVivCer");
       if($this->noBlanco(Input::get("selGeneRui"))) $ambientalPlanta->gene_ruid=Input::get("selGeneRui");
       if($this->noBlanco(Input::get("txtFuenRuid"))) $ambientalPlanta->fuen_ruid=Input::get("txtFuenRuid");
       if($this->noBlanco(Input::get("selMoniRuid"))) $ambientalPlanta->moni_ruido=Input::get("selMoniRuid");
       if($this->noBlanco(Input::get("txtQuieMoniRuido"))) $ambientalPlanta->quien_moni_ruido=Input::get("txtQuieMoniRuido");
       if($this->noBlanco(Input::get("txtObseRecurAtmos"))) $ambientalPlanta->observ_recur_atmos=Input::get("txtObseRecurAtmos");
       if($this->noBlanco(Input::get("selTipImpSuel"))) $ambientalPlanta->tip_imp_suel=Input::get("selTipImpSuel");
       if($this->noBlanco(Input::get("txtDesTipImp"))) $ambientalPlanta->des_tip_imp=Input::get("txtDesTipImp");
       if($this->noBlanco(Input::get("selHaceSobrSoli"))) $ambientalPlanta->sobr_sol_benf=Input::get("selHaceSobrSoli");
       if($this->noBlanco(Input::get("txtCantSobr"))) $ambientalPlanta->cant_sobr=Input::get("txtCantSobr");
       if($this->noBlanco(Input::get("txtObseRecurSuelo"))) $ambientalPlanta->observ_recur_suelo=Input::get("txtObseRecurSuelo");
       if($this->noBlanco(Input::get("selTipResGen"))) $ambientalPlanta->tip_resi_genr=Input::get("selTipResGen");
       if($this->noBlanco(Input::get("selClasFuen"))) $ambientalPlanta->clas_fuen=Input::get("selClasFuen");
       if($this->noBlanco(Input::get("selEntClasExt"))) $ambientalPlanta->entre_clas_ext=Input::get("selEntClasExt");
       if($this->noBlanco(Input::get("txtResidInser"))) $ambientalPlanta->resid_inser=Input::get("txtResidInser");
       if($this->noBlanco(Input::get("txtResidRecup"))) $ambientalPlanta->resid_recup=Input::get("txtResidRecup");
       if($this->noBlanco(Input::get("txtResidPelig"))) $ambientalPlanta->resid_pelig=Input::get("txtResidPelig");
       if($this->noBlanco(Input::get("selDisRes"))) $ambientalPlanta->dis_fin_resi=Input::get("selDisRes");
       if($this->noBlanco(Input::get("txtObseResiSolido"))) $ambientalPlanta->observ_resi_soli=Input::get("txtObseResiSolido");
       if($this->noBlanco(Input::get("selCobeVege"))) $ambientalPlanta->cobe_vege=Input::get("selCobeVege");
       if($this->noBlanco(Input::get("selDesCobeVege"))) $ambientalPlanta->des_cobe_vege=Input::get("selDesCobeVege");
       if($this->noBlanco(Input::get("selTipCobeVege"))) $ambientalPlanta->tipo_cobe_vege=Input::get("selTipCobeVege");
       if($this->noBlanco(Input::get("selCobeReti"))) $ambientalPlanta->cobe_vege_reti=Input::get("selCobeReti");
       if($this->noBlanco(Input::get("selDescCobeVege"))) $ambientalPlanta->desc_cobe_vege=Input::get("selDescCobeVege");
       if($this->noBlanco(Input::get("selUtiEspeVege"))) $ambientalPlanta->uti_espe_vege=Input::get("selUtiEspeVege");
       if($this->noBlanco(Input::get("selPermAmbie"))) $ambientalPlanta->perm_ambie=Input::get("selPermAmbie");
       if($this->noBlanco(Input::get("selTipoPerm"))) $ambientalPlanta->tipo_permi=Input::get("selTipoPerm");
       if($this->noBlanco(Input::get("txtNumPerm"))) $ambientalPlanta->num_perm=Input::get("txtNumPerm");
       if($this->noBlanco(Input::get("selCompFores"))) $ambientalPlanta->comp_fores=Input::get("selCompFores");
       
       if($this->noBlanco(Input::get("selRondaProtHidr"))) $ambientalPlanta->rond_prot=Input::get("selRondaProtHidr");
       if($this->noBlanco(Input::get("txtAnchoRond"))) $ambientalPlanta->ancho_rond=Input::get("txtAnchoRond");
       if($this->noBlanco(Input::get("txtDescEspeEnco"))) $ambientalPlanta->desc_espe_encon=Input::get("txtDescEspeEnco");
       if($this->noBlanco(Input::get("selActiPesca"))) $ambientalPlanta->acti_pesca=Input::get("selActiPesca");
       if($this->noBlanco(Input::get("txtPecesMayoCons"))) $ambientalPlanta->peces_mayo_cons=Input::get("txtPecesMayoCons");
       if($this->noBlanco(Input::get("txtObsCompBiot"))) $ambientalPlanta->obs_comp_biot=Input::get("txtObsCompBiot");
       $ambientalPlanta->save();

#------------------------------------------------------ Contaminates ---------------------------------------------------
       unset($selMul);
       if($this->noBlanco(Input::get("txtContAgua"))){
           unset($arr);
           $txtContAgua = Input::get("txtContAgua");
           foreach($txtContAgua as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['contaminate_agregado']=$txtContAgua[$clave];
                   unset($selMul);
                   $selMul=Contaminantes::find(Input::get("hidPlanta"),$arr);
                   if(is_null($selMul)){ //para crear registros
                       $selMul= new Contaminantes();
                       $selMul->id_planta=Input::get("hidPlanta");
                       $selMul->contaminate_agregado=$txtContAgua[$clave];
                       $selMul->save();
                   }
               }
           }           
       }
#------------------------------------------------------ Contaminates ---------------------------------------------------

#---------------------------------------- Desarrollo Beneficio Minero ---------------------------------------------------
       unset($selMul);
       if($this->noBlanco(Input::get("txtNomEspVeg"))){
           unset($arr);
           $txtNomEspVeg = Input::get("txtNomEspVeg");
           foreach($txtNomEspVeg as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['nombre_comun']=$txtNomEspVeg[$clave];
                   $txtUsoEspVeg = Input::get("txtUsoEspVeg");
                   foreach($txtUsoEspVeg as $clave => $valor){
                       if($this->noBlanco($valor)){
                           $arr['uso']=$txtUsoEspVeg[$clave];
                            $txtOrigExtr = Input::get("txtOrigExtr");
                            foreach($txtOrigExtr as $clave => $valor){
                                if($this->noBlanco($valor)){
                                    $arr['origen_extraccion']=$txtOrigExtr[$clave];
                                    unset($espVeg);
                                    $espVeg=EspeciesVegetales::find(Input::get("hidPlanta"),$arr);
                                    if(is_null($espVeg)){ //para crear registros
                                        $espVeg= new EspeciesVegetales();
                                        $espVeg->id_planta=Input::get("hidPlanta");
                                        $espVeg->nombre_comun=$txtNomEspVeg[$clave];
                                        $espVeg->uso=$txtUsoEspVeg[$clave];
                                        $espVeg->origen_extraccion=$txtOrigExtr[$clave];
                                        $espVeg->save();
                                    }
                                }
                            }
                       }
                   }
               }
           }           
       }
#---------------------------------------- Desarrollo Beneficio Minero ---------------------------------------------------

#----------------------------------------- Compensacion Forestal --------------------------------------------------------
       unset($selMul);
       if($this->noBlanco(Input::get("txtEspec"))){
           unset($arr);
           $txtEspec = Input::get("txtEspec");
           foreach($txtEspec as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['especie']=$txtEspec[$clave];
                   $txtCantCompFor = Input::get("txtCantCompFor");
                   foreach($txtCantCompFor as $clave => $valor){
                       if($this->noBlanco($valor)){
                           $arr['cantidad']=$txtCantCompFor[$clave];
                            $txtVerComFor = Input::get("txtVerComFor");
                            foreach($txtVerComFor as $clave => $valor){
                                if($this->noBlanco($valor)){
                                    $arr['vereda']=$txtVerComFor[$clave];
                                    $txtXCompFor = Input::get("txtXCompFor");
                                    foreach($txtXCompFor as $clave => $valor){
                                        if($this->noBlanco($valor)){
                                            $arr['ccor_x']=$txtXCompFor[$clave];
                                            $txtYCompFor = Input::get("txtYCompFor");
                                            foreach($txtYCompFor as $clave => $valor){
                                                if($this->noBlanco($valor)){
                                                    $arr['ccor_y']=$txtYCompFor[$clave];
                                                    unset($comFor);
                                                    $comFor=CompensacionForestal::find(Input::get("hidPlanta"),$arr);
                                                    if(is_null($comFor)){ //para crear registros
                                                        $comFor= new CompensacionForestal();
                                                        $comFor->id_planta=Input::get("hidPlanta");
                                                        $comFor->especie=$txtEspec[$clave];
                                                        $comFor->cantidad=$txtCantCompFor[$clave];
                                                        $comFor->vereda=$txtVerComFor[$clave];
                                                        $comFor->ccor_x=$txtXCompFor[$clave];
                                                        $comFor->ccor_y=$txtYCompFor[$clave];
                                                        $comFor->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                            }
                       }
                   }
               }
           }           
       }
#----------------------------------------- Compensacion Forestal --------------------------------------------------------
       return Redirect::action('PestanaAmbientalPlantaController@show',array(Input::get("hidPlanta")));
/*      
       $ambiental->save();
#----------------------------------------- Ambiental -----------------------------------------------------------
       if($this->noBlanco(Input::get("selActCie"))){
           unset($arr);
           $selActCie = Input::get("selActCie");
           foreach($selActCie as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selActCie[$clave];
                   $arr['asunto']='Actividades de Cierre';
                   unset($selMulActCie);
                   $selMulActCie=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                   if(is_null($selMulActCie)){ //para crear registros
                       $selMulActCie= new SeleccionMultiple();
                       $selMulActCie->id_mina=Input::get("hidMina");
                       $selMulActCie->id_topologia=$selActCie[$clave];
                       $selMulActCie->asunto='Actividades de Cierre';
                       $selMulActCie->save();
                   }
               }
           }           
       }
       unset($selMul);
       if($this->noBlanco(Input::get("selDescCobVeg"))){
           unset($arr);
           $selDescCobVeg = Input::get("selDescCobVeg");
           foreach($selDescCobVeg as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['id_topologia']=$selDescCobVeg[$clave];
                   $arr['asunto']='Descripcion de Cobertura Vegetal';
                   unset($selMul);
                   $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                   if(is_null($selMul)){ //para crear registros
                       $selMul= new SeleccionMultiple();
                       $selMul->id_mina=Input::get("hidMina");
                       $selMul->id_topologia=$selDescCobVeg[$clave];
                       $selMul->asunto='Descripcion de Cobertura Vegetal';
                       $selMul->save();
                   }
               }
           }           
       }

       unset($selMul);
       if($this->noBlanco(Input::get("txtNomEspVeg"))){
           unset($arr);
           $txtNomEspVeg = Input::get("txtNomEspVeg");
           foreach($txtNomEspVeg as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['nombre_comun']=$txtNomEspVeg[$clave];
                   $txtUsoEspVeg = Input::get("txtUsoEspVeg");
                   foreach($txtUsoEspVeg as $clave => $valor){
                       if($this->noBlanco($valor)){
                           $arr['uso']=$txtUsoEspVeg[$clave];
                            $txtOrigExtr = Input::get("txtOrigExtr");
                            foreach($txtOrigExtr as $clave => $valor){
                                if($this->noBlanco($valor)){
                                    $arr['origen_extraccion']=$txtOrigExtr[$clave];
                                    unset($espVeg);
                                    $espVeg=EspeciesVegetales::find(Input::get("hidMina"),$arr);
                                    if(is_null($espVeg)){ //para crear registros
                                        $espVeg= new EspeciesVegetales();
                                        $espVeg->id_mina=Input::get("hidMina");
                                        $espVeg->nombre_comun=$txtNomEspVeg[$clave];
                                        $espVeg->uso=$txtUsoEspVeg[$clave];
                                        $espVeg->origen_extraccion=$txtOrigExtr[$clave];
                                        $espVeg->save();
                                    }
                                }
                            }
                       }
                   }
               }
           }           
       }
       
       unset($selMul);
       if($this->noBlanco(Input::get("txtEspec"))){
           unset($arr);
           $txtEspec = Input::get("txtEspec");
           foreach($txtEspec as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['especie']=$txtEspec[$clave];
                   $txtCantCompFor = Input::get("txtCantCompFor");
                   foreach($txtCantCompFor as $clave => $valor){
                       if($this->noBlanco($valor)){
                           $arr['cantidad']=$txtCantCompFor[$clave];
                            $txtVerComFor = Input::get("txtVerComFor");
                            foreach($txtVerComFor as $clave => $valor){
                                if($this->noBlanco($valor)){
                                    $arr['vereda']=$txtVerComFor[$clave];
                                    $txtXCompFor = Input::get("txtXCompFor");
                                    foreach($txtXCompFor as $clave => $valor){
                                        if($this->noBlanco($valor)){
                                            $arr['ccor_x']=$txtXCompFor[$clave];
                                            $txtYCompFor = Input::get("txtYCompFor");
                                            foreach($txtYCompFor as $clave => $valor){
                                                if($this->noBlanco($valor)){
                                                    $arr['ccor_y']=$txtYCompFor[$clave];
                                                    unset($comFor);
                                                    $comFor=CompensacionForestal::find(Input::get("hidMina"),$arr);
                                                    if(is_null($comFor)){ //para crear registros
                                                        $comFor= new CompensacionForestal();
                                                        $comFor->id_mina=Input::get("hidMina");
                                                        $comFor->especie=$txtEspec[$clave];
                                                        $comFor->cantidad=$txtCantCompFor[$clave];
                                                        $comFor->vereda=$txtVerComFor[$clave];
                                                        $comFor->ccor_x=$txtXCompFor[$clave];
                                                        $comFor->ccor_y=$txtYCompFor[$clave];
                                                        $comFor->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                            }
                       }
                   }
               }
           }           
       }
       
       unset($selMul);
       if($this->noBlanco(Input::get("txtEspZona"))){
           unset($arr);
           $txtEspZona = Input::get("txtEspZona");
           foreach($txtEspZona as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['nombre_comun']=$txtEspZona[$clave];
                   $txtUsoZona= Input::get("txtUsoZona");
                   foreach($txtUsoZona as $clave => $valor){
                       if($this->noBlanco($valor)){
                           $arr['uso']=$txtUsoZona[$clave];
                            unset($espVeg);
                            $espAni=EspeciesAnimales::find(Input::get("hidMina"),$arr);
                            if(is_null($espAni)){ //para crear registros
                                $espAni= new EspeciesAnimales();
                                $espAni->id_mina=Input::get("hidMina");
                                $espAni->nombre_comun=$txtEspZona[$clave];
                                $espAni->uso=$txtUsoZona[$clave];
                                $espAni->save();
                            }
                       }
                   }
               }
           }           
       }
       
       
/*
#----------------------------------------- Condiciones de Agua -----------------------------------------------------------
       $selCondAgua = Input::get("SelCondA");
       foreach($selCondAgua as $clave => $valor){
           if($this->noBlanco($valor)){
                $arr['id_topologia']=$selCondAgua[$clave];
                $arr['asunto']="Condicion Agua";
                unset($selMul);
                echo $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                if(is_null($selMul)){ //para crear registros
                    $selMul= new SeleccionMultiple();
                    $selMul->id_mina= Input::get("hidMina");
                    $selMul->id_topologia=$selCondAgua[$clave];
                    $selMul->asunto='Condicion Agua';
                    $selMul->save();
                }else{ // para actualizar registros
                    
                }
                //echo var_dump($selMul);                
           }
       }
#----------------------------------------- Condiciones de Agua -----------------------------------------------------------
   

#----------------------------------------- Morfometria -----------------------------------------------------------
       $morfometria=Morfometria::find(Input::get("hidMina"));
       if(is_null($morfometria)){
           $morfometria= new Morfometria();
           if($this->noBlanco(Input::get("hidMina"))) $morfometria->id_mina=Input::get("hidMina");
       }
       if($this->noBlanco(Input::get("txtAnchoM"))) $morfometria->ancho=Input::get("txtAnchoM");
       if($this->noBlanco(Input::get("txtLongitudM"))) $morfometria->longitud=Input::get("txtLongitudM");
       if($this->noBlanco(Input::get("txtLongitudM"))) $morfometria->longitud=Input::get("txtLongitudM");
       if($this->noBlanco(Input::get("txtProfundidadM"))) $morfometria->profundidad=Input::get("txtProfundidadM");
       if($this->noBlanco(Input::get("txtObservacionM"))) $morfometria->observaciones_morfo=Input::get("txtObservacionM");
       $morfometria->save();
#----------------------------------------- Morfometria -----------------------------------------------------------
       
#----------------------------------------- Vegetacion -----------------------------------------------------------
       $selVege = Input::get("SelVege");
       foreach($selVege as $clave => $valor){
           if($this->noBlanco($valor)){
                $arr['id_topologia']=$selVege[$clave];
                $arr['asunto']="Vegetacion";
                unset($selMul);
                echo $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                if(is_null($selMul)){ //para crear registros
                    $selMul= new SeleccionMultiple();
                    $selMul->id_mina= Input::get("hidMina");
                    $selMul->id_topologia=$selVege[$clave];
                    $selMul->asunto='Vegetacion';
                    $selMul->save();
                }else{ // para actualizar registros
                    
                }
                //echo var_dump($selMul);                
           }
       }
#----------------------------------------- Vegetacion -----------------------------------------------------------

#----------------------------------------- Afectacion Cobertura Vegetal -----------------------------------------
       $selAfeCob = Input::get("SelAfectC");
       foreach($selAfeCob as $clave => $valor){
           if($this->noBlanco($valor)){
                $arr['id_topologia']=$selAfeCob[$clave];
                $arr['asunto']="Afectacion Cobertura Vegetal";
                unset($selMul);
                echo $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                if(is_null($selMul)){ //para crear registros
                    $selMul= new SeleccionMultiple();
                    $selMul->id_mina= Input::get("hidMina");
                    $selMul->id_topologia=$selAfeCob[$clave];
                    $selMul->asunto='Afectacion Cobertura Vegetal';
                    $selMul->save();
                }else{ // para actualizar registros
                    
                }
                //echo var_dump($selMul);                
           }
       }
#----------------------------------------- Afectacion Cobertura Vegetal -----------------------------------------

#----------------------------------------- Actividad Antropica --------------------------------------------------
       $selActAnt = Input::get("SelActAnt");
       foreach($selActAnt as $clave => $valor){
           if($this->noBlanco($valor)){
                $arr['id_topologia']=$selActAnt[$clave];
                $arr['asunto']="Actividad Antropica";
                unset($selMul);
                echo $selMul=SeleccionMultiple::find(Input::get("hidMina"),$arr);
                if(is_null($selMul)){ //para crear registros
                    $selMul= new SeleccionMultiple();
                    $selMul->id_mina= Input::get("hidMina");
                    $selMul->id_topologia=$selActAnt[$clave];
                    $selMul->asunto='Actividad Antropica';
                    $selMul->save();
                }else{ // para actualizar registros
                    
                }
                //echo var_dump($selMul);                
           }
       }
#----------------------------------------- Actividad Antropica --------------------------------------------------
*/
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