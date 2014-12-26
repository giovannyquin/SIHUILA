<?php

class PestanaMineroController extends BaseController{
   public function index() {
   }

   public function show($id) { 
       $arrAgno = array(''=>'Selecccione...');
       foreach (range(date('Y')-20,date('Y')) as $agnno) {
           $arrAgno[$agnno]=$agnno;
           #array_push($arrAgno,$agnno);
       }
#       var_dump($arrAgno);exit();
       $minas=Mina::whereId_mina($id)->get();
       $detalle=DetalleMina::whereId_mina($id)->get();
       $geo=Geo::whereId_mina($id)->get();
       $produccion=Produccion::whereId_mina($id)->get();
       $talentohumano=TalentoHumano::whereId_mina($id)->get();
       $plano=Plano::whereId_mina($id)->get();
       $metodoexplotacion=MetodoExplotacion::whereId_mina($id)->get();
       $deptno=Departamento::all();
       $comDeptno=array('' => "Seleccione..")+$deptno->lists('nombre_departamento','id_departamento');
       $munici=Municipio::all();
       $comMunici=array('' => 'Seleccione..')+$munici->lists('nombre_municipio','id_municipio');
       $vereda=Vereda::all();
       $comVereda=array('' => 'Seleccione..')+$vereda->lists('nombre_vereda','id_vereda');
       $mineral=Mineral::all();
       $comMineral=array('' => 'Seleccione..')+$mineral->lists('nombre_mineral','id_mineral');
       $comSiNo=array('' => 'Seleccione..','Si'=>'Si','No'=>'No');
       $comBuReMa=array('' => 'Seleccione..','BUENO'=>'Bueno','REGULAR'=>'Regular','MALO'=>'Malo');
       $arrConTalues=array(''=>'Seleccione..','ESTABLE'=>'Estable','INESTABLE'=>'Inestable');
       $comFrenteBocamina=array('' => 'Seleccione..','Frente'=>'Frente','Bocamina'=>'Bocamina');
       $comUnidad=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','UNID')->lists('descripcion_toplogia', 'id_topologia');
       $comTipoMineria=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','TIPMIN')->lists('descripcion_toplogia', 'id_topologia');
       $comMetExplotacion=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','METET')->lists('descripcion_toplogia', 'id_topologia');
       $comSisArranque=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','SISARR')->lists('descripcion_toplogia', 'id_topologia');
       $comSisTransporte=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','SISTRAN')->lists('descripcion_toplogia', 'id_topologia');
       $comSisCargue=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','SISCAR')->lists('descripcion_toplogia', 'id_topologia');
       $comTipFuenteEneria=array("" => "Seleccione..")+Topologia::where('cod_topologia','=','SISCAR')->lists('descripcion_toplogia', 'id_topologia');
       $comDesCosVenBocamina=array("" => "Seleccione..")+Topologia::whereCod_topologia('DEST')->lists('descripcion_toplogia', 'id_topologia');
       $comTipoContrato=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','TIPCON')->lists('descripcion_toplogia', 'id_topologia');
       $arrTalHumResExpPer= TalentoHumano::whereId_mina($id)->whereAsunto('RESPONSABLE EXPLOTACION PERMANENTE')->get();
       $arrTalHumResExpTem= TalentoHumano::whereId_mina($id)->whereAsunto('RESPONSABLE EXPLOTACION TEMPORAL')->get();
       $arrTalHumOpePer= TalentoHumano::whereId_mina($id)->whereAsunto('OPERADOR PERMANENTE')->get();
       $arrTalHumOpeTem= TalentoHumano::whereId_mina($id)->whereAsunto('OPERADOR TEMPORAL')->get();
       $arrTipEstado=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','ESTFREN')->lists('descripcion_toplogia', 'id_topologia');
       $arrEstado= GeoMultiple::whereId_mina($id)->get();
       $arrMinPpal= Produccion::whereId_mina($id)->whereTipo_produccion('MINERAL PROYECTO')->get();
       $arrMinOtro= Produccion::whereId_mina($id)->whereTipo_produccion('OTRO MINERAL')->get();
       $arrMes=array("" => "Seleccione..","1"=>"Enero","2"=>"Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
       $arrTipRegimen=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','TIPREG')->lists('descripcion_toplogia', 'id_topologia');
       $arrRegSalud= SeguridadSocial::whereId_mina($id)->whereId_tipo_seguridad(1)->whereId_tipo_mineria(1)->get();
       $arrRegPension= SeguridadSocial::whereId_mina($id)->whereId_tipo_seguridad(2)->whereId_tipo_mineria(1)->get();
       $arrRegRiesgos= SeguridadSocial::whereId_mina($id)->whereId_tipo_seguridad(3)->whereId_tipo_mineria(1)->get();
       $arrRegNinguno= SeguridadSocial::whereId_mina($id)->whereId_tipo_seguridad(4)->whereId_tipo_mineria(1)->get();
       $arrTipInfre=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','TIPINFR')->lists('descripcion_toplogia', 'id_topologia');
       $arrInfra=Infraestructura::whereId_mina($id)->get();#->first();
       $arrEquMaq=EquipoMaquinaria::whereId_mina($id)->get();#->first();
       $arrEstEquMaq=array(''=>'Seleccione..','ACTIVO'=>'Activo','INACTIVO'=>'Inactivo');
       $arrTipCombustible=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','TIPOCOMB')->lists('descripcion_toplogia', 'id_topologia');
       $arrTipPlano=array(""=>"Seleccione..")+Topologia::where('cod_topologia','=','TIPOPLAN')->lists('descripcion_toplogia', 'id_topologia');
       return View::make('Pestanas.pestanaMinero',compact('comDeptno','comMunici','comVereda','comSiNo','minas','geo','detalle',
               'produccion','talentohumano','comTipoMineria','plano','comMetExplotacion','comMineral',
               'comFrenteBocamina','comBuReMa','comUnidad','comTipoContrato','metodoexplotacion','comSisArranque','arrMes',
               'comSisTransporte','comSisCargue','comTipFuenteEneria','comDesCosVenBocamina','arrTalHumResExpPer','arrAgno',
               'arrTalHumResExpTem','arrTalHumOpePer','arrTalHumOpeTem','arrTipEstado','arrEstado','arrMinPpal','arrMinOtro',
               'arrTipRegimen','arrRegSalud','arrRegPension','arrRegRiesgos','arrRegNinguno','arrConTalues','arrTipInfre',
               'arrInfra','arrEquMaq','arrEstEquMaq','arrTipCombustible','arrTipPlano'));

   }   
   
   public function create() { 
   }
   
   public function store() { 
#       return Input::get('hidMina');
#----------------------------------------- Responsable -----------------------------------------------------------
       if($this->noBlanco(Input::get("txtCedula"))){
            $responsable=Responsable::find(Input::get("hidMina"));
            if(is_null($responsable)){
                $responsable= new Responsable();
                if($this->noBlanco(Input::get("hidMina"))) $responsable->id_mina=Input::get("hidMina");
                if($this->noBlanco(Input::get("txtCedula"))) $responsable->ced_responsable=Input::get("txtCedula");
                if($this->noBlanco(Input::get("txtPrimer"))) $responsable->primer_nombre=Input::get("txtPrimer");
                if($this->noBlanco(Input::get("txtSegundo"))) $responsable->segundo_nombre=Input::get("txtSegundo");
                if($this->noBlanco(Input::get("txtPrimerApe"))) $responsable->primer_apellido=Input::get("txtPrimerApe");
                if($this->noBlanco(Input::get("txtSegundoApe"))) $responsable->segundo_apellido=Input::get("txtSegundoApe");
                if($this->noBlanco(Input::get("txtDireccion"))) $responsable->direccion=Input::get("txtDireccion");
                if($this->noBlanco(Input::get("selDepto"))) $responsable->depto=Input::get("selDepto");
                if($this->noBlanco(Input::get("selMunicipio"))) $responsable->municipio=Input::get("selMunicipio");
                if($this->noBlanco(Input::get("selVereda"))) $responsable->vereda=Input::get("selVereda");
                if($this->noBlanco(Input::get("txtTelefono"))) $responsable->telefono_responsable=Input::get("txtTelefono");
                if($this->noBlanco(Input::get("txtCelular"))) $responsable->celular_responsable=Input::get("txtCelular");
                if($this->noBlanco(Input::get("txtCorreo"))) $responsable->correo_responsable=Input::get("txtCorreo");
            }else{
                if($this->noBlanco(Input::get("txtCedula"))) $responsable->ced_responsable=Input::get("txtCedula");
                if($this->noBlanco(Input::get("txtPrimer"))) $responsable->primer_nombre=Input::get("txtPrimer");
                if($this->noBlanco(Input::get("txtSegundo"))) $responsable->segundo_nombre=Input::get("txtSegundo");
                if($this->noBlanco(Input::get("txtPrimerApe"))) $responsable->primer_apellido=Input::get("txtPrimerApe");
                if($this->noBlanco(Input::get("txtSegundoApe"))) $responsable->segundo_apellido=Input::get("txtSegundoApe");
                if($this->noBlanco(Input::get("txtDireccion"))) $responsable->direccion=Input::get("txtDireccion");
                if($this->noBlanco(Input::get("selDepto"))) $responsable->depto=Input::get("selDepto");
                if($this->noBlanco(Input::get("selMunicipio"))) $responsable->municipio=Input::get("selMunicipio");
                if($this->noBlanco(Input::get("selVereda"))) $responsable->vereda=Input::get("selVereda");
                if($this->noBlanco(Input::get("txtTelefono"))) $responsable->telefono_responsable=Input::get("txtTelefono");
                if($this->noBlanco(Input::get("txtCelular"))) $responsable->celular_responsable=Input::get("txtCelular");
                if($this->noBlanco(Input::get("txtCorreo"))) $responsable->correo_responsable=Input::get("txtCorreo");
            }
            $responsable->save();
       }
#----------------------------------------- Responsable -----------------------------------------------------------

#----------------------------------------- Operador -----------------------------------------------------------
       if($this->noBlanco(Input::get("txtCedulaOperador"))){
            $operador=Operador::find(Input::get("hidMina"));
            if(is_null($operador)){
                $operador= new Operador();
                if($this->noBlanco(Input::get("hidMina"))) $operador->id_mina=Input::get("hidMina");
                if($this->noBlanco(Input::get("txtCedulaOperador"))) $operador->ced_operador=Input::get("txtCedulaOperador");
                if($this->noBlanco(Input::get("txtPrimerOperador"))) $operador->primer_nombre=Input::get("txtPrimerOperador");
                if($this->noBlanco(Input::get("txtSegundoOperador"))) $operador->segundo_nombre=Input::get("txtSegundoOperador");
                if($this->noBlanco(Input::get("txtPrimerApeOperador"))) $operador->primer_apellido=Input::get("txtPrimerApeOperador");
                if($this->noBlanco(Input::get("txtSegundoApeOperador"))) $operador->segundo_apellido=Input::get("txtSegundoApeOperador");
           }else{
                if($this->noBlanco(Input::get("txtCedulaOperador"))) $operador->ced_operador=Input::get("txtCedulaOperador");
                if($this->noBlanco(Input::get("txtPrimerOperador"))) $operador->primer_nombre=Input::get("txtPrimerOperador");
                if($this->noBlanco(Input::get("txtSegundoOperador"))) $operador->segundo_nombre=Input::get("txtSegundoOperador");
                if($this->noBlanco(Input::get("txtPrimerApeOperador"))) $operador->primer_apellido=Input::get("txtPrimerApeOperador");
                if($this->noBlanco(Input::get("txtSegundoApeOperador"))) $operador->segundo_apellido=Input::get("txtSegundoApeOperador");
           }
           $operador->save();
       }
#----------------------------------------- Operador -----------------------------------------------------------

#----------------------------------------- Detalle de la Mina -----------------------------------------------------------
       $mina=Mina::find(Input::get("hidMina"));
       if(is_null($mina)){
           $mina= new Mina();
           if($this->noBlanco(Input::get("hidMina"))) $mina->id_mina=Input::get("hidMina");
           if($this->noBlanco(Input::get("txtNombreMina"))) $mina->nombre_mina=Input::get("txtNombreMina");
           if($this->noBlanco(Input::get("selDeptoMina"))) $mina->depto=Input::get("selDeptoMina");
           if($this->noBlanco(Input::get("selMunicipioMina"))) $mina->municipio=Input::get("selMunicipioMina");
      }else{
           if($this->noBlanco(Input::get("txtNombreMina"))) $mina->nombre_mina=Input::get("txtNombreMina");
           if($this->noBlanco(Input::get("selDeptoMina"))) $mina->depto=Input::get("selDeptoMina");
           if($this->noBlanco(Input::get("selMunicipioMina"))) $mina->municipio=Input::get("selMunicipioMina");
      }
      $mina->save();
      
      $detalle=DetalleMina::find(Input::get("hidMina"));
      if(is_null($detalle)){
        $detalle= new DetalleMina();
        if($this->noBlanco(Input::get("hidMina"))) $detalle->id_mina=Input::get("hidMina");
      }
      if($this->noBlanco(Input::get("txtFecha"))) $detalle->fecha_visita=Input::get("txtFecha");
      if($this->noBlanco(Input::get("txtEstadoEtapa"))) $detalle->estado_actual_etapa=Input::get("txtEstadoEtapa");
      if($this->noBlanco(Input::get("txtArea"))) $detalle->area=Input::get("txtArea");
      if($this->noBlanco(Input::get("selMineral"))) $detalle->id_mineral=Input::get("selMineral");
      if($this->noBlanco(Input::get("selPlanos"))) $detalle->tiene_planos=Input::get("selPlanos");
      if($this->noBlanco(Input::get("selEnergia"))) $detalle->energia_electrica=Input::get("selEnergia");
      if($this->noBlanco(Input::get("selTipoFuente"))) $detalle->tipo_fuente_energia=Input::get("selTipoFuente");
      if($this->noBlanco(Input::get("selDisparador"))) $detalle->disparadores_seguridad=Input::get("selDisparador");
      if($this->noBlanco(Input::get("selInstalaElec"))) $detalle->instalacion_electrica=Input::get("selInstalaElec");
      if($this->noBlanco(Input::get("txtTensionUti"))) $detalle->tension_utilizada=Input::get("txtTensionUti");
      if($this->noBlanco(Input::get("selMonGas"))) $detalle->monitor_gases=Input::get("selMonGas");
      if($this->noBlanco(Input::get("selTablero"))) $detalle->tableros_medicion=Input::get("selTablero");
      if($this->noBlanco(Input::get("txtFrenVenti"))) $detalle->frente_bajo_tierra=Input::get("txtFrenVenti");
      if($this->noBlanco(Input::get("txtCostoTon"))) $detalle->costo_tonelada=Input::get("txtCostoTon");
      if($this->noBlanco(Input::get("txtPrecioVenta"))) $detalle->precio_venta=Input::get("txtPrecioVenta");
      if($this->noBlanco(Input::get("selDestinoEco"))) $detalle->id_destino=Input::get("selDestinoEco");
      if($this->noBlanco(Input::get("txtObsProdOtro"))) $detalle->obser_produc_otro_mineral=Input::get("txtObsProdOtro");
      if($this->noBlanco(Input::get("txtObsRecHum"))) $detalle->obser_recur_hum=Input::get("txtObsRecHum");
      if($this->noBlanco(Input::get("txtObser"))) $detalle->obser_econo=Input::get("txtObser");
      if($this->noBlanco(Input::get("selExplosivo"))) $detalle->explosivo=Input::get("selExplosivo");
      if($this->noBlanco(Input::get("selPermisoExplosivo"))) $detalle->permiso_explosivo=Input::get("selPermisoExplosivo");
      $detalle->save();
#----------------------------------------- Detalle de la Mina -----------------------------------------------------------

#----------------------------------------- Ubicacion Geografica ----------------------------------------------------------
      if($this->noBlanco(Input::get("selFrente"))){
          $selFrente = Input::get("selFrente");
          foreach($selFrente as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['frente_bocamina']=$selFrente[$clave];
              }
          }
          $txtNorte = Input::get("txtNorte");
          foreach($txtNorte as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['norte']=$txtNorte[$clave];
              }
          }
          $txtEste = Input::get("txtEste");
          foreach($txtEste as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['este']=$txtEste[$clave];
              }
          }
          $txtAltura = Input::get("txtAltura");
          foreach($txtAltura as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['altura']=$txtAltura[$clave];
              }
          }
          $selEstadoFrente = Input::get("selEstadoFrente");
          foreach($selEstadoFrente as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_estado']=$selEstadoFrente[$clave];
                  //$arr['frente_bocamina']=$selFrente[$clave];
                  unset($geoMul);
                  $geoMul=GeoMultiple::find(Input::get("hidMina"),$arr);
                  if(is_null($geoMul)){ //para crear registros
                      $geoMul=new GeoMultiple();
                      $geoMul->id_mina= Input::get("hidMina");
                      $geoMul->id_estado=$selEstadoFrente[$clave];
                      $geoMul->frente_bocamina=$selFrente[$clave];
                      $geoMul->norte=$txtNorte[$clave];
                      $geoMul->este=$txtEste[$clave];
                      $geoMul->altura=$txtAltura[$clave];
                      $geoMul->save();
                  }
              }
          }
      }
