<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div>
                <a href="<?php echo e(route('verTransaccionesClientes', ['id_cliente' => $id_cliente])); ?>" class="btn btn-primary">Transacciones Abiertas</a>
                <a href="<?php echo e(route('verTransaccionesClientesCompletadas', ['id_cliente' => $id_cliente])); ?>" class="btn btn-success">Transacciones Completadas</a>
                <a href="<?php echo e(route('verTransaccionesClientesCanceladas', ['id_cliente' => $id_cliente])); ?>" class="btn btn-danger">Transacciones Canceladas</a>
                <br/>
                <br/>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-money-bill"></i> Transacciones </h3>
                    <div class="card-tools float-right">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                    <a class="btn btn-secondary float-right" href="<?php echo e(route('clientesDashboard')); ?>">Volver</a>
                    <div class="clear"></div>
                </div>
                <div class="card-body"  style="overflow-x: auto;">
                    <?php echo $__env->make('clientes.modals.acciones_transacciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <table id="transaccion"  class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Banco</th>
                            <th>Moneda</th>
                            <th>Tasa de cambio</th>
                            <th>Cantidad</th>
                            <th>Monto al cambio</th>
                            <th>Tipo transaccion</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                            <th>Historico</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($inf->nombre_banco); ?></td>
                                <td>
                                    <?php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'compra_dolar')
                                        {
                                            echo 'Dolar';
                                        }
                                        else if($inf->tipo_transaccion == 'venta_euro' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo 'Euro';
                                        }
                                    ?>
                                </td>
                                <td><?php echo e(number_format($inf->valor_dolar,2)); ?></td>
                                <td><?php echo e(number_format($inf->cantidad,2)); ?></td>
                                <td>
                                    <?php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'venta_euro')
                                        {
                                            echo number_format($inf->valor_dolar * $inf->cantidad,2);
                                        }
                                        else if($inf->tipo_transaccion == 'compra_dolar' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo number_format($inf->valor_dolar * $inf->cantidad,2);
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'venta_euro')
                                        {
                                            echo 'Venta';
                                        }
                                        elseif($inf->tipo_transaccion == 'compra_dolar' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Compra";
                                        }
                                    ?>
                                </td>
                                <td><?php echo e($inf->fecha_last_transaccion); ?></td>
                                <td><?php echo e(ucwords(str_replace('_', ' ', $inf->transaccion))); ?></td>
                                <td><a href="<?php echo e(route('verHistorico', ['id_transaccion' => $inf->id])); ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
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
    <script src="<?php echo e(asset('js/transaccion_cliente.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        $(document).ready(function() {$('#transaccion').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});});
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/xcomm/transacciones_clientes.blade.php ENDPATH**/ ?>