<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
       <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
       <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet">

       <!-- bloque de efectos -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <title>XCOMM</title>
        <!-- bloque de script del tema matris -->

        <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- ChartJS -->
        <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
        <!-- Sparkline -->
        <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
        <!-- JQVMap -->
        <script src="<?php echo e(asset('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
        <!-- daterangepicker -->
        <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
        <!-- Summernote -->
        <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
        <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>

          <!-- fin del script del tema matris -->
          <!-- bloque de efectos adicionales -->

          <!-- fin de bloque de efectos adicionales -->
        <link href="<?php echo e(asset('css/netmoon.css')); ?>" rel="stylesheet">
        <style>
          .card-body{
            background: white;
          }
        </style>
      </head>
    <?php echo $__env->make('layouts.componente.cabecera_usu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <body class="sidebar-mini layout-fixed">
          <?php echo $__env->yieldContent("contenido"); ?>
      </body>
         <?php echo $__env->yieldContent("pie"); ?>
  </html>
<?php /**PATH D:\laragon\www\xcomm\resources\views/layouts/usuario.blade.php ENDPATH**/ ?>