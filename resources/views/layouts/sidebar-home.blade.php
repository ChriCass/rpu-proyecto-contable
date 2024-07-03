<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Plugins Core Css -->
    <link href="{{ asset('css/common.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('css/styles/theme-green.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="theme-green theme-black menu_dark logo-black">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin rounded" src="{{ asset('images/rpu.jpg') }}" alt="admin">
            </div>
            <p>un momento por favor...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                    data-bs-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="assets/images/logo.png" alt="" />
                    <span class="logo-name">{{ $empresa->Nombre }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen ">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
 
                    <li class="dropdown user_profile mx-3">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.jpg') }}" alt="user">
                        </div>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">person</i>Perfil
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="material-icons">power_settings_new</i>Cerrar sesion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
              
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image  ">
                                <img src="{{ asset('images/usrbig.jpg') }}" class="user-img-style"
                                    alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">{{ Auth::user()->name }}</div>
                            <div class="profile-usertitle-job">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                    <li class="header">-- Principal</li>
                    <li class="{{ Route::currentRouteName() == 'empresa.show' ? 'active' : '' }}">
                        <a href="{{ route('empresa.show', ['id' => $empresa->id]) }}">
                            <i data-feather="monitor"></i>
                            <span>Panel principal</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'compraVenta' ? 'active' : '' }}">
                        <a href="{{ route('compraVenta', ['id' => $empresa->id]) }}">
                            <i data-feather="monitor"></i>
                            <span>Compra-Venta</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'registrarAsiento' ? 'active' : '' }}">
                        <a href="{{ route('registrarAsiento', ['id' => $empresa->id]) }}">
                            <i data-feather="monitor"></i>
                            <span>Registrar Asiento</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="briefcase"></i>
                            <span>Registros</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/projects/all-projects.html">R. Ventas</a>
                            </li>
                            <li>
                                <a href="pages/projects/add-project.html">R. Compras</a>
                            </li>

                        </ul>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Caja-Diario</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Hoja de trabajo</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Diario</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Pendientes</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Conrrentistas</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Mayor</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Plan contable</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
 
    </div>


    @yield('content')

    </div>

    <script src=" {{ asset('js/common.min.js') }}"></script>
    <!-- Custom Js -->
    <script src=" {{ asset('js/admin.js') }}"></script>
    <script src=" {{ asset('js/bundles/echarts.min.js') }}"></script>
    <script src="{{ asset('js/bundles/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/index.js') }}"></script>
    <script src="{{ asset('js/pages/todo/todo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @livewireScripts
    
</body>

</html>
