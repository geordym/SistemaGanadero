<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Visualizar Ganaderos</title>
</head>
<body>

<div class="container mt-5">
    <h1>Lista de Ganaderos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ganaderos as $ganadero)
            <tr>
                <td>{{ $ganadero->id }}</td>
                <td>{{ $ganadero->nombres }}</td>
                <td>{{ $ganadero->apellidos }}</td>
                <td>{{ $ganadero->direccion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