#----------------------------------------- Ubicacion Geografica ----------------------------------------------------------

#----------------------------------------- Produccion Ppal----------------------------------------------------------
      if($this->noBlanco(Input::get("selMineralProd"))){
          $arr['id_mineral']=Input::get("selMineralProd");
          $arr['id_unidad']=Input::get("selUnidadProd");
          $arr['agno']=Input::get("selAgnoProd");
          $arr['mes']=Input::get("selMesProd");
          $arr['tipo_produccion']="MINERAL PROYECTO";
        $produccion=Produccion::find(Input::get("hidMina"),$arr);
         if(is_null($produccion)){
             $produccion= new Produccion();
             if($this->noBlanco(Input::get("hidMina"))) $produccion->id_mina=Input::get("hidMina");
             if($this->noBlanco(Input::get("selMineralProd"))) $produccion->id_mineral=Input::get("selMineralProd");
             if($this->noBlanco(Input::get("selUnidadProd"))) $produccion->id_unidad=Input::get("selUnidadProd");
             if($this->noBlanco(Input::get("txtCantidad"))) $produccion->cantidad=Input::get("txtCantidad");
             if($this->noBlanco(Input::get("selAgnoProd"))) $produccion->agno=Input::get("selAgnoProd");
             if($this->noBlanco(Input::get("selMesProd"))) $produccion->mes=Input::get("selMesProd");
             if($this->noBlanco(Input::get("txtObsProd"))) $produccion->observaciones_produccion=Input::get("txtObsProd");
             $produccion->tipo_produccion='MINERAL PROYECTO';
        }else{
             if($this->noBlanco(Input::get("txtCantidad"))) $produccion->cantidad=Input::get("txtCantidad");
             if($this->noBlanco(Input::get("txtObsProd"))) $produccion->observaciones_produccion=Input::get("txtObsProd");
             $produccion->tipo_produccion='MINERAL PROYECTO';
        }
        $produccion->save();
      }
