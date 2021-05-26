<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-university"></i> Historico Transaccion</h3>
                    
                    <div class="clear"></div>
                </div>

                <div class="card-body" style="overflow-x: auto;">
                    <?php if(!empty($info)): ?>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="<?php echo e($info['0']['nombre']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Cedula: <?php echo e($info['0']['cedula']); ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono: <?php echo e($info['0']['phone']); ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="<?php echo e($info['0']['email']); ?>" disabled>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="<?php echo e($info['0']['nombre_banco']); ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Precio de la divisa <?php echo e(number_format($info['0']['valor_dolar'],2)); ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Cantidad adquirida <?php echo e(number_format($info['0']['cantidad'],2)); ?>" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="<?php echo e(ucwords(str_replace('_', ' ', $info['0']['tipo_transaccion']))); ?>" disabled>
                                </div>
                            </div>
                            <hr/>

                            <h4>Como va a pagar el cliente</h4>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Forma de pago: <?php echo e(ucfirst($detalle_pagar_cliente['tipo_pago'])); ?>" disabled>
                                </div>
                                <?php if($detalle_pagar_cliente['tipo_pago'] == 'efectivo'): ?>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_pagar_cliente['comentario_efectivo']); ?></textarea>
                                    </div>
                                <?php elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque'): ?>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_pagar_cliente['numero_cheque']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_pagar_cliente['nombre_cheque']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: <?php echo e($detalle_pagar_cliente['rnc']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: <?php echo e($detalle_pagar_cliente['nombre_banco']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_pagar_cliente['comentario_cheque']); ?></textarea>
                                    </div>
                                <?php elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque'): ?>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_pagar_cliente['numero_cuenta']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_pagar_cliente['nombre_transferencia']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: <?php echo e($detalle_pagar_cliente['rnc']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: <?php echo e($detalle_pagar_cliente['nombre_banco']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_pagar_cliente['comentario_transferencia']); ?></textarea>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <hr/>

                            <h4>Como va a recibir el pago el cliente</h4>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Forma de pago: <?php echo e(ucfirst($detalle_recibir_pago_cliente['tipo_pago'])); ?>" disabled>
                                </div>
                                <?php if($detalle_recibir_pago_cliente['tipo_pago'] == 'efectivo'): ?>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_recibir_pago_cliente['comentario_efectivo']); ?></textarea>
                                    </div>
                                <?php elseif($detalle_recibir_pago_cliente['tipo_pago'] == 'cheque'): ?>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_recibir_pago_cliente['numero_cheque']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_recibir_pago_cliente['nombre_cheque']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: <?php echo e($detalle_recibir_pago_cliente['rnc']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: <?php echo e($detalle_recibir_pago_cliente['nombre_banco']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_recibir_pago_cliente['comentario_cheque']); ?></textarea>
                                    </div>
                                <?php elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque'): ?>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_recibir_pago_cliente['numero_cuenta']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="<?php echo e($detalle_recibir_pago_cliente['nombre_transferencia']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: <?php echo e($detalle_recibir_pago_cliente['rnc']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: <?php echo e($detalle_recibir_pago_cliente['nombre_banco']); ?>" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled><?php echo e($detalle_recibir_pago_cliente['comentario_transferencia']); ?></textarea>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <hr/>

                            <?php if(!empty($cancelado_info)): ?>
                                <h4>Razones Cancelado</h4>
                                <div class="row">
                                    <div class="col">
                                        <textarea cols="100" disabled><?php echo e($cancelado_info['info']); ?></textarea>
                                    </div>
                                </div>
                                <hr/>
                            <?php endif; ?>

                            <table id="list_table_historico" class="table table-bordered table-hover table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="ocultar">id_historico</th>
                                    <th>Usuario</th>
                                    <th >Accion</th>
                                    <th >Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($info)): ?>
                                    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="ocultar"><?php echo e($inf["idht"]); ?></td>
                                            <td>
                                                <?php if(empty($inf["usuario_banco"])): ?>
                                                    Cliente
                                                <?php else: ?>
                                                    <?php echo e($inf["usuario_banco"]); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($inf["accion"]); ?></td>
                                            <td><?php echo e($inf["hist_date"]); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="ocultar">id_historico</th>
                                    <th>Usuario</th>
                                    <th >Accion</th>
                                    <th >Fecha</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else: ?>
                        <div>NO hay datos</div>
                    <?php endif; ?>
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
    <script>
        $(document).ready(function(){
            $('#list_table_historico').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/bancos/historico_transaccion_banco.blade.php ENDPATH**/ ?>