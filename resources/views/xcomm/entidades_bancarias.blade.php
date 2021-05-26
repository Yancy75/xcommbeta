@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
        <div class="row justify-content-center animated fadeInUp delay-0.5s">
            <div class="col-md-10">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-university"></i> Entidades Bancarias</h3>
                    <div class="card-tools">
                      <a class="btn boton btn-primary" href="{{ route('xcommAddEntidadesBancarias') }}"><i class="far fa-save"></i> Agregar entidades bancarias</a>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                    </div>
                  </div>
                    <div class="card-body"  style="overflow-x: auto;">
                          <table id="list_table_entidades_financiaras" class="table table-bordered table-hover table-striped" style="width:100%">
                                  <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th >Nombre</th>
                                        <th >Estatus</th>
                                        <th>Administrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($info->isNotEmpty())
                                  <?php $ban=0; ?>
                                    @foreach($info as $inf)
                                       <tr>
                                            <td>{{ $inf["code"] }}</td>
                                            <td>{{ $inf["name"] }}</td>
                                            <td>{{ $inf["status"] }}</td>
                                            <td><a class="btn boton btn-primary" href="{{ route('xcommAdministaraEntidadesBancarias', ['id' => $inf["id"]]) }}"><i class="fa fa-fw fa-edit"></i> Administrar</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th>Codigo</th>
                                      <th >Nombre</th>
                                      <th >Estatus</th>
                                      <th>Administrar</th>
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
<script>
    $(document).ready(function(){
        $('#list_table_entidades_financiaras').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
    });
</script>
@endpush
