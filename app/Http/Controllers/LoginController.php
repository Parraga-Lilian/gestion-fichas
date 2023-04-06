<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Administrador;


class LoginController extends Controller
{
    //
    public function show()
    {
        //dd("Errr");
        if (Auth::check()) {
            $tipo = Auth::user()->tipo;
            $route = $tipo == "empleado" ? 'empleadoi.index' : 'administrador.index';
            return redirect()->route($route);
        }
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        //dd($request);
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            //dd('error');
            return redirect()->to('/login')->withErrors('Usuario o clave incorrectos');
           //return redirect()->to('/login')->withErrors(trans('auth.failed'));
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        //dd($request);
        $usuario = User::where('username', $request->username)->first();
        $tipo = $usuario->tipo;
        //$path = '/';
        if($tipo == "empleado"){
            $empleado = Empleado::where('idUser',$usuario->idUser)->first();
            session()->put('empleado', $empleado);
            return redirect()->route('empleadoi.index');
        }else{
            $administrador = Administrador::where('idUser', $usuario->idUser)->first();
            session()->put('administrador', $administrador);
            return redirect()->route('administrador.index');
        }
    }
}
