<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArbitro;
use App\Models\Arbitro;
use Illuminate\Http\Request;

class ArbitroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recuperar todos los árbitros
        $arbitros = Arbitro::orderBy('id', 'desc')->paginate(10);
        return view('arbitros.index', compact('arbitros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('arbitros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArbitro $request)
    {
        $arbitro = Arbitro::create($request->all());
        return redirect()->route('arbitros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Arbitro $arbitro)
    {
        //
        return view('arbitros.show', compact('arbitro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arbitro $arbitro)
    {
        //
        return view('arbitros.edit', compact('arbitro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArbitro $request, Arbitro $arbitro)
    {
        $arbitro->update($request->all());
        return redirect()->route('arbitros.show', $arbitro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arbitro $arbitro)
    {
        $arbitro -> delete();
        return redirect() -> route('arbitros.index');
    }
}
