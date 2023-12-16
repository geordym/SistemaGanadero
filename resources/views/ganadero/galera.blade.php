@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Animales</h1>
@stop

@section('content')


<div class="container container-sm">


    <div class="card">

    <div class="card-header">
    <p>Cambiar Galera del Animal</p>

    </div>


    <div class="card-body">
        <form action="{{ route('ganadero.updategalera') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $animal->id }}">


            <div class="mb-3">
                <label for="codigo" class="form-label">Animal</label>
                <input type="text" class="form-control" id="animal" name="animal" value="{{$animal->codigo}} - {{$animal->raza}}" readonly>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Galera</label>
                <input type="text" class="form-control" value="{{$animal->galera}}"  id="galera" name="galera" required>
            </div>


            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</div>

</div>
@stop
