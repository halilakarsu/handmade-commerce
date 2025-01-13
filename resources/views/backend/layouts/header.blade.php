<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="halilakarsu">
    <!-- JavaScript -->
    <script src="/backend/assets/js/jquery.min.js"></script>
    <!-- sidebar -->
    <script src="/backend/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <link rel="icon" href="/backend/assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/backend/assets/images/favicon/favicon.png" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/font-awesome.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/custom/custom.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/icofont.css">
    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/prism.css">
    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/chartist.css">
    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/vector-map.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/custom/custom.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/jsgrid.css">
</head>
<body>
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-left">
            <div style="margin-left:-23px;margin-bottom:-15px"  class="logo-wrapper"><a  href="index.html"><img class="blur-up lazyloaded" src="/backend/assets/images/layout-2/logo/logo.jpg" alt=""></a></div>
        </div>
        <div class="main-header-right ">
            <div class="mobile-sidebar">
                <div class="media-body text-end switch-sm">
                    <label class="switch">
                        <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
                    </label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Ne aramıştınız.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                            </div>
                        </form>
                    </li>
                    <li class="onhover-dropdown"><a class="txt-dark" href="javascript:void(0)">
                            <h6>TR <i class="flag-icon flag-icon-tr"></i> </h6></a>
                        <ul class="language-dropdown onhover-show-div p-20">
                            <li><a href="javascript:void(0)" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                            <li><a href="javascript:void(0)" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                            <li><a href="javascript:void(0)" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                        </ul>
                    </li>
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                    <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                        <ul class="notification-dropdown custom-scrollbar onhover-show-div p-0">
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-success me-3"><i data-feather="thumbs-up"></i></div>
                                    <div class="media-body">
                                        <h6 class="font-success">Someone Likes Your Posts</h6>
                                        <p class="mb-0"> 2 Hours Ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-info me-3"><i data-feather="message-circle"></i></div>
                                    <div class="media-body">
                                        <h6 class="font-info">3 New Comments</h6>
                                        <p class="mb-0"> 1 Hours Ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-secondary me-3"><i data-feather="download"></i></div>
                                    <div class="media-body">
                                        <h6 class="font-secondary">Download Complete</h6>
                                        <p class="mb-0"> 3 Days Ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-success bg-warning me-3">
                                        <i data-feather="gift"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="font-secondary">New Order Recieved</h6>
                                        <p class="mb-0"> 4 Days Ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-success me-3">
                                        <i data-feather="airplay"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="font-secondary">Apps are ready for update</h6>
                                        <p class="mb-0"> 3 Minutes Ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-icons bg-info me-3">
                                        <i data-feather="alert-circle"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="font-secondary">Server Warning</h6>
                                        <p class="mb-0"> Just Now</p>
                                    </div>
                                </div>
                            </li>
                            <li class="bg-light txt-dark"><a href="javascript:void(0)" data-original-title="" title="">All </a> notification</li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center">

                            @if(Auth::user() && Auth::user()->user_file)
                                <img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded"
                                     src="/backend/images/users/{{ Auth::user()->user_file }}" alt="header-user">
                            @else
                                <img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded"
                                     src="/path/to/default/image.jpg" alt="default-user-image">
                            @endif

                            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                            <li><a href="javascript:void(0)">Profil<span class="pull-right"><i data-feather="user"></i></span></a></li>
                            <li><a href="javascript:void(0)">Mesajlar<span class="pull-right"><i data-feather="mail"></i></span></a></li>
                            <li><a href="javascript:void(0)">Görevler<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
                            <li><a href="javascript:void(0)">Ayarlar<span class="pull-right"><i data-feather="settings"></i></span></a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->
