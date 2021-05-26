@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
    <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card mt-5">
              <div class="card-header">
                  <h3 class="card-title titulo2"><i class="fas fa-tachometer-alt"></i> Dashboard </h3>
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
               </div>
                <div class="card-body">
                    <form id="form_buscar_tasa_cantidad_transaccion">
                     <div class="row" style="justify-content: space-between;">
                      <div class="form-group">
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="venta_dolar" name="accion_moneda" value="venta_dolar">
                        <label for="venta_dolar" class="custom-control-label"> Venta <i class="fas fa-dollar-sign"></i> USD </label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="compra_dolar" name="accion_moneda"  value="compra_dolar">
                        <label for="compra_dolar" class="custom-control-label"> Compra <i class="fas fa-dollar-sign"></i> USD </label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="venta_euro" name="accion_moneda" value="venta_euro">
                        <label for="venta_euro" class="custom-control-label"> Venta <i class="fas fa-euro-sign"></i> EUR </label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="compra_euro" name="accion_moneda" value="compra_euro">
                        <label for="compra_euro" class="custom-control-label"> Compra <i class="fas fa-euro-sign"></i> EUR </label>
                      </div>
                    </div>

                      <div class="form-group row col-8">
                            <label for="cantidad_transaccion" class="control-label col-md-2 col-sm-2">Cantidad:</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                            <input type="text" class="form-control float-left" id="cantidad_transaccion">
                            <div class="input-group-append">
                               <div class="input-group-text" style="box-shadow: 0px 0px 3px #676767 inset; border: 0;"><button type="button" class="boton1" onclick="buscarTasasPorCantidadTransaccion();"><i class="fas fa-search"></i> Buscar</button></div>
                             </div>
                             </div>
                          </div>
                            <input type="hidden" class="form-control float-left" id="ruta_buscar_transaccion_cantidad" value="{{route('buscar_transaccion_cantidad')}}">
                            <input type="hidden" class="form-control float-left" id="ruta_transaccion_siguiente_cliente" value="{{route('ver_transaccion_cliente')}}">
                            <input type="hidden" class="form-control float-left" id="id_cliente_transaccion_cantidad" value="{{\Auth::guard('cliente')->id()}}">
                            <input type="hidden" class="form-control float-left" id="id_cliente_info_tipo_pago_al_banco" value="{{route('infoTipoPagoAlBanco')}}">

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                    <div id="mensaje_form_buscar_tasa_cantidad_transaccion"></div>
                    <div id="botones_transaccion_accion_call_modal" style="display: flex; justify-content: center;"></div>
                    <button id="id_button_cliente_venta_dolar" type="button" class="btn btn-primary ocultar" data-toggle="modal" data-target="#cliente_vender_dolar">
                        Launch modal venta dolar
                    </button>
                    @include('clientes.modals.venta_dolar')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/compra_venta.js')}}"></script>
    <script>
        seleccionarTipoDePagoAlBanco();
    </script>

    <script>
        seleccionarFormaDeRecibirPagoDelBanco();
    </script>
@endpush
