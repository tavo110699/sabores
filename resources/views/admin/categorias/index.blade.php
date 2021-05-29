@extends('admin.template')
@section('titulo','Administrador de categorias')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fas fa-shopping-cart"></i>Categorias
                <a class="btn btn-warning" href="{{route('categorias.create')}}"> Nueva Categoria <i
                            class="fas fa-plus"></i></a>
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
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>
                            <a href="{{route('categorias.edit',$categoria->idcategoria)}} " class="btn btn-warning"
                               style="color: white"><i class="far fa-edit"></i></a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['categorias.destroy',$categoria->idcategoria]])!!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button onclick="return confirm('Eliminar categoria?')" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            {!!Form::close()!!}
                        </td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->descripcion}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection