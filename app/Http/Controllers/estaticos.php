<?php

namespace App\Http\Controllers;

use App\Cancelinfo;
use Illuminate\Http\Request;
use App\Tasageneral;
use Carbon\Carbon;
use App\Transaccion;
use Illuminate\Support\Facades\DB;

class estaticos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      echo "estoy en index";
        //
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
      switch ($id) {
         case "que": return view('estaticas.quees');
         case "porque": return view('estaticas.porque');
         case "como": return view('estaticas.como');
         case "contacto": return view('estaticas.contactos');
         case "reglas": return view('estaticas.reglas');
         default: return view('bienvenidos');
               }
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

    public function tasaGeneral(Request $request)
    {
        $tasa = new Tasageneral();
        $info = [];
        $tasas = $tasa->all();

        if($tasas->isNotEmpty())
        {
            $info = $tasas;
        }
        return response()->json($info);
    }

    public function automataCancelarPorTiempo()
    {
        $time = Carbon::now('America/La_Paz')->sub('4 hours');

        $transaccion_obj = new Transaccion();

        $transaccion_info = $transaccion_obj::select('id', 'cliente_id', 'cambiodivisa_id', 'transaccion')
            ->where('fecha_last_transaccion', '<=', $time->format('Y-m-d H:i'))
            ->where('status', '=', 'active')
            ->where('transaccion', '<>', 'transaccion_completada')
            ->get();
        if($transaccion_info->isNotEmpty())
        {

            foreach($transaccion_info as $trans_info)
            {
                $trans_info->transaccion = 'cancelado_por_tiempo';
                $trans_info->status      = 'inactive';
                $trans_info->save();

                $cancelar_trans  = new Cancelinfo();

                $cancelar_trans->transaccion_id     = $trans_info->id;
                $cancelar_trans->cliente_id         = $trans_info->cliente_id;
                $cancelar_trans->cambiodivisa_id    = $trans_info->cambiodivisa_id;
                $cancelar_trans->info               = "Cancelado por tiempo";
                $cancelar_trans->status_transaccion = $trans_info->transaccion;
                $cancelar_trans->status             = "active";
                $cancelar_trans->created_at          = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
                $cancelar_trans->updated_at          = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
                $cancelar_trans->save();
            }
        }

        return response()->json("Cancelados");
    }

    public function monstrarTransaccionesDolarEuro()
    {
        $dolar = Transaccion::select(DB::raw('sum(cantidad) as dolar'))
            ->where('transaccion', '=', 'transaccion_completada')
            ->where(function ($query) {
                $query->where('tipo_transaccion', '=', 'venta_dolar')
                    ->orWhere('tipo_transaccion', '=', 'compra_dolar');
            })
            ->get();

        $euro = Transaccion::select(DB::raw('sum(cantidad) as euro'))
            ->where('transaccion', '=', 'transaccion_completada')
            ->where(function ($query) {
                $query->where('tipo_transaccion', '=', 'venta_euro')
                    ->orWhere('tipo_transaccion', '=', 'compra_euro');
            })
            ->get();
        $info["dolar"] = number_format($dolar[0]->dolar,2);
        $info["euro"]  = number_format($euro[0]->euro,2);
        return response()->json($info);
    }

    public function contacto()
    {
        return view('contacto');
    }
}
