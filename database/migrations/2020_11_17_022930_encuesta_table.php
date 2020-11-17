<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuenta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('correo_autorizado');
            $table->boolean('session_autorizado');
            $table->boolean('respuesta_persona');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta');
    }
}
