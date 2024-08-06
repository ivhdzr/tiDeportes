@extends('layouts.template')
@section('title', 'Partidos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('partidos.create') }}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar partido</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del partido</th>
                                    <th>Torneo</th>
                                    <th>Fecha</th>
                                    <th>Equipo local</th>
                                    <th>Equipo visitante</th>
                                    <th>Árbitro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($partidos as $partido)
                                    <tr>
                                        <td>{{ $partido->nombre }}</td>
                                        <td>{{ $partido->torneo -> nombre}}</td>
                                        <td>{{ \Carbon\Carbon::parse($partido->fecha_partido)->format('d/m/Y H:i:s') }}</td>

                                        <td>{{ $partido->equipo_local->nombre  . ' (' . $partido->equipo_local->deporte->name . ')' }}</td>
                                        <td>{{ $partido->equipo_visitante->nombre . ' (' . $partido->equipo_visitante->deporte->name . ')' }}</td>
                                        <td>{{ $partido->arbitro -> nombre}}</td>
                                        <td>
                                            <a href="{{ route('partidos.show', $partido) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('partidos.edit', $partido) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('partidos.destroy', $partido) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-nombre="{{ $partido->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No hay partidos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $partidos->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/partidos.js') }}"></script>
@endsection
