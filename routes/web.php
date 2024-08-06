<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DeporteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\ArbitroController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\MonitoreoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// TODAS LAS RUTAS DEL SISTEMA

Route::middleware(['auth', 'verified'])->group(function () {
    /* Rutas de acceso deporte */

    Route::get('deportes', [DeporteController::class, 'index'])->name('deportes.index');
    Route::get('deportes/create', [DeporteController::class, 'create'])->name('deportes.create');
    Route::get('deportes/{deporte}', [DeporteController::class, 'show'])->name('deportes.show');
    Route::post('deportes', [DeporteController::class, 'store'])->name('deportes.store');
    Route::get('deportes/{deporte}/edit', [DeporteController::class, 'edit'])->name('deportes.edit');
    Route::put('deportes/{deporte}', [DeporteController::class, 'update'])->name('deportes.update');
    Route::delete('deportes/{deporte}', [DeporteController::class, 'destroy'])->name('deportes.destroy');

    /* Rutas de acceso equipo */
    Route::controller(EquipoController::class)->group(function () {
        Route::get('equipos', 'index')->name('equipos.index');
        Route::get('equipos/create', 'create')->name('equipos.create');
        Route::get('equipos/{equipo}', 'show')->name('equipos.show');
        Route::post('equipos', 'store')->name('equipos.store');
        Route::get('equipos/{equipo}/edit', 'edit')->name('equipos.edit');
        Route::put('equipos/{equipo}', 'update')->name('equipos.update');
        Route::delete('equipos/{equipo}', 'destroy')->name('equipos.destroy');
    });

    /* Rutas de acceso jugadores */
    Route::controller(JugadorController::class)->group(function () {
        Route::get('jugadores', 'index')->name('jugadores.index');
        Route::get('jugadores/create', 'create')->name('jugadores.create');
        Route::get('jugadores/{jugador}', 'show')->name('jugadores.show');
        Route::post('jugadores', 'store')->name('jugadores.store');
        Route::get('jugadores/{jugador}/edit', 'edit')->name('jugadores.edit');
        Route::put('jugadores/{jugador}', 'update')->name('jugadores.update');
        Route::delete('jugadores/{jugador}', 'destroy')->name('jugadores.destroy');
    });

    /* Rutas de acceso sedes */
    Route::controller(SedeController::class)->group(function () {
        Route::get('sedes', 'index')->name('sedes.index');
        Route::get('sedes/create', 'create')->name('sedes.create');
        Route::get('sedes/{sede}', 'show')->name('sedes.show');
        Route::post('sedes', 'store')->name('sedes.store');
        Route::get('sedes/{sede}/edit', 'edit')->name('sedes.edit');
        Route::put('sedes/{sede}', 'update')->name('sedes.update');
        Route::delete('sedes/{sede}', 'destroy')->name('sedes.destroy');
    });

    /* Rutas de acceso torneos */
    Route::controller(TorneoController::class)->group(function () {
        Route::get('torneos', 'index')->name('torneos.index');
        Route::get('torneos/create', 'create')->name('torneos.create');
        Route::get('torneos/{torneo}', 'show')->name('torneos.show');
        Route::post('torneos', 'store')->name('torneos.store');
        Route::get('torneos/{torneo}/edit', 'edit')->name('torneos.edit');
        Route::put('torneos/{torneo}', 'update')->name('torneos.update');
        Route::delete('torneos/{torneo}', 'destroy')->name('torneos.destroy');
    });

    /* Rutas de acceso árbitros */
    Route::controller(ArbitroController::class)->group(function () {
        Route::get('arbitros', 'index')->name('arbitros.index');
        Route::get('arbitros/create', 'create')->name('arbitros.create');
        Route::get('arbitros/{arbitro}', 'show')->name('arbitros.show');
        Route::post('arbitros', 'store')->name('arbitros.store');
        Route::get('arbitros/{arbitro}/edit', 'edit')->name('arbitros.edit');
        Route::put('arbitros/{arbitro}', 'update')->name('arbitros.update');
        Route::delete('arbitros/{arbitro}', 'destroy')->name('arbitros.destroy');
    });

    /* Rutas de acceso partidos */
    Route::controller(PartidoController::class)->group(function () {
        Route::get('partidos', 'index')->name('partidos.index');
        Route::get('partidos/create', 'create')->name('partidos.create');
        Route::get('partidos/{partido}', 'show')->name('partidos.show');
        Route::post('partidos', 'store')->name('partidos.store');
        Route::get('partidos/{partido}/edit', 'edit')->name('partidos.edit');
        Route::put('partidos/{partido}', 'update')->name('partidos.update');
        Route::delete('partidos/{partido}', 'destroy')->name('partidos.destroy');
    });

    /* Rutas de acceso para resultados */
    Route::controller(ResultadoController::class)->group(function () {
        Route::get('resultados', 'index')->name('resultados.index');
        Route::get('resultados/create', 'create')->name('resultados.create');
        Route::get('resultados/{resultado}', 'show')->name('resultados.show');
        Route::post('resultados', 'store')->name('resultados.store');
        Route::get('resultados/{resultado}/edit', 'edit')->name('resultados.edit');
        Route::put('resultados/{resultado}', 'update')->name('resultados.update');
        Route::delete('resultados/{resultado}', 'destroy')->name('resultados.destroy');
    });



    /* Rutas de acceso para monitoreos */
    Route::controller(MonitoreoController::class)->group(function () {
        Route::get('monitoreos', 'index')->name('monitoreos.index');
        /*Route::get('resultados/create', 'create') -> name('resultados.create');
        Route::get('resultados/{resultado}', 'show') -> name('resultados.show');
        Route::post('resultados', 'store') -> name('resultados.store');
        Route::get('resultados/{resultado}/edit', 'edit') -> name('resultados.edit');
        Route::put('resultados/{resultado}','update') -> name('resultados.update');
        Route::delete('resultados/{resultado}', 'destroy') -> name('resultados.destroy');*/
    });


});
require __DIR__ . '/auth.php';
