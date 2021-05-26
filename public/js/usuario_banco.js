function addUsuarioBanco()
{
    var ruta  = $("#rutaAddUsuarioBanco").val();
    var _token = $("[name = _token]").val();
    var data  = {};

    $(".getValueGrupal").each(function () {
        if($(this).val() == 0)
        {
            mensaje('mensaje_add_usuario_banco', 'Llene los campos correspondientes', 0, 1);
            return false;
        }
        // data.push($(this).val());
        data[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: ruta,
        type: 'GET',
        data: {
            _token : _token,
            data   : data
        },
        dataType: 'JSON',
        success: function (d) {

        },
        error: function()
        {

        }
    });
}

function callModalModificarUsuarioBanco(id, nombre, email, level, estatus, ruta) {
    $("#botonModificarUsuarioBanco").click();
    $("#formModifyUsuarioBanco").attr('action', ruta);
    $("#idUsuarioModifyUsuarioBanco").val(id);
    $("#modifyUsuarioInputNombre1").val(nombre);
    $("#modifyUsuarioInputEmail1").val(email);
    $("#modifyUsuarioInputLevel option[value='"+level+"']").prop('selected', true);
    if(estatus == 'active')
    {
        $("#modifyUsuarioInputCheck").prop('checked', true);
    }
    else
    {
        $("#modifyUsuarioInputCheck").prop('checked', false);
    }
}

function addInputChangePassword() {
    var p = '';
    p = '<label for="modifyUsuarioInputPassword1" class="control-label col-md-2 col-sm-2">Password</label><div class="col-md-10 col-sm-10"><div class="input-group">';
    p +='<input type="password" class="form-control getValueGrupal" name="password" id="modifyUsuarioInputPassword1" placeholder="Password">';
    p +='<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div></div>';
    $("#modifyAddPasswordInput").prepend(p);

    $('#botonAddPasswordToModificarUsuario').addClass('ocultar');
}

function limpiarPassword()
{
    $('#botonAddPasswordToModificarUsuario').removeClass('ocultar');
    $("#modifyAddPasswordInput").empty();
}
