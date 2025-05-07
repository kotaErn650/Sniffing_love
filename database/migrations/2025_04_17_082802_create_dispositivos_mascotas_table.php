<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dispositivos_mascotas', function (Blueprint $table) {
            $table->id('id_dispositivo');
            $table->foreignId('id_mascota')->constrained('mascotas', 'id_mascota');
            $table->string('nombre_dispositivo', 50);
            $table->enum('tipo_dispositivo', ['collar', 'chip', 'otro']);
            $table->string('identificador_unico', 100)->unique();
            $table->date('fecha_activacion')->nullable();
            $table->timestamp('ultima_conexion')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispositivos_mascotas');
    }
};