#----------------------------------------- Produccion Ppal----------------------------------------------------------

#------------------------------------------ Produccion Otro --------------------------------------
 #       return Input::get("selMineralProdOtro");
      if($this->noBlanco(Input::get("selMineralProdOtro"))){
          unset($arr);
          $selMineralProdOtro=Input::get("selMineralProdOtro");
          foreach($selMineralProdOtro as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_mineral']=$selMineralProdOtro[$clave];
              }
          }
          if($this->noBlanco(Input::get("selMineralProdOtro"))){
              $selUnidadProdOtro = Input::get("selUnidadProdOtro");
            foreach($selUnidadProdOtro as $clave => $valor){
                if($this->noBlanco($valor)){
                    $arr['id_unidad']=$selUnidadProdOtro[$clave];
                }
            }
          }
          if($this->noBlanco(Input::get("txtCantidadOtro"))){
              $txtCantidadOtro = Input::get("txtCantidadOtro");
            foreach($txtCantidadOtro as $clave => $valor){
                if($this->noBlanco($valor)){
                    $arr['cantidad']=$txtCantidadOtro[$clave];
                }
            }
          }
          if($this->noBlanco(Input::get("selAgnoProdOtro"))){
              $selAgnoProdOtro = Input::get("selAgnoProdOtro");
            foreach($selAgnoProdOtro as $clave => $valor){
                if($this->noBlanco($valor)){
                    $arr['agno']=$selAgnoProdOtro[$clave];
                }
            }
          }
          if($this->noBlanco(Input::get("selAgnoProdOtro"))){
              $selMesProdOtro = Input::get("selMesProdOtro");
                foreach($selMesProdOtro as $clave => $valor){
                    if($this->noBlanco($valor)){
                        $arr['mes']=$selMesProdOtro[$clave];
                        $arr['tipo_produccion']="OTRO MINERAL";
                        unset($produc);
                        $produc=Produccion::find(Input::get("hidMina"),$arr);
                        #echo $produc."<br>";
                        #var_dump($arr); exit();
                        if(is_null($produc)){ //para crear registros
                            $produc=new Produccion();
                            $produc->id_mina= Input::get("hidMina");
                            $produc->id_mineral=$selMineralProdOtro[$clave];
                            $produc->id_unidad=$selUnidadProdOtro[$clave];
                            $produc->agno=$selAgnoProdOtro[$clave];
                            $produc->mes=$selMesProdOtro[$clave];
                            $produc->tipo_produccion='OTRO MINERAL';
                            $produc->cantidad=$txtCantidadOtro[$clave];;
                            #$produc->observaciones_produccion=Input::get("txtObsProdOtro");
                            $produc->save();
                        }
                    }
                }
          }
      }
