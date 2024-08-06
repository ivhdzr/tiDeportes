@extends('layouts.template')
@section('title', 'Resultados')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('resultados.create')}}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar resultados</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Partido</th>
                                    <th>Marcador local</th>
                                    <th>Marcador visitante</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($resultados as $resultado)
                                    <tr>
                                        <td>{{ $resultado->partido -> nombre }}</td>
                                        <td>{{ $resultado->marcador_local }}</td>
                                        <td>{{ $resultado->marcador_visitante }}</td>
                                        <td>
                                            <a href="{{ route('resultados.show', $resultado) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('resultados.edit', $resultado) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('resultados.destroy', $resultado) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button" data-nombre="{{ $resultado->partido->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hay resultados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $resultados->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/resultados.js')}}"></script>
@endsection
