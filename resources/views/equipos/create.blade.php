@extends('layouts.template')
@section('title', 'Agregar equipo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('equipos.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                    Regresar</a>
                <form action="{{ route('equipos.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputName"
                            placeholder="Ingresa el nombre del equipo" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="capitan">Capitán</label>
                        <input autofocus required type="text" class="form-control" name="capitan" id="inputCapitan"
                            placeholder="Ingresa el nombre del capitán del equipo" value="{{ old('capitan') }}">
                        @error('capitan')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deporte_id">Deporte al que pertenece</label>
                        <select required name="deporte_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($deportes as $deporte)
                                <option value="{{ $deporte->id }}"
                                    {{ old('deporte_id') == $deporte->id ? 'selected' : '' }}>{{ $deporte->name }}</option>
                            @endforeach
                        </select>

                        @error('deporte_id')
                            <div class="badge badge-danger text-wrap">
                                Debes seleccionar el deporte
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="activo" value="1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection