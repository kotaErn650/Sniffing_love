<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id('id_notificacion');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->string('titulo', 100);
            $table->text('mensaje');
            $table->enum('tipo', ['sistema', 'cita', 'promocion', 'recordatorio', 'emergencia']);
            $table->boolean('leida')->default(false);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_leida')->nullable();
            $table->string('url_accion', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notificaciones');
    }
};