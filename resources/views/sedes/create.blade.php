@extends('layouts.template')
@section('title', 'Agregar sede')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('sedes.index') }}" class="btn btn-light"><i
                        class="nav-icon fas fa-arrow-circle-left"></i> Regresar</a>
                <form action="{{route('sedes.store')}}" method="post" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input autofocus required type="text" class="form-control" name="nombre" id="inputNombreSede" placeholder="Ingresa el nombre de la sede" value="{{old('nombre')}}">
                        <ul id="suggestions" class="list-unstyled suggestion-list"></ul>
                        @error('nombre')
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

@section('js')
    <script src="{{ asset('js/sedes.js') }}"></script>
@endsection