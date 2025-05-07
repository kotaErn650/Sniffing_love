<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transacciones_puntos', function (Blueprint $table) {
            $table->id('id_transaccion');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->integer('puntos');
            $table->enum('tipo', ['ganancia', 'redencion']);
            $table->string('motivo', 100);
            $table->timestamp('fecha_transaccion')->useCurrent();
            $table->integer('id_referencia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transacciones_puntos');
    }
};