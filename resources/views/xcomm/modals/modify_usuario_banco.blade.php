<!-- Modal -->
<div class="modal fade" id="modifyUsuarioBancoModal" tabindex="-1" role="dialog" aria-labelledby="madifyUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifyUsuarioModalLabel">Modificar Usuario</h5>
                 <button class="btn boton btn-success quina" id="botonAddPasswordToModificarUsuario" onclick="addInputChangePassword();">Cambiar Password <i class="fas fa-lock-open"></i></button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarPassword();"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" id="formModifyUsuarioBanco" action="">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="idBancoModifyUsuarioBanco" name="entidadbancarias_id" value="{{isset($banco->id)?$banco->id:''}}">
                    <input type="hidden" id="idUsuarioModifyUsuarioBanco" name="user_id" value="">
                    <div class="form-group row">
                        <label for="modifyUsuarioInputNombre1" class="control-label col-md-2 col-sm-2">Nombre</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="nombre" id="modifyUsuarioInputNombre1" placeholder="Entre el nombre">
                        <div class="input-group-append">
                             <div class="input-group-text"><span class="fas fa-user"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="modifyUsuarioInputEmail1" class="control-label col-md-2 col-sm-2">Email address</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="email" class="form-control getValueGrupal" name="email" id="modifyUsuarioInputEmail1" placeholder="Entre email">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row" id="modifyAddPasswordInput">
                    </div>
                   <div class="form-group row">
                    <label for="modifyUsuarioInputLevel" class="control-label col-md-2 col-sm-2">Perfil</label>
                    <div class="col-md-10 col-sm-10">
                    <select class="form-control getValueGrupal" id="modifyUsuarioInputLevel" name="level">
                        <option value="user">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                    </div>
                  </div>
                    <div class="form-check form-group clearfix">
                        <div class="icheck-primary d-inline">
                        <input type="checkbox" name="status" id="modifyUsuarioInputCheck">
                        <label for="modifyUsuarioInputCheck">Activo</label>
                      </div>
                    </div>

                    <div id="mensaje_modify_usuario_banco"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn boton btn-secondary" data-dismiss="modal" onclick="limpiarPassword();"><i class="far fa-window-close"></i> Close</button>
                    <button type="submit" class="btn boton btn-primary"><i class="fas fa-save"></i> Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
