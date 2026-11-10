<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de reserva - BikeRent</title>
</head>
<body>

    <h1>BikeRent</h1>
    <h2>Detalles de la reserva</h2>

    <h3>{{ $booking->bike->model }}</h3>

    <p>Número de serie: {{ $booking->bike->serial_number }}</p>
    <p>Fecha de inicio: {{ $booking->start_time }}</p>
    <p>Fecha de finalización: {{ $booking->end_time }}</p>
    <p>Estado: {{ $booking->status }}</p>
    <p>Coste total: {{ $booking->total_cost }} €</p>

    @if ($booking->status === 'pending')
        <form action="{{ route('bookings.cancel', $booking) }}" method="POST">
            @csrf
            @method('PATCH')

            <button type="submit">Cancelar reserva</button>
        </form>
    @endif

    <br>

    <a href="{{ route('bookings.index') }}">Volver a mis reservas</a>

</body>
</html>