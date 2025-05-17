<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;

class Notificaciones extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'titulo',
        'mensaje',
        'tipo',
        'leida',
        'fecha_creacion',
        'fecha_leida',
        'url_accion',
    ];

    protected $casts = [
        'leida' => 'boolean',
        'fecha_creacion' => 'datetime',
        'fecha_leida' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}