function venta_dolares(cliente, banco_name, banco_id, id_cambio_divisa, valor_dolar, rango_inicial, rango_final)
{
    $('#venta_dolar_ModalLabel').text(banco_name);

    $('#id_cliente_venta_dolar_cliente').val(cliente);
    $('#id_banco_venta_dolar_cliente').val(banco_id);
    $('#id_cambiodivisa_venta_dolar_cliente').val(id_cambio_divisa);

    $('#valor_venta_dolar_cliente_id').val(valor_dolar);
    $('#rango_inicial_venta_dolar_cliente_id').val(rango_inicial);
    $('#rango_final_venta_dolar_cliente_id').val(rango_final);

    $('#id_button_cliente_venta_dolar').click()

    $('#cliente_vender_dolar').on('shown.bs.modal', function () {
        $('#cantidad_venta_dolar_cliente_id').trigger('focus');
    });
}


function realizar_venta_dolares()
{
    var rutaSiguiente  = $("#ruta_transaccion_siguiente_cliente").val();

    var data           = [];
    var idBanco        = $("#id_banco_transaccion_bancaria").val();
    var idCambioDivisa = $("#id_cambiodivisa_transaccion_bancaria").val();
    var idCliente      = $("#id_cliente_transaccion_bancaria").val();
    var accion         = $("#id_accion_transaccion_bancaria").val();
    var valorDolar     = $("#valor_dolar_transaccion_bancaria").val();
    var rangoIncial    = $("#rango_inicial_transaccon_bancaria").val();
    var rangoFinal     = $("#rango_final_transaccon_bancaria").val();
    var cantidad       = $("#cantidad_transaccion_bancaria").val();
    var ruta           = $("#id_ruta_transaccion_bancaria").val();
    var nombreBanco    = $("#venta_dolar_ModalLabel").text();

    var confirmar      = $("#confirmar_transaccion_bancaria").val();

    var metodoRealizarPago     = $("input[name='customRadio']:checked").val();
    var metodoInfoRealizarPago = {};

    var metodoRecibirPago = $("input[name='customRadio1']:checked").val();
    var metodoInfo        = {};

    if(metodoRealizarPago == 'efectivo')
    {
        metodoInfoRealizarPago = {
            'metodo'  : metodoRealizarPago,
            'detalle' : $("#id_input_detalle_pago_efectivo_al_banco").val(),
        };
    }
    else if(metodoRealizarPago == 'cheque')
    {
        metodoInfoRealizarPago = {
            'metodo'       : metodoRealizarPago,
            'nombre'       : $("#id_input_nombre_pago_cheque_al_banco").val(),
            'rnc'          : $("#id_input_rnc_pago_cheque_al_banco").val(),
            'nombre_banco' : $("#id_input_nombre_banco_pago_cheque_al_banco").val(),
            'numero_cheque': $("#id_input_numero_cheque_pago_cheque_al_banco").val(),
            'detalle'      : $("#id_input_detalle_pago_cheque_al_banco").val(),
        };
    }
    else if(metodoRealizarPago == 'transferencia')
    {
        metodoInfoRealizarPago = {
            'metodo'      : metodoRealizarPago,
            'nombre'      : $("#id_input_nombre_pago_transferencia_al_banco").val(),
            'rnc'         : $("#id_input_rnc_pago_transferencia_al_banco").val(),
            'nombre_banco': $("#id_input_nombre_banco_pago_transferencia_al_banco").val(),
            'cuenta'      : $("#id_input_numero_cuenta_pago_transferencia_al_banco").val(),
            'detalle'     : $("#id_input_detalle_pago_transferencia_al_banco").val(),
        };
    }

    if(metodoRecibirPago == 'efectivo')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'detalle' : $("#id_input_detalle_recibir_pago_efectivo_al_banco").val(),
        };
    }
    else if(metodoRecibirPago == 'cheque')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'nombre'  : $("#id_input_nombre_recibir_pago_cheque_al_banco").val(),
            'detalle' : $("#id_input_detalle_recibir_pago_cheque_al_banco").val(),
        };
    }
    else if(metodoRecibirPago == 'transferencia')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'nombre'  : $("#id_input_nombre_recibir_pago_transferencia_al_banco").val(),
            'rnc'     : $("#id_input_rnc_recibir_pago_transferencia_al_banco").val(),
            'cuenta'  : $("#id_input_numero_cuenta_recibir_pago_transferencia_al_banco").val(),
            'detalle' : $("#id_input_detalle_recibir_pago_transferencia_al_banco").val(),
        };
    }

    if(confirmar != 'confirmar')
    {
        mensaje('mensaje_venta_dolar_id', "Favor de escribir 'confirmar'", 1, 0);

        $("#confirmar_transaccion_bancaria").val("");
        $('#confirmar_transaccion_bancaria').focus();
        return;
    }

    data.push(idBanco);
    data.push(idCambioDivisa);
    data.push(idCliente);
    data.push(valorDolar);
    data.push(rangoIncial);
    data.push(rangoFinal);
    data.push(cantidad);
    data.push(nombreBanco);
    data.push(accion);
    data.push(metodoInfoRealizarPago);
    data.push(metodoInfo);

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {
            window.location = rutaSiguiente;
        },
        error: function()
        {

        }
    });
}

