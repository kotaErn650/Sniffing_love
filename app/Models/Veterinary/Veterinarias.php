<?php

namespace App\Models\Veterinary;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarias extends Model
{
    use HasFactory;

    protected $table = 'veterinarias';
    protected $primaryKey = 'id_veterinarias';

    public $timestamps = true;

    protected $fillable =[
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'email',
        'horario_apertura',
        'horario_cierre',
        'descripcion',
        'latitud',
        'longitud',
        'fecha_registro',
        'activa',
        'id_usuario_admin',
        'calificacion_promedio',
        'politica_cancelacion',
        'created_at',
        'updated_at'


    ];

    protected $casts = [
        'horario_apertura' => 'datetime:H:i:s',
        'horario_cierre' => 'datetime:H:i:s',
        'latitud' => 'decimal:8',
        'longitud' => 'decimal:8',
        'fecha_registro' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'activa' => 'boolean',
        'calificacion_promedio' => 'decimal:2'
    ];
    public function usuarioAdmin(){
        return $this->belongsTo(\App\Mosels\Usuaarios:: class, 'id_usuario_admin');
    }
}
