@extends('admin.template')
@section('titulo','Administrador')
@section('contenido')
    <div class="container text-center">
        <div class="page-header">
            <h1> <i class="fas fa-users-cog"></i>Sabores Dashboard</h1>
        </div>
        <h3>Bienvenido {{Auth::user()->name}} al panel de administracion de Sabores Online</h3> <hr>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <i class="fab fa-buffer icon-home"></i>
                <a href="{{route('categorias.index')}}" class="btn btn-warning btn-block btn-home-admin">Categorias</a>
            </div>
        </div>
            <div class="col-md-6">
                <div class="panel">
                    <i class="fas fa-boxes icon-home"></i>
                    <a href="" class="btn btn-warning btn-block btn-home-admin">Productos</a>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <i class="fas fa-truck-loading icon-home"></i>
                <a href="" class="btn btn-warning btn-block btn-home-admin">Pedidos</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <i class="fas fa-users icon-home"></i>
                <a href="" class="btn btn-warning btn-block btn-home-admin">Usuarios</a>
            </div>
        </div>
    </div>
@endsection