<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('png/mini.ico') }}">
    <title>XCOMM</title>
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
   <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
   <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

   <!-- bloque de efectos -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bloque de script del tema matris -->

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>

      <!-- fin del script del tema matris -->
      <!-- bloque de efectos adicionales -->

      <!-- fin de bloque de efectos adicionales -->
    <link href="{{ asset('css/netmoon.css') }}" rel="stylesheet">
  </head>
  <style>
  html{
    background-image: url('/png/fondo2.jpg');
    background-size: cover;
    background-attachment: fixed;
    }
    .main-header{
       margin-left: 0px !important; background: white !important;
       padding: 0px 10px; box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.4);
    }
     body{background: rgba(244, 246, 249, 0.7); min-height: 100% !important;  overflow-x: hidden;}
    .medio{padding-left: 2em; padding-right: 2em; padding-bottom: 5em;}
    .main-footer {margin-left: 0px !important; box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.5);}
  </style>
  @include('layouts.componente.minicabe')
<header class="main-header">
  <nav class="navbar navbar-static-top" style="margin-left: 0px;">
    <div class="caja-flex">
      <div class="logo">
        <span class="logo-lg">
          <a href="{{ url('/') }}" >
              <img src="{{ asset('png/XCOMM LOGOp.jpg') }}" class="img-responsive" style="width: 350px">
            </a>
        </span>
    </div>
          @if (Route::has('login'))
            @auth
            <div class="tasks-menu notifications-menu"><a href="{{ url('/home') }}">Inicio</a></div>
            <div class="tasks-menu notifications-menu"><a href="{{ route('xcommlogout') }}">Logout</a></div>
            @endauth
            @auth('banco')
                <div class="tasks-menu notifications-menu"><a href="{{ route('dashboardBanco') }}">Inicio</a></div>
                <div class="tasks-menu notifications-menu"><a href="{{route('logoutBanco')}}">Logout</a></div>
            @endauth

        @else
          <div class="tasks-menu notifications-menu">
            <a href="{{ url('login_xcomm') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            <a href="{{ url('login_xcomm') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login Cliente</a>
          </div>
              @if (Route::has('register'))
          <div class="tasks-menu notifications-menu">
{{--            <a href="{{ route('register') }}" class="dropdown-toggle"><i class="fa fa-registered" aria-hidden="true"></i> Registro--}}
            </a>
          </div>
               @endif
          @endif
        </div>
      <!--  </div> -->
    </nav>
</header>
<body class="cuerpo hold-transition skin-blue sidebar-mini">
    <div id="app">
          <main class="py-4">
            @yield('contenido')
        </main>
    </div>
  </body>
       @yield("pie")
</html>
@stack('scripts')
