@extends('layouts.appusuario')
@extends('layouts.componente.piebase')
@section('content')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}">
<style>
.ficha{
    background: white;
    padding: 5px;
    border-radius: 5px;
    box-shadow: 1px 3px 6px rgb(0 0 0 / 0.5);
}
.ta{
  color: #6c757d;
  background: white;
  margin-bottom: 5px;
  border: 1px solid black;
  box-shadow: 0px 2px 6px rgb(0 0 0 / 0.5);
  transition: 0.5s all;
}
.parame{
  padding-bottom: 1.5em;
  border-bottom: 1px solid;
  margin-bottom: 1em;
}
.dt-button{
    border-radius: 4px;
    padding-left: 1em;
    padding-right: 1em;
    border: 1px solid rgb(0 0 0 / 0.5);
    background-image: linear-gradient(white, rgb(128 128 128 / 0.4));
}
.boton{margin-bottom: 10px;}
.info-box-number{color: white;}
.input-group-text{
    background: #f4f6f9;
    border-bottom: 1px solid;
    border-right: 0px solid;
    border-top: 0px solid;
    border-radius: 0px;
}
.pica{width: auto;  padding-top: 0px; padding-bottom: 0px; box-shadow: 1px 2px 6px black; cursor:pointer}
.pica:hover{box-shadow: none;}
.rec1{ margin-bottom: 0px;}
.rec2{color: black; padding: 0px !important; text-align: right;}
</style>
     <div class="row justify-content-center animated fadeInUp delay-0.5s">
           <div class="col-md-11">
              <div class="row">
 <div class="col-xs-12	col-sm-2">
   <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <a class="nav-link ta active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reporte de Comisiones</a>
{{--     <a class="nav-link ta" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Futuro Reporte</a>--}}
{{--     <a class="nav-link ta" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Futuro Reporte</a>--}}
{{--     <a class="nav-link ta" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Futuro Reporte</a>--}}
   </div>
 </div>
 <div class="col-xs-12	col-sm-10 ficha">
   <div class="tab-content" id="v-pills-tabContent">
     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

<div class="row" id="maestro" alt="maestro">
  <input type="text" id="nombrebanco" style="display:none;" >
       <div class="row" id="bancos" style="justify-content: center;">
          <div id="b0" class="bony veo info-box" alt="Banco de Leon">
               <span class="info-box-icon bg-info1 elevation-1"><i class="fa fa-university"></i></span>
                <div class="info-box-content">
                 <span class="info-box-text"><h3 class="h31"> {{ $bank['code'] }}</h3></span>
                 <span class="info-box-number"> {{ $bank['name'] }} </span>
               </div>
          </div>
{{--          <div id="b1" class="bony veo info-box" alt="Banco Popular">--}}
{{--             <span class="info-box-icon bg-info1 elevation-1"><i class="fa fa-university"></i></span>--}}
{{--             <div class="info-box-content">--}}
{{--              <span class="info-box-text"><h3 class="h31"> Popular</h3></span>--}}
{{--               <span class="info-box-number"> Banco Popular </span>--}}
{{--             </div>--}}
{{--          </div>--}}
{{--          <div id="b2" class="bony veo info-box" alt="Banco Santa Cruz">--}}
{{--            <span class="info-box-icon bg-info1 elevation-1"><i class="fa fa-university"></i></span>--}}
{{--              <div class="info-box-content">--}}
{{--               <span class="info-box-text"><h3 class="h31"> Santa Cruz</h3></span>--}}
{{--               <span class="info-box-number"> Banco Santa Cruz </span>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div id="b3" class="bony veo info-box" alt="Scotia Bank">--}}
{{--            <span class="info-box-icon bg-info1 elevation-1"><i class="fa fa-university"></i></span>--}}
{{--                  <div class="info-box-content">--}}
{{--                    <span class="info-box-text"><h3 class="h31"> Scotia Bank</h3></span>--}}
{{--                     <span class="info-box-number"> Scotia Bank </span>--}}
{{--                    </div>--}}
{{--          </div>--}}
{{--          <div id="b4" class="bony veo info-box" alt="BOA">--}}
{{--            <span class="info-box-icon bg-info1 elevation-1"><i class="fa fa-university"></i></span>--}}
{{--                  <div class="info-box-content">--}}
{{--                    <span class="info-box-text"><h3 class="h31"> BOA</h3></span>--}}
{{--                    <span class="info-box-number"> BOA </span>--}}
{{--                  </div>--}}
{{--          </div>--}}
       </div>
    <div  id="pdfbo" class="info-box mb-3 bg-success pica">
        <span class="info-box-icon" style="width: 45px; text-shadow: 1px 2px 3px black;"><i class="fas fa-file-pdf"></i></span>
        <div class="info-box-content">
            <span class="info-box-text"><h3 class="h31"> Descargar </h3></span>
        </div>
    </div>
