@extends('layouts.template')
@section('title', 'Jugadores')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('jugadores.create')}}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar jugador</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del jugador</th>
                                    <th>Posición</th>
                                    <th>Edad</th>
                                    <th>Teléfono</th>
                                    <th>Equipo al que pertenece</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jugadores as $jugador)
                                    <tr>
                                        <td>{{ $jugador->nombre }}</td>
                                        <td>{{ $jugador->posicion }}</td>
                                        <td>{{ $jugador->edad }}</td>
                                        <td>{{ $jugador->telefono }}</td>
                                        <td>{{ $jugador->equipo->nombre . " (" . $jugador-> equipo -> deporte -> name .")" }}</td>
                                        <td>
                                            <a href="{{ route('jugadores.show', $jugador) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('jugadores.edit', $jugador) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('jugadores.destroy', $jugador) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button" data-nombre="{{ $jugador->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No hay jugadores.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $jugadores->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/jugadores.js')}}"></script>
@endsection
