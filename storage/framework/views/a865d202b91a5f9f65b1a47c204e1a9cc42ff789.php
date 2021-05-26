<!-- Button trigger modal -->
<button type="button" id="botonModalClienteTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionClienteIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionClienteIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionClienteIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
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
                    <input type="hidden" class="form-control" id="ClienteInputRutaTransaccion" value="<?php echo e(route('validarTransaccionCliente')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputRutaCancelarTransaccion" value="<?php echo e(route('cancelar_transaccion_cliente')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputIdCliente" value="<?php echo e(\Auth::guard('cliente')->id()); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="ClienteInputRutaRecargarTransaccion" value="<?php echo e(route('dashboardCliente')); ?>" disabled="disabled">

                    <div class="form-group col-sm-4">
                        <label for="clienteInputRI">Rango Inicial</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputRI" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputRF">Rango final</label>
                        <input type="text" class="form-control form-control-sm" id="clienteInputRF" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="clienteInputValor">Valor Moneda</label>
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
<?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/clientes/modals/acciones_transacciones.blade.php ENDPATH**/ ?>