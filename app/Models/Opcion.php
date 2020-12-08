<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    protected $table = 'opcion';

    protected $fillable = ['id_pregunta','texto', 'valor', 'orden'];

    public $timestamps = true;
}