function buscarTasasPorCantidadTransaccion()
{
    var data     = [];
    var accion   = $("input[name=accion_moneda]:checked", "#form_buscar_tasa_cantidad_transaccion").val();
    var cantidad = $('#cantidad_transaccion').val();
    var ruta     = $('#ruta_buscar_transaccion_cantidad').val();

    if(typeof accion == 'undefined')
    {
        mensaje('mensaje_form_buscar_tasa_cantidad_transaccion', "Elija una accion", 1, 0);
        return
    }
    if(cantidad.length == 0)
    {
        mensaje('mensaje_form_buscar_tasa_cantidad_transaccion', "Inserte la cantidad que desea", 1, 0);
        $('#cantidad_transaccion').focus();
        return
    }

    data.push(accion);
    data.push(cantidad);

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {
            appendButtonVenderDolar(d);
        },
        error: function()
        {

        }
    });
}

function appendButtonVenderDolar(data)
{
    $("#botones_transaccion_accion_call_modal").empty();
    var idCliente = $("#id_cliente_transaccion_cantidad").val();
    var cantidad  = $("#cantidad_transaccion").val();

    $.each(data, function(index, value){
        var funcion = "venderDolarModal('"+idCliente+"', '"+value['entidadbancarias_id']+"', '"+value['divisa_id']+"', '"+value['name']+"', '"+value['rango_inicial']+"', '"+value['rango_final']+"', '"+value['valor_moneda']+"', '"+cantidad+"', '"+value['accion']+"');";
        var p       = '<br/><button type="button" class="btn btn-primary btn-app animated zoomIn" onclick="'+funcion+'"><i class="fas fa-coins"></i> '+value['valor_moneda']+'</button>'
        $("#botones_transaccion_accion_call_modal").append(p);
    });
}

