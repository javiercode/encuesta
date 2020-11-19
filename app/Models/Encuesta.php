<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;
    protected $table = 'encuesta';


//    protected $fillable = ['nombre', 'descripcion', 'fechaInicio', 'fechaFin',
//        'correoAutorizado', 'sessionAutorizado', 'respuestaPersona', 'estado'];

    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin',
        'correo_autorizado', 'session_autorizado', 'respuesta_persona', 'estado'];
    public $timestamps = true;
}