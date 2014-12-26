<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductoController extends BaseController
{
    public function mostrarProductos()
    {
        $productos = Producto::all();
        $vendedores = Vendedor::all();
        
        return View::make("Producto.producto", array("productos"=> $productos, "vendedores"=> $vendedores));
    }
    
    public function crearProductos()
    {
        $respuesta = Producto::agregarProducto(Input::all());
        
        if($respuesta["error"]== true)
        {
            return Redirect::to("producto")->withErrors($respuesta["mensaje"])->withInput();
        }
        else
        {
            return Redirect::to("producto")->with("mensaje", $respuesta["mensaje"]);
        }
    }
}