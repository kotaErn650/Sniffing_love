<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aplicacion_descuentos', function (Blueprint $table) {
            $table->id('id_aplicacion');
            $table->foreignId('id_descuento')->constrained('descuentos', 'id_descuento');
            $table->foreignId('id_pago')->constrained('pagos', 'id_pago');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->timestamp('fecha_aplicacion')->useCurrent();
            $table->decimal('monto_descuento', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aplicacion_descuentos');
    }
};