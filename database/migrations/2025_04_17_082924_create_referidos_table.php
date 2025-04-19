<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('referidos', function (Blueprint $table) {
            $table->id('id_referido');
            $table->foreignId('id_usuario_referidor')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_usuario_referido')->constrained('usuarios', 'id_usuario');
            $table->timestamp('fecha_referido')->useCurrent();
            $table->boolean('puntos_otorgados')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referidos');
    }
};