<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->id('id_vacuna');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('frecuencia_aplicacion', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacunas');
    }
};