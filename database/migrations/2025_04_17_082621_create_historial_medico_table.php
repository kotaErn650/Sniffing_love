<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_medico', function (Blueprint $table) {
            $table->id('id_historial');
            $table->foreignId('id_cita')->nullable()->constrained('citas', 'id_cita');
            $table->foreignId('id_mascota')->constrained('mascotas', 'id_mascota');
            $table->foreignId('id_veterinario')->nullable()->constrained('veterinarios', 'id_veterinario');
            
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->decimal('peso_actual', 5, 2)->nullable();
            $table->decimal('temperatura', 4, 1)->nullable();
            $table->integer('frecuencia_cardiaca')->nullable();
            $table->integer('frecuencia_respiratoria')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_medico');
    }
};