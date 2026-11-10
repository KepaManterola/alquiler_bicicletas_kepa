<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeRent - Bicicletas</title>
</head>
<body>

    <h1>BikeRent</h1>
    <h2>Catálogo de bicicletas</h2>

    @if ($bikes->isEmpty())
        <p>No hay bicicletas disponibles.</p>
    @else
        @foreach ($bikes as $bike)
            <div>
                <h3>{{ $bike->model }}</h3>

                <p>Número de serie: {{ $bike->serial_number }}</p>
                <p>Precio por hora: {{ $bike->price_per_hour }} €</p>
                <p>Estado: {{ $bike->status }}</p>

                <a href="{{ route('bikes.show', $bike) }}">Ver detalles</a>
            </div>
            <hr>
        @endforeach
    @endif

</body>
</html>