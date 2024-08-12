@extends('layouts.template')
@section('title', 'Jugador: ' . $jugador -> nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('jugadores.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre: <strong>{{ $jugador->nombre }}</strong></li>
                    <li class="list-group-item">Posición: <strong>{{ $jugador->posicion }}</strong></li>
                    <li class="list-group-item">Edad: <strong>{{ $jugador->edad }}</strong></li>
                    <li class="list-group-item">Teléfono: <strong>{{ $jugador->telefono }}</strong></li>
                    <li class="list-group-item">Equipo al que pertenece: <strong>{{ $jugador->equipo->nombre . " (" . $jugador-> equipo -> deporte -> name .")" }}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$jugador -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$jugador -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
