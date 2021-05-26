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
       <link href="<?php echo e(asset('bower_components/morris.js/morris.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/netmoon.css')); ?>" rel="stylesheet">
       <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet">
       <!-- fin bloque principal css del tema matris -->
       <!-- bloque de efectos -->
        <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
        <!--<link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">-->


       <!-- bloque de efectos -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa|Orbitron|Play|Rajdhani&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
        <title>XCOMM</title>
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
          <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
          <script src="<?php echo e(asset('js/jquery.masonry.min.js')); ?>"></script>
          <script src="<?php echo e(asset('js/cycle.js')); ?>"></script>
          <!-- fin del script del tema matris -->
          <!-- bloque de efectos adicionales -->

          <!-- fin de bloque de efectos adicionales -->
      </head>
      <style>
      .baseul{ list-style: none; }
      .baseul > li {
        display: inline;
        padding-left: 5px;
        padding-right: 5px;
      }
      .baseul > li > a {
        color:#7a7979;
      }
      .derecha{
        text-align: right;
        padding-right: 5%;
            font-size: 1.2em;
      }
      .derecha > a {
        color: #c5c4c4;
        transition:0.5s all;
      }
      .derecha > a:hover{
        color:white;
        font-size: 1.3em;
        text-shadow: 0px 0px 10px white;
      }
      .leto{
        background: black;
        padding: 10px 0px 0px;
        font-size: 1.1em;
        color: #b7b7b7;
        max-height: 42px;
        overflow: hidden;
        }
        .mail{
          font-family: Comfortaa;
        }
        .texto{
          font-family: Comfortaa;
        }
        .caja-flex{
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          justify-content: flex-end;
          padding-right: 5%;
          align-items: center;
        }
        .tasks-menu{
          display: inline-block;
          margin: 5px;
          min-width: 80px;
          text-align: center;
          font-size: 1.2em;
          text-shadow: 1px 1px white;
        }
        .tasks-menu > a {
              color: #626262;
              font-weight: 700;
              transition: all 0.5s;
        }
        .tasks-menu > a:hover{
          color: white;
          text-shadow: 1px 1px 2px black, 2px 2px 3px black;
        }
        .logo{
          flex-grow: 4;
        }
        .logo-lg{
          float: left;
        }
      </style>
      <section class="row leto">
        <span class="col-md-8 izquierdo">
          <ul class="baseul">
            <li class="texto">¿Desea Contactarnos? </li>
            <li class="phone"><i class="fa fa-fw fa-phone-square"></i><a href="tel:8095418233"> 809-541-8233</a></li>
            <li class="phone"><i class="fa fa-fw fa-phone-square"></i><a href="tel:8095407007"> 809-540-7007</a></li>
            <li class="mail"><i class="fa fa-envelope"></i><a href="mailto:info@accapla.com"> info@accapla.com</a></li>
            </ul>
        </span>
        <span class="col-md-4 derecha">
          <a target="_blank" href="https://www.facebook.com/accapla/" title="Facebook"><i class="fa fa-fw fa-facebook"></i></a>
          <a target="_blank" href="https://www.instagram.com/caplard/" title="Instagram"><i class="fa fa-fw fa-instagram"></i></a>
          <a target="_blank" href="#" title="signal"><i class="fa fa-fw fa-signal"></i></a>
        </span>
      </section>
      <header class="main-header">
          <nav class="navbar navbar-static-top" style="margin-left: 0px;">

          <div class="caja-flex">
            <div class="logo">
              <span class="logo-lg">
                <a href="<?php echo e(url('/')); ?>" >
                    <img src="<?php echo e(asset('png/XCOMM LOGOp.jpg')); ?>" class="img-responsive" style="width: 350px">
                  </a>
              </span>
          </div>
                <?php if(Route::has('login')): ?>
                  <?php if(auth()->guard()->check()): ?>
                    <div class="tasks-menu notifications-menu">
                      <a href="<?php echo e(url('/home')); ?>">Inicio
                      </a>
                    </div>
                <?php else: ?>
                <div class="tasks-menu notifications-menu">
                   <a href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
                  </a>
                </div>
                    <?php if(Route::has('register')): ?>
                <div class="tasks-menu notifications-menu">
                  <a href="<?php echo e(route('register')); ?>" class="dropdown-toggle"><i class="fa fa-registered" aria-hidden="true"></i> Registro
                  </a>
                </div>
                     <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            <!--  </div> -->
          </nav>
      </header>
      <body class="cuerpo hold-transition skin-blue sidebar-mini">
          <?php echo $__env->yieldContent("contenido"); ?>
      </body>
         <?php echo $__env->yieldContent("pie"); ?>
  </html>
<?php /**PATH C:\laragon\www\xcommrd\resources\views/layouts/usuario.blade.php ENDPATH**/ ?>