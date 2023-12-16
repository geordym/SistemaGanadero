@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Ganaderos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de Ganaderos
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('ganaderos.create') }}" class="btn btn-success">Agregar Nuevo Ganadero</a>
            <a href="{{ route('ganaderos.asignacion') }}" class="btn btn-success">Asignar Animales</a>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ganaderos as $ganadero)
                        <tr>
                            <td>{{ $ganadero->nombres }}</td>
                            <td>{{ $ganadero->apellidos }}</td>
                            <td>{{ $ganadero->email }}</td>
                            <td>{{ $ganadero->direccion }}</td>
                            <td>
                                <a href="{{ route('ganaderos.show', $ganadero->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('ganaderos.edit', $ganadero->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('ganaderos.destroy', $ganadero->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este ganadero?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
