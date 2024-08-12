@extends('layouts.template')
@section('title', 'Editar torneo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('torneos.index') }}" class="btn btn-light"><i
                        class="nav-icon fas fa-arrow-circle-left"></i> Regresar</a>
                <form action="{{ route('torneos.update', $torneo) }}" method="post" class="mt-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputNombre"
                            placeholder="Ingresa el nombre del torneo" value="{{ old('nombre', $torneo->nombre) }}">
                        @error('nombre')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de inicio</label>
                                <input required type="datetime-local" class="form-control" name="fecha_inicio" id="inputFechaInicio"
                                    placeholder="Ingresa la fecha de incio" value="{{ old('fecha_inicio', \Carbon\Carbon::parse($torneo->fecha_inicio)->format('Y-m-d\TH:i')) }}">
                                @error('fecha_inicio')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="fecha_final">Fecha final</label>
                                <input required type="datetime-local" class="form-control" name="fecha_final" id="inputFechaFinal"
                                    placeholder="Ingresa la fecha de incio" value="{{ old('fecha_final', \Carbon\Carbon::parse($torneo->fecha_final)->format('Y-m-d\TH:i')) }}">
                                @error('fecha_final')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="deporte_id">Deporte al que pertenece</label>
                                <select required name="deporte_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($deportes as $deporte)
                                        <option value="{{ $deporte->id }}"
                                            {{ old('deporte_id', $torneo->deporte_id) == $deporte->id ? 'selected' : '' }}>{{ $deporte->name }}</option>
                                    @endforeach
                                </select>
        
                                @error('deporte_id')
                                    <div class="badge badge-danger text-wrap">
                                        Debes seleccionar el deporte
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="sede_id">Sede</label>
                                <select required name="sede_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}"
                                            {{ old('sede_id', $torneo->sede_id) == $sede->id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
        
                                @error('sede_id')
                                    <div class="badge badge-danger text-wrap">
                                        Debes seleccionar la sede
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
