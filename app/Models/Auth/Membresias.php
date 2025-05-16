<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    use HasFactory;

    protected $table = 'membresias';
    protected $primaryKey = 'id_membresia';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_mensual',
        'beneficios',
        'duracion_dias',
    ];

    protected $casts = [
        'precio_mensual' => 'decimal:2',
        'duracion_dias' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}