#      return var_dump($arr);
#------------------------------------------ Produccion Otro --------------------------------------

##----------------------------------------- Talento Humano ----------------------------------------------------------
#        $selConPer Input::get("selConPer"); 
#------------------------------------------ RESPONSABLE EXPLOTACION PERMANENTE --------------------------------------
      if($this->noBlanco(Input::get("selConPer"))){
          $txtProfPer = Input::get("txtProfPer");
          foreach($txtProfPer as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_profesionales']=$txtProfPer[$clave];
              }
          }
          $txtEmplPer = Input::get("txtEmpPer");
          foreach($txtEmplPer as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_empleados']=$txtEmplPer[$clave];
              }
          }
          $selCondPer = Input::get("selConPer");
          foreach($selCondPer as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['tipo_contrato']=$selCondPer[$clave];
                  $arr['asunto']="RESPONSABLE EXPLOTACION PERMANENTE";
                  unset($talHum);
                  $talHum=TalentoHumano::find(Input::get("hidMina"),$arr);
                  if(is_null($talHum)){ //para crear registros
                      $talHum=new TalentoHumano();
                      $talHum->id_mina= Input::get("hidMina");
                      $talHum->num_profesionales=$txtProfPer[$clave];
                      $talHum->num_empleados=$txtEmplPer[$clave];
                      $talHum->tipo_contrato=$selCondPer[$clave];
                      $talHum->asunto='RESPONSABLE EXPLOTACION PERMANENTE';
                      $talHum->save();
                  }
              }
          }
      }
