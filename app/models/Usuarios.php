<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Auth\UserInterface;

Class Usuarios extends Eloquent implements UserInterface
{
    protected $table='SIusuarios';
    protected $fillable= 
            array("primer_nombre",
                    "segundo_nombre",
                    "primer_apellido", 
                    "segundo_apellido",
                    "usuario", 
                    "password",
                    "id_cargo",
                    "id_perfil",
                    "id_menu");
    protected static $registros = array();
    
    public function menus()
    {
        return $this->hasOne("Menu", "id_menu");
    }
    
    public function perfiles()
    {
        return $this->hasOne("Perfil", "id_perfil");
    }
    
    public function cargos()
    {
        return $this->hasOne("Cargo", "id_cargo");
    }
    
    public static function agregarUsuarios($input)
    {
        $respuesta= array();
        $reglas=
                array(
                    "txtPrimerNombre" => array("required", "alpha", "max:100"),
                    "txtSegundoNombre" => array("alpha", "max:100"),
                    "txtPrimerApellido" => array("required", "alpha", "max:100"),
                    "txtSegundoApellido" => array("alpha", "max:100"),
                    "txtUsuario" => array("required","alpha_num", "max:50"),
                    "txtClave" => array("required"),
                    "selmenu" => "required",
                    "selperfil" => "required",
                    "selcargo" => "required",
                );
        $validator = Validator::make($input, $reglas);
        if($validator->fails())
        {
            $respuesta["mensaje"]=$validator;
            $respuesta["error"]=true;
        }
        else
        {
            self::arrayAGuardar($input);
            $usuario = static::create(self::$registros);
            $respuesta["mensaje"]="Usuario Creado Satisfactoriamente";
            $respuesta["error"]=false;
            $respuesta["data"]=$usuario;
        }
        return $respuesta;
    }
    
    /*
     * Metodo para darle valores al array para guardar el Usuario correctamente
     * @Autor Giovanny Quintero
     * @Fecha 16-Nov-2014
     */
    protected static function arrayAGuardar($input)
    {
        self::$registros["primer_nombre"]=$input["txtPrimerNombre"];
        self::$registros["segundo_nombre"]=$input["txtSegundoNombre"];
        self::$registros["primer_apellido"]=$input["txtPrimerApellido"];
        self::$registros["segundo_apellido"]=$input["txtSegundoApellido"];
        self::$registros["usuario"]=$input["txtUsuario"];
        self::$registros["password"]= Hash::make($input["txtClave"]); // encriptamos la clave
        self::$registros["id_cargo"]=$input["selcargo"];
        self::$registros["id_perfil"]=$input["selperfil"];
        self::$registros["id_menu"]=$input["selmenu"];
    }
    
    // este metodo se debe implementar por la interfaz
    public function getAuthIdentifier() {
        return $this->getKey();
    }
    
    // este metodo se debe implementar por la interfaz
    // y sirve para obtener la clave al momento de validar el inicio de sesión
    public function getAuthPassword() {
        return $this->password;
    }
    
    /**
    * Get the token value for the "remember me" session.
    *
    * @return string
    */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
    * Set the token value for the "remember me" session.
    *
    * @param string $value
    * @return void
    */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
    * Get the column name for the "remember me" token.
    *
    * @return string
    */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}