</div>

      <br />
{{--<div id="bloquedato1" style="display:none;">--}}
<div id="bloquedato1">
  <div  class="crotaneo">
   <div class="form-group row rec1">
          <label for="totaldolarcompra" class="control-label col-md-4 col-sm-4 rec1">Total transacciones dólar compra</label>
       <div class="col-md-4 col-sm-4">
           <div class="input-group">
               <input type="text" class="form-control paca rec2" name="dolarcompra" id="totaldolarcompra" value="{{ $totales[$bank['name']]['total_compra_dolar'] }}" disabled>
               <div class="input-group-append">
                   <div class="input-group-text rec2"><span class="fa fa-usd"></span></div>
               </div>
           </div>
       </div>
   </div>
      <div class="form-group row rec1">
           <label for="totaldolarventa" class="control-label col-md-4 col-sm-4 rec1">Total transacciones dólar venta</label>
                 <div class="col-md-4 col-sm-4">
                     <div class="input-group">
                         <input type="text" class="form-control paca rec2" name="dolarventa" id="totaldolarventa" value="{{ $totales[$bank['name']]['total_venta_dolar'] }}" disabled>
                         <div class="input-group-append">
                              <div class="input-group-text rec2"><span class="fa fa-usd"></span></div>
                              </div>
                              </div>
                         </div>
                  </div>
      <div class="form-group row rec1">
            <label for="totaleurocompra" class="control-label col-md-4 col-sm-4 rec1">Total transacciones euro compra</label>
                  <div class="col-md-4 col-sm-4">
                      <div class="input-group">
                          <input type="text" class="form-control paca rec2 " name="eurocompra" id="totaleurocompra" value="{{ $totales[$bank['name']]['total_compra_euro'] }}" disabled>
                          <div class="input-group-append">
                               <div class="input-group-text rec2"><span class="fa fa-eur"></span></div>
                               </div>
                               </div>
                          </div>
                    </div>
     <div class="form-group row rec1">
           <label for="totaleuroventa" class="control-label col-md-4 col-sm-4 rec1">Total transacciones euro venta</label>
                     <div class="col-md-4 col-sm-4">
                       <div class="input-group">
                           <input type="text" class="form-control paca rec2" name="euroventa" id="totaleuroventa" value="{{ $totales[$bank['name']]['total_venta_euro'] }}" disabled>
                           <div class="input-group-append ">
                            <div class="input-group-text rec2"><span class="fa fa-eur"></span></div>
                            </div>
                            </div>
                         </div>
               </div>
    <div class="form-group row rec1">
        <label for="comision" class="control-label col-md-4 col-sm-4 rec1">Comision Dolar</label>
        <div class="col-md-4 col-sm-4">
            <div class="input-group">
                <input type="text" class="form-control paca rec2" name="comision" id="comision" value="{{ $comision[0]['comision'] }}">
                    <div class="input-group-append">
                       <div class="input-group-text rec2"><span class="fas fa-percentage"></span></div>
                    </div>
            </div>
        </div>
    </div>
      <div class="form-group row rec1">
          <label for="comision" class="control-label col-md-4 col-sm-4 rec1">Comision Euro</label>
          <div class="col-md-4 col-sm-4">
              <div class="input-group">
                  <input type="text" class="form-control paca rec2" name="comision" id="comision" value="{{ $comision[0]['comision_euro'] }}">
                  <div class="input-group-append">
                      <div class="input-group-text rec2"><span class="fas fa-percentage"></span></div>
                  </div>
              </div>
          </div>
      </div>
    <div class="form-group row rec1">
        <label for="totalcomision" class="control-label col-md-4 col-sm-4 rec1">Total a pagar de comision Dolar</label>
        <div class="col-md-4 col-sm-4">
            <div class="input-group">
                <input type="text" class="form-control paca rec2" name="totalcomision" id="totalcomision" value="{{ $total_dolar_comision }}" disabled>
                <div class="input-group-append">
                    <div class="input-group-text rec2"><span class="fa fa-money"></span></div>
                </div>
            </div>
        </div>
    </div>

      <div class="form-group row rec1">
          <label for="totalcomisione" class="control-label col-md-4 col-sm-4 rec1">Total a pagar de comision Euro</label>
          <div class="col-md-4 col-sm-4">
              <div class="input-group">
                  <input type="text" class="form-control paca rec2" name="totalcomisione" id="totalcomisione" value="{{ $total_euro_comision }}" disabled>
                  <div class="input-group-append">
                      <div class="input-group-text rec2"><span class="fa fa-money"></span></div>
                  </div>
              </div>
          </div>
      </div>

    </div><!-- fin de crotaneo -->
