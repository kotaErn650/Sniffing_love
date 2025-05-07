<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('veterinarios', function (Blueprint $table) {
            $table->id('id_veterinario');
            $table->foreignId('id_veterinaria')->constrained('veterinarias', 'id_veterinaria');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->string('especialidad', 100)->nullable();
            $table->string('registro_profesional', 50)->nullable();
            $table->text('horario_disponibilidad')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarios');
    }
};