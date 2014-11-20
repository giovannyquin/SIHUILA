<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VendedorController extends BaseController{
    public function mostrarVendedores()
    {
        $vendedores = Vendedor::all();
        return View::make("Vendedor.vendedor", array("vendedores" => $vendedores));
    }
    
    public function crearVendedor()
    {
        $respuesta = Vendedor::agregarVendedor(Input::all());
        
        if($respuesta["error"]== true)
        {
            return Redirect::to("vendedor")->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            return Redirect::to("vendedor")->with("mensaje", $respuesta["mensaje"]);
        }
    }
}