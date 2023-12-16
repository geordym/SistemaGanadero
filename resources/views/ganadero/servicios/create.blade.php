@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Animales</h1>
@stop

@section('content')
    <div class="container container-sm">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registrar Servicio</h3>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            </div>
            <div class="card-body">
                <form action="{{ route('servicios.store') }}" method="post">
                    @csrf <!-- Agrega el token CSRF para protección -->

                    <input type="hidden" name="animal_id" value="{{$animal->id}}" style="display: none;">


                    <div class="form-group">
                        <label for="veterinario">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Fecha Aplicacion</label>
                        <input type="date" class="form-control" id="fecha_aplicacion" name="fecha_aplicacion" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_vacunacion">Costo:</label>
                        <input type="number" class="form-control" id="costo" name="costo" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar Vacuna</button>
                </form>
            </div>
        </div>
    </div>
@stop
