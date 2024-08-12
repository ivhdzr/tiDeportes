<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeporte;
use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recuperar todos los deportes
        $deportes = Deporte::orderBy('id', 'desc')->paginate(10);
        return view('deportes.index', compact('deportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('deportes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeporte $request)
    {
        $deporte = Deporte::create($request->all());
        return redirect()->route('deportes.show', $deporte);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deporte $deporte)
    {
        //
        return view('deportes.show', compact('deporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deporte $deporte)
    {
        //
        return view('deportes.edit', compact('deporte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deporte $deporte)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ]);
        $deporte->update($request->all());
        return redirect()->route('deportes.show', $deporte);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deporte $deporte)
    {
        //
        $deporte->equipos()->delete();
        // Luego, eliminar el deporte
        $deporte->delete();

        return redirect()->route('deportes.index');
    }

}
