function validarPorBancoTransaccionCreadaPorCliente(idCliente, nombre, cedula, phone, email, idTransaccion, rangoInicial, rangoFinal, valorDolar, cantidad, tipoTransaccion, transaccion, fechaLastTransaccion, infoPagarTipoPago, infoPagarComentarioEfectivo, infoPagarNumeroCheque, infoPagarNombreCheque, infoPagarComentarioCheque, infoPagarNumeroCuenta, infoPagarNombreTransferencia, infoPagarComentarioTransferencia, infoPagarRnc, infoRecibirTipoPago, infoRecibirComentarioEfectivo, infoRecibirNombreCheque, infoRecibirComentarioCheque, infoRecibirNumeroCuenta, infoRecibirNombreTransferencia, infoRecibirRnc, infoRecibirComentarioTransferencia)
{
    $('#controlTransaccionBancoIdModalScrollableTitle').text("");
    $('#clienteInputIdCliente').val("");
    $('#clienteInputIdTransaccion').val("");
    $('#clienteInputCedula').val("");
    $('#clienteInputPhone').val("");
    $('#clienteInputEmail1').val("");
    $('#clienteInputRI').val("");
    $('#clienteInputRF').val("");
    $('#clienteInputValor').val("");
    $('#clienteInputCantidad').val("");
    $('#clienteInputAccion').val("");
    $('#clienteInputEstatus').val("");
    $('#clienteInputFecha').val("");

    $('#clienteInputTipoPago').val("");
    // $('#clienteInputTipoPago_div').addClass("ocultar");
    $('#clienteInputComentarioEfectivo').val("");
    $('#clienteInputComentarioEfectivo_div').addClass("ocultar");
    $('#clienteInputNumeroCheque').val("");
    $('#clienteInputNumeroCheque_div').addClass("ocultar");
    $('#clienteInputNombreCheque').val("");
    $('#clienteInputNombreCheque_div').addClass("ocultar");
    $('#clienteInputComentarioCheque').val("");
    $('#clienteInputComentarioCheque_div').addClass("ocultar");
    $('#clienteInputNumeroCuenta').val("");
    $('#clienteInputNumeroCuenta_div').addClass("ocultar");
    $('#clienteInputNombreTransferencia').val("");
    $('#clienteInputNombreTransferencia_div').addClass("ocultar");
    $('#clienteInputComentarioTransferencia').val("");
    $('#clienteInputComentarioTransferencia_div').addClass("ocultar");
    $('#clienteInputRNC').val("");
    $('#clienteInputRNC_div').addClass("ocultar");

    $('#clienteRecibirInputTipoPago').val("");
    // $('#clienteRecibirInputTipoPago_div').addClass("ocultar");
    $('#clienteRecibirInputComentarioEfectivo').val("");
    $('#clienteRecibirInputComentarioEfectivo_div').addClass("ocultar");
    $('#clienteRecibirInputNombreCheque').val("");
    $('#clienteRecibirInputNombreCheque_div').addClass("ocultar");
    $('#clienteRecibirInputComentarioCheque').val("");
    $('#clienteRecibirInputComentarioCheque_div').addClass("ocultar");
    $('#clienteRecibirInputNumeroCuenta').val("");
    $('#clienteRecibirInputNumeroCuenta_div').addClass("ocultar");
    $('#clienteRecibirInputNombreTransferencia').val("");
    $('#clienteRecibirInputNombreTransferencia_div').addClass("ocultar");
    $('#clienteRecibirInputComentarioTransferencia').val("");
    $('#clienteRecibirInputComentarioTransferencia_div').addClass("ocultar");
    $('#clienteRecibirInputRNC').val("");
    $('#clienteRecibirInputRNC_div').addClass("ocultar");


    $('#controlTransaccionBancoIdModalScrollableTitle').text(nombre);
    $('#clienteInputIdCliente').val(idCliente);
    $('#clienteInputIdTransaccion').val(idTransaccion);
    $('#clienteInputCedula').val(cedula);
    $('#clienteInputPhone').val(phone);
    $('#clienteInputEmail1').val(email);
    $('#clienteInputRI').val(rangoInicial);
    $('#clienteInputRF').val(rangoFinal);
    $('#clienteInputValor').val(valorDolar);
    $('#clienteInputCantidad').val(cantidad);
    $('#clienteInputAccion').val(tipoTransaccion);
    $('#clienteInputEstatus').val(transaccion);
    $('#clienteInputFecha').val(fechaLastTransaccion);

    $('#clienteInputTipoPago').val(infoPagarTipoPago);

    if(infoPagarTipoPago == 'efectivo')
    {
        $('#clienteInputComentarioEfectivo').val(infoPagarComentarioEfectivo);
        $('#clienteInputComentarioEfectivo_div').removeClass('ocultar');
    }
    else if(infoPagarTipoPago == 'cheque')
    {
        $('#clienteInputNumeroCheque').val(infoPagarNumeroCheque);
        $('#clienteInputNumeroCheque_div').removeClass('ocultar');
        $('#clienteInputNombreCheque').val(infoPagarNombreCheque);
        $('#clienteInputNombreCheque_div').removeClass('ocultar');
        $('#clienteInputComentarioCheque').val(infoPagarComentarioCheque);
        $('#clienteInputComentarioCheque_div').removeClass('ocultar');
    }
    else if(infoPagarTipoPago == 'transferencia')
    {
        $('#clienteInputNumeroCuenta').val(infoPagarNumeroCuenta);
        $('#clienteInputNumeroCuenta_div').removeClass('ocultar');
        $('#clienteInputNombreTransferencia').val(infoPagarNombreTransferencia);
        $('#clienteInputNombreTransferencia_div').removeClass('ocultar');
        $('#clienteInputComentarioTransferencia').val(infoPagarComentarioTransferencia);
        $('#clienteInputComentarioTransferencia_div').removeClass('ocultar');
        $('#clienteInputRNC').val(infoPagarRnc);
        $('#clienteInputRNC_div').removeClass('ocultar');
    }

    $('#clienteRecibirInputTipoPago').val(infoRecibirTipoPago);
    if(infoRecibirTipoPago == 'efectivo')
    {
        $('#clienteRecibirInputComentarioEfectivo').val(infoRecibirComentarioEfectivo);
        $('#clienteRecibirInputComentarioEfectivo_div').removeClass('ocultar');
    }
    else if(infoRecibirTipoPago == 'cheque')
    {
        $('#clienteRecibirInputNombreCheque').val(infoRecibirNombreCheque);
        $('#clienteRecibirInputNombreCheque_div').removeClass('ocultar');
        $('#clienteRecibirInputComentarioCheque').val(infoRecibirComentarioCheque);
        $('#clienteRecibirInputComentarioCheque_div').removeClass('ocultar');
    }
    else if(infoRecibirTipoPago == 'transferencia')
    {
        $('#clienteRecibirInputNumeroCuenta').val(infoRecibirNumeroCuenta);
        $('#clienteRecibirInputNumeroCuenta_div').removeClass('ocultar');
        $('#clienteRecibirInputNombreTransferencia').val(infoRecibirNombreTransferencia);
        $('#clienteRecibirInputNombreTransferencia_div').removeClass('ocultar');
        $('#clienteRecibirInputComentarioTransferencia').val(infoRecibirRnc);
        $('#clienteRecibirInputComentarioTransferencia_div').removeClass('ocultar');
        $('#clienteRecibirInputRNC').val(infoRecibirComentarioTransferencia);
        $('#clienteRecibirInputRNC_div').removeClass('ocultar');
    }

    $("#botonModalBancoTransaccionAccion").click();
}

