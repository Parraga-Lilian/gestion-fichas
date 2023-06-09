<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluaciones = Evaluacion::all();
        return view('evaluacion.index', compact('evaluaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluacion = Evaluacion::all();
        return view('evaluacion.create', compact('evaluacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Evaluacion::create($request->all());
        return redirect()->route('evaluacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        return view('evaluacion.show',compact('evaluacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        return view('evaluacion.edit', compact('evaluacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        $evaluacion->update($request->all());
        return redirect()->route('evaluacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluacion.index');
    }

    public function rendirEvaluacion($id)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        return view('evaluacion.rendir', compact('evaluacion'));
    }

}
