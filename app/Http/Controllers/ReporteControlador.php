<?php

namespace App\Http\Controllers;

use App\Comision;
use App\Transaccion;
use Illuminate\Http\Request;
use App\Entidadbancaria;
use Carbon\Carbon;

class ReporteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = new Entidadbancaria();
        $info = $bancos->all();
        return view('reporte.reporte_seleccionar_banco_fecha', compact('info'));
//        return view('reporte.reportes_usuario_basico');
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

    public function verReporteComision(Request $request)
    {
        $info = $request->all();

        $inicial = Carbon::createFromFormat('m/d/Y', $info['fecha_inicio']);
        $final   = Carbon::createFromFormat('m/d/Y', $info['fecha_final']);

        $transacciones = new Transaccion();

        $comisiones = new Comision();

        $entidad = new Entidadbancaria();

        $info_transacciones = $transacciones::where('entidadbancaria_id', '=', $info['id_banco'])
            ->whereBetween('fecha_last_transaccion', [$inicial->format("Y-m-d"), $final->format("Y-m-d")])
            ->get();

        //// Obtengo los totales de cada tipo de transaccion
        $totales = $this->calc_totales($info_transacciones);

        //listado de todas las transacciones completadas
        $completada_transacciones = $transacciones::where('entidadbancaria_id', '=', $info['id_banco'])
            ->leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->whereBetween('transaccions.fecha_last_transaccion', [$inicial->format("Y-m-d"), $final->format("Y-m-d")])
            ->where('transaccions.transaccion', '=', 'transaccion_completada')
            ->get();

        $completado = $this->format_info($completada_transacciones);

        //listado de todas las transacciones cancelada
        $canceled_transacciones = $transacciones::where('entidadbancaria_id', '=', $info['id_banco'])
            ->leftjoin('clientes', 'transaccions.cliente_id', '=', 'clientes.id')
            ->whereBetween('transaccions.fecha_last_transaccion', [$inicial->format("Y-m-d"), $final->format("Y-m-d")])
            ->where('transaccions.status', '=', 'inactive')
            ->get();

        $cancelado = $this->format_info($canceled_transacciones);

        //Comision
        $comision = $comisiones::all();
        $comi  = $comision[0]->comision/100;
        $comie = $comision[0]->comision_euro/100;

        $banco = $entidad::where('id', '=', $info['id_banco'])->get();
        $bank['code'] = strtoupper($banco[0]->code);
        $bank['name'] = $banco[0]->name;

        //Calculo del total a pagar comision
        $total = $totales[$bank['name']]['total'] * $comi;
        $total_euro_comision  = $totales[$bank['name']]['total_euro'] * $comie;
        $total_dolar_comision = $totales[$bank['name']]['total_dolar'] * $comi;
        $totales[$bank['name']]['total'] = number_format($total,2);

        return view('reporte.reportes_usuario_basico', compact('totales', 'completado', 'cancelado', 'comision', 'bank', 'total_euro_comision', 'total_dolar_comision'));
    }

    private function format_info($info)
    {
        $data = [];
        if($info->isNotEmpty())
        {
            $c = 0;
            foreach ($info as $in)
            {
                $data[$c]["nombre"]                 = $in->nombre;
                $data[$c]["tipo_transaccion"]       = ucwords(str_replace("_", " ", $in->tipo_transaccion, $count));
                $data[$c]["cantidad"]               = number_format($in->cantidad,2);
                $date                               = explode(" ", $in->fecha_last_transaccion);
                $date1                              = explode("-", $date[0]);
                $data[$c]["fecha_last_transaccion"] = $date1[1]."-".$date1[2]."-".$date1[0];

                $c++;
            }
        }
        return $data;
    }

    private function calc_totales($info_transacciones)
    {
        $totales = [];
        foreach ($info_transacciones as $info_transaccione) {
            if(!array_key_exists($info_transaccione['nombre_banco'], $totales))
            {
                $totales[$info_transaccione['nombre_banco']]['total_venta_dolar']  = 0;
                $totales[$info_transaccione['nombre_banco']]['total_compra_dolar'] = 0;
                $totales[$info_transaccione['nombre_banco']]['total_compra_euro']  = 0;
                $totales[$info_transaccione['nombre_banco']]['total_venta_euro']   = 0;
                $totales[$info_transaccione['nombre_banco']]['total']              = 0;
                $totales[$info_transaccione['nombre_banco']]['total_euro']         = 0;
                $totales[$info_transaccione['nombre_banco']]['total_dolar']        = 0;

                if($info_transaccione['transaccion'] == 'transaccion_completada')
                {
                    if($info_transaccione['tipo_transaccion'] == 'venta_dolar')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_venta_dolar']  = $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_dolar'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'compra_dolar')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_compra_dolar'] = $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_dolar'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'venta_euro')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_compra_euro']  = $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_euro'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'compra_euro')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_venta_euro']   = $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_euro'] += $info_transaccione['cantidad'];
                    }

                    $totales[$info_transaccione['nombre_banco']]['total'] = $info_transaccione['cantidad'];
                }

            }
            else
            {
                if($info_transaccione['transaccion'] == 'transaccion_completada')
                {

                    if($info_transaccione['tipo_transaccion'] == 'venta_dolar')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_venta_dolar']  = $totales[$info_transaccione['nombre_banco']]['total_venta_dolar'] + $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_dolar'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'compra_dolar')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_compra_dolar'] = $totales[$info_transaccione['nombre_banco']]['total_compra_dolar'] + $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_dolar'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'venta_euro')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_compra_euro']  = $totales[$info_transaccione['nombre_banco']]['total_compra_euro'] + $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_euro'] += $info_transaccione['cantidad'];
                    }
                    elseif ($info_transaccione['tipo_transaccion'] == 'compra_euro')
                    {
                        $totales[$info_transaccione['nombre_banco']]['total_venta_euro']   = $totales[$info_transaccione['nombre_banco']]['total_venta_euro'] + $info_transaccione['cantidad'];
                        $totales[$info_transaccione['nombre_banco']]['total_euro'] += $info_transaccione['cantidad'];
                    }
                    $totales[$info_transaccione['nombre_banco']]['total'] = $totales[$info_transaccione['nombre_banco']]['total'] + $info_transaccione['cantidad'];
                }
            }
        }
        $totales[$info_transaccione['nombre_banco']]['total_venta_dolar']  = number_format($totales[$info_transaccione['nombre_banco']]['total_venta_dolar'],2);
        $totales[$info_transaccione['nombre_banco']]['total_compra_dolar'] = number_format($totales[$info_transaccione['nombre_banco']]['total_compra_dolar'],2);
        $totales[$info_transaccione['nombre_banco']]['total_compra_euro']  = number_format($totales[$info_transaccione['nombre_banco']]['total_compra_euro'],2);
        $totales[$info_transaccione['nombre_banco']]['total_venta_euro']   = number_format($totales[$info_transaccione['nombre_banco']]['total_venta_euro'],2);
//        $totales[$info_transaccione['nombre_banco']]['total']              = number_format($totales[$info_transaccione['nombre_banco']]['total'],2);
        return $totales;

    }
}
