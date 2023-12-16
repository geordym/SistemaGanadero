<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Visualizar Animales</title>
</head>
<body>

<div class="container mt-5">
    <h1>Lista de Animales</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>Vacunas</th>
                <th>Peso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animales as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->codigo }}</td>
                <td>{{ $animal->raza }}</td>
                <td>{{ $animal->color }}</td>
                <td>{{ $animal->genero }}</td>
                <td>{{ $animal->fecha_nacimiento }}</td>
                <td>{{ $animal->vacunas }}</td>
                <td>{{ $animal->peso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
