@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')

<h1>Animales</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Detalles del Animal
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Código:</dt>
            <dd class="col-sm-9">{{ $animal->codigo }}</dd>

            <dt class="col-sm-3">Raza:</dt>
            <dd class="col-sm-9">{{ $animal->raza }}</dd>

            <dt class="col-sm-3">Color:</dt>
            <dd class="col-sm-9">{{ $animal->color }}</dd>

            <dt class="col-sm-3">Género:</dt>
            <dd class="col-sm-9">{{ $animal->genero }}</dd>

            <dt class="col-sm-3">Fecha de Nacimiento:</dt>
            <dd class="col-sm-9">{{ $animal->fecha_nacimiento }}</dd>

            <dt class="col-sm-3">Galera:</dt>
            <dd class="col-sm-9">{{ $animal->galera}}</dd>

            <dt class="col-sm-3">Peso:</dt>
            <dd class="col-sm-9">{{ $animal->peso }}</dd>
        </dl>
    </div>

    <div class="card-footer">
        <a class="btn btn-primary" href="{{route('informes.informeanimal', $animal->id)}}">Descargar Informacion</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Vacunas</h3><br>

        </div>
        <div class="card-body">

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


<div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Servicios</h3><br>

        </div>
        <div class="card-body">

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

@stop

