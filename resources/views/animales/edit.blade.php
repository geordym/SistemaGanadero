@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Animales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Editar Animal

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif


        </div>
        <div class="card-body">
            <form action="{{ route('animales.update', $animal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $animal->codigo }}" required>
                </div>

                <div class="mb-3">
                    <label for="raza" class="form-label">Raza</label>
                    <input type="text" class="form-control" id="raza" name="raza" value="{{ $animal->raza }}" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $animal->color }}" required>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="macho" {{ $animal->genero == 'macho' ? 'selected' : '' }}>Macho</option>
                        <option value="hembra" {{ $animal->genero == 'hembra' ? 'selected' : '' }}>Hembra</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $animal->fecha_nacimiento }}" required>
                </div>

                <div class="mb-3">
                    <label for="vacunas" class="form-label">Vacunas</label>
                    <input type="text" class="form-control" id="vacunas" name="vacunas" value="{{ $animal->vacunas }}" required>
                </div>

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" value="{{ $animal->peso }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@stop