function venderDolarModal(idCliente, entidadbancarias_id, divisa_id, name, rango_inicial, rango_final, valor_dolar, cantidad, accion)
{
    $("#id_cliente_transaccion_bancaria").val(idCliente);
    $("#id_banco_transaccion_bancaria").val(entidadbancarias_id);
    $("#id_cambiodivisa_transaccion_bancaria").val(divisa_id);
    $("#venta_dolar_ModalLabel").text(name);
    if( accion == "vender_dolar")
    {
        $("#venta_dolar_ModalLabel2").text('Venta Dolar');
        $("#label_valor_dolar_transaccion_bancaria").text('Venta USD');
    }
    else if( accion == "compra_dolar" )
    {
        $("#venta_dolar_ModalLabel2").text('Compra Dolar');
        $("#label_valor_dolar_transaccion_bancaria").text('Compra USD');
    }
    else if( accion == "venta_euro" )
    {
        $("#venta_dolar_ModalLabel2").text('Venta Euro');
        $("#label_valor_dolar_transaccion_bancaria").text('Venta EUR');
    }
    else if( accion == "compra_euro" )
    {
        $("#venta_dolar_ModalLabel2").text('Compra Euro');
        $("#label_valor_dolar_transaccion_bancaria").text('Compra EUR');
    }
    $("#rango_inicial_transaccon_bancaria").val(rango_inicial);
    $("#rango_final_transaccon_bancaria").val(rango_final);
    $("#valor_dolar_transaccion_bancaria").val(valor_dolar);
    $("#cantidad_transaccion_bancaria").val(cantidad);
    $("#id_accion_transaccion_bancaria").val(accion);

    if( accion == "venta_dolar")
    {
        // calculo si la transaccion pasa los 15,000 dolares para obligar a que se suba el archivo
        if(cantidad >= '15000')
        {
            $('#confirmar_button_1').addClass('ocultar');
            $('#subir_arvhico_id').removeClass('ocultar');
        }
        var p = " Al vender la cantidad de "+ cantidad +" dolares vas a recibir la suma de "+ numberWithCommas(parseFloat(cantidad) * parseFloat(valor_dolar));
    }
    else if( accion == "compra_dolar" )
    {
        // calculo si la transaccion pasa los 15,000 dolares para obligar a que se suba el archivo
        if(cantidad >= '15000')
        {
            $('#confirmar_button_1').addClass('ocultar');
            $('#subir_arvhico_id').removeClass('ocultar');
        }
        var p = " Al comprar la cantidad de "+ cantidad +" dolares vas a recibir la suma de "+ numberWithCommas(parseFloat(cantidad) * parseFloat(valor_dolar));
    }
    else if( accion == "venta_euro" )
    {
        // calculo si la transaccion pasa los 15,000 dolares para obligar a que se suba el archivo
        if(cantidad >= '15000')
        {
            $('#confirmar_button_1').addClass('ocultar');
            $('#subir_arvhico_id').removeClass('ocultar');
        }
        var p = " Al vender la cantidad de "+ cantidad +" Euro vas a recibir la suma de "+ numberWithCommas(parseFloat(cantidad) * parseFloat(valor_dolar));
    }
    else if( accion == "compra_euro" )
    {
        // calculo si la transaccion pasa los 15,000 dolares para obligar a que se suba el archivo
        if(cantidad >= '15000')
        {
            $('#confirmar_button_1').addClass('ocultar');
            $('#subir_arvhico_id').removeClass('ocultar');
        }
        var p = " Al comprar la cantidad de "+ cantidad +" Euro vas a recibir la suma de "+ numberWithCommas(parseFloat(cantidad) * parseFloat(valor_dolar));
    }


    $("#Mensaje_transaccion_bancaria").val(p);

    // getTipoPagoAlBanco(entidadbancarias_id);//// Aqui llamo la funcion donde llamo el metodo de pago definido por el banco

    $("#id_button_cliente_venta_dolar").click();

}

function monstrarUploadFile()
{
    window.location = "pagina_subir_archivo/"+ $("#id_cambiodivisa_transaccion_bancaria").val() +"/"+ $("#cantidad_transaccion").val() +"/"+ $("#id_accion_transaccion_bancaria").val()+"/"+$("#venta_dolar_ModalLabel").text();
    // window.location = "{{ route('goPageUploadFile', [id_cambio_divisa =>"+ $("#id_cambiodivisa_transaccion_bancaria").val() +", cantidad =>"+ $("#cantidad_transaccion").val() +"]) }}";
}

function getTipoPagoAlBanco(idBanco)
{
    //En esta funcion busco la informacion que el banco definio para que le realicen el pago
    var ruta = $("#id_cliente_info_tipo_pago_al_banco").val();
    var data = idBanco;
    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {
            $("#id_input_detalle_pago_efectivo_al_banco").text('');

            $("#id_input_nombre_pago_cheque_al_banco").val('');
            $("#id_input_detalle_pago_cheque_al_banco").text('');

            $("#id_input_nombre_pago_transferencia_al_banco").val('');
            $("#id_input_rnc_pago_transferencia_al_banco").val('');
            $("#id_input_numero_cuenta_pago_transferencia_al_banco").val('');
            $("#id_input_detalle_pago_transferencia_al_banco").text('');


            $("#id_input_detalle_pago_efectivo_al_banco").text(d[0]['comentario_efectivo']);

            $("#id_input_nombre_pago_cheque_al_banco").val(d[0]['nombre_cheque']);
            $("#id_input_detalle_pago_cheque_al_banco").text(d[0]['comentario_cheque']);

            $("#id_input_nombre_pago_transferencia_al_banco").val(d[0]['nombre_transferencia']);
            $("#id_input_rnc_pago_transferencia_al_banco").val(d[0]['rnc']);
            $("#id_input_numero_cuenta_pago_transferencia_al_banco").val(d[0]['numero_cuenta']);
            $("#id_input_detalle_pago_transferencia_al_banco").text(d[0]['comentario_transferencia']);
        },
        error: function()
        {

        }
    });
}

