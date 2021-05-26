<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bloque principal css del tema matris -->
       <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
       <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
       <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
       <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
       <link href="{{ asset('css/skins/_all-skins.min.css') }}" rel="stylesheet">

       <link href="{{ asset('css/jquery-jvectormap.css') }}" rel="stylesheet">
       <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
       <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
       <link href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
       <link href="{{ asset('js/morris.js/morris.css') }}" rel="stylesheet">
       <link href="{{ asset('css/netmoon.css') }}" rel="stylesheet">
       <!-- fin bloque principal css del tema matris -->
       <!-- bloque de efectos -->
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <!--<link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">-->


       <!-- bloque de efectos -->
@include('sweet::alert')
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa|Orbitron|Play|Rajdhani&display=swap" rel="stylesheet">
        <title>XCOMM</title>
      </head>
      <body class="cuerpo">
       @yield("contenido")

       <!-- bloque de script del tema matris -->
         <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
         <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
         <script src="{{ asset('js/bootstrap.min.js') }}"></script>
         <script src="{{ asset('js/raphael.min.js') }}"></script>
         <script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
         <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
         <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
         <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
         <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
         <script src="{{ asset('js/moment.min.js') }}"></script>
         <script src="{{ asset('js/daterangepicker.js') }}"></script>
         <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
         <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
         <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
         <script src="{{ asset('js/adminlte.min.js') }}"></script>
         <!-- <script src="{{ asset('js/pages/dashboard.js') }}"></script> -->
         <script src="{{ asset('js/demo.js') }}"></script>
         <!-- fin del script del tema matris -->
         <!-- bloque de efectos adicionales -->

         <!-- fin de bloque de efectos adicionales -->
      </body>
  </html>
