<?php

namespace App\Http\Controllers;

use App\Cancelinfo;
use App\Clientetipopagoinfo;
use App\Formapagoclientealbanco;
use App\Historicotransaccion;
use App\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tasageneral;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class XcommController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function __construct()
    {
        $this->middleware('auth:users')->except('index', 'authenticate');
    }

    protected function redirectTo()
    {
        return '/login_xcomm';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('xcomm.login_xcomm');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if(Auth::guard('users')->attempt($credentials))
        {
            return redirect()->intended('dashboard_xcomm');
        }
        return back()->withInput();
    }

    public function dashboard()
    {
        return view('xcomm.dashboard');
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect('/login_xcomm');
    }

    public function formAddTasaGeneral(Tasageneral $tasageneral)
    {
        $info = $tasageneral->all();
        if($info->isEmpty())
        {
            $info = [];
        }
        return view('xcomm.form_tasa_general', compact('info'));
    }

    public function eliminarTasaGeneral($id)
    {
        Tasageneral::where('id', '=', $id)->delete();
        return;
    }

    public function addTasaGeneral(Request $request)
    {
        $info = [];
        $datos = (array) $request->all();

        foreach ($datos['data'] as $key => $d)
        {
            $separado = explode('_', $key);
            if(count($separado)>1)
            {
                $info[$separado[1]][$separado[0]] = $d;
            }
        }

        foreach ($info as $value)
        {
            if($value["idEntidadBancariaValueId"] == 0)
            {
                $this->insertarTasaGenerales($value);
            }
            else if($value["idEntidadBancariaValueId"] >= 1)
            {
                $this->updateTasaGenerales($value);
            }
        }
    }

    protected function insertarTasaGenerales($value)
    {
        $tasageneral = new Tasageneral;

        $tasageneral->banco        = $value['idEntidadBancaria'];
        $tasageneral->compra_dolar = $value['idCompraDolar'];
        $tasageneral->venta_dolar  = $value['idVentaDolar'];
        $tasageneral->compra_euro  = $value['idCompraEuro'];
        $tasageneral->venta_euro   = $value['idVentaEuro'];
        $tasageneral->status       = 'active';
        $tasageneral->created_at   = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $tasageneral->updated_at   = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $tasageneral->save();
        return;
    }

    protected function updateTasaGenerales($value)
    {
        $tasageneraln = new Tasageneral;

        $tasageneral  = $tasageneraln::find($value['idEntidadBancariaValueId']);

        $tasageneral->banco        = $value['idEntidadBancaria'];
        $tasageneral->compra_dolar = $value['idCompraDolar'];
        $tasageneral->venta_dolar  = $value['idVentaDolar'];
        $tasageneral->compra_euro  = $value['idCompraEuro'];
        $tasageneral->venta_euro   = $value['idVentaEuro'];
        $tasageneral->status       = 'active';
        $tasageneral->updated_at   = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $tasageneral->save();
        return;
    }

    public function listadoTransaccionesAbiertas()
    {
        $info = [];
        $transaccion = new Transaccion();
        $title       = 'Transacciones Abiertas';

        $trans_info = $transaccion::select("*", "transaccions.id as id_transaccion_good")->
            leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')->
            leftjoin('entidadbancarias', 'transaccions.entidadbancaria_id', '=', 'entidadbancarias.id')->
            leftjoin('filetransactions', 'transaccions.id', '=', 'filetransactions.transaccion_id')->
            where("transaccions.status", "=", "active")->
            where("transaccions.transaccion", "<>", "transaccion_completada")->get();

        if($trans_info->isNotEmpty())
        {
            $info = $trans_info;
        }
        return view('xcomm.transacciones_abiertas', compact('info', 'title'));
    }

    /////////listado Transaccion Cerrado
    public function listadoTransaccionesCerrado()
    {
        $info = [];
        $transaccion = new Transaccion();
        $title       = 'Transacciones Cerradas';

        $trans_info = $transaccion::select("*", "transaccions.id as id_transaccion_good")->
        leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')->
        leftjoin('entidadbancarias', 'transaccions.entidadbancaria_id', '=', 'entidadbancarias.id')->
        leftjoin('filetransactions', 'transaccions.id', '=', 'filetransactions.transaccion_id')->
        where("transaccions.status", "=", "active")->
        where("transaccions.transaccion", "=", "transaccion_completada")->get();

        if($trans_info->isNotEmpty())
        {
            $info = $trans_info;
        }

        return view('xcomm.transacciones_abiertas', compact('info', 'title'));
    }

    public function listadoTransaccionesCanceladas()
    {
        $info = [];
        $transaccion = new Transaccion();
        $title       = 'Transacciones Canceladas';

        $trans_info = $transaccion::select("*", "transaccions.id as id_transaccion_good")->
        leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')->
        leftjoin('entidadbancarias', 'transaccions.entidadbancaria_id', '=', 'entidadbancarias.id')->
        leftjoin('filetransactions', 'transaccions.id', '=', 'filetransactions.transaccion_id')->
        where("transaccions.status", "=", "inactive")->get();
//        where("transaccions.transaccion", "=", "transaccion_completada")->get();

        if($trans_info->isNotEmpty())
        {
            $info = $trans_info;
        }

        return view('xcomm.transacciones_abiertas', compact('info', 'title'));
    }

    public function openNewTabPdfFile($file_name)
    {
        return Storage::download('public/test/'.$file_name);
    }

    public function cancelarTransaccion(Request $request)
    {
        $info = $request->all();
        $cancel = new Cancelinfo();

        $transaccion = new Transaccion();
        $transaccion_info = $transaccion::find($info['data'][4]);

        $cancel->transaccion_id = $info['data'][4]; //Esta es para poner el transaccion_id
        /////////////cacelando la transaccion //////////////////////

        $transaccion_info->transaccion = 'cancelado_por_xcomm';
        $transaccion_info->status      = 'inactive';
        $transaccion_info->save();

        /// ///////////Fin////////////////////////////

        $cancel->cambiodivisa_id = $info['data'][0]; //Esta es para poner el cambiodivisa_id

        $cancel->cliente_id         = $info['data'][1]; //Esta es para poner el cliente_id
        $cancel->info               = $info['data'][2]; //Esta es para poner el info
        $cancel->status_transaccion = $info['data'][3]; //Esta es para poner el transaccion estatus
        $cancel->status             = "active";
        $cancel->created_at         = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $cancel->updated_at         = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $cancel->save();

        return response()->json('Cancelado');
    }

    public function verTransaccionesClientesAbiertas($id_cliente)
    {
        $info = [];
        $transaccion = new Transaccion();

        $cliente_transaccion = $transaccion::where('cliente_id', '=', $id_cliente)
            ->where('transaccion', '<>', 'transaccion_completada')
            ->where('transaccion', '<>', 'cancelado_banco')
            ->where('transaccion', '<>', 'cancelado_por_tiempo')
            ->where('transaccion', '<>', 'cancelado_por_xcomm')
            ->where('transaccion', '<>', 'cancelado_por_cliente')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {
            $info = $cliente_transaccion;
        }
        return view('xcomm.transacciones_clientes', compact('info', 'id_cliente'));
    }

    public function verTransaccionesClientesCompletadas($id_cliente)
    {
        $info = [];
        $transaccion = new Transaccion();

        $cliente_transaccion = $transaccion::where('cliente_id', '=', $id_cliente)
            ->where('transaccion', '=', 'transaccion_completada')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {
            $info = $cliente_transaccion;
        }
        return view('xcomm.transacciones_clientes', compact('info', 'id_cliente'));
    }

    public function verTransaccionesClientesCanceladas($id_cliente)
    {
        $info = [];
        $transaccion = new Transaccion();

        $cliente_transaccion = $transaccion::where('cliente_id', '=', $id_cliente)
            ->where('status', '=', 'inactive')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {
            $info = $cliente_transaccion;
        }
        return view('xcomm.transacciones_clientes', compact('info', 'id_cliente'));
    }

    public function verHistorico($id_transaccion)
    {
        $info = [];
        $detalle_pagar_cliente = [];
        $detalle_recibir_pago_cliente = [];
        $cancelado_info = [];
        $historico = Historicotransaccion::select("*", "historicotransaccions.id as idht", "transaccions.id as idt", "clientes.id as idc", "historicotransaccions.created_at as hist_date", "transaccions.status as trans_status")
            ->leftJoin('transaccions', 'historicotransaccions.transaccion_id', '=', 'transaccions.id')
            ->leftJoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->where('transaccions.id', '=', $id_transaccion)
            ->orderBy('historicotransaccions.id', 'desc')
            ->get();
        if($historico->isNotEmpty())
        {
            $info = $historico;
            $pagar_cliente = Clientetipopagoinfo::where('transaccion_id', '=', $historico[0]['transaccion_id'])
                ->get();
            $recibir_pago = Formapagoclientealbanco::where('transaccion_id', '=', $historico[0]['transaccion_id'])
                ->get();
            if($pagar_cliente->isNotEmpty())
            {
                $detalle_pagar_cliente = $pagar_cliente[0];
            }
            if($recibir_pago->isNotEmpty())
            {
                $detalle_recibir_pago_cliente = $recibir_pago[0];
            }
            if($info[0]["trans_status"] == 'inactive')
            {
                $cancelado = Cancelinfo::where('transaccion_id', '=', $historico[0]['transaccion_id'])
                    ->get();
                if($cancelado->isNotEmpty())
                {
                    $cancelado_info = $cancelado[0];
                }
            }
        }
        return view('xcomm.historico_transaccion', compact('info', 'detalle_pagar_cliente', 'detalle_recibir_pago_cliente', 'cancelado_info'));
    }

}
