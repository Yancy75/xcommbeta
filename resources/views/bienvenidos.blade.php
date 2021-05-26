@extends('layouts.usuario')
@extends('layouts.componente.piebase')
@section("contenido")
<style>
.multiple{
    top: 0;
    min-height: 50vh;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    transition: all 1s;
}
.medio{
  padding-left: 0em;
  padding-right: 0em;
}
.codo{
  color: white;
    font-size: 23px;
    text-shadow: 1px 1px 3px black;
    font-family: fantasy;
}
.codo:hover{
  color: white;
  text-shadow: 0px 0px 2px black;
}
.eti{
  background: linear-gradient(45deg, #009935 10%, transparent);
  font-size: 1.5em;
}
.publico{
  background: white;
  padding: 50px;
  text-transform: uppercase;
  box-shadow: 0px 0px 2px black;
  border-radius: 3px;
/*forzando*/
  /*min-height: 560px;*/
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
  color: transparent;
}


/*@media screen and (max-width: 1640px) {
  #publicidad2{display:none;}
}*/
</style>
<section class="medio container-fluid">
<div class="wow zoomIn  publico" id="publicidad1" data-wow-duration="0.5s" data-wow-delay="1.5s" style="background-image: url(http://www.sanjuanshoppingcenter.com/wp-content/uploads/2015/12/BHD-Leon.jpg);">publicidad 1</div>
  

<div class="multiple pt-5">
  <!--<div class="wow zoomIn caja publico" id="publicidad1" data-wow-duration="1s" data-wow-delay="1.5s" style="background-image: url(http://www.sanjuanshoppingcenter.com/wp-content/uploads/2015/12/BHD-Leon.jpg);">publicidad 1</div>
  <div class="wow zoomIn caja publico" id="publicidad2" data-wow-duration="1s" data-wow-delay="1.7s" style="background-image: url(https://noticiasbancarias.com/wp-content/uploads/2014/01/Banco-Popular-Dominicano.jpg)">publicadad 2</div>
-->
  <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s">
       <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Tasas Públicas del Día</h3>
       <div class="bancos"></div>
  </div>
  <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s">
    <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >XCOMM</h3>
    <div class="card card-primary card-tabs">
             <div class="card-header p-0 pt-1">
               <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                 <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">¿QUÉ ES XCOMM?</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">¿CÓMO FUNCIONA?</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" id="custom-tabs-two-linea-tab" data-toggle="pill" href="#custom-tabs-two-linea" role="tab" aria-controls="custom-tabs-two-linea" aria-selected="false">¿POR QUÉ XCOMM?</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><i class="far fa-sticky-note"></i> Reglas</a>
                 </li>
               </ul>
             </div>
             <div class="card-body">
               <div class="tab-content" id="custom-tabs-two-tabContent">
                 <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                   <div class="accordion list-group pep" id="accordionExample">
                       <div class="card">
                         <div class="card-header eti" id="headingOne">
                            <h2><button type="button" class="btn codo collapsed" data-toggle="collapse" data-target="#collapseOne"><i class="fas fa-paperclip" style="padding-right: 5px;"></i>Reglas 1 - 4</button></h2>
                          </div>
                       <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                         <div class="card-body">
                           <ul class="list-group pep">
                                  <li class="list-group-item">1) Todas las transacciones de USD pueden ser en las tres modalidades (efectivo, cheque y transferencia). Los EUR solamente en transferencia y efectivo</li>
                                  <li class="list-group-item">2) El monto mínimo por transacción es de mil Dólares o mil Euro</li>
                                  <li class="list-group-item">3) El tiempo máximo para revisar y confirmar una transaccion es de 5 minutos </li>
                                  <li class="list-group-item">4) Una anulación solamente podrá ser efectiva si cuenta con el consentimiento de ambas partes y contienen la misma explicación.</li>
                                </ul>
                        </div>
                       </div>
                      </div>
                      <div class="card">
                          <div class="card-header eti" id="headingTwo">
                              <h2>
                                  <button type="button" class="btn codo" data-toggle="collapse" data-target="#collapseTwo"><i class="fas fa-paperclip" style="padding-right: 5px;"></i>Reglas 5 - 8</button>
                              </h2>
                          </div>
                          <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <ul class="list-group pep">
                                     <li class="list-group-item">5) Toda transacción confirmada en el sistema tiene un máximo de 2 minutos para poder ser anulada. SI se logra un acuerdo verbal entre las partes para anular, se debe proceder igualmente con la anulación de dicha transacción en la página web.</li>
                                     <li class="list-group-item">6) El cliente tiene un máximo de 4 horas para realizar el pago correspondiente a la institución cambiaria o financiera.</li>
                                     <li class="list-group-item">7) Las instituciones tienen 4 horas para realizar el pago correspondiente partir de la hora de recibir el pago del cliente.</li>
                                     <li class="list-group-item">8) El cliente o la institución que incumpla con las reglas estipuladas podrá ser penalizada la primera vez por una semana no pudiendo operar y a la segunda será desconectado del sistema.</li>
                                 </ul>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header eti" id="headingThree">
                              <h2>
                                  <button type="button" class="btn codo" data-toggle="collapse" data-target="#collapseThree"><i class="fas fa-paperclip" style="padding-right: 5px;"></i>Reglas 9 - 11</button>
                              </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <ul class="list-group pep">
                                     <li class="list-group-item">9) El horario del mercado de divisas en la pagina web es de 9:00 AM a 4:00 PM. </li>
                                     <li class="list-group-item">10) La página web estará disponible las 24 horas del día durante los 7 días de las semanas para temas de información y servicio al cliente.</li>
                                     <li class="list-group-item">11) Todas las tasas publicadas y disponibilidades pueden ser modificadas durante el horario del mercado.</li>
                                 </ul>
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
                 <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                   <p>Plataforma virtual para la captación y cambio de divisas por medio de instituciones regularizadas por el Banco Central de la Republica Dominicana y supervisadas por la Superintendencia de Bancos del País.</p>
                 </div>
                 <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                   <ul class="list-group pep">
                        <li class="list-group-item">Cumpliento con los requerimientos para el registro en la Plataforma.</li>
                        <li class="list-group-item">Completando los distintos pasos de acuerdo a tu requerimiento.</li>
                        <li class="list-group-item">Transfieres de tu propia cuenta a la institución.</li>
                        <li class="list-group-item">Recibes tus divisas.</li>
                        <li class="list-group-item">Listo</li>
                    </ul>
                 </div>
                 <div class="tab-pane fade" id="custom-tabs-two-linea" role="tabpanel" aria-labelledby="custom-tabs-two-linea-tab">
                    <ul class="list-group pep">
                        <li class="list-group-item">Porque es más fácil la captación de divisas.</li>
                        <li class="list-group-item">Porque se el tiempo de recibir mis divisas.</li>
                        <li class="list-group-item">Porque me informo de las tasas actuales del mercado de divisas.</li>
                        <li class="list-group-item">Porque es gratuito.</li>
                     </ul>
                 </div>
               </div>
             </div>
             <!-- /.card -->
           </div>
  </div><!-- medio -->
  </div>
  <div class="wow zoomIn  publico" id="publicidad2" data-wow-duration="0.5s" data-wow-delay="1.7s" style="background-image: url(https://noticiasbancarias.com/wp-content/uploads/2014/01/Banco-Popular-Dominicano.jpg)">publicadad 2</div>
</section>
<script>
  $(function() {
      new WOW().init();
      $.ajax({url: "{{ route('tasagenerales') }}", type: 'GET', data: { data   : 'banco' }, dataType: 'JSON',
          success: function (d) {
            if(d.length > 0) {constructors(d, 'bancos'); temporizador(d.length);}},error: function(){} });

      //Llama la funcion para mostrar el total de cada transaccion tanto en dolares como en euro

      setInterval(function(){ mostrarTotalTransaccionesDolarYEuro(); }, 10000);

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
@endsection
