<?php $__env->startSection('content'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <style>
        .modal{height: 100vh !important;}
    </style>

    <div class="row animated zoomIn delay-0.5s">

        <div class="col-md-12">
            <div class="centrado">
                <a href="<?php echo e(route('agregarCambioDivisaBanco', ["id" => \Auth::user()->entidadbancarias_id])); ?>" class="btn btn-primary">Agregar Divisas</a>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-money-bill"></i> Cambios de Divisas </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                </div>
                <div class="card-body" style="overflow-x: auto;">
                    <table id="transaccion" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Compra Dolar</th>
                            <th>Venta Dolar</th>
                            <th>Compra Euro</th>
                            <th>Venta Euro</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(number_format($inf->dolar_compra,2)); ?></td>
                                <td><?php echo e(number_format($inf->dolar_venta,2)); ?></td>
                                <td><?php echo e(number_format($inf->euro_compra,2)); ?></td>
                                <td><?php echo e(number_format($inf->euro_venta,2)); ?></td>
                                <td><?php echo e(number_format($inf->rango_inicial,2)); ?></td>
                                <td><?php echo e(number_format($inf->rango_final,2)); ?></td>
                                <td><a href="<?php echo e(route('modificarCambioDivisaBanco', ["id_banco" => \Auth::user()->entidadbancarias_id, "id_divisa" => $inf->id])); ?>" class="btn btn-primary"><i class="fa fa-cog"></i></a></td>
                                <td><a href="" class="btn btn-danger"><i class="fa fa-eraser"></i></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
    <?php echo $__env->make('bancos.modal.control_transacciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/transaccion_banco.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        $(document).ready(function() {$('#transaccion').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
            $('[data-mask]').inputmask();
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\xcomm\resources\views/bancos/list_divisas.blade.php ENDPATH**/ ?>