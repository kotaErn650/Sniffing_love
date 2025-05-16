<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;

class Referidos extends Model
{
    use HasFactory;

    protected $table = 'referidos';
    protected $primaryKey = 'id_referido';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_usuario_referidor',
        'id_usuario_referido',
        'fecha_referido',
        'puntos_otorgados'
    ];

    protected $casts = [
        'fecha_referido' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuarioReferidor()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario_referidor', 'id_usuario');
    }

    public function usuarioReferido()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario_referido', 'id_usuario');
    }
}