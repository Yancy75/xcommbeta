@extends('layouts.appusuario')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@section('content')
    @include('xcomm.modals.add_usuario_banco')
    @include('xcomm.modals.modify_usuario_banco')
    <div class="row justify-content-center animated fadeInUp delay-0.5s">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title titulo2"><i class="fas fa-university"></i> Administracion Entidad Bancaria {{isset($banco->name)?$banco->name:''}}</h3>
                  <input type="hidden" id="id_activar_dasctivar_banco" value="{{ route('activarDesactivarBanco', ['id' => $banco->id]) }}">
                  @if($banco['status'] == 'active')
                    <button type="button" class="btn btn-danger boton" onclick="activar_desactivar_banco('{{ $banco->name }}', '{{ $banco->status }}');">Inactive</button>
                  @elseif($banco['status'] == 'inactive')
                    <button type="button" class="btn btn-success boton" onclick="activar_desactivar_banco('{{ $banco->name }}', '{{ $banco->status }}');">Active</button>
                  @endif
                <div class="card-tools">
                  <button type="button" class="btn boton btn-primary" data-toggle="modal" data-target="#addUsuarioBancoModal"><i class="far fa-save"></i>Agregar Usuario</button>
                  <button type="button" id="botonModificarUsuarioBanco" class="btn boton btn-primary ocultar" data-toggle="modal" data-target="#modifyUsuarioBancoModal">Modificar Usuario</button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                </div>
              </div>
              <div class="card-body">
                      <table id="tableEntidadBanco" class="table table-bordered table-hover table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Entidad Bancaria</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($usuarios))
                                @foreach($usuarios as $usuario)
                                    @php($ruta = route('modifyUsuarioBanco', ['id' => $usuario->id]))
                                    <tr>
                                        <td>{{$usuario->id}}</td>
                                        <td>{{$banco->name}}</td>
                                        <td>{{$usuario->nombre}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->level}}</td>
                                        <td>{{$usuario->status}}</td>
                                        <td><button type="button" class="btn boton btn-primary" onclick="callModalModificarUsuarioBanco('{{$usuario->id}}', '{{$usuario->nombre}}', '{{$usuario->email}}', '{{$usuario->level}}', '{{$usuario->status}}', '{{$ruta}}');"><i class="fas fa-file-signature"></i> Modificar</button></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Entidad Bancaria</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Estatus</th>
                                <th>Modificar</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
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
    <script src="{{asset('js/usuario_banco.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/entidad_bancaria.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#tableEntidadBanco').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
        });
    </script>
@endpush
