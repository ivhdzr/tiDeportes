<?php

namespace App\Http\Controllers;

use App\Models\Monitoreo;
use App\Models\Equipo;
use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitoreos = Monitoreo::with('jugador')->orderBy('id', 'desc')->paginate(10);
        return view('monitoreos.index', compact('monitoreos'));
    }
}
