<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politicas extends Model
{
    use HasFactory;

    protected $table = 'politicas';
    protected $primaryKey = 'id_politica';
    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'contenido',
        'tipo',
        'fecha_creacion',
        'fecha_actualizacion',
        'version',
        'activa',
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'fecha_actualizacion' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'activa' => 'boolean',
    ];
}