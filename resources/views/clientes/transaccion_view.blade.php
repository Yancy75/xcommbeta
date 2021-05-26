@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-money-bill"></i> Transacciones </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                </div>
              </div>
                <div class="card-body"  style="overflow-x: auto;">
                    @include('clientes.modals.acciones_transacciones')
                    <table id="transaccion"  class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Banco</th>
                                <th>Moneda</th>
                                <th>Tasa de cambio</th>
                                <th>Cantidad</th>
                                <th>Monto al cambio</th>
                                <th>Tipo transaccion</th>
                                <th>Fecha</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($info as $inf)
                            <tr>
                                <td>{{$inf->nombre_banco}}</td>
                                <td>
                                    @php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'compra_dolar')
                                        {
                                            echo 'Dolar';
                                        }
                                        else if($inf->tipo_transaccion == 'venta_euro' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo 'Euro';
                                        }
                                    @endphp
                                </td>
                                <td>{{$inf->valor_dolar}}</td>
                                <td>{{$inf->cantidad}}</td>
                                <td>
                                    @php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'venta_euro')
                                        {
                                            echo $inf->valor_dolar * $inf->cantidad;
                                        }
                                        else if($inf->tipo_transaccion == 'compra_dolar' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo $inf->valor_dolar * $inf->cantidad;
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'venta_euro')
                                        {
                                            echo 'Venta';
                                        }
                                        elseif($inf->tipo_transaccion == 'compra_dolar' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo "Compra";
                                        }
                                    @endphp
                                </td>
                                <td>{{$inf->fecha_last_transaccion}}</td>
                                <td>{!!$inf->funcion!!}</td>
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
    <script src="{{ asset('js/transaccion_cliente.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>
    $(document).ready(function() {$('#transaccion').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});});
    </script>
@endpush
