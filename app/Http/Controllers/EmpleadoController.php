<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{
    //A user associated with this employee has to be created as well.
    //The self-registered employees must be visible from the index table of employees
    public function index(){
        //$datos['empleados'] = Empleado::paginate(5);
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }
    
    public function create()
    {
        return view('empleados.create');
    }

    public function createUser($empleado){
       
    }
    //Created by employee  
    public function store(Request $request)
    {

        $empleado = request()->except('_token');
        /*
        $empleado = new Empleado();
        $empleado->idEmpleado = $request->idEmpleado;
        $empleado->cedula = $request->cedula;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->direccion = $request->direccion;
        $empleado->telefono = $request->telefono;
        $empleado->cargo = $request->cargo;
        $empleado->horario = $request->horario;
        $empleado->seccion = $request->seccion;
        $empleado->estado = $request->estado;
        $empleado->foto = $request->foto;
        $empleado->save();*/
        if($request->hasFile('Foto')){
            $empleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //Creating default new user
        $user = new User();
        $user->name = $request->nombres;
        $user->username = $request->nombres . $request->apellidos;
        $user->password = Hash::make(Str::random(10));
        $user->email = strtolower($request->nombres) . Str::random(5) . '@gmail.com';
        $user->tipo = 'empleado';
        $user->save();
        //End of creating new user
        $empleado['idUser'] = $user->idUser;
        Empleado::create($empleado);
        //$doc = Documento::create($request->all());
       // return redirect()->route('empleado.index');
       //response()->json($empleado);
       return redirect()->route('empleado.index');
    }


    public function show($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);
        return view('empleados.show',compact('empleado'));
    }


    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datosEmpleado = request()->except(['_token', '_method']);
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($empleado->idEmpleado);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //$empleado->update($request->all());
        $empleado->update($datosEmpleado);
        //return response()->json($empleado);
        return redirect()->route('empleado.edit', compact('empleado'))->with('successEdit','open');
    }
  
    public function destroy(Empleado $empleado)
    {
        //$idcopy = $empleado->idUser;
        $empleado->delete();
       /* $user = User::find($idcopy);
        if(!empty($user)){
            $user->delete();
        }*/
        return redirect()->route('empleado.index')->with('success_employee_delete','open');
    }
}
