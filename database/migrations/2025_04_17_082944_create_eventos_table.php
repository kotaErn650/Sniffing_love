<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('id_evento');
            $table->foreignId('id_veterinaria')->constrained('veterinarias', 'id_veterinaria');
            $table->string('titulo', 100);
            $table->text('descripcion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('ubicacion', 200);
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->enum('tipo', ['feria', 'taller', 'campaña', 'otro']);
            $table->string('contacto_organizador', 100)->nullable();
            $table->decimal('costo', 10, 2)->default(0);
            $table->integer('cupo_maximo')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};