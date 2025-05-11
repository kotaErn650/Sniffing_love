<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Usuarios;
use App\Models\Auth\Politicas;

class AceptacionPoliticas extends Model
{
    protected $table = 'aceptacion_politicas';
    protected $primaryKey = 'id_aceptacion';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario',
        'id_politica',
        'fecha_aceptacion',
        'version_aceptada',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }

    public function politica()
    {
        return $this->belongsTo(Politicas::class, 'id_politica', 'id_politica');
    }
}