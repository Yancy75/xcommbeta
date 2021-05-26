<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- bloque principal css del tema matris -->
       <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/ionicons.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/AdminLTE.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/skins/_all-skins.min.css')); ?>" rel="stylesheet">

       <link href="<?php echo e(asset('css/jquery-jvectormap.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/daterangepicker.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/bootstrap3-wysihtml5.min.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('js/morris.js/morris.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/netmoon.css')); ?>" rel="stylesheet">
       <!-- fin bloque principal css del tema matris -->
       <!-- bloque de efectos -->
        <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
        <!--<link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">-->


       <!-- bloque de efectos -->
<?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa|Orbitron|Play|Rajdhani&display=swap" rel="stylesheet">
        <title>XCOMM</title>
      </head>
      <?php echo $__env->yieldContent("cabezera"); ?>
      <body class="cuerpo hold-transition skin-blue sidebar-mini">
       <?php echo $__env->yieldContent("contenido"); ?>

       <!-- bloque de script del tema matris -->
         <script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
         <script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/raphael.min.js')); ?>"></script>
         <script src="<?php echo e(asset('bower_components/morris.js/morris.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/jquery.sparkline.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
         <script src="<?php echo e(asset('js/jquery.knob.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
         <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/jquery.slimscroll.min.js')); ?>"></script>
         <script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>
         <!-- <script src="<?php echo e(asset('js/pages/dashboard.js')); ?>"></script> -->
         <script src="<?php echo e(asset('js/demo.js')); ?>"></script>
         <!-- fin del script del tema matris -->
         <!-- bloque de efectos adicionales -->

         <!-- fin de bloque de efectos adicionales -->
      </body>
  </html>
<?php /**PATH C:\wamp64\www\xcomm\resources\views/adm/template.blade.php ENDPATH**/ ?>