#------------------------------------------ RESPONSABLE EXPLOTACION PERMANENTE --------------------------------------

#------------------------------------------ RESPONSABLE EXPLOTACION TEMPORAL --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selConTem"))){
         $txtProfTem = Input::get("txtProfTem");
          foreach($txtProfTem as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_profesionales']=$txtProfTem[$clave];
              }
          }
          $txtEmpTem = Input::get("txtEmpTem");
          foreach($txtEmpTem as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_empleados']=$txtEmpTem[$clave];
              }
          }
          $selCondTem = Input::get("selConTem");
          foreach($selCondTem as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['tipo_contrato']=$selCondTem[$clave];
                  $arr['asunto']="RESPONSABLE EXPLOTACION TEMPORAL";
                  unset($talHum);
                  $talHum=TalentoHumano::find(Input::get("hidMina"),$arr);
                  if(is_null($talHum)){ //para crear registros
                      $talHum=new TalentoHumano();
                      $talHum->id_mina= Input::get("hidMina");
                      $talHum->num_profesionales=$txtProfTem[$clave];
                      $talHum->num_empleados=$txtEmpTem[$clave];
                      $talHum->tipo_contrato=$selCondTem[$clave];
                      $talHum->asunto='RESPONSABLE EXPLOTACION TEMPORAL';
                      $talHum->save();
                  }
              }
          }
       }
