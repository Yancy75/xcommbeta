@extends('layouts.appusuario')
@section('style')
    <link href="{{ asset('css/gijgo.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Banners Carga</div>
                   <div class="card-body">
                  
                        <div class="alert alert-success" role="alert">
                           <p>aqui se trabajan los banners</p>
                        </div>

                        <form method="POST" action="#">
                        @csrf
                        <div class="input-group mb-3">
                            <label>nombre</label>
                            <input id="nombre" type="text" placeholder="{{ __('Nombre...') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="text" autofocus /></br>
                        </div>  
                        <div class="input-group mb-3">
                            <div class="custom-control custom-switch">
                                   <input type="checkbox" class="custom-control-input" id="suiche1" value="click">
                                   <label class="custom-control-label" for="suiche1">Por Cantidad de clicks</label>
                             </div>
                             <div class="custom-control custom-switch">
                                   <input type="checkbox" class="custom-control-input" id="suiche2" value="fecha">
                                   <label class="custom-control-label" for="suiche2">Por Tiempo</label>
                             </div>
                              
                                                   
                           
                          </div>  
                        <div class="input-group mb-3" id="click" style="display:none;">
                            <label>Cantidad de Click</label>
                            <input id="cantidad" type="number" class="form-control" name="cantidad" step="1" min="0"/></br>
                        </div>  
                        <div class="input-group mb-3" id="fecha" style="display:none;">
                            <input id="fecha_inicio" type="text"  class="form-control" name="fechainicio"  />
                            <input id="fecha_final" type="text"  class="form-control" name="fechainicio"   />
                        </div>
                        <div class="input-group mb-3">
                            <label>nombre</label>
                            <input id="nombre" type="text" placeholder="{{ __('Nombre...') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="text" autofocus /></br>
                        </div> 

                            <input type="file" />
                        </form>

              


                                  
                  </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script>
        $( function() {
            $('#fecha_inicio').datepicker({maxDate: function () {return $('#fecha_final').val();}});
            $('#fecha_final').datepicker({minDate: function () {return $('#fecha_inicio').val();}});
            
            $("input[type='checkbox']").change(function(){
                $("#"+$(this).val()).slideToggle(250);
              /*if( $(this).is(':checked') ){
                   $("#"+id).toggle();
                   alert(" ha sido seleccionado "+$(this).val());
                } else {
                   alert(" ha sido deseleccionado "+$(this).val());
                }*/
            });
        });
    </script>
@endpush