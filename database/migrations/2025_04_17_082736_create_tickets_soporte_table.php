<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets_soporte', function (Blueprint $table) {
            $table->id('id_ticket');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->string('asunto', 100);
            $table->text('descripcion');
            $table->enum('estado', ['abierto', 'en_proceso', 'resuelto', 'cerrado'])->default('abierto');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrentOnUpdate();
            $table->enum('prioridad', ['baja', 'media', 'alta', 'urgente'])->default('media');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets_soporte');
    }
};