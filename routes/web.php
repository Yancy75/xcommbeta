<?php

Route::get('/', function () {
  // var_dump(Auth::guard('users')->check());
  if (Auth::guard('users')->check()){
//      echo "usuario";
    //  return view('usua');
  }elseif (Auth::guard('banco')->check()){
    /* return view('bancos.dashboard_banco');*/
  }elseif (Auth::guard('cliente')->check()){
     return view('clientes.dashboard_cliente');
  }else{
     return view('bienvenidos');
  }
  //return view('bienvenidos');
})->name('bienvenidos');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('usuario');
Route::resource('usuario','Escritorio_usuario');
Route::resource('banco','Escritorio_banco');
Route::resource('administrador','Escritorio_administrador');
Route::resource('administrador','Escritorio_administrador_su');
Route::resource('estaticas', 'estaticos');
Route::resource('reporte', 'ReporteControlador');
Route::resource('correo','CorreoControlador');
Route::resource('banners', 'BannerController');


Route::get('/cantidad_transacciones', 'estaticos@monstrarTransaccionesDolarEuro')->name("monstrarTransaccionesDolarEuro");

Route::get('/tasa_generales', 'estaticos@tasaGeneral')->name("tasagenerales");

Route::get('/login_xcomm', 'XcommController@index')->name("login_xcomm");
Route::post('/login_xcomm', 'XcommController@authenticate')->name('xcommlogin');
Route::get('/dashboard_xcomm', 'XcommController@dashboard');
Route::get('/logout_xcomm', 'XcommController@logout')->name('xcommlogout');

Route::get('/carga_tasa_general', 'XcommController@formAddTasaGeneral')->name('xcommFormAddTasaGeneral');
Route::get('/cargando_tasa_general', 'XcommController@addTasaGeneral')->name('xcommAddTasaGeneral');
Route::get('/open_new_tab_pdf_file/{file_name}', 'XcommController@openNewTabPdfFile')->name('openNewTabPdfFile');
Route::get('/eliminar_tasa_general/{id}', 'XcommController@eliminarTasaGeneral')->name('eliminarTasaGeneral');

Route::get('/listado_transacciones_abiertas', 'XcommController@listadoTransaccionesAbiertas')->name('listadoTransaccionesAbiertas');
Route::get('/listado_transacciones_cerradas', 'XcommController@listadoTransaccionesCerrado')->name('listadoTransaccionesCerradas');
Route::get('/listado_transacciones_canceladas', 'XcommController@listadoTransaccionesCanceladas')->name('listadoTransaccionesCanceladas');

Route::get('/cancelar_transaccion_xcomm', 'XcommController@cancelarTransaccion')->name('cancelar_transaccion_xcomm');

Route::get('/entidades_bancarias', 'EntidadbancariaController@index')->name('xcommEntidadesBancarias');
Route::get('/add_entidades_bancarias', 'EntidadbancariaController@create')->name('xcommAddEntidadesBancarias');
Route::post('/add_entidades_bancarias', 'EntidadbancariaController@store')->name('xcommAddingEntidadesBancarias');

Route::get('/administrar_entidades_bancarias/{id}', 'EntidadbancariaController@administrar')->name('xcommAdministaraEntidadesBancarias');
Route::get('/activar_desactivar_banco/{id}', 'EntidadbancariaController@activarDesactivarBanco')->name('activarDesactivarBanco');

Route::post('/addUsuario_banco', 'UsariobancoController@store')->name('addUsuarioBanco');
Route::post('/modifyUsuario_banco/{id}', 'UsariobancoController@update')->name('modifyUsuarioBanco');

Route::get('/login_cliente', 'ClienteController@login')->name('loginCliente');
Route::post('/cliente_login', 'ClienteController@authenticate')->name('clientelogin');
Route::get('/register_cliente', 'ClienteController@register')->name('registerCliente');
Route::post('/cliente_register', 'ClienteController@registrando')->name('registrandoCliente');
Route::get('/enviar_correo_validacion/{dt}', 'CorreoControlador@enviarCorreoValidacion')->name('enviarCorreoValidacion');

Route::get('/cliente_administrar', 'ClienteController@index')->name('clientesDashboard');
Route::post('/administrar_add_cliente', 'ClienteController@store')->name('clientesAdd');
Route::post('/administrar_modify_cliente/{id}', 'ClienteController@update')->name('modifyClienteXcomm');

Route::get('/login_banco', 'UsariobancoController@index')->name('loginBanco');
Route::post('/login_banco', 'UsariobancoController@authenticate')->name('bancoLogin');

