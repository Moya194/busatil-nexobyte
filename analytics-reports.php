
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.getappui.com/collab/unikit/default/analytics-reports.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:16:45 GMT -->

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
                <h5 class="font-14 m-0 fw-bold">Mr. Michael Hill </h5>
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
    <!-- end leftbar-tab-menu-->

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
                                    <li class="breadcrumb-item"><a href="#">Analytics</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active">Reports</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Reports</h4>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
            
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/small/news-1.jpg" alt="" class="img-fluid"/>
                                <ul class="p-0 mt-4 list-inline">
                                    <li class="list-inline-item"><span class="badge bg-soft-primary px-3">Crypto</span></li>
                                    <li class="list-inline-item">26 March 2021</li>
                                    <li class="list-inline-item">by <a href="#">admin</a></li>
                                </ul>        
                                <a href="#" class="h4 mt-2">It is a long established fact that a reader will be</a>
                                <p class="text-muted mt-2">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Cum sociis natoque penatibus et magnis.</p>
                                <a href="#" class="text-primary">Continue Reading <i class="fas fa-long-arrow-alt-right"></i></a>                                 
                            </div><!--end card-body-->
                        </div><!--end card--> 

                    </div> <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/small/news-1.jpg" alt="" class="img-fluid"/>
                                <ul class="p-0 mt-4 list-inline">
                                    <li class="list-inline-item"><span class="badge bg-soft-primary px-3">Crypto</span></li>
                                    <li class="list-inline-item">26 March 2021</li>
                                    <li class="list-inline-item">by <a href="#">admin</a></li>
                                </ul>        
                                <a href="#" class="h4 mt-2">It is a long established fact that a reader will be</a>
                                <p class="text-muted mt-2">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Cum sociis natoque penatibus et magnis.</p>
                                <a href="#" class="text-primary">Continue Reading <i class="fas fa-long-arrow-alt-right"></i></a>                                 
                            </div><!--end card-body-->
                        </div><!--end card--> 
                    </div> <!--end col-->
                </div><!--end row-->

                <!-- Barra Con Movimiento-->
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="text-slider">
                                    <ul class="list-inline move-text mb-0">
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/btc.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 8435.21</span>
                                            <span class="mb-0 font-12 text-success">+7.88%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dash.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 1233.54</span>
                                            <span class="mb-0 font-12 text-success">+5.12%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dollar.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">BTC: 8435.21</span>
                                            <span class="mb-0 font-12 text-danger">-2.62%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/btc.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 226.64</span>
                                            <span class="mb-0 font-12 text-success">+1.91%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/lite.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 12.91</span>
                                            <span class="mb-0 font-12 text-danger">-1.55%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/eth.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 0.50</span>
                                            <span class="mb-0 font-12 text-danger">-0.45%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/btc.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 8435.21</span>
                                            <span class="mb-0 font-12 text-success">+7.88%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dash.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 1233.54</span>
                                            <span class="mb-0 font-12 text-success">+5.12%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dollar.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">BTC: 8435.21</span>
                                            <span class="mb-0 font-12 text-danger">-2.62%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/btc.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 226.64</span>
                                            <span class="mb-0 font-12 text-success">+1.91%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dash.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 1233.54</span>
                                            <span class="mb-0 font-12 text-success">+5.12%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/dollar.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">BTC: 8435.21</span>
                                            <span class="mb-0 font-12 text-danger">-2.62%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/btc.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 226.64</span>
                                            <span class="mb-0 font-12 text-success">+1.91%</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="assets/images/logos/lite.png" alt="" class="thumb-xs rounded">
                                            <span class="fw-semibold font-14">USD: 12.91</span>
                                            <span class="mb-0 font-12 text-danger">-1.55%</span>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Social Report</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Network</th>
                                                <th>Sessions</th>
                                                <th>Con.Rate</th>
                                                <th>Avg.Time</th>
                                                <th>Bounce Rate</th>
                                                <th>%Change</th>
                                            </tr><!--end tr-->
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><i class="mdi mdi-google text-danger me-1 font-22"></i>Google</td>
                                                <td>4541</td>
                                                <td>3.2%</td>
                                                <td>3:20</td>
                                                <td>57.8%</td>
                                                <td>17.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-yahoo text-blue me-1 font-22"></i>Yahoo</td>
                                                <td>1522</td>
                                                <td>4.2%</td>
                                                <td>4:20</td>
                                                <td>62.8%</td>
                                                <td>-12.8% <i
                                                        class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-web text-pink me-1 font-22"></i>UC Browser</td>
                                                <td>1292</td>
                                                <td>3.2%</td>
                                                <td>5:20</td>
                                                <td>33.8%</td>
                                                <td>17.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-facebook text-primary me-1 font-22"></i>Facebook
                                                </td>
                                                <td>2241</td>
                                                <td>4.9%</td>
                                                <td>2:20</td>
                                                <td>48.8%</td>
                                                <td>17.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-twitter text-info me-1 font-22"></i>Twitter</td>
                                                <td>6806</td>
                                                <td>3.2%</td>
                                                <td>3:20</td>
                                                <td>57.8%</td>
                                                <td>-11.8% <i
                                                        class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-linkedin text-info me-1 font-22"></i>LinkedIn</td>
                                                <td>4541</td>
                                                <td>3.2%</td>
                                                <td>3:20</td>
                                                <td>52.8%</td>
                                                <td>17.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-pinterest text-pink me-1 font-22"></i>Pinterest
                                                </td>
                                                <td>3542</td>
                                                <td>8.2%</td>
                                                <td>6:20</td>
                                                <td>61.8%</td>
                                                <td>23.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-google-plus text-danger me-1 font-22"></i>Google+
                                                </td>
                                                <td>1124</td>
                                                <td>9.2%</td>
                                                <td>4:10</td>
                                                <td>20.8%</td>
                                                <td>-9.8% <i
                                                        class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-instagram text-success me-1 font-22"></i>Instagram
                                                </td>
                                                <td>3521</td>
                                                <td>1.2%</td>
                                                <td>6:45</td>
                                                <td>66.2%</td>
                                                <td>34.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-whatsapp text-success me-1 font-22"></i>WhatsApp
                                                </td>
                                                <td>96547</td>
                                                <td>9.2%</td>
                                                <td>1:20</td>
                                                <td>57.8%</td>
                                                <td>48.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td><i class="mdi mdi-google-play text-warning me-1 font-22"></i>Other
                                                </td>
                                                <td>3214</td>
                                                <td>6.2%</td>
                                                <td>4:40</td>
                                                <td>36.8%</td>
                                                <td>11.8% <i
                                                        class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                                </td>
                                            </tr><!--end tr-->

                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div> <!--end col-->
                </div><!--end row-->

            </div><!-- container -->

            

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
    <script src="assets/pages/analytics-report.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>
<!--end body-->

<!-- Mirrored from themes.getappui.com/collab/unikit/default/analytics-reports.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:16:46 GMT -->

</html>

