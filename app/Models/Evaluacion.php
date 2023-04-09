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
    protected $fillable = ['idEvaluacion','idUser','codigo','nombre','descripcion','preguntas',
    'alternativas','respuestas','npreguntas','puntajeobtenido','maximo','tiempo','estado'];


}
