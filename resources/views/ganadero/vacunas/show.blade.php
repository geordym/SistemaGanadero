@extends('adminlte::page')

@section('title', 'Vacunas del Animal')

@section('content_header')
<h1>Vacunas del Animal</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Vacunas</h3><br>
            <p> Visualizando animal: {{$animal->codigo}} - {{$animal->raza}}</p>


            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


        </div>
        <div class="card-body">
            <a href="{{route('vacunas.create', $animal->id)}}" class="btn btn-primary">Añadir Vacuna</a>

            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Veterinario</th>
                        <th>Tipo</th>
                        <th>Fecha de Vacunación</th>
                        <th>Fecha Próxima Vacunación</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($animal->vacunas as $vacuna)
                    <tr>
                        <td>{{ $vacuna->id }}</td>
                        <td>{{ $vacuna->veterinario }}</td>
                        <td>{{ $vacuna->tipo }}</td>
                        <td>{{ $vacuna->fecha_vacunacion }}</td>
                        <td>{{ $vacuna->fecha_vacunacion_proxima }}</td>
                        <td>{{ $vacuna->costo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@stop
