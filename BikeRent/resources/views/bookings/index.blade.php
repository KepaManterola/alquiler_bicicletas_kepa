<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis reservas - BikeRent</title>
</head>
<body>

    <h1>BikeRent</h1>
    <h2>Mis reservas</h2>

    @if ($bookings->isEmpty())
        <p>No tienes ninguna reserva.</p>
    @else
        @foreach ($bookings as $booking)
            <div>
                <h3>{{ $booking->bike->model }}</h3>

                <p>Fecha de inicio: {{ $booking->start_time }}</p>
                <p>Fecha de finalización: {{ $booking->end_time }}</p>
                <p>Estado: {{ $booking->status }}</p>
                <p>Coste total: {{ $booking->total_cost }} €</p>

                <a href="{{ route('bookings.show', $booking) }}">Ver reserva</a>
            </div>
            <hr>
        @endforeach
    @endif

    <a href="{{ route('bikes.index') }}">Volver al catálogo</a>

</body>
</html>