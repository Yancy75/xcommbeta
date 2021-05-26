@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
<style>
.form-control {  box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.2) inset;}
</style>
<div class="row animated fadeInUp delay-0.5s">
  <div class="col-md-8 offset-md-2">
    <section class="content">
        <div class="container-fluid">
           <div class="card card-default">
             <div class="card-header">
               <h3 class="card-title titulo2"><i class="nav-icon fas fa-university"></i> Configuracion de Bancos</h3>
               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                 <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
               </div>
             </div>
                <div class="card-body">
                    <input type="hidden" class="form-control" id="InputInfoPagarRutaBanco" value="{{route('cargarInfoTipoPagoBanco')}}"/>
                    <h4>En efectivo</h4>
                    <form>
                        <div class="form-group">
                            <label for="InputInfoPagarEfectivoDelBanco">Mensaje pagos en efectivos</label>
                            <textarea class="form-control" id="InputInfoPagarEfectivoDelBanco" rows="3" ><?php if(!empty($info)){echo $info[0]->comentario_efectivo;} ?></textarea>
                        </div>
                    </form>
                <hr/>
                <h4>En cheque</h4>
                <form>
                    <div class="form-group">
                        <label for="InputInfoPagarNombreChequeDelBanco">Nombre del cheque</label>
                        <input type="text" class="form-control" id="InputInfoPagarNombreChequeDelBanco" value="<?php if(!empty($info)){echo $info[0]->nombre_cheque;} ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="InputInfoPagarComentarioChequeDelBanco">Mensaje pagos en cheques</label>
                        <textarea class="form-control" id="InputInfoPagarComentarioChequeDelBanco" rows="3"><?php if(!empty($info)){echo $info[0]->comentario_cheque;} ?></textarea>
                    </div>
                </form>
                <hr/>
                <h4>En transferencia</h4>
                <form>
                    <div class="form-group">
                        <label for="InputInfoPagarNombreTransferirDelBanco">Nombre</label>
                        <input type="text" class="form-control" id="InputInfoPagarNombreTransferirDelBanco" value="<?php if(!empty($info)){echo $info[0]->nombre_transferencia;} ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="InputInfoPagarCuentaTransferirDelBanco">Numero de cuenta</label>
                        <input type="text" class="form-control" id="InputInfoPagarCuentaTransferirDelBanco" value="<?php if(!empty($info)){echo $info[0]->numero_cuenta;} ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="InputInfoPagarRncTransferirDelBanco">RNC</label>
                        <input type="text" class="form-control" id="InputInfoPagarRncTransferirDelBanco" value="<?php if(!empty($info)){echo $info[0]->rnc;} ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="InputInfoPagarComentarioTransferirDelBanco">Mensaje pagos en transferencia</label>
                        <textarea class="form-control" id="InputInfoPagarComentarioTransferirDelBanco" rows="3"><?php if(!empty($info)){echo $info[0]->comentario_transferencia;} ?></textarea>
                    </div>
                </form>
                  <button type="submit" class="btn btn-primary boton btd" onclick="cargarInfoTipoDePagoDelBanco();"><i class="far fa-save"></i> Guardar</button>
                  <div id="MensajeConfiguracionTipoDePagoBanco" style="text-align:center;"></div>
                </div>
            </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="{{asset('js/transaccion_banco.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
@endpush
