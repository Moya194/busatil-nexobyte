<?php
session_start(); // Iniciamos la sesión

// Verificamos si el usuario está autenticado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Si no está autenticado, redirigimos al login
    header("Location: auth-login.php");
    exit();
}

// Ahora puedes usar los valores almacenados en la sesión
$user_id = $_SESSION['user_id'];
$cedula = $_SESSION['cedula'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$role = $_SESSION['role'];
$saldo = $_SESSION['saldo'];


?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.getappui.com/collab/unikit/default/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:16:39 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Unikit - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="body" class="dark-sidebar">
    <!-- leftbar-tab-menu -->
    <div class="left-sidebar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.php" class="logo">
                <span>
                    <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                    <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <div class="sidebar-user-pro media border-end">
            <div class="position-relative mx-auto">
                <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
                <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
            </div>
            <div class="media-body ms-2 user-detail align-self-center">
                <h5 class="font-14 m-0 fw-bold"><?php echo $_SESSION['nombre']; ?>
                </h5>
                <p class="opacity-50 mb-0">michael.hill@exemple.com</p>
            </div>
        </div>
        <div class="border-end">
            <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab"
                        aria-selected="true">M<span>ain</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Extra" role="tab"
                        aria-selected="false">E<span>xtra</span></a>
                </li>
            </ul>
        </div>
        <!-- Tab panes -->

        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical">
                <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                        <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span><br><span
                                class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAnalytics">
                                <i class="ti ti-stack menu-icon"></i>
                                <span>Analytics</span>
                            </a>
                            <div class="collapse " id="sidebarAnalytics">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Dashboard</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="analytics-customers.php" class="nav-link ">Customers</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a href="analytics-reports.php" class="nav-link ">Reports</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarAnalytics-->
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuthentication">
                                <i class="ti ti-shield-lock menu-icon"></i>
                                <span>Authentication</span>
                            </a>
                            <div class="collapse " id="sidebarAuthentication">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-login.php">Log in</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-register.php">Register</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-recover-pw.php">Re-Password</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-lock-screen.php">Lock Screen</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-404.php">Error 404</a>
                                    </li><!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth-500.php">Error 500</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div><!--end sidebarAuthentication-->
                        </li><!--end nav-item-->
                    </ul>
                    
                </div><!--end sidebarCollapse-->
            </div>
        </div>
    </div>
    <!-- end left-sidenav-->
    <!-- end leftbar-menu-->

    <!-- Top Bar Start -->
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/flags/us_flag.jpg" alt="" class="thumb-xxs rounded">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><img src="assets/images/flags/us_flag.jpg" alt="" height="15"
                                class="me-2">English</a>
                        <a class="dropdown-item" href="#"><img src="assets/images/flags/spain_flag.jpg" alt=""
                                height="15" class="me-2">Spanish</a>
                        <a class="dropdown-item" href="#"><img src="assets/images/flags/germany_flag.jpg" alt=""
                                height="15" class="me-2">German</a>
                        <a class="dropdown-item" href="#"><img src="assets/images/flags/french_flag.jpg" alt=""
                                height="15" class="me-2">French</a>
                    </div>
                </li><!--end topbar-language-->

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-mail"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                        <h6
                            class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Emails <span class="badge bg-soft-primary badge-pill">3</span>
                        </h6>
                        <div class="notification-menu" data-simplebar>
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <img src="assets/images/users/user-1.jpg" alt=""
                                            class="thumb-sm rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">10 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <img src="assets/images/users/user-4.jpg" alt=""
                                            class="thumb-sm rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">40 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <img src="assets/images/users/user-2.jpg" alt=""
                                            class="thumb-sm rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">1 hr ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <img src="assets/images/users/user-5.jpg" alt=""
                                            class="thumb-sm rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 hrs ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <img src="assets/images/users/user-3.jpg" alt=""
                                            class="thumb-sm rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-bell"></i>
                        <span class="alert-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                        <h6
                            class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Notifications <span class="badge bg-soft-primary badge-pill">2</span>
                        </h6>
                        <div class="notification-menu" data-simplebar>
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-chart-arcs"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">10 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-device-computer-camera"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">40 min ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-diamond"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">1 hr ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-drone"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                        <small class="text-muted mb-0">It is a long established fact that a
                                            reader.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                            <a href="#" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">2 hrs ago</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                        <small class="text-muted mb-0">Dummy text of the printing.</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img src="assets/images/users/user-4.jpg" alt="profile-user"
                                class="rounded-circle me-2 thumb-sm" />
                            <div>
                                <small class="d-none d-md-block font-11">Admin</small>
                                <span class="d-none d-md-block fw-semibold font-12">Maria Gibson <i
                                        class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="pages-profile.php"><i
                                class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                        <a class="dropdown-item" href="crypto-settings.php"><i
                                class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="auth-login.php"><i
                                class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                    </div>
                </li><!--end topbar-profile-->
                <li class="notification-list">
                    <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas"
                        data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
                        <i class="ti ti-settings ti-spin"></i>
                    </a>
                </li>
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0"
                            placeholder="Type text...">
                        <button type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Unikit</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Analytics</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Analytics</h4>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="order-lg-2 order-md-1 order-sm-1">
                        <div class="row justify-content-center">
                            <div class="tab-content my-4">
                                <div class="tab-pane active" id="wallet_BTC" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-lg">
                                            <div class="media">
                                                <img src="assets/images/logos/btc.png"
                                                    class="me-2 thumb-md align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <h3 class="m-0 font-24 fw-bold">3.18424000 BTC</h3>
                                                    <p class="text-muted font-12 mb-0">$ 33277.36605044718</p>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </div><!--end col-->
                                        <div class="col-12 col-lg-auto align-self-center mt-2 mt-lg-0">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSend"><i
                                                    data-feather="navigation"
                                                    class="align-self-center icon-xs me-2"></i>Send</button>
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><i
                                                    data-feather="download"
                                                    class="align-self-center icon-xs me-2"></i>Request</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end tab-pane-->
                                <div class="tab-pane" id="wallet_ETH" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <div class="media">
                                                <img src="assets/images/logos/eth.png"
                                                    class="me-2 thumb-md align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <h3 class="m-0 font-24 fw-bold">1.17424000 ETH</h3>
                                                    <p class="text-muted font-12 mb-0">$ 77.36605044718</p>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </div><!--end col-->
                                        <div class="col-auto align-self-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSend"><i
                                                    data-feather="navigation"
                                                    class="align-self-center icon-xs me-2"></i>Send</button>
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><i
                                                    data-feather="download"
                                                    class="align-self-center icon-xs me-2"></i>Request</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end tab-pane-->
                                <div class="tab-pane" id="wallet_DASH" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <div class="media">
                                                <img src="assets/images/logos/dash.png"
                                                    class="me-2 thumb-md align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <h3 class="m-0 font-24 fw-bold">2.99424000 DASH</h3>
                                                    <p class="text-muted font-12 mb-0">$ 277.36605044718</p>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </div><!--end col-->
                                        <div class="col-auto align-self-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSend"><i
                                                    data-feather="navigation"
                                                    class="align-self-center icon-xs me-2"></i>Send</button>
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><i
                                                    data-feather="download"
                                                    class="align-self-center icon-xs me-2"></i>Request</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end tab-pane-->
                                <div class="tab-pane" id="wallet_LTC" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <div class="media">
                                                <img src="assets/images/logos/lite.png"
                                                    class="me-2 thumb-md align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <h3 class="m-0 font-24 fw-bold">5.00024000 LTC</h3>
                                                    <p class="text-muted font-12 mb-0">$ 57.36605044718</p>
                                                </div><!--end media body-->
                                            </div><!--end media-->
                                        </div><!--end col-->
                                        <div class="col-auto align-self-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSend"><i
                                                    data-feather="navigation"
                                                    class="align-self-center icon-xs me-2"></i>Send</button>
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalRequest"><i
                                                    data-feather="download"
                                                    class="align-self-center icon-xs me-2"></i>Request</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end tab-pane-->
                            </div><!--end tab-content-->

                            <!--
                            <div class="col-lg-3 col-md-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-3">
                                                <i class="ti ti-confetti font-36 align-self-center text-dark"></i>
                                            </div>
                                            <div class="col-auto ms-auto align-self-center">
                                                <span class="badge badge-soft-danger px-2 py-1 font-11">-2%</span>
                                            </div>
                                            <div class="col-12 ms-auto align-self-center">
                                                <div id="dash_spark_4" class="mb-3"></div>
                                            </div>
                                            <div class="col-12 ms-auto align-self-center">
                                                <h3 class="text-dark my-0 font-22 fw-bold">85000</h3>
                                                <p class="text-muted mb-0 fw-semibold">Goal Completions</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->

                        </div><!--end row-->

                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Browser Used & Traffic Reports</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive browser_users">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="border-top-0">Browser</th>
                                                <th class="border-top-0">Sessions</th>
                                                <th class="border-top-0">Bounce Rate</th>
                                                <th class="border-top-0">Transactions</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="assets/images/logos/chrome.png" alt="" height="20"
                                                        class="me-2">Chrome</td>
                                                <td>10853<small class="text-muted">(52%)</small></td>
                                                <td> 52.80%</td>
                                                <td>566<small class="text-muted">(92%)</small></td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><img src="assets/images/logos/micro-edge.png" alt="" height="20"
                                                        class="me-2">Microsoft Edge</td>
                                                <td>2545<small class="text-muted">(47%)</small></td>
                                                <td> 47.54%</td>
                                                <td>498<small class="text-muted">(81%)</small></td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><img src="assets/images/logos/in-explorer.png" alt="" height="20"
                                                        class="me-2">Internet-Explorer</td>
                                                <td>1836<small class="text-muted">(38%)</small></td>
                                                <td> 41.12%</td>
                                                <td>455<small class="text-muted">(74%)</small></td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><img src="assets/images/logos/opera.png" alt="" height="20"
                                                        class="me-2">Opera</td>
                                                <td>1958<small class="text-muted">(31%)</small></td>
                                                <td> 36.82%</td>
                                                <td>361<small class="text-muted">(61%)</small></td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><img src="assets/images/logos/chrome.png" alt="" height="20"
                                                        class="me-2">Chrome</td>
                                                <td>10853<small class="text-muted">(52%)</small></td>
                                                <td> 52.80%</td>
                                                <td>566<small class="text-muted">(92%)</small></td>
                                            </tr><!--end tr-->
                                        </tbody>
                                    </table> <!--end table-->
                                </div><!--end /div-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                        
                    </div> <!--end col-->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coin Market</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold pt-0" data-bs-toggle="tab"
                                            href="#Dollor_ex" role="tab">
                                            Dollor
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold pt-0" data-bs-toggle="tab" href="#BTC_ex"
                                            role="tab">
                                            BTC
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold pt-0" data-bs-toggle="tab" href="#ETH_ex"
                                            role="tab">
                                            ETH
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Dollor_ex" role="tabpanel" data-simplebar=""
                                        style="height: 210px;">
                                        <ul class="list-unsyled m-0 ps-0 mt-1">
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/btc.png" alt=""
                                                        class="me-1" height="20">BTC-USD</a>
                                                <span class="text-muted">$1420.00</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/eth.png" alt=""
                                                        class="me-1" height="20">ETH-USD</a>
                                                <span class="text-muted">$233.00</span>
                                                <span class="text-success">0.28%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dash.png" alt=""
                                                        class="me-1" height="20">BCH-USD</a>
                                                <span class="text-muted">$12.00</span>
                                                <span class="text-success">0.12%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/mon.png" alt=""
                                                        class="me-1" height="20">BSV-USD</a>
                                                <span class="text-muted">$95.00</span>
                                                <span class="text-danger">-0.22%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/lite.png" alt=""
                                                        class="me-1" height="20">LTC-USD</a>
                                                <span class="text-muted">$32.00</span>
                                                <span class="text-danger">-0.09%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/qub.png" alt=""
                                                        class="me-1" height="20">BNB-USD</a>
                                                <span class="text-muted">$51.00</span>
                                                <span class="text-success">0.27%</span>
                                            </li>
                                            <li class="align-items-center d-flex justify-content-between py-1">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dollar.png"
                                                        alt="" class="me-1" height="20">ADA-USD</a>
                                                <span class="text-muted">$88.00</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                        </ul>
                                    </div><!--end tab-pane-->
                                    <div class="tab-pane" id="BTC_ex" role="tabpanel" data-simplebar=""
                                        style="height: 210px;">
                                        <ul class="list-unsyled m-0 ps-0 mt-1">
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/btc.png" alt=""
                                                        class="me-1" height="20">BTC-BTC</a>
                                                <span class="text-muted">0.000041</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/eth.png" alt=""
                                                        class="me-1" height="20">ETH-BTC</a>
                                                <span class="text-muted">0.0000411</span>
                                                <span class="text-success">0.28%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dash.png" alt=""
                                                        class="me-1" height="20">BCH-BTC</a>
                                                <span class="text-muted">0.0000652</span>
                                                <span class="text-success">0.12%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/mon.png" alt=""
                                                        class="me-1" height="20">BSV-BTC</a>
                                                <span class="text-muted">0.0000120</span>
                                                <span class="text-danger">-0.22%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/lite.png" alt=""
                                                        class="me-1" height="20">LTC-BTC</a>
                                                <span class="text-muted">0.00001141</span>
                                                <span class="text-danger">-0.09%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/qub.png" alt=""
                                                        class="me-1" height="20">BNB-BTC</a>
                                                <span class="text-muted">0.000096</span>
                                                <span class="text-success">0.27%</span>
                                            </li>
                                            <li class="align-items-center d-flex justify-content-between py-1">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dollar.png"
                                                        alt="" class="me-1" height="20">ADA-BTC</a>
                                                <span class="text-muted">0.0000321</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                        </ul>
                                    </div><!--end tab-pane-->
                                    <div class="tab-pane" id="ETH_ex" role="tabpanel" data-simplebar=""
                                        style="height: 210px;">
                                        <ul class="list-unsyled m-0 ps-0 mt-1">
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/btc.png" alt=""
                                                        class="me-1" height="20">BTC-ETH</a>
                                                <span class="text-muted">0.000096</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/eth.png" alt=""
                                                        class="me-1" height="20">ETH-ETH</a>
                                                <span class="text-muted">0.000016</span>
                                                <span class="text-success">0.28%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dash.png" alt=""
                                                        class="me-1" height="20">BCH-ETH</a>
                                                <span class="text-muted">0.000044</span>
                                                <span class="text-success">0.12%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/mon.png" alt=""
                                                        class="me-1" height="20">BSV-ETH</a>
                                                <span class="text-muted">0.0003254</span>
                                                <span class="text-danger">-0.22%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/lite.png" alt=""
                                                        class="me-1" height="20">LTC-ETH</a>
                                                <span class="text-muted">0.00009621</span>
                                                <span class="text-danger">-0.09%</span>
                                            </li>
                                            <li
                                                class="align-items-center d-flex justify-content-between py-1 border-bottom">
                                                <a href="#" class="my-1"><img src="assets/images/logos/qub.png" alt=""
                                                        class="me-1" height="20">BNB-ETH</a>
                                                <span class="text-muted">0.00009965</span>
                                                <span class="text-success">0.27%</span>
                                            </li>
                                            <li class="align-items-center d-flex justify-content-between py-1">
                                                <a href="#" class="my-1"><img src="assets/images/logos/dollar.png"
                                                        alt="" class="me-1" height="20">ADA-ETH</a>
                                                <span class="text-muted">0.0065496</span>
                                                <span class="text-danger">-0.2%</span>
                                            </li>
                                        </ul>
                                    </div><!--end tab-pane-->
                                </div><!--end tab-content-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!-- end col -->
                </div><!--end row-->
            </div><!-- container -->

            <div>
                <h1>Salas Activas</h1>
            </div>

            <?php
            include 'constant/conexionDB.php';
            $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario';
            $emailUsuario  = isset($_SESSION['email']) ? $_SESSION['email'] : 'usuario@example.com';

            // Consultamos las salas disponibles
            try {
                $query = "SELECT SALID, SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS FROM SALAS";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error al obtener las salas: " . $e->getMessage();
                exit;
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php if (count($salas) > 0): ?>
                        <?php foreach ($salas as $sala): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card team-card">
                                    <div class="card-body">
                                        <!-- Dropdown Menu -->
                                        <div class="float-end">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle" id="dLabel1" data-bs-toggle="dropdown" href="#" role="button"
                                                aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-24 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel1">
                                                    <a class="dropdown-item" href="#">Open Project</a>
                                                    <a class="dropdown-item" href="#">Edit Card</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sala Information -->
                                        <div class="media align-items-center">
                                            <div class="img-group">
                                                <a class="user-avatar me-1" href="#">
                                                    <img src="assets/images/users/user-9.jpg" alt="user" class="rounded-circle thumb-md">
                                                    <span class="avatar-badge online"></span>
                                                </a>
                                            </div>
                                            <div class="media-body ms-2 align-self-center">
                                                <h5  class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($sala['SALNOMBRE']); ?></h5>
                                                <p class="text-muted font-12 mb-0">Team Leader</p>
                                            </div>
                                        </div>

                                            <h3></h3>
                                            <p class="text-gray-700 mb-2"><?php echo htmlspecialchars($sala['SALDESCRIPCION']); ?></p>
                                            <p class="text-gray-600 mb-2"><strong>Turnos:</strong> <?php echo htmlspecialchars($sala['SALNUMEROTURNOS']); ?></p>
                                            <p class="text-gray-600 mb-4"><strong>Usuarios:</strong> <?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?></p>
                                        <hr class="hr-dashed my-3">
                                        <!-- Project Details (Optional, can be adjusted to match the salas context) -->
                                        <a href="sala_espera.php?salaID=<?php echo $sala['SALID']; ?>" >        
                                        <div class="media align-items-center bg-light text-white p-3">
                                              <img src="assets/images/small/project-3.jpg" alt="" class="rounded-circle thumb-sm">
                                                <div class="media-body ms-3 align-self-center">
                                                    <h6 class="m-0 font-15 text-darck">Ingresar a la Sala</h6>
                                                    <div class="d-flex justify-content-between">
                                                        <span>
                                                            <a href="#">
                                                                <i class="mdi mdi-format-list-bulleted text-success"></i>
                                                                <span class="text-muted">50/100</span>
                                                            </a>
                                                        </span>
                                                        <span class="text-muted">55% Complete</span>
                                                    </div>
                                                    <div class="progress mt-0" style="height:3px;">
                                                        <div class="progress-bar bg-pink" role="progressbar" style="width: 55%;"
                                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        </a>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-lg-4-->
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay salas disponibles en este momento.</p>
                    <?php endif; ?>
                </div><!--end row-->
            </div><!--end container-->


                <script>
                    // Toggle del menú desplegable
                    const menuButton = document.getElementById('menuButton');
                    const dropdownMenu = document.getElementById('dropdownMenu');
                    
                    menuButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                    });
                    
                    document.addEventListener('click', () => {
                    dropdownMenu.classList.add('hidden');
                    });
                </script>
        

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->

            <!--Start Footer-->
            <!-- Footer Start -->
            <footer class="footer text-center text-sm-start">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
            </footer>
            <!-- end Footer -->
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->

    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="assets/pages/analytics-index.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
<!--end body-->

<!-- Mirrored from themes.getappui.com/collab/unikit/default/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:16:44 GMT -->

</html>

