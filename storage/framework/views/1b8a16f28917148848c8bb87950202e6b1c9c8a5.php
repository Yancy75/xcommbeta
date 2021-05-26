<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/gijgo.min.css')); ?>">
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
.boton{
  margin-bottom: 10px;
}
</style>
     <div class="row justify-content-center animated fadeInUp delay-0.5s">
           <div class="col-md-11">
              <div class="row">

 <div class="col-2">
   <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <a class="nav-link ta active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Reporte de Comisiones</a>
     <a class="nav-link ta" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Futuro Reporte</a>
     <a class="nav-link ta" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Futuro Reporte</a>
     <a class="nav-link ta" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Futuro Reporte</a>
   </div>
 </div>
 <div class="col-10 ficha">
   <div class="tab-content" id="v-pills-tabContent">
     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

       <div class="row" id="bancos" style="justify-content: space-around;">
          <div id="b0" class="boni veo small-box bg-info" style="display: block;"><div class="inner"><h3><i class="fa fa-university"></i> BHD</h3><ul style="list-style: none;"><li>Venta Dolar: $51 </li><li>Compra Dolar: $50 </li><li>Venta Euro: $61 </li><li>Compra Euro: $60 </li></ul></div></div>
          <div id="b1" class="boni veo small-box bg-info" style="display: block;"><div class="inner"><h3><i class="fa fa-university"></i> Popular</h3><ul style="list-style: none;"><li>Venta Dolar: $51.5 </li><li>Compra Dolar: $50.5 </li><li>Venta Euro: $61.5 </li><li>Compra Euro: $60.5 </li></ul></div></div>
          <div id="b2" class="boni veo small-box bg-info" style="display: block;"><div class="inner"><h3><i class="fa fa-university"></i> Banco Santa Cruz</h3><ul style="list-style: none;"><li>Venta Dolar: $53 </li><li>Compra Dolar: $52 </li><li>Venta Euro: $66 </li><li>Compra Euro: $65 </li></ul></div></div>
          <div id="b3" class="boni veo small-box bg-info" style="display: block;"><div class="inner"><h3><i class="fa fa-university"></i> Scotia Bank</h3><ul style="list-style: none;"><li>Venta Dolar: $91 </li><li>Compra Dolar: $90 </li><li>Venta Euro: $94 </li><li>Compra Euro: $93 </li></ul></div></div>
          <div id="b4" class="boni veo small-box bg-info" style="display: block;"><div class="inner"><h3><i class="fa fa-university"></i> BOA</h3><ul style="list-style: none;"><li>Venta Dolar: $46 </li><li>Compra Dolar: $45 </li><li>Venta Euro: $68 </li><li>Compra Euro: $67 </li></ul></div></div>
       </div>

       <div class="row">

         <div class="form-group row col-md-4">
            <label for="entidadbancarias_id" class="control-label col-md-2 col-sm-2"> Bancos:</label>
                <div class="col-md-10 col-sm-10">
                               <div class="input-group">
                                <select id="entidadbancarias_id" name="entidadbancarias_id" class="custom-select">
                                     <option value="na">Seleccione una entidad financiera</option>
                                     <option value="1">BHD Leon</option>
                                     <option value="2">Banco Popular</option>
                                     <option value="3">Banco Santa Cruz</option>
                                     <option value="4">Scotia Bank</option>
                                     <option value="5">Asociacion Popular de Ahorros y Prestamos</option>
                                 </select>
                               </div>
                          </div>
         </div>

             <div class="form-group  col-md-4">
                <buttom class="btn boton btn-success" id="completadas"><i class="fa fa-search"></i> Transacciones Completadas</buttom>
            </div>

            <div class="form-group col-md-4">
               <buttom class="btn boton btn-danger" id="canceladas"><i class="fa fa-search"></i> Transacciones Canceladas</buttom>
            </div>

       </div>

       <div id="completa1">
       <div class="card-header">
         <h3 class="card-title titulo2"><i class="fas fa-university"></i>  Lista de Transacciones Completadas</h3>
         <div class="card-tools">
             <buttom class="btn boton btn-primary" id="parametro"><i class="fa fa-search"></i> Parametros</buttom>
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
         </div>
       </div>
         <div class="card-body"  style="overflow-x: auto;">
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

 <table id=""  class="table table-bordered table-hover table-striped display" style="width:100%">
   <thead>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td>Tiger Nixon</td>
           <td>System Architect</td>
           <td>Edinburgh</td>
           <td>61</td>
           <td>$320,800</td>
       </tr>
       <tr>
           <td>Cedric Kelly</td>
           <td>Senior Javascript Developer</td>
           <td>Edinburgh</td>
           <td>22</td>
           <td>$433,060</td>
       </tr>
       <tr>
           <td>Sonya Frost</td>
           <td>Software Engineer</td>
           <td>Edinburgh</td>
           <td>23</td>
           <td>$103,600</td>
       </tr>
       <tr>
           <td>Quinn Flynn</td>
           <td>Support Lead</td>
           <td>Edinburgh</td>
           <td>22</td>
           <td>$342,000</td>
       </tr>
       <tr>
           <td>Dai Rios</td>
           <td>Personnel Lead</td>
           <td>Edinburgh</td>
           <td>35</td>
           <td>$217,500</td>
       </tr>
       <tr>
           <td>Gavin Joyce</td>
           <td>Developer</td>
           <td>Edinburgh</td>
           <td>42</td>
           <td>$92,575</td>
       </tr>
       <tr>
           <td>Martena Mccray</td>
           <td>Post-Sales support</td>
           <td>Edinburgh</td>
           <td>46</td>
           <td>$324,050</td>
       </tr>
       <tr>
           <td>Jennifer Acosta</td>
           <td>Junior Javascript Developer</td>
           <td>Edinburgh</td>
           <td>43</td>
           <td>$75,650</td>
       </tr>
       <tr>
           <td>Shad Decker</td>
           <td>Regional Director</td>
           <td>Edinburgh</td>
           <td>51</td>
           <td>$183,000</td>
       </tr>
   </tbody>
   <tfoot>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
       </tr>
   </tfoot>
