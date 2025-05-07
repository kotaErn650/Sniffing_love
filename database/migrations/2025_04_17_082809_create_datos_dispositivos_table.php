<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('datos_dispositivos', function (Blueprint $table) {
            $table->id('id_dato');
            $table->foreignId('id_dispositivo')->constrained('dispositivos_mascotas', 'id_dispositivo');
            $table->enum('tipo_dato', ['ubicacion', 'ritmo_cardiaco', 'temperatura', 'actividad', 'sueño']);
            $table->string('valor', 50);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos_dispositivos');
    }
};