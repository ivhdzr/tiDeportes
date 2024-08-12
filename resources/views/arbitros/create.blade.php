@extends('layouts.template')
@section('title', 'Agregar árbitro')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('arbitros.index') }}" class="btn btn-light"><i class="nav-icon fas fa-arrow-circle-left"></i>
                    Regresar</a>
                <form action="{{ route('arbitros.store') }}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputNombre"
                            placeholder="Ingresa el nombre del árbitro" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="badge badge-danger text-wrap">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input required type="number" class="form-control" name="edad" id="inputEdad"
                                    placeholder="Ingresa la edad del árbitro" value="{{ old('edad') }}">
                                @error('edad')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Número de teléfono</label>
                                <input type="number" class="form-control" name="telefono" id="inputTelefono"
                                    placeholder="Ingresa algún numero de teléfono del árbitro" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="badge badge-danger text-wrap">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Notas</label>
                        <textarea class="form-control" name="notas" id="textareaNotas" rows="3" placeholder="Ingresa alguna nota">{{old('nota')}}</textarea>
                        @error('nota')
                        <div class="badge badge-danger text-wrap">
                            {{$message}}
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