</div>
{{--         <div class="row" id="bloquedato2" style="display:none;">--}}
         <div class="row" id="bloquedato2">
            <div class="form-group" style="display:none;"><buttom class="btn boton btn-success" id="completadas" style="max-width: 200px;"><i class="fa fa-search"></i> Transacciones Completadas</buttom></div>
            <div class="form-group" style="display:none;"><buttom class="btn boton btn-danger" id="canceladas" style="max-width: 200px;"><i class="fa fa-search"></i> Transacciones Canceladas</buttom></div>

            <!-- <div class="form-group"><buttom class="btn boton btn-success" id="descargar" style="max-width: 200px"><i class="fas fa-file-pdf"></i> Descargar </buttom></div>-->

        </div>



{{--<div id="completa1" style="display:none;">--}}
<div id="completa1">
       <div class="card-header">
         <h3 class="card-title titulo2"><i class="fas fa-university"></i>  Lista de Transacciones Completadas</h3>
         <div class="card-tools">
             <buttom class="btn boton btn-primary" id="parametro" style="display: none;"><i class="fa fa-search"></i> Parametros</buttom>
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
         </div>
       </div>
         <div class="card-body" id="comple"  style="overflow-x: auto;">
           <div id="parametror" class="row parame" style="display:none;">
             <div class="form-group row col-md-4">
               <label for="startDate" class="control-label col-md-2 col-sm-2">Inicio:</label>
               <div class="col-md-10 col-sm-10"><div class="input-group"><input id="startDate" class="dato1"  /></div></div>
             </div>
             <div class="form-group row col-md-4">
              <label for="endDate" class="control-label col-md-2 col-sm-2">Final:</label>
              <div class="col-md-10 col-sm-10"><div class="input-group"><input id="endDate"  class="dato1" /></div></div>
            </div>
             </div>
           </div>
 <table id="comple" class="table table-bordered table-hover table-striped display" style="width:100%;">
   <thead>
       <tr>
           <th>Name</th>
           <th>Transaccion</th>
           <th>Cantidad</th>
           <th>Fecha</th>
       </tr>
   </thead>
   <tbody>

       @foreach($completado as $comp)
           <tr>
               <td>{{ $comp['nombre'] }}</td>
               <td>{{ $comp['tipo_transaccion'] }}</td>
               <td>{{ $comp['cantidad'] }}</td>
               <td>{{ $comp['fecha_last_transaccion'] }}</td>
           </tr>
       @endforeach

   </tbody>
   <tfoot>
       <tr>
           <th>Name</th>
           <th>Transaccion</th>
           <th>Cantidad</th>
           <th>Fecha</th>
       </tr>
   </tfoot>
</table>
</div>
</div>
<br />
{{--<div id="completa2" style="display:none;">--}}
<div id="completa2">
<div class="card-header">
  <h3 class="card-title titulo2"><i class="fas fa-university"></i> Lista de Transacciones Canceladas</h3>
  <div class="card-tools">
      <buttom class="btn boton btn-primary" id="parametro2" style="display: none;"><i class="fa fa-search"></i> Parametros</buttom>
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
</div>
   <div class="card-body"  style="overflow-x: auto;">
     <div id="parametror2" class="row parame" style="display:none;">
       <div class="form-group row col-md-4">
         <label for="startDate" class="control-label col-md-2 col-sm-2">Inicio:</label>
         <div class="col-md-10 col-sm-10"><div class="input-group"> <input id="startDate2" class="dato2" /></div></div>
       </div>
      <div class="form-group row col-md-4">
        <label for="endDate" class="control-label col-md-2 col-sm-2">Final:</label>
        <div class="col-md-10 col-sm-10"><div class="input-group"><input id="endDate2"  class="dato2"/></div></div>
      </div>
     </div>
