@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
<style>
 .centrado{ margin-bottom: 2em;}
</style>

    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <style>
        .modal{height: 100vh !important;}
    </style>
    <div class="row justify-content-center animated zoomIn delay-0.5s">
        <div class="col-md-11">
            <div class="centrado">
                <a href="{{ route('agregarCambioDivisaBanco', ["id" => \Auth::user()->entidadbancarias_id]) }}" class="btn boton btn-primary"><i class="far fa-save"></i> Agregar Divisas</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-money-bill"></i> Cambios de Divisas </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                </div>
                <div class="card-body" style="overflow-x: auto;">
                    <table id="transaccion" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Compra Dolar</th>
                            <th>Venta Dolar</th>
                            <th>Compra Euro</th>
                            <th>Venta Euro</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($info as $inf)
                            <tr>
                                <td>{{number_format($inf->dolar_compra,2)}}</td>
                                <td>{{number_format($inf->dolar_venta,2)}}</td>
                                <td>{{number_format($inf->euro_compra,2)}}</td>
                                <td>{{number_format($inf->euro_venta,2)}}</td>
                                <td>{{number_format($inf->rango_inicial,2)}}</td>
                                <td>{{number_format($inf->rango_final,2)}}</td>
                                <td><a href="{{ route('modificarCambioDivisaBanco', ["id_banco" => \Auth::user()->entidadbancarias_id, "id_divisa" => $inf->id]) }}" class="btn boton btn-primary"><i class="fa fa-cog"></i> Modificar</a></td>
                                <td><a href="" class="btn boton btn-danger"><i class="fa fa-eraser"></i> Eliminar</a></td>
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
