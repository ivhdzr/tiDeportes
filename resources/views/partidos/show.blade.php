@extends('layouts.template')
@section('title', 'Partido: ' . $partido -> nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('partidos.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('partidos.edit', $partido) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre: <strong>{{ $partido->nombre }}</strong></li>
                    <li class="list-group-item">Torneo: <strong>{{ $partido->torneo -> nombre }}</strong></li>
                    <li class="list-group-item">Fecha del partido: <strong>{{ \Carbon\Carbon::parse($partido->fecha_partido)->format('d/m/Y H:i:s') }}</strong></li>
                    <li class="list-group-item">Equipo local: <strong>{{  $partido->equipo_local->nombre  . ' (' . $partido->equipo_local->deporte->name . ')' }}</strong></li>
                    <li class="list-group-item">Equipo visitante: <strong>{{ $partido->equipo_visitante->nombre . ' (' . $partido->equipo_visitante->deporte->name . ')'}}</strong></li>
                    <li class="list-group-item">Árbitro: <strong>{{$partido->arbitro -> nombre}}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$partido -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$partido -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
