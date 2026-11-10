<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeRent</title>
</head>
<body>

    <h1>Bienvenido a BikeRent</h1>

    <p>Alquila tu bicicleta de forma rapida y sencilla.</p>
    
    @guest
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    @endguest

    @auth
        <a href="{{ route('bookings.index') }}">Mis reservas</a>
    @endauth

    <hr>

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