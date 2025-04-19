<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id('id_configuracion');
            $table->string('clave', 50)->unique();
            $table->text('valor')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('editable')->default(true);
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuraciones');
    }
};