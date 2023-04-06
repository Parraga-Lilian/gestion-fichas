<?php

namespace App\Http\Controllers;

use App\Models\Certificacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CertificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $disk = "public";
    public function index()
    {
        // Chequear si el usuario está logueado
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        // Obtener el ID del usuario actual
        $idUser = auth()->user()->idUser;
        // Filtrar las certificaciones según el idUser del usuario
        $certificaciones = Certificacion::where('idUser', $idUser)->get();
        return view('certificacion.index', compact('certificaciones'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificacion = Certificacion::all();
        return view('certificacion.create', compact('certificacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rutaArchivo = null;
        // Validar que se ha subido un archivo
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $rutaArchivo = Storage::disk($this->disk)->putFileAs('certificaciones', $archivo, $archivo->getClientOriginalName());
        }
        // Almacenamiento con Storage
        if($rutaArchivo){
            $request['archivo'] = $rutaArchivo;
            $certificacion = new Certificacion($request->all());
            $certificacion->archivo = $rutaArchivo;
            $certificacion->save();
            return redirect()->route('certificacion.index');
        } else {
            return back()->with('error', 'No se pudo guardar el certificado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(Certificacion $certificacion)
    {
        return view('certificacion.show',compact('certificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificacion $certificacion)
    {
        return view('certificacion.edit', compact('certificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificacion $certificacion)
    {
        $certificacion->update($request->all());
        return redirect()->route('certificacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificacion $certificacion)
    {
        $certificacion->delete();
        return redirect()->route('certificacion.index');
    }
}
