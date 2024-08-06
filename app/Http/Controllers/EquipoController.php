<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipo;
use App\Models\Equipo;
use App\Models\Deporte;
use Illuminate\Http\Request;
/*use Illuminate\Support\Facades\Crypt;*/

class EquipoController extends Controller
{

    public function index()
    {
        //Recuperar todos los equipos
        $equipos = Equipo::with('deporte')->orderBy('id', 'desc')->paginate(10);
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deportes = Deporte::select('id', 'name')->get();
        return view('equipos.create', compact('deportes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(StoreEquipo $request)
    {
        $equipo = Equipo::create($request->all());
        return redirect()->route('equipos.index');
    }*/

    public function store(StoreEquipo $request)
    {
        $datosEquipo = $request->validated();

        // Encriptar los campos "nombre" y "capitan"
        /*$datosEquipo['nombre'] = Crypt::encrypt($datosEquipo['nombre']);
        $datosEquipo['capitan'] = Crypt::encrypt($datosEquipo['capitan']);*/

        // Crear un nuevo equipo con los datos encriptados
        $equipo = Equipo::create($datosEquipo);

        // Redireccionar a la página de índice de equipos
        return redirect()->route('equipos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        $equipo->load('deporte');
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        $deportes = Deporte::select('id', 'name')->get();
        return view('equipos.edit', compact('equipo', 'deportes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEquipo $request, Equipo $equipo)
    {
        // Validar la solicitud utilizando las mismas reglas de StoreEquipo
        $validatedData = $request->validated();

        // Encriptar los campos "nombre" y "capitan"
        /*$validatedData['nombre'] = Crypt::encrypt($validatedData['nombre']);
        $validatedData['capitan'] = Crypt::encrypt($validatedData['capitan']);*/

        // Actualizar el equipo en la base de datos
        $equipo->update($validatedData);

        // Redireccionar a la página de detalles del equipo actualizado
        return redirect()->route('equipos.show', $equipo);
    }
    /*public function update(Request $request, Equipo $equipo)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required'
        ]);
        $equipo->update($request->all());
        return redirect()->route('deportes.show', $equipo);
    }*/

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        //Borrar si hay relaciones
        $equipo ->jugadores() -> delete();
        $equipo -> delete();
        return redirect()->route('equipos.index');
    }
}
