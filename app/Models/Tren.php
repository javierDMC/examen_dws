<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tren extends Model
{
    use HasFactory;

    public function pasajeros(){
        return $this->belongsToMany(Pasajero::class);
    }

    public function maquinista(){
        return $this->belongsTo(Tren::class);
    }
}
