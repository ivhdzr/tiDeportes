@extends('layouts.template')
@section('title', 'Torneo: ' . $torneo -> nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('torneos.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('torneos.edit', $torneo) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre del torneo: <strong>{{ $torneo->nombre }}</strong></li>
                    <li class="list-group-item">Fecha de inicio: <strong>{{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('d/m/Y H:i:s') }}</strong></li>
                    <li class="list-group-item">Fecha final: <strong>{{ \Carbon\Carbon::parse($torneo->fecha_final)->format('d/m/Y H:i:s') }}</strong></li>
                    <li class="list-group-item">Deporte: <strong>{{ $torneo->deporte->name }}</strong></li>
                    <li class="list-group-item">Sede: <strong>{{ $torneo->sede->nombre }}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$torneo -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$torneo -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
