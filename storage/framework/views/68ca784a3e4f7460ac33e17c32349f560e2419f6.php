<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-white" style="background: #f6f4f7;">
      <img src="<?php echo e(asset('png/XCOMMmini.png')); ?>" alt="AdminLTE Logo" style="width: 60px;">
      <span class="brand-text font-weight-light"> <img src="<?php echo e(asset('png/XCOMM LOGOp.png')); ?>" class="img-responsive" style="width: 160px;"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 593px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php if(auth()->guard('users')->check()): ?>
            <li class="nav-header">
                <i class="nav-icon fas fa-user-circle"></i>  Usuarios</li>
               <li class="nav-item">
                <a href="<?php echo e(route('xcommEntidadesBancarias')); ?>" class="nav-link">
                  <i class="nav-icon fas fa-university"></i>
                  <p> Bancos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('xcommFormAddTasaGeneral')); ?>" class="nav-link">
                  <i class="fas fa-business-time nav-icon"></i>
                  <p> Cargar Tasas Generales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('clientesDashboard')); ?>" class="nav-link">
                  <i class="fab fa-black-tie nav-icon"></i>
                  <p> Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('listadoTransaccionesAbiertas')); ?>" class="nav-link">
                  <i class="fas fa-money-check nav-icon"></i>
                  <p> Transacciones Abiertas</p>
                </a>
              </li>
            <?php elseif(auth()->guard('banco')->check()): ?>
          <li class="nav-header">
              <i class="nav-icon fas fa-university"></i> Bancos   </li>

            <li class="nav-item">
              <a href="<?php echo e(route('listaUsuarioBanco', ['id' => \Auth::user()->entidadbancarias_id])); ?>" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p> Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('cargarCambioDivisaBanco', ['id' => \Auth::user()->entidadbancarias_id])); ?>" class="nav-link">
                <i class="far fa-money-bill-alt nav-icon"></i>
                <p> Cargar Divisa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('verTransaccionBanco', ['id' => \Auth::user()->entidadbancarias_id])); ?>" class="nav-link">
                <i class="fas fa-money-check nav-icon"></i>
                <p> Transacciones</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('configuracionBanco', ['id' => \Auth::user()->entidadbancarias_id])); ?>" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p> Configuracion</p>
              </a>
            </li>

            <?php elseif(auth()->guard('cliente')->check()): ?>
          <li class="nav-header">
            <i class="nav-icon fab fa-black-tie"></i> CLIENTES
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('dashboardCliente')); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('ver_transaccion_cliente')); ?>" class="nav-link">
              <i class="nav-icon  fas fa-business-time"></i>
              <p>Estatus Transaccion</p>
            </a>
          </li>
            <?php endif; ?>
          <!--<li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 24.505%; transform: translate(0px, 161.951px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/menu/menu_xcomm.blade.php ENDPATH**/ ?>