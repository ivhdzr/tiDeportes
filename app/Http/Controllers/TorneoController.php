<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTorneo;
use App\Models\Torneo;
use App\Models\Deporte;
use App\Models\Sede;


use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recuperar todos los torneos
        $torneos = Torneo::with('deporte', 'sede')->orderBy('id', 'desc')->paginate(10);
        return view('torneos.index', compact('torneos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deportes = Deporte::select('id', 'name')->get();
        $sedes = Sede::select('id', 'nombre')->get();
        return view('torneos.create', compact('deportes', 'sedes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTorneo $request)
    {
        $torneo = Torneo::create($request->all());
        return redirect()->route('torneos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Torneo $torneo)
    {
        $torneo->load('deporte');
        $torneo->load('sede');
        return view('torneos.show', compact('torneo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Torneo $torneo)
    {
        $deportes = Deporte::select('id', 'name')->get();
        $sedes = Sede::select('id', 'nombre')->get();
        return view('torneos.edit', compact('torneo', 'deportes', 'sedes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTorneo $request, Torneo $torneo)
    {
        $torneo->update($request->all());
        return redirect()->route('torneos.show', $torneo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Torneo $torneo)
    {
        $torneo->delete();
        return redirect() -> route('torneos.index');
    }

}
