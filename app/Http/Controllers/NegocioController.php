<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Chequear si el usuario está logueado
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        // Obtener el usuario actual
        $user = auth()->user();
    
        // Si el usuario es un administrador, mostrar la vista negocio.index
        $negocio = Negocio::all()->first();

        if ($user->tipo === 'administrador') {
            return view('negocio.index', compact('negocio'));
        }
    
        // Si el usuario no es un administrador, mostrar la vista negocio.show
        return view('negocio.show', compact('negocio'));
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
        /*$negocio = new Negocio();
        $negocio->idNegocio = $request->idNegocio;
        $negocio->razon_social = $request->razon_social;
        $negocio->actividad = $request->actividad;
        $negocio->save();*/
        //$doc = Documento::create($request->all());
        Negocio::create($request->all());
        return redirect()->route('negocio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idNegocio)
    {
        $negocio = Negocio::find($idNegocio);
        return view('negocio.show',compact('negocio')); 
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Negocio $negocio)
    {
        return view('negocio.edit', compact('negocio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocio $negocio)
    {
        $negocio->update($request->all());
        return redirect()->route('negocio.index')->with('successEdit','open');
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
}
