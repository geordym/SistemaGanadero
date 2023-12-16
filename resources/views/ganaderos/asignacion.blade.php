@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Ganaderos</h1>
@stop

@section('content')

<div class="container container-sm">

    <div class="card">
        <div class="card-header">
            Asignar Animal

            @if(session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif

        </div>
        <div class="card-body">
            <form action="{{ route('ganaderos.asignar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="codigo" class="form-label">Ganadero</label>
                    <select class="form-control" name="id_ganadero">
                        @foreach($ganaderos as $ganadero)
                        <option value="{{ $ganadero->id }}">{{ $ganadero->nombres }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Animal</label>
                    <select class="form-control" name="id_animal">
                    @foreach($animales as $animal)
                        <option value="{{ $animal->id }}">{{ $animal->codigo }} - {{ $animal->raza }} - {{ $animal->color }}  </option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Asignar</button>
            </form>
        </div>
    </div>

</div>


@stop
