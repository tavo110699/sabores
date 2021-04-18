@extends('tienda.master')
@section('titulo','Carrito de Productos')

@section('contenido')
<div class="container text-center">
    @if(count($carrito))
    <div class="table-responsive">
        <div class="tabla-carrito">
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Eliminar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($carrito as $item)
    <tr>
        <td><img class="imgcard"  src="{{url('img/'.$item->imagen)}}" alt="ALT"></td>

        <td>{{$item->nombre}}</td>
        <td>{{$item->precio}}</td>
        <td>{{$item->cantidad}}</td>
        <td>{{$item->precio * $item->cantidad}}</td>
        <td><a href="{{route('carrito-borrar',$item->idproducto)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> </a> </td>
    </tr>
    @endforeach

    </tbody>
</table>
        </div>
    </div>
    @else
    <h1>No hay productos en el carrito de compras</h1>
    @endif
</div>
@endsection