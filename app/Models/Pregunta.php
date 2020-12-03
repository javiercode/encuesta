<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'pregunta';

    protected $fillable = ['titulo', 'id_encuesta', 'tipo', 'cantidad_archivo', 'orden'];
//    protected $fillable = ['titulo', 'idEncuesta', 'tipoPregunta', 'cantidadArchivo', 'orden'];

    public $timestamps = true;
}
