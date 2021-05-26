<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!--<div class="card-header">
                        <?php echo $__env->make('menu.menu_xcomm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>-->

                    <div class="card-body">

                        <form method="post" action="<?php echo e(route('xcommAddingEntidadesBancarias')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="code" class="col-sm-2 col-form-label">Codigo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code" id="code" placeholder="Codigo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\xcomm\resources\views/xcomm/add_entidades_bancarias.blade.php ENDPATH**/ ?>