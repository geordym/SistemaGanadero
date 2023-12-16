@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Animales</h1>
@stop

@section('content')
<div class="container container-sm">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registrar Vacuna</h3>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

        </div>
        <div class="card-body">
            <form action="{{ route('vacunas.store') }}" method="post">
                @csrf <!-- Agrega el token CSRF para protección -->

                <input type="hidden" name="animal_id" value="{{$animal->id}}" style="display: none;">


                <div class="form-group">
                    <label for="veterinario">Veterinario:</label>
                    <input type="text" class="form-control" id="veterinario" name="veterinario" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de Vacuna:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" required>
                </div>

                <div class="form-group">
                    <label for="fecha_vacunacion">Fecha de Vacunación:</label>
                    <input type="date" class="form-control" id="fecha_vacunacion" name="fecha_vacunacion" required>
                </div>

                <div class="form-group">
                    <label for="fecha_vacunacion_proxima">Fecha de Próxima Vacunación:</label>
                    <input type="date" class="form-control" id="fecha_vacunacion_proxima" name="fecha_vacunacion_proxima" required>
                </div>

                <div class="form-group">
                    <label for="costo">Costo:</label>
                    <input type="number" class="form-control" id="costo" name="costo" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Vacuna</button>
            </form>
        </div>
    </div>
</div>
@stop
