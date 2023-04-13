<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursosRealizados;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class CursosRealizadosController extends Controller
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

        // Filtrar los cursos según el idUser del usuario
        $cursos = CursosRealizados::where('idUser', $idUser)->get();

        return view('curso.index', compact('cursos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = CursosRealizados::all();
        return view('curso.create', compact('curso'));
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
       // $request['idUser'] = $request->user['idUser'];
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $rutaArchivo = Storage::disk($this->disk)->putFileAs('curso', $archivo, $archivo->getClientOriginalName());
        }
        // Almacenamiento con Storage
        if($rutaArchivo){
            $request['archivo'] = $rutaArchivo;
            $cursos = new CursosRealizados($request->all());
            $cursos->archivo = $rutaArchivo;
            $cursos->save();
            return redirect()->route('curso.index');
        } else {
            return back()->with('error', 'No se pudo guardar el curso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CursosRealizados $curso)
    {
        return view('curso.show',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CursosRealizados $curso)
    {
        return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CursosRealizados $curso)
    {
        $curso->update($request->all());
        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CursosRealizados $curso)
    {
        $curso->delete();
        return redirect()->route('curso.index');
    }

    public function buscarcurso(Request $request){
        $nombreCurso = $request->input('nombre');
        // Filtrar las certificaciones según el nombre del certificado
        $cursos = CursosRealizados::where('nombre', 'LIKE', '%'.$nombreCurso.'%')->get();
        return view('curso.buscar', compact('cursos'));
    }
}
