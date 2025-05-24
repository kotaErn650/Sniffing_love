<?php

namespace App\Models\Pets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
     use HasFactory;
    
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    
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
        'stock' => 'integer'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    
    public function veterinaria()
    {
        return $this->belongsTo('App\Models\Pets\Veterinaria', 'id_veterinaria');
    }
}