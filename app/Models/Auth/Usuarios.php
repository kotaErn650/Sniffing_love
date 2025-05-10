<?php

namespace App\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Authenticatable implements MustVerifyEmail
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
        'fecha_registro',
        'ultimo_acceso',
        'activo',
        'token_verificacion',
        'verificado',
        'remember_token',
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
        'token_verificacion',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'fecha_nacimiento' => 'date',
        'fecha_registro' => 'datetime',
        'ultimo_acceso' => 'datetime',
        'activo' => 'boolean',
        'verificado' => 'boolean',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}