<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'ganadero_id',
        'descripcion',
        'fecha_aplicacion',
        'costo'
    ];


}
