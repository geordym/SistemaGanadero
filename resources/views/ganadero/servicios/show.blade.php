@extends('adminlte::page')

@section('title', 'Servicios del Animal')

@section('content_header')
<h1>Servicios del Animal</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Servicios</h3><br>
            <p> Visualizando animal: {{$animal->codigo}} - {{$animal->raza}}</p>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

        </div>
        <div class="card-body">
            <a href="{{route('servicios.create', $animal->id)}}" class="btn btn-primary">Añadir Servicio</a>

            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha Aplicacion</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($animal->servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->descripcion }}</td>
                        <td>{{ $servicio->fecha_aplicacion }}</td>
                        <td>{{ $servicio->costo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@stop
