<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aceptacion_politicas', function (Blueprint $table) {
            $table->id('id_aceptacion');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_politica')->constrained('politicas', 'id_politica');
            $table->timestamp('fecha_aceptacion')->useCurrent();
            $table->string('version_aceptada', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aceptacion_politicas');
    }
};