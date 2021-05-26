<!-- Button trigger modal -->
<button type="button" id="botonModalBancoTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionBancoIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionBancoIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionBancoIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">

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
                    <input type="hidden" class="form-control" id="bancoInputRutaTransaccion" value="<?php echo e(route('validarTransaccionBanco')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaRecargarTransaccion" value="<?php echo e(route('verTransaccionBanco')); ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="bancoInputRutaCancelarTransaccion" value="<?php echo e(route('cancelar_transaccion_banco')); ?>" disabled="disabled">
                 
                  
                    
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
</div><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/bancos/modal/control_transacciones.blade.php ENDPATH**/ ?>