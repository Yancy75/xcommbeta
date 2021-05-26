<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-money-check-alt"></i> Transacciones Abiertas</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>

                <div class="card-body" style="overflow-x: auto;">
                    <?php echo $__env->make('xcomm.modals.control_transacciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table id="transacciones" class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Banco</th>
                            <th>Cliente</th>
                            <th>Moneda</th>
                            <th>Tasa de cambio</th>
                            <th>Cantidad</th>
                            <th>Monto al cambio</th>
                            <th>Tipo transaccion</th>
                            <th>Fecha</th>
                            <th>Documento</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($in->nombre_banco); ?></td>
                                <td><?php echo e($in->nombre); ?></td>
                                <td>
                                <?php
                                        if($in->tipo_transaccion == 'venta_dolar' || $in->tipo_transaccion == 'compra_dolar')
                                        {
                                            echo 'Dolar';
                                        }
                                        elseif($in->tipo_transaccion == 'venta_euro' || $in->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Euro";
                                        }
                                ?>
                                </td>
                                <td><?php echo e($in->valor_dolar); ?></td>
                                <td><?php echo e($in->cantidad); ?></td>
                                <td><?php echo e($in->cantidad*$in->valor_dolar); ?></td>
                                <td>
                                    <?php
                                        if($in->tipo_transaccion == 'venta_dolar' || $in->tipo_transaccion == 'venta_euro')
                                        {
                                            echo 'Venta';
                                        }
                                        elseif($in->tipo_transaccion == 'compra_dolar' || $in->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Compra";
                                        }
                                    ?>
                                </td>
                                <td><?php echo e($in->fecha_last_transaccion); ?></td>
                                <td>
                                    <?php
                                    if(!empty($in->transaccion_id))
                                    {
                                    ?>
                                        <a href='<?php echo e(route('openNewTabPdfFile', ['file_name' => $in->file_name])); ?>' target='_blank' > click me to pdf </a>

                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><button type="button" class="btn btn-primary" onclick="openModalXcomm( '<?php echo e($in->id_transaccion_good); ?>', '<?php echo e($in->cliente_id); ?>', '<?php echo e($in->entidadbancaria_id); ?>', '<?php echo e($in->cambiodivisa_id); ?>', '<?php echo e($in->nombre_banco); ?>', '<?php echo e($in->rango_incial); ?>', '<?php echo e($in->rango_final); ?>', '<?php echo e($in->valor_dolar); ?>', '<?php echo e($in->cantidad); ?>', '<?php echo e($in->tipo_transaccion); ?>', '<?php echo e($in->transaccion); ?>', '<?php echo e($in->cedula); ?>', '<?php echo e($in->nombre); ?>', '<?php echo e($in->phone); ?>', '<?php echo e($in->email); ?>', '<?php echo e($in->id_transaccion_good); ?>', '<?php echo e($in->fecha_last_transaccion); ?>')">
                                        Cancelar
                                    </button></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
    <script src="<?php echo e(asset('js/transaccion_xcomm.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $('#transacciones').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
          });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/xcomm/transacciones_abiertas.blade.php ENDPATH**/ ?>