<?php

class PestanaMineroController extends BaseController{
   public function index() {
    $mina=Mina::all();
    $deptno=Departamento::all();
    $munici=Municipio::all();
    $vereda=Vereda::all();
#    return View::make('FormMinas.datosMina')->with('deptno', $deptno)->with('munici',$munici);
    //return View::make('FormMinas.listaMinas')->with('mina', $mina)->with('deptno', $deptno)
                                            // ->with('munici',$munici)->with('vereda',$vereda);
    return Redirect::to('formMinas',compact('comDeptno','comMunici','comVereda'))->with('mina',$mina);
   }

   public function show($id) { 
       $mina= Mina::whereId_mina($id)->get();
       $detalle = DetalleMina::whereId_mina($id)->get();
       return View::make("Pestanas.pestanaMinero", 
               array("minas"=> $mina, 
                        "detalle" => $detalle,
                    ));
       //return 'Listo Sofia2';
   }   
   
   public function create() { 
       return 'Listo Sofia3';
#       $mina = new Mina();
       #return View::make('Pestanas.pestanaMinero')->with('mina', $mina);
   }
   
   public function store() { 
    $mina=new Mina();
    //$mina->nombre_mina = Input::get('txtNombreMina');
    //$mina->depto = Input::get('selDeptoMina');
    //$mina->save
    $detallemina=DetalleMina::all();
     if($detallemina->count()==0){
           $detallemina=new DetalleMina();
           $this->datosDetalleMinas($detallemina);
           //$detallemina->id_mina=$id;
       }
    //return Redirect::to('Pestanas')->with('mina',$mina);
   }
   
   public function edit($id) { 
       $mina=Mina::find($id);
       $deptno=Departamento::all();
       $combox=$deptno->lists('nombre_departamento','id_departamento');
       $comDeptno=array('' => "Seleccione ... ")+$combox;
       $munici=Municipio::all();
       $combox=$munici->lists('nombre_municipio','id_municipio');
       $comMunici=array('' => "Seleccione ... ")+$combox;
       $vereda=Vereda::all();
       $combox=$vereda->lists('nombre_vereda','id_vereda');
       $comVereda=array('' => "Seleccione ... ")+$combox;
      return Redirect::to('formMinas',compact('comDeptno','comMunici','comVereda'))->with('mina',$mina);
       //return View::make('FormMinas.FormMinas',compact('comDeptno','comMunici','comVereda'),array('mina'=>$mina));
   }
   
   public function update($id) { 
#       return 'Listo Sofia update';
#------------------------Datos generales de la mina------------------
       $mina=Mina::find($id);
       $mina->nombre_mina=Input::get('txtNombreMina');
       $mina->depto = Input::get('selDeptoMina');
       $mina->save();
#--------------------------------------------------------------------
#------------------------Detalles de la mina-------------------------
       $detallemina=DetalleMina::all();
       if($detallemina->count()==0){
           $detallemina=new DetalleMina();
           $detallemina->id_mina=$id;
       }else{
           $detallemina=DetalleMina::find($id);
       }
       $detallemina->fecha_visita=Input::get('txtFecha');
       $detallemina->fecha_visita=Input::get('txtFecha');
#       $detallemina->=Input::get('txtEstadoEtapa');
       $detallemina->save();
#--------------------------------------------------------------------
       
       return Redirect::to('pestanaMinero/'.$id.'/edit');
   }
   
   public function destroy($id) { 
       return 'Aqui codigo para eliminar';
   }
   
   public function grabarDetalleMina($id){
       return 'aqui grabar '.$id;
   }
   
   /*public function datosDetalleMinas($detallemina)
   {
       $entro=false;
       if(!empty(Input::get("txtFecha")))
       {
           $detallemina->fecha_visita=Input::get("txtFecha");
           $entro=true;
       }
       if($entro)
       {
           $detallemina->save();
       }
   }*/
}