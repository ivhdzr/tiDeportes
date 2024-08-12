<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugador;
use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugadores = Jugador::with('equipo')->orderBy('id', 'desc')->paginate(10);
        return view('jugadores.index', compact('jugadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::with('deporte')->select('id', 'nombre', 'deporte_id')->get();
        return view('jugadores.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJugador $request)
    {
        $jugador = Jugador::create($request->all());
        return redirect()->route('jugadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jugador $jugador)
    {
        $jugador->load('equipo');
        return view('jugadores.show', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::with('deporte')->select('id', 'nombre', 'deporte_id')->get();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJugador $request, Jugador $jugador)
    {
        $jugador->update($request->all());
        return redirect()->route('jugadores.show', $jugador);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();
        return redirect()->route('jugadores.index');
    }
}
