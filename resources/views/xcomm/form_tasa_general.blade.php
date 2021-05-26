@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
          <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="far fa-money-bill-alt" style="padding-right: 0.2em;"></i>Cargar de Tasas General</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                  </div>
                    <div class="card-body">
                        <input type="hidden" value="{{route('xcommAddTasaGeneral')}}" id="ruta_agregar_tasas_bancos"/>
                        <form id="form_tasa_general" class="form-horizontal">
                            @php
                                $count = count($info);
                                $control = 0; // Esta variable se usa para crear los id de los input individuales. aumentando de valor cada ves que se procesa el foreach
                            @endphp
                            <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaControl" value="{{$count == 0 ? '1' : $count}}">
                             @if($count > 0)
                                @foreach ($info as $i)
                                @php($control++)
                              <div class="card">
                                <div class="card-header" style="padding-top: 0px; padding-bottom: 0px;">
                                    <h3 class="card-title titulo2"><i class="fas fa-university" style="padding-right: 0.2em;"></i>{{$i['banco']}}</h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                  </div>
                                </div>
                                <div class="card-body" style="background: white; border-radius: 10px;">
                                <div class="form-group row">
                                    <label for="idEntidadBancaria_{{ $control }}" class="col-sm-2 col-form-label">Entidad Bancaria</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaValueId_{{ $control }}" value="{{$i['id']}}">
                                        <input type="text" class="form-control input_masivo" id="idEntidadBancaria_{{ $control }}" value="{{$i['banco']}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraDolar_{{ $control }}" class="col-sm-2 col-form-label">Compra Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraDolar_{{ $control }}" value="{{$i['compra_dolar']}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaDolar_{{ $control }}" class="col-sm-2 col-form-label">Venta Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaDolar_{{ $control }}" value="{{$i['venta_dolar']}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraEuro_{{ $control }}" class="col-sm-2 col-form-label">Compra Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraEuro_{{ $control }}" value="{{$i['compra_euro']}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaEuro_{{ $control }}" class="col-sm-2 col-form-label">Venta Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaEuro_{{ $control }}" value="{{$i['venta_euro']}}" />
                                    </div>
                                </div>
                                <hr/>
                                    <div class="row">
                                        <div class="col-md-6 offset-md-11">
                                            <input type="hidden" id="id_eliminar_tasa_{{ $control }}" value="{{ route("eliminarTasaGeneral", ['id' => $i['id']]) }}"/>
                                            <button type="button" class="btn boton btn-danger btn-sm" onclick="eliminarTasaGenerales({{ $control }}, '{{$i['banco']}}');"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                               </div>
                              </div>
                                @endforeach
                            @else
                             <div class="card">
                               <div class="card-header" style="padding-top: 0px; padding-bottom: 0px;">
                                 <div class="card-tools">
                                   <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                 </div>
                               </div>
                                 <div class="card-body"  style="background: white; border-radius: 10px;">
                                <div class="form-group row">
                                    <label for="idEntidadBancaria_1" class="col-sm-2 col-form-label">Entidad Bancaria</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaValueId_1" value="0">
                                        <input type="text" class="form-control input_masivo" id="idEntidadBancaria_1" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraDolar_1" class="col-sm-2 col-form-label">Compra Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraDolar_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaDolar_1" class="col-sm-2 col-form-label">Venta Dolar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaDolar_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idCompraEuro_1" class="col-sm-2 col-form-label">Compra Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idCompraEuro_1" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idVentaEuro_1" class="col-sm-2 col-form-label">Venta Euro</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control input_masivo" id="idVentaEuro_1" value="" />
                                    </div>
                                </div>
                                <hr/>
                              </div>
                              </div>
                            @endif
                        </form>
                        <div class="row">
                          <div class="col-md-6 offset-md-8">
                            <button class="btn boton btn-primary " onclick="guardarTasasGenerales();"><i class="far fa-save"></i> Guardar</button>
                            <button class="btn boton btn-secondary " onclick="generarInputAddTasaGeneral();"><i class="fas fa-plus-square"></i> Agregar</button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script src="{{asset('js/xcomm_tasa_general.js')}}"></script>
@endpush
