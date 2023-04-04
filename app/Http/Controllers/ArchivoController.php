<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Curso;
use App\Models\Certificacion;

class ArchivoController extends Controller
{
    public function descargarCertificacion($id){
        $certificacion = Certificacion::find($id);
        if ($certificacion) {
            $pathToFile = public_path("storage/".$certificacion->archivo);
            return response()->file($pathToFile, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $certificacion->nombre . '.pdf"',
            ]);
        } else {
            return back()->with('error', 'El archivo no existe');
        }
    }
}
