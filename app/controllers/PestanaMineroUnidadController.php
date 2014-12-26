<?php

class PestanaMineroUnidadController extends BaseController{
   public function index() {
   }

   public function show($id) { 
       $arrAgno = array(''=>'Selecccione...');
       foreach (range(date('Y')-20,date('Y')) as $agnno) {
           $arrAgno[$agnno]=$agnno;
           #array_push($arrAgno,$agnno);
       }
       $minas=MinaMina::whereId_minamina($id)->first();
       $detalle=DetalleMinaMina::whereId_minamina($id)->get();
       $responsable=Responsable::whereId_minamina($id)->first();
       $operador=Operador::whereId_minamina($id)->get();
       $comMunici=array('' => "Seleccione..");
       $comVereda=array('' => "Seleccione..");
       if(is_null($minas->id_depto))
       {
            $deptno=Departamento::all();
            $comDeptno=array('' => "Seleccione..")+$deptno->lists('nombre_departamento','id_departamento');
       }
       else
       {
           $deptno=Departamento::all();
            $comDeptno=array('' => "Seleccione..")+$deptno->lists('nombre_departamento','id_departamento');
           if(!is_null($minas->id_municipio))
           {
               $comMunici = Municipio::whereId_departamento($minas->id_depto)->distinct()
                       ->lists('nombre_municipio', 'id_municipio');
           }
           if(!is_null($minas->id_vereda))
           {
               $comVereda= Vereda::whereId_municipio($minas->id_municipio)->distinct()
                       ->lists('nombre_vereda', 'id_vereda');
           }
       }
       $comMuniciRes=array('' => "Seleccione..");
       $comVeredaRes=array('' => "Seleccione..");
       //return dd($responsable->depto);
       if(!isset($responsable->depto))
       {
            $deptno=Departamento::all();
            $comDeptnoRes=array('' => "Seleccione..")+$deptno->lists('nombre_departamento','id_departamento');
       }
       else
       {
           $deptno=Departamento::all();
            $comDeptnoRes=array('' => "Seleccione..")+$deptno->lists('nombre_departamento','id_departamento');
           if(!is_null($responsable->municipio))
           {
               $comMuniciRes = Municipio::whereId_departamento($responsable->depto)->distinct()
                       ->lists('nombre_municipio', 'id_municipio');
           }
           if(!is_null($responsable->vereda))
           {
               $comVeredaRes= Vereda::whereId_municipio($responsable->municipio)->distinct()
                       ->lists('nombre_vereda', 'id_vereda');
           }
       }
       //return dd($comMuniciRes);
       $mineral=Mineral::all();
       $comMineral=array('' => 'Seleccione..')+$mineral->lists('nombre_mineral','id_mineral');
       
       
#       var_dump($arrAgno);exit();
      
       
       return View::make('PestanasUnidades.pestanaMinero')
                        ->with("comDeptno", $comDeptno)
                        ->with("comMunici", $comMunici)
                        ->with("comVereda", $comVereda)
                        ->with("comMineral", $comMineral)
                        ->with("mina", $minas)
                        ->with("detalle", $detalle)
                        ->with("responsable", $responsable)
                        ->with("operador", $operador)
                        ->with("comDeptnoRes", $comDeptnoRes)
                        ->with("comMuniciRes", $comMuniciRes)
                        ->with("comVeredaRes", $comVeredaRes);

   }   
   
   public function create() { 
   }
   
   public function store() { 
#       return Input::get('hidMina');
#----------------------------------------- Responsable -----------------------------------------------------------
       //if($this->noBlanco(Input::get("txtCedula"))){
            $responsable=Responsable::find(Input::get("hidMina"));
            if(is_null($responsable)){
                $responsable= new Responsable();
                if($this->noBlanco(Input::get("hidMina"))) $responsable->id_minamina=Input::get("hidMina");
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
       //}
#----------------------------------------- Responsable -----------------------------------------------------------

#----------------------------------------- Operador -----------------------------------------------------------
       //if($this->noBlanco(Input::get("txtCedulaOperador"))){
            $operador=Operador::find(Input::get("hidMina"));
            if(is_null($operador)){
                $operador= new Operador();
                if($this->noBlanco(Input::get("hidMina"))) $operador->id_minamina=Input::get("hidMina");
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
       //}
#----------------------------------------- Operador -----------------------------------------------------------

#----------------------------------------- Detalle de la Mina -----------------------------------------------------------
       $mina=MinaMina::find(Input::get("hidMina"));
       if(is_null($mina)){
           $mina= new MinaMina();
           if($this->noBlanco(Input::get("hidMina"))) $mina->id_mina=Input::get("hidMina");
           if($this->noBlanco(Input::get("txtNombreMina"))) $mina->nombre=Input::get("txtNombreMina");
           if($this->noBlanco(Input::get("selDeptoMina"))) $mina->id_depto=Input::get("selDeptoMina");
           if($this->noBlanco(Input::get("selMunicipioMina"))) $mina->id_municipio=Input::get("selMunicipioMina");
      }else{
           if($this->noBlanco(Input::get("txtNombreMina"))) $mina->nombre=Input::get("txtNombreMina");
           if($this->noBlanco(Input::get("selDeptoMina"))) $mina->id_depto=Input::get("selDeptoMina");
           if($this->noBlanco(Input::get("selMunicipioMina"))) $mina->id_municipio=Input::get("selMunicipioMina");
      }
      $mina->save();
      
      $detalle=DetalleMinaMina::find(Input::get("hidMina"));
      if(is_null($detalle)){
        $detalle= new DetalleMinaMina();
        if($this->noBlanco(Input::get("hidMina"))) $detalle->id_mina=Input::get("hidMina");
      }
      if($this->noBlanco(Input::get("txtFecha"))) $detalle->fecha_visita=Input::get("txtFecha");
      if($this->noBlanco(Input::get("txtEstadoEtapa"))) $detalle->estado_actual_etapa=Input::get("txtEstadoEtapa");
      if($this->noBlanco(Input::get("txtArea"))) $detalle->area=Input::get("txtArea");
      if($this->noBlanco(Input::get("selMineral"))) $detalle->id_mineral=Input::get("selMineral");
      $detalle->save();
#----------------------------------------- Detalle de la Mina -----------------------------------------------------------

#       return 'Se gravo todo '.Input::get("hidMina");
       return Redirect::action('PestanaMineroUnidadController@show',array(Input::get("hidMina")));
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