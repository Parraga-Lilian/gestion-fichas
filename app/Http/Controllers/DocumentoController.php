<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Empleado;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
  
    public function index()
    {
        $documentos = Documento::all();
        /*$data = [
            'documento' -> $documentos
        ];*/
        return view('documentos.index', compact('documentos'));
    }


    public function create()
    {
        $empleados = Empleado::all();
        return view('documentos.create', compact('empleados'));
    }

  
    public function store(Request $request)
    {
        $doc = new Documento();
        $doc->idDocumento = $request->idDocumento;
        $doc->idEmpleado = $request->idEmpleado;
        $doc->tipo = $request->tipo;
        $doc->titulo = $request->titulo;
        $doc->asunto = $request->asunto;
        $doc->fecha = $request->fecha;
        $doc->emisor = $request->emisor;
        $doc->receptor = $request->receptor;
        $doc->cuerpo = $request->cuerpo;
        $doc->firma = $request->firma;
        $doc->archivo = $request->archivo;
        $doc->save();
        //$doc = Documento::create($request->all());
        return redirect()->route('documento.index');
    }

  
    public function show(Documento $documento)
    {
        return view('documentos.show',compact('documento'));
    }

  
    public function edit(Documento $documento)
    {
        return view('documentos.edit', compact('documento'));
    }

  
    public function update(Request $request, Documento $documento)
    {
        $documento->update($request->all());
        return redirect()->route('documento.index');
    }

  
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documento.index');
    }
}
