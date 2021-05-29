@extends('admin.template')
@section('titulo','Administrador de pedidos')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1>Pedidos</h1>
        </div>
    </div>

    <div class="container text-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>mas detalles</th>
                    <th>Eliminar</th>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Envio</th>
                    <th>Fecha de creación</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos as $ped)
                    <tr>
                        <td>
                            <button onclick="location.href = '{{route('pedidos.show', [$ped->id])}}'" class="btn btn-info text-white">
                                <i class="fas fa-info"></i>
                            </button>
                        </td>
                        <td>
                                <button onclick="document.getElementById('deletePedido{{$ped->id}}').submit()" class="btn btn-danger text-white">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            <form id="deletePedido{{$ped->id}}" action="{{route('pedidos.destroy', [$ped->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$ped->id}}">
                            </form>
                        </td>
                        <td>{{$ped->id}}</td>
                        <td>{{$ped->user->name}}</td>
                        <td>{{$ped->subtotal}}</td>
                        <td>{{$ped->envio}}</td>
                        <td>{{date("Y-m-d",strtotime($ped->created_at))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection