<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Visualizar Animales</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Informacion Del Animal</h1>
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


        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Lista de Vacunas</h3><br>

            </div>
            <div class="card-body">

                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Fecha de Vacunación</th>
                            <th>Fecha Próxima Vacunación</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($animal->vacunas as $vacuna)
                        <tr>
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


        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Lista de Servicios</h3><br>

            </div>
            <div class="card-body">

                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Fecha Aplicacion</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($animal->servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->fecha_aplicacion }}</td>
                            <td>{{ $servicio->costo }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>
