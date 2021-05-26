<!-- Button trigger modal -->
<button type="button" id="botonModalBancoTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionBancoIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionBancoIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionBancoIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="controlTransaccionBancoIdModalScrollableTitle"></h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="clienteInputIdCliente" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdTransaccion" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaTransaccion" value="<?php echo e(route('validarTransaccionBanco')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaRecargarTransaccion" value="<?php echo e(route('verTransaccionBanco')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaCancelarTransaccion" value="<?php echo e(route('cancelar_transaccion_banco')); ?>" disabled="disabled">
                    <div class="form-group col-sm-3">
                        <label for="clienteInputCedula">Cedula</label>
                        <input type="text" class="form-control" id="clienteInputCedula" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="clienteInputPhone">Telefono</label>
                        <input type="text" class="form-control" id="clienteInputPhone" disabled="disabled">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="clienteInputEmail1">Email address</label>
                        <input type="text" class="form-control" id="clienteInputEmail1" aria-describedby="emailHelp" disabled="disabled">
                    </div>
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
                <button type="button" id="cancelar_boton_banco_transaccion" class="btn btn-secondary" onclick="confirmarCancelacion()">Cancelar</button>
                <button type="button" id="cancelar_boton_banco_transaccion_cerrar_modal" class="btn btn-secondary ocultar" data-dismiss="modal" onclick="cancelarcancelacion();">Cancelar</button>
                <button type="button" id="_confirmar_cancelar_boton_banco_transaccion" class="btn btn-success ocultar" onclick="cancelandoTransaccion()">Confirmar Cancelacion</button>
                <button type="button" id="confirmar_boton_banco_transaccion" class="btn btn-primary" onclick="confirmarTransaccion();">Confirmar</button>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\xcomm\resources\views/bancos/modal/control_transacciones.blade.php ENDPATH**/ ?>