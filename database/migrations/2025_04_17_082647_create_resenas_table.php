<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resenas', function (Blueprint $table) {
            $table->id('id_resena');
            $table->foreignId('id_veterinaria')->constrained('veterinarias', 'id_veterinaria');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_cita')->nullable()->constrained('citas', 'id_cita');
            $table->integer('calificacion')->between(1, 5);
            $table->text('comentario')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->text('respuesta')->nullable();
            $table->timestamp('fecha_respuesta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resenas');
    }
};