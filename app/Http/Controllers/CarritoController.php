<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class CarritoController extends Controller
{
    //
    public function __construct()
    {
        //preguntamos si eciste el arreglo carrito, si no existe lo creamos
        if(!\Session::has('carrito')) \Session::put('carrito',array());
    }

    //mostrar carrito
    public function show(){
       // return \Session::get('carrito');

        //reciir la variable de session carrito
        $carrito = \Session::get('carrito');
        return view('tienda.secciones.carrito', compact('carrito'));
    }

    //agregar item a  carrito: llama a nuestro modelo Producto y recibe un parametro $producto
    public function add(Producto $producto){
        //reciir la variable de session carrito
        $carrito = \Session::get('carrito');
        //agrega un nuevo dato al arreglo, en este caso si cantidad =1, valor que tomara por primera vez
        $producto->cantidad = 1;
        //El id del producto sera el indice del arreglo carrito
        $carrito[$producto->idproducto]=$producto;
        \Session::put('carrito',$carrito);
        return \Session::get('carrito');
    }

    public function delete(Producto $producto){
        //reciir la variable de session carrito
        $carrito = \Session::get('carrito');
        //agrega un nuevo dato al arreglo, en este caso si cantidad =1, valor que tomara por primera vez
        unset($carrito[$producto->idproducto]);
        \Session::put('carrito',$carrito);
        return redirect()->route('carrito');
    }
}
