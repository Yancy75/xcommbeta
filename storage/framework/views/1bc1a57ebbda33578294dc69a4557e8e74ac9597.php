<?php $__env->startSection('content'); ?>
          <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="far fa-money-bill-alt" style="padding-right: 0.2em;"></i>Cargar de Tasas General</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                  </div>
                    <div class="card-body">
                        <input type="hidden" value="<?php echo e(route('xcommAddTasaGeneral')); ?>" id="ruta_agregar_tasas_bancos"/>
                        <form id="form_tasa_general" class="form-horizontal">
                            <?php
                                $count = count($info);
                                $control = 0; // Esta variable se usa para crear los id de los input individuales. aumentando de valor cada ves que se procesa el foreach
                            ?>
                            <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaControl" value="<?php echo e($count == 0 ? '1' : $count); ?>">
                             <?php if($count > 0): ?>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($control++); ?>
                              <div class="card">
                                <div class="card-header" style="padding-top: 0px; padding-bottom: 0px;">
                                    <h3 class="card-title titulo2"><i class="fas fa-university" style="padding-right: 0.2em;"></i><?php echo e($i['banco']); ?></h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                  </div>
                                </div>
                                <div class="card-body" style="background: white; border-radius: 10px;">
                                <div class="form-group row">
                                    <label for="idEntidadBancaria_<?php echo e($control); ?>" class="col-sm-2 col-form-label">Entidad Bancaria</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaValueId_<?php echo e($control); ?>" value="<?php echo e($i['id']); ?>">
                                        <input type="text" class="form-control input_masivo" id="idEntidadBancaria_<?php echo e($control); ?>" value="<?php echo e($i['banco']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraDolar_<?php echo e($control); ?>" class="col-sm-2 col-form-label">Compra Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraDolar_<?php echo e($control); ?>" value="<?php echo e($i['compra_dolar']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaDolar_<?php echo e($control); ?>" class="col-sm-2 col-form-label">Venta Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaDolar_<?php echo e($control); ?>" value="<?php echo e($i['venta_dolar']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraEuro_<?php echo e($control); ?>" class="col-sm-2 col-form-label">Compra Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraEuro_<?php echo e($control); ?>" value="<?php echo e($i['compra_euro']); ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaEuro_<?php echo e($control); ?>" class="col-sm-2 col-form-label">Venta Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaEuro_<?php echo e($control); ?>" value="<?php echo e($i['venta_euro']); ?>" />
                                    </div>
                                </div>
                                <hr/>
                               </div>
                              </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                             <div class="card">
                               <div class="card-header" style="padding-top: 0px; padding-bottom: 0px;">
                                 <div class="card-tools">
                                   <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                 </div>
                               </div>
                                 <div class="card-body"  style="background: white; border-radius: 10px;">
                                <div class="form-group row">
                                    <label for="idEntidadBancaria_1" class="col-sm-2 col-form-label">Entidad Bancaria</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaValueId_1" value="0">
                                        <input type="text" class="form-control input_masivo" id="idEntidadBancaria_1" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraDolar_1" class="col-sm-2 col-form-label">Compra Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraDolar_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaDolar_1" class="col-sm-2 col-form-label">Venta Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaDolar_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraEuro_1" class="col-sm-2 col-form-label">Compra Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraEuro_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaEuro_1" class="col-sm-2 col-form-label">Venta Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaEuro_1" value="" />
                                    </div>
                                </div>
                                <hr/>
                              </div>
                              </div>
                            <?php endif; ?>
                        </form>
                        <div class="row">
                          <div class="col-md-6 offset-md-8">
                            <button class="btn boton btn-primary " onclick="guardarTasasGenerales();"><i class="far fa-save"></i> Guardar</button>
                            <button class="btn boton btn-secondary " onclick="generarInputAddTasaGeneral();"><i class="fas fa-plus-square"></i> Agregar</button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/xcomm_tasa_general.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/xcomm/form_tasa_general.blade.php ENDPATH**/ ?>