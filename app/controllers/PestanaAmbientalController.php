<?php

class PestanaAmbientalController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $mina=Mina::whereId_mina($id)->get();
       $ambiental=Ambiental::whereId_mina($id)->get();
       $detalle=DetalleMina::whereId_mina($id)->get();
       $morfometria=Morfometria::whereId_mina($id)->get();
       $especieVegetal=EspeciesVegetales::whereId_mina($id)->get();
       $comRoca=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ROCA')->lists('descripcion_toplogia','id_topologia');
       $comEstructura=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ESRUCT')->lists('descripcion_toplogia','id_topologia');
       $comFracturacion=array(''=>'Seleccione..','ALTO'=>'Alto','MEDIO'=>'Medio','BAJO'=>'Bajo');
       $comMeteorizacion=array(''=>'Seleccione..','COMPLETA'=>'Completa','ALTA'=>'Alta','MODERADA'=>'Moderada');
       $comEstructura=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ESRUCT')->lists('descripcion_toplogia','id_topologia');
       $comColuvion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('COLUVI')->lists('descripcion_toplogia','id_topologia');
       $comAluvial=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ALUVIA')->lists('descripcion_toplogia','id_topologia');
       $comRelleno=array(''=>'Seleccione..')+Topologia::whereCod_topologia('RELLEN')->lists('descripcion_toplogia','id_topologia');
       $comErocion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('EROSION')->lists('descripcion_toplogia','id_topologia');
       $comMovRoca=array(''=>'Seleccione..')+Topologia::whereCod_topologia('MOVROCA')->lists('descripcion_toplogia','id_topologia');
       $comMovSuelo=array(''=>'Seleccione..')+Topologia::whereCod_topologia('MOVSUELO')->lists('descripcion_toplogia','id_topologia');
       $comEstilo=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ESTILO')->lists('descripcion_toplogia','id_topologia');
       $comActividad=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTIVIDAD')->lists('descripcion_toplogia','id_topologia');
       $comSecRep=array(''=>'Seleccione..')+Topologia::whereCod_topologia('SECREPETI')->lists('descripcion_toplogia','id_topologia');
       $comCondiAgua=array(''=>'Seleccione..')+Topologia::whereCod_topologia('CONDIAGUA')->lists('descripcion_toplogia','id_topologia');
       $arrConAgua= SeleccionMultiple::whereId_mina($id)->whereAsunto('Condicion Agua')->get();
       $arrEstadoObra=array(''=>'Seleccione..','BUENO'=>'Bueno','ACEPTABLE'=>'Aceptable','MALO'=>'Malo');
       $arrHumSuelo=array(''=>'Seleccione..','ALTO'=>'Alto','MEDIO'=>'Medio','BAJO'=>'Bajo');
       $arrVegetacion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('VEGETACION')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulVege= SeleccionMultiple::whereId_mina($id)->whereAsunto('Vegetacion')->get();
       $arrSiNo=array('' => 'Seleccione..','Si'=>'Si','No'=>'No');
       $arrAfecCobVeg=array(''=>'Seleccione..')+Topologia::whereCod_topologia('AFECTACION')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulAfec= SeleccionMultiple::whereId_mina($id)->whereAsunto('Afectacion Cobertura Vegetal')->get();
       $arrActvAntro=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTANTROPI')->lists('descripcion_toplogia','id_topologia');
       $arrSelActAntro= SeleccionMultiple::whereId_mina($id)->whereAsunto('Actividad Antropica')->get();
       $arrTipoProceso=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPOPROCES')->lists('descripcion_toplogia','id_topologia');
       $arrTipFue=array('' => 'Seleccione..','Permanente'=>'Permanente','Intermitente'=>'Intermitente');
       $arrTipFueAfe=array('' => 'Seleccione..','Superficial'=>'Superficial','Subterranea'=>'Subterranea');
       $arrTipFueSup=array(''=>'Seleccione..','Rio'=>'Río','Quebrada'=>'Quebrada','Reservorio'=>'Reservorio');
       $arrTipFueSub=array('' => 'Seleccione..','Pozo'=>'Pozo','Aljibe'=>'Aljibe');
       $arrTipoUso=array('' => 'Seleccione..','Consumo Humano'=>'Consumo Humano','Uso minero'=>'Uso minero');
       $arrTipAfecCal=array(''=>'Seleccione..','Fisica'=>'Física','Quimica'=>'Química','Bacteriologica'=>'Bacteriológica');
       $arrTiManAgu=array(''=>'Seleccione..','Canal Perimetral'=>'Canal Perimetral','Zanjas de coronacion'=>'Zanjas de coronación','Canales en los taludes'=>'Canales en los taludes');
       $arrTipEmAt=array(''=>'Seleccione..','Gases'=>'Gases','Material Particulado'=>'Material Particulado');
       $arrFueEmAt=array(''=>'Seleccione..','Combustion de equipo o maquinaria'=>'Combustión de equipo o maquinaria','Movimiento de suelos'=>'Movimiento de suelos','Emision por voladuras '=>'Emisión por voladuras ');
       $arrTipManConAm=array(''=>'Seleccione..','Proteccion mineral extraido y almacenado'=>'Protección mineral extraido  y almacenado','Carpado de volquetas'=>'Carpado de volquetas','Humedecimiento del suelo'=>'Humedecimiento del suelo');
       $arrActCie=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTCIEABA')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulActCie=SeleccionMultiple::whereId_mina($id)->whereAsunto('Actividades de Cierre')->get();
       $arrTipRes=array(''=>'Seleccione..','Domesticos'=>'Domésticos','Industriales'=>'Industriales');
       $arrDescCobVeg=array(''=>'Seleccione..')+Topologia::whereCod_topologia('COBEVEGE')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulDescCobVeg=SeleccionMultiple::whereId_mina($id)->whereAsunto('Descripcion de Cobertura Vegetal')->get();
       $arrEspecieVegetal=EspeciesVegetales::whereId_mina($id)->get();
       $arrCompesacionForestal=CompensacionForestal::whereId_mina($id)->get();
       $arrEspecieAnimal=EspeciesAnimales::whereId_mina($id)->get();
       $arrContaminate=Contaminantes::whereId_mina($id)->get();
       $arrDispFinRes=array(''=>'Seleccione..','Botadero a cielo abierto'=>'Botadero a cielo abierto','Celda de relleno sanitario'=>'Celda de relleno sanitario','Enterrados'=>'Enterrados','Incinerados'=>'Incinerados');
       $arrTipCobVeg=array(''=>'Seleccione..','Arborea'=>'Arborea','Arbustiva'=>'Arbustiva','Herbacea'=>'Herbacea','Cultivo'=>'Cultivo');
       $arrCobReti=array(''=>'Seleccione..','Almaceno'=>'Almacenó','Utilizo la madera'=>'Utilizo la madera','Desecho'=>'Desechó');
       $arrTipoActPermAm=array(''=>'Seleccione..','Permiso de poda'=>'Permiso de poda','Permiso de aprovechamiento forestal'=>'Permiso de aprovechamiento forestal','Permiso de tala'=>'Permiso de tala');
       $arrAmeAni=array(''=>'Seleccione..','Caceria'=>'Caceria','Ganaderia'=>'Ganaderia','Agricultura'=>'Agricultura','Turismo'=>'Turismo');
       $arrTipAflu=array(''=>'Seleccione..','Acueducto'=>'Acueducto','Pozo o aljibe'=>'Pozo o aljibe','Aguas superficiales'=>'Aguas superficiales','Aguas lluvias'=>'Aguas lluvias');
       $arrAfeHid=array(''=>'Seleccione..','Fisica'=>'Física','Quimica'=>'Química','Bacteriologica'=>'Bacteriológica');
       $arrTipManAguLluv=array(''=>'Seleccione..','Canal Perimetral'=>'Canal Perimetral','Zanjas de coronacion'=>'Zanjas de coronación','Sedimentador'=>'Sedimentador','Desarenador'=>'Desarenador', 'Ninguno' => 'Ninguno');
       $arrTipVert=array('' => 'Seleccione..','Difuso'=>'Difuso','Puntual'=>'Puntual');
       $arrTipTratAgu=array('' => 'Seleccione..','Fisico'=>'Físico','Quimico'=>'Químico','Quimico'=>'Químico', 'Alcantarillado'=>'Alcantarillado', 'Ninguno' => 'Ninguno');
       return View::make('Pestanas.pestanaAmbiental',compact('mina','detalle','ambiental','comRoca','comEstructura','comFracturacion',
               'comMeteorizacion','comColuvion','comAluvial','comRelleno','comErocion','comMovRoca','comMovSuelo','comEstilo',
               'comActividad','comSecRep','morfometria','comCondiAgua','arrConAgua','arrEstadoObra','arrHumSuelo','arrVegetacion',
               'arrSelMulVege','arrSiNo','arrAfecCobVeg','arrSelMulAfec','arrActvAntro','arrSelActAntro','arrTipoProceso',
               'arrTipFue','arrTipFueAfe','arrTipFueSup','arrTipFueSub','arrTipoUso','arrTipAfecCal','arrTiManAgu','arrTipEmAt',
               'arrFueEmAt','arrTipManConAm','arrActCie','arrSelMulActCie','arrTipRes','arrDescCobVeg','arrSelMulDescCobVeg',
               'arrEspecieVegetal','arrCompesacionForestal','arrEspecieAnimal','arrContaminate','arrDispFinRes','arrTipCobVeg',
               'arrCobReti','arrTipoActPermAm','arrAmeAni','arrTipAflu','arrAfeHid','arrTipManAguLluv','arrTipVert','arrTipTratAgu'));
   }   
   
   public function create() { 

   }
   
   public function store() { 
#----------------------------------------- Ambiental -----------------------------------------------------------
       $ambiental=Ambiental::find(Input::get("hidMina"));
       if(is_null($ambiental)){
           $ambiental= new Ambiental();
           if($this->noBlanco(Input::get("hidMina"))) $ambiental->id_mina=Input::get("hidMina");
       }
       if($this->noBlanco(Input::get("SelRoca"))) $ambiental->roca=Input::get("SelRoca");
       if($this->noBlanco(Input::get("SelEst"))) $ambiental->estructura=Input::get("SelEst");
       if($this->noBlanco(Input::get("txtLitologia"))) $ambiental->litologia=Input::get("txtLitologia");
       if($this->noBlanco(Input::get("SelFracturacion"))) $ambiental->fracturacion=Input::get("SelFracturacion");
       if($this->noBlanco(Input::get("SelMeteorizacion"))) $ambiental->meteorizacion=Input::get("SelMeteorizacion");
       if($this->noBlanco(Input::get("txtGsi"))) $ambiental->gsi=Input::get("txtGsi");
       if($this->noBlanco(Input::get("SelColuvion"))) $ambiental->coluvion=Input::get("SelColuvion");
       if($this->noBlanco(Input::get("SelAluvial"))) $ambiental->aluvial=Input::get("SelAluvial");
       if($this->noBlanco(Input::get("SelRelleno"))) $ambiental->relleno=Input::get("SelRelleno");
       if($this->noBlanco(Input::get("SelErosion"))) $ambiental->erosion=Input::get("SelErosion");
       if($this->noBlanco(Input::get("SelMovRoca"))) $ambiental->mov_roca=Input::get("SelMovRoca");
       if($this->noBlanco(Input::get("SelMovSuelo"))) $ambiental->mov_suelo=Input::get("SelMovSuelo");
       if($this->noBlanco(Input::get("SelEstilo"))) $ambiental->estilo=Input::get("SelEstilo");
       if($this->noBlanco(Input::get("SelActividad"))) $ambiental->actividad=Input::get("SelActividad");
       if($this->noBlanco(Input::get("SelRepet"))) $ambiental->secuencia_repeticion=Input::get("SelRepet");
       if($this->noBlanco(Input::get("txtDescCausaM"))) $ambiental->causa=Input::get("txtDescCausaM");
       if($this->noBlanco(Input::get("txtInterM"))) $ambiental->intercalada_arcillolitas_arenisca=Input::get("txtInterM");
       if($this->noBlanco(Input::get("SelAlcant"))) $ambiental->estado_alcantarilla=Input::get("SelAlcant");
       if($this->noBlanco(Input::get("SelCuneta"))) $ambiental->estado_cuneta=Input::get("SelCuneta");
       if($this->noBlanco(Input::get("SelCanales"))) $ambiental->estado_canales=Input::get("SelCanales");
       if($this->noBlanco(Input::get("SelDrenes"))) $ambiental->estado_drenes=Input::get("SelDrenes");
       if($this->noBlanco(Input::get("SelEncole"))) $ambiental->estado_encole=Input::get("SelEncole");
       if($this->noBlanco(Input::get("SelDescole"))) $ambiental->estado_descole=Input::get("SelDescole");
       if($this->noBlanco(Input::get("SelOtrosAgua"))) $ambiental->estado_otros=Input::get("SelOtrosAgua");
       if($this->noBlanco(Input::get("SelHum"))) $ambiental->hum_suelo=Input::get("SelHum");
       if($this->noBlanco(Input::get("SelIncli"))) $ambiental->inclinacion=Input::get("SelIncli");
       if($this->noBlanco(Input::get("txtObservacionV"))) $ambiental->observacion_afectacion=Input::get("txtObservacionV");
       if($this->noBlanco(Input::get("SelMuroGav"))) $ambiental->muro_gaviones=Input::get("SelMuroGav");
       if($this->noBlanco(Input::get("SelMuroCon"))) $ambiental->muro_concreto=Input::get("SelMuroCon");
       if($this->noBlanco(Input::get("SelMuroOtr"))) $ambiental->muro_otro=Input::get("SelMuroOtr");
       if($this->noBlanco(Input::get("txtObservacionCon"))) $ambiental->observacion_obras_estabilizacion=Input::get("txtObservacionCon");
       if($this->noBlanco(Input::get("txtRecomendacionCon"))) $ambiental->recomendaciones_obras_estabilizacion=Input::get("txtRecomendacionCon");
       if($this->noBlanco(Input::get("SelEstViv"))) $ambiental->estado_vivienda=Input::get("SelEstViv");
       if($this->noBlanco(Input::get("txtObservacionOtroA"))) $ambiental->observacion_otros_apectos=Input::get("txtObservacionOtroA");
       if($this->noBlanco(Input::get("txtDescG"))) $ambiental->descripcion_general=Input::get("txtDescG");
       if($this->noBlanco(Input::get("SelTipPro"))) $ambiental->tipo_proceso=Input::get("SelTipPro");
       if($this->noBlanco(Input::get("txtElev"))) $ambiental->elevacion=Input::get("txtElev");
       if($this->noBlanco(Input::get("selFueAfe"))) $ambiental->fue_afe=Input::get("selFueAfe");
       if($this->noBlanco(Input::get("selTipFue"))) $ambiental->tipo_fuente=Input::get("selTipFue");
       if($this->noBlanco(Input::get("selTipFueAfe"))) $ambiental->tipo_fuente_afe=Input::get("selTipFueAfe");
       if($this->noBlanco(Input::get("selTipFueSup"))) $ambiental->tipo_fuente_sup=Input::get("selTipFueSup");
       if($this->noBlanco(Input::get("txtNomFueSup"))) $ambiental->nombre_fuente_sup=Input::get("txtNomFueSup");
       if($this->noBlanco(Input::get("selTipFueSub"))) $ambiental->tipo_fuente_sub=Input::get("selTipFueSub");
       if($this->noBlanco(Input::get("txtNomFueSub"))) $ambiental->nombre_fuente_sub=Input::get("txtNomFueSub");
       if($this->noBlanco(Input::get("txtFueX"))) $ambiental->fuente_subx=Input::get("txtFueX");
       if($this->noBlanco(Input::get("txtFueY"))) $ambiental->fuente_suby=Input::get("txtFueY");
       if($this->noBlanco(Input::get("txtFueZ"))) $ambiental->fuente_subz=Input::get("txtFueZ");
       if($this->noBlanco(Input::get("txtDistFue"))) $ambiental->distancia_frente_fuente=Input::get("txtDistFue");
       if($this->noBlanco(Input::get("selUsoHidri"))) $ambiental->uso_hidrico=Input::get("selUsoHidri");
       if($this->noBlanco(Input::get("selUsoTipo"))) $ambiental->tipo_uso_hid=Input::get("selUsoTipo");
       if($this->noBlanco(Input::get("txtObsUsoHid"))) $ambiental->desc_uso_hid=Input::get("txtObsUsoHid");
       if($this->noBlanco(Input::get("txtCaudal"))) $ambiental->caudal=Input::get("txtCaudal");
       if($this->noBlanco(Input::get("txtBocaX"))) $ambiental->bocatomax=Input::get("txtBocaX");
       if($this->noBlanco(Input::get("txtBocaY"))) $ambiental->bocatomay=Input::get("txtBocaY");
       if($this->noBlanco(Input::get("txtBocaZ"))) $ambiental->bocatomaz=Input::get("txtBocaZ");
       if($this->noBlanco(Input::get("selConsAgua"))) $ambiental->consesion_agua=Input::get("selConsAgua");
       if($this->noBlanco(Input::get("txtRadi"))) $ambiental->radicado_consesion=Input::get("txtRadi");
       if($this->noBlanco(Input::get("selTipAfecCal"))) $ambiental->afec_calidad_hidri=Input::get("selTipAfecCal");
       if($this->noBlanco(Input::get("txtDescAfeCal"))) $ambiental->desc_afec_calidad_hidri=Input::get("txtDescAfeCal");
       if($this->noBlanco(Input::get("selManAgua"))) $ambiental->manejo_agua=Input::get("selManAgua");
       if($this->noBlanco(Input::get("selTipManAgua"))) $ambiental->tipo_manejo_agua=Input::get("selTipManAgua");
       if($this->noBlanco(Input::get("selProRec"))) $ambiental->proc_recir=Input::get("selProRec");
       if($this->noBlanco(Input::get("selDerAgua"))) $ambiental->vertim_agua=Input::get("selDerAgua");
       if($this->noBlanco(Input::get("txtCaudalVert"))) $ambiental->caudal_vertimento=Input::get("txtCaudalVert");
       if($this->noBlanco(Input::get("selReqPerVert"))) $ambiental->requiere_permiso_vertim=Input::get("selReqPerVert");
       if($this->noBlanco(Input::get("selEmisAtm"))) $ambiental->emision_atmo=Input::get("selEmisAtm");
       if($this->noBlanco(Input::get("selTipEmAt"))) $ambiental->tipo_emision_atm=Input::get("selTipEmAt");
       if($this->noBlanco(Input::get("txtDescTiAt"))) $ambiental->desc_tip_em_at=Input::get("txtDescTiAt");
       if($this->noBlanco(Input::get("selFueEmAt"))) $ambiental->fuente_emision_atm=Input::get("selFueEmAt");
       if($this->noBlanco(Input::get("selPerEmisAtm"))) $ambiental->permiso_emision_atmo=Input::get("selPerEmisAtm");
       if($this->noBlanco(Input::get("txtRadPerEm"))) $ambiental->radicado_perm_em_at=Input::get("txtRadPerEm");
       if($this->noBlanco(Input::get("selAnaEmAt"))) $ambiental->analisis_em_at=Input::get("selAnaEmAt");
       if($this->noBlanco(Input::get("selQuemas"))) $ambiental->quemas=Input::get("selQuemas");
       if($this->noBlanco(Input::get("selTipManConAt"))) $ambiental->tipo_man_con_am=Input::get("selTipManConAt");
       if($this->noBlanco(Input::get("txtAreaPob"))) $ambiental->distancia_pob_cerc=Input::get("txtAreaPob");
       if($this->noBlanco(Input::get("txtNomSec"))) $ambiental->nombre_sec_pob=Input::get("txtNomSec");
       if($this->noBlanco(Input::get("selGenRui"))) $ambiental->genera_ruido=Input::get("selGenRui");
       if($this->noBlanco(Input::get("txtFuenteRuido"))) $ambiental->fuente_ruido=Input::get("txtFuenteRuido");
       if($this->noBlanco(Input::get("selMonRui"))) $ambiental->monit_ruido=Input::get("selMonRui");
       if($this->noBlanco(Input::get("txtPerMon"))) $ambiental->persona_monit=Input::get("txtPerMon");
       if($this->noBlanco(Input::get("txtResRui"))) $ambiental->resultados_ruido=Input::get("txtResRui");
       if($this->noBlanco(Input::get("selDescZon"))) $ambiental->desc_zona=Input::get("selDescZon");
       if($this->noBlanco(Input::get("selBanMat"))) $ambiental->banco_mat_org=Input::get("selBanMat");
       if($this->noBlanco(Input::get("selMatEst"))) $ambiental->material_esteril=Input::get("selMatEst");
       if($this->noBlanco(Input::get("selManMatEst"))) $ambiental->man_material_esteril=Input::get("selManMatEst");
       if($this->noBlanco(Input::get("txtDesManMet"))) $ambiental->desc_man_materia_org=Input::get("txtDesManMet");
       if($this->noBlanco(Input::get("txtImpSuel"))) $ambiental->tipo_imp_suelo=Input::get("txtImpSuel");
       if($this->noBlanco(Input::get("selTipRes"))) $ambiental->tipo_residuos=Input::get("selTipRes");
       if($this->noBlanco(Input::get("selClasFue"))) $ambiental->clas_fuente=Input::get("selClasFue");
       if($this->noBlanco(Input::get("selEntResi"))) $ambiental->entrega_residuos=Input::get("selEntResi");
       if($this->noBlanco(Input::get("txtResInser"))) $ambiental->residuos_inservibles=Input::get("txtResInser");
       if($this->noBlanco(Input::get("txtResRec"))) $ambiental->residuos_recuperables=Input::get("txtResRec");
       if($this->noBlanco(Input::get("txtResPel"))) $ambiental->residuos_peligrosos=Input::get("txtResPel");
       if($this->noBlanco(Input::get("selDispFinRes"))) $ambiental->disp_final_residuos=Input::get("selDispFinRes");
       if($this->noBlanco(Input::get("selExpET"))) $ambiental->req_explosivos_et=Input::get("selExpET");
       if($this->noBlanco(Input::get("selCobVeg"))) $ambiental->cobertura_vegetal=Input::get("selCobVeg");
       if($this->noBlanco(Input::get("selActDes"))) $ambiental->acti_desmonte=Input::get("selActDes");
       if($this->noBlanco(Input::get("selTipCobVeg"))) $ambiental->tipo_cob_vegetal=Input::get("selTipCobVeg");
       if($this->noBlanco(Input::get("selCobReti"))) $ambiental->cobertura_retirada=Input::get("selCobReti");
       if($this->noBlanco(Input::get("selEspVeg"))) $ambiental->especies_vegetales=Input::get("selEspVeg");
       if($this->noBlanco(Input::get("selActPermAm"))) $ambiental->permisos_act_forestal=Input::get("selActPermAm");
       if($this->noBlanco(Input::get("selTipoActPermAm"))) $ambiental->tipo_permisos_act_forestal=Input::get("selTipoActPermAm");
       if($this->noBlanco(Input::get("txtNumActPermAm"))) $ambiental->num_permisos_act_forestal=Input::get("txtNumActPermAm");
       if($this->noBlanco(Input::get("selActComFor"))) $ambiental->compens_forestal=Input::get("selActComFor");
       if($this->noBlanco(Input::get("selResHid"))) $ambiental->respeto_ronda_hidrica=Input::get("selResHid");
       if($this->noBlanco(Input::get("txtAncRon"))) $ambiental->ancho_ronda=Input::get("txtAncRon");
       if($this->noBlanco(Input::get("txtDesEsp"))) $ambiental->desc_especies_encontr=Input::get("txtDesEsp");
       if($this->noBlanco(Input::get("txtDispCarET"))) $ambiental->disp_car_cajas_et=Input::get("txtDispCarET");
       if($this->noBlanco(Input::get("selAreaProt"))) $ambiental->area_protegida=Input::get("selAreaProt");
       if($this->noBlanco(Input::get("txtCualArPro"))) $ambiental->cual_area_prot=Input::get("txtCualArPro");
       if($this->noBlanco(Input::get("selDentroResFor"))) $ambiental->dentro_res_forestal=Input::get("selDentroResFor");
       if($this->noBlanco(Input::get("selSusArRes"))) $ambiental->proceso_sustraccion=Input::get("selSusArRes");
       if($this->noBlanco(Input::get("selAmeAni"))) $ambiental->amenaza_animales=Input::get("selAmeAni");
       if($this->noBlanco(Input::get("txtAniCons"))) $ambiental->animales_consumidos=Input::get("txtAniCons");
       if($this->noBlanco(Input::get("txtAniNoVis"))) $ambiental->animales_no_vistos=Input::get("txtAniNoVis");
       if($this->noBlanco(Input::get("txtAmeFaun"))) $ambiental->amenazas_natural_fauna=Input::get("txtAmeFaun");
       if($this->noBlanco(Input::get("selPesZon"))) $ambiental->pesca_zona=Input::get("selPesZon");
       if($this->noBlanco(Input::get("txtPezCons"))) $ambiental->peces_consumo=Input::get("txtPezCons");
       if($this->noBlanco(Input::get("selUsoHidZon"))) $ambiental->uso_hidrico_ben=Input::get("selUsoHidZon");
       if($this->noBlanco(Input::get("selPerAgua"))) $ambiental->perm_concesion_agua=Input::get("selPerAgua");
       if($this->noBlanco(Input::get("txtNumPerAgua"))) $ambiental->num_perm_conc_agua=Input::get("txtNumPerAgua");
       if($this->noBlanco(Input::get("txtVigPerAgua"))) $ambiental->vigencia_perm_conc_agua=Input::get("txtVigPerAgua");
       if($this->noBlanco(Input::get("selTipAflu"))) $ambiental->tipo_afluente=Input::get("selTipAflu");
       if($this->noBlanco(Input::get("txtNomFuente"))) $ambiental->nombre_fuente=Input::get("txtNomFuente");
       if($this->noBlanco(Input::get("txtDistABoc"))) $ambiental->distancia_planta_bocatoma=Input::get("txtDistABoc");
       if($this->noBlanco(Input::get("txtDesRecHid"))) $ambiental->desc_recurso_didrico=Input::get("txtDesRecHid");
       if($this->noBlanco(Input::get("txtCaudalUti"))) $ambiental->caudal_usado=Input::get("txtCaudalUti");
       if($this->noBlanco(Input::get("selAfeHid"))) $ambiental->afe_hidrica=Input::get("selAfeHid");
       if($this->noBlanco(Input::get("selManAguaLluv"))) $ambiental->manejo_agua_lluvia=Input::get("selManAguaLluv");
       if($this->noBlanco(Input::get("selMTipAguaLluv"))) $ambiental->tipo_manejo_agua_lluvia=Input::get("selMTipAguaLluv");
       if($this->noBlanco(Input::get("selVerFue"))) $ambiental->vertimiento_fuente=Input::get("selVerFue");
       if($this->noBlanco(Input::get("selTipVer"))) $ambiental->tipo_vertimiento=Input::get("selTipVer");
       if($this->noBlanco(Input::get("txtVerX"))) $ambiental->vertimiento_x=Input::get("txtVerX");
       if($this->noBlanco(Input::get("txtVerY"))) $ambiental->vertimiento_y=Input::get("txtVerY");
       if($this->noBlanco(Input::get("txtVerZ"))) $ambiental->vertimiento_z=Input::get("txtVerZ");
       if($this->noBlanco(Input::get("txtCaudVert"))) $ambiental->vertimiento_caudal=Input::get("txtCaudVert");
       if($this->noBlanco(Input::get("selPerVert"))) $ambiental->vertimiento_permiso=Input::get("selPerVert");
       if($this->noBlanco(Input::get("txtNumVert"))) $ambiental->vertimiento_num_permiso=Input::get("txtNumVert");
       if($this->noBlanco(Input::get("txtNumRadVert"))) $ambiental->vertimiento_num_radicado=Input::get("txtNumRadVert");
       if($this->noBlanco(Input::get("selPlanTrat"))) $ambiental->planta_tratamiento=Input::get("selPlanTrat");
       if($this->noBlanco(Input::get("selTipTratAgu"))) $ambiental->tipo_trat_agua_resid=Input::get("selTipTratAgu");
       if($this->noBlanco(Input::get("txtDesProTra"))) $ambiental->proc_trat_planta=Input::get("txtDesProTra");
       if($this->noBlanco(Input::get("txtDesProTra"))) $ambiental->proc_trat_planta=Input::get("txtDesProTra");
       if($this->noBlanco(Input::get("selProCir"))) $ambiental->proc_circ_agua=Input::get("selProCir");
       if($this->noBlanco(Input::get("txtNumTrab"))) $ambiental->num_trabajador=Input::get("txtNumTrab");
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

       unset($selMul);
       if($this->noBlanco(Input::get("txtContAgua"))){
           unset($arr);
           $txtContAgua = Input::get("txtContAgua");
           foreach($txtContAgua as $clave => $valor){
               if($this->noBlanco($valor)){
                   $arr['contaminate_agregado']=$txtContAgua[$clave];
                   unset($selMul);
                   $selMul=Contaminantes::find(Input::get("hidMina"),$arr);
                   if(is_null($selMul)){ //para crear registros
                       $selMul= new Contaminantes();
                       $selMul->id_mina=Input::get("hidMina");
                       $selMul->contaminate_agregado=$txtContAgua[$clave];
                       $selMul->save();
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
 */       

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
/*       
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
       return Redirect::action('PestanaAmbientalController@show',array(Input::get("hidMina")));
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