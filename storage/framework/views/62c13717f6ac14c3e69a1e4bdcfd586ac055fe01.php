<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('xcomm.modals.add_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('xcomm.modals.modify_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-university"></i> Administracion Entidades Bancarias <?php echo e(isset($banco->name)?$banco->name:''); ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn boton btn-primary" data-toggle="modal" data-target="#addUsuarioBancoModal"><i class="far fa-save"></i> Agregar Usuario</button>
                  <button type="button" id="botonModificarUsuarioBanco" class="boton btd ocultar" data-toggle="modal" data-target="#modifyUsuarioBancoModal">Modificar Usuario</button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                </div>
              </div>
              <div class="card-body">
                    <div id="list_usuario_entidade_financiera">
                          <table id="tableEntidadBanco"  class="table table-bordered table-hover table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Entidad Bancaria</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!is_null($usuarios)): ?>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($ruta = route('modifyUsuarioBanco', ['id' => $usuario->id])); ?>
                                    <tr>
                                        <td><?php echo e($usuario->id); ?></td>
                                        <td><?php echo e($banco->name); ?></td>
                                        <td><?php echo e($usuario->nombre); ?></td>
                                        <td><?php echo e($usuario->email); ?></td>
                                        <td><?php echo e($usuario->level); ?></td>
                                        <td><?php echo e($usuario->status); ?></td>
                                        <td><button type="button" class="btn boton btn-primary" onclick="callModalModificarUsuarioBanco('<?php echo e($usuario->id); ?>', '<?php echo e($usuario->nombre); ?>', '<?php echo e($usuario->email); ?>', '<?php echo e($usuario->level); ?>', '<?php echo e($usuario->status); ?>', '<?php echo e($ruta); ?>');"><i class="fas fa-file-signature"></i> Modificar</button></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Entidad Bancaria</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
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
    <script src="<?php echo e(asset('js/usuario_banco.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        $(document).ready(function(){
           $('#tableEntidadBanco').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\xcomm\resources\views/bancos/usuarios_banco.blade.php ENDPATH**/ ?>