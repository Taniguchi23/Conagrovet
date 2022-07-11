<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function raza(){
        return $this->belongsTo(Raza::class);
    }
    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
