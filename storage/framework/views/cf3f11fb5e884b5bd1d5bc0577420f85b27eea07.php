<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('xcomm.modals.add_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('xcomm.modals.modify_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header row">
                    <div class="col-md-6">
                        <h3 class="titulo3">Administracion Entidades Bancarias <?php echo e(isset($banco->name)?$banco->name:''); ?></h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="boton btd" data-toggle="modal" data-target="#addUsuarioBancoModal"><i class="fa fa-fw fa-file-o"></i>Agregar Usuario</button>
                        <button type="button" id="botonModificarUsuarioBanco" class="boton btd ocultar" data-toggle="modal" data-target="#modifyUsuarioBancoModal">Modificar Usuario</button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="list_usuario_entidade_financiera" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <table id="tableEntidadBanco" class="table table-striped table-bordered" style="width:100%">
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
                                        <td><button type="button" class="boton btd" onclick="callModalModificarUsuarioBanco('<?php echo e($usuario->id); ?>', '<?php echo e($usuario->nombre); ?>', '<?php echo e($usuario->email); ?>', '<?php echo e($usuario->level); ?>', '<?php echo e($usuario->status); ?>', '<?php echo e($ruta); ?>');">Moidificar</button></td>
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
    <script src="<?php echo e(asset('js/usuario_banco.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatable/datatables.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tableEntidadBanco').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/bancos/usuarios_banco.blade.php ENDPATH**/ ?>