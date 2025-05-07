<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('veterinarias', function (Blueprint $table) {
            $table->id('id_veterinaria');
            $table->string('nombre', 100);
            $table->string('nit', 20)->nullable();
            $table->string('direccion', 200);
            $table->string('telefono', 15);
            $table->string('email')->unique();
            $table->time('horario_apertura')->nullable();
            $table->time('horario_cierre')->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->boolean('activa')->default(true);
            $table->foreignId('id_usuario_admin')->nullable()->constrained('usuarios', 'id_usuario');
            $table->decimal('calificacion_promedio', 3, 2)->default(0);
            $table->text('politica_cancelacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veterinarias');
    }
};