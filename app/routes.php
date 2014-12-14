<?php

Route::get('/', function()
{
#	return View::make('hello');
        return View:: make("Login.login2");
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
    Route::post("usuario", "UsuariosController@crearUsuarios");
    
    Route::get("formMinas", function()
    {
        return View::make("FormMinas.FormMinas");
    });
    //Route::get("formMinas/{id}", "FormMinaController@cargarPestanas");
    /* Grupo de Rutas para las pestañas*/
    Route::get("pestanaJuridico", function()
    {
        return View::make("Pestanas.pestanaJuridico");
    });
    /*Route::get("pestanaMinero", function()
    {
        return View::make("Pestanas.pestanaMinero");
    });*/
    Route::get("pestanaAmbiental", function()
    {
        return View::make("Pestanas.pestanaAmbiental");
    });
    Route::get("pestanaSiso", function()
    {
        return View::make("Pestanas.pestanaSiso");
    });
    Route::get("pestanaBiodiversidad", function()
    {
        return View::make("Pestanas.pestanaBiodiversidad");
    });
    /***********************************/
    Route::get("listaMina", "ListaMinaController@listarMinas");
    Route::resource('datosMina', 'DatosMinaController');
    Route::resource('pestanaMinero', 'PestanaMineroController');
    Route::resource('pestanaJuridico', 'PestanaJuridicoController');
    Route::resource('pestanaAmbiental', 'PestanaAmbientalController');
    Route::resource('pestanaSiso', 'PestanaSisoController');
    Route::resource('pestanaBiodiversidad', 'PestanaBiodiversidadController');
    Route::resource('formMinas','FormMinaController');
    Route::delete("seleccionMultipleElim/{id}/{topo}/{asunto}/{pestana}",array("as"=>"seleccionMultipleElim","uses"=>"SeleccionMultipleController@eliminar") );
    Route::delete("talentoHumanoElim/{id}/{tipo}/{asunto}/{pestana}",array("as"=>"talentoHumanoElim","uses"=>"TalentoHumanoController@eliminar") );
    Route::delete("geoMultipleElim/{id}/{tipo}/{asunto}/{pestana}",array("as"=>"geoMultipleElim","uses"=>"GeoMultipleController@eliminar") );
    Route::delete("seguridadSocialElim/{id}/{idRegimen}/{idSeguridad}/{idMineria}/{pestana}",array("as"=>"seguridadSocialElim","uses"=>"SeguridadSocialController@eliminar") );
    Route::delete("especieVegetalElim/{id}/{nombreComun}/{pestana}",array("as"=>"especieVegetalElim","uses"=>"EspeciesVegetalesController@eliminar") );
    Route::delete("compesacionForestalElim/{id}/{especie}/{pestana}",array("as"=>"compesacionForestalElim","uses"=>"CompesacionForestalController@eliminar") );
    Route::delete("especieAnimalElim/{id}/{nombreComun}/{pestana}",array("as"=>"especieAnimalElim","uses"=>"EspeciesAnimalesController@eliminar") );
    Route::delete("contaminanteElim/{id}/{nombreComun}/{pestana}",array("as"=>"contaminanteElim","uses"=>"ContaminantesController@eliminar") );
    
    /******** Encuestas **********/
    Route::get("listaTiposEnc", "ListadoController@listarTipoEncuestas");
    Route::resource('TipoEncuesta', 'TipoEncuestaController');
    Route::resource('AspectosPreguntas', 'AspectosPreguntasController');
    Route::resource('TipoAspectosPreguntas', 'TipoAspectosPreguntasController');
    Route::resource('TipoRespuestas', 'TipoRespuestaController');
    Route::resource('Preguntas', 'PreguntaController');
    
    Route::resource('Encuestado', 'EncuestadoController');
    Route::get("MenuEncuesta/{id}", function($id){
        return View::make("Encuesta.menuEncuesta", array("id" => $id));
    });
        /*********** FORMULARIOS DE CREACION ********/
        Route::get("AspPregCrear/{id}", function($id){
            return View::make("Encuesta.Aspecto.crear", array("id" => $id));
        });
        /*Route::get("TipoAspPregCrear/{id}", function($id){
            return View::make("Encuesta.TipoAspecto.crear", array("id" => $id));
        });*/
        Route::get("TipoAspPregCrear/{id}", "TipoAspectosPreguntasController@formCrear");
        Route::get("TipoRptaCrear/{id}", "TipoRespuestaController@formCrear");
        Route::get("TipoRptaCrear/{id_tipo_enc}/{id_tipo_resp}", "TipoRespuestaController@formActualizar");
        Route::get("PreguntaCrear/{id_tipo_enc}", "PreguntaController@formCrear");
        
        Route::get("EncuestadoCrear/{id_tipo_enc}", "EncuestadoController@formCrear");
        Route::get("EncuestadoCrear/{id_tipo_enc}/{num_docu}", "EncuestadoController@formActualizar");
        /*******************/
        /********** select dependiente ************/
        
        Route::post("selectDependientes", "SelectDependienteController@select");
        /**********************************/
        /**** Links de eliminacion cuando tienen mas de una variable y no se puede con resource *****/
        Route::delete("EncuestadoElim/{id_tipo_enc}/{num_docu}", "EncuestadoController@eliminar" );
        /******************************/
        Route::get("EncuestaSocial/{id_tipo_enc}/{num_docu}", "EncuestaSocialController@mostrarEncuesta");
        Route::post("guardaEncuestaSocial", "EncuestaSocialController@guardarTextNumero");
    Route::get("EncSocial", "ListadoController@listarSocial");
    /**************** Fin Encuestas ****************************/
});