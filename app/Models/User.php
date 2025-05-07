<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Especifica el nombre de la tabla
    protected $table = 'usuarios';

    // Cambia la clave primaria si es diferente
    protected $primaryKey = 'id_usuario';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'id_rol',
        'nombre',
        'apellido',
        'email',
        'contrasena', // Nota: Laravel espera 'password' por defecto
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'foto_perfil',
        'activo',
        'verificado'
    ];

    // Campos ocultos en arrays
    protected $hidden = [
        'contrasena', // Cambiado de 'password'
        'remember_token',
    ];

    // Casts de tipos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'fecha_nacimiento' => 'date',
        'activo' => 'boolean',
        'verificado' => 'boolean'
    ];

    /**
     * Sobrescribe el nombre del campo de contraseña
     * para que Laravel use 'contrasena' en lugar de 'password'
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Relación con el rol (si existe modelo Rol)
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}