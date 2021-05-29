@extends('admin.template')
@section('titulo','Administrador de pedidos')
@section('contenido')

    <div class="container">

        <div class="row">

            <div class="col-4">

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Información del pedido</h6>
                    </div>
                    <div class="card-body">

                        <p>Cliente: {{$pedido->user->name}}</p>
                        <p>Correo electronico: {{$pedido->user->email}}</p>
                        <p>Dirección: {{$pedido->user->direction}}</p>
                        <p>Fecha de pedido: {{date("Y-m-d",strtotime($pedido->created_at))}}</p>

                    </div>
                </div>

            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h6>Productos del pedido</h6>
                            </div>
                            <div class="col-auto">
                                <button onclick="location.href = '{{route('pedidos.index')}}'" class="btn btn-info text-white">Atras</button>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped ">

                                <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($pedido->items as $item)

                                    <tr>
                                        <td>{{$item->cantidad}}</td>
                                        <td>{{$item->producto->nombre}}</td>
                                        <td>{{$item->precio}}</td>
                                        <td>
                                            @php

                                                $sub = $item->cantidad * $item->precio;
                                                $iva = $sub * .16;
                                                $subtotal = $sub + $iva;
                                                $total += $subtotal;
                                                echo '$'.$subtotal.' MXN';

                                            @endphp


                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="text-right float-right">
                            <h5 style="text-align: end">Total: ${{$total}} MXN</h5>
                            <p style="text-align: end">El costo total incluye un IVA de 16%</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection