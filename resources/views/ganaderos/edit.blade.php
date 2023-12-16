@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Ganaderos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Editar Ganadero

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif


        </div>
        <div class="card-body">
            <form action="{{ route('ganaderos.update', $ganadero->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $ganadero->nombres }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $ganadero->apellidos }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $ganadero->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $ganadero->direccion }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
@stop
