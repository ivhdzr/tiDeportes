@extends('layouts.template')
@section('title', 'Editar sede')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('sedes.index') }}" class="btn btn-light"><i
                        class="nav-icon fas fa-arrow-circle-left"></i> Regresar</a>
                <form action="{{route('sedes.update', $sede)}}" method="post" class="mt-2">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Ingresa el nombre de la sede" value="{{old('nombre', $sede -> nombre)}}">
                        @error('nombre')
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
