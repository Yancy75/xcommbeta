<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('xcomm.modals.add_cliente_xcomm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('xcomm.modals.modify_cliente_xcomm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fab fa-black-tie"></i> Administracion Clientes</h3>
                <div class="card-tools">
                  <button type="button" class="btn boton btn-primary" data-toggle="modal" data-target="#addClienteBancoModal"><i class="far fa-save"></i> Agregar Cliente</button>
                  <button type="button" id="botonModificarClienteBanco" class="btn btn-primary ocultar" data-toggle="modal" data-target="#modifyClienteBancoModal">Modificar Usuario</button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                      <table id="tableEntidadBanco" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!is_null($clientes)): ?>
                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($ruta = route('modifyClienteXcomm', ['id' => $cliente->id])); ?>
                                    <tr>
                                        <td><?php echo e($cliente->id); ?></td>
                                        <td><?php echo e($cliente->cedula); ?></td>
                                        <td><?php echo e($cliente->nombre); ?></td>
                                        <td><?php echo e($cliente->phone); ?></td>
                                        <td><?php echo e($cliente->email); ?></td>
                                        <td><?php echo e($cliente->status); ?></td>
                                        <td><button type="button" class="btn boton btn-primary" onclick="callModalModificarXommCliente('<?php echo e($cliente->id); ?>', '<?php echo e($cliente->cedula); ?>', '<?php echo e($cliente->nombre); ?>', '<?php echo e($cliente->phone); ?>', '<?php echo e($cliente->email); ?>', '<?php echo e($cliente->status); ?>', '<?php echo e($ruta); ?>');"><i class="fas fa-file-signature"></i> Modificar</button></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </tfoot>
                        </table>
                  </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $('#tableEntidadBanco').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
            $('[data-mask]').inputmask();
        });
    </script>
    <script src="<?php echo e(asset('js/xcomm_clientes.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/xcomm/cliente_dashboard.blade.php ENDPATH**/ ?>