<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id('id_descuento');
            $table->string('codigo', 20)->unique();
            $table->text('descripcion')->nullable();
            $table->enum('tipo_descuento', ['porcentaje', 'monto_fijo']);
            $table->decimal('valor', 10, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('maximo_usos')->nullable();
            $table->integer('usos_actuales')->default(0);
            $table->boolean('activo')->default(true);
            $table->foreignId('id_veterinaria')->nullable()->constrained('veterinarias', 'id_veterinaria');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('descuentos');
    }
};