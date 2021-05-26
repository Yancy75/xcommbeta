<!-- Button trigger modal -->
<button type="button" id="botonModalClienteTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionClienteIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionClienteIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionClienteIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{--    <div class="modal-dialog modal-dialog-scrollable" role="document">--}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="controlTransaccionClienteIdModalScrollableTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="clienteInputIdTransaccion" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputRutaTransaccion" value="{{route('validarTransaccionCliente')}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputRutaCancelarTransaccion" value="{{route('cancelar_transaccion_cliente')}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputIdCliente" value="{{\Auth::guard('cliente')->id()}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputRutaRecargarTransaccion" value="{{route('dashboardCliente')}}" disabled="disabled">

                    <div class="form-group col-sm-4">
                        <label for="clienteInputRI">Rango Inicial</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputRI" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputRF">Rango final</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputRF" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputValor">Tasa de cambio</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputValor" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label for="clienteInputCantidad">Cantidad a cambiar</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputCantidad" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputAccion">Accion</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputAccion" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputEstatus">Estatus</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputEstatus" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputFecha">Fecha</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputFecha" disabled="disabled">
                    </div>
{{--                    Instrucciones del banco--}}
                    <hr/>
                    <h4>Instrucciones para depositar al banco</h4>
                    <div id="clienteInputInstTipoPago_div" class="form-group col-sm-4">
                        <label for="clienteInputInstTipoPago">Tipo Pago</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputInstTipoPago" disabled="disabled">
                    </div>
                    <div id="clienteInputInstComentarioEfectivo_div" class="form-group col-sm-4">
                        <label for="clienteInputInstComentarioEfectivo">Concepto</label>
                        <textarea class="form-control form-control-sm" id="clienteInputInstComentarioEfectivo" disabled="disabled"></textarea>
                    </div>
                    <div id="clienteInputInstNombreCheque_div" class="form-group col-sm-4">
                        <label for="clienteInputInstNombreCheque">Nombre Cheque</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputInstNombreCheque" disabled="disabled">
                    </div>
                    <div id="clienteInputInstComentarioCheque_div" class="form-group col-sm-4">
                        <label for="clienteInputInstComentarioCheque">Concepto</label>
                        <textarea class="form-control form-control-sm" id="clienteInputInstComentarioCheque" disabled="disabled"></textarea>
                    </div>
                    <div id="clienteInputInstNumeroCuenta_div" class="form-group col-sm-4">
                        <label for="clienteInputInstNumeroCuenta">Numero de Cuenta</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputInstNumeroCuenta" disabled="disabled">
                    </div>
                    <div id="clienteInputInstNombreTransferencia_div" class="form-group col-sm-4">
                        <label for="clienteInputInstNombreTransferencia">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputInstNombreTransferencia" disabled="disabled">
                    </div>
                    <div id="clienteInputInstRnc_div" class="form-group col-sm-4">
                        <label for="clienteInputInstRnc">RNC</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputInstRnc" disabled="disabled">
                    </div>
                    <div id="clienteInputInstComentarioTransferencia_div" class="form-group col-sm-4">
                        <label for="clienteInputInstComentarioTransferencia">Concepto</label>
                        <textarea class="form-control form-control-sm" id="clienteInputInstComentarioTransferencia" disabled="disabled"></textarea>
                    </div>
{{--                    Fin Instrucciones--}}
                    <div id="confirmarIdTransaccionCliente" class="form-group">
                        <label for="ClienteTrasanccionConfirmacionConfirmar">Escriba "confirmar"</label>
                        <input type="text" class="form-control form-control-sm" id="ClienteTrasanccionConfirmacionConfirmar">
                    </div>

                    <div id="idClienteTransaccionRazonCancelar" class="form-group ocultar">
                        <label for="ClienteTrasanccionConfirmacionCancelar">Razon</label>
                        <textarea class="form-control" id="ClienteTrasanccionConfirmacionCancelar"></textarea>
                    </div>
                    <br/>

                </form>
                <div id="mensajeModalControlTransaccionCliente"></div>
            </div>
            <div class="modal-footer">
                <button id="cancelar_boton_cliente_transaccion" type="button" class="btn btn-secondary boton" onclick="confirmarCancelacion();"><i class="fas fa-window-close"></i> Cancelar</button>
                <button id="cancelar_boton_cliente_transaccion_cerrar_modal" type="button" class="btn btn-secondary boton ocultar" data-dismiss="modal" onclick="cancelarcancelacion();"><i class="fas fa-window-close"></i> Cancelar</button>
                <button id="confirmar_cancelar_boton_cliente_transaccion" type="button" class="btn btn-success boton ocultar " onclick="cancelandoTransaccion()"><i class="fas fa-window-close"></i> Confirmar Cancelacion</button>
                <button id="confirmar_boton_cliente_transaccion" type="button" class="btn btn-primary boton" onclick="confirmarTransaccionPorCliente();"><i class="fas fa-check-circle"></i> Confirmar</button>
            </div>
        </div>
    </div>
</div>
