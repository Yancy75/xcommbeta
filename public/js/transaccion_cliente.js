function validarTransferenciaPorCliente(idCliente, idTransaccion, rangoInicial, rangoFinal, valorDolar, cantidad, tipoTransaccion, transaccion, fechaLastTransaccion, nombreBanco, tipo_pago, comentario_efectivo, nombre_cheque, comentario_cheque, numero_cuenta, nombre_transferencia, rnc, comentario_transferencia, forma_pago_cliente_al_banco)
{
    $('#controlTransaccionClienteIdModalScrollableTitle').text("");
    $('#clienteInputIdTransaccion').val("");
    $('#clienteInputRI').val("");
    $('#clienteInputRF').val("");
    $('#clienteInputValor').val("");
    $('#clienteInputCantidad').val("");
    $('#clienteInputAccion').val("");
    $('#clienteInputEstatus').val("");
    $('#clienteInputFecha').val("");

    $('#clienteInputInstTipoPago').val("");
    $('#clienteInputInstComentarioEfectivo').val("");
    $('#clienteInputInstNombreCheque').val("");
    $('#clienteInputInstComentarioCheque').val("");
    $('#clienteInputInstNumeroCuenta').val("");
    $('#clienteInputInstNombreTransferencia').val("");
    $('#clienteInputInstRnc').val("");
    $('#clienteInputInstComentarioTransferencia').val("");

    // $('#clienteInputInstTipoPago_div').addClass('ocultar');
    $('#clienteInputInstComentarioEfectivo_div').addClass('ocultar');
    $('#clienteInputInstNombreCheque_div').addClass('ocultar');
    $('#clienteInputInstComentarioCheque_div').addClass('ocultar');
    $('#clienteInputInstNumeroCuenta_div').addClass('ocultar');
    $('#clienteInputInstNombreTransferencia_div').addClass('ocultar');
    $('#clienteInputInstRnc_div').addClass('ocultar');
    $('#clienteInputInstComentarioTransferencia_div').addClass('ocultar');

    $('#clienteInputInstTipoPago').val(forma_pago_cliente_al_banco);
    if(forma_pago_cliente_al_banco = 'efectivo')
    {
        $('#clienteInputInstComentarioEfectivo').val(comentario_efectivo);
        $('#clienteInputInstComentarioEfectivo_div').removeClass('ocultar');
    }
    else if(forma_pago_cliente_al_banco = 'cheque')
    {
        $('#clienteInputInstNombreCheque').val(nombre_cheque);
        $('#clienteInputInstComentarioCheque').val(comentario_cheque);
        $('#clienteInputInstRnc').val(rnc);
        $('#clienteInputInstNombreCheque_div').removeClass('ocultar');
        $('#clienteInputInstComentarioCheque_div').removeClass('ocultar');
        $('#clienteInputInstRnc_div').removeClass('ocultar');
    }
    else if(forma_pago_cliente_al_banco = 'transferencia')
    {
        $('#clienteInputInstNumeroCuenta').val(numero_cuenta);
        $('#clienteInputInstNombreTransferencia').val(nombre_transferencia);
        $('#clienteInputInstRnc').val(rnc);
        $('#clienteInputInstComentarioTransferencia').val(comentario_transferencia);
        $('#clienteInputInstNumeroCuenta_div').removeClass('ocultar');
        $('#clienteInputInstNombreTransferencia_div').removeClass('ocultar');
        $('#clienteInputInstRnc_div').removeClass('ocultar');
        $('#clienteInputInstComentarioTransferencia_div').removeClass('ocultar');
    }


    $('#controlTransaccionClienteIdModalScrollableTitle').text(nombreBanco);
    $('#clienteInputIdTransaccion').val(idTransaccion);
    $('#clienteInputRI').val(rangoInicial);
    $('#clienteInputRF').val(rangoFinal);
    $('#clienteInputValor').val(valorDolar);
    $('#clienteInputCantidad').val(cantidad);
    $('#clienteInputAccion').val(tipoTransaccion.replace('_',' '));
    $('#clienteInputEstatus').val(transaccion.replace('_',' '));
    $('#clienteInputFecha').val(fechaLastTransaccion);

    $("#botonModalClienteTransaccionAccion").click();
}

