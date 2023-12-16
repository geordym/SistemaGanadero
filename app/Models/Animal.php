<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = "animales";

    protected $fillable = [
        'codigo',
        'raza',
        'color',
        'genero',
        'fecha_nacimiento',
        'peso',

    ];


    public function ganadero(){
        return $this->belongsTo(Ganadero::class);
    }

    public function vacunas(){
        return $this->hasMany(Vacuna::class);
    }

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }



}
