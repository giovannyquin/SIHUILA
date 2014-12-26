@extends("SbAdmin.index")

@section("Titulo")
    Frentes Mineros
@stop

@section("NombrePagina")
    Frentes Mineros
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Frentes Mineros de {{ $unidad->nombre }}</h3>
    @if(Session::get("mensaje"))
        <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
        <div class="alert alert-success">{{Session::get("mensaje")}}</div>
    @endif
    <div class="row">
        {{ link_to("FrenteCrear/{$unidad->id_minamina}", "Crear Frente Minero", array("class" => "btn btn-primary")) }}
        {{ link_to("UnidadMinera/", "Volver a Unidades", array("class" => "btn btn-warning")) }}
    </div>
    @if(isset($frente) && $frente->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre Unidad </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre Frente </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Departamento </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Municipio </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Vereda </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Plantas Beneficio  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
              <?php //var_dump($modoRpta); ?>
          @foreach($frente as $frente)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $unidad->nombre }} </td>
                <td style="text-align: center;"> {{ $frente->nombre_mina }} </td>
                <td style="text-align: center;"> @foreach($depto[$frente->id_mina] as $dp) {{ $dp }} @endforeach </td>
                <td style="text-align: center;"> @foreach($muni[$frente->id_mina] as $mu) {{ $mu }} @endforeach </td>
                <td style="text-align: center;"> @foreach($vereda[$frente->id_mina] as $ve) {{ $ve }} @endforeach </td>
                <td style="text-align: center;"> {{ link_to('PlantaBeneficio/'.$frente->id_mina, 'Ir a Plantas', array("class" => "btn btn-info btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('FrenteMinero/'.$frente->id_mina."/edit", 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('FrenteMinero/'.$frente->id_mina, 'Eliminar', array("class" => "btn btn-danger", "data-method" => "delete", "rel" => "noflow")) }} </td>
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