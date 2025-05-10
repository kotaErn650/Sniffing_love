<?php

namespace App\Models\Veterinary;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'ide_servicio';

    protected $fillable =[
        'nombre',
        'descripcion',
        'duracion_estimada',
        'categoria'


    ];

}
