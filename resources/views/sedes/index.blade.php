@extends('layouts.template')
@section('title', 'Sedes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('sedes.create') }}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar sede</a>
                <div class="card mt-2">
                    <div class="table-resposive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre de la sede</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sedes as $sede)
                                    <tr>
                                        <td>{{ $sede->nombre }}</td>
                                        <td>
                                            <a href="{{ route('sedes.show', $sede) }}"
                                                class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sedes.edit', $sede) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sedes.destroy', $sede) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-nombre="{{ $sede->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No hay sedes.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $sedes->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/sedes.js') }}"></script>
@endsection
