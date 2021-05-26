@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
.modal{height: 100vh !important;}
 .bota{
   display: flex;
   justify-content: flex-start;
   margin-bottom: 2em;}
 .bota > a { padding: 10px; }
 .bota > a > i {font-size: 25px;}

</style>
    <div class="row justify-content-center animated zoomIn delay-0.5s">
        <div class="col-md-11">
            <div class="bota">
                <a href="{{route('verTransaccionBanco')}}" class="btn boton btn-primary"><i class="far fa-folder-open"></i> Transacciones Abiertas</a>
                <a href="{{ route("verTransaccionBancoCerradas") }}" class="btn boton btn-success"><i class="far fa-check-circle"></i> Transacciones Cerradas</a>
                <a href="{{ route("verTransaccionBancoCanceladas") }}" class="btn boton btn-danger"><i class="far fa-window-close"></i> Transacciones Canceladas</a>
            </div>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-money-bill"></i> {{ $title }} </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                </div>
              </div>
                <div class="card-body" style="overflow-x: auto;">
                    <table id="transaccion" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Moneda</th>
                            <th>Tasa de cambio</th>
                            <th>Cantidad</th>
                            <th>Monto al cambio</th>
                            <th>Tipo transaccion</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                            <th>Historico</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($info as $inf)
                            <tr>
                                <td>{{$inf->nombre}}</td>
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
                                <td>{{number_format($inf->valor_dolar,2)}}</td>
                                <td>{{number_format($inf->cantidad,2)}}</td>
                                <td>
                                    @php
                                        if($inf->tipo_transaccion == 'venta_dolar' || $inf->tipo_transaccion == 'venta_euro')
                                        {
                                            echo number_format($inf->valor_dolar * $inf->cantidad,2);
                                        }
                                        if($inf->tipo_transaccion == 'compra_dolar' || $inf->tipo_transaccion == 'compra_euro')
                                        {
                                            echo number_format($inf->valor_dolar * $inf->cantidad,2);
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
                                <td>
                                    @if($title == 'Transacciones Abiertas')
                                        {!! $inf->function !!}
                                    @elseif($title == 'Transacciones Cerradas')
                                        Completadas
                                    @elseif($title == 'Transacciones Canceladas')
                                        Canceladas
                                    @endif
                                </td>
                                <td><a href="{{ route("verHistoricoBanco", ["id_transaccion" => $inf->id_transaccion]) }}" class="btn boton btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

       </div>

    </div>
  @include('bancos.modal.control_transacciones')
@endsection

@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/transaccion_banco.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
<script>
$(document).ready(function() {$('#transaccion').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
      $('[data-mask]').inputmask();
});
</script>
@endpush
