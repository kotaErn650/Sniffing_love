<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('politicas', function (Blueprint $table) {
            $table->id('id_politica');
            $table->string('titulo', 100);
            $table->text('contenido');
            $table->enum('tipo', ['terminos', 'privacidad', 'cancelacion', 'seguridad', 'envio_informes']);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrentOnUpdate();
            $table->string('version', 20);
            $table->boolean('activa')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('politicas');
    }
};