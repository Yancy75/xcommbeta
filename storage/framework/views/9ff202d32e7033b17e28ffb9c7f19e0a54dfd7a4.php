<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-university"></i> Comision</h3>
                </div>

                <div class="card-body">

                    <form method="post" action="<?php echo e(route('addUpdateComision')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="form-control" name="id_comision" id="id_comision" value="
                            <?php if(!empty($info)): ?>
                                <?php echo e($info[0]->id); ?>

                            <?php endif; ?>
                        " />
                        <div class="form-group row">
                            <label for="code" class="control-label col-md-2 col-sm-2">Comision</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="comision" id="comision" placeholder="Comision..."
                                    <?php if(!empty($info)): ?>
                                        value="<?php echo e($info[0]->comision); ?>"
                                        <?php endif; ?>
                                    />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-code-branch"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>








                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary boton btd"><i class="fa fa-bank" style="padding-right: 0.2em;"></i> Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\xcomm\resources\views/xcomm/configuraciones.blade.php ENDPATH**/ ?>