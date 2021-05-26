<!-- Modal -->
<div class="modal fade" id="modifyClienteBancoModal" tabindex="-1" role="dialog" aria-labelledby="modifyClienteBancoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modifyClienteModalLabel">Modificar Cliente</h5>
                <div id="botonAddPasswordToModificarCliente" class="float-right">
                    <button class="btn boton btn-success quina" onclick="addInputChangePassword();">Cambiar Password <i class="fas fa-lock-open"></i></button>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarPassword();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formModifyClienteBanco" action="">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="idClienteModifyClienteBanco" name="user_id" value="">
                    <div class="form-group row">
                        <label for="modifyClienteInputCedula1" class="control-label col-md-2 col-sm-2">Cedula</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="cedula" id="modifyClienteInputCedula1" placeholder="Entre la cedula">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-id-card"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="modifyClienteInputNombre1" class="control-label col-md-2 col-sm-2">Nombre</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="nombre" id="modifyClienteInputNombre1" placeholder="Entre el nombre">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-user"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="modifyClienteInputPhone1" class="control-label col-md-2 col-sm-2">Telefono</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="phone" id="modifyClienteInputPhone1" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" im-insert="true">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-phone"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="modifyClienteInputEmail1" class="control-label col-md-2 col-sm-2">Email address</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="email" class="form-control getValueGrupal" name="email" id="modifyClienteInputEmail1" placeholder="Entre email">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row" id="modifyClientePasswordInput">
                    </div>
                    <div class="form-check form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input class="form-check-input position-static" type="checkbox" name="status" id="modifyClienteInputCheck">
                            <label for="modifyClienteInputCheck">Activo</label>
                        </div>
                    </div>

                    <div id="mensaje_modify_Cliente_banco"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary boton" data-dismiss="modal" onclick="limpiarPassword();"><i class="far fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary boton"><i class="fas fa-save"></i> Save changes</button>
                    {{--                    <button type="button" class="btn btn-primary" onclick="modifyClienteBanco();">Save changes</button>--}}
                </div>
            </form>
        </div>
    </div>
</div>
