function callModalModificarXommCliente(id, cedula, nombre, phone, email, status, ruta)
{
    $("#botonModificarClienteBanco").click();
    $("#formModifyClienteBanco").attr('action', ruta);
    $("#idClienteModifyClienteBanco").val(id);
    $("#modifyClienteInputCedula1").val(cedula);
    $("#modifyClienteInputNombre1").val(nombre);
    $("#modifyClienteInputPhone1").val(phone);
    $("#modifyClienteInputEmail1").val(email);
    if(status == 'active')
    {
        $("#modifyClienteInputCheck").prop('checked', true);
    }
    else
    {
        $("#modifyClienteInputCheck").prop('checked', false);
    }
}

function addInputChangePassword() {
    var p = '';
    p = '<label for="modifyClienteInputPassword1" class="control-label col-md-2 col-sm-2">Password </label><div class="col-md-10 col-sm-10"><div class="input-group">\n' +
        '<input type="password" class="form-control getValueGrupal" name="password" id="modifyClienteInputPassword1" placeholder="Password"><div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div></div>';
    $("#modifyClientePasswordInput").prepend(p);

    $('#botonAddPasswordToModificarCliente').addClass('ocultar');
}

function limpiarPassword()
{
    $('#botonAddPasswordToModificarCliente').removeClass('ocultar');
    $("#modifyAddPasswordInput").empty();
}
