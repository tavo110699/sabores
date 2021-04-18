@extends('tienda.master')

@section('titulo', 'Lista de productos')

@section('contenido')
    @include('tienda.secciones.slider')
    <section id="demo">
        @foreach($productos as $producto)

            <article class="white-panel"> <img class="imgcard"  src="{{url('img/'.$producto->imagen)}}" alt="ALT">
                <h1><a href="#">{{$producto->nombre}}</a></h1>
                <p>{{$producto->descripcion}}</p>
                <div class="card-footer" style="background: inherit; border-color: inherit;">
                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('carrito-agregar',$producto->idproducto)}}'"><i class="fas fa-cart-plus"></i></button>
                    <button type="button" class="btn btn-outline-primary"  onclick="location.href='{{route('producto-detalle', [$producto->idproducto])}}'" href="{{route('producto-detalle', [$producto->idproducto])}}">Ver más <i class="fas fa-arrow-right"></i></button>
                </div>

            </article>

        @endforeach
    </section>


@endsection





