@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
    @include('xcomm.modals.add_usuario_banco')
    @include('xcomm.modals.modify_usuario_banco')
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-8">
            <div class="box">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="nav-icon fas fa-university"></i> Cambio de Divisas {{isset($banco->name)?$banco->name:''}}</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                  </div>
                        <div class="card-body">
                            <div id="cambio_divisa_id" >
                            <form method="post" action="{{ route('cargandoCambioDivisaBanco', ['id' => $banco->id]) }}">
                                @csrf
                                <input type="hidden" id="valor_de_comision" value="{{$comision[0]['comision']}}">
                                <div class="form-group row">
                                    @if(empty($info))
                                    <input type="hidden" class="form-control" name="cambiodivisa_id" id="cambiodivisa_id" >
                                    @else
                                    <input type="hidden" class="form-control" name="cambiodivisa_id" id="cambiodivisa_id" value="{{$info[0]['id']}}">
                                    @endif
                                    <label for="dolar_compra" class="control-label col-md-2 col-sm-2">Comprar Dolar</label>
                                        <div class="col-md-10 col-sm-10">
                                           <div class="input-group">
                                               <input type="text" class="form-control" name="dolar_compra" id="dolar_compra" onkeyup="calculoValoresComision();" value="<?php if(!empty($info)){ echo number_format($info[0]['dolar_compra'],2);}?>" placeholder="Comprar Dolar...">
                                               <div class="input-group-append">
                                                  <div class="input-group-text"><span class="fas fa-dollar-sign"></span></div>
                                               </div>
                                           </div>
                                        </div>
                                        <p id="dolar_compra_menos_comision"></p>
                                </div>
                                <div class="form-group row">
                                    <label for="dolar_venta" class="control-label col-md-2 col-sm-2">Venta Dolar</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="dolar_venta" id="dolar_venta" onkeyup="calculoValoresComision();" value="<?php if(!empty($info)){ echo number_format($info[0]['dolar_venta'],2);}?>" placeholder="Vender Dolar...">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fas fa-dollar-sign"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inventario_dolar" class="control-label col-md-2 col-sm-2">Inventario Dolar</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="inventario_dolar" id="inventario_dolar" value="<?php if(!empty($info)){ echo number_format($info[0]['inventario_dolar'],2);}?>" placeholder="Inventario Dolar...">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fas fa-bar-chart"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p id="dolar_venta_menos_comision"></p>
                                <div class="form-group row">
                                    <label for="comprar_euro"  class="control-label col-md-2 col-sm-2">Comprar Euro</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="comprar_euro" id="comprar_euro" onkeyup="calculoValoresComision();" value="<?php if(!empty($info)){ echo number_format($info[0]['euro_compra'],2);}?>" placeholder="Comprar Euro...">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fas fa-euro-sign"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p id="euro_compra_menos_comision"></p>
                                <div class="form-group row">
                                    <label for="venta_euro" class="control-label col-md-2 col-sm-2">Venta Euro</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="venta_euro" id="venta_euro" onkeyup="calculoValoresComision();" value="<?php if(!empty($info)){ echo number_format($info[0]['euro_venta'],2);}?>" placeholder="Vender Euro...">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fas fa-euro-sign"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inventario_euro" class="control-label col-md-2 col-sm-2">Inventario Euro</label>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="inventario_euro" id="inventario_euro" value="<?php if(!empty($info)){ echo number_format($info[0]['inventario_euro'],2);}?>" placeholder="Inventario Euro...">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fas fa-bar-chart"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p id="euro_venta_menos_comision"></p>

                                <div class="row">
                                <div class="form-group col-6">
                                    <label for="rango_inicial">Desde:</label>
                                    <input type="text" class="form-control" name="rango_inicial" id="rango_inicial" value="<?php if(!empty($info)){ echo number_format($info[0]['rango_inicial'],2);}?>" placeholder="Desde...">
                                </div>
                                <div class="form-group col-6">
                                    <label for="rango_final">Hasta:</label>
                                    <input type="text" class="form-control" name="rango_final" id="rango_final" value="<?php if(!empty($info)){ echo number_format($info[0]['rango_final'],2);}?>" placeholder="Hasta...">
                                </div>
                               </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary boton btd "><i class="far fa-save"></i> Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/usuario_banco.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script>
        $(document).ready(function(){
      /*      $('#tableEntidadBanco').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});*/
        });

        function calculoValoresComision()
        {
            var comision = parseFloat($("#valor_de_comision").val());
            var compraDolar = parseFloat($("#dolar_compra").val());
            var ventaDolar  = parseFloat($("#dolar_venta").val());
            var compraEuro  = parseFloat($("#comprar_euro").val());
            var ventaEuro   = parseFloat($("#venta_euro").val());

            $("#dolar_compra_menos_comision").html(compraDolar - (compraDolar*(comision/100)));
            $("#dolar_venta_menos_comision").html(ventaDolar + (ventaDolar*(comision/100)));
            $("#euro_compra_menos_comision").html(compraEuro - (compraEuro*(comision/100)));
            $("#euro_venta_menos_comision").html(ventaEuro + (ventaEuro*(comision/100)));
        }
    </script>
@endpush
