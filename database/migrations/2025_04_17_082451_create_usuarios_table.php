<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->foreignId('id_rol')->constrained('roles', 'id_rol');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('email')->unique();
            $table->string('contrasena');
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro', 'Prefiero no decir'])->nullable();
            $table->string('foto_perfil', 255)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('ultimo_acceso')->nullable();
            $table->boolean('activo')->default(true);
            $table->string('token_verificacion', 100)->nullable();
            $table->boolean('verificado')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};