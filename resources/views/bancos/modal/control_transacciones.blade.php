<!-- Button trigger modal -->
<button type="button" id="botonModalBancoTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionBancoIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionBancoIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionBancoIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
{{--    <div class="modal-dialog modal-dialog-scrollable" role="document">--}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="controlTransaccionBancoIdModalScrollableTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="clienteInputIdCliente" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdTransaccion" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaTransaccion" value="{{route('validarTransaccionBanco')}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaRecargarTransaccion" value="{{route('verTransaccionBanco')}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaCancelarTransaccion" value="{{route('cancelar_transaccion_banco')}}" disabled="disabled">



                    <div class="form-group row">
                        <label for="clienteInputCedula" class="control-label col-md-2 col-sm-2">Cedula</label>
                           <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control" id="clienteInputCedula" disabled="disabled">
                         <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-id-card"></span></div>
                         </div>
                         </div>
                         </div>
                         </div>

                     <div class="form-group row">
                        <label for="clienteInputPhone" class="control-label col-md-2 col-sm-2">Telefono</label>
                        <div class="col-md-10 col-sm-10">
                         <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" im-insert="true" id="clienteInputPhone" disabled="disabled">
                         <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-phone"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputEmail1" class="control-label col-md-4 col-sm-4">Email address</label>
                        <div class="col-md-8 col-sm-8">
                         <div class="input-group">
                        <input type="text" class="form-control" id="clienteInputEmail1" aria-describedby="emailHelp" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputRI" class="control-label col-md-4 col-sm-4">Rango Inicial</label>
                        <div class="col-md-8 col-sm-8">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputRI" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-sort-numeric-down"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>
                    <div class="form-group row">
                        <label for="clienteInputRF" class="control-label col-md-4 col-sm-4">Rango final</label>
                        <div class="col-md-8 col-sm-8">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputRF" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-sort-numeric-up"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputValor" class="control-label col-md-4 col-sm-4">Valor Moneda</label>
                        <div class="col-md-8 col-sm-8">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputValor" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-money-bill-alt"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputCantidad" class="control-label col-md-4 col-sm-4">Cantidad a cambiar</label>
                        <div class="col-md-8 col-sm-8">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputCantidad" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-money-bill-wave"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputAccion" class="control-label col-md-2 col-sm-2">Accion</label>
                        <div class="col-md-10 col-sm-10">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputAccion" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-location-arrow"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputEstatus" class="control-label col-md-2 col-sm-2">Estatus</label>
                        <div class="col-md-10 col-sm-10">
                         <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputEstatus" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-signal"></span></div>
                         </div>
                         </div>
                       </div>
                       </div>

                    <div class="form-group row">
                        <label for="clienteInputFecha" class="control-label col-md-2 col-sm-2">Fecha</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputFecha" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
{{--Como Se va a pagar--}}
                    <h4>Como Pagar</h4>
                    <div id="clienteInputTipoPago_div" class="form-group row">
                        <label for="clienteInputTipoPago" class="control-label col-md-3 col-sm-3">Tipo de Pago</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputTipoPago" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputComentarioEfectivo_div" class="form-group row">
                        <label for="clienteInputComentarioEfectivo" class="control-label col-md-3 col-sm-3">Comentario</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputComentarioEfectivo" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputNumeroCheque_div" class="form-group row">
                        <label for="clienteInputNumeroCheque" class="control-label col-md-4 col-sm-4">Numero Cheque</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputNumeroCheque" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputNombreCheque_div" class="form-group row">
                        <label for="clienteInputNombreCheque" class="control-label col-md-4 col-sm-4">Nombre Cheque</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputNombreCheque" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputComentarioCheque_div" class="form-group row">
                        <label for="clienteInputComentarioCheque" class="control-label col-md-4 col-sm-4">Comentario Cheque</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputComentarioCheque" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputNumeroCuenta_div" class="form-group row">
                        <label for="clienteInputNumeroCuenta" class="control-label col-md-4 col-sm-4">Numero Cuenta</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputNumeroCuenta" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputNombreTransferencia_div" class="form-group row">
                        <label for="clienteInputNombreTransferencia" class="control-label col-md-4 col-sm-4">Nombre Transferencia</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputNombreTransferencia" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputComentarioTransferencia_div" class="form-group row">
                        <label for="clienteInputComentarioTransferencia" class="control-label col-md-4 col-sm-4">Comentario Transferencia</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputNomreTransferencia" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteInputRNC_div" class="form-group row">
                        <label for="clienteInputRNC" class="control-label col-md-3 col-sm-3">RNC/Cedula</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteInputRNC" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Fin Como Se va a pagar--}}
                    {{--Recibir Pago--}}
                    <hr/>
                    <h4>Como Recibir Pago</h4>
                    <div id="clienteRecibirInputTipoPago_div" class="form-group row">
                        <label for="clienteRecibirInputTipoPago" class="control-label col-md-3 col-sm-3">Tipo de Pago</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputTipoPago" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputComentarioEfectivo_div" class="form-group row">
                        <label for="clienteRecibirInputComentarioEfectivo" class="control-label col-md-3 col-sm-3">Comentario</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputComentarioEfectivo" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputNombreCheque_div" class="form-group row">
                        <label for="clienteRecibirInputNombreCheque" class="control-label col-md-4 col-sm-4">Nombre Cheque</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputNombreCheque" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputComentarioCheque_div" class="form-group row">
                        <label for="clienteRecibirInputComentarioCheque" class="control-label col-md-4 col-sm-4">Comentario Cheque</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputComentarioCheque" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputNumeroCuenta_div" class="form-group row">
                        <label for="clienteRecibirInputNumeroCuenta" class="control-label col-md-4 col-sm-4">Numero Cuenta</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputNumeroCuenta" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputNombreTransferencia_div" class="form-group row">
                        <label for="clienteRecibirInputNombreTransferencia" class="control-label col-md-4 col-sm-4">Nombre Transferencia</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputNombreTransferencia" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputComentarioTransferencia_div" class="form-group row">
                        <label for="clienteRecibirInputComentarioTransferencia" class="control-label col-md-4 col-sm-4">Comentario Transferencia</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputComentarioTransferencia" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="clienteRecibirInputRNC_div" class="form-group row">
                        <label for="clienteRecibirInputRNC" class="control-label col-md-3 col-sm-3">RNC/Cedula</label>
                        <div class="col-md-9 col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="clienteRecibirInputRNC" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-file"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Fin Recibir Pago--}}
                    <div id="confirmarIdTransaccionBanco" class="form-group">
                        <label for="bancoTrasanccionConfirmacionConfirmar">Escriba "confirmar"</label>
                        <input type="text" class="form-control form-control-sm" id="bancoTrasanccionConfirmacionConfirmar">
                    </div>
                    <div id="idBancoTransaccionRazonCancelar" class="form-group ocultar">
                        <label for="bancoTrasanccionConfirmacionCancelar">Razon</label>
                        <textarea class="form-control" id="bancoTrasanccionConfirmacionCancelar"></textarea>
                    </div>
                    <br/>
                </form>
                <div id="mensajeModalControlTransaccionBanco"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelar_boton_banco_transaccion" class="btn btn-secondary boton" onclick="confirmarCancelacion()"><i class="far fa-window-close"></i> Cancelar</button>
                <button type="button" id="cancelar_boton_banco_transaccion_cerrar_modal" class="btn btn-secondary boton ocultar" data-dismiss="modal" onclick="cancelarcancelacion();"><i class="far fa-window-close"></i> Cancelar</button>
                <button type="button" id="_confirmar_cancelar_boton_banco_transaccion" class="btn btn-success boton ocultar" onclick="cancelandoTransaccion()"><i class="fas fa-window-close"></i> Confirmar Cancelacion</button>
                <button type="button" id="confirmar_boton_banco_transaccion" class="btn btn-primary boton" onclick="confirmarTransaccion();"><i class="fas fa-save"></i> Confirmar</button>
            </div>
        </div>
    </div>
</div>
