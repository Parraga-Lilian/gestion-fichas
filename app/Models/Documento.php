<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documento';
    protected $primaryKey = 'idDocumento';
    protected $fillable = ['idDocumento','idEmpleado','tipo',
    'titulo','asunto','fecha','emisor','receptor','cuerpo','firma','archivo'];
}
