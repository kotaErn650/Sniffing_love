<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('suscripciones_membresias', function (Blueprint $table) {
            $table->id('id_suscripcion');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_membresia')->constrained('membresias', 'id_membresia');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['activa', 'cancelada', 'vencida'])->default('activa');
            $table->string('metodo_pago', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suscripciones_membresias');
    }
};