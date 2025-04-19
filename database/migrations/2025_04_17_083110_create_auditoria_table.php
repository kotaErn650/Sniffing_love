<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('auditoria', function (Blueprint $table) {
            $table->id('id_auditoria');
            $table->string('tabla_afectada', 50);
            $table->integer('id_registro_afectado')->nullable();
            $table->enum('tipo_operacion', ['insert', 'update', 'delete']);
            $table->text('datos_anteriores')->nullable();
            $table->text('datos_nuevos')->nullable();
            $table->foreignId('id_usuario')->nullable()->constrained('usuarios', 'id_usuario');
            $table->timestamp('fecha_operacion')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auditoria');
    }
};