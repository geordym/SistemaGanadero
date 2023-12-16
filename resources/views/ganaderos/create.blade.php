@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Ganaderos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Agregar Nuevo Ganadero

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif


        </div>
        <div class="card-body">
            <form action="{{ route('ganaderos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dar acceso a Administracion</label>
                    <input type="checkbox" class="" id="isadmin" name="isadmin" >
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>


        </div>
    </div>
@stop
