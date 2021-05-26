@include('layouts.componente.minicabeu')
<nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      @php
      @endphp
        @if (Route::has('login'))
          @auth('users')
      <li class="nav-item">
        <a class="nav-link"  href="{{ url('/home') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('xcommlogout') }}">
        <i class="fas fa-sign-out-alt"></i> Logout Usuario</a>
      </li>
      @elseauth('banco')
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('dashboardBanco') }}">
         <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Banco </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('logoutBanco') }}">
         <i class="fas fa-sign-out-alt"></i> Logout Banco</a>
      </li>
      @elseauth('cliente')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboardCliente') }}">
         <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logoutCliente')}}">
         <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout Cliente</a>
        </li>
        @endauth
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ url('login_xcomm') }}">
          <i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ url('login_xcomm') }}">
          <i class="fas fa-sign-in-alt"></i> Login Cliente</a>
      </li>
      @if (Route::has('register'))
{{--            <div class="tasks-menu notifications-menu"><a href="{{ route('register') }}" class="dropdown-toggle"><i class="fa fa-registered" aria-hidden="true"></i> Registro</a></div>--}}
       @endif
  @endif

    </ul>
</nav>
