/**
 * Created by Magalys on 9/12/2018.
 */

function validateClientIsProvider(url)
{
    var _token = $("input[name='_token']").val();

    $.ajax({
        url: url,
        type: 'GET',
        data: {
            '_token': _token
        },
        dataType: 'json',
        success: function ( val ) {
            $(".provider_inactive").removeClass('ocultar');
            $(".provider_active").removeClass('ocultar');
            if(jQuery.isEmptyObject(val))//me da verdadero si esta vacio y false si tiene data
            {
                $(".provider_active").addClass("ocultar");
            }
            else
            {
                $(".provider_inactive").addClass("ocultar");
            }
        }
    });
}


function mensaje(id, mensaje, tipo, fijo)
{
    console.log(mensaje);

    tipo = typeof tipo !== 'undefined' ?  tipo : 1;
    fijo = typeof fijo !== 'undefined' ?  fijo : 0;
    if(tipo == 1)
    {
        $("div#"+id).replaceWith("<div class='alert alert-danger ' role='alert' id='"+id+"'><strong>"+mensaje+"</strong></div>");
    }
    if(tipo == 2)
    {
        $("div#"+id).replaceWith("<div class='alert alert-info ' role='alert' id='"+id+"'><strong>"+mensaje+"</strong></div>");
    }
    if(fijo == 1)
    {
        $("#"+id).show();
    }
    if(fijo == 0)
    {
        $("#"+id).show().delay(5000).fadeOut(50);
    }
}

function getUrlPublic(url)
{
    var splitUrl = url.split('/');
    splitUrl.pop();
    return splitUrl.join("/");
}

function formatoFecha(fecha) {
    var fecha2 = fecha.split(" ");
    var fecha3 = fecha2[0].split("-");

    return fecha3[2]+"-"+fecha3[1]+"-"+fecha3[0]+" "+fecha2[1];
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}//fin function