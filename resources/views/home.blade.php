@extends('layouts.sidebar-home')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row mb-0">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Dashboard</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Widgets -->
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="info-box7 l-bg-green order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">Orders Received</h4>
                        <h2 class="text-end"><i class="fas fa-cart-plus float-start"></i><span>358</span></h2>
                        <p class="m-b-0">18% Higher Then Last Month</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="info-box7 l-bg-purple order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">Completed Orders</h4>
                        <h2 class="text-end"><i class="fas fa-business-time float-start"></i><span>865</span></h2>
                        <p class="m-b-0">21% Higher Then Last Month</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="info-box7 l-bg-orange order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">New Orders</h4>
                        <h2 class="text-end"><i class="fas fa-chart-line float-start"></i><span>128</span></h2>
                        <p class="m-b-0">37% Higher Then Last Month</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="info-box7 l-bg-cyan order-info-box7">
                    <div class="info-box7-block">
                        <h4 class="m-b-20">Total Earning</h4>
                        <h2 class="text-end"><i class="fas fa-dollar-sign float-start"></i><span>$25698</span>
                        </h2>
                        <p class="m-b-0">10% Higher Then Last Month</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Chart</strong> Sample</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="amChartLineHome"></div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-muted font-15 text-truncate">Target</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                                </h5>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-15 text-truncate">Last
                                    week</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                                </h5>
                            </div>
                            <div class="col-4">
                                <p class="text-muted text-truncate">Last
                                    Month</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Chart</strong> Sample</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="amChartCurvedHome"></div>
                        <div class="row">
                            <div class="col-4">
                                <p class="text-muted font-15 text-truncate">Target</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$15.3k
                                </h5>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-15 text-truncate">Last
                                    week</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$2.8k
                                </h5>
                            </div>
                            <div class="col-4">
                                <p class="text-muted text-truncate">Last
                                    Month</p>
                                <h5>
                                    <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$12.5k
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Chart</strong> Data</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="chartdata1"></div>
                        <div class="text-center">
                            <h2 class="font-25 col-green">$150</h2>
                            <small>21% <i class="fas fa-arrow-up col-green"></i>
                                Increase Today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Chart</strong> Data</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="chartdata2"></div>
                        <div class="text-center">
                            <h2 class="font-25 col-green">$150</h2>
                            <small>21% <i class="fas fa-arrow-up col-green"></i>
                                Increase Today</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Chart</strong> Data</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="chartdata3"></div>
                        <div class="text-center">
                            <h2 class="font-25 col-green">$150</h2>
                            <small>21% <i class="fas fa-arrow-up col-green"></i>
                                Increase Today</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>New </strong>Projects</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="new-orders" class="media-list position-relative">
                            <div class="table-responsive">
                                <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Product</th>
                                            <th class="border-top-0">Employees</th>
                                            <th class="border-top-0">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Pixel 2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$5550</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">OnePlus</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$9000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Galaxy</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+1</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$7500</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Moto Z2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8500</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Pixel 2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$5550</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">OnePlus</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$9000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Samsung</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$4563</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Nokia</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+1</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8763</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>Running Projects</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="project-details" class="media-list position-relative">
                            <div class="table-responsive">
                                <table class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Customer</th>
                                            <th>Team</th>
                                            <th>Progress</th>
                                            <th>Start Date</th>
                                            <th>Delivery Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Ecommerce website</a></td>
                                            <td class="font-weight-600">Sarah Smith</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+1</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-cyan shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>July 19, 2018</td>
                                            <td>March 25, 2019</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Android App</a></td>
                                            <td class="font-weight-600">Airi Satou</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+1</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-purple shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>March 21, 2015</td>
                                            <td>July 22, 2017</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Logo Design</a></td>
                                            <td class="font-weight-600">Ashton Cox</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user10.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user6.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-orange shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>Feb 02, 2018</td>
                                            <td>March 12, 2019</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Java Project</a></td>
                                            <td class="font-weight-600">Cara Stevens</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-blue shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>July 19, 2018</td>
                                            <td>March 25, 2019</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Ecommerce website</a></td>
                                            <td class="font-weight-600">John Doe</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-green shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>May 11, 2017</td>
                                            <td>March 15, 2018</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Android App</a></td>
                                            <td class="font-weight-600">Angelica Ramos</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user10.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user4.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-red shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>June 02, 2018</td>
                                            <td>April 05, 2019</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">React App</a></td>
                                            <td class="font-weight-600">Sarah Smith</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user7.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+2</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-green shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>March 12, 2021</td>
                                            <td>April 15, 2022</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Php Website</a></td>
                                            <td class="font-weight-600">Sarah Smith</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user5.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user9.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle"
                                                            src="assets/images/user/user8.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+3</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar l-bg-cyan shadow-style width-per-45"
                                                        role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>Jan 22, 2021</td>
                                            <td>Aug 11, 2021</td>
                                            <td><a class="col-green me-2" data-toggle="tooltip" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a> <a
                                                    class="btn-action col-red" data-toggle="tooltip"
                                                    title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
   
@endsection
