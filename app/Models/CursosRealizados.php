<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosRealizados extends Model
{
    use HasFactory;
    protected $table = 'cursorealizado';
    protected $primaryKey = 'idCursosRealizados';
    protected $fillable = ['idCursosRealizados','idUser','nombre',
    'lugar','tiempo','modalidad','fechaComienzo','fechaFin','firma','archivo'];
}
