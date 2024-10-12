@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div>{{ session('error') }}</div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaborative Team</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">

</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <!--Login-->
                <form action="{{ route('login') }}" method="POST" class="formulario__login">
                    @csrf
                    <h2>Iniciar Sesión</h2>
                    <input type="email" name="email" required placeholder="Correo Electrónico">
                    <input type="password" name="password" required placeholder="Contraseña">
                    <button type="submit">Entrar</button>
                </form>

                <!--Register-->
                <form action="{{ route('register') }}" method="POST" class="formulario__register">
                    @csrf
                    <h2>Regístrarse</h2>
                    <input type="text" name="nombres" required placeholder="Nombre completos">
                    <input type="text" name="apellidos" required placeholder="Apellidos completos">
                    <input type="text" name="email" required placeholder="Correo Electrónico">
                    <input type="password" name="password" requiered placeholder="Contraseña">
                    
                    <button type="submit">Regístrarse</button>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
