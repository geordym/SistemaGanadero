@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Animales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           Mis animales asignados
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Raza</th>
                        <th>Color</th>
                        <th>Galera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animales as $animal)
                        <tr>
                            <td>{{ $animal->codigo }}</td>
                            <td>{{ $animal->raza }}</td>
                            <td>{{ $animal->color }}</td>
                            <td>{{ $animal->galera }}</td>

                            <td>
                                <a href="{{ route('vacunas.show', $animal->id) }}" class="btn btn-info">Vacunas</a>
                                <a href="{{ route('servicios.show', $animal->id) }}" class="btn btn-primary">Servicios</a>
                                <a href="{{ route('animales.show', $animal->id) }}" class="btn btn-warning">Ver animal</a>
                                <a href="{{ route('ganadero.editgalera', $animal->id) }}" class="btn btn-secondary">Galera</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
