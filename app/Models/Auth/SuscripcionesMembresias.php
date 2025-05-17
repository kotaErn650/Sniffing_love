<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;
use App\Models\Auth\Membresias;

class SuscripcionesMembresias extends Model
{
    use HasFactory;

    protected $table = 'suscripciones_membresias';
    protected $primaryKey = 'id_suscripcion';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'id_membresia',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'metodo_pago',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function membresia()
    {
        return $this->belongsTo(Membresias::class, 'id_membresia');
    }
}