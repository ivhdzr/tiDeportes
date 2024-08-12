<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $guarded = [];

    //protected $table = 'equipos';
    public function deporte()
    {
        return $this->belongsTo(Deporte::class, 'deporte_id');
    }

    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'equipo_id');
    }
}
