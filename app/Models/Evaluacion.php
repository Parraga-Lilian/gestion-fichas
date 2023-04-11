<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'Evaluacion';
    public $timestamps = false;
    protected $primaryKey = 'idEvaluacion';
    protected $fillable = ['idEvaluacion','idUser','nusuario','codigo','nombre','descripcion','preguntas',
    'alternativas','respuestas','npreguntas','puntajeobtenido','maximo','tiempo','estado'];

    public static function obtenerPromedioPuntaje()
    {
        return self::avg('puntajeobtenido');
    }

    public static function obtenerMaximoPuntaje()
    {
        return self::max('puntajeobtenido');
    }

    public static function obtenerMinimoPuntaje()
    {
        return self::min('puntajeobtenido');
    }

}
