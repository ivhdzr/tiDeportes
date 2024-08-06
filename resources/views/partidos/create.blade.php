@extends('layouts.template')
@section('title', 'Agregar partido')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('partidos.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                    Regresar</a>
                <form action="{{ route('partidos.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputNombre"
                            placeholder="Ingresa el nombre del partido" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="torneo_id">Torneo al que pertenece</label>
                                <select required name="torneo_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($torneos as $torneo)
                                        <option value="{{ $torneo->id }}"
                                            {{ old('torneo_id') == $torneo->id ? 'selected' : '' }}>{{ $torneo->nombre }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('torneo_id')
                                    <div class="badge badge-danger text-wrap">
                                        Debes seleccionar el torneo al que pertenece
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="fecha_partido">Fecha del partido</label>
                                <input required type="datetime-local" class="form-control" name="fecha_partido"
                                    id="inputFechaPartido" placeholder="Ingresa la fecha de incio"
                                    value="{{ old('fecha_partido') }}">
                                @error('fecha_partido')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="equipo_local_id">Equipo local</label>
                                <select required name="equipo_local_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}"
                                            {{ old('equipo_local_id') == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre . ' (' . $equipo->deporte->name . ')' }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('equipo_local_id')
                                    <div class="badge badge-danger text-wrap">
                                        Debes asignar a un equipo local
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="equipo_visitante_id">Equipo visitante</label>
                                <select required name="equipo_visitante_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}"
                                            {{ old('equipo_visitante_id') == $equipo->id ? 'selected' : '' }}>
                                            {{ $equipo->nombre . ' (' . $equipo->deporte->name . ')' }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('equipo_visitante_id')
                                    <div class="badge badge-danger text-wrap">
                                        Debes asignar a un equipo visitante
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="arbitro_id">Árbitro</label>
                        <select required name="arbitro_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($arbitros as $arbitro)
                                <option value="{{ $arbitro->id }}"
                                    {{ old('arbitro_id') == $arbitro->id ? 'selected' : '' }}>{{ $arbitro->nombre }}
                                </option>
                            @endforeach
                        </select>

                        @error('arbitro_id')
                            <div class="badge badge-danger text-wrap">
                                Debes asignar a un árbitro
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
