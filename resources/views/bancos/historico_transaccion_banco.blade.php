@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('style')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-university"></i> Historico Transaccion</h3>
                    {{--                    <a class="btn btn-dark by float-right" href=""><i class="fa fa-undo"></i> Volver</a>--}}
                    <div class="clear"></div>
                </div>

                <div class="card-body" style="overflow-x: auto;">
                    @if(!empty($info))
                        <div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="{{ $info['0']['nombre'] }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Cedula: {{ $info['0']['cedula'] }}" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono: {{ $info['0']['phone'] }}" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="{{ $info['0']['email'] }}" disabled>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="{{ $info['0']['nombre_banco'] }}" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Precio de la divisa {{ number_format($info['0']['valor_dolar'],2) }}" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Cantidad adquirida {{ number_format($info['0']['cantidad'],2) }}" disabled>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $info['0']['tipo_transaccion'])) }}" disabled>
                                </div>
                            </div>
                            <hr/>

                            <h4>Como va a pagar el cliente</h4>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Forma de pago: {{ ucfirst($detalle_pagar_cliente['tipo_pago']) }}" disabled>
                                </div>
                                @if($detalle_pagar_cliente['tipo_pago'] == 'efectivo')
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_pagar_cliente['comentario_efectivo'] }}</textarea>
                                    </div>
                                @elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque')
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_pagar_cliente['numero_cheque'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_pagar_cliente['nombre_cheque'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: {{ $detalle_pagar_cliente['rnc'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: {{ $detalle_pagar_cliente['nombre_banco'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_pagar_cliente['comentario_cheque'] }}</textarea>
                                    </div>
                                @elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque')
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_pagar_cliente['numero_cuenta'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_pagar_cliente['nombre_transferencia'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: {{ $detalle_pagar_cliente['rnc'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: {{ $detalle_pagar_cliente['nombre_banco'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_pagar_cliente['comentario_transferencia'] }}</textarea>
                                    </div>
                                @endif
                            </div>
                            <hr/>

                            <h4>Como va a recibir el pago el cliente</h4>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Forma de pago: {{ ucfirst($detalle_recibir_pago_cliente['tipo_pago']) }}" disabled>
                                </div>
                                @if($detalle_recibir_pago_cliente['tipo_pago'] == 'efectivo')
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_recibir_pago_cliente['comentario_efectivo'] }}</textarea>
                                    </div>
                                @elseif($detalle_recibir_pago_cliente['tipo_pago'] == 'cheque')
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_recibir_pago_cliente['numero_cheque'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_recibir_pago_cliente['nombre_cheque'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: {{ $detalle_recibir_pago_cliente['rnc'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: {{ $detalle_recibir_pago_cliente['nombre_banco'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_recibir_pago_cliente['comentario_cheque'] }}</textarea>
                                    </div>
                                @elseif($detalle_pagar_cliente['tipo_pago'] == 'cheque')
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_recibir_pago_cliente['numero_cuenta'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="{{ $detalle_recibir_pago_cliente['nombre_transferencia'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="RNC/Cedula: {{ $detalle_recibir_pago_cliente['rnc'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Banco: {{ $detalle_recibir_pago_cliente['nombre_banco'] }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Comentario:</label>
                                        <textarea cols="50" disabled>{{ $detalle_recibir_pago_cliente['comentario_transferencia'] }}</textarea>
                                    </div>
                                @endif
                            </div>
                            <hr/>

                            @if(!empty($cancelado_info))
                                <h4>Razones Cancelado</h4>
                                <div class="row">
                                    <div class="col">
                                        <textarea cols="100" disabled>{{ $cancelado_info['info'] }}</textarea>
                                    </div>
                                </div>
                                <hr/>
                            @endif

                            <table id="list_table_historico" class="table table-bordered table-hover table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="ocultar">id_historico</th>
                                    <th>Usuario</th>
                                    <th >Accion</th>
                                    <th >Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($info))
                                    @foreach($info as $inf)
                                        <tr>
                                            <td class="ocultar">{{ $inf["idht"] }}</td>
                                            <td>
                                                @if(empty($inf["usuario_banco"]))
                                                    Cliente
                                                @else
                                                    {{ $inf["usuario_banco"] }}</td>
                                            @endif
                                            <td>{{ $inf["accion"] }}</td>
                                            <td>{{ $inf["hist_date"] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="ocultar">id_historico</th>
                                    <th>Usuario</th>
                                    <th >Accion</th>
                                    <th >Fecha</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div>NO hay datos</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#list_table_historico').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
        });
    </script>
@endpush
