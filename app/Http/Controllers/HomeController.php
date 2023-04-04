<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user() != null){
            $tipo = auth()->user()->tipo;
            if($tipo == 'empleado'){
                return redirect()->route("empleadoi.index");
            }else if($tipo == 'administrador'){
                return redirect()->route("administrador.index");
            }
        }else{
            return view("auth.login");
        }

    }
}
