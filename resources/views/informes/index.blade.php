@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
<h1>Informes</h1>
@stop

@section('content')

<div class="container">

    <div class="row">


        <div class="card">

            <div class="card-header">
                <p>Informe de Animales</p>
            </div>

            <div class="card-body">
                <p>Usa estas opciones para descargar un informe de los animales en el sistema</p>

                <a href="{{route('informes.informeanimales')}}" class="btn btn-primary">Descargar PDF</a>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <p>Informe de Ganaderos</p>
            </div>

            <div class="card-body">
                <p>Usa estas opciones para descargar un informe de los ganaderos en el sistema</p>

                <a href="{{route('informes.informeganaderos')}}" class="btn btn-primary">Descargar PDF</a>

            </div>

        </div>


    </div>


</div>

@stop
