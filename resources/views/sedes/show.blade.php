@extends('layouts.template')
@section('title', 'Sede: ' . $sede->nombre)

@section('content')
    <div class="container">
        <div class="col-12">
            <a href="{{ route('sedes.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                Salir</a>
            <a href="{{ route('sedes.edit', $sede) }}" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i>
                Editar</a>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre de la sede: <strong>{{$sede->nombre}}</strong></li>
                </ul>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mt">Se modificó por última vez: <span class="badge badge-warning">{{$sede -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                    <li class="list-group-item mt">Se creó: <span class="badge badge-info">{{$sede -> created_at -> format('d/m/Y H:i:s')}}</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
