@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Animales</h1>
@stop

@section('content')


<div class="container container-sm">


    <div class="card">
        <div class="card-header">
            Agregar Nuevo Animal

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif

        </div>
        <div class="card-body">
            <form action="{{ route('animales.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                </div>

                <div class="mb-3">
                    <label for="raza" class="form-label">Raza</label>
                    <input type="text" class="form-control" id="raza" name="raza" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" required>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>


                <div class="mb-3">
                    <label for="peso" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

</div>
@stop
