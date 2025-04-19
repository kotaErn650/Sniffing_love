<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('respuestas_foro', function (Blueprint $table) {
            $table->id('id_respuesta');
            $table->foreignId('id_tema')->constrained('temas_foro', 'id_tema');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->text('contenido');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->boolean('mejor_respuesta')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas_foro');
    }
};