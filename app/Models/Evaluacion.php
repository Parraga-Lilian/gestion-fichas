<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'Evaluacion';
    protected $primaryKey = 'idEvaluacion';
    protected $fillable = ['idEvaluacion','idUser','preguntas',
    'alternativas','respuestas','npreguntas','puntajeobtenido','maximo','estado'];
}
