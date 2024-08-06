@extends('layouts.template')
@section('title', 'Agregar jugador')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('jugadores.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                    Regresar</a>
                <form action="{{ route('jugadores.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputName"
                            placeholder="Ingresa el nombre del jugador" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="posicion">Posición</label>
                                <input required type="text" class="form-control" name="posicion" id="inputPosicion"
                                    placeholder="Ingresa la posición del jugador" value="{{ old('posicion') }}">
                                @error('posicion')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input required type="number" class="form-control" name="edad" id="inputEdad"
                                    placeholder="Ingresa la edad del jugador" value="{{ old('edad') }}">
                                @error('edad')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Número de teléfono</label>
                                <input type="number" class="form-control" name="telefono" id="inputTelefono"
                                    placeholder="Ingresa algún numero de teléfono del jugador" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="equipo_id">Equipo al que pertenece</label>
                        <select required name="equipo_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}"
                                    {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>{{  $equipo->nombre ." (". $equipo -> deporte -> name .")"}}</option>
                            @endforeach
                        </select>

                        @error('deporte_id')
                            <div class="badge badge-danger text-wrap">
                                Debes asignar a el jugador a un equipo
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