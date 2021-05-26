<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-address-card"></i> Perfil de <?php echo e($cliente_info->nombre); ?> </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('savePerfil', ['id' => $cliente_info->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="status" value="active">
                        <input type="hidden" name="tipo_usuario" value="cliente">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($cliente_info->nombre); ?>">
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo e($cliente_info->cedula); ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($cliente_info->phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($cliente_info->email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                            <small id="emailHelp" class="form-text text-muted">Para cambiar la contrasena escriba la nueva de lo contrario deje en blanco</small>
                        </div>

                        <a href="<?php echo e(route('dashboardCliente')); ?>" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/clientes/perfil.blade.php ENDPATH**/ ?>