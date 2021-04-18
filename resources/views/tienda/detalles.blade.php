

@extends('tienda.master')

@section('titulo', 'Lista de productos')

@section('contenido')
    <div class="container text-center">
        <h1>Detalles</h1>

        <div class="row">
            <div class="col-md-5">
                <div class="bloque-producto">
                    <img class="imgcard" src="{{url('img/'.$producto->imagen)}}">
                </div>
            </div>

            <div class="col-md-5">
                <div class="bloque-producto">
                    <h2>{{$producto->nombre}}</h2>
                    <p>{{$producto->descripcion}}</p>
                    <h3>Precio: {{$producto->precio}}</h3>
                    <button type="button" class="btn btn-primary"  onclick="location.href='{{route('carrito-agregar',$producto->idproducto)}}'"><i class="fas fa-cart-plus"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <button type="button" class="btn btn-outline-primary"  onclick="location.href='{{route('producto-detalle', [$producto->idproducto])}}'" href="{{route('inicio')}}">Ver más <i class="fas fa-arrow-right"></i></button>
    </div>



@endsection