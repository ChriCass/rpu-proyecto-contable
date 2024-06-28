<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @auth
        <nav class="navbar navbar-expand-md p-0  navbar-light bg-primary shadow-sm">
            <div class="container">
                <a id="greeting" class="navbar-brand fw-bolder text-light" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item text-center my-3">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth

        <main class="mt-3 bg-company">
            @yield('content')
        </main>
    </div>

    <script>
        function updateGreeting() {
            const date = new Date();
            const hour = date.getHours();
            let greeting;

            if (hour < 12) {
                greeting = 'Buenos días';
            } else if (hour < 18) {
                greeting = 'Buenas tardes';
            } else {
                greeting = 'Buenas noches';
            }

            document.getElementById('greeting').textContent = greeting + '!';
        }

        // Actualiza el saludo al cargar la página
        updateGreeting();
    </script>
</body>
</html>