#------------------------------------------ RESPONSABLE EXPLOTACION TEMPORAL --------------------------------------

#------------------------------------------ OPERADOR PERMANENTE --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selConPerOpe"))){
         $txtProfPerOpe = Input::get("txtProfPerOpe");
          foreach($txtProfPerOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_profesionales']=$txtProfPerOpe[$clave];
              }
          }
          $txtEmpPerOpe = Input::get("txtEmpPerOpe");
          foreach($txtEmpPerOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_empleados']=$txtEmpPerOpe[$clave];
              }
          }
          $selConPerOpe = Input::get("selConPerOpe");
          foreach($selConPerOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['tipo_contrato']=$selConPerOpe[$clave];
                  $arr['asunto']="OPERADOR PERMANENTE";
                  unset($talHum);
                  $talHum=TalentoHumano::find(Input::get("hidMina"),$arr);
                  if(is_null($talHum)){ //para crear registros
                      $talHum=new TalentoHumano();
                      $talHum->id_mina= Input::get("hidMina");
                      $talHum->num_profesionales=$txtProfPerOpe[$clave];
                      $talHum->num_empleados=$txtEmpPerOpe[$clave];
                      $talHum->tipo_contrato=$selConPerOpe[$clave];
                      $talHum->asunto='OPERADOR PERMANENTE';
                      $talHum->save();
                  }
              }
          }
       }
#------------------------------------------ OPERADOR PERMANENTE --------------------------------------

#------------------------------------------ OPERADOR TEMPORAL --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selConEmpOpe"))){
         $txtProfTemOpe = Input::get("txtProfTemOpe");
          foreach($txtProfTemOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_profesionales']=$txtProfTemOpe[$clave];
              }
          }
          $txtEmpTemOpe = Input::get("txtEmpTemOpe");
          foreach($txtEmpTemOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['num_empleados']=$txtEmpTemOpe[$clave];
              }
          }
          $selConEmpOpe = Input::get("selConEmpOpe");
          foreach($selConEmpOpe as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['tipo_contrato']=$selConEmpOpe[$clave];
                  $arr['asunto']="OPERADOR TEMPORAL";
                  unset($talHum);
                  $talHum=TalentoHumano::find(Input::get("hidMina"),$arr);
                  if(is_null($talHum)){ //para crear registros
                      $talHum=new TalentoHumano();
                      $talHum->id_mina= Input::get("hidMina");
                      $talHum->num_profesionales=$txtProfTemOpe[$clave];
                      $talHum->num_empleados=$txtEmpTemOpe[$clave];
                      $talHum->tipo_contrato=$selConEmpOpe[$clave];
                      $talHum->asunto='OPERADOR TEMPORAL';
                      $talHum->save();
                  }
              }
          }
       }
#------------------------------------------ OPERADOR TEMPORAL --------------------------------------

#------------------------------------------ SEGURIDAD SOCIAL SALUD --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selRegimenSalud"))){
           unset($arr);
         $selRegimenSalud = Input::get("selRegimenSalud");
         #return $selRegimenSalud;
         foreach($selRegimenSalud as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_regimen']=$selRegimenSalud[$clave];
              }
         }
          if($this->noBlanco(Input::get("txtCantSalud"))){
              $txtCantSalud = Input::get("txtCantSalud");
              foreach($txtCantSalud as $clave => $valor){
                  if($this->noBlanco($valor)){
                      $arr['numero']=$txtCantSalud[$clave];
                      $arr['id_tipo_seguridad']=1;
                      $arr['id_tipo_mineria']=1;
                      unset($RegSal);
                      $RegSal=SeguridadSocial::find(Input::get("hidMina"),$arr);
                      #return var_dump($arr)."<br>Sofia<br>".$RegSal;
                      if(is_null($RegSal)){ //para crear registros
                          $RegSal=new SeguridadSocial();
                          $RegSal->id_mina= Input::get("hidMina");
                          $RegSal->id_regimen=$selRegimenSalud[$clave];
                          $RegSal->id_tipo_seguridad= 1;
                          $RegSal->id_tipo_mineria= 1;
                          $RegSal->numero= $txtCantSalud[$clave];
                          
                          $RegSal->save();
                      }
                  }
              }
          }
       }
#------------------------------------------ SEGURIDAD SOCIAL SALUD --------------------------------------

