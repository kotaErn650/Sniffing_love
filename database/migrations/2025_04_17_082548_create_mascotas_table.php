<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('id_mascota');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_tipo_mascota')->nullable()->constrained('tipos_mascota', 'id_tipo_mascota');
            $table->foreignId('id_raza')->nullable()->constrained('razas', 'id_raza');
            $table->string('nombre', 50);
            $table->date('fecha_nacimiento')->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('chip_identificacion', 50)->nullable();
            $table->text('notas')->nullable();
            $table->text('alergias')->nullable();
            $table->text('condiciones_especiales')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};