function confirmar_transaccion() {
    $("#confirmar_transaccion_bancaria").val("");

    $('#id_confirmar_transaccion_cliente').removeClass('ocultar');
    $('#confirmar_button_1').addClass('ocultar');
    $('#confirmar_button_2').removeClass('ocultar');

    $('#id_cancelar_transaccion_cliente').addClass('ocultar');
    $('#cancelar_button_1').removeClass('ocultar');
    $('#cancelar_button_2').addClass('ocultar');
}

function cancelarTransaccion() {
    $(".metodo_pago").addClass('ocultar')

    $("#cancelar_transaccion_bancaria").val("");

    $('#id_cancelar_transaccion_cliente').removeClass('ocultar');
    $('#cancelar_button_1').addClass('ocultar');
    $('#cancelar_button_2').removeClass('ocultar');

    $('#id_confirmar_transaccion_cliente').addClass('ocultar');
    $('#confirmar_button_1').removeClass('ocultar');
    $('#confirmar_button_2').addClass('ocultar');

    $('#cliente_vender_dolar').on('shown.bs.modal', function () {
        $('#cancelar_transaccion_bancaria').trigger('focus')
    })

}

function confirmarCancelacionTransaccion(){
    var razon          = $("#cancelar_transaccion_bancaria").val();
    var ruta           = $("#id_ruta_cancelar_transaccion_bancaria").val();
    var idCambioDivisa = $("#id_cambiodivisa_transaccion_bancaria").val();
    var idCliente      = $("#id_cliente_transaccion_bancaria").val();
    var datos          = [];

    if(razon.length == 0)
    {
        mensaje('mensaje_venta_dolar_id', "Favor de escribir la razon", 1, 0);

        $('#cancelar_transaccion_bancaria').focus();
        return;
    }

    datos.push(idCambioDivisa);
    datos.push(idCliente);
    datos.push(razon);
    datos.push('creado_cliente');

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : datos
        },
        success: function (d) {
            mensaje('mensaje_venta_dolar_id', d, 2, 0);
            setTimeout(function() {
                $("#cancelar_button_3").click();
                $("#cancelar_transaccion_bancaria").val("");
                $('#id_cancelar_transaccion_cliente').addClass('ocultar');
                $('#cancelar_button_1').removeClass('ocultar');
                $('#cancelar_button_2').addClass('ocultar');
             }, 1000);
        },
        error: function()
        {

        }
    });
}

function seleccionarTipoDePagoAlBanco()
{

    $("input[name='customRadio']").on('change', function(){
        if($(this).val() == 'efectivo')
        {
            $('#id_detalle_pago_efectivo_cliente').removeClass('ocultar');

            $('#id_nombre_pago_cheque_cliente').addClass('ocultar');
            $('#id_rnc_pago_cheque_cliente').addClass('ocultar');
            $('#id_nombre_banco_pago_cheque_cliente').addClass('ocultar');
            $('#id_numero_cheque_pago_cheque_cliente').addClass('ocultar');
            $('#id_detalle_pago_cheque_cliente').addClass('ocultar');

            $('#id_nombre_pago_transferencia_cliente').addClass('ocultar');
            $('#id_rnc_pago_transferencia_cliente').addClass('ocultar');
            $('#id_nombre_banco_pago_transferencia_cliente').addClass('ocultar');
            $('#id_numero_cuenta_pago_transferencia_cliente').addClass('ocultar');
            $('#id_detalle_pago_transferencia_cliente').addClass('ocultar');
        }
        else if($(this).val() == 'cheque')
        {
            $('#id_detalle_pago_efectivo_cliente').addClass('ocultar');

            $('#id_nombre_pago_cheque_cliente').removeClass('ocultar');
            $('#id_rnc_pago_cheque_cliente').removeClass('ocultar');
            $('#id_nombre_banco_pago_cheque_cliente').removeClass('ocultar');
            $('#id_numero_cheque_pago_cheque_cliente').removeClass('ocultar');
            $('#id_detalle_pago_cheque_cliente').removeClass('ocultar');

            $('#id_nombre_pago_transferencia_cliente').addClass('ocultar');
            $('#id_rnc_pago_transferencia_cliente').addClass('ocultar');
            $('#id_nombre_banco_pago_transferencia_cliente').addClass('ocultar');
            $('#id_numero_cuenta_pago_transferencia_cliente').addClass('ocultar');
            $('#id_detalle_pago_transferencia_cliente').addClass('ocultar');
        }
        else if($(this).val() == 'transferencia')
        {
            $('#id_detalle_pago_efectivo_cliente').addClass('ocultar');

            $('#id_nombre_pago_cheque_cliente').addClass('ocultar');
            $('#id_rnc_pago_cheque_cliente').addClass('ocultar');
            $('#id_nombre_banco_pago_cheque_cliente').addClass('ocultar');
            $('#id_numero_cheque_pago_cheque_cliente').addClass('ocultar');
            $('#id_detalle_pago_cheque_cliente').addClass('ocultar');

            $('#id_nombre_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_rnc_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_nombre_banco_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_numero_cuenta_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_detalle_pago_transferencia_cliente').removeClass('ocultar');
        }
    });
}

