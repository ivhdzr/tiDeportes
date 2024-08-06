<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id');
    }

    public function equipo_local()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipo_visitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function arbitro()
    {
        return $this->belongsTo(Arbitro::class, 'arbitro_id');
    }
}
