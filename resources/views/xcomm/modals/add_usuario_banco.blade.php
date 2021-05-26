<!-- Modal -->
<div class="modal fade" id="addUsuarioBancoModal" tabindex="-1" role="dialog" aria-labelledby="addUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUsuarioModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formAddUsuarioBanco" action="{{route('addUsuarioBanco')}}">
                <div class="modal-body">
                        @csrf
                        <input type="hidden" id="idBancoAddUsuarioBanco" name="entidadbancarias_id" value="{{isset($banco->id)?$banco->id:''}}">
                        <div class="form-group row">
                            <label for="addUsuarioInputNombre1" class="control-label col-md-2 col-sm-2">Nombre</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                            <input type="text" class="form-control getValueGrupal" name="nombre" id="addUsuarioInputNombre1" placeholder="Entre el nombre">
                            <div class="input-group-append">
                               <div class="input-group-text"><span class="fas fa-user"></span></div>
                             </div>
                             </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="addUsuarioInputEmail1" class="control-label col-md-2 col-sm-2">Email address</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                            <input type="email" class="form-control getValueGrupal" name="email" id="addUsuarioInputEmail1" placeholder="Entre email">
                            <div class="input-group-append">
                               <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                             </div>
                             </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="addUsuarioInputPassword1" class="control-label col-md-2 col-sm-2">Password</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                            <input type="password" class="form-control getValueGrupal" name="password" id="addUsuarioInputPassword1" placeholder="Password">
                            <div class="input-group-append">
                               <div class="input-group-text"><span class="fas fa-lock"></span></div>
                             </div>
                             </div>
                          </div>
                        </div>
                       <div class="form-group row">
                        <label for="addUsuarioInputLevel" class="control-label col-md-2 col-sm-2">Perfil</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <select class="form-control getValueGrupal" id="addUsuarioInputLevel" name="level">
                            <option value="user">Usuario</option>
                            <option value="admin">Admin</option>
                        </select>
                       </div>
                      </div>
                        </div>
                    <div id="mensaje_add_usuario_banco"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary boton" data-dismiss="modal"><i class="far fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary boton"><i class="fas fa-save"></i> Guardar</button>
                    {{--            <button type="button" class="btn btn-primary" onclick="addUsuarioBanco();"><i class="fas fa-save"></i> Save changes</button>--}}
                </div>
            </form>
        </div>
    </div>
</div>
