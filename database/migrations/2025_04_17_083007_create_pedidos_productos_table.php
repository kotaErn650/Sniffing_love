<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pedidos_productos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->enum('estado', ['pendiente', 'procesando', 'enviado', 'entregado', 'cancelado'])->default('pendiente');
            $table->string('direccion_envio', 200)->nullable();
            $table->decimal('costo_envio', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_productos');
    }
};