#------------------------------------------ SEGURIDAD SOCIAL PENSION --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selRegimenPension"))){
           unset($arr);
         $selRegimenPension = Input::get("selRegimenPension");
         #return $selRegimenSalud;
         foreach($selRegimenPension as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_regimen']=$selRegimenPension[$clave];
              }
         }
          if($this->noBlanco(Input::get("txtCantPension"))){
              $txtCantPension = Input::get("txtCantPension");
              foreach($txtCantPension as $clave => $valor){
                  if($this->noBlanco($valor)){
                      $arr['numero']=$txtCantPension[$clave];
                      $arr['id_tipo_seguridad']=2;
                      $arr['id_tipo_mineria']=1;
                      unset($RegPen);
                      $RegPen=SeguridadSocial::find(Input::get("hidMina"),$arr);
                      #return var_dump($arr)."<br>Sofia<br>".$RegSal;
                      if(is_null($RegPen)){ //para crear registros
                          $RegPen=new SeguridadSocial();
                          $RegPen->id_mina= Input::get("hidMina");
                          $RegPen->id_regimen=$selRegimenPension[$clave];
                          $RegPen->id_tipo_seguridad= 2;
                          $RegPen->id_tipo_mineria= 1;
                          $RegPen->numero= $txtCantPension[$clave];
                          $RegPen->save();
                      }
                  }
              }
          }
       }
#------------------------------------------ SEGURIDAD SOCIAL PENSION --------------------------------------

#------------------------------------------ SEGURIDAD SOCIAL RIESGOS LABORALES --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selRegimenRiesgos"))){
           unset($arr);
         $selRegimenRiesgos = Input::get("selRegimenRiesgos");
         #return $selRegimenSalud;
         foreach($selRegimenRiesgos as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_regimen']=$selRegimenRiesgos[$clave];
              }
         }
          if($this->noBlanco(Input::get("txtCantRiesgos"))){
              $txtCantRiesgos = Input::get("txtCantRiesgos");
              foreach($txtCantRiesgos as $clave => $valor){
                  if($this->noBlanco($valor)){
                      $arr['numero']=$txtCantRiesgos[$clave];
                      $arr['id_tipo_seguridad']=3;
                      $arr['id_tipo_mineria']=1;
                      unset($RegRiesgos);
                      $RegRiesgos=SeguridadSocial::find(Input::get("hidMina"),$arr);
                      #return var_dump($arr)."<br>Sofia<br>".$RegSal;
                      if(is_null($RegRiesgos)){ //para crear registros
                          $RegRiesgos=new SeguridadSocial();
                          $RegRiesgos->id_mina= Input::get("hidMina");
                          $RegRiesgos->id_regimen=$selRegimenRiesgos[$clave];
                          $RegRiesgos->id_tipo_seguridad= 3;
                          $RegRiesgos->id_tipo_mineria= 1;
                          $RegRiesgos->numero= $txtCantRiesgos[$clave];
                          $RegRiesgos->save();
                      }
                  }
              }
          }
       }
#------------------------------------------ SEGURIDAD RIEGOS LABORALES --------------------------------------

#------------------------------------------ SEGURIDAD SOCIAL NIGUNO --------------------------------------
#        return Input::get("selConTem");
       if($this->noBlanco(Input::get("selRegimenNinguno"))){
           unset($arr);
         $selRegimenNinguno = Input::get("selRegimenNinguno");
         #return $selRegimenSalud;
         foreach($selRegimenNinguno as $clave => $valor){
              if($this->noBlanco($valor)){
                  $arr['id_regimen']=$selRegimenNinguno[$clave];
              }
         }
          if($this->noBlanco(Input::get("txtCantNinguno"))){
              $txtCantNinguno = Input::get("txtCantNinguno");
              foreach($txtCantNinguno as $clave => $valor){
                  if($this->noBlanco($valor)){
                      $arr['numero']=$txtCantNinguno[$clave];
                      $arr['id_tipo_seguridad']=4;
                      $arr['id_tipo_mineria']=1;
                      unset($RegNinguno);
                      $RegNinguno=SeguridadSocial::find(Input::get("hidMina"),$arr);
                      #return var_dump($arr)."<br>Sofia<br>".$RegSal;
                      if(is_null($RegNinguno)){ //para crear registros
                          $RegNinguno=new SeguridadSocial();
                          $RegNinguno->id_mina= Input::get("hidMina");
                          $RegNinguno->id_regimen=$selRegimenNinguno[$clave];
                          $RegNinguno->id_tipo_seguridad= 4;
                          $RegNinguno->id_tipo_mineria= 1;
                          $RegNinguno->numero= $txtCantNinguno[$clave];
                          $RegNinguno->save();
                      }
                  }
              }
          }
       }
#------------------------------------------ SEGURIDAD NIGUNO --------------------------------------

#----------------------------------------- Talento Humano----------------------------------------------------------

#----------------------------------------- Plano ----------------------------------------------------------
       if($this->noBlanco(Input::get("selTipoMina"))){
            $plano=Plano::find(Input::get("hidMina"));
            if(is_null($plano)){
                $plano= new Plano();
                if($this->noBlanco(Input::get("hidMina"))) $plano->id_mina=Input::get("hidMina");
            }
           if($this->noBlanco(Input::get("selTipoMina"))) $plano->id_tipo_mineria=Input::get("selTipoMina");
           if($this->noBlanco(Input::get("selPlanos"))) $plano->resultado=Input::get("selPlanos");
           if($this->noBlanco(Input::get("txtFechaPlano"))) $plano->fecha_actualizacion=Input::get("txtFechaPlano");
           if($this->noBlanco(Input::get("selTipoPlano"))) $plano->tipo_plano=Input::get("selTipoPlano");
           $plano->save();
       }
