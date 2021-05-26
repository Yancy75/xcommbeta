<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosBanco;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Entidadbancaria;

class UsariobancoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:users,banco'])->except('index', 'authenticate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info  = [];
        $banco = new Entidadbancaria();
        $infos = $banco::select('*')->get();
        if($infos->isNotEmpty())
        {
            $info = $infos;
        }
        return view('bancos.login_banco', compact('info'));
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
        $info  = $request->all();

        $usuario = new UsuariosBanco();
        $usuario->entidadbancarias_id = $info['entidadbancarias_id'];
        $usuario->nombre = $info['nombre'];
        $usuario->email = $info['email'];
        $usuario->password = bcrypt($info['password']);
        $usuario->level = $info['level'];
        $usuario->status = 'active';
        $usuario->created_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');
        $usuario->updated_at = Carbon::now('America/La_Paz')->format('Y-m-d H:i:s');

        $usuario->save();

        if(Auth::guard('banco')->check())
        {
            return redirect()->route('listaUsuarioBanco', ['id' => $info['entidadbancarias_id']]);
        }

        return redirect()->route('xcommAdministaraEntidadesBancarias', ['id' => $info['entidadbancarias_id']]);
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
        $usuario = new UsuariosBanco();
        $user    = $usuario::find($id);
        $info    = $request->all();

        $user->nombre =$info['nombre'];
        $user->email  =$info['email'];
        $user->level  =$info['level'];
        if(array_key_exists('status', $info))
        {
            $user->status = "active";
        }
        else
        {
            $user->status = "inactive";
        }

        if(array_key_exists('password', $info))
        {
            $user->password = bcrypt($info['password']);
        }

        $user->save();

        if(Auth::guard('banco')->check())
        {
            return redirect()->route('listaUsuarioBanco', ['id' => $info['entidadbancarias_id']]);
        }

        return redirect()->route('xcommAdministaraEntidadesBancarias', ['id' => $info['entidadbancarias_id']]);

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
        $credentials = $request->only('email', 'password', 'entidadbancarias_id');
        $credentials['status'] = 'active';
        if(Auth::guard('banco')->attempt($credentials))
        {
            return redirect()->intended('dashboard_banco');
        }
        return back()->withInput();
    }

    public function listaBanco($id)
    {
        $usuarios = [];

        $info  = new UsuariosBanco();
        $info2 = new Entidadbancaria();

        $banco = $info2::find($id);

        $usuarios = $info::where('entidadbancarias_id', $id)->get();

        return view('bancos.usuarios_banco', compact('usuarios', 'banco'));
    }

}
