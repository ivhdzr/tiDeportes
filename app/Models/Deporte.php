<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'deporte_id');
    }
}
