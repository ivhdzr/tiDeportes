@extends('layouts.template')
@section('title', 'Monitoreos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--<a href="{{ route('jugadores.create') }}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                        Agregar jugador</a>-->
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del jugador</th>
                                    <th>Frecuencia cardiaca</th>
                                    <th>Fecha en la que sucedió</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($monitoreos as $monitoreo)
                                    <tr>
                                        <td>{{ $monitoreo->jugador->nombre . ' (' . $monitoreo->jugador_id . ')' }}</td>
                                        <td>
                                            {{ $monitoreo->freq_cardiaca . ' bpm' }}

                                            @if ($monitoreo->freq_cardiaca > 500)
                                                <div class="badge badge-danger text-wrap">
                                                    Muy alta
                                                </div>
                                            @else
                                                <div class="badge badge-success text-wrap">
                                                    Normal
                                                </div>
                                            @endif

                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($monitoreo->created_at)->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No hay monitoreos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $monitoreos->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/jugadores.js') }}"></script>
@endsection
