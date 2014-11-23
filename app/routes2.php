<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});




Route::get("/vendedores", function()
{
    $vendedores = Vendedor::with("productos")->get();
    return View::make("Vendedor.vendedores", array("vendedores" => $vendedores));
});        
        




// esta será la ruta inicial del proyecto 
// aquí va a estar el formulario para registrarse y para inicio de sesión
// esta ruta debe ser pública y por lo tanto no debe llegar el filtro auth
Route::get("login", function() {
    return View:: make("Login.login2");
});

// eta ruta será para crear el usuario
Route::post("registro", function(){
    $input= Input::all();
    
    // al momento de crear el usuario la clave debe ser encriptada 
    // para eso utilizamos la función estatica make de la clase Hash
    // esta función encripta el texto para que sea almacenado de la manera segura
    $input["primer_nombre"]= $input["txtNombre"];
    $input["usuario"]= $input["txtUsuario"];
    $input["password"] = Hash::make($input["txtPassword"]);
    Usuarios::create($input);
    return Redirect::to("login")->with("mensaje_registro", "Usuario Registrado");
});

// esta ruta ervirá para iniciar la sesión por medio del usuario y la clave
// para esta utilizamos la función estratégica attemp de la clase Auth
// esta función recibe como parámetros un arreglo con el correo y la clave
Route::post("loginxxx", function(){
   // la funcion attempt se encarga automaticamente de hacer la encriptación de la clave para ser confidencial
    if(Auth:: attempt(array("usuario" => Input::get("txtUsuario"), "password" => Input::get("txtPassword")), true))
    {
        return Redirect::to("entrada");
    }
    else
    {
        return Redirect::to("login")->with("mensaje_login", "Ingreso Inválido".Input::get("txtPassword"));
    }
});
// esta ruta ervirá para iniciar la sesión por medio del usuario y la clave
// para esta utilizamos la función estratégica attemp de la clase Auth
// esta función recibe como parámetros un arreglo con el correo y la clave
Route::post("login", "LoginController@loginUsuario");

// por último crearemos un grupo con el filtro auth
// Para todas estas rutas el usuario debe haber iniciado Sesión
// En caso de que se intente entrar y el usuario haya iniciado sesión entonces sera redirigido a la ruta login
Route::group(array("before" => "auth"), function(){
    Route::get("entrada", function(){
        echo "Bienvenido";
        
        // con la función Auth::user() podemos obtener cualquier dato del usuario
        // que esté en la sesión en esta caso usamos el Usuario y el ID
        // Esta función esta disponible en cualquier parte del código
        // siempre y cuando haya un usuario con sesión iniciada
        echo "Bienvenido". Auth::user()->usuario . ", su id es: ";
        return Redirect::to("inicio");
    });
    
    Route::get('/inicio', function()
    {
            return View::make('Inicio.inicio');
    });
    Route::get("cerrarSesion","LoginController@CerrarSesion");
    Route::get("vendedor", "VendedorController@mostrarVendedores");
    Route::post("vendedor", "VendedorController@crearVendedor");

    Route::get("producto", "ProductoController@mostrarProductos");
    Route::post("producto", "ProductoController@crearProductos");
    
    Route::get("usuario", "UsuariosController@mostrarUsuarios");
#    Route::post("usuario", "UsuariosController@crearUsuarios");
    
    Route::get("formMinas", function()
    {
        return View::make("FormMinas.FormMinas");
    });
    /* Grupo de Rutas para las pestañas*/
    Route::get("pestanaJuridico", function()
    {
        return View::make("Pestanas.pestanaJuridico");
    });
     Route::get("pestanaMinero", function()
    {
        return View::make("Pestanas.pestanaMinero");
    });
    
    Route::resource('pestanaMinero', 'PestanaMineroController');
    Route::resource('datosMina', 'DatosMinaController');
    /***********************************/
#    Route::get("datosMina","DatosMinaController@create");
});