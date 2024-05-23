<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles
    <style>
 
        .text__admin {
            color: #ACCB0C !important;
        }

        .bg__admin{
            background: #00a884 !important;
        }

        .circle {
            width: 100px;
            /* Ajusta el tamaño del círculo según lo necesites */
            height: 100px;
            /* Asegúrate de que el alto y el ancho sean iguales para crear un círculo perfecto */
           
            border-radius: 50%;
            /* Esto crea el círculo */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: calc(2rem + (1 - 0) * ((100vw - 320px) / (1920 - 320)));

        }

   #main-wrapper[data-layout=vertical][data-sidebartype=full] .page-wrapper {
       margin-left: 0 !important;
   }

    </style>
</head>

<body>

    <div class="d-flex flex-column flex-lg-row" id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Sidebar para dispositivos de escritorio -->
          <!-- Sidebar para dispositivos de escritorio -->
    <aside class="bg-white d-none d-lg-block shadow-lg fixed" style="padding: 2rem;">
        <div class="text-center mb-4"> 
            <a  href="{{ route('empresa.show', ['id' => $empresa->id]) }}"><img src="{{ asset('img/rpu.jpg') }}" alt="" width="100" class="img-fluid "></a>
            
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('compraVenta', ['id' => $empresa->id]) }}">
                    <i class="bi bi-cart4 flex-shrink-0"></i> <!-- Icono para Compras-Ventas -->
                    <span class="ms-2">Compras-Ventas</span>
                </a>
            </li>
            
            <li class="nav-item">
                <!-- Usamos un botón para desplegar las opciones -->
                <a class="nav-link d-flex align-items-center" href="#"  >
                    <i class="bi bi-pencil-square flex-shrink-0"></i>
                    <span class="ms-2">Registrar Asiento</span>
                </a>
 
            </li>
            <li class="nav-item">
                <!-- Usamos un botón para desplegar las opciones -->
                <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="collapse" data-bs-target="#submenuRegistroAsiento">
                    <i class="bi bi-arrow-down-square-fill"></i>
                    <span class="ms-2">Reportes Contable</span>
                </a>
                <!-- Submenú desplegable -->
                <div class="collapse" id="submenuRegistroAsiento">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-bar-chart-line flex-shrink-0"></i>
                                <span class="ms-2">R. Ventas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-receipt-cutoff flex-shrink-0"></i>
                                <span class="ms-2">R. Compras</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-journal-text flex-shrink-0"></i> <!-- Cambiado para Diario -->
                                <span class="ms-2">Diario</span>
                            </a>
                        </li>
             
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-clock-history flex-shrink-0"></i> <!-- Cambiado para Pendientes -->
                                <span class="ms-2">Pendientes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-people flex-shrink-0"></i> <!-- Cambiado para Conrrentistas -->
                                <span class="ms-2">Conrrentistas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-book-half flex-shrink-0"></i> <!-- Cambiado para Mayor -->
                                <span class="ms-2">Mayor</span>
                            </a>
                        </li>
             
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-book flex-shrink-0"></i> <!-- Cambiado para Plan contable -->
                                <span class="ms-2">Plan contable</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="map-google.html">
                    <i class="bi bi-cash flex-shrink-0"></i> <!-- Cambiado para Caja-Diario -->
                    <span class="ms-2">Caja-Diario</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="map-google.html">
                    <i class="bi bi-file-earmark-spreadsheet flex-shrink-0"></i> <!-- Cambiado para Hoja de trabajo -->
                    <span class="ms-2">Hoja de trabajo</span>
                </a>
            </li>

            <li class="nav-item text-center mt-5">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
        
    </aside>
        <div class="flex-fill">
            <!-- Header -->
        <!-- Header -->
        <header class="bg__admin">
            <nav class="navbar navbar-expand-lg navbar-dark bg__admin">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Espacio donde estaba la imagen -->
                    <div class="ms-auto my-3">
                        <!-- Botón para cambiar de empresa -->
                        <a class="btn btn-dark" href="{{ route('home') }}">
                         Cambiar de empresa
                        </a>
                      </div>
                      
                </div>
            </nav>
        </header>
            <!-- Offcanvas Sidebar para dispositivos móviles -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menú</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('compraVenta', ['id' => $empresa->id]) }}">
                                <i class="bi bi-cart4 flex-shrink-0"></i> <!-- Icono para Compras-Ventas -->
                                <span class="ms-2">Compras-Ventas</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <!-- Usamos un botón para desplegar las opciones -->
                            <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="collapse" data-bs-target="#submenuRegistroAsiento">
                                <i class="bi bi-pencil-square flex-shrink-0"></i>
                                <span class="ms-2">Registrar Asiento</span>
                            </a>
                            <!-- Submenú desplegable -->
                            <div class="collapse" id="submenuRegistroAsiento">
                                <ul class="nav flex-column ms-4">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="map-google.html">
                                            <i class="bi bi-bar-chart-line flex-shrink-0"></i>
                                            <span class="ms-2">R. Ventas</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="map-google.html">
                                            <i class="bi bi-receipt-cutoff flex-shrink-0"></i>
                                            <span class="ms-2">R. Compras</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-cash flex-shrink-0"></i> <!-- Cambiado para Caja-Diario -->
                                <span class="ms-2">Caja-Diario</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-file-earmark-spreadsheet flex-shrink-0"></i> <!-- Cambiado para Hoja de trabajo -->
                                <span class="ms-2">Hoja de trabajo</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-journal-text flex-shrink-0"></i> <!-- Cambiado para Diario -->
                                <span class="ms-2">Diario</span>
                            </a>
                        </li>
          
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-clock-history flex-shrink-0"></i> <!-- Cambiado para Pendientes -->
                                <span class="ms-2">Pendientes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-people flex-shrink-0"></i> <!-- Cambiado para Conrrentistas -->
                                <span class="ms-2">Conrrentistas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-book-half flex-shrink-0"></i> <!-- Cambiado para Mayor -->
                                <span class="ms-2">Mayor</span>
                            </a>
                        </li>
  
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="map-google.html">
                                <i class="bi bi-book flex-shrink-0"></i> <!-- Cambiado para Plan contable -->
                                <span class="ms-2">Plan contable</span>
                            </a>
                        </li>
                        <li class="nav-item text-center mt-5">
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
    
            <!-- Main content -->
            <div class="page-wrapper" style="min-height: 250px;">
                <div class="container-fluid">
                    @yield('content')
                    <!-- Three charts -->
                </div>
    
                <footer class="footer text-center"> No compartas tu usuario con nadie <a href="/">© logo</a>
                </footer>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    
    @livewireScripts

    <script>
 


    </script>
    </body>
</html>
