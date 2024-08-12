@extends('layouts.template')
@section('title', 'Editar resultado')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('resultados.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                    Regresar</a>
                <form action="{{ route('resultados.update', $resultado) }}" method="post" class="mt-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="partido_id">Partido</label>
                        <select required name="partido_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($partidos as $partido)
                                <option value="{{ $partido->id }}"
                                    {{ old('equipo_id', $resultado -> partido_id) == $partido->id ? 'selected' : '' }}>{{ $partido->nombre }}</option>
                            @endforeach
                        </select>

                        @error('partido_id')
                            <div class="badge badge-danger text-wrap">
                                Debes asignar los resultados a un partido
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marcador_local">Marcador local</label>
                                <input required type="number" class="form-control" name="marcador_local" id="inputMarcadorLocal"
                                    placeholder="Ingresa el marcador local del partido" value="{{ old('marcador_local', $resultado -> marcador_local) }}">
                                @error('marcador_local')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marcador_visitante">Marcador visitante</label>
                                <input required type="number" class="form-control" name="marcador_visitante" id="inputMarcadorVisitante"
                                    placeholder="Ingresa el marcador local del partido" value="{{ old('marcador_visitante', $resultado -> marcador_visitante) }}">
                                @error('marcador_visitante')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
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