<!-- Button trigger modal -->
<button type="button" id="botonModalXcommTransaccionAccion" class="btn btn-primary ocultar" data-toggle="modal" data-target="#controlTransaccionXcommIdModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="controlTransaccionXcommIdModal" tabindex="-1" role="dialog" aria-labelledby="controlTransaccionXcommIdModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
{{--    <div class="modal-dialog modal-dialog-scrollable" role="document">--}}
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="controlTransaccionXcommIdModalScrollableTitle"></h5>
                <button type="button" id="closeModalBotonId12" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="clienteInputIdCliente" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdTransaccion" disabled="disabled">
                    <input type="hidden" class="form-control" id="clienteInputIdCambioDivisa" disabled="disabled">
                    <input type="hidden" class="form-control" id="xcommInputRutaCancelarTransaccion" value="{{route('cancelar_transaccion_xcomm')}}" disabled="disabled">
                    <input type="hidden" class="form-control" id="xcommInputRutaRecargarTransaccion" value="{{route('listadoTransaccionesAbiertas')}}" disabled="disabled">
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
                        <label for="clienteInputPhone"  class="control-label col-md-2 col-sm-2">Telefono</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control" id="clienteInputPhone" disabled="disabled" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" im-insert="true">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-phone"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputEmail1"  class="control-label col-md-2 col-sm-2">Email address</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control" id="clienteInputEmail1" aria-describedby="emailHelp" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputRI"  class="control-label col-md-4 col-sm-4">Rango Inicial</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputRI" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-calendar"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row"  >
                        <label for="clienteInputRF" class="control-label col-md-4 col-sm-4">Rango final</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputRF" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-calendar"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row"  >
                        <label for="clienteInputValor" class="control-label col-md-4 col-sm-4">Valor Moneda</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputValor" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-donate"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputCantidad"  class="control-label col-md-4 col-sm-4">Cantidad a cambiar</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputCantidad" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-dollar-sign"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputAccion"  class="control-label col-md-4 col-sm-4">Accion</label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputAccion" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-check-double"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputEstatus"  class="control-label col-md-2 col-sm-2">Estatus</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputEstatus" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-file-invoice"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="clienteInputFecha"  class="control-label col-md-2 col-sm-2">Fecha</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="clienteInputFecha" disabled="disabled">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-calendar-alt"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
{{--                    <div id="confirmarIdTransaccionBanco" class="form-group">--}}
{{--                        <label for="bancoTrasanccionConfirmacionConfirmar">Escriba "confirmar"</label>--}}
{{--                        <input type="text" class="form-control form-control-sm" id="bancoTrasanccionConfirmacionConfirmar">--}}
{{--                    </div>--}}
                    <div id="idXcommTransaccionRazonCancelar" class="form-group row">
                        <label for="xcommTrasanccionConfirmacionCancelar"  class="control-label col-md-2 col-sm-2">Razon</label>
                        <div class="col-md-10 col-sm-10">
                            <textarea class="form-control" id="xcommTrasanccionConfirmacionCancelar"></textarea>
                        </div>
                    </div>
                    <br/>
                </form>
                <div id="mensajeModalControlTransaccionXcomm"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelar_boton_xcomm_transaccion_cerrar_modal" class="btn btn-secondary boton" data-dismiss="modal" onclick="cancelarcancelacion();"><i class="far fa-window-close"></i> Cerrar</button>
                <button type="button" id="_confirmar_cancelar_boton_xcomm_transaccion" class="btn btn-success boton" onclick="cancelandoTransaccion()"><i class="fas fa-window-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
