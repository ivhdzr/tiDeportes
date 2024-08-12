<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartido;
use App\Models\Partido;
use App\Models\Torneo;
use App\Models\Equipo;
use App\Models\Arbitro;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los partidos con relaciones cargadas
        $partidos = Partido::with('torneo', 'equipo_local.deporte', 'equipo_visitante.deporte', 'arbitro')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('partidos.index', compact('partidos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $torneos = Torneo::select('id', 'nombre')->get();
        $equipos = Equipo::with('deporte')->select('id', 'nombre', 'deporte_id')->get();
        $arbitros = Arbitro::select('id', 'nombre')->get();
        return view('partidos.create', compact('torneos', 'equipos', 'arbitros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartido $request)
    {
        $partido = Partido::create($request->all());
        return redirect()->route('partidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partido $partido)
    {
        $partido->load('torneo');
        $partido->load('equipo_local.deporte');
        $partido->load('equipo_visitante.deporte');
        $partido->load('arbitro');
        return view('partidos.show', compact('partido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partido $partido)
    {
        $torneos = Torneo::select('id', 'nombre')->get();
        $equipos = Equipo::with('deporte')->select('id', 'nombre', 'deporte_id')->get();
        $arbitros = Arbitro::select('id', 'nombre')->get();
        return view('partidos.edit', compact('partido', 'torneos', 'equipos', 'arbitros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePartido $request, Partido $partido)
    {
        $partido->update($request->all());
        return redirect()->route('partidos.show', $partido);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partido $partido)
    {
        //
        $partido -> delete();
        return redirect() -> route('partidos.index');
    }
}
