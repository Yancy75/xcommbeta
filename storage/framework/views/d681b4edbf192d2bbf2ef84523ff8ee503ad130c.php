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
        <a class="nav-link"  href="<?php echo e(url('/home')); ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('xcommlogout')); ?>">
        <i class="fas fa-sign-out-alt"></i> Logout Usuario</a>
      </li>
      <?php elseif(auth()->guard('banco')->check()): ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('dashboardBanco')); ?>">
         <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Banco </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('logoutBanco')); ?>">
         <i class="fas fa-sign-out-alt"></i> Logout Banco</a>
      </li>
      <?php elseif(auth()->guard('cliente')->check()): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('dashboardCliente')); ?>">
         <i class="nav-icon fas fa-tachometer-alt"></i> Inicio Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('logoutCliente')); ?>">
         <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout Cliente</a>
        </li>
        <?php endif; ?>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('login_xcomm')); ?>">
          <i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(url('login_xcomm')); ?>">
          <i class="fas fa-sign-in-alt"></i> Login Cliente</a>
      </li>
      <?php if(Route::has('register')): ?>

       <?php endif; ?>
  <?php endif; ?>

    </ul>
</nav>
<?php /**PATH C:\laragon\www\xcomm\resources\views/layouts/componente/cabecera_uten.blade.php ENDPATH**/ ?>