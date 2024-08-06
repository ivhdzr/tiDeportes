@extends('layouts.template')
@section('title', 'Torneos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('torneos.create') }}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar torneo</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del torneo</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha final</th>
                                    <th>Deporte</th>
                                    <th>Sede</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($torneos as $torneo)
                                    <tr>
                                        <td>{{ $torneo->nombre }}</td>
                                        <td>{{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($torneo->fecha_final)->format('d/m/Y H:i:s') }}</td>

                                        <td>{{ $torneo->deporte->name }}</td>
                                        <td>{{ $torneo->sede->nombre }}</td>
                                        <td>
                                            <a href="{{ route('torneos.show', $torneo) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('torneos.edit', $torneo) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('torneos.destroy', $torneo) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-nombre="{{ $torneo->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No hay torneos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $torneos->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/torneos.js') }}"></script>
@endsection
