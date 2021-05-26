<style>
html{
    background-image: url('png/fondo.jpg');
    background-size: cover;
    background-attachment: fixed;
  }
</style>
<?php echo $__env->make('layouts.componente.minicabeu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php
      ?>
        <?php if(Route::has('login')): ?>
          <?php if(auth()->guard('users')->check()): ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
      <div class="tasks-menu notifications-menu"><a href="<?php echo e(url('/home')); ?>">Inicio</a></div>
      <div class="tasks-menu notifications-menu"><a href="<?php echo e(route('xcommlogout')); ?>">Logout</a></div>
      <?php elseif(auth()->guard('banco')->check()): ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
      <div class="tasks-menu notifications-menu"><a href="<?php echo e(route('dashboardBanco')); ?>">Inicio Banco</a></div>
      <div class="tasks-menu notifications-menu"><a href="<?php echo e(route('logoutBanco')); ?>">Logout Banco</a></div>
        <?php elseif(auth()->guard('cliente')->check()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('dashboardCliente')); ?>">
            <i class="far fa-comments"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('logoutCliente')); ?>">
            <i class="far fa-bell"></i> Logout Cliente</a>
        </li>
        <?php endif; ?>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
      <a href="<?php echo e(url('login_xcomm')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
      <a href="<?php echo e(url('login_xcomm')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login Cliente</a>
      <?php if(Route::has('register')): ?>

       <?php endif; ?>
  <?php endif; ?>

    </ul>
</nav>
<?php /**PATH D:\laragon\www\xcomm\resources\views/layouts/componente/cabecera_clia.blade.php ENDPATH**/ ?>