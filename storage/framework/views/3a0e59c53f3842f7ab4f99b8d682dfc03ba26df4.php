<?php $__env->startSection('cabezera'); ?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <div class="flex-centerl">
            <div  class="contence" style="font-family: 'Orbitron', sans-serif;">
              <div class="cuadrol logodiv">
                <i class="fa fa-chevron-right entuno" aria-hidden="true"></i>
                <i class="fa fa-stop entdosl" aria-hidden="true"></i>
                <i class="fa fa-chevron-left enttresl" aria-hidden="true"></i>
              </div>
            </div>
        </div>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <div class="flex-centerl">
            <div  class="contence" style="font-family: 'Orbitron', sans-serif;">
              <div class="cuadrol logodiv">
                <i class="fa fa-chevron-right entuno" aria-hidden="true"></i>
                <i class="fa fa-stop entdosl" aria-hidden="true"></i>
                <i class="fa fa-chevron-left enttresl" aria-hidden="true"></i>
              </div>
                <div class="logodiv">
                   <div class="titlel">COMM</div>
                </div>
            </div>
        </div>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <?php if(Route::has('login')): ?>
              <?php if(auth()->guard()->check()): ?>
          <li class="tasks-menu notifications-menu">
            <a href="<?php echo e(url('/home')); ?>" class="dropdown-toggle">Home
            </a>
          </li>
            <?php else: ?>
          <li class="tasks-menu notifications-menu">
             <a href="<?php echo e(route('login')); ?>" class="dropdown-toggle"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
            </a>
          </li>
              <?php if(Route::has('register')): ?>
          <li class="tasks-menu notifications-menu">
            <a href="<?php echo e(route('register')); ?>" class="dropdown-toggle"><i class="fa fa-registered" aria-hidden="true"></i> Registro
            </a>
          </li>
               <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
          <!-- fin de botones de login -->
        </ul>
      </div>
    </nav>
    <!-- segundo nivel -->
    <nav class="navbar-center">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu canav">
        <ul class="nav navbar-nav nav-flex">
          <li class="notifications-menu"><a href="<?php echo e(url('estaticas', 'que')); ?>"><i class="fa fa-eye" aria-hidden="true"></i> Que es XCOMM </a></li>
          <li class="notifications-menu"><a href="<?php echo e(url('estaticas', 'porque')); ?>"><i class="fa fa-quote-right" aria-hidden="true"></i> Porque Xcomm </a></li>
          <li class="notifications-menu"><a href="<?php echo e(url('estaticas', 'como')); ?>"><i class="fa fa-cog" aria-hidden="true"></i> Como Funciona </a></li>
          <li class="notifications-menu"><a href="<?php echo e(url('estaticas', 'reglas')); ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> Terminos y Condiciones </a></li>
          <li class="dropdown notifications-menu">
            <a href="<?php echo e(url('estaticas', 'contacto')); ?>">
              <i class="fa fa-envelope"></i> Contatos
            </a>

          </li>
        </ul>
      </div>
    </nav>
    <!-- segundo nivel final -->
  </header>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\wamp64\www\xcomm\resources\views/layouts/componente/cabecera_inv.blade.php ENDPATH**/ ?>