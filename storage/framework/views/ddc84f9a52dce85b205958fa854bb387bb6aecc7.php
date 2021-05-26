<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('css/gijgo.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reporte Comisión</div>

                    <div class="card-body">
                        <form class="form-inline" method="post" action=" <?php echo e(route('verReporteComision')); ?> ">
                            <?php echo csrf_field(); ?>
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" name="id_banco" required>
                                    <option> Seleccione una entidad </option>
                                    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($in->id); ?>"> <?php echo e($in->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-auto my-1">
                                <label for="fecha_inicio">Desde:</label>
                            </div>

                            <div class="col-auto my-1">
                                <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" required autocomplete="off">
                            </div>

                            <div class="col-auto my-1">
                                <label for="fecha_final">Hasta:</label>
                            </div>

                            <div class="col-auto my-1">
                                <input type="text" class="form-control" id="fecha_final" name="fecha_final" required autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/gijgo.min.js')); ?>"></script>
    <script>
        $( function() {
            $('#fecha_inicio').datepicker();
            $('#fecha_final').datepicker();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\xcomm\resources\views/reporte/reporte_seleccionar_banco_fecha.blade.php ENDPATH**/ ?>