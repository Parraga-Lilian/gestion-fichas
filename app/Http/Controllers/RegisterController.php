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
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $checkDuplicate = User::where('name', $request->name)
        ->orWhere('username', $request->username)
        ->orWhere('email', $request->email)
        ->first();
        $checkCedulaEmpleado = Empleado::where('cedula', $request->cedula)->first();
        $checkCedulaAdmin = Administrador::where('cedula', $request->cedula)->first();
        if ($checkCedulaEmpleado) {
            return redirect('/register')->withErrors('La cédula ya está en uso');
        }

        if ($checkCedulaAdmin) {
            return redirect('/register')->withErrors('La cédula ya está en uso');
        }

        if($checkDuplicate){
            return redirect('/register')->withErrors('Correo, nombre de usuario o email ya está en uso');
            //return response()->json($checkDuplicate);
        }else{
            $user = User::create($request->validated());
            try {
                if($user->tipo == "empleado"){
                    $empleado = new Empleado();
                    $empleado->idUser = $user->idUser;
                    $empleado->cedula = $request->cedula;
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
                    $administrador->cedula = $request->cedula;
                    $administrador->nombres = "(Vacio)";
                    $administrador->apellidos = "(Vacio)";
                    $administrador->direccion = "(Vacio)";
                    $administrador->telefono = "(Vacio)";
                    $administrador->especialidad = "(Vacio)";
                    $administrador->save();
                }
                return redirect('/login')->with('success', "La cuenta fue creada correctamente.");
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) { // Duplicate entry error code
                    $duplicateUser = User::where('email', $request->email)
                    ->orWhere('username', $request->username)->first();
                    $errorFields = [];
                    foreach ($duplicateUser->toArray() as $field => $value) {
                        if ($value === $request->$field) {
                            $errorFields[$field] = 'Este valor ya está en uso.';
                        }
                    }
                    return redirect('/register')
                        ->withErrors($errorFields)
                        ->withInput($request->except('password', 'password_confirmation'));
                } else {
                    return redirect('/register')
                        ->withErrors(['error' => 'Ha ocurrido un error al crear la cuenta. Por favor, inténtelo de nuevo más tarde.'])
                        ->withInput($request->except('password', 'password_confirmation'));
                }
            }
        }
    }
}
