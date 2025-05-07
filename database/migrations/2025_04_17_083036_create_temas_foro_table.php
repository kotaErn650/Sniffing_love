<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('temas_foro', function (Blueprint $table) {
            $table->id('id_tema');
            $table->foreignId('id_foro')->constrained('foros', 'id_foro');
            $table->foreignId('id_usuario_creador')->constrained('usuarios', 'id_usuario');
            $table->string('titulo', 100);
            $table->text('contenido');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_ultima_respuesta')->nullable();
            $table->integer('respuestas')->default(0);
            $table->boolean('cerrado')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temas_foro');
    }
};