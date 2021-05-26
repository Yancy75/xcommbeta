@extends('layouts.appusuario')
@section('style')
    <link href="{{ asset('css/gijgo.min.css') }}" rel="stylesheet">
@endsection
@extends('layouts.componente.piebase')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reporte Comisión</div>

                    <div class="card-body">
                        <form class="form-inline" method="post" action=" {{ route('verReporteComision') }} ">
                            @csrf
                            <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" name="id_banco" required>
                                    <option> Seleccione una entidad </option>
                                    @foreach($info as $in)
                                    <option value="{{$in->id}}"> {{ $in->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto my-1">
                                <label for="fecha_inicio">Desde:</label>
                            </div>

                            <div class="col-auto my-1">
                                <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" required autocomplete="off">
                            </div>

                            <div class="col-auto my-1">
                                <label for="fecha_final">Hasta:</label>
                            </div>

                            <div class="col-auto my-1">
                                <input type="text" class="form-control" id="fecha_final" name="fecha_final" required autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script>
        $( function() {
            $('#fecha_inicio').datepicker();
            $('#fecha_final').datepicker();
        });
    </script>
@endpush
