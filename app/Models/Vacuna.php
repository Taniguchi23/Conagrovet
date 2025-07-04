<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    public function animal(){
        return $this->belongsTo(Animal::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
