<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    public function razas(){
        return $this->hasMany(Raza::class);
    }

    public function vacunas (){
        return $this->hasMany(Vacuna::class);
    }
}
