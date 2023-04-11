<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;

class EstadisticasController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::where('estado','rendido')->get();
        return view('estadisticas.index', compact('evaluaciones'));
    }
}
