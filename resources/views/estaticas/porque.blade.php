@extends('layouts.usuario')
@extends('layouts.componente.cabecera_inv')
@section("contenido")
<style>
.box.box-primary {
    padding: 10px 10px 5px 10px;
}
.content-header{
  padding-bottom: 2em;
}
.caja{
  text-align: justify;
}
.username{
  font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    text-shadow: 0px 0px 5px white;
}
.pep{
    background: white;
    padding: 10px;
    box-shadow: 0 0 6px #6b6868 inset;
}
.list-group-item{
  cursor: pointer;
   transition:all .2s;
}
.list-group-item:hover{
  font-size: 1.2em;
  font-weight: 900;
  background-image: linear-gradient(90deg,#585757, #ecf0f5);
  color: white;
  text-shadow: 0 0 3px black;
}
</style>
<div class="container">
  <section class="content-header">
      <h1 class="titulo2"><i class="fa fa-quote-right" aria-hidden="true"></i> Porque XCOMM </h1>
  </section>
  <div class="row" >
     <div class="col-md-12">
                  <div class="caja" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
                    <ul class="list-group pep">
                         <li class="list-group-item">Permite obtener e informar la mejor tasa de compra y venta de divisa</li>
                         <li class="list-group-item">Facilita la capacitacion de divisas y brinda un mayor rendimiento a tu negocio</li>
                         <li class="list-group-item">Coordinacion del tiempo en recibir las divisas o los pesos dominicanos</li>
                         <li class="list-group-item">Senguimiento automatizado y personalizado en tus transacciones</li>
                         <li class="list-group-item">Beneficios anuales aculmulados por tus transacciones</li>
                         <li class="list-group-item">Calificacion del perfil de credito de XCOMM</li>
                         <li class="list-group-item">Es mas comodo, sencillo y transparente</li>
                         <li class="list-group-item">El uso de XCOMM es gratuito</li>
                     </ul>
                  </div>
        </div>

        </div>

   </div>
@endsection
