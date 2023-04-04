<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadoi = session()->get('empleado'); 
        return view('empleadoi.index', compact('empleadoi'));
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
    public function edit(Empleado $empleadoi)
    {
        return view('empleadoi.edit', compact('empleadoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleadoi)
    {
        $datosEmpleado = request()->except(['_token', '_method']);
        if($request->hasFile('Foto')){
            $empleadoi=Empleado::findOrFail($empleadoi->idEmpleado);
            Storage::delete('public/'.$empleadoi->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //$empleado->update($request->all());
        $empleadoi->update($datosEmpleado);
        session()->put('empleado',$empleadoi);
        //return response()->json($empleado);
        return redirect()->route('empleadoi.edit', compact('empleadoi'))->with('successEdit','open');
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

      //Empleadoi functions
    public function mostrarNegocio(){
        $negocio = Negocio::all()->first();
        return view('empleadoi.negocio',compact('negocio')); 
    }
    public function mostrarPlantillas(){
 
        return view('empleadoi.plantillas'); 
    }
    public function mostrarAcerca(){
 
        return view('empleadoi.acerca'); 
    }
}
