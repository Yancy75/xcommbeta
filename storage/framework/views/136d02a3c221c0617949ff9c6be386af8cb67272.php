<?php $__env->startSection('content'); ?>
    <div class="container centrado">
        <div class="justify-content-center">
              <div class="box box-primary animated fadeInUp delay-0.5s">
                   <div class="box-header with-border">
                      <h3 class="titulo3"><i class="fa fa-bank" style="padding-right: 0.2em;"></i>nuevas entidades bancarias</h3>
                    </div>
                    <div class="box-body">
                        <form method="post" action="<?php echo e(route('xcommAddingEntidadesBancarias')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                              <label for="code">Codigo</label>
                              <input type="text" class="form-control" name="code" id="code" placeholder="Codigo...">
                            </div>
                            <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre...">
                            </div>
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/xcomm/add_entidades_bancarias.blade.php ENDPATH**/ ?>