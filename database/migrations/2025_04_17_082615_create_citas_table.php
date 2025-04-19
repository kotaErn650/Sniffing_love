<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->foreignId('id_veterinaria')->constrained('veterinarias', 'id_veterinaria');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_mascota')->constrained('mascotas', 'id_mascota');
            $table->foreignId('id_veterinaria_servicio')->constrained('veterinaria_servicios', 'id_veterinaria_servicio');
            $table->foreignId('id_veterinario')->nullable()->constrained('veterinarios', 'id_veterinario');
            $table->dateTime('fecha_hora');
            $table->enum('estado', ['pendiente', 'confirmada', 'completada', 'cancelada', 'no_asistio'])->default('pendiente');
            $table->text('motivo')->nullable();
            $table->text('notas')->nullable();
            $table->integer('calificacion')->nullable()->between(1, 5);
            $table->text('comentario_calificacion')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
};