<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganadero extends Model
{
    use HasFactory;
    protected $table = "ganaderos";

    protected $fillable = [
        'nombres',
        'apellidos',
        'direccion',
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function animales(){
        return $this->hasMany(Animal::class);
    }




}
