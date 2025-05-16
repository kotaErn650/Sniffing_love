<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;

class PuntosRecompensa extends Model
{
    use HasFactory;

    protected $table = 'puntos_recompensa';
    protected $primaryKey = 'id_punto';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'puntos',
        'fecha_actualizacion',
    ];

    protected $casts = [
        'puntos' => 'integer',
        'fecha_actualizacion' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}