function openModalXcomm(id,cliente_id, entidadbancaria_id, cambiodivisa_id, nombre_banco, rango_incial, rango_final, valor_dolar, cantidad, tipo_transaccion, transaccion, cedula, nombre, phone, email, transaccion_id, fecha)
{
    $('#controlTransaccionXcommIdModalScrollableTitle').html(nombre_banco);

    $('#clienteInputIdCliente').val(cliente_id);
    $('#clienteInputIdTransaccion').val(transaccion_id);
    $('#clienteInputIdCambioDivisa').val(cambiodivisa_id);
    $('#clienteInputCedula').val(cedula);
    $('#clienteInputPhone').val(phone);
    $('#clienteInputEmail1').val(email);
    $('#clienteInputRI').val(rango_incial);
    $('#clienteInputRF').val(rango_final);
    $('#clienteInputValor').val(valor_dolar);
    $('#clienteInputCantidad').val(cantidad);
    $('#clienteInputAccion').val(tipo_transaccion);
    $('#clienteInputEstatus').val(transaccion);
    $('#clienteInputFecha').val(fecha);

    $("#botonModalXcommTransaccionAccion").click();
}

function cancelandoTransaccion()
{
    var razon          = $("#xcommTrasanccionConfirmacionCancelar").val();
    var ruta           = $("#xcommInputRutaCancelarTransaccion").val();
    var idTransaccion  = $("#clienteInputIdTransaccion").val();
    var idCambioDivisa = $("#clienteInputIdCambioDivisa").val();
    var idCliente      = $("#clienteInputIdCliente").val();
    var estatus        = $("#clienteInputEstatus").val();
    var datos          = [];

    if(razon.length == 0)
    {
        mensaje('mensajeModalControlTransaccionXcomm', "Favor de escribir la razon", 1, 0);

        $('#xcommTrasanccionConfirmacionCancelar').focus();
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
            mensaje('mensajeModalControlTransaccionXcomm', d, 2, 0);
            setTimeout(function() {
                $("#cancelar_boton_xcomm_transaccion_cerrar_modal").click();
                $("#xcommTrasanccionConfirmacionCancelar").val("");
                window.location = $("#xcommInputRutaRecargarTransaccion").val();
            }, 1000);
        },
        error: function()
        {

        }
    });
}

function cancelarcancelacion()
{
    $("#xcommTrasanccionConfirmacionCancelar").val("");
    $("#closeModalBotonId12").click();
}
