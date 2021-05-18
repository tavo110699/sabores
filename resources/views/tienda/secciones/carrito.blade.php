@extends('tienda.master')
@section('titulo','Carrito de Productos')

@section('contenido')
@php
    $total = 0;
@endphp

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
        <td>
            <input type="number" min="1" max="50" value="{{$item->cantidad}}" id="producto_{{$item->idproducto}}">
            <a href="#" class="btn btn-warning btn-update-item"
                data-href="{{route('carrito-actualizar', $item->idproducto)}}"
                data-id="{{$item->idproducto}}"><i class="fas fa-redo"></i></a>
        </td>
        <td>{{$item->precio * $item->cantidad}}</td>
        <td><a href="{{route('carrito-borrar',$item->idproducto)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> </a> </td>
    </tr>

    @php
        $total = $total + ($item->precio * $item->cantidad);
    @endphp

    @endforeach

    </tbody>
</table>
            <h3>
                @php
                    echo 'Monto total: '. $total;
                @endphp
            </h3>
        </div>
    </div>
    @else
    <h1>No hay productos en el carrito de compras</h1>
    @endif
        <a href="{{route('inicio')}}" class="btn btn-primary">Seguir comprando</a>
        <a href="{{route('orden-detalles')}}" class="btn btn-primary">Continuar</a>
</div>
@endsection