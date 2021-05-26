@extends('layouts.usuario')
@extends('layouts.componente.piebase')
@section("contenido")
    <style>
        .multiple{
            top: 0;
            min-height: 50vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            transition: all 1s;
        }
        .medio{
            padding-left: 1em;
            padding-right: 1em;
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
            min-height: 560px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            color: transparent;
        }


        @media screen and (max-width: 1640px) {
            #publicidad2{display:none;}
        }
    </style>
    <section class="medio container-fluid pt-5">
        <div class="multiple">
{{--            <div class="wow zoomIn caja publico" id="publicidad1" data-wow-duration="1s" data-wow-delay="1.5s" style="background-image: url(http://www.sanjuanshoppingcenter.com/wp-content/uploads/2015/12/BHD-Leon.jpg);">publicidad 1</div>--}}
{{--            <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s">--}}
{{--                <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Tasas Públicas del Día</h3>--}}
{{--                <div class="bancos"></div>--}}
{{--            </div>--}}
            <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s" style="flex-grow: 4;">
{{--                <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Contactanos</h3>--}}
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" style="color: white;">Contactanos</h3>
{{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">¿QUÉ ES XCOMM?</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">¿CÓMO FUNCIONA?</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="custom-tabs-two-linea-tab" data-toggle="pill" href="#custom-tabs-two-linea" role="tab" aria-controls="custom-tabs-two-linea" aria-selected="false">¿POR QUÉ XCOMM?</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><i class="far fa-sticky-note"></i> Reglas</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="accordion list-group pep" id="accordionExample">
                                    <form method="post" action="{{ route('enviarContactanos') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control form-control-sm" id="email" name="email" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telefono" class="col-sm-2 col-form-label col-form-label-sm">Telefono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="asunto" class="col-sm-2 col-form-label col-form-label-sm">Asunto</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-sm" id="asunto" name="asunto" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="contenido" class="col-sm-2 col-form-label col-form-label-sm">Contenido</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control form-control-sm" id="contenido" name="contenido" style="min-height: 200px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                                        </div>
                                        <div class="clear"></div>
                                    </form>
                                </div>
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
