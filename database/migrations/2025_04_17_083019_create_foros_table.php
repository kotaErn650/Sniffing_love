<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('foros', function (Blueprint $table) {
            $table->id('id_foro');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('foros');
    }
};