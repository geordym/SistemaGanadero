@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Animales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de Animales
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('animales.create') }}" class="btn btn-success">Agregar Nuevo Animal</a>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Raza</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animales as $animal)
                        <tr>
                            <td>{{ $animal->codigo }}</td>
                            <td>{{ $animal->raza }}</td>
                            <td>{{ $animal->color }}</td>
                            <td>
                                <a href="{{ route('animales.show', $animal->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('animales.edit', $animal->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('animales.destroy', $animal->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este animal?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
