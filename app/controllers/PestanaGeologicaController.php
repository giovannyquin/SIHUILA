<?php

class PestanaGeologicaController extends BaseController{
   public function index() {
    
   }

   public function show($id) { 
       $mina=Mina::whereId_mina($id)->get();
       $geologia=Geologica::whereId_mina($id)->get();
       $detalle=DetalleMina::whereId_mina($id)->get();
       $morfometria=Morfometria::whereId_mina($id)->get();
       $especieVegetal=EspeciesVegetales::whereId_mina($id)->get();
       $arrSiNo=array('' => 'Seleccione..','Si'=>'Si','No'=>'No');
       $arrMorfologia=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPMOR')->lists('descripcion_toplogia','id_topologia');
       $arrPendiente=array(''=>'Seleccione..')+Topologia::whereCod_topologia('PENMORF')->lists('descripcion_toplogia','id_topologia');
       $arrCategoria=array(''=>'Seleccione..')+Topologia::whereCod_topologia('CATMORF')->lists('descripcion_toplogia','id_topologia');
       $arrRoca=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPROCA')->lists('descripcion_toplogia','id_topologia');
       $arrEstructura=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ESTROCA')->lists('descripcion_toplogia','id_topologia');
       $arrAltMedBaj=array(''=>'Seleccione..')+Topologia::whereCod_topologia('AMB')->lists('descripcion_toplogia','id_topologia');
       $arrMeteorizacion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPMETE')->lists('descripcion_toplogia','id_topologia');
       $arrColuvion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('COLUV')->lists('descripcion_toplogia','id_topologia');
       $arrAluvial=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ALUV')->lists('descripcion_toplogia','id_topologia');
       $arrRelleno=array(''=>'Seleccione..')+Topologia::whereCod_topologia('RELLE')->lists('descripcion_toplogia','id_topologia');
       $arrErosion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('EROS')->lists('descripcion_toplogia','id_topologia');
       $arrMovRoca=array(''=>'Seleccione..')+Topologia::whereCod_topologia('MOVROCA')->lists('descripcion_toplogia','id_topologia');
       $arrMovSuelo=array(''=>'Seleccione..')+Topologia::whereCod_topologia('MOVSUEL')->lists('descripcion_toplogia','id_topologia');
       $arrEstilo=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ESTREM')->lists('descripcion_toplogia','id_topologia');
       $arrActividad=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTREM')->lists('descripcion_toplogia','id_topologia');
       $arrSecRep=array(''=>'Seleccione..')+Topologia::whereCod_topologia('SECREM')->lists('descripcion_toplogia','id_topologia');
       $arrCondiAgua=array(''=>'Seleccione..')+Topologia::whereCod_topologia('CONDAGUA')->lists('descripcion_toplogia','id_topologia');
       $arrConAgua= SeleccionMultiple::whereId_mina($id)->whereAsunto('Condicion Agua')->get();
       $arrEstadoObra=array(''=>'Seleccione..')+Topologia::whereCod_topologia('BAM')->lists('descripcion_toplogia','id_topologia');
       $arrHumSuelo=array(''=>'Seleccione..')+Topologia::whereCod_topologia('AMB')->lists('descripcion_toplogia','id_topologia');
       $arrVegetacion=array(''=>'Seleccione..')+Topologia::whereCod_topologia('VEGETACION')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulVege= SeleccionMultiple::whereId_mina($id)->whereAsunto('Vegetacion')->get();
       $arrAfecCobVeg=array(''=>'Seleccione..')+Topologia::whereCod_topologia('AFECOB')->lists('descripcion_toplogia','id_topologia');
       $arrSelMulAfec= SeleccionMultiple::whereId_mina($id)->whereAsunto('Afectacion Cobertura Vegetal')->get();
       $arrActvAntro=array(''=>'Seleccione..')+Topologia::whereCod_topologia('ACTANT')->lists('descripcion_toplogia','id_topologia');
       $arrSelActAntro= SeleccionMultiple::whereId_mina($id)->whereAsunto('Actividad Antropica')->get();
       $arrTipoProceso=array(''=>'Seleccione..')+Topologia::whereCod_topologia('TIPPRO')->lists('descripcion_toplogia','id_topologia');
       return View::make('Pestanas.pestanaGeologica',compact('mina','detalle','geologia','morfometria','arrVegetacion',
               'arrMorfologia','arrPendiente','arrCategoria','arrRoca','arrEstructura','arrAltMedBaj','arrMeteorizacion',
               'arrColuvion','arrAluvial','arrRelleno','arrErosion','arrMovRoca','arrMovSuelo','arrEstilo','arrActividad',
               'arrSecRep','arrCondiAgua','arrEstadoObra','arrHumSuelo','arrAfecCobVeg','arrActvAntro','arrTipoProceso',
               'arrSiNo','arrSelActAntro','arrSelMulAfec','arrConAgua','arrSelMulVege'));
   }   
   
   public function create() { 

   }
   
