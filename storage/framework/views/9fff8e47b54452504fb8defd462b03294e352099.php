<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e($info[0]['banco']); ?></h4>
                </div>

                <div class="card-body">
                    <div>

                        <form method="POST" id="upload_form_id" enctype="multipart/form-data" action="<?php echo e(route('add_transaccion_file')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id_ruta_transaccion_bancaria" id="id_ruta_transaccion_bancaria" value="<?php echo e(route('add_transaccion')); ?>">
                            <input type="hidden" name="id_ruta_cancelar_transaccion_bancaria" id="id_ruta_cancelar_transaccion_bancaria" value="<?php echo e(route('cancelar_transaccion_cliente')); ?>">
                            <input type="hidden" name="id_ruta_ir_despues_cancelar_transaccion_bancaria" id="id_ruta_ir_despues_cancelar_transaccion_bancaria" value="<?php echo e(route('dashboardCliente')); ?>">
                            <input type="hidden" name="ruta_transaccion_siguiente_cliente" id="ruta_transaccion_siguiente_cliente" value="<?php echo e(route('ver_transaccion_cliente')); ?>">
                            <input type="hidden" name="id_banco_transaccion_bancaria" id="id_banco_transaccion_bancaria" value="<?php echo e($info[0]['entidadbancarias_id']); ?>">
                            <input type="hidden" name="id_cambiodivisa_transaccion_bancaria" id="id_cambiodivisa_transaccion_bancaria" value="<?php echo e($info[0]['divisa_id']); ?>">
                            <input type="hidden" name="id_cliente_transaccion_bancaria" id="id_cliente_transaccion_bancaria" value="<?php echo e($info[0]['id_cliente']); ?>">
                            <input type="hidden" name="id_accion_transaccion_bancaria" id="id_accion_transaccion_bancaria" value="<?php echo e($info[0]['accion']); ?>">
                            <input type="hidden" name="banco_name_transaccion_bancaria" id="banco_name_transaccion_bancaria" value="<?php echo e($info[0]['banco']); ?>">

                            <div class="form-group">
                                <label for="valor_dolar_transaccion_bancaria"><?php if( $info[0]['accion'] == 'venta_dolar'){ echo "Venta USD"; } ?></label>
                                <input type="text" class="form-control" name="valor_dolar_transaccion_bancaria" id="valor_dolar_transaccion_bancaria" value="<?php echo e($info[0]['actvie_divisa']); ?>" disabled>
                                <input type="hidden" class="form-control" name="valor_dolar_transaccion_bancaria_hi" id="valor_dolar_transaccion_bancaria_hi" value="<?php echo e($info[0]['actvie_divisa']); ?>">
                            </div>

                            <div class="form-group ocultar">
                                <label for="rango_inicial_transaccon_bancaria">Rango</label>
                                <input type="text" class="form-control" name="rango_inicial_transaccon_bancaria" id="rango_inicial_transaccon_bancaria" value="<?php echo e($info[0]['rango_inicial']); ?>" disabled>
                                <input type="hidden" class="form-control" name="rango_inicial_transaccon_bancaria_hi" id="rango_inicial_transaccon_bancaria_hi" value="<?php echo e($info[0]['rango_inicial']); ?>">
                                <input type="text" class="form-control" name="rango_final_transaccon_bancaria" id="rango_final_transaccon_bancaria" value="<?php echo e($info[0]['rango_final']); ?>" disabled>
                                <input type="hidden" class="form-control" name="rango_final_transaccon_bancaria_hi" id="rango_final_transaccon_bancaria_hi" value="<?php echo e($info[0]['rango_final']); ?>">
                            </div>

                            <div class="form-group">
                                <label for="cantidad_transaccion_bancaria">Cantidad</label>
                                <input type="text" class="form-control" name="cantidad_transaccion_bancaria" id="cantidad_transaccion_bancaria" value="<?php echo e($info[0]['cantidad']); ?>" disabled>
                                <input type="hidden" class="form-control" name="cantidad_transaccion_bancaria_hi" id="cantidad_transaccion_bancaria_hi" value="<?php echo e($info[0]['cantidad']); ?>">
                            </div>

                            <div class="form-group ocultar">
                                <label for="Mensaje_transaccion_bancaria">Mensaje</label>
                                <input type="text" class="form-control" name="Mensaje_transaccion_bancaria" id="Mensaje_transaccion_bancaria" value="" disabled>
                            </div>

                            <h3>
                                Metodo para pagar al banco
                            </h3>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="efectivoRadio1" name="customRadio" class="custom-control-input" value="efectivo">
                                <label class="custom-control-label" for="efectivoRadio1">Efectivo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="chequeRadio2" name="customRadio" class="custom-control-input" value="cheque">
                                <label class="custom-control-label" for="chequeRadio2">Cheque</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="transferenciaRadio3" name="customRadio" class="custom-control-input" value="transferencia">
                                <label class="custom-control-label" for="transferenciaRadio3">Transferencia</label>
                            </div>
                            
                            <div id="id_detalle_pago_efectivo_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_efectivo_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_pago_efectivo_al_banco" id="id_input_detalle_pago_efectivo_al_banco" rows="3" ></textarea>
                            </div>
                            
                            
                            <div id="id_nombre_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_pago_cheque_al_banco">Nombre del Emisor del Cheque</label>
                                <input type="text" class="form-control" name="id_input_nombre_pago_cheque_al_banco" id="id_input_nombre_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_rnc_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_pago_cheque_al_banco">RNC o Cedula del Emisor del Cheque</label>
                                <input type="text" class="form-control" name="id_input_rnc_pago_cheque_al_banco" id="id_input_rnc_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_nombre_banco_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_banco_pago_cheque_al_banco">Nombre del Banco del Emisor del Cheque</label>
                                <input type="text" class="form-control" name="id_input_nombre_banco_pago_cheque_al_banco" id="id_input_nombre_banco_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_numero_cheque_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cheque_pago_cheque_al_banco">Numero Cheque</label>
                                <input type="text" class="form-control" name="id_input_numero_cheque_pago_cheque_al_banco" id="id_input_numero_cheque_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_detalle_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_cheque_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_pago_cheque_al_banco" id="id_input_detalle_pago_cheque_al_banco" rows="3" ></textarea>
                            </div>
                            
                            
                            <div id="id_nombre_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_pago_transferencia_al_banco">Nombre del Titular de la Cuenta</label>
                                <input type="text" class="form-control" name="id_input_nombre_pago_transferencia_al_banco" id="id_input_nombre_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_rnc_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_pago_transferencia_al_banco">RNC del Titular de la Cuenta</label>
                                <input type="text" class="form-control" name="id_input_rnc_pago_transferencia_al_banco" id="id_input_rnc_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_nombre_banco_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_banco_pago_transferencia_al_banco">Nombre del Banco del Titular de la Cuenta</label>
                                <input type="text" class="form-control" name="id_input_nombre_banco_pago_transferencia_al_banco" id="id_input_nombre_banco_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_numero_cuenta_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cuenta_pago_transferencia_al_banco">Numero de cuenta</label>
                                <input type="text" class="form-control" name="id_input_numero_cuenta_pago_transferencia_al_banco" id="id_input_numero_cuenta_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_detalle_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_transferencia_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_pago_transferencia_al_banco" id="id_input_detalle_pago_transferencia_al_banco" rows="3" ></textarea>
                            </div>

                            <h3>
                                Metodo para recibir el pago
                            </h3>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="efectivoRadio11" name="customRadio1" class="custom-control-input" value="efectivo">
                                <label class="custom-control-label" for="efectivoRadio11">Efectivo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="chequeRadio21" name="customRadio1" class="custom-control-input" value="cheque">
                                <label class="custom-control-label" for="chequeRadio21">Cheque</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="transferenciaRadio31" name="customRadio1" class="custom-control-input" value="transferencia">
                                <label class="custom-control-label" for="transferenciaRadio31">Transferencia</label>
                            </div>
                            
                            <div id="id_detalle_recibir_pago_efectivo_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_efectivo_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_recibir_pago_efectivo_al_banco" id="id_input_detalle_recibir_pago_efectivo_al_banco" rows="3" ></textarea>
                            </div>
                            
                            
                            <div id="id_nombre_recibir_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_recibir_pago_cheque_al_banco">Nombre del Cheque</label>
                                <input type="text" class="form-control" name="id_input_nombre_recibir_pago_cheque_al_banco" id="id_input_nombre_recibir_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_detalle_recibir_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_cheque_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_recibir_pago_cheque_al_banco" id="id_input_detalle_recibir_pago_cheque_al_banco" rows="3" ></textarea>
                            </div>
                            
                            
                            <div id="id_nombre_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_recibir_pago_transferencia_al_banco">Nombre del Transferencia</label>
                                <input type="text" class="form-control" name="id_input_nombre_recibir_pago_transferencia_al_banco" id="id_input_nombre_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_rnc_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_recibir_pago_transferencia_al_banco">RNC de la Transferencia</label>
                                <input type="text" class="form-control" name="id_input_rnc_recibir_pago_transferencia_al_banco" id="id_input_rnc_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_numero_cuenta_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cuenta_recibir_pago_transferencia_al_banco">Numero de cuenta de la Transferencia</label>
                                <input type="text" class="form-control" name="id_input_numero_cuenta_recibir_pago_transferencia_al_banco" id="id_input_numero_cuenta_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_detalle_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_transferencia_al_banco">Detalle</label>
                                <textarea class="form-control" name="id_input_detalle_recibir_pago_transferencia_al_banco" id="id_input_detalle_recibir_pago_transferencia_al_banco" rows="3" ></textarea>
                            </div>

                            <div>
                                <label for="id_upload_file">Archivo</label>
                                <input type="file" class="form-control" name="id_upload_file" id="id_upload_file" value="" >
                            </div>

                            <div id="id_confirmar_transaccion_cliente" class="ocultar">
                                <label for="confirmar_transaccion_bancaria">Escriba "confirmar"</label>
                                <input type="text" class="form-control" name="confirmar_transaccion_bancaria" id="confirmar_transaccion_bancaria" value="" >
                            </div>

                            <div id="id_cancelar_transaccion_cliente" class="ocultar">
                                <label for="cancelar_transaccion_bancaria">Razon</label>
                                <input type="text" class="form-control" name="cancelar_transaccion_bancaria" id="cancelar_transaccion_bancaria" value="" >
                            </div>

                            <div id="mensaje_venta_dolar_id"></div>

                            <button type="button" id="cancelar_button_1" class="btn btn-danger" onclick="cancelarTransaccion();">Cancelar</button>
                            <button type="button" id="cancelar_button_2" class="btn btn-success ocultar" onclick="confirmarCancelacionTransaccionWUpload();">Confirmar cancelacion</button>
                            <button type="button" id="cancelar_button_3" class="btn btn-danger ocultar" data-dismiss="modal">Cancelar</button>
                            <button type="button" id="confirmar_button_1" class="btn btn-primary" onclick="confirmar_transaccion();">Confirmar</button>

                            <button type="submit" id="confirmar_button_2" class="btn btn-primary ocultar">Confirmar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/compra_venta.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script>
        seleccionarTipoDePagoAlBanco();
    </script>

    <script>
        seleccionarFormaDeRecibirPagoDelBanco();
    </script>

    <script>
        // $(document).ready(function(){
        //     var ruta           = $("#id_ruta_transaccion_bancaria").val();
        //
        //     $("#upload_form_id").on('submit', function(event){
        //         event.preventDefault();
        //         var data = new FormData(this);
        //         console.log(data);
        //         $.ajax({
        //             url: ruta,
        //             method: "POST",
        //             data: data,
        //             dataType: "JSON",
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             success: function (d) {
        //                 console.log(d);
        //             },
        //             error: function()
        //             {
        //
        //             }
        //         });
        //     });
        // });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/clientes/transaccion_upload_file.blade.php ENDPATH**/ ?>