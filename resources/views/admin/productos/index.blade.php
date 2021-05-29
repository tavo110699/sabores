@extends('admin.template')
@section('titulo','Administrador de productos')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1>Productos
                <a class="btn btn-primary" href="{{route('productos.create')}}">Nuevo Producto <i data-feather="plus"></i></a>
            </h1>
        </div>
    </div>

    <div class="container text-center">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>#</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>precio</th>
                    <th>Fecha de creación</th>
                    <th>Imagen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $pro)
                    <tr>
                        <td>
                            <button onclick="location.href = '{{route('productos.edit', [$pro->idproducto])}}'" class="btn btn-warning text-white">
                                <i class="far fa-edit"></i>
                            </button>
                        </td>

                        <td>
                            <button onclick="document.getElementById('deleteProducto{{$pro->idproducto}}').submit()" class="btn btn-danger text-white">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <form id="deleteProducto{{$pro->idproducto}}" action="{{route('productos.destroy', [$pro->idproducto])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$pro->idproducto}}">
                            </form>

                        </td>

                        <td>{{$pro->idproducto}}</td>
                        <td>{{$pro->codigo}}</td>
                        <td>{{$pro->nombre}}</td>
                        <td> {{$pro->descripcion}}</td>
                        <td>{{$pro->precio}}</td>
                        <td>{{date("Y-m-d",strtotime($pro->created_at))}}</td>
                        <td><img src="{{asset('img/'.$pro->imagen.'')}}" width="150"></td>
                         </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
