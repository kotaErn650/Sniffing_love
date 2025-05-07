<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registro_eventos', function (Blueprint $table) {
            $table->id('id_registro');
            $table->foreignId('id_evento')->constrained('eventos', 'id_evento');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->integer('asistentes')->default(1);
            $table->enum('estado', ['confirmado', 'pendiente', 'cancelado'])->default('confirmado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_eventos');
    }
};