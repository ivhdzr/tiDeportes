@extends('layouts.template')
@section('title', 'Árbitro: ' . $arbitro -> nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('arbitros.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('arbitros.edit', $arbitro) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre: <strong>{{ $arbitro->nombre }}</strong></li>
                    <li class="list-group-item">Edad: <strong>{{ $arbitro->edad }}</strong></li>
                    <li class="list-group-item">Teléfono: <strong>{{ $arbitro->telefono }}</strong></li>
                    <li class="list-group-item">Notas: <strong>{{ $arbitro -> notas}}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$arbitro -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$arbitro -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
