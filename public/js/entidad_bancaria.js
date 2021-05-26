function activar_desactivar_banco(banco, status)
{
    var ruta = $('#id_activar_dasctivar_banco').val();
    var accion = '';
    var accion2 = '';

    if(status == 'active')
    {
        accion = 'inactivar';
        accion2 = 'inactivado';
    }
    else
    {
        accion = 'activar';
        accion2 = 'activado';
    }

    if(confirm("Desea "+accion+" el banco "+banco))
    {
        $.ajax({
            url: ruta,
            type: 'get',
            success: function (d) {
                alert("Banco "+banco+" "+accion2);
                location.reload();
            },
            error: function()
            {

            }
        });
    }
}
