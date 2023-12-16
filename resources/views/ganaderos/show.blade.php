@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

<h1>Ganaderos</h1>
@stop


@section('content')
<div class="card">
    <div class="card-header">
        Detalles del Ganadero

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Nombres:</dt>
            <dd class="col-sm-9">{{ $ganadero->nombres }}</dd>

            <dt class="col-sm-3">Apellidos:</dt>
            <dd class="col-sm-9">{{ $ganadero->apellidos }}</dd>

            <dt class="col-sm-3">Correo:</dt>
            <dd class="col-sm-9">{{ $ganadero->email }}</dd>

            <dt class="col-sm-3">Dirección:</dt>
            <dd class="col-sm-9">{{ $ganadero->direccion }}</dd>
        </dl>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Ganados asignados



    </div>
    <div class="card-body">


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
                @foreach($ganadero->animales as $animal)
                <tr>
                    <td>{{ $animal->codigo }}</td>
                    <td>{{ $animal->raza }}</td>
                    <td>{{ $animal->color }}</td>
                    <td>
                        <a href="{{ route('animales.show', $animal->id) }}" class="btn btn-info">Ver</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
