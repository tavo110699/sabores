@extends('tienda.master')
@section('titulo','Detalles de compra')

@section('contenido')
    @php
        $total = 0;
    @endphp

    <div class="container text-center">
        <div class="page-header">
            <h1> <i class="fas fa-shopping-cart"></i>  Detalles de la orden</h1>
        </div>

        <div class="table-responsive">
                <h3>Datos de usuaio</h3>

            <table class="table table-striped table-hover table-bordered">
                <tr><td>Nombre</td> <td>{{Auth::user()->name}}</td></tr>
                <tr><td>Email</td> <td>{{Auth::user()->email}}</td></tr>
                <tr><td>Direccion</td> <td>{{Auth::user()->direccion}}</td></tr>
            </table>
        </div>

        <div class="table-responsive">
            <h3>Datos de la orden</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                @foreach($carrito as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->precio}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->precio * $item->cantidad}}</td>

                        @php
                            $total = $total + ($item->precio*$item->cantidad);
                        @endphp

                    </tr>
                @endforeach
            </table>



            <h3>Total: ${{number_format($total,2)}}</h3>
            <hr>
        </div>

        <a href="{{route('inicio')}}" class="btn btn-primary">
            <i class="fas fa-chevron-circle-left"></i> Seguir comprando
        </a>
        <a href="{{route('payment')}}" class="btn btn-primary">Pagar
        <i class="fas fa-cc-paypal fa-2X"></i>
        </a>
    </div>
@endsection