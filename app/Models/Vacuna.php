<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'ganadero_id',
        'veterinario',
        'tipo',
        'fecha_vacunacion',
        'fecha_vacunacion_proxima',
        'costo'
    ];


    public function animal(){
        $this->belongsTo(Animal::class);
    }


}
