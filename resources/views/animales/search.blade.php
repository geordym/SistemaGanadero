@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Animales</h1>
@stop

@section('content')


<div class="container container-sm">


    <div class="card">
        <div class="card-header">
            Buscar Animal

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif

        </div>
        <div class="card-body">
            <form action="{{ route('animales.findByCode') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                </div>


                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

</div>
@stop
