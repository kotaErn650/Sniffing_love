<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mascota_vacunas', function (Blueprint $table) {
            $table->id('id_mascota_vacuna');
            $table->foreignId('id_mascota')->constrained('mascotas', 'id_mascota');
            $table->foreignId('id_vacuna')->constrained('vacunas', 'id_vacuna');
            $table->foreignId('id_veterinario')->nullable()->constrained('veterinarios', 'id_veterinario');
            $table->date('fecha_aplicacion');
            $table->date('fecha_proxima_aplicacion')->nullable();
            $table->string('lote', 50)->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mascota_vacunas');
    }
};