function seleccionarFormaDeRecibirPagoDelBanco()
{
    $("input[name='customRadio1']").on('change', function(){
        if($(this).val() == 'efectivo')
        {
            $('#id_detalle_recibir_pago_efectivo_cliente').removeClass('ocultar');

            $('#id_nombre_recibir_pago_cheque_cliente').addClass('ocultar');
            $('#id_detalle_recibir_pago_cheque_cliente').addClass('ocultar');

            $('#id_nombre_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_rnc_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_numero_cuenta_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_detalle_recibir_pago_transferencia_cliente').addClass('ocultar');
        }
        else if($(this).val() == 'cheque')
        {
            $('#id_detalle_recibir_pago_efectivo_cliente').addClass('ocultar');

            $('#id_nombre_recibir_pago_cheque_cliente').removeClass('ocultar');
            $('#id_detalle_recibir_pago_cheque_cliente').removeClass('ocultar');

            $('#id_nombre_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_rnc_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_numero_cuenta_recibir_pago_transferencia_cliente').addClass('ocultar');
            $('#id_detalle_recibir_pago_transferencia_cliente').addClass('ocultar');
        }
        else if($(this).val() == 'transferencia')
        {
            $('#id_detalle_recibir_pago_efectivo_cliente').addClass('ocultar');

            $('#id_nombre_recibir_pago_cheque_cliente').addClass('ocultar');
            $('#id_detalle_recibir_pago_cheque_cliente').addClass('ocultar');

            $('#id_nombre_recibir_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_rnc_recibir_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_numero_cuenta_recibir_pago_transferencia_cliente').removeClass('ocultar');
            $('#id_detalle_recibir_pago_transferencia_cliente').removeClass('ocultar');
        }
    });
}


function showHideMetodoPagarBanco()
{
    $("#tipoDePagoClienteFormulario").toggleClass('ocultar');
}

function showHideMetipoRecibirPagoCliente() {
    $("#tipoDeRecibirElPagoClienteFormulario").toggleClass('ocultar');
}

function confirmarCancelacionTransaccionWUpload(){
    var razon          = $("#cancelar_transaccion_bancaria").val();
    var ruta           = $("#id_ruta_cancelar_transaccion_bancaria").val();
    var idCambioDivisa = $("#id_cambiodivisa_transaccion_bancaria").val();
    var idCliente      = $("#id_cliente_transaccion_bancaria").val();
    var datos          = [];

    if(razon.length == 0)
    {
        mensaje('mensaje_venta_dolar_id', "Favor de escribir la razon", 1, 0);

        $('#cancelar_transaccion_bancaria').focus();
        return;
    }

    datos.push(idCambioDivisa);
    datos.push(idCliente);
    datos.push(razon);
    datos.push('creado_cliente');

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : datos
        },
        success: function (d) {
            mensaje('mensaje_venta_dolar_id', d, 2, 0);
            window.location = $("#id_ruta_ir_despues_cancelar_transaccion_bancaria").val();
        },
        error: function()
        {

        }
    });
}

