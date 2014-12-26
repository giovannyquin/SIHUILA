<h2>
  Ingresar
 </h2>
 
@if (Session::has('mensaje_login'))
<span>{{ Session::get('mensaje_login') }}</span>
@endif
 
{{ Form::open(array('url' => 'login')) }}
    
    {{ Form::label('txtUsuario', 'Usuario'); }}
    {{ Form::text('txtUsuario'); }}
    {{ Form::label('password', 'Clave'); }} 
    {{ Form::password('txtPassword'); }}
    {{ Form::submit('Ingresar'); }}
 
{{ Form::close() }}
 
<h2>
  Registro
</h2>
@if (Session::has('mensaje_registro'))
<span>{{ Session::get('mensaje_registro') }}</span>
@endif
 
{{ Form::open(array('url' => 'registro')) }}
    
    {{ Form::label('txtNombre', 'Nombre'); }}
    {{ Form::text('txtNombre'); }}
    {{ Form::label('txtApellido', 'Apellido'); }}
    {{ Form::text('txtApellido'); }}
    {{ Form::label('txtUsuario', 'Usuario'); }}
    {{ Form::text('txtUsuario'); }}
    {{ Form::label('password', 'Clave'); }} 
    {{ Form::password('txtPassword'); }}
    {{ Form::submit('Registrar'); }}
 
{{ Form::close() }}