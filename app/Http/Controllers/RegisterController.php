<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Administrador;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function show(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        //$admins = Administrador::all();
        //return view('auth.register',compact('$admins'));
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        
        /*$solicitud = $request;
        return redirect('/home',compact('solicitud'))->with('success', "La cuenta fue creada correctamente.");*/
        
        //$solicitud = $request;
        //Check for duplicate values.
        $checkDuplicate = User::where(['name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email])->first();
        if($checkDuplicate){
            return redirect('/register')->withErrors('Correo o nombre de usuario ya está en uso');
            //return response()->json($checkDuplicate);
        }else{
            $user = User::create($request->validated());
            try {
                if($user->tipo == "empleado"){
                    $empleado = new Empleado();
                    $empleado->idUser = $user->idUser;
                    $empleado->cedula = "0999999999";
                    $empleado->nombres = "(Vacio)";
                    $empleado->apellidos = "(Vacio)";
                    $empleado->direccion = "(Vacio)";
                    $empleado->telefono = "(Vacio)";
                    $empleado->cargo = "(Vacio)";
                    $empleado->horario = "(Vacio)";
                    $empleado->seccion = "(Vacio)";
                    $empleado->estado = "en proceso";
                    $empleado->save();
                } else {
                    $administrador = new Administrador();
                    $administrador->idUser = $user->idUser;
                    $administrador->cedula = "0999999999";
                    $administrador->nombres = "(Vacio)";
                    $administrador->apellidos = "(Vacio)";
                    $administrador->direccion = "(Vacio)";
                    $administrador->telefono = "(Vacio)";
                    $administrador->especialidad = "(Vacio)";
                    $administrador->save();
                }
                return redirect('/login')->with('success', "La cuenta fue creada correctamente.");
            } catch (\Exception $e) {
                return redirect('/login')->with('error', "Ha ocurrido un error al crear la cuenta. Por favor, inténtelo de nuevo más tarde.");
            }
            
        //return response()->json(['respuesta'=>'bien']);
        }
        //Return to other part.       
        /*
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->setPassword($request->password);
        $user->save();
        return redirect('/asdasd')->with('success', "Account successfully registered."); */

    }
}
