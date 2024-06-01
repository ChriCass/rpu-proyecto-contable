<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
  
    <!-- Plugins Core Css -->
    <link href="{{ asset('css/common.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('css/styles/theme-green.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="theme-green">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="assets/images/loading.png" alt="admin">
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
                    <span class="logo-name">GestionHR</span>
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
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
                    <!-- #START# Notifications-->
                    <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                            role="button">
                            <i class="far fa-bell"></i>
                            <span class="notify"></span>
                            <span class="heartbeat"></span>
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user1.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Sarah Smith</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user2.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Airi Satou</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user3.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user4.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Ashton Cox</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user5.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Cara Stevens</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="assets/images/user/user6.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Charde Marshall</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{ asset('images/user7.jpg') }}" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#" onClick="return false;">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications-->
                    <li class="dropdown user_profile">
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
                    <li class="pull-right">
                        <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                            <i class="fas fa-cog"></i>
                        </a>
                    </li>
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
                            <div class="sidebar-userpic-name">{{ Auth::user()->nombre_usuario }}</div>
                            <div class="profile-usertitle-job">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                    <li class="header">-- Principal</li>
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <i data-feather="monitor"></i>
                            <span>Panel principal</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="users"></i>
                            <span>Colaboradores</span>
                        </a>
                        <ul class="ml-menu">
                            <li >
                                <a href=""><span>Todos los Colaboradores</span></a>
                            </li>
                            <li >
                                <a href=""><span>Añadir Colaborador</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="briefcase"></i>
                            <span>Contratos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/projects/all-projects.html">Todos los contratos</a>
                            </li>
                            <li>
                                <a href="pages/projects/add-project.html">Añadir Contrato</a>
                            </li>
                            <li>
                                <a href="pages/projects/edit-project.html">Editar Contrato</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="book-open"></i>
                            <span>Horarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/attendance/today-attend.html">Todos los Horarios </a>
                            <li>
                                <a href="pages/attendance/emp-attend.html">Añadir horario</a>
                            </li>
                            <li>
                                <a href="pages/attendance/emp-attend.html">Editar horario</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="user"></i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/clients/all-clients.html">Todos los usuarios</a>
                            </li>
                            <li>
                                <a href="pages/clients/add-client.html">Añadir usuario</a>
                            </li>
                            <li>
                                <a href="pages/clients/edit-client.html">Editar usuario</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="clipboard"></i>
                            <span>Areas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/leave/all-leave.html">Todas las Areas</a>
                            </li>
                            <li>
                                <a href="pages/leave/leave-balance.html">Añadir Area</a>
                            </li>
                            <li>
                                <a href="pages/leave/add-leave.html">Editar Area</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="headphones"></i>
                            <span>Cargos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/holiday/all-holidays.html">Todos los cargos</a>
                            </li>
                            <li>
                                <a href="pages/holiday/add-holiday.html">Añadir cargo</a>
                            </li>
                            <li>
                                <a href="pages/holiday/edit-holiday.html">Editar Cargo</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="book"></i>
                            <span>Accounts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/accounts/income.html">Income</a>
                            </li>
                            <li>
                                <a href="pages/accounts/expense.html">Expenses</a>
                            </li>
                            <li>
                                <a href="pages/accounts/invoice.html">Invoices</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="trello"></i>
                            <span>Departments</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/departments/all-departments.html">All Departments</a>
                            </li>
                            <li>
                                <a href="pages/departments/add-department.html">Add Department</a>
                            </li>
                            <li>
                                <a href="pages/departments/edit-department.html">Edit Departments</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="dollar-sign"></i>
                            <span>Payroll</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/payroll/payslip.html">Payslip</a>
                            </li>
                            <li>
                                <a href="pages/payroll/employee-salary.html">Employee Salary</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="command"></i>
                            <span>Job</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/job/add-job.html">Add Job</a>
                            </li>
                            <li>
                                <a href="pages/job/requirement-list.html">Requirements</a>
                            </li>
                            <li>
                                <a href="pages/job/applicant-list.html">Applicant List</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="package"></i>
                            <span>Consultancy</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/consultancy/all-consultancy.html">All Consultancy</a>
                            </li>
                            <li>
                                <a href="pages/consultancy/add-consultancy.html">Add Consultancy</a>
                            </li>
                            <li>
                                <a href="pages/consultancy/edit-consultancy.html">Edit Consultancy</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation">
                    <a href="#skins" data-bs-toggle="tab" class="active">SKINS</a>
                </li>
                <li role="presentation">
                    <a href="#settings" data-bs-toggle="tab">SETTINGS</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                    <div class="demo-skin">
                        <div class="rightSetting">
                            <p>SIDEBAR COLOR</p>
                            <div class="selectgroup selectgroup-pills sidebar-color mt-3">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1"
                                        class="btn-check selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2"
                                        class="btn-check selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="rightSetting">
                            <p>THEME COLORS</p>
                            <div class="btn-group theme-color mt-3" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" value="1"
                                    id="btnradio1" autocomplete="off" checked>
                                <label class="radio-toggle btn btn-outline-primary" for="btnradio1">Light</label>
                                <input type="radio" class="btn-check" name="btnradio" value="2"
                                    id="btnradio2" autocomplete="off">
                                <label class="radio-toggle btn btn-outline-primary " for="btnradio2">Dark</label>
                            </div>
                        </div>
                        <div class="rightSetting">
                            <p>SKINS</p>
                            <ul class="demo-choose-skin choose-theme list-unstyled">
                                <li data-theme="black">
                                    <div class="black-theme"></div>
                                </li>
                                <li data-theme="white">
                                    <div class="white-theme white-theme-border"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple-theme"></div>
                                </li>
                                <li data-theme="blue">
                                    <div class="blue-theme"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan-theme"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green-theme"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange-theme"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="rightSetting">
                            <p>RTL Layout</p>
                            <div class="switch mt-3">
                                <label>
                                    <input type="checkbox" class="layout-change">
                                    <span class="lever switch-col-red layout-switch"></span>
                                </label>
                            </div>
                        </div>
                        <div class="rightSetting">
                            <p>DISK SPACE</p>
                            <div class="sidebar-progress">
                                <div class="progress m-t-20">
                                    <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar"
                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="progress-description">
                                    <small>26% remaining</small>
                                </span>
                            </div>
                        </div>
                        <div class="rightSetting">
                            <p>Server Load</p>
                            <div class="sidebar-progress">
                                <div class="progress m-t-20">
                                    <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar"
                                        aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="progress-description">
                                    <small>Highly Loaded</small>
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <button type="button"
                                class="btn btn-outline-primary btn-border-radius btn-restore-theme">Restore
                                Default</button>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever switch-col-green"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever switch-col-blue"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever switch-col-purple"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever switch-col-cyan"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever switch-col-red"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever switch-col-lime"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
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
 
    @livewireScripts
</body>
</html>
