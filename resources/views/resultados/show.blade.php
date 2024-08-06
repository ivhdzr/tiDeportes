@extends('layouts.template')
@section('title', 'Resultados: ' . $resultado -> partido -> nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('resultados.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('resultados.edit', $resultado) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Partido: <strong>{{ $resultado -> partido -> nombre }}</strong></li>
                    <li class="list-group-item">Marcador local: <strong>{{ $resultado->marcador_local }}</strong></li>
                    <li class="list-group-item">Marcador visitante: <strong>{{ $resultado->marcador_visitante }}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$resultado -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$resultado -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
