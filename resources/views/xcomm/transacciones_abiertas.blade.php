@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
 .bota{
   display: flex;
   justify-content: flex-start;
   margin-bottom: 2em;}
 .bota > a { padding: 10px; }
 .bota > a > i {font-size: 25px;}
</style>
@endsection
@section('content')

    <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="bota">
                <a href="{{ route('listadoTransaccionesAbiertas')}}" class="btn boton btn-primary"><i class="far fa-folder-open"></i> Transacciones Abiertas</a>
                <a href="{{ route("listadoTransaccionesCerradas") }}" class="btn boton btn-success"><i class="far fa-check-circle"></i> Transacciones Cerradas</a>
                <a href="{{ route("listadoTransaccionesCanceladas") }}" class="btn boton btn-danger"><i class="far fa-window-close"></i> Transacciones Canceladas</a>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-money-check-alt"></i> {{ $title }}</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>

                <div class="card-body" style="overflow-x: auto;">
                    @include('xcomm.modals.control_transacciones')
                    <table id="transacciones" class="table table-striped table-bordered" style="width: 100%; font-size: 0.9rem">
                        <thead class="thead-dark">
                        <tr style="font-size: larger;">
                            <th>Banco</th>
                            <th>Cliente</th>
                            <th>Moneda</th>
                            <th>Tasa de cambio</th>
                            <th>Cantidad</th>
                            <th>Monto al cambio</th>
                            <th>Tipo transaccion</th>
                            <th>Fecha</th>
                            <th>Documento</th>
                            <th>Accion</th>
                            <th>Historico</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($info as $in)
                            <tr>
                                <td>{{ $in->nombre_banco }}</td>
                                <td>{{ $in->nombre }}</td>
                                <td>
                                @php
                                        if($in->tipo_transaccion == 'venta_dolar' || $in->tipo_transaccion == 'compra_dolar')
                                        {
                                            echo 'Dolar';
                                        }
                                        elseif($in->tipo_transaccion == 'venta_euro' || $in->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Euro";
                                        }
                                @endphp
                                </td>
                                <td>{{ number_format($in->valor_dolar, 2) }}</td>
                                <td>{{ number_format($in->cantidad,2) }}</td>
                                <td>{{ number_format($in->cantidad*$in->valor_dolar,2) }}</td>
                                <td>
                                    @php
                                        if($in->tipo_transaccion == 'venta_dolar' || $in->tipo_transaccion == 'venta_euro')
                                        {
                                            echo 'Venta';
                                        }
                                        elseif($in->tipo_transaccion == 'compra_dolar' || $in->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Compra";
                                        }
                                    @endphp
                                </td>
                                <td>{{ $in->fecha_last_transaccion }}</td>
                                <td>
                                    @php
                                    if(!empty($in->transaccion_id))
                                    {
                                    @endphp
                                        <a href='{{route('openNewTabPdfFile', ['file_name' => $in->file_name])}}' target='_blank' > click me to pdf </a>
{{--                                        <a href='storage/test/{{ $in->file_name }}' target='_blank' > click me to pdf </a>--}}
                                    @php
                                    }
                                    @endphp
                                </td>
                                <td>
                                    @if($title == 'Transacciones Abiertas')
                                        <button type="button" class="btn btn-primary" onclick="openModalXcomm( '{{ $in->id_transaccion_good }}', '{{ $in->cliente_id }}', '{{ $in->entidadbancaria_id }}', '{{ $in->cambiodivisa_id }}', '{{ $in->nombre_banco }}', '{{ $in->rango_incial }}', '{{ $in->rango_final }}', '{{ $in->valor_dolar }}', '{{ $in->cantidad }}', '{{ $in->tipo_transaccion }}', '{{ $in->transaccion }}', '{{ $in->cedula }}', '{{ $in->nombre }}', '{{ $in->phone }}', '{{ $in->email }}', '{{ $in->id_transaccion_good }}', '{{ $in->fecha_last_transaccion }}')">
                                            Cancelar
                                        </button>
                                    @elseif($title == 'Transacciones Cerradas')
                                        Transacciones Completadas
                                    @elseif($title == 'Transacciones Canceladas')
                                        Transacciones Canceladas
                                    @endif
                                </td>
                                <td><a href="{{ route('verHistorico', ['id_transaccion' => $in->id_transaccion_good]) }}" class="btn boton btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <script src="{{ asset('js/transaccion_xcomm.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#transacciones').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
          });
    </script>
@endpush
