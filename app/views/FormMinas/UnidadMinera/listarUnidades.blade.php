@extends("SbAdmin.index")

@section("Titulo")
    Unidad MInera
@stop

@section("NombrePagina")
    Unidad Minera
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h3> Unidades Mineras</h3>
    @if(Session::get("mensaje"))
        <!-- Si hay un mensaje lo imprimimos y le damos estilo con bootstrap -->
        <div class="alert alert-success">{{Session::get("mensaje")}}</div>
    @endif
    @if(isset($unidad) && count($unidad))
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Número  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Departamento </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Municipio </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Vereda </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;">  </th>
          </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($unidad as $unidad)
             <tr>
                <td style="text-align: center;"> {{ $a }} </td>
                <td style="text-align: center;"> {{ $unidad->nombre }} </td>
                <td style="text-align: center;"> @foreach($depto[$unidad->id_minamina] as $dpt) {{ $dpt }} @endforeach </td>                
                <td style="text-align: center;"> @foreach($municipio[$unidad->id_minamina] as $muni) {{ $muni }} @endforeach </td>
                <td style="text-align: center;"> @foreach($vereda[$unidad->id_minamina] as $vere){{ $vere }} @endforeach </td>
                <td style="text-align: center;"> {{ link_to('ListarFrentes/'.$unidad->id_minamina, 'Ir a Frentes', array("class" => "btn btn-info btn-md")) }} </td>
                <td style="text-align: center;"> {{ link_to('pestanaJuridico/'.$unidad->id_minamina, 'Editar', array("class" => "btn btn-success btn-md")) }} </td>
             </tr>
             <?php $a++; ?>
          @endforeach     
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado Registros </p>
    @endif
</div>
@stop
@section("JsJQuery")
{{ HTML::script('js/restfulizer.js') }}
@stop