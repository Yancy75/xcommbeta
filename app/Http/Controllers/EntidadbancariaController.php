<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidadbancaria;
use Carbon\Carbon;
use App\UsuariosBanco;

class EntidadbancariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidades = new Entidadbancaria();

        $info = $entidades->all();
        return view('xcomm.entidades_bancarias',compact("info"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('xcomm.add_entidades_bancarias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entidadbancaria $entidadbancaria)
    {
        $datos = $request->all();

        $entidadbancaria->code       = $datos['code'];
        $entidadbancaria->name       = $datos['name'];
        $entidadbancaria->status     = 'active';
        $entidadbancaria->created_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $entidadbancaria->updated_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $entidadbancaria->save();

        return redirect()->route('xcommEntidadesBancarias');
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

    public function administrar($id, Entidadbancaria $entidadbancaria, UsuariosBanco $usuariosBanco)
    {
        $banco = $entidadbancaria::find($id);
        $usuarios = $usuariosBanco::where('entidadbancarias_id', $id)->get();
        return view('xcomm.admin_entidades_bancarias', compact('banco', 'usuarios'));
    }

    public function activarDesactivarBanco($id)
    {
        $banco = Entidadbancaria::find($id);

        if(!is_null($banco))
        {
            if($banco->status == "active")
            {
                $banco->status = 'inactive';
            }
            else
            {
                $banco->status = 'active';
            }
            $banco->save();
        }

        return;
    }
}
