<?php

namespace App\Http\Controllers;

use App\Historicotransaccion;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use Carbon\Carbon;
use App\Cambiodivisa;
use App\Transaccion;
use App\Cancelinfo;
use App\Bancotipopagoinfo;
use App\Clientetipopagoinfo;
use App\Formapagoclientealbanco;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Filetransaction;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:cliente,users')->except('login', 'authenticate', 'logout', 'register', 'registrando');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente  = new Cliente();
        $clientes = $cliente->all();
        return view('xcomm.cliente_dashboard', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info    = $request->all();
        $cliente = new Cliente();
        $pattern ="/[()-]*\s*/";
        $replacement = '';

        $cliente->cedula     = $info["cedula"];
        $cliente->nombre     = $info["nombre"];
        $cliente->phone      = preg_replace($pattern, $replacement, $info["phone"]);
        $cliente->email      = $info["email"];
        $cliente->password   = bcrypt($info["password"]);
        $cliente->status     = "active";
        $cliente->created_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $cliente->updated_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $cliente->save();
        return redirect()->route('clientesDashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = new Cliente();
        $cliente_info = $cliente::find($id);

        return view('clientes.perfil', compact('cliente_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $clientes = new Cliente();
        $cliente  = $clientes::find($id);
        $info     = $request->all();
        $pattern ="/[()-]*\s*/";
        $replacement = '';

        $cliente->cedula     = $info["cedula"];
        $cliente->nombre     = $info["nombre"];
        $cliente->phone      = preg_replace($pattern, $replacement, $info["phone"]);
        $cliente->email      = $info["email"];
        if(array_key_exists('status', $info))
        {
            $cliente->status  = "active";
        }
        else
        {
            $cliente->status  = "inactive";
        }

        if(array_key_exists('password', $info))
        {
            $cliente->password   = bcrypt($info["password"]);
        }
        $cliente->save();

        //Para saber si se llamo la funcion desde la cuenta del cliente o de la cuenta de Xcomm mando desde la cuenta del cliente
        //un input indicando que se esta llamando desde la cuenta del cliente para devolver a la cuenta del cliente
        if(array_key_exists('tipo_usuario', $info))
        {
            if($info['tipo_usuario'] == 'cliente')
            {
                //redirecciona al perfil del cliente
                return redirect()->route('dashboardCliente');
            }
        }

        //redirecciona al listado de clientes de la cuenta de Xcomm
        return redirect()->route('clientesDashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('clientes.login_cliente');
    }

    public function register()
    {
        return view('clientes.register_cliente');
    }

    public function registrando(Request $request)
    {
        $request->validate([
            'nombre'   => 'required',
            'cedula'   => 'required|unique:clientes',
            'email'    => 'required|unique:clientes',
            'phone'    => 'required|unique:clientes',
            'password' => 'same:password2',
        ]);
        $credentials = $request->only('nombre', 'cedula', 'email', 'phone', 'password');

        $cliente = new Cliente();

        $cliente->cedula = $credentials['cedula'];
        $cliente->nombre = $credentials['nombre'];
        $cliente->email = $credentials['email'];

        $pattern ="/[()-]*\s*/";
        $replacement = '';

        $cliente->phone      = preg_replace($pattern, $replacement, $credentials['phone']);
        $cliente->password   = Hash::make($credentials['password']);
        $cliente->status     = 'inactive';
        $cliente->created_at = Carbon::now('America/La_Paz')->format('Y-m-d h:i:s');
        $cliente->updated_at = Carbon::now('America/La_Paz')->format('Y-m-d h:i:s');

        $cliente->save();
        return redirect()->route('enviarCorreoValidacion', ['dt' => 'ed4(3rf|'.$cliente->id.'|er456r_)67fde|'.$cliente->nombre.'|ped|'.$cliente->email.'|5rr55operes']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('cedula', 'email', 'phone', 'password');
        if(Auth::guard('cliente')->attempt($credentials))
        {
            return redirect()->intended('dashboard_cliente');
        }
        return back()->withInput();
    }

    public function logout()
    {
        Auth::guard('cliente')->logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $info = [];
        $transaccion = new Transaccion();
        $datos   = $transaccion::select('*')
                    ->where([
                        ['cliente_id', '=', Auth::guard('cliente')->id()],
                        ['transaccion', '<>', 'transaccion_completada'],
                        ['transaccion', '<>', 'cancelado_banco'],
                        ['transaccion', '<>', 'cancelado_por_tiempo'],
                        ['transaccion', '<>', 'cancelado_por_xcomm'],
                        ['transaccion', '<>', 'cancelado_por_cliente'],
                    ])->get();
        if($datos->isNotEmpty())
        {
            return redirect()->route('ver_transaccion_cliente');
//            return view('clientes.transaccion_view');
        }
        return view('clientes.dashboard_cliente');
    }

    public function buscarTransaccionCantidad(Request $request)
    {
        $datos = $request->all();
        $tipo_trans = $datos['data'][0];
        $cantidad   = $datos['data'][1];
        $info = [];

        $datos = $this->buscarTransaccionCantidadVentaDolar($cantidad);
        $c = 0;
        foreach ($datos as $d)
        {
            if($tipo_trans == 'venta_dolar')
            {
                if($d["inventario_dolar"] >= $cantidad)
                {
                    $info[$c]           = $d;
                    $info[$c]["accion"] = $tipo_trans;
                    $info[$c]["valor_moneda"] = $d["dolar_venta"];
                }
            }
            else if( $tipo_trans == 'compra_dolar')
            {
                if($d["inventario_dolar"] >= $cantidad)
                {
                    $info[$c]           = $d;
                    $info[$c]["accion"] = $tipo_trans;
                    $info[$c]["valor_moneda"] = $d["dolar_compra"];
                }
            }
            else if($tipo_trans == 'venta_euro')
            {
                if($d["inventario_euro"] >= $cantidad)
                {
                    $info[$c]           = $d;
                    $info[$c]["accion"] = $tipo_trans;
                    $info[$c]["valor_moneda"] = $d["euro_venta"];
                }
            }
            else if($tipo_trans == 'compra_euro')
            {
                if($d["inventario_euro"] >= $cantidad)
                {
                    $info[$c]           = $d;
                    $info[$c]["accion"] = $tipo_trans;
                    $info[$c]["valor_moneda"] = $d["euro_compra"];
                }
            }
            $c++;
        }

        return response()->json($info);
    }

    protected function buscarTransaccionCantidadVentaDolar($cantidad)
    {
        $info = [];
        $tasa_divisa = new Cambiodivisa();

        $listado_divisa = $tasa_divisa::select('*', 'cambiodivisas.id as divisa_id')
            ->leftJoin('entidadbancarias', 'cambiodivisas.entidadbancarias_id', '=', 'entidadbancarias.id')
            ->where([
            ["cambiodivisas.rango_inicial", "<=", $cantidad],
            ["cambiodivisas.rango_final", ">=", $cantidad],
            ["cambiodivisas.status", "=", "active"],
        ])->get();
        if($listado_divisa->isNotEmpty())
        {
            $info = $listado_divisa->all();
        }
        return $info;
    }

    private function restarCantidadInventario($id_cambio_divisa, $cantidad, $accion)
    {
        // Aqui resto la cantidad que se compro o vendio y se la resto del inventario
        //Debo validar si aun hay disponible
        $cambio_divisa = Cambiodivisa::find($id_cambio_divisa);
        if($accion == 'venta_dolar' || $accion == 'compra_dolar')
        {
            $cambio_divisa->inventario_dolar = $cambio_divisa->inventario_dolar - $cantidad;
            $cambio_divisa->save();
        }
        else if($accion == 'venta_euro' || $accion == 'compra_euro')
        {
            $cambio_divisa->inventario_euro = $cambio_divisa->inventario_euro - $cantidad;
            $cambio_divisa->save();
        }
        return;
    }

    public function addTransaccion(Request $request)
    {
        $info = $request->all();
        $id_banco         = $info['data'][0];
        $id_cambio_divisa = $info['data'][1];
        $id_cliente       = $info['data'][2];
        $valor_dolar      = $info['data'][3];
        $rango_inicial    = $info['data'][4];
        $rango_final      = $info['data'][5];
        $cantidad         = $info['data'][6];
        $nombre_banco     = $info['data'][7];
        $accion           = $info['data'][8];
        $metodo_pago_banco= $info['data'][9];
        $metodo           = $info['data'][10];

        $this->restarCantidadInventario($id_cambio_divisa, $cantidad, $accion);

        $transaccion = new Transaccion();

        $transaccion->cliente_id             = $id_cliente;
        $transaccion->entidadbancaria_id     = $id_banco;
        $transaccion->cambiodivisa_id        = $id_cambio_divisa;
        $transaccion->nombre_banco           = $nombre_banco;
        $transaccion->rango_incial           = $rango_inicial;
        $transaccion->rango_final            = $rango_final;
        $transaccion->valor_dolar            = $valor_dolar;
        $transaccion->cantidad               = $cantidad;
        $transaccion->tipo_transaccion       = $accion;
        $transaccion->transaccion            = 'creado_cliente';
        $transaccion->status                 = 'active';
        $transaccion->fecha_last_transaccion = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $transaccion->created_at             = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $transaccion->updated_at             = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $transaccion->save();

        $metodo_pago = new Clientetipopagoinfo();// Aqui lleno la informacion de como el cliente quiere que el banco le page
        if($metodo['metodo'] == 'efectivo')
        {
            $metodo_pago->transaccion_id      = $transaccion->id;
            $metodo_pago->tipo_pago           = $metodo['metodo'];
            $metodo_pago->comentario_efectivo = $metodo['detalle'];
        }
        elseif($metodo['metodo'] == 'cheque')
        {
            $metodo_pago->transaccion_id    = $transaccion->id;
            $metodo_pago->tipo_pago         = $metodo['metodo'];
            $metodo_pago->nombre_cheque     = $metodo['nombre'];
            $metodo_pago->comentario_cheque = $metodo['detalle'];
        }
        elseif($metodo['metodo'] == 'transferencia')
        {
            $metodo_pago->transaccion_id           = $transaccion->id;
            $metodo_pago->tipo_pago                = $metodo['metodo'];
            $metodo_pago->nombre_transferencia     = $metodo['nombre'];
            $metodo_pago->rnc                      = $metodo['rnc'];
            $metodo_pago->numero_cuenta            = $metodo['cuenta'];
            $metodo_pago->comentario_transferencia = $metodo['detalle'];
        }

        $metodo_pago->save();

        $metodo_pago_cliente_banco = new Formapagoclientealbanco(); // Aqui lleno la informacion de como el cliente le va a pagar al banco
        if($metodo_pago_banco['metodo'] == 'efectivo')
        {
            $metodo_pago_cliente_banco->transaccion_id      = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago           = $metodo_pago_banco['metodo'];
            $metodo_pago_cliente_banco->comentario_efectivo = $metodo_pago_banco['detalle'];
        }
        elseif($metodo_pago_banco['metodo'] == 'cheque')
        {
            $metodo_pago_cliente_banco->transaccion_id    = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago         = $metodo_pago_banco['metodo'];
            $metodo_pago_cliente_banco->nombre_cheque     = $metodo_pago_banco['nombre'];
            $metodo_pago_cliente_banco->rnc               = $metodo_pago_banco['rnc'];
            $metodo_pago_cliente_banco->nombre_banco      = $metodo_pago_banco['nombre_banco'];
            $metodo_pago_cliente_banco->numero_cheque     = $metodo_pago_banco['numero_cheque'];
            $metodo_pago_cliente_banco->comentario_cheque = $metodo_pago_banco['detalle'];
        }
        elseif($metodo_pago_banco['metodo'] == 'transferencia')
        {
            $metodo_pago_cliente_banco->transaccion_id           = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago                = $metodo_pago_banco['metodo'];
            $metodo_pago_cliente_banco->nombre_transferencia     = $metodo_pago_banco['nombre'];
            $metodo_pago_cliente_banco->rnc                      = $metodo_pago_banco['rnc'];
            $metodo_pago_cliente_banco->numero_cuenta            = $metodo_pago_banco['cuenta'];
            $metodo_pago_cliente_banco->nombre_banco             = $metodo_pago_banco['nombre_banco'];
            $metodo_pago_cliente_banco->comentario_transferencia = $metodo_pago_banco['detalle'];
        }

        $metodo_pago_cliente_banco->save();

        $accion = str_replace('_', ' ', $transaccion->transaccion);
        $this->historico($transaccion->id, $accion);

        return response()->json($transaccion);
    }

    public function addTransaccionFile(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id_upload_file' => 'mimes:pdf'
        ]);

        if($validation->passes()){
            // Get filename with extension
            $fileNameWithExt = $request->file('id_upload_file')->getClientOriginalName();

            // Get just filename
            $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension  = $request->file('id_upload_file')->getClientOriginalExtension();

            //Filename to Store
            $filenameToStore = $fileName."_".time().".".$extension;

            //Upload File
            $path = $request->file('id_upload_file')->storeAs('public/test', $filenameToStore);
        }
        else{
            ///Noo paso la validacion
            ///
            /// usar la funcion
            /// $validation->errors->all();
        }
        $info = $request->all();

        $id_banco         = $info['id_banco_transaccion_bancaria'];
        $id_cambio_divisa = $info['id_cambiodivisa_transaccion_bancaria'];
        $id_cliente       = $info['id_cliente_transaccion_bancaria'];
        $valor_dolar      = $info['valor_dolar_transaccion_bancaria_hi'];
        $rango_inicial    = $info['rango_inicial_transaccon_bancaria_hi'];
        $rango_final      = $info['rango_final_transaccon_bancaria_hi'];
        $cantidad         = $info['cantidad_transaccion_bancaria_hi'];
        $nombre_banco     = $info['banco_name_transaccion_bancaria'];
        $accion           = $info['id_accion_transaccion_bancaria'];
        $metodo_pago_banco= $info['customRadio'];
        $metodo           = $info['customRadio1'];

        $transaccion = new Transaccion();

        $transaccion->cliente_id             = $id_cliente;
        $transaccion->entidadbancaria_id     = $id_banco;
        $transaccion->cambiodivisa_id        = $id_cambio_divisa;
        $transaccion->nombre_banco           = $nombre_banco;
        $transaccion->rango_incial           = $rango_inicial;
        $transaccion->rango_final            = $rango_final;
        $transaccion->valor_dolar            = $valor_dolar;
        $transaccion->cantidad               = $cantidad;
        $transaccion->tipo_transaccion       = $accion;
        $transaccion->transaccion            = 'creado_cliente';
        $transaccion->status                 = 'active';
        $transaccion->fecha_last_transaccion = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $transaccion->created_at             = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $transaccion->updated_at             = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $transaccion->save();

        $uploadFile                 = new Filetransaction();
        $uploadFile->transaccion_id = $transaccion->id;
        $uploadFile->file_name      = $filenameToStore;
        $uploadFile->created_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $uploadFile->updated_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $uploadFile->save();

        $metodo_pago = new Clientetipopagoinfo();// Aqui lleno la informacion de como el cliente quiere que el banco le page
        if($metodo == 'efectivo')
        {
            $metodo_pago->transaccion_id      = $transaccion->id;
            $metodo_pago->tipo_pago           = $metodo;
            $metodo_pago->comentario_efectivo = $info['id_input_detalle_recibir_pago_efectivo_al_banco'];
        }
        elseif($metodo == 'cheque')
        {
            $metodo_pago->transaccion_id    = $transaccion->id;
            $metodo_pago->tipo_pago         = $metodo;
            $metodo_pago->nombre_cheque     = $info['id_input_nombre_recibir_pago_cheque_al_banco'];
            $metodo_pago->comentario_cheque = $info['id_input_detalle_recibir_pago_cheque_al_banco'];
        }
        elseif($metodo == 'transferencia')
        {
            $metodo_pago->transaccion_id           = $transaccion->id;
            $metodo_pago->tipo_pago                = $metodo;
            $metodo_pago->nombre_transferencia     = $info['id_input_nombre_recibir_pago_transferencia_al_banco'];
            $metodo_pago->rnc                      = $info['id_input_rnc_recibir_pago_transferencia_al_banco'];
            $metodo_pago->numero_cuenta            = $info['id_input_numero_cuenta_recibir_pago_transferencia_al_banco'];
            $metodo_pago->comentario_transferencia = $info['id_input_detalle_recibir_pago_transferencia_al_banco'];
        }

        $metodo_pago->save();

        $metodo_pago_cliente_banco = new Formapagoclientealbanco(); // Aqui lleno la informacion de como el cliente le va a pagar al banco
        if($metodo_pago_banco == 'efectivo')
        {
            $metodo_pago_cliente_banco->transaccion_id      = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago           = $metodo_pago_banco;
            $metodo_pago_cliente_banco->comentario_efectivo = $info['id_input_detalle_pago_efectivo_al_banco'];
        }
        elseif($metodo_pago_banco == 'cheque')
        {
            $metodo_pago_cliente_banco->transaccion_id    = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago         = $metodo_pago_banco;
            $metodo_pago_cliente_banco->nombre_cheque     = $info['id_input_nombre_pago_cheque_al_banco'];
            $metodo_pago_cliente_banco->rnc               = $info['id_input_rnc_pago_cheque_al_banco'];
            $metodo_pago_cliente_banco->nombre_banco      = $info['id_input_nombre_banco_pago_cheque_al_banco'];
            $metodo_pago_cliente_banco->numero_cheque     = $info['id_input_numero_cheque_pago_cheque_al_banco'];
            $metodo_pago_cliente_banco->comentario_cheque = $info['id_input_detalle_pago_cheque_al_banco'];
        }
        elseif($metodo_pago_banco == 'transferencia')
        {
            $metodo_pago_cliente_banco->transaccion_id           = $transaccion->id;
            $metodo_pago_cliente_banco->tipo_pago                = $metodo_pago_banco;
            $metodo_pago_cliente_banco->nombre_transferencia     = $info['id_input_nombre_pago_transferencia_al_banco'];
            $metodo_pago_cliente_banco->rnc                      = $info['id_input_rnc_pago_transferencia_al_banco'];
            $metodo_pago_cliente_banco->numero_cuenta            = $info['id_input_numero_cuenta_pago_transferencia_al_banco'];
            $metodo_pago_cliente_banco->nombre_banco             = $info['id_input_nombre_banco_pago_transferencia_al_banco'];
            $metodo_pago_cliente_banco->comentario_transferencia = $info['id_input_detalle_pago_transferencia_al_banco'];
        }

        $metodo_pago_cliente_banco->save();

        $accion = str_replace('_', ' ', $transaccion->transaccion);
        $this->historico($transaccion->id, $accion);

        return redirect()->route('ver_transaccion_cliente');
    }

    public function verTransaccion()
    {
        $info = [];
        $transaccion = new Transaccion();

        $cliente_transaccion = $transaccion::where('cliente_id', '=', Auth::guard('cliente')->id())
                                            ->where('transaccion', '<>', 'transaccion_completada')
                                            ->where('transaccion', '<>', 'cancelado_banco')
                                            ->where('transaccion', '<>', 'cancelado_por_tiempo')
                                            ->where('transaccion', '<>', 'cancelado_por_xcomm')
                                            ->where('transaccion', '<>', 'cancelado_por_cliente')
                                            ->get();

        if($cliente_transaccion->isNotEmpty())
        {

            if($cliente_transaccion[0]->transaccion == 'creado_cliente')
            {
                $cliente_transaccion[0]->funcion = $this->creadoClienteValidarPorBanco();
            }
            elseif($cliente_transaccion[0]->transaccion == 'autorizado_banco')
            {
                $cliente_transaccion[0]->funcion = $this->validarTransferenciaCliente($cliente_transaccion[0]);
            }
            elseif($cliente_transaccion[0]->transaccion == 'transaccion_cliente')
            {
                $cliente_transaccion[0]->funcion = $this->esperarBancoPorValidarDepositoYDepositoDelBancoAlCliente();
            }
            elseif($cliente_transaccion[0]->transaccion == 'transaccion_banco')
            {
                $cliente_transaccion[0]->funcion = $this->validarPorClienteDepositoDelBanco($cliente_transaccion[0]);
            }

            $info = $cliente_transaccion;
        }
        return view('clientes.transaccion_view', compact('info'));
    }

    //////////////////////////////////////////////////////////////////////////////////
    protected function creadoClienteValidarPorBanco()
    {
        return "Pendiente por banco...";
    }

    protected function validarTransferenciaCliente($info)
    {
        ///////
        $instruciones_banco = Bancotipopagoinfo::where('entidad_id', '=', $info->entidadbancaria_id)->get();
        $formar_pago_cliente_al_banco = Formapagoclientealbanco::where('transaccion_id', '=', $info->id)->get();
        ///

        $funcion = "validarTransferenciaPorCliente('{$info->cliente_id}', '{$info->id}', '{$info->rango_incial}', '{$info->rango_final}', '{$info->valor_dolar}', '{$info->cantidad}', '{$info->tipo_transaccion}', '{$info->transaccion}', '{$info->fecha_last_transaccion}', '{$info->nombre_banco}', '{$instruciones_banco[0]->tipo_pago}', '{$instruciones_banco[0]->comentario_efectivo}', '{$instruciones_banco[0]->nombre_cheque}', '{$instruciones_banco[0]->comentario_cheque}', '{$instruciones_banco[0]->numero_cuenta}', '{$instruciones_banco[0]->nombre_transferencia}', '{$instruciones_banco[0]->rnc}', '{$instruciones_banco[0]->comentario_transferencia}', '{$formar_pago_cliente_al_banco[0]->tipo_pago}');";
        return '<button type="button" class="btn btn-success" onclick="'.$funcion.'">Realizar Transferencia</button>';
    }

    protected function esperarBancoPorValidarDepositoYDepositoDelBancoAlCliente()
    {
        return "Pendiente por banco...";
    }

    protected function validarPorClienteDepositoDelBanco($info)
    {
        ///////
        $instruciones_banco = Bancotipopagoinfo::where('entidad_id', '=', $info->entidadbancaria_id)->get();
        $formar_pago_cliente_al_banco = Formapagoclientealbanco::where('transaccion_id', '=', $info->id)->get();
        ///
        ///
        $funcion = "validarTransferenciaPorCliente('{$info->cliente_id}', '{$info->id}', '{$info->rango_incial}', '{$info->rango_final}', '{$info->valor_dolar}', '{$info->cantidad}', '{$info->tipo_transaccion}', '{$info->transaccion}', '{$info->fecha_last_transaccion}', '{$info->nombre_banco}', '{$instruciones_banco[0]->tipo_pago}', '{$instruciones_banco[0]->comentario_efectivo}', '{$instruciones_banco[0]->nombre_cheque}', '{$instruciones_banco[0]->comentario_cheque}', '{$instruciones_banco[0]->numero_cuenta}', '{$instruciones_banco[0]->nombre_transferencia}', '{$instruciones_banco[0]->rnc}', '{$instruciones_banco[0]->comentario_transferencia}', '{$formar_pago_cliente_al_banco[0]->tipo_pago}');";
        return '<button type="button" class="btn btn-success" onclick="'.$funcion.'">Validar Deposito</button>';
    }
    /// /////////////////////////////////////////////////////////////////////////


    public function cancelarTransaccion(Request $request)
    {
        $info = $request->all();
        $cancel = new Cancelinfo();

        if(count($info['data']) == 5)
        {
            $cancel->transaccion_id = $info['data'][4]; //Esta es para poner el transaccion_id

            $transaccion = new Transaccion();
            $transaccion_info = $transaccion::find($info['data'][4]);

            /////////////cacelando la transaccion //////////////////////

            $transaccion_info->transaccion = 'cancelado_por_cliente';
            $transaccion_info->status      = 'inactive';
            $transaccion_info->save();

            /// ///////////Fin////////////////////////////

            if($info['data'][0] == 0)
            {
                $cancel->cambiodivisa_id = $transaccion_info->cambiodivisa_id;
            }
            else
            {
                $cancel->cambiodivisa_id    = $info['data'][0]; //Esta es para poner el cambiodivisa_id
            }
        }
        else
        {
            $cancel->cambiodivisa_id    = $info['data'][0]; //Esta es para poner el cambiodivisa_id
        }
        $cancel->cliente_id         = $info['data'][1]; //Esta es para poner el cliente_id
        $cancel->info               = $info['data'][2]; //Esta es para poner el info
        $cancel->status_transaccion = $info['data'][3]; //Esta es para poner el transaccion estatus
        $cancel->status             = "active";
        $cancel->created_at         = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $cancel->updated_at         = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $cancel->save();

        $accion = str_replace('_', ' ', $transaccion_info->transaccion);
        $this->historico($transaccion_info->id, $accion);

        return response()->json('Cancelado');
    }

    public function validarTransaccion(Request $request)
    {
        $datos = $request->input('data');

        if(is_null($datos))
        {
            //Poner un mensaje si llegan los datos vacios
            return response()->json('');
        }
        $done  = [];

        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($datos[0]);

        if($info_transaccion->transaccion != $datos[1])
        {
            //Aqui valido que los estados que se envian desde el formulario y el que esta en la base de datos sean iguales
            //Esto por si se cambian en la base de datos y alguien lo tiene abierto y no se ha actualizado
            dd($info_transaccion);
        }
        //selecciono que funcion corresponde en base al estatus de la transaccion
        if($datos[1] == "creado_cliente")
        {
            $done = $this->aceptarTransaccionDelCliente($datos[0]);
            $mensaje = 'Transaccion aceptada';
        }
        elseif($datos[1] == 'autorizado_banco')
        {
            $done = $this->validarTransaccionTransferenciaDelClienteAlBanco($datos[0]);
            $mensaje = 'Transaccion aceptada';
        }
        elseif($datos[1] == 'transaccion_banco')
        {
            $done = $this->confirmarTransferenciaDelBancoAlCliente($datos[0]);
            $mensaje = 'Transaccion aceptada';
        }

        return response()->json($mensaje);
    }

    protected function aceptarTransaccionDelCliente($idTransaccion)
    {
        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($idTransaccion);

        $info_transaccion->transaccion = "autorizado_banco";

        $accion = str_replace('_', ' ', $info_transaccion->transaccion);
        $this->historico($info_transaccion->id, $accion);

        $info_transaccion->save();

        return;
    }

    protected function validarTransaccionTransferenciaDelClienteAlBanco($idTransaccion)
    {
        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($idTransaccion);

        $info_transaccion->transaccion = "transaccion_cliente";

        $accion = "Transferencia Realizada";
//        $accion = str_replace('_', ' ', $info_transaccion->transaccion);
        $this->historico($info_transaccion->id, $accion);

        $info_transaccion->save();

        return;
    }

    protected function confirmarTransferenciaDelBancoAlCliente($idTransaccion)
    {
        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($idTransaccion);

        $info_transaccion->transaccion = "transaccion_completada";

        $accion = str_replace('_', ' ', $info_transaccion->transaccion);
        $this->historico($info_transaccion->id, $accion);

        $info_transaccion->save();

        return;
    }

    public function getInfoTipoPagoAlBanco(Request $request)
    {
        $banco_tipo_pago = new Bancotipopagoinfo();

        $id_banco = $request->data;

        $banco_info = $banco_tipo_pago::where("entidad_id","=",$id_banco)->get() ;

        return response()->json($banco_info);
    }

    public function goUploadFile($id_divisa, $cantidad, $accion, $banco)
    {
        $info = [];
        $tasa_divisa = new Cambiodivisa();

        $listado_divisa = $tasa_divisa::select('*', 'cambiodivisas.id as divisa_id')
            ->leftJoin('entidadbancarias', 'cambiodivisas.entidadbancarias_id', '=', 'entidadbancarias.id')
            ->where("cambiodivisas.id", "=", $id_divisa)->get();

        if($listado_divisa->isNotEmpty())
        {
            $info = $listado_divisa->all();
            $info[0]->cantidad   = $cantidad;
            $info[0]->id_cliente = Auth::guard('cliente')->id();
            $info[0]->accion     = $accion;
            $info[0]->banco      = $banco;

            if( $accion == "venta_dolar")
            {
                $info[0]->actvie_divisa = $info[0]->dolar_venta;
            }
            else if( $accion == 'compra_dolar')
            {
                $info[0]->actvie_divisa = $info[0]->dolar_compra;
            }
            else if($accion == 'venta_euro')
            {
                $info[0]->actvie_divisa = $info[0]->euro_venta;
            }
            else if($accion == 'compra_euro')
            {
                $info[0]->actvie_divisa = $info[0]->euro_compra;
            }
        }
        return view('clientes.transaccion_upload_file', compact('info'));
    }

    private function historico($id_transaccion, $accion)
    {
        $historico = new Historicotransaccion();

        $historico->transaccion_id = $id_transaccion;
        $historico->accion         = $accion;
        $historico->status         = "active";
        $historico->created_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $historico->updated_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $historico->save();

        Return;
    }

}
