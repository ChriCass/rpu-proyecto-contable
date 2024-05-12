<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="sc">
    <main class="container bg-white shadow rounded mt-5 ">
        <div class="row align-items-stretch">
            <div class="col  p-0 d-flex d-none mt-5 d-lg-block col-lg-5 col-xl-6 rounded">
                <img src="{{ asset('img/rpu.jpg') }}" class="bg rounded" alt="">
            </div>
            <div class="col  p-5 rounded-end">
                <div class="text-end">
                    <img class="img-fluid" width="48" src="{{ asset('img/bsg-logo.png') }}" alt="">
                </div>
                <h2 class="fw-bold text-center py-3">Bienvenido</h2>

                <!-- Modifica el action para apuntar a la ruta de login de Laravel -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf <!-- Token CSRF para proteger tu formulario -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo</label>
                        <!-- Asegúrate de usar el nombre 'email' y un id único -->
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <!-- Asegúrate de usar el nombre 'password' y un id único -->
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Contraseña">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                        <label class="form-check-label" for="remember"> Mantenerme conectado </label>
                    </div>
                    <div class="d-flex my-3">
                        <button type="submit" class="btn btn-primary w-100 text-light">
                            Ingresar
                        </button>
                    </div>
                    <div class="my-3 d-flex flex-column">
                        <span>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></span>
                        <span><a href="{{ route('password.request') }}">Recuperar Contraseña</a></span>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
