<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;
    protected $table = 'certificacion';
    protected $primaryKey = 'idCertificaciones';
    protected $fillable = ['idCertificaciones','idUser','nombre',
    'institucion','fechacomienzo','fechafin','tipo','archivo'];
}
