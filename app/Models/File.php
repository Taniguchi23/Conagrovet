<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function cita(){
        return $this->belongsTo(cita::class);
    }
    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }
}
