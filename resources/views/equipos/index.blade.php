@extends('layouts.template')
@section('title', 'Equipos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('equipos.create') }}" class="btn btn-secondary"><i class="nav-icon fas fa-plus-circle"></i>
                    Agregar equipo</a>
                <div class="card mt-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="table-borderless">
                                    <th>Nombre del equipo</th>
                                    <th>Capitán</th>
                                    <th>Deporte al que pertenece</th>
                                    <th>Activo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- /*\Illuminate\Support\Facades\Crypt::decrypt(*/ -->
                                @forelse ($equipos as $equipo)
                                    <tr>
                                        <td>{{ $equipo->nombre}}</td>
                                        <td>{{ $equipo->capitan }}</td>
                                        <td>{{ $equipo->deporte->name }}</td>
                                        <td>
                                            @if ($equipo->activo != 1)
                                                <div class="badge badge-danger text-wrap">
                                                    No
                                                </div>
                                            @else
                                                <div class="badge badge-success text-wrap">
                                                    Sí
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-secondary btn-sm">
                                                <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('equipos.destroy', $equipo) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-nombre="{{ $equipo->nombre }}">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No hay equipos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {!! $equipos->withQueryString()->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/equipos.js') }}"></script>
@endsection
