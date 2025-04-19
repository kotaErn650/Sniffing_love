<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->foreignId('id_veterinaria')->nullable()->constrained('veterinarias', 'id_veterinaria');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->enum('categoria', ['alimento', 'medicamento', 'accesorio', 'higiene', 'otro']);
            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('imagen', 255)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
};