
@extends('admin.template')
@section('titulo','Administrador de categorias')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1> <i class="fas fa-shopping-cart"></i>Categorias
                <a class="btn btn-warning" href="{{route('categorias.create')}}"> Nueva Categoria <i class="fas fa-plus"></i></a>
            </h1>
        </div>
    </div>

<div class="container text-center">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered"> <thead>
            <tr>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Nombre</th>
                <th>Descripcion</th>
            </tr>
            </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>Editar</td>
                <td>Eliminar</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->descripcion}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection