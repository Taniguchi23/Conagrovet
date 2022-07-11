<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    public function mascota(){
        return $this->belongsTo(Mascota::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
