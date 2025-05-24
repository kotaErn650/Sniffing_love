<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    use HasFactory;

    protected $table = 'configuraciones';
    protected $primaryKey = 'id_configuracion';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'clave',
        'valor',
        'descripcion',
        'tipo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
