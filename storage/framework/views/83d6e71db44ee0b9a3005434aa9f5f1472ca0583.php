<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('xcomm.modals.add_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('xcomm.modals.modify_usuario_banco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-8">
            <div class="box">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="nav-icon fas fa-university"></i> Cambio de Divisas <?php echo e(isset($banco->name)?$banco->name:''); ?></h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                  </div>
                        <div class="card-body">
                            <div id="cambio_divisa_id" >
                            <form method="post" action="<?php echo e(route('cargandoCambioDivisaBanco', ['id' => $banco->id])); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <?php if(empty($info)): ?>
                                    <input type="hidden" class="form-control" name="cambiodivisa_id" id="cambiodivisa_id" >
                                    <?php else: ?>
                                    <input type="hidden" class="form-control" name="cambiodivisa_id" id="cambiodivisa_id" value="<?php echo e($info[0]['id']); ?>">
                                    <?php endif; ?>
                                    <label for="dolar_compra" class="control-label col-md-2 col-sm-2">Comprar Dolar</label>
                                        <div class="col-md-10 col-sm-10">
                                                <div class="input-group">
                                           <input type="text" class="form-control" name="dolar_compra" id="dolar_compra" value="<?php if(!empty($info)){ echo $info[0]['dolar_compra'];}?>" placeholder="Comprar Dolar...">
                                           <div class="input-group-append">
                                              <div class="input-group-text"><span class="fas fa-dollar-sign"></span></div>
                                            </div>
                                           </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dolar_venta" class="control-label col-md-2 col-sm-2">Venta Dolar</label>
                                  <div class="col-md-10 col-sm-10">
                                      <div class="input-group">
                                         <input type="text" class="form-control" name="dolar_venta" id="dolar_venta" value="<?php if(!empty($info)){ echo $info[0]['dolar_venta'];}?>" placeholder="Vender Dolar...">
                                    <div class="input-group-append">
                                       <div class="input-group-text"><span class="fas fa-dollar-sign"></span></div>
                                     </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comprar_euro"  class="control-label col-md-2 col-sm-2">Comprar Euro</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                    <input type="text" class="form-control" name="comprar_euro" id="comprar_euro" value="<?php if(!empty($info)){ echo $info[0]['euro_compra'];}?>" placeholder="Comprar Euro...">
                                    <div class="input-group-append">
                                       <div class="input-group-text"><span class="fas fa-euro-sign"></span></div>
                                     </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="venta_euro" class="control-label col-md-2 col-sm-2">Venta Euro</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                    <input type="text" class="form-control" name="venta_euro" id="venta_euro" value="<?php if(!empty($info)){ echo $info[0]['euro_venta'];}?>" placeholder="Vender Euro...">
                                    <div class="input-group-append">
                                       <div class="input-group-text"><span class="fas fa-euro-sign"></span></div>
                                     </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-6">
                                    <label for="rango_inicial">Desde:</label>
                                    <input type="text" class="form-control" name="rango_inicial" id="rango_inicial" value="<?php if(!empty($info)){ echo $info[0]['rango_inicial'];}?>" placeholder="Desde...">
                                </div>
                                <div class="form-group col-6">
                                    <label for="rango_final">Hasta:</label>
                                    <input type="text" class="form-control" name="rango_final" id="rango_final" value="<?php if(!empty($info)){ echo $info[0]['rango_final'];}?>" placeholder="Hasta...">
                                </div>
                               </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary boton btd "><i class="far fa-save"></i> Agregar</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/usuario_banco.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        $(document).ready(function(){
      /*      $('#tableEntidadBanco').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});*/
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/bancos/cambio_divisa.blade.php ENDPATH**/ ?>