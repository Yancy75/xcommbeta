<?php

namespace App\Http\Controllers;

use App\Comision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = [];
        $comision = Comision::all();
        if($comision->isNotEmpty())
        {
            $info = $comision;
        }
        return view('xcomm.configuraciones', compact('info'));
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

    public function addUpdate(Request $request)
    {
        $datos = $request->all();
        if(is_null($datos['id_comision']))
        {
            $comision = new Comision();
        }
        else
        {
            $comision = Comision::find($datos['id_comision']);
        }

        $comision->comision      = $datos['comision'];
        $comision->comision_euro = $datos['comisione'];
        $comision->status        = 'active';
        $comision->created_at    = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $comision->updated_at    = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $comision->save();
        return redirect()->route('configuracionXcomm');
    }
}
