<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginController extends BaseController
{
    // esta ruta ervirá para iniciar la sesión por medio del usuario y la clave
    // para esta utilizamos la función estratégica attemp de la clase Auth
    // esta función recibe como parámetros un arreglo con el correo y la clave
    public function loginUsuario()
    {
        // la funcion attempt se encarga automaticamente de hacer la encriptación de la clave para ser confidencial
        if(Auth:: attempt(array("usuario" => Input::get("txtUsuario"), "password" => Input::get("txtPassword")), true))
        {
            return Redirect::to("entrada");
        }
        else
        {
            return Redirect::to("login")->with("mensaje_login", "Ingreso Inválido")->withErrors("mensaje")->withInput();
        }
    }
    
    public function cerrarSesion()
    {
        Auth::logout();
        return Redirect::to("login")->with("mensaje_login","Sesión Cerrada Satisfactoriamente");
    }
}