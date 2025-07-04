<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    public function file(){
        return $this->belongsTo(File::class);
    }
    public function vacuna(){
        return $this->belongsTo(Vacuna::class);
    }
}