</table>
</div>
</div>
<br />
 <div id="completa2">
<div class="card-header">
  <h3 class="card-title titulo2"><i class="fas fa-university"></i> Lista de Transacciones Canceladas</h3>
  <div class="card-tools">
      <buttom class="btn boton btn-primary" id="parametro2"><i class="fa fa-search"></i> Parametros</buttom>
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
<table id=""  class="table table-bordered table-hover table-striped display" style="width:100%">
   <thead>
       <tr>
           <th>ID</th>
           <th>CLIENTE</th>
           <th>TRANSACCION</th>
           <th>MONTO</th>
           <th>ESTADO</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td>Jena Gaines</td>
           <td>Office Manager</td>
           <td>London</td>
           <td>30</td>
           <td>$90,560</td>
       </tr>
       <tr>
           <td>Haley Kennedy</td>
           <td>Senior Marketing Designer</td>
           <td>London</td>
           <td>43</td>
           <td>$313,500</td>
       </tr>
       <tr>
           <td>Tatyana Fitzpatrick</td>
           <td>Regional Director</td>
           <td>London</td>
           <td>19</td>
           <td>$385,750</td>
       </tr>
       <tr>
           <td>Michael Silva</td>
           <td>Marketing Designer</td>
           <td>London</td>
           <td>66</td>
           <td>$198,500</td>
       </tr>
       <tr>
           <td>Bradley Greer</td>
           <td>Software Engineer</td>
           <td>London</td>
           <td>41</td>
           <td>$132,000</td>
       </tr>
       <tr>
           <td>Angelica Ramos</td>
           <td>Chief Executive Officer (CEO)</td>
           <td>London</td>
           <td>47</td>
           <td>$1,200,000</td>
       </tr>
   </tbody>
   <tfoot>
       <tr>
           <th>Name</th>
           <th>Position</th>
           <th>Office</th>
           <th>Age</th>
           <th>Salary</th>
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
 </div>
</div>

          </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/gijgo.min.js')); ?>"></script>
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
   $("#completadas").click(function(){
     $(this).toggleClass("active");$("#completa1").slideToggle( "slow");
   });
   $("#canceladas").click(function(){
     $(this).toggleClass("active");$("#completa2").slideToggle( "slow");
   });
     /*fin de seccion de botones*/
   $(".boni").click(function(){
        $(this).toggleClass("veo");
        $(".veo").each(function(){
             $(this).toggle(500);
          });
    });
    });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.appusuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\xcomm\resources\views/reporte/reportes_usuario_basico.blade.php ENDPATH**/ ?>