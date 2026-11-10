<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bike->model }} - BikeRent</title>
</head>
<body>

    <h1>BikeRent</h1>

    <h2>{{ $bike->model }}</h2>

    <p>Número de serie: {{ $bike->serial_number }}</p>
    <p>Precio por hora: {{ $bike->price_per_hour }} €</p>
    <p>Estado: {{ $bike->status }}</p>

    @if ($bike->status === 'available')
        <a href="{{ route('bookings.create', $bike) }}">Reservar bicicleta</a>
    @else
        <p>Esta bicicleta no está disponible para reservar.</p>
    @endif

    <br><br>

    <a href="{{ route('bikes.index') }}">Volver al catálogo</a>

</body>
</html>