<table id="cance"  class="table table-bordered table-hover table-striped display" style="width:100%;">
    <thead>
    <tr>
        <th>Name</th>
        <th>Transaccion</th>
        <th>Cantidad</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>

    @foreach($cancelado as $comp)
        <tr>
            <td>{{ $comp['nombre'] }}</td>
            <td>{{ $comp['tipo_transaccion'] }}</td>
            <td>{{ $comp['cantidad'] }}</td>
            <td>{{ $comp['fecha_last_transaccion'] }}</td>
        </tr>
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Transaccion</th>
        <th>Cantidad</th>
        <th>Fecha</th>
    </tr>
    </tfoot>
</table>
</div>
</div>
</div>

     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
     <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
     <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
   </div>
 </div><!-- ginal de ficha -->
</div>

          </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/gijgo.min.js')}}"></script>
 <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" type="text/javascript"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
      // $('table.display').DataTable();
      $('table.display').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"}});
      $("#parametro").click(function(){$("#parametror").toggle(500);$('.dato1').val("");});
      $("#parametro2").click(function(){$("#parametror2").toggle(500);  $('.dato2').val("");});
      $('#startDate').datepicker({uiLibrary: 'bootstrap4', locale: 'es-es', format: 'dd-mm-yyyy', maxDate: function () { return $('#endDate').val(); }});
      $('#endDate').datepicker({uiLibrary: 'bootstrap4', locale: 'es-es', format: 'dd-mm-yyyy', minDate: function () { return $('#startDate').val(); }});
      $('#startDate2').datepicker({uiLibrary: 'bootstrap4', locale: 'es-es', format: 'dd-mm-yyyy', maxDate: function () { return $('#endDate2').val(); }});
      $('#endDate2').datepicker({uiLibrary: 'bootstrap4', locale: 'es-es', format: 'dd-mm-yyyy', minDate: function () { return $('#startDate2').val(); }});
     /*seccion de botones*/
   $("#completadas").click(function(){$(this).toggleClass("active");$("#completa1").slideToggle( "slow");});
   $("#canceladas").click(function(){$(this).toggleClass("active");$("#completa2").slideToggle( "slow");});
     /*fin de seccion de botones*/
     $(".bony").click(function(){
           $("#nombrebanco").val($(this).attr("alt"));
           if($(this).hasClass("veo")){$(this).removeClass("veo"); $(".veo").each(function(){$(this).toggle(500);});
           }else{$(".veo").each(function(){$(this).toggle(500);}); $(this).addClass("veo");}
           $("#bloquedato1, #bloquedato2").toggle(500); if($("#completa1").is(':visible')){$("#completadas").click();}
           if($("#completa2").is(":visible")){$("#canceladas").click();}
         });

      $("#pdfbo").click(function(){
        var f = new Date(); var compleja= new Array(); var cuerpo = new Array(); compleja[0] = $("#nombrebanco").val(); compleja[1]=$("#comple tfoot tr").html(); compleja[2]=$("#cance tfoot tr").html();
        compleja[5]=[$("#totaldolarcompra").val(), $("#totaldolarventa").val(), $("#totaleurocompra").val(), $("#totaleuroventa").val(), $("#comision").val(), $("#totalcomision").val()];
      if($("#completa1").is(":visible")){
            $("#comple tbody tr").each(function(){cuerpo.push($(this).html());});
             compleja[3]=cuerpo;
           }else{compleja[3]='<td colspan="10">No Disponible</td>';}
      if($("#completa2").is(":visible")){
            cuerpo = [];
            $("#cance tbody tr").each(function(){cuerpo.push($(this).html());});
             compleja[4]=cuerpo;
           }else{compleja[4]='<td colspan="10">No Disponible</td>';}
        var dato=JSON.stringify(compleja);
     $.ajax({type: 'POST', url: 'pdf/reporte_basico.php',
               xhrFields: {responseType: 'blob'},
               data: {ajax: true, variable1: dato, variable2:$("#nombrebanco").val(),},
     success: function (json) {
         var a = document.createElement('a'); var url = window.URL.createObjectURL(json);
         a.href = url; a.download = $("#nombrebanco").val()+": "+f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
         a.click(); window.URL.revokeObjectURL(url);},error: function(){console.log("Error");}});
      });/* fin de enviar */
    });/*fin de documento ready*/


    </script>
@endpush
