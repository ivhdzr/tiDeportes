@extends('layouts.template')
@section('title', 'Árbitros')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('arbitros.create')}}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar árbitro</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del árbitro</th>
                                    <th>Edad</th>
                                    <th>Teléfono</th>
                                    <th>Notas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arbitros as $arbitro)
                                    <tr>
                                        <td>{{ $arbitro->nombre }}</td>
                                        <td>{{ $arbitro->edad }}</td>
                                        <td>{{ $arbitro->telefono }}</td>
                                        <td>{{ $arbitro->notas }}</td>
                                        <td>
                                            <a href="{{ route('arbitros.show', $arbitro) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('arbitros.edit', $arbitro) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('arbitros.destroy', $arbitro) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button" data-nombre="{{ $arbitro->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No hay árbitros.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $arbitros->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/arbitros.js')}}"></script>
@endsection
