@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
    <div class="row animated zoomIn delay-0.5s">
        <div class="col-md-4 offset-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title titulo2"><i class="fa fa-bank" style="padding-right: 0.2em;"></i>nuevas entidades bancarias</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>-->
                  </div>
                </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('xcommAddingEntidadesBancarias') }}">
                            @csrf
                            <div class="form-group row">
                              <label for="code" class="control-label col-md-2 col-sm-2">Codigo</label>
                                <div class="col-md-10 col-sm-10">
                                  <div class="input-group">
                              <input type="text" class="form-control" name="code" id="code" placeholder="Codigo...">
                              <div class="input-group-append">
                                 <div class="input-group-text"><span class="fas fa-code-branch"></span></div>
                               </div>
                               </div>
                            </div>
                            </div>
                            <div class="form-group row">
                              <label for="name" class="control-label col-md-2 col-sm-2">Nombre</label>
                                <div class="col-md-10 col-sm-10">
                                  <div class="input-group">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre...">
                              <div class="input-group-append">
                                 <div class="input-group-text"><span class="fas fa-university"></span></div>
                               </div>
                               </div>
                            </div>
                            </div>
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary boton btd"><i class="fa fa-bank" style="padding-right: 0.2em;"></i> Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>

@endsection
