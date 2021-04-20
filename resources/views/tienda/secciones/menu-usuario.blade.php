@if(Auth::check())
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <i class="fas fa-user"></i></a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Acceso</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/logout')}}"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar Sesion</a>
        <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;"> {{csrf_field()}}</form>
    </div>
</li>
@else
    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('/login')}}">Iniciar Sesion</a>
            <a class="dropdown-item" href="{{url('/register')}}">Registrarse</a>
        </div>
    </li>
    </form>
@endif