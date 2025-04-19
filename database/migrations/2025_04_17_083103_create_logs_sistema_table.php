<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('logs_sistema', function (Blueprint $table) {
            $table->id('id_log');
            $table->enum('tipo', ['error', 'advertencia', 'info', 'debug']);
            $table->string('modulo', 50);
            $table->text('mensaje');
            $table->text('datos')->nullable();
            $table->foreignId('id_usuario')->nullable()->constrained('usuarios', 'id_usuario');
            $table->string('ip', 45)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs_sistema');
    }
};