function confirmarTransaccion()
{
    var idTransaccion = $('#clienteInputIdTransaccion').val();
    var estatus = $('#clienteInputEstatus').val();
    var ruta          = $('#bancoInputRutaTransaccion').val();

    var datos = [];

    if($("#bancoTrasanccionConfirmacionConfirmar").val() != 'confirmar')
    {
        mensaje('mensajeModalControlTransaccionBanco', 'Favor de escribir "confirmar"', 1, 0);

        $('#bancoTrasanccionConfirmacionConfirmar').focus();
        return;
    }

    datos.push(idTransaccion);
    datos.push(estatus);

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : datos
        },
        success: function (d) {
            setTimeout(function() {
                mensaje('mensajeModalControlTransaccionBanco', d, 1, 0);
            }, 1000);
            window.location = $("#bancoInputRutaRecargarTransaccion").val();
        },
        error: function()
        {

        }
    });
}

function confirmarCancelacion()
{
    $("#bancoTrasanccionConfirmacionConfirmar").val("");
    $("#bancoTrasanccionConfirmacionCancelar").val("");

    $('#idBancoTransaccionRazonCancelar').removeClass('ocultar');
    $('#confirmarIdTransaccionBanco').addClass('ocultar');

    $('#confirmar_boton_banco_transaccion').addClass('ocultar');
    $('#cancelar_boton_banco_transaccion').addClass('ocultar');

    $('#cancelar_boton_banco_transaccion_cerrar_modal').removeClass('ocultar');
    $('#_confirmar_cancelar_boton_banco_transaccion').removeClass('ocultar');
}

