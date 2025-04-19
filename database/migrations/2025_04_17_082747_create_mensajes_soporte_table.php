<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mensajes_soporte', function (Blueprint $table) {
            $table->id('id_mensaje');
            $table->foreignId('id_ticket')->constrained('tickets_soporte', 'id_ticket');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->text('mensaje');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->boolean('es_staff')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensajes_soporte');
    }
};