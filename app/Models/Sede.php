<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function torneos()
    {
        return $this->hasMany(Torneo::class, 'sede_id');
    }

}