Route::get('/dashboard_banco', 'BancoController@index')->name('dashboardBanco');
Route::get('/logout_banco', 'BancoController@logout')->name('logoutBanco');
Route::get('/listado_usuario_banco/{id}', 'UsariobancoController@listaBanco')->name('listaUsuarioBanco');
Route::get('/cargar_cambio_divisa_banco/{id}', 'BancoController@show')->name('cargarCambioDivisaBanco');
Route::post('/cargar_cambio_divisa_banco_insertar/{id}', 'BancoController@insertOrUpdate')->name('cargandoCambioDivisaBanco');
Route::get('/agregar_cambio_divisa_banco/{id}', 'BancoController@create')->name('agregarCambioDivisaBanco');
Route::get('/modificar_cambio_divisa_banco/{id_banco}/{id_divisa}', 'BancoController@edit')->name('modificarCambioDivisaBanco');

Route::get('/dashboard_cliente', 'ClienteController@dashboard')->name('dashboardCliente');
Route::get('/logout_cliente', 'ClienteController@logout')->name('logoutCliente');

Route::post('/add_transaccion_cliente', 'ClienteController@addTransaccionFile')->name('add_transaccion_file');
Route::get('/add_transaccion_cliente', 'ClienteController@addTransaccion')->name('add_transaccion');
Route::get('/buscar_transaccion_cantidad', 'ClienteController@buscarTransaccionCantidad')->name('buscar_transaccion_cantidad');
Route::get('/ver_transaccion_cliente', 'ClienteController@verTransaccion')->name('ver_transaccion_cliente');
Route::get('/cancelar_transaccion_cliente', 'ClienteController@cancelarTransaccion')->name('cancelar_transaccion_cliente');
Route::get('/info_tipo_pago_al_banco', 'ClienteController@getInfoTipoPagoAlBanco')->name('infoTipoPagoAlBanco');

Route::get('perfil_cliente/{id}','CLienteController@show')->name('perfil');
Route::post('perfil_cliente_guardar/{id}','CLienteController@update')->name('savePerfil');

Route::get('/ver_transaccion_banco', 'BancoController@verTransaccion')->name('verTransaccionBanco');
Route::get('/ver_transaccion_banco_cerradas', 'BancoController@verTransaccionCerradas')->name('verTransaccionBancoCerradas');
Route::get('/ver_transaccion_banco_canceladas', 'BancoController@verTransaccionCanceladas')->name('verTransaccionBancoCanceladas');
Route::get('/validar_transaccion_banco', 'BancoController@validarTransaccion')->name('validarTransaccionBanco');
Route::get('/cancelar_transaccion_banco', 'BancoController@cancelarTransaccion')->name('cancelar_transaccion_banco');

Route::get('/validar_transaccion_cliente_modal', 'ClienteController@validarTransaccion')->name('validarTransaccionCliente');

Route::get('/configuracion_banco/{id}', 'BancoController@configuracionBanco')->name('configuracionBanco');

Route::get('/cargar_info_tipo_pago_banco/', 'BancoController@cargarInfoTipoPagoBanco')->name('cargarInfoTipoPagoBanco');

Route::get('/pagina_subir_archivo/{id_divisa}/{cantidad}/{accion}/{bancoName}', 'ClienteController@goUploadFile')->name('goPageUploadFile');

Route::get('/automata_cancelar_por_tiempo', 'estaticos@automataCancelarPorTiempo');

Route::get('/ver_transacciones_cliente/{id_cliente}', 'XcommController@verTransaccionesClientesAbiertas')->name('verTransaccionesClientes');
Route::get('/ver_transacciones_completadas/{id_cliente}', 'XcommController@verTransaccionesClientesCompletadas')->name('verTransaccionesClientesCompletadas');
Route::get('/ver_transacciones_canceladas/{id_cliente}', 'XcommController@verTransaccionesClientesCanceladas')->name('verTransaccionesClientesCanceladas');

Route::get('/ver_transacciones_historico/{id_transaccion}', 'XcommController@verHistorico')->name('verHistorico');
Route::get('/ver_transacciones_historico_banco/{id_transaccion}', 'BancoController@verHistorico')->name('verHistoricoBanco');

Route::get('/configuracion_xcomm', 'ConfiguracionController@index')->name('configuracionXcomm');
Route::post('/add_update_comision', 'ConfiguracionController@addUpdate')->name('addUpdateComision');

Route::post('/ver_reporte_comision', 'ReporteControlador@verReporteComision')->name('verReporteComision');

Route::get('/contacto', 'estaticos@contacto')->name('contactos');

Route::post('/enviar_contactanos', 'CorreoControlador@enviarContactanos')->name('enviarContactanos');
