<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ajusta el camino según sea necesario -->
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
