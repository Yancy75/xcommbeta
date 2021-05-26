<?php

namespace App\Http\Controllers;

use App\Mail\MensajeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function enviarContactanos()
    {
        $mensaje = request()->validate([
                'nombre'    => 'required',
                'email'     => 'required',
                'telefono'  => 'required',
                'asunto'    => 'required',
                'contenido' => 'required',
            ]);
            Mail::to('admin@xcommrd.com')->send(new MensajeEmail($mensaje));
        redirect()->route('bienvenidos');
    }

    public function enviarCorreoValidacion($dt)
    {
        $data = explode('|', $dt);
        $mensaje = [
            'valor'  => $data[1], //este es el id
            'nombre' => $data[3]
        ];
        Mail::to($data[5])->send(new MensajeEmail($mensaje));
        redirect()->route('loginCliente');
    }
}
