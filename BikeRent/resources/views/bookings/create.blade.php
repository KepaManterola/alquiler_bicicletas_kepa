<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar bicicleta - BikeRent</title>
</head>
<body>

    <h1>BikeRent</h1>
    <h2>Reservar bicicleta</h2>

    <h3>{{ $bike->model }}</h3>
    <p>Precio por hora: {{ $bike->price_per_hour }} €</p>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <input type="hidden" name="bike_id" value="{{ $bike->id }}">

        <label for="start_time">Fecha y hora de inicio:</label>
        <input type="datetime-local" id="start_time" name="start_time" required>

        <br><br>

        <label for="end_time">Fecha y hora de finalización:</label>
        <input type="datetime-local" id="end_time" name="end_time" required>

        <br><br>

        <button type="submit">Confirmar reserva</button>
    </form>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <br>

    <a href="{{ route('bikes.show', $bike) }}">Volver</a>

</body>
</html>