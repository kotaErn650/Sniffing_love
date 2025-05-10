<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politicas extends Model
{
    use HasFactory;

    protected $table = 'politicas';
    protected $primaryKey = 'id_politica';

    protected $fillable = [
        'titulo',
        'contenido',
        'tipo',
        'fecha_creacion',
        'fecha_actualizacion',
        'version',
        'activa',
    ];

    public $timestamps = true;
}