@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    @include('xcomm.modals.add_cliente_xcomm')
    @include('xcomm.modals.modify_cliente_xcomm')
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fab fa-black-tie"></i> Administracion Clientes </h3>
                <div class="card-tools">
                  <button type="button" class="btn boton btn-primary" data-toggle="modal" data-target="#addClienteBancoModal"><i class="far fa-save"></i> Agregar Cliente</button>
                  <button type="button" id="botonModificarClienteBanco" class="btn btn-primary ocultar" data-toggle="modal" data-target="#modifyClienteBancoModal">Modificar Usuario</button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                      <table id="tableEntidadBanco" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                                <th>Transacciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($clientes))
                                @foreach($clientes as $cliente)
                                    @php($ruta = route('modifyClienteXcomm', ['id' => $cliente->id]))
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->cedula}}</td>
                                        <td>{{$cliente->nombre}}</td>
                                        <td>{{$cliente->phone}}</td>
                                        <td>{{$cliente->email}}</td>
                                        <td>{{$cliente->status}}</td>
                                        <td><button type="button" class="btn boton btn-primary" onclick="callModalModificarXommCliente('{{$cliente->id}}', '{{$cliente->cedula}}', '{{$cliente->nombre}}', '{{$cliente->phone}}', '{{$cliente->email}}', '{{$cliente->status}}', '{{$ruta}}');"><i class="fas fa-file-signature"></i> Modificar</button></td>
                                        <td><a href="{{ route('verTransaccionesClientes' , ['id_cliente' => $cliente->id]) }}" class="btn boton btn-primary" style="min-width: 109px;" ><i class="fa fa-eye"></i> Ver</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                                <th>Transacciones</th>
                            </tr>
                            </tfoot>
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
<script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#tableEntidadBanco').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
            $('[data-mask]').inputmask();
        });
    </script>
    <script src="{{asset('js/xcomm_clientes.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
@endpush
