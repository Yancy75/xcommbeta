<?php $__env->startSection("contenido"); ?>
<section class="medio container-fluid">
  <div class="bancos">
  <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s">
      <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Tasas Públicas del Día</h3>
       <div class="bancos"></div>
  </div>

  <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s">
    <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Reglas</h3>
    <div class="card card-primary card-tabs">
             <div class="card-header p-0 pt-1">
               <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                 <li class="pt-2 px-3"><h3 class="card-title">¿QUÉ ES XCOMM?</h3></li>
                 <li class="nav-item">
                   <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Reglas 1 - 4</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Reglas 5 - 8</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Reglas 9 - 11</a>
                 </li>
               </ul>
             </div>
             <div class="card-body">
               <div class="tab-content" id="custom-tabs-two-tabContent">
                 <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                   <ul class="list-group pep">
                        <li class="list-group-item">1) Todas las transacciones de USD pueden ser en las tres modalidades (efectivo, cheque y transferencia). Los EUR solamente en transferencia y efectivo</li>
                        <li class="list-group-item">2) El monto mínimo por transacción es de mil Dólares o mil Euro</li>
                        <li class="list-group-item">3) El tiempo máximo para revisar y confirmar una transaccion es de 5 minutos </li>
                        <li class="list-group-item">4) Una anulación solamente podrá ser efectiva si cuenta con el consentimiento de ambas partes y contienen la misma explicación.</li>
                      </ul>
                 </div>
                 <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                   <ul class="list-group pep">
                        <li class="list-group-item">5) Toda transacción confirmada en el sistema tiene un máximo de 2 minutos para poder ser anulada. SI se logra un acuerdo verbal entre las partes para anular, se debe proceder igualmente con la anulación de dicha transacción en la página web.</li>
                        <li class="list-group-item">6) El cliente tiene un máximo de 4 horas para realizar el pago correspondiente a la institución cambiaria o financiera.</li>
                        <li class="list-group-item">7) Las instituciones tienen 4 horas para realizar el pago correspondiente partir de la hora de recibir el pago del cliente.</li>
                        <li class="list-group-item">8) El cliente o la institución que incumpla con las reglas estipuladas podrá ser penalizada la primera vez por una semana no pudiendo operar y a la segunda será desconectado del sistema.</li>
                    </ul>
                 </div>
                 <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                   <ul class="list-group pep">
                        <li class="list-group-item">9) El horario del mercado de divisas en la pagina web es de 9:00 AM a 4:00 PM. </li>
                        <li class="list-group-item">10) La página web estará disponible las 24 horas del día durante los 7 días de las semanas para temas de información y servicio al cliente.</li>
                        <li class="list-group-item">11) Todas las tasas publicadas y disponibilidades pueden ser modificadas durante el horario del mercado.</li>
                    </ul>
                 </div>
               </div>
             </div>
             <!-- /.card -->
           </div>
  </div><!-- medio -->
</div>
</section>
<script>
  $(function() {
      new WOW().init();
      $.ajax({url: "<?php echo e(route('tasagenerales')); ?>", type: 'GET', data: { data   : 'banco' }, dataType: 'JSON',
          success: function (d) {
            if(d.length > 0) {constructors(d, 'bancos'); temporizador(d.length);}},error: function(){} });
  });/* final de inicio automatico */

  function constructors(banco, clase){
      var p = ''
      var controlId = 0;
      $.each(banco, function(index, value){
          aux1=aleatorio(0,3);
          p += "<div id='b"+controlId+"' class='boni small-box bg-info' >";
          /*p += "<div class='inner'><h3>"+value['banco']+"</h3><ul style='list-style: none;'><li>Venta Dolar: $"+value['venta_dolar']+" </li><li>Compra Dolar: $"+value['compra_dolar']+" </li><li>Venta Euro: $"+value['venta_euro']+" </li><li>Compra Euro: $"+value['compra_euro']+" </li></ul></div><div class='icon'><i class='fa fa-university'></i></div><a href='#' class='small-box-footer'>Mas informacion <i class='fa fa-arrow-circle-right'></i></a></div>";*/
          p += "<div class='inner'><h3><i class='fa fa-university'></i> "+value['banco']+"</h3><ul style='list-style: none;'><li>Venta Dolar: $"+value['venta_dolar']+" </li><li>Compra Dolar: $"+value['compra_dolar']+" </li><li>Venta Euro: $"+value['venta_euro']+" </li><li>Compra Euro: $"+value['compra_euro']+" </li></ul></div></div>";
          $("."+clase).append(p);
          controlId++;
      });
  }

function aleatorio(min, max) { return Math.floor(Math.random() * (max - min) + min);}
function temporizador(num){for(i=0; i < num; i++){$("#b"+i).delay(300+(i*300)).fadeIn();}}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/bienvenidos.blade.php ENDPATH**/ ?>