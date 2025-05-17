<?php

namespace App\Models\Veterinary;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = true;

    protected $fillable = [
        'id_veterinaria',
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'stock',
        'imagen',
        'activo'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'activo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    
    public static $categorias = [
        'alimento',
        'medicamento',
        'accesorio',
        'higiene',
        'otro'
    ];

    
    public function veterinaria()
    {
        return $this->belongsTo('App\Models\Veterinary\Veterinarias', 'id_veterinaria');
    }
}