<?php

namespace App\Http\Controllers;

use App\Producto;

class ProductosController extends Controller
{
    //


    /* public function index()
    {
        $productos = Producto::all();
        return $productos;
    }*/
    public function index(){
        $productos =  Producto::all();

        return view('tienda.index', compact('productos'));
    }

    public function show($idProducto){
        $producto =  Producto::find($idProducto);

        return view('tienda.detalles', compact('producto'));
    }




}
