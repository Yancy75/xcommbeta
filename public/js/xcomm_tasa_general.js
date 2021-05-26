function generarInputAddTasaGeneral()
{
    var control = parseInt($('#idEntidadBancariaControl').val());

    control = control + 1;

    var p = '<div class="card"><div class="card-header" style="padding-top: 0px; padding-bottom: 0px;"><h3 class="card-title titulo2"><i class="fas fa-university" style="padding-right: 0.2em;"></i>Nueva Entidad</h3><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div></div><div class="card-body"  style="background: white; border-radius: 10px;"><div class="form-group row">\n' +
        '                                <label for="idEntidadBancaria_'+control+'" class="col-sm-2 col-form-label">Entidad Bancaria</label>\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <input type="hidden" class="form-control input_masivo" id="idEntidadBancariaValueId_'+control+'" value="0">\n' +
        '                                    <input type="text" class="form-control input_masivo" id="idEntidadBancaria_'+control+'" value="">\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="form-group row">\n' +
        '                                <label for="idCompraDolar_'+control+'" class="col-sm-2 col-form-label">Compra Dolar</label>\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <input type="number" class="form-control input_masivo" id="idCompraDolar_'+control+'" >\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="form-group row">\n' +
        '                                <label for="idVentaDolar_'+control+'" class="col-sm-2 col-form-label">Venta Dolar</label>\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <input type="number" class="form-control input_masivo" id="idVentaDolar_'+control+'" >\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="form-group row">\n' +
        '                                <label for="idCompraEuro_'+control+'" class="col-sm-2 col-form-label">Compra Euro</label>\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <input type="number" class="form-control input_masivo" id="idCompraEuro_'+control+'" >\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                            <div class="form-group row">\n' +
        '                                <label for="idVentaEuro_'+control+'" class="col-sm-2 col-form-label">Venta Euro</label>\n' +
        '                                <div class="col-sm-10">\n' +
        '                                    <input type="number" class="form-control input_masivo" id="idVentaEuro_'+control+'" >\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                         </div></div>\n'+
        '                          <hr/>';

    $("#form_tasa_general").append(p);
    $('#idEntidadBancariaControl').val(control);
}
function guardarTasasGenerales()
{
    var data = {};
    var ruta = $("#ruta_agregar_tasas_bancos").val();

    $(".input_masivo").each(function(){
        var id = $(this).attr('id');
        data[id] = $(this).val();
    });

    $.ajax({
        url: ruta,
        type: 'get',
        data: {
            "data" : data
        },
        success: function (d) {

        },
        error: function()
        {

        }
    });
}

function eliminarTasaGenerales(control, banco)
{
    var ruta = $("#id_eliminar_tasa_"+control).val();
    if(confirm("Desea eliminar el banco "+banco))
    {
        $.ajax({
            url: ruta,
            type: 'get',
            success: function (d) {
            alert("Banco "+banco+" eliminado");
            location.reload();
            },
            error: function()
            {

            }
        });
    }
}
