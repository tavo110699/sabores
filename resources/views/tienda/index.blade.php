@extends('tienda.master')

@section('titulo', 'Lista de productos')

@section('contenido')

    <h1>Listado de productos</h1>

    @foreach($productos as $producto)

        <h2>{{$producto->nombre}}</h2>
        <p><img src="{{url('img/'.$producto->imagen)}}" width="180" alt=""></p>
        <h3>Precio: {{$producto->precio}}</h3>
        <p>{{$producto->descripcion}}</p>
        <p>
            <a href="">Agregar al carrito</a>
            <a href="{{route('producto-detalle', [$producto->idproducto])}}">Ver más</a>

        </p>
        <hr>
    @endforeach



@endsection