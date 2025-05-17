<?php

namespace App\Models\Veterinary;

use Illuminate\Database\Eloquent\Model;

class Carritos extends Model
{
    protected $table = 'carritos';
    protected $primaryKey = 'id_carrito';
    public $timestamps = true; // Esto es opcional ya que Laravel lo asume por defecto

    protected $fillable = [
        'id_usuario'
    ];

    // Relación con usuario (ajusta el namespace según tu modelo de usuario)
    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario');
    }
}