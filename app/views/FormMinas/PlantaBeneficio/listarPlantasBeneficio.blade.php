@extends("SbAdmin.index")

@section("Titulo")
   Plantas de Beneficio
@stop

@section("NombrePagina")
    Plantas de Beneficio
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Plantas de beneficio del frente minero {{ $frente->nombre_mina }}</h3>
    @if(Session::get("mensaje"))
        <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
        <div class="alert alert-success">{{Session::get("mensaje")}}</div>
    @endif
    <div class="row">
        {{ link_to("PlantaBeneficioCrear/{$frente->id_mina}", "Crear Planta de Beneficio", array("class" => "btn btn-primary")) }}
        {{ link_to("FrenteMinero/{$frente->id_minamina}", "Volver a Frente Minero", array("class" => "btn btn-warning")) }}
    </div>
    @if(isset($planta) && $planta->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre Unidad </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre Frente </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre Planta </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
              <?php //var_dump($modoRpta); ?>
          @foreach($planta as $planta)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $unidad->nombre }} </td>
                <td style="text-align: center;"> {{ $frente->nombre_mina }} </td>
                <td style="text-align: center;"> {{ $planta->nombre }} </td>
                <td style="text-align: center;"> {{ link_to('PlantaBeneficio/'.$planta->id_planta."/edit", 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('PlantaBeneficio/'.$planta->id_planta, 'Eliminar', array("class" => "btn btn-danger", "data-method" => "delete", "rel" => "noflow")) }} </td>
             </tr>
             <?php $a++; ?>
          @endforeach
          
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado Tipos de Respuestas </p>
    @endif
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
@stop