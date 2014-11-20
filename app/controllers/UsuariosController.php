<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosController extends BaseController
{
    public function mostrarUsuarios()
    {
        $menus = Menu::all();
        $usuarios = Usuarios::all();
        $perfiles = Perfil::all();
        $cargos = Cargo::all();
        return View::make("Usuario.usuario", 
                            array("menus"=> $menus, 
                                    "usuarios"=> $usuarios, 
                                    "perfiles" => $perfiles, 
                                    "cargos" => $cargos
                                 )
                         );
    }
    
    /*
     * Metodo para crear los usuarios según reglas que se verifican en el modelo
     */
    public function crearUsuarios()
    {
        $respuesta= Usuarios::agregarUsuarios(Input::all());
        if($respuesta["error"]==true)
        {
            return Redirect::to("usuario")->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            return Redirect::to("usuario")->with("mensaje", $respuesta["mensaje"]);
        }
    }
}