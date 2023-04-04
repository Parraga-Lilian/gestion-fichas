<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administrador';
    protected $primaryKey = 'idAdministrador';
    protected $fillable = ['idAdministrador','idUser','cedula','nombres',
    'apellidos','direccion','telefono', 'especialidad','Foto'];
}
