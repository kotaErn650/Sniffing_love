<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalles_pedido', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->foreignId('id_pedido')->constrained('pedidos_productos', 'id_pedido');
            $table->foreignId('id_producto')->constrained('productos', 'id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_pedido');
    }
};