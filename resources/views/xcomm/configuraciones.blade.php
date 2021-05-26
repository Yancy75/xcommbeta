@extends('layouts.appusuario')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titulo2"><i class="fas fa-university"></i> Comision</h3>
                </div>

                <div class="card-body">

                    <form method="post" action="{{ route('addUpdateComision') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="id_comision" id="id_comision" value="
                            @if(!empty($info))
                                {{ $info[0]->id }}
                            @endif
                        " />
                        <div class="form-group row">
                            <label for="comision" class="control-label col-md-2 col-sm-2">Comision Dolar</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="comision" id="comision" placeholder="Comision..."
                                    @if(!empty($info))
                                        value="{{ $info[0]->comision }}"
                                        @endif
                                    />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-percentage"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comisione" class="control-label col-md-2 col-sm-2">Comision Euro</label>
                            <div class="col-md-10 col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="comisione" id="comisione" placeholder="Comision..."
                                           @if(!empty($info))
                                           value="{{ $info[0]->comision_euro }}"
                                        @endif
                                    />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-percentage"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary boton btd"><i class="fa fa-bank" style="padding-right: 0.2em;"></i> Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
