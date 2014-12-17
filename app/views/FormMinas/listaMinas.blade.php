@extends("SbAdmin.index")

@section("Titulo")
    Pestañas de Mineria
@stop

@section("NombrePagina")
    Pestañas de Mineria
@stop
@section("JsJQuery")
    
@stop
@section("SeccionTrabajo")
<div class="marketing">
    <h1> Minas </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <!--<p> {{ link_to ('datosMina/create', 'Crear nueva Mina') }} </p>-->
    @if($mina->count())
    <div class="table-responsive">
       <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
          <tr>
             <th style="width: 300px; border-bottom: solid 1px #000;"> Nombre  </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Departamento </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Municipio </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Vereda </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($mina as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->nombre_mina }} </td>
                <td style="text-align: center;"> {{ $item->depto }} </td>
                <td style="text-align: center;"> {{ $item->municipio }} </td>
                <td style="text-align: center;"> {{ ($item->vereda) }} </td>
                <!--<td style="text-align: center;"> Ver </td>-->
                <!--<td style="text-align: center;">{{ link_to('datosMina/'.$item->id, 'Ver') }}</td>-->
                <!--<td style="text-align: center;"> Editar </td>-->
                <td style="text-align: center;"> {{ link_to('pestanaMinero/'.$item->id_mina.'/', 'Editar') }} </td>
                <!--<td style="text-align: center;"> Eliminar </td>-->
<!--
                <td style="text-align: center;"> 
                   {{ Form::open(array('url' => 'datosMina/'.$item->id)) }}
                      {{ Form::hidden("_method", "DELETE") }}
                      {{ Form::submit("Eliminar") }}
                   {{ Form::close() }}
                </td>
-->
             </tr>
          @endforeach
          
          </tbody>
       </table>
    </div>
    @else
       <p> No se han encontrado Minas </p>
    @endif
</div>
@stop
