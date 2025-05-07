<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('puntos_recompensa', function (Blueprint $table) {
            $table->id('id_punto');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->integer('puntos')->default(0);
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puntos_recompensa');
    }
};