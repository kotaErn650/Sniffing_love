<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'id_rol',
        'nombre',
        'apellido',
        'email',
        'contrasena',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'foto_perfil',
        'activo',
        'verificado',
        'token_verificacion',
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
        'token_verificacion',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'fecha_nacimiento' => 'date',
        'activo' => 'boolean',
        'verificado' => 'boolean',
    ];

    // Sobrescribir el nombre del campo de contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}