<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id('id_membresia');
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_mensual', 10, 2);
            $table->text('beneficios')->nullable();
            $table->integer('duracion_dias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membresias');
    }
};