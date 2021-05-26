<!-- Button trigger modal -->
<button type="button" id="botonModalXcommTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionXcommIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionXcommIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionXcommIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closeModalBotonId12" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="controlTransaccionXcommIdModalScrollableTitle"></h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="clienteInputIdCliente" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdTransaccion" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdCambioDivisa" disabled="disabled">
                    <input type="hidden" class="form-control" id="xcommInputRutaCancelarTransaccion" value="<?php echo e(route('cancelar_transaccion_xcomm')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="xcommInputRutaRecargarTransaccion" value="<?php echo e(route('listadoTransaccionesAbiertas')); ?>" disabled="disabled">
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




                    <div id="idXcommTransaccionRazonCancelar" class="form-group">
                        <label for="xcommTrasanccionConfirmacionCancelar">Razon</label>
                        <textarea class="form-control" id="xcommTrasanccionConfirmacionCancelar"></textarea>
                    </div>
                    <br/>
                </form>
                <div id="mensajeModalControlTransaccionXcomm"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelar_boton_xcomm_transaccion_cerrar_modal" class="btn btn-secondary" data-dismiss="modal" onclick="cancelarcancelacion();">Cerrar</button>
                <button type="button" id="_confirmar_cancelar_boton_xcomm_transaccion" class="btn btn-success" onclick="cancelandoTransaccion()">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<?php /**PATH C:\wamp64\www\xcomm\resources\views/xcomm/modals/control_transacciones.blade.php ENDPATH**/ ?>