function realizar_venta_dolaresWUpload()
{
    var rutaSiguiente  = $("#ruta_transaccion_siguiente_cliente").val();

    var data           = [];
    var idBanco        = $("#id_banco_transaccion_bancaria").val();
    var idCambioDivisa = $("#id_cambiodivisa_transaccion_bancaria").val();
    var idCliente      = $("#id_cliente_transaccion_bancaria").val();
    var accion         = $("#id_accion_transaccion_bancaria").val();
    var valorDolar     = $("#valor_dolar_transaccion_bancaria").val();
    var rangoIncial    = $("#rango_inicial_transaccon_bancaria").val();
    var rangoFinal     = $("#rango_final_transaccon_bancaria").val();
    var cantidad       = $("#cantidad_transaccion_bancaria").val();
    var ruta           = $("#id_ruta_transaccion_bancaria").val();
    var nombreBanco    = $("#venta_dolar_ModalLabel").text();

    var confirmar      = $("#confirmar_transaccion_bancaria").val();

    var metodoRealizarPago     = $("input[name='customRadio']:checked").val();
    var metodoInfoRealizarPago = {};

    var metodoRecibirPago = $("input[name='customRadio1']:checked").val();
    var metodoInfo        = {};

    if(metodoRealizarPago == 'efectivo')
    {
        metodoInfoRealizarPago = {
            'metodo'  : metodoRealizarPago,
            'detalle' : $("#id_input_detalle_pago_efectivo_al_banco").val(),
        };
    }
    else if(metodoRealizarPago == 'cheque')
    {
        metodoInfoRealizarPago = {
            'metodo'       : metodoRealizarPago,
            'nombre'       : $("#id_input_nombre_pago_cheque_al_banco").val(),
            'rnc'          : $("#id_input_rnc_pago_cheque_al_banco").val(),
            'nombre_banco' : $("#id_input_nombre_banco_pago_cheque_al_banco").val(),
            'numero_cheque': $("#id_input_numero_cheque_pago_cheque_al_banco").val(),
            'detalle'      : $("#id_input_detalle_pago_cheque_al_banco").val(),
        };
    }
    else if(metodoRealizarPago == 'transferencia')
    {
        metodoInfoRealizarPago = {
            'metodo'      : metodoRealizarPago,
            'nombre'      : $("#id_input_nombre_pago_transferencia_al_banco").val(),
            'rnc'         : $("#id_input_rnc_pago_transferencia_al_banco").val(),
            'nombre_banco': $("#id_input_nombre_banco_pago_transferencia_al_banco").val(),
            'cuenta'      : $("#id_input_numero_cuenta_pago_transferencia_al_banco").val(),
            'detalle'     : $("#id_input_detalle_pago_transferencia_al_banco").val(),
        };
    }

    if(metodoRecibirPago == 'efectivo')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'detalle' : $("#id_input_detalle_recibir_pago_efectivo_al_banco").val(),
        };
    }
    else if(metodoRecibirPago == 'cheque')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'nombre'  : $("#id_input_nombre_recibir_pago_cheque_al_banco").val(),
            'detalle' : $("#id_input_detalle_recibir_pago_cheque_al_banco").val(),
        };
    }
    else if(metodoRecibirPago == 'transferencia')
    {
        metodoInfo = {
            'metodo'  : metodoRecibirPago,
            'nombre'  : $("#id_input_nombre_recibir_pago_transferencia_al_banco").val(),
            'rnc'     : $("#id_input_rnc_recibir_pago_transferencia_al_banco").val(),
            'cuenta'  : $("#id_input_numero_cuenta_recibir_pago_transferencia_al_banco").val(),
            'detalle' : $("#id_input_detalle_recibir_pago_transferencia_al_banco").val(),
        };
    }

    if(confirmar != 'confirmar')
    {
        mensaje('mensaje_venta_dolar_id', "Favor de escribir 'confirmar'", 1, 0);

        $("#confirmar_transaccion_bancaria").val("");
        $('#confirmar_transaccion_bancaria').focus();
        return;
    }

    data.push(idBanco);
    data.push(idCambioDivisa);
    data.push(idCliente);
    data.push(valorDolar);
    data.push(rangoIncial);
    data.push(rangoFinal);
    data.push(cantidad);
    data.push(nombreBanco);
    data.push(accion);
    data.push(metodoInfoRealizarPago);
    data.push(metodoInfo);
    console.log(data);
    return;

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {
            window.location = rutaSiguiente;
        },
        error: function()
        {

        }
    });
}
