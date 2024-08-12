@extends('layouts.template')
@section('title', 'Editar deporte')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('deportes.index') }}" class="btn btn-light"><i
                        class="nav-icon fas fa-arrow-circle-left"></i> Regresar</a>
                <form action="{{route('deportes.update', $deporte)}}" method="post" class="mt-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="name" id="inputName" placeholder="Ingresa el nombre del deporte" value="{{old('name', $deporte -> name)}}">
                        @error('name')
                        <div class="badge badge-danger text-wrap">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea required class="form-control" name="description" id="textareaDescription" rows="3" placeholder="Ingresa una breve descripción">{{old('description', $deporte -> description)}}</textarea>
                        @error('description')
                        <div class="badge badge-danger text-wrap">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
