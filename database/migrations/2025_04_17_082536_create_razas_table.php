<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('razas', function (Blueprint $table) {
            $table->id('id_raza');
            $table->foreignId('id_tipo_mascota')->constrained('tipos_mascota', 'id_tipo_mascota');
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('razas');
    }
};