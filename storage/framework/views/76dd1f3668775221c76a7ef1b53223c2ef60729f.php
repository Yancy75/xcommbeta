<?php $__env->startSection("contenido"); ?>
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


        @media  screen and (max-width: 1640px) {
            #publicidad2{display:none;}
        }
    </style>
    <section class="medio container-fluid pt-5">
        <div class="multiple">





            <div class="wow zoomIn caja" data-wow-duration="1s" data-wow-delay="1s" style="flex-grow: 4;">

                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" style="color: white;">Contactanos</h3>














                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <div class="accordion list-group pep" id="accordionExample">
                                    <form method="post" action="<?php echo e(route('enviarContactanos')); ?>">
                                        <?php echo csrf_field(); ?>
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
            $.ajax({url: "<?php echo e(route('tasagenerales')); ?>", type: 'GET', data: { data   : 'banco' }, dataType: 'JSON',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\xcomm\resources\views/contacto.blade.php ENDPATH**/ ?>