   public function store() { 
#----------------------------------------- Geologica -----------------------------------------------------------
       $geologia=Geologica::find(Input::get("hidMina"));
       if(is_null($geologia)){
           $geologia= new Geologica();
           if($this->noBlanco(Input::get("hidMina"))) $geologia->id_mina=Input::get("hidMina");
       }
       if($this->noBlanco(Input::get("SelMorfologia"))) $geologia->morfologia=Input::get("SelMorfologia");
       if($this->noBlanco(Input::get("SelPendiente"))) $geologia->pendiente=Input::get("SelPendiente");
       if($this->noBlanco(Input::get("SelCategoria"))) $geologia->categoria=Input::get("SelCategoria");
       if($this->noBlanco(Input::get("txtObsMorfo"))) $geologia->observ_morfologia=Input::get("txtObsMorfo");
       if($this->noBlanco(Input::get("SelRoca"))) $geologia->roca=Input::get("SelRoca");
       if($this->noBlanco(Input::get("SelEst"))) $geologia->estructura=Input::get("SelEst");
       if($this->noBlanco(Input::get("txtLitologia"))) $geologia->litologia=Input::get("txtLitologia");
       if($this->noBlanco(Input::get("SelFracturacion"))) $geologia->fracturacion=Input::get("SelFracturacion");
       if($this->noBlanco(Input::get("SelMeteorizacion"))) $geologia->meteorizacion=Input::get("SelMeteorizacion");
       if($this->noBlanco(Input::get("txtGsi"))) $geologia->gsi=Input::get("txtGsi");
       if($this->noBlanco(Input::get("SelColuvion"))) $geologia->coluvion=Input::get("SelColuvion");
       if($this->noBlanco(Input::get("SelAluvial"))) $geologia->aluvial=Input::get("SelAluvial");
       if($this->noBlanco(Input::get("SelRelleno"))) $geologia->relleno=Input::get("SelRelleno");
       if($this->noBlanco(Input::get("txtObsSuelo"))) $geologia->observ_suelo=Input::get("txtObsSuelo");
       if($this->noBlanco(Input::get("SelErosion"))) $geologia->erosion=Input::get("SelErosion");
       if($this->noBlanco(Input::get("SelMovRoca"))) $geologia->mov_roca=Input::get("SelMovRoca");
       if($this->noBlanco(Input::get("SelMovSuelo"))) $geologia->mov_suelo=Input::get("SelMovSuelo");
       if($this->noBlanco(Input::get("SelEstilo"))) $geologia->estilo=Input::get("SelEstilo");
       if($this->noBlanco(Input::get("SelActividad"))) $geologia->actividad=Input::get("SelActividad");
       if($this->noBlanco(Input::get("SelRepet"))) $geologia->secuencia_repeticion=Input::get("SelRepet");
       if($this->noBlanco(Input::get("txtAnchoM"))) $geologia->ancho_morfometria=Input::get("txtAnchoM");
       if($this->noBlanco(Input::get("txtLongitudM"))) $geologia->longitud_morfometira=Input::get("txtLongitudM");
       if($this->noBlanco(Input::get("txtProfundidadM"))) $geologia->profundidad_morfometria=Input::get("txtProfundidadM");
       if($this->noBlanco(Input::get("txtObservacionM"))) $geologia->observ_morfometria=Input::get("txtObservacionM");
       if($this->noBlanco(Input::get("txtDescCausaM"))) $geologia->causa=Input::get("txtDescCausaM");
       if($this->noBlanco(Input::get("txtInterM"))) $geologia->intercalada_arcillolitas_arenisca=Input::get("txtInterM");
       if($this->noBlanco(Input::get("SelAlcant"))) $geologia->estado_alcantarilla=Input::get("SelAlcant");
       if($this->noBlanco(Input::get("SelCuneta"))) $geologia->estado_cuneta=Input::get("SelCuneta");
       if($this->noBlanco(Input::get("SelCanales"))) $geologia->estado_canales=Input::get("SelCanales");
       if($this->noBlanco(Input::get("SelDrenes"))) $geologia->estado_drenes=Input::get("SelDrenes");
       if($this->noBlanco(Input::get("SelEncole"))) $geologia->estado_encole=Input::get("SelEncole");
       if($this->noBlanco(Input::get("SelDescole"))) $geologia->estado_descole=Input::get("SelDescole");
       if($this->noBlanco(Input::get("SelOtrosAgua"))) $geologia->estado_otros=Input::get("SelOtrosAgua");
       if($this->noBlanco(Input::get("SelHum"))) $geologia->hum_suelo=Input::get("SelHum");
       if($this->noBlanco(Input::get("SelIncli"))) $geologia->inclinacion=Input::get("SelIncli");
       if($this->noBlanco(Input::get("txtObservacionV"))) $geologia->observacion_afectacion=Input::get("txtObservacionV");
       if($this->noBlanco(Input::get("SelMuroGav"))) $geologia->muro_gaviones=Input::get("SelMuroGav");
       if($this->noBlanco(Input::get("SelMuroCon"))) $geologia->muro_concreto=Input::get("SelMuroCon");
       if($this->noBlanco(Input::get("SelMuroOtr"))) $geologia->muro_otro=Input::get("SelMuroOtr");
       if($this->noBlanco(Input::get("txtObservacionCon"))) $geologia->observacion_obras_estabilizacion=Input::get("txtObservacionCon");
       if($this->noBlanco(Input::get("txtRecomendacionCon"))) $geologia->recomendaciones_obras_estabilizacion=Input::get("txtRecomendacionCon");
       if($this->noBlanco(Input::get("SelEstViv"))) $geologia->estado_vivienda=Input::get("SelEstViv");
       if($this->noBlanco(Input::get("txtObservacionOtroA"))) $geologia->observacion_otros_apectos=Input::get("txtObservacionOtroA");
       if($this->noBlanco(Input::get("txtDescG"))) $geologia->descripcion_general=Input::get("txtDescG");
       if($this->noBlanco(Input::get("SelTipPro"))) $geologia->tipo_proceso=Input::get("SelTipPro");
       if($this->noBlanco(Input::get("txtElev"))) $geologia->elevacion=Input::get("txtElev");
       $geologia->save();
#----------------------------------------- Geologica -----------------------------------------------------------
#
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
       return Redirect::action('PestanaGeologicaController@show',array(Input::get("hidMina")));
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