function cancelandoTransaccion()
{
    var razon          = $("#bancoTrasanccionConfirmacionCancelar").val();
    var ruta           = $("#bancoInputRutaCancelarTransaccion").val();
    var idTransaccion  = $("#clienteInputIdTransaccion").val();
    var idCambioDivisa = 0;
    var idCliente      = $("#clienteInputIdCliente").val();
    var estatus        = $("#clienteInputEstatus").val();
    var datos          = [];

    if(razon.length == 0)
    {
        mensaje('mensajeModalControlTransaccionBanco', "Favor de escribir la razon", 1, 0);

        $('#bancoTrasanccionConfirmacionCancelar').focus();
        return;
    }

    datos.push(idCambioDivisa);
    datos.push(idCliente);
    datos.push(razon);
    datos.push(estatus);
    datos.push(idTransaccion);

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : datos
        },
        success: function (d) {
            mensaje('mensajeModalControlTransaccionBanco', d, 2, 0);
            setTimeout(function() {
                $("#cancelar_boton_banco_transaccion_cerrar_modal").click();
                $("#bancoTrasanccionConfirmacionCancelar").val("");
                $('#idBancoTransaccionRazonCancelar').addClass('ocultar');
                $('#confirmar_boton_banco_transaccion').removeClass('ocultar');
                $('#cancelar_boton_banco_transaccion').removeClass('ocultar');
                $('#cancelar_boton_banco_transaccion_cerrar_modal').addClass('ocultar');
                $('#_confirmar_cancelar_boton_banco_transaccion').addClass('ocultar');
                window.location = $("#bancoInputRutaRecargarTransaccion").val();
            }, 1000);
        },
        error: function()
        {

        }
    });
}

function cancelarcancelacion()
{
    $("#bancoTrasanccionConfirmacionConfirmar").val("");
    $("#bancoTrasanccionConfirmacionCancelar").val("");

    $('#idBancoTransaccionRazonCancelar').addClass('ocultar');
    $('#confirmarIdTransaccionBanco').removeClass('ocultar');

    $('#confirmar_boton_banco_transaccion').removeClass('ocultar');
    $('#cancelar_boton_banco_transaccion').removeClass('ocultar');

    $('#cancelar_boton_banco_transaccion_cerrar_modal').addClass('ocultar');
    $('#_confirmar_cancelar_boton_banco_transaccion').addClass('ocultar');
}

function cargarInfoTipoDePagoDelBanco()
{
    var data                    = [];
    var comentario              = $("#InputInfoPagarEfectivoDelBanco").val();
    var nombreCheque            = $("#InputInfoPagarNombreChequeDelBanco").val();
    var comentarioCheque        = $("#InputInfoPagarComentarioChequeDelBanco").val();
    var nombreTransferencia     = $("#InputInfoPagarNombreTransferirDelBanco").val();
    var numeroTransferencia     = $("#InputInfoPagarCuentaTransferirDelBanco").val();
    var rncTransferencia        = $("#InputInfoPagarRncTransferirDelBanco").val();
    var comentarioTransferencia = $("#InputInfoPagarComentarioTransferirDelBanco").val();
    var ruta                    = $("#InputInfoPagarRutaBanco").val();

    data.push(comentario);
    data.push(nombreCheque);
    data.push(comentarioCheque);
    data.push(nombreTransferencia);
    data.push(numeroTransferencia);
    data.push(rncTransferencia);
    data.push(comentarioTransferencia);

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {
            mensaje('MensajeConfiguracionTipoDePagoBanco', d, 2, 0);
        },
        error: function()
        {

        }
    });
}
