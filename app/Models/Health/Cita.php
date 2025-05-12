<?php

namespace App\Models\Health;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    public $timestamps = true;

    protected $fillable = [
        'id_veterinaria',
        'id_usuario',
        'id_mascota',
        'id_veterinaria_servicio',
        'id_veterinario',
        'fecha_hora',
        'estado',
        'motivo',
        'notas',
        'calificacion',
        'comentario_calificacion',
    ];
}