function confirmarTransaccionPorCliente()
{
    var idTransaccion = $('#clienteInputIdTransaccion').val();
    var estatus       = $('#clienteInputEstatus').val().replace(' ','_');
    var ruta          = $('#ClienteInputRutaTransaccion').val();

    var datos = [];

    if($("#ClienteTrasanccionConfirmacionConfirmar").val() != 'confirmar')
    {
        mensaje('mensajeModalControlTransaccionCliente', 'Favor de escribir "confirmar"', 1, 0);

        $('#mensajeModalControlTransaccionCliente').focus();
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
                mensaje('mensajeModalControlTransaccionCliente', d, 1, 0);
            }, 1000);
            window.location = $("#ClienteInputRutaRecargarTransaccion").val();
        },
        error: function()
        {

        }
    });
}

function confirmarCancelacion()
{
    $("#ClienteTrasanccionConfirmacionConfirmar").val("");
    $("#ClienteTrasanccionConfirmacionCancelar").val("");

    $('#idClienteTransaccionRazonCancelar').removeClass('ocultar');
    $('#confirmarIdTransaccionCliente').addClass('ocultar');

    $('#confirmar_boton_cliente_transaccion').addClass('ocultar');
    $('#cancelar_boton_cliente_transaccion').addClass('ocultar');

    $('#cancelar_boton_cliente_transaccion_cerrar_modal').removeClass('ocultar');
    $('#confirmar_cancelar_boton_cliente_transaccion').removeClass('ocultar');
}

function cancelarcancelacion()
{
    $("#ClienteTrasanccionConfirmacionConfirmar").val("");
    $("#ClienteTrasanccionConfirmacionCancelar").val("");

    $('#idClienteTransaccionRazonCancelar').addClass('ocultar');
    $('#confirmarIdTransaccionCliente').removeClass('ocultar');

    $('#confirmar_boton_cliente_transaccion').removeClass('ocultar');
    $('#cancelar_boton_cliente_transaccion').removeClass('ocultar');

    $('#cancelar_boton_cliente_transaccion_cerrar_modal').addClass('ocultar');
    $('#confirmar_cancelar_boton_cliente_transaccion').addClass('ocultar');
}

function cancelandoTransaccion()
{
    var razon          = $("#ClienteTrasanccionConfirmacionCancelar").val();
    var ruta           = $("#ClienteInputRutaCancelarTransaccion").val();
    var idTransaccion  = $("#clienteInputIdTransaccion").val();
    var idCambioDivisa = 0;
    var idCliente      = $("#ClienteInputIdCliente").val();
    var estatus        = $("#clienteInputEstatus").val();
    var datos          = [];

    if(razon.length == 0)
    {
        mensaje('mensajeModalControlTransaccionCliente', "Favor de escribir la razon", 1, 0);

        $('#ClienteTrasanccionConfirmacionCancelar').focus();
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
            mensaje('mensajeModalControlTransaccionCliente', d, 2, 0);
            setTimeout(function() {
                $("#cancelar_boton_cliente_transaccion_cerrar_modal").click();
                $("#ClienteTrasanccionConfirmacionCancelar").val("");
                $('#idClienteTransaccionRazonCancelar').addClass('ocultar');
                $('#confirmar_boton_cliente_transaccion').removeClass('ocultar');
                $('#cancelar_boton_cliente_transaccion').removeClass('ocultar');
                $('#cancelar_boton_cliente_transaccion_cerrar_modal').addClass('ocultar');
                $('#confirmar_cancelar_boton_cliente_transaccion').addClass('ocultar');
                window.location = $("#ClienteInputRutaRecargarTransaccion").val();
            }, 1000);
        },
        error: function()
        {

        }
    });
}
