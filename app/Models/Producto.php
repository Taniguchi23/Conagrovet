<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function series (){
        return $this->hasMany(Serie::class);
    }

    public function vacunas(){
        return $this->hasMany(Vacuna::class);
    }
}
