@extends("SbAdmin.index")

@section("Titulo")
    Formulario de Usuarios
@stop

@section("NombrePagina")
    Formulario de Usuarios
@stop

@section("SeccionTrabajo")
<div class="marketing">
    <p class="bg-primary row">Creación de Usuarios</p>
    {{ Form::open(array("url"=>"usuario", "class" => "form-horizontal")) }}
        @if(Session::get("mensaje"))
            <div class="alert alert-success">{{ Session::get("mensaje")}}</div>
        @endif
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("primerNombre", "Primer Nombre", array("class" => "control-label")) }}
                {{ Form::text("txtPrimerNombre", Input::old("txtPrimerNombre"), 
                                array("class" => "form-control", "placeholder" => "Primer Nombre", "autocomplete"=> "off")) }}
                @if($errors->has("txtPrimerNombre"))
                    
                        @foreach($errors->get("txtPrimerNombre") as $error)
                          <span class="help-block alert alert-danger">  * {{ $error }} </span>
                        @endforeach
                    
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("segundoNombre", "Segundo Nombre", array("class" => "control-label")) }}
                {{ Form::text("txtSegundoNombre", Input::old("txtSegundoNombre"), 
                                array("class" => "form-control", "placeholder" => "Segundo Nombre", "autocomplete"=> "off")) }}
                 @if($errors->has("txtSegundoNombre"))
                 
                        @foreach($errors->get("txtSegundoNombre") as $error)
                           <span class="help-block alert alert-danger"> * {{ $error }} </span>
                        @endforeach
                
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("primerApellido", "Primer Apellido", array("class" => "control-label")) }}
                {{ Form::text("txtPrimerApellido", Input::old("txtPrimerApellido"), 
                                array("class" => "form-control", "placeholder" => "Primer Apellido", "autocomplete"=> "off")) }}
                @if($errors->has("txtPrimerApellido"))
                
                        @foreach($errors->get("txtPrimerApellido") as $error)
                           <span class="help-block alert alert-danger"> * {{ $error }} </span>
                        @endforeach
                
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("segundoApellido", "Segundo Apellido", array("class" => "control-label")) }}
                {{ Form::text("txtSegundoApellido", Input::old("txtSegundoApellido"), 
                                array("class" => "form-control", "placeholder" => "Segundo Apellido", "autocomplete"=> "off")) }}
                @if($errors->has("txtSegundoApellido"))
                
                        @foreach($errors->get("txtSegundoApellido") as $error)
                           <span class="help-block alert alert-danger"> * {{ $error }} </span>
                        @endforeach
                
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("txtUsuario", "Usuario", array("class" => "control-label")) }}
                {{ Form::text("txtUsuario", Input::old("txtUsuario"), 
                                array("class" => "form-control", "placeholder" => "Nombre Usuario", "autocomplete"=> "off")) }}
                 @if($errors->has("txtUsuario"))
                <span class="help-block alert alert-danger">
                        @foreach($errors->get("txtUsuario") as $error)
                            * {{ $error }} <br />
                        @endforeach
                </span>
                @endif
            </div>
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("txtClave", "Password", array("class" => "control-label")) }}
                {{ Form::text("txtClave", Input::old("txtClave"), 
                                array("class" => "form-control", "placeholder" => "Password", "autocomplete"=> "off")) }}
                @if($errors->has("txtClave"))
                <span class="help-block alert alert-danger">
                        @foreach($errors->get("txtClave") as $error)
                            * {{ $error }} <br />
                        @endforeach
                </span>
                @endif
            </div>
        <!-- Creamos un select para elegir el menú -->
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("id_menu","Menú", array("class" => "control-label")) }}
                <select class="form-control" name="selmenu">
                    <option value="">Seleccione...</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id_menu}}">{{$menu->descripcion_menu}}</option>
                    @endforeach
                </select>
                @if($errors->has("selmenu"))
                <span class="help-block alert alert-danger">
                    @foreach($errors->get("selmenu") as $error)
                        * {{ $error }} <br />
                    @endforeach
                </span>
                @endif
            </div>
        <!-- Creamos un select para elegir el Perfil -->
        
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("id_perfil","Perfil", array("class" => "control-label")) }}
                <select class="form-control" name="selperfil">
                    <option value="">Seleccione...</option>
                    @foreach($perfiles as $perfil)
                        <option value="{{$perfil->id_perfil}}">{{$perfil->descripcion_perfil}}</option>
                    @endforeach
                </select>
                @if($errors->has("selperfil"))
                <span class="help-block alert alert-danger">
                    @foreach($errors->get("selperfil") as $error)
                        * {{ $error }} <br />
                    @endforeach
                </span>
                @endif
            </div>
        </div>
        
        <!-- Creamos un select para elegir el Cargo -->
        <div class="row">
            <div class="form-group form-group-sm col-xs-12 col-sm-3">
                {{ Form::label("id_cargo","Cargo", array("class" => "control-label")) }}
                <select class="form-control" name="selcargo">
                    <option value="">Seleccione...</option>
                    @foreach($cargos as $cargo)
                        <option value="{{$cargo->id_cargo}}">{{$cargo->descripcion_cargo}}</option>
                    @endforeach
                </select>
                @if($errors->has("selcargo"))
                <span class="help-block alert alert-danger">
                    @foreach($errors->get("selcargo") as $error)
                        * {{ $error }} <br />
                    @endforeach
                </span>
                @endif
            </div>
        </div>
        
        <div class="row col-xs-12">
        {{ Form::submit("Guardar Usuario", array("class" => "btn btn-success")) }}
        {{ Form::button("Resetear", array("class" => "btn btn-default")) }}
        </div>
        <hr>
        <p class="bg-primary row">Lista de Usuarios</p>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered table-responsive">
    <thead>
        <tr class="success">
           <th>Primer Nombre</th>
           <th>Segundo Nombre</th>
           <th>Primer Apellido</th>
           <th>Segundo Apellido</th>
           <th>Usuario</th>
           <th>Cargo</th>
           <th>Perfil</th>
           <th>Menú</th>
    </tr>
    </thead>
    <tbody>
        
        @foreach($usuarios as $usuario)
        
        <tr>
            <td>{{$usuario->primer_nombre}}</td>
            <td>{{$usuario->segundo_nombre}}</td>
            <td>{{$usuario->primer_apellido}}</td>
            <td>{{$usuario->segundo_apellido}}</td>
            <td>{{$usuario->usuario}}</td>
            <td>{{$cargo->descripcion_cargo}}</td>
            <td>{{$usuario->id_perfil}}</td>
            <td>{{$usuario->id_menu}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>
</div>
@stop
