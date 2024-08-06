<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSede;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recuperar todas los deportes
        $sedes = Sede::orderBy('id', 'desc')->paginate(10);
        return view('sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sedes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSede $request)
    {
        $sede = Sede::create($request->all());
        return redirect()->route('sedes.index');
        //return redirect()->route('sedes.show', $sede);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sede $sede)
    {
        //
        return view('sedes.show', compact('sede'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sede $sede)
    {
        //
        return view('sedes.edit', compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSede $request, Sede $sede)
    {
        $sede->update($request->all());
        return redirect()->route('sedes.show', $sede);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sede $sede)
    {
        $sede->torneos()->delete();

        $sede->delete();

        return redirect()->route('sedes.index');
    }

}
