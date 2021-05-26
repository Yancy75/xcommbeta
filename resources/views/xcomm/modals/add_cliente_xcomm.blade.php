<!-- Modal -->
<div class="modal fade" id="addClienteBancoModal" tabindex="-1" role="dialog" aria-labelledby="addClienteBancoModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClienteModalLabel">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <form method="POST" id="formAddClienteBanco" action="{{route('clientesAdd')}}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label for="addClienteInputCedula1" class="control-label col-md-2 col-sm-2">Cedula</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="cedula" id="addClienteInputCedula1" placeholder="Entre la cedula">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="far fa-id-card"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="addClienteInputNombre1" class="control-label col-md-2 col-sm-2">Nombre</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="nombre" id="addClienteInputNombre1" placeholder="Entre el nombre">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-user"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="addClienteInputPhone1" class="control-label col-md-2 col-sm-2">Telefono</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="text" class="form-control getValueGrupal" name="phone" id="addClienteInputPhone1" >
{{--                        <input type="text" class="form-control getValueGrupal" name="phone" id="addClienteInputPhone1" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" im-insert="true">--}}
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-phone"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="addClienteInputEmail1" class="control-label col-md-2 col-sm-2">Email address</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="email" class="form-control getValueGrupal" name="email" id="addClienteInputEmail1" placeholder="Entre email">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="addClienteInputPassword1" class="control-label col-md-2 col-sm-2">Password</label>
                        <div class="col-md-10 col-sm-10">
                            <div class="input-group">
                        <input type="password" class="form-control getValueGrupal" name="password" id="addClienteInputPassword1" placeholder="Password">
                        <div class="input-group-append">
                           <div class="input-group-text"><span class="fas fa-lock"></span></div>
                         </div>
                         </div>
                      </div>
                    </div>
                    <div id="mensaje_add_cliente_xcomm"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary boton" data-dismiss="modal"><i class="far fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary boton"><i class="fas fa-save"></i> Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