#----------------------------------------- Plano ----------------------------------------------------------

#----------------------------------------- Metodo de Explotacion ----------------------------------------------------------
#       return Input::get("selMetodoET");
       if($this->noBlanco(Input::get("selMetodoET"))){
           $metodoExplotacion=MetodoExplotacion::find(Input::get("hidMina"));
           if(is_null($metodoExplotacion)){
               $metodoExplotacion= new MetodoExplotacion();
               if($this->noBlanco(Input::get("hidMina"))) $metodoExplotacion->id_mina=Input::get("hidMina");
           }
           if($this->noBlanco(Input::get("selMetodoET"))) $metodoExplotacion->id_topologia=Input::get("selMetodoET");
           if($this->noBlanco(Input::get("selTaludes"))) $metodoExplotacion->cond_talude=Input::get("selTaludes");
           if($this->noBlanco(Input::get("selArranque"))) $metodoExplotacion->sis_arranque=Input::get("selArranque");
           if($this->noBlanco(Input::get("selTransporte"))) $metodoExplotacion->sis_transporte=Input::get("selTransporte");
           if($this->noBlanco(Input::get("selCargue"))) $metodoExplotacion->sis_cargue=Input::get("selCargue");
           if($this->noBlanco(Input::get("txtObservacion"))) $metodoExplotacion->obser_general=Input::get("txtObservacion");
           $metodoExplotacion->save();
        }
#----------------------------------------- Metodo de Explotacion ----------------------------------------------------------

#----------------------------------------- Infraestructura ----------------------------------------------------------
#       return Input::get("selMetodoET");
       if($this->noBlanco(Input::get("selTipoInf"))){
           $infra=Infraestructura::find(Input::get("hidMina"));
           if(is_null($infra)){
               $infra=new Infraestructura();
               if($this->noBlanco(Input::get("hidMina"))) $infra->id_mina=Input::get("hidMina");
           }
           if($this->noBlanco(Input::get("selTipoInf"))) $infra->id_tipologia=Input::get("selTipoInf");
           if($this->noBlanco(Input::get("selEstadoInf"))) $infra->estado=Input::get("selEstadoInf");
           if($this->noBlanco(Input::get("txtCoordNorte"))) $infra->coordenada_norte=Input::get("txtCoordNorte");
           if($this->noBlanco(Input::get("txtCoordEste"))) $infra->coordenada_este=Input::get("txtCoordEste");
           if($this->noBlanco(Input::get("txtCapacidad"))) $infra->capacidad=Input::get("txtCapacidad");
           if($this->noBlanco(Input::get("txtObsInf"))) $infra->observaciones_infraestructura=Input::get("txtObsInf");
           $infra->save();
        }
#----------------------------------------- Infraestructura ----------------------------------------------------------

#----------------------------------------- Equipo y Maquinaria ----------------------------------------------------------
       if($this->noBlanco(Input::get("selTipoEquipo"))){
           $equMaq=EquipoMaquinaria::find(Input::get("hidMina"));
           if(is_null($equMaq)){
               $equMaq=new EquipoMaquinaria();
               if($this->noBlanco(Input::get("hidMina"))) $equMaq->id_mina=Input::get("hidMina");
           }
           if($this->noBlanco(Input::get("selTipoEquipo"))) $equMaq->id_tipologia=Input::get("selTipoEquipo");
           if($this->noBlanco(Input::get("selEstadoEquipo"))) $equMaq->estado=Input::get("selEstadoEquipo");
           if($this->noBlanco(Input::get("txtCapacidadEstado"))) $equMaq->capacidad_potencia=Input::get("txtCapacidadEstado");
           if($this->noBlanco(Input::get("selTipoComb"))) $equMaq->tipo_combustible=Input::get("selTipoComb");
           if($this->noBlanco(Input::get("txtCantidadComb"))) $equMaq->cantidad_combustible=Input::get("txtCantidadComb");
           if($this->noBlanco(Input::get("txtObsEquipo"))) $equMaq->observaciones_equipo=Input::get("txtObsEquipo");
           $equMaq->save();
        }
#----------------------------------------- Equipo y Maquinaria ----------------------------------------------------------

#       return 'Se gravo todo '.Input::get("hidMina");
       return Redirect::action('PestanaMineroController@show',array(Input::get("hidMina")));
   }
   
   public function edit($id) { 
   }
   
   public function update($id) { 
   }
   
   public function destroy($id) { 
       return 'Aqui codigo para eliminar';
   }
   
   public function grabarDetalleMina($id){
       return 'aqui grabar '.$id;
   }
}