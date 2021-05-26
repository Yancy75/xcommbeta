<!-- Modal -->
<div class="modal fade" id="cliente_vender_dolar" tabindex="-1" role="dialog" aria-labelledby="venta_dolar_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <div class="row" style="flex-direction: column;">
                <h4 class="modal-title" id="venta_dolar_ModalLabel"></h4>
                <h5 class="modal-title" id="venta_dolar_ModalLabel2"></h5>
              </div>
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="id_ruta_transaccion_bancaria" value="{{route('add_transaccion')}}">
                    <input type="hidden" id="id_ruta_cancelar_transaccion_bancaria" value="{{route('cancelar_transaccion_cliente')}}">
                    <input type="hidden" id="id_banco_transaccion_bancaria" >
                    <input type="hidden" id="id_cambiodivisa_transaccion_bancaria" >
                    <input type="hidden" id="id_cliente_transaccion_bancaria" >
                    <input type="hidden" id="id_accion_transaccion_bancaria" >

                    <div class="form-group">
                        <label id="label_valor_dolar_transaccion_bancaria" for="valor_dolar_transaccion_bancaria">Venta USD</label>
                        <input type="text" class="form-control" id="valor_dolar_transaccion_bancaria" value="" disabled>
                    </div>

                    <div class="form-group ocultar">
                        <label for="rango_inicial_transaccon_bancaria">Rango</label>
                        <input type="text" class="form-control" id="rango_inicial_transaccon_bancaria" value="" disabled>
                        <input type="text" class="form-control" id="rango_final_transaccon_bancaria" value="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="cantidad_transaccion_bancaria">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad_transaccion_bancaria" value="" disabled>
                    </div>

                    <div class="form-group ocultar">
                        <label for="Mensaje_transaccion_bancaria">Menasje</label>
                        <input type="text" class="form-control" id="Mensaje_transaccion_bancaria" value="" disabled>
                    </div>

                </form>

                <div id="tipoDePagoCliente">
                    <h4>
                        <button class="btn btn-link" type="button" onclick="showHideMetodoPagarBanco();">
                            Metodo para pagar al banco
                        </button>
                    </h4>
                    <div id="tipoDePagoClienteFormulario" class="ocultar">
                        <form>
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
    {{--                        ///////////////Efectivo///////////////////////////////////////--}}
                            <div id="id_detalle_pago_efectivo_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_efectivo_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_pago_efectivo_al_banco" rows="3" ></textarea>
                            </div>
    {{--                        ///////////////Efectivo///////////////////////////////////////--}}
    {{--                        ///////////////Cheque///////////////////////////////////////--}}
                            <div id="id_nombre_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_pago_cheque_al_banco">Nombre del Emisor del Cheque</label>
                                <input type="text" class="form-control" id="id_input_nombre_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_rnc_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_pago_cheque_al_banco">RNC o Cedula del Emisor del Cheque</label>
                                <input type="text" class="form-control" id="id_input_rnc_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_nombre_banco_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_banco_pago_cheque_al_banco">Nombre del Banco del Emisor del Cheque</label>
                                <input type="text" class="form-control" id="id_input_nombre_banco_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_numero_cheque_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cheque_pago_cheque_al_banco">Numero Cheque</label>
                                <input type="text" class="form-control" id="id_input_numero_cheque_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_detalle_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_cheque_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_pago_cheque_al_banco" rows="3" ></textarea>
                            </div>
    {{--                        ///////////////Cheque///////////////////////////////////////--}}
    {{--                        ///////////////Transferencia///////////////////////////////////////--}}
                            <div id="id_nombre_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_pago_transferencia_al_banco">Nombre del Titular de la Cuenta</label>
                                <input type="text" class="form-control" id="id_input_nombre_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_rnc_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_pago_transferencia_al_banco">RNC del Titular de la Cuenta</label>
                                <input type="text" class="form-control" id="id_input_rnc_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_nombre_banco_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_banco_pago_transferencia_al_banco">Nombre del Banco del Titular de la Cuenta</label>
                                <input type="text" class="form-control" id="id_input_nombre_banco_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_numero_cuenta_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cuenta_pago_transferencia_al_banco">Numero de cuenta</label>
                                <input type="text" class="form-control" id="id_input_numero_cuenta_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_detalle_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_pago_transferencia_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_pago_transferencia_al_banco" rows="3" ></textarea>
                            </div>
    {{--                        ///////////////Transferencia///////////////////////////////////////--}}
                        </form>
                    </div>
                </div>

                <div id="tipoDeRecibirElPagoCliente">
                    <h4>
                        <button class="btn btn-link" type="button" onclick="showHideMetipoRecibirPagoCliente();">
                            Metodo para recibir el pago
                        </button>
                    </h4>
                    <div id="tipoDeRecibirElPagoClienteFormulario" class="ocultar">
                        <form>
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
                            {{--                        ///////////////Efectivo///////////////////////////////////////--}}
                            <div id="id_detalle_recibir_pago_efectivo_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_efectivo_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_recibir_pago_efectivo_al_banco" rows="3" ></textarea>
                            </div>
                            {{--                        ///////////////Efectivo///////////////////////////////////////--}}
                            {{--                        ///////////////Cheque///////////////////////////////////////--}}
                            <div id="id_nombre_recibir_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_recibir_pago_cheque_al_banco">Nombre del Cheque</label>
                                <input type="text" class="form-control" id="id_input_nombre_recibir_pago_cheque_al_banco" value="" >
                            </div>
                            <div id="id_detalle_recibir_pago_cheque_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_cheque_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_recibir_pago_cheque_al_banco" rows="3" ></textarea>
                            </div>
                            {{--                        ///////////////Cheque///////////////////////////////////////--}}
                            {{--                        ///////////////Transferencia///////////////////////////////////////--}}
                            <div id="id_nombre_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_nombre_recibir_pago_transferencia_al_banco">Nombre del Transferencia</label>
                                <input type="text" class="form-control" id="id_input_nombre_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_rnc_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_rnc_recibir_pago_transferencia_al_banco">RNC de la Transferencia</label>
                                <input type="text" class="form-control" id="id_input_rnc_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_numero_cuenta_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_numero_cuenta_recibir_pago_transferencia_al_banco">Numero de cuenta de la Transferencia</label>
                                <input type="text" class="form-control" id="id_input_numero_cuenta_recibir_pago_transferencia_al_banco" value="" >
                            </div>
                            <div id="id_detalle_recibir_pago_transferencia_cliente" class="ocultar metodo_pago">
                                <label for="id_input_detalle_recibir_pago_transferencia_al_banco">Concepto</label>
                                <textarea class="form-control" id="id_input_detalle_recibir_pago_transferencia_al_banco" rows="3" ></textarea>
                            </div>
                            {{--                        ///////////////Transferencia///////////////////////////////////////--}}

                        </form>
                    </div>

                </div>

                <div>
                    <p>Transferencia opcion LBTR o Pago Inmediato siempre.</p>
                </div>

                <div id="idUploadFileDiv" style="margin-bottom: 15px;margin-top:10px;">
                    <button type="button" onclick="monstrarUploadFile();" class="btn btn-success boton"><i class="far fa-file"></i> Subir archivo</button>
                </div>

                <div>
                    <form>
                        <div id="id_confirmar_transaccion_cliente" class="ocultar">
                            <label for="confirmar_transaccion_bancaria">Escriba "confirmar"</label>
                            <input type="text" class="form-control" id="confirmar_transaccion_bancaria" value="" >
                        </div>

                        <div id="id_cancelar_transaccion_cliente" class="ocultar">
                            <label for="cancelar_transaccion_bancaria">Razon</label>
                            <input type="text" class="form-control" id="cancelar_transaccion_bancaria" value="" >
                        </div>
                    </form>
                </div>

                <div id="mensaje_venta_dolar_id"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelar_button_1" class="btn btn-danger boton" onclick="cancelarTransaccion();"><i class="fas fa-window-close"></i> Cancelar</button>
                <button type="button" id="cancelar_button_2" class="btn btn-success boton ocultar" onclick="confirmarCancelacionTransaccion();"><i class="fas fa-window-close"></i> Confirmar cancelacion</button>
                <button type="button" id="cancelar_button_3" class="btn btn-danger boton ocultar" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                <button type="button" id="confirmar_button_1" class="btn btn-primary boton" onclick="confirmar_transaccion();"><i class="fas fa-check-circle"></i> Confirmar</button>
                <button type="button" id="confirmar_button_2" class="btn btn-primary boton ocultar" onclick="realizar_venta_dolares();"><i class="fas fa-check-circle"></i> Confirmar</button>
                <button type="button" id="subir_arvhico_id" onclick="monstrarUploadFile();" class="btn btn-primary boton ocultar"><i class="far fa-file"></i> Transacciones sobre los US$15,000</button>
            </div>
        </div>
    </div>
</div>
