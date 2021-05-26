<?php

namespace App\Http\Controllers;

use App\Cancelinfo;
use App\Clientetipopagoinfo;
use App\Comision;
use App\Formapagoclientealbanco;
use App\Historicotransaccion;
use App\Transaccion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Entidadbancaria;
use App\Cambiodivisa;
use App\Bancotipopagoinfo;

class BancoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:banco');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bancos.dashboard_banco');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $info = [];

        $con      = new Comision();
        $entidad  = new Entidadbancaria();
        $banco    = $entidad::find($id);
        $comision = $con::all();
        return view('bancos.cambio_divisa', compact('info', 'banco', 'comision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($datos, $id)
    {
        $cambio_divisa = new Cambiodivisa();

        $pattern = '/,/g';
        $replacement = '';

        $cambio_divisa->entidadbancarias_id = $id;
        $cambio_divisa->dolar_compra        = preg_replace($pattern, $replacement, $datos["dolar_compra"]);
        $cambio_divisa->dolar_venta         = preg_replace($pattern, $replacement, $datos["dolar_venta"]);
        $cambio_divisa->inventario_dolar    = preg_replace($pattern, $replacement, $datos["inventario_dolar"]);
        $cambio_divisa->euro_compra         = preg_replace($pattern, $replacement, $datos["comprar_euro"]);
        $cambio_divisa->euro_venta          = preg_replace($pattern, $replacement, $datos["venta_euro"]);
        $cambio_divisa->inventario_euro     = preg_replace($pattern, $replacement, $datos["inventario_euro"]);
        $cambio_divisa->rango_inicial       = preg_replace($pattern, $replacement, $datos["rango_inicial"]);
        $cambio_divisa->rango_final         = preg_replace($pattern, $replacement, $datos["rango_final"]);
        $cambio_divisa->status              = "active";

        $cambio_divisa->save();

        return $datos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = [];
        $cambio_divisa = new Cambiodivisa();
        $entidad       = new Entidadbancaria();
        $banco         = $entidad::find($id);
        $cambios = $cambio_divisa::where("entidadbancarias_id", $id)->get();
        if($cambios->isNotEmpty())
        {
            $info = $cambios;
        }
        return view('bancos.list_divisas', compact('info', 'banco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_banco, $id_divisa)
    {
        $info = [];
        $cambio_divisa = new Cambiodivisa();
        $entidad       = new Entidadbancaria();
        $con           = new Comision();
        $banco         = $entidad::find($id_banco);
        $cambios       = $cambio_divisa::where("id", $id_divisa)->get();
        $comision      = $con::all();
        if($cambios->isNotEmpty())
        {
            $info = $cambios;
        }
        return view('bancos.cambio_divisa', compact('info', 'banco', 'comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($datos, $id)
    {
        $cambio = new Cambiodivisa();
        $cambio_divisa = $cambio::find($datos['cambiodivisa_id']);

        $pattern = '/,/';
        $replacement = '';

        $cambio_divisa->dolar_compra        = preg_replace($pattern, $replacement, $datos["dolar_compra"]);
        $cambio_divisa->dolar_venta         = preg_replace($pattern, $replacement, $datos["dolar_venta"]);
        $cambio_divisa->inventario_dolar    = preg_replace($pattern, $replacement, $datos["inventario_dolar"]);
        $cambio_divisa->euro_compra         = preg_replace($pattern, $replacement, $datos["comprar_euro"]);
        $cambio_divisa->euro_venta          = preg_replace($pattern, $replacement, $datos["venta_euro"]);
        $cambio_divisa->inventario_euro     = preg_replace($pattern, $replacement, $datos["inventario_euro"]);
        $cambio_divisa->rango_inicial       = preg_replace($pattern, $replacement, $datos["rango_inicial"]);
        $cambio_divisa->rango_final         = preg_replace($pattern, $replacement, $datos["rango_final"]);

        $cambio_divisa->save();

        return $datos;
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

    public function insertOrUpdate(Request $request, $id)
    {
        $datos = $request->all();

        if(is_null($datos["cambiodivisa_id"]))
        {
            $dato = $this->store($datos, $id);
        }
        else
        {
            $dato = $this->update($datos, $id);
        }
        return redirect()->route('cargarCambioDivisaBanco', ['id' => $id]);
    }

    public function logout()
    {
        Auth('banco')->logout();
        return redirect('/');
    }

    public function verTransaccion()
    {
        $info     = [];
        $function = '';
        $transaccion = new Transaccion();
        $title       = 'Transacciones Abiertas';

        $cliente_transaccion = $transaccion::select("*", "transaccions.id as id_transaccion", "clientes.id as id_cliente")
            ->where('entidadbancaria_id', '=', Auth::guard('banco')->user()->entidadbancarias_id)
            ->leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->where('transaccions.transaccion', '<>', 'transaccion_completada')
            ->where('transaccions.transaccion', '<>', 'cancelado_banco')
            ->where('transaccions.transaccion', '<>', 'cancelado_por_tiempo')
            ->where('transaccions.transaccion', '<>', 'cancelado_por_xcomm')
            ->where('transaccions.transaccion', '<>', 'cancelado_por_cliente')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {

            foreach ($cliente_transaccion as $ct)
            {
                $function = $this->identificarFuncion($ct);
                $ct->function = $function;
                $info[] = $ct;
            }
        }
        return view('bancos.transaccion_view', compact('info', 'title'));
    }

    public function verTransaccionCerradas()
    {
        $info     = [];
        $function = '';
        $transaccion = new Transaccion();
        $title       = 'Transacciones Cerradas';

        $cliente_transaccion = $transaccion::select("*", "transaccions.id as id_transaccion", "clientes.id as id_cliente")
            ->where('entidadbancaria_id', '=', Auth::guard('banco')->user()->entidadbancarias_id)
            ->leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->where('transaccions.transaccion', '=', 'transaccion_completada')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {
            foreach ($cliente_transaccion as $ct)
            {
//                $function = $this->identificarFuncion($ct);
                $ct->function = "Completadas";
                $info[] = $ct;
            }
        }
        return view('bancos.transaccion_view', compact('info', 'title'));
    }

    public function verTransaccionCanceladas()
    {
        $info     = [];
        $function = '';
        $transaccion = new Transaccion();
        $title       = 'Transacciones Canceladas';

        $cliente_transaccion = $transaccion::select("*", "transaccions.id as id_transaccion", "clientes.id as id_cliente")
            ->where('entidadbancaria_id', '=', Auth::guard('banco')->user()->entidadbancarias_id)
            ->leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->where('transaccions.status', '=', 'inactive')
            ->get();

        if($cliente_transaccion->isNotEmpty())
        {
            foreach ($cliente_transaccion as $ct)
            {
//                $function = $this->identificarFuncion($ct);
                $ct->function = "Canceladas";
                $info[] = $ct;
            }
        }
        return view('bancos.transaccion_view', compact('info', 'title'));
    }

    protected function identificarFuncion($transaccion)
    {
        if($transaccion->transaccion == 'creado_cliente')
        {
            return $this->creadoClienteValidarBanco($transaccion);
        }
        elseif($transaccion->transaccion == 'autorizado_banco')
        {
            return $this->validadoBancoEsperaClienteTransferencia();
        }
        elseif($transaccion->transaccion == 'transaccion_cliente')
        {
            return $this->validarDepositoClienteyDepositoDelBanco($transaccion);
        }
        elseif($transaccion->transaccion == 'transaccion_banco')
        {
            return $this->DepositoHechoEsperaClienteValidar();
        }
    }

    ///////////////////funciones ver transaccion/////////////////////////////

    protected function creadoClienteValidarBanco($info)
    {
        $info_c_p_b  = Formapagoclientealbanco::where('transaccion_id', '=', $info->id_transaccion)->get(); // info del como el cliente va a pagar al banco
        $info_c_r_p = Clientetipopagoinfo::where('transaccion_id', '=', $info->id_transaccion)->get();// info cliente recibir pago

        //En esta se va a crear la funcion del lado del banco para validar la transaccion que acaba de ser creada por el cliente
        // Es del lado del banco
        $funcion = "validarPorBancoTransaccionCreadaPorCliente('{$info->id_cliente}', '{$info->nombre}', '{$info->cedula}', '{$info->phone}', '{$info->email}', '{$info->id_transaccion}', '{$info->rango_incial}', '{$info->rango_final}', '{$info->valor_dolar}', '{$info->cantidad}', '{$info->tipo_transaccion}', '{$info->transaccion}', '{$info->fecha_last_transaccion}', '{$info_c_p_b[0]->tipo_pago}', '{$info_c_p_b[0]->comentario_efectivo}', '{$info_c_p_b[0]->numero_cheque}', '{$info_c_p_b[0]->nombre_cheque}', '{$info_c_p_b[0]->comentario_cheque}', '{$info_c_p_b[0]->numero_cuenta}', '{$info_c_p_b[0]->nombre_transferencia}', '{$info_c_p_b[0]->comentario_transferencia}', '{$info_c_p_b[0]->rnc}', '{$info_c_r_p[0]->tipo_pago}', '{$info_c_r_p[0]->comentario_efectivo}', '{$info_c_r_p[0]->nombre_cheque}', '{$info_c_r_p[0]->comentario_cheque}', '{$info_c_r_p[0]->numero_cuenta}', '{$info_c_r_p[0]->nombre_transferencia}', '{$info_c_r_p[0]->rnc}', '{$info_c_r_p[0]->comentario_transferencia}');";
        return  '<button type="button" class="btn btn-success boton" onclick="'.$funcion.'"><i class="far fa-check-square"></i> Validar</button>';
    }

    protected function validadoBancoEsperaClienteTransferencia()
    {
        return 'Pendiente por cliente...';
    }

    protected function validarDepositoClienteyDepositoDelBanco($info)
    {
        $info_c_p_b  = Formapagoclientealbanco::where('transaccion_id', '=', $info->id_transaccion)->get(); // info del como el cliente va a pagar al banco
        $info_c_r_p = Clientetipopagoinfo::where('transaccion_id', '=', $info->id_transaccion)->get();// info cliente recibir pago

        //validar la transferencia hecho por el cliente y realizar el deposito al cliente
        $funcion = "validarPorBancoTransaccionCreadaPorCliente('{$info->id_cliente}', '{$info->nombre}', '{$info->cedula}', '{$info->phone}', '{$info->email}', '{$info->id_transaccion}', '{$info->rango_incial}', '{$info->rango_final}', '{$info->valor_dolar}', '{$info->cantidad}', '{$info->tipo_transaccion}', '{$info->transaccion}', '{$info->fecha_last_transaccion}', '{$info_c_p_b[0]->tipo_pago}', '{$info_c_p_b[0]->comentario_efectivo}', '{$info_c_p_b[0]->numero_cheque}', '{$info_c_p_b[0]->nombre_cheque}', '{$info_c_p_b[0]->comentario_cheque}', '{$info_c_p_b[0]->numero_cuenta}', '{$info_c_p_b[0]->nombre_transferencia}', '{$info_c_p_b[0]->comentario_transferencia}', '{$info_c_p_b[0]->rnc}', '{$info_c_r_p[0]->tipo_pago}', '{$info_c_r_p[0]->comentario_efectivo}', '{$info_c_r_p[0]->nombre_cheque}', '{$info_c_r_p[0]->comentario_cheque}', '{$info_c_r_p[0]->numero_cuenta}', '{$info_c_r_p[0]->nombre_transferencia}', '{$info_c_r_p[0]->rnc}', '{$info_c_r_p[0]->comentario_transferencia}');";
        return '<button type="button" class="btn btn-success boton" onclick="'.$funcion.'"><i class="fas fa-check"></i>Depositar al cliente</button>';
    }

    protected function DepositoHechoEsperaClienteValidar()
    {
        return 'Deposito Realizado...';
    }

    ///////////////////fin funciones ver transaccion/////////////////////////////

    public function validarTransaccion(Request $request)
    {
        $datos = $request->input('data');

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
        elseif($datos[1] == "transaccion_cliente")
        {
            $done = $this->TransferenciaClienteValidadoyDepositoRealizado($datos[0]);
            $mensaje = 'Transaccion aceptada';
        }

        return response()->json($mensaje);
    }

    protected function aceptarTransaccionDelCliente($idTransaccion)
    {
        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($idTransaccion);

        $info_transaccion->transaccion = "autorizado_banco";

        $info_transaccion->save();

        $accion = "Transaccion autorizada";
//        $accion = str_replace('_', ' ', $info_transaccion->transaccion);
        $this->historio_transaccion($info_transaccion->id, $accion);

        return;
    }

    protected function TransferenciaClienteValidadoyDepositoRealizado($idTransaccion)
    {
        $transaccion = new Transaccion();

        $info_transaccion = $transaccion::find($idTransaccion);

        $info_transaccion->transaccion = "transaccion_banco";

        $info_transaccion->save();

        $accion = "Deposito al cliente";
//        $accion = str_replace('_', ' ', $info_transaccion->transaccion);
        $this->historio_transaccion($info_transaccion->id, $accion);

        return;
    }

    public function cancelarTransaccion(Request $request)
    {
        $info = $request->all();
        $cancel = new Cancelinfo();

        $transaccion = new Transaccion();
        $transaccion_info = $transaccion::find($info['data'][4]);

        if(count($info['data']) == 5)
        {
            $cancel->transaccion_id = $info['data'][4]; //Esta es para poner el transaccion_id

            /////////////cacelando la transaccion //////////////////////

            $transaccion_info->transaccion = 'cancelado_banco';
            $transaccion_info->status      = 'inactive';
            $transaccion_info->save();

            /// ///////////Fin////////////////////////////

            if($info['data'][0] == 0)
            {
                $cancel->cambiodivisa_id = $transaccion_info->cambiodivisa_id;
            }
            else
            {
                $cancel->cambiodivisa_id = $info['data'][0]; //Esta es para poner el cambiodivisa_id
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

        $accion = "Transaccion cancelada";
//        $accion = str_replace('_', ' ', $transaccion_info->transaccion);
        $this->historio_transaccion($transaccion_info->id, $accion);

        return response()->json('Cancelado');
    }

    public function configuracionBanco($id)
    {
        $banco = new Entidadbancaria();

        $info = [];

        $entidad = $banco::where('id','=',$id)->get();
        if($entidad->isEmpty())
        {
            //////////////////////TOmar decision de que hacer si no se encuentra el Banco
        }

        $banco_tipo_pago_info = new Bancotipopagoinfo();

        $info_banco = $banco_tipo_pago_info::where('entidad_id', '=', $entidad[0]->id)->get();
        if($info_banco->isNotEmpty())
        {
            $info = $info_banco;
        }

        return view('bancos.configuracion_banco', compact('entidad', 'info'));
    }

    public function cargarInfoTipoPagoBanco(Request $request)
    {
        $info = $request->data;
        $banco_tipo_pago_info = new Bancotipopagoinfo();

        $info_banco = $banco_tipo_pago_info::where('entidad_id', '=', Auth::guard('banco')->user()->entidadbancarias_id)->get();

        if($info_banco->isEmpty())
        {
            $banco_tipo_pago_info->entidad_id = Auth::guard('banco')->user()->entidadbancarias_id;
            $banco_tipo_pago_info->tipo_pago  = "efectivo";
            $banco_tipo_pago_info->comentario_efectivo  = $info[0];
            $banco_tipo_pago_info->nombre_cheque        = $info[1];
            $banco_tipo_pago_info->comentario_cheque    = $info[2];
            $banco_tipo_pago_info->nombre_transferencia = $info[3];
            $banco_tipo_pago_info->numero_cuenta        = $info[4];
            $banco_tipo_pago_info->rnc                  = $info[5];
            $banco_tipo_pago_info->comentario_transferencia = $info[6];
            $banco_tipo_pago_info->created_at               = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
            $banco_tipo_pago_info->updated_at               = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

            $banco_tipo_pago_info->save();

            return response()->json('Guardado');
        }

        $info_banco[0]->entidad_id = Auth::guard('banco')->user()->entidadbancarias_id;
        $info_banco[0]->tipo_pago  = "efectivo";
        $info_banco[0]->comentario_efectivo  = $info[0];
        $info_banco[0]->nombre_cheque        = $info[1];
        $info_banco[0]->comentario_cheque    = $info[2];
        $info_banco[0]->nombre_transferencia = $info[3];
        $info_banco[0]->numero_cuenta        = $info[4];
        $info_banco[0]->rnc                  = $info[5];
        $info_banco[0]->comentario_transferencia = $info[6];
        $info_banco[0]->updated_at               = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $info_banco[0]->save();

        return response()->json('Guardado');
    }

    private function historio_transaccion($id_transaccion, $accion)
    {
        $historico = new Historicotransaccion();

        $historico->transaccion_id = $id_transaccion;
        $historico->usuario_id     = Auth::guard('banco')->user()->id;
        $historico->usuario_banco  = Auth::guard('banco')->user()->nombre;
        $historico->accion         = $accion;
        $historico->status         = "active";
        $historico->created_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $historico->updated_at     = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $historico->save();

        Return;
    }

    public function verHistorico($id_transaccion)
    {
        $info = [];
        $detalle_pagar_cliente = [];
        $detalle_recibir_pago_cliente = [];
        $cancelado_info = [];
        $historico = Historicotransaccion::select("*", "historicotransaccions.id as idht", "transaccions.id as idt", "clientes.id as idc", "historicotransaccions.created_at as hist_date")
            ->leftJoin('transaccions', 'historicotransaccions.transaccion_id', '=', 'transaccions.id')
            ->leftJoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->where('transaccion_id', '=', $id_transaccion)
            ->orderBy('historicotransaccions.id', 'desc')
            ->get();
        if($historico->isNotEmpty())
        {
            foreach ($historico as $his)
            {
                if($his->entidadbancaria_id == Auth::guard('banco')->user()->entidadbancarias_id)
                {
                    $info[] = $his;
                }
            }

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
        return view('bancos.historico_transaccion_banco', compact('info', 'detalle_pagar_cliente', 'detalle_recibir_pago_cliente', 'cancelado_info'));
    }
}
