<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->foreignId('id_cita')->nullable()->constrained('citas', 'id_cita');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->foreignId('id_metodo_pago')->nullable()->constrained('metodos_pago', 'id_metodo_pago');
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha_pago')->useCurrent();
            $table->enum('estado', ['pendiente', 'completado', 'fallido', 'reembolsado'])->default('pendiente');
            $table->string('transaccion_id', 100)->nullable();
            $table->text('datos_transaccion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};