<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultado;
use App\Models\Resultado;
use App\Models\Partido;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Resultado::with('partido')->orderBy('id', 'desc')->paginate(10);
        return view('resultados.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partidos = Partido::select('id', 'nombre')->get();
        return view('resultados.create', compact('partidos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultado $request)
    {
        //
        $resultado = Resultado::create($request->all());
        return redirect()->route('resultados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        //
        $resultado -> load('partido');
        return view('resultados.show', compact('resultado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        //
        $partidos = Partido::select('id', 'nombre')->get();
        return view('resultados.edit', compact('resultado', 'partidos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreResultado $request, Resultado $resultado)
    {
        $resultado->update($request->all());
        return redirect()->route('resultados.show', $resultado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return redirect()->route('resultados.index');
    }
}
