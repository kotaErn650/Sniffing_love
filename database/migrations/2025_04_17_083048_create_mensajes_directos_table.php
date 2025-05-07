<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mensajes_directos', function (Blueprint $table) {
            $table->id('id_mensaje');
            $table->foreignId('id_usuario_remitente')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_usuario_destinatario')->constrained('usuarios', 'id_usuario');
            $table->text('mensaje');
            $table->timestamp('fecha_envio')->useCurrent();
            $table->boolean('leido')->default(false);
            $table->timestamp('fecha_leido')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensajes_directos');
    }
};