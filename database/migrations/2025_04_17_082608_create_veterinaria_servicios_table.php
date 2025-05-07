<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('veterinaria_servicios', function (Blueprint $table) {
            $table->id('id_veterinaria_servicio');
            $table->foreignId('id_veterinaria')->constrained('veterinarias', 'id_veterinaria');
            $table->foreignId('id_servicio')->constrained('servicios', 'id_servicio');
            $table->foreignId('id_veterinario')->nullable()->constrained('veterinarios', 'id_veterinario');
            $table->decimal('precio', 10, 2);
            $table->integer('duracion_estimada')->nullable()->comment('en minutos');
            $table->text('descripcion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            
            // Cambia esto:
            $table->unique(['id_veterinaria', 'id_servicio', 'id_veterinario'], 'vet_serv_vet_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinaria_servicios');
    }
};