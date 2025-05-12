<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosRecompensa extends Model
{
    use HasFactory;

    protected $table = 'puntos_recompensa';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'puntos',
        'motivo',
        'fecha_asignacion',
    ];

    protected $casts = [
        'fecha_asignacion' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}