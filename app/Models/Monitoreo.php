<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    use HasFactory;

    protected $table = 'monitoreos';

    protected $guarded = [];
    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'jugador_id');
    }
}
