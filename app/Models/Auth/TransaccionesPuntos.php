<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;

class TransaccionesPuntos extends Model
{
    use HasFactory;

    protected $table = 'transacciones_puntos';
    protected $primaryKey = 'id_transaccion';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'puntos',
        'tipo',
        'motivo',
        'fecha_transaccion',
        'id_referencia',
    ];

    protected $casts = [
        'puntos' => 'integer',
        'fecha_transaccion' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}
