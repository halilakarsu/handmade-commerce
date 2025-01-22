<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta name="author" content="halilakarsu.com">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="/backend/images/settings/{{$icon}}" type="image/x-icon">
    <link rel="shortcut icon" href="/backend/images/settings/{{$icon}}" type="image/x-icon">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/themify.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/slick-theme.css">
    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/animate.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/bootstrap.css">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/color2.css" media="screen" id="color">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
</head>
<style>
    .image-container img {
        transition: transform 0.3s ease !important;;
    }

    .image-container img:hover {
        transform: scale(1.2) !important ;
    }
    .image-container:hover {
        transform: none !important ;
        transition: none !important ;
    }

     .border{
         border: 3px solid #670098; /* Sınırın kalınlığı, türü ve rengi */
         background-color:#670098;
     }

</style>
<body class="bg-light">

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="/backend/assets/images/loader.gif" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
<header id="stickyheader">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-8 col-sm-8">
                    <div class="top-header-left">

                        <div class="app-link ml-5">
                            <h6 class="text-white-50">
                                <h6 class="text-white">Tel:{{$phone}}</h6>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-8 col-sm-8">
                    <div class="top-header-left">

                        <div class="app-link ml-5">
                            <h6 class="text-white">
                                800 ₺ ve üzeri kargo ve kapıda nakit ödeme imkanı.
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="top-header-left">

                        <div class="app-link ml-5">
                            <ul>
                                <li><a style="cursor:pointer" onclick="openAccount()" class="text-white"><i class="fa fa-sign-in"></i> Giriş Yap |</a></li>
                                <li><a href="{{route('frontend.register')}}" style="cursor:pointer" class="text-white"><i class="fa fa-user-plus" ></i> Kayıt Ol |</a></li>
                                <li><a style="cursor:pointer" class="text-white"><i class="fa fa-phone-square" ></i> İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="header-left">
                        <div class="sm-nav-block">
                <span class="sm-nav-btn">
                  <i class="fa fa-bars"></i>
                </span>
                            <ul class="nav-slide">
                                <li>
                                    <div class="nav-sm-back">
                                        kapat<i class="fa fa-angle-right ps-2"></i>
                                    </div>
                                </li>
                                @foreach($types as $type)
                                <li><a href="{{route('frontend.products',['slug'=>$type->type_slug])}}">{{$type->type_title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="brand-logo logo-sm-center">
                            <a href="/">
                                <img width="150px" src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="input-block">
                        <div class="input-box">
                            <form action="{{route('frontend.search')}}" method="GET" class="theme-form">
                                @csrf
                                <div class="input-group ">
                                   <div class="input-group-text">
                                    </div>
                                    <input required type="search" name="search_term" class="form-control" placeholder="Bir şey mi aramıştınız ?">
                                    <button type="submit" class="btn btn-solid"><i class="fa fa-search"></i> Ara</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="icon-block">
                            <ul>
                                <li class="mobile-search">
                                    <a href="javascript:void(0)">
                                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;"
                                             xml:space="preserve">
                      <g>
                          <g>
                              <g>
                                  <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                              C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                              l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                              c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                              S377.82,467.8,257.493,467.8z"/>
                              </g>
                          </g>
                      </g>
                      </svg>
                                    </a>
                                </li>
                                <li class="mobile-user "  onclick="openAccount()">
                                    <a href="javascript:void(0)">
                                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                              c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"/>
                            </g>
                        </g>
                                            <g>
                                                <g>
                                                    <path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                               M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"/>
                                                </g>
                                            </g>
                      </svg>
                                    </a>
                                </li>
                                <li class="mobile-setting" onclick="openSetting()">
                                    <a href="javascript:void(0)">
                                        <svg  enable-background="new 0 0 512 512"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><path d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z"/><path d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z"/></svg>
                                    </a>
                                </li>
                                <li class="mobile-wishlist item-count" onclick="openWishlist()">
                                    <a href="javascript:void(0)">
                                        <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"/></svg>
                                         <div class="basket-item-countw" >

                                         </div>

                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('cart')}}">
                                        <div class="cart-block">
                                            <div class="cart-icon">
                                                <svg  enable-background="new 0 0 512 512"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"/></g></svg>
                                            </div>
                                            <div class="cart-item">
                                                <h5>ALIŞVERİŞ</h5>
                                                <h5>SEPETİNİZ</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="basket-item-count">
                                        <div class="item-count-contain">
                                            0
                                        </div>
                                           </div>
                                </li>
                            </ul>
                        </div>
                        <div class="menu-nav">
                <span class="toggle-nav">
                  <i class="fa fa-bars "></i>
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input">
            <div class="input-group">
        <span class="input-group-text">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve"><g><path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z"/></g></svg>
        </span>
                <input type="text" class="form-control" placeholder="search your product">
                <span class="input-group-text close-searchbar">
          <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>
        </span>
            </div>
        </div>
    </div>
    <div class="category-header-2">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-menu">
                        <div class="logo-block">
                            <div class="brand-logo logo-sm-center">
                                <a href="index.html">
                                    <img src="/backend/images/settings/{{$logo}}" class="img-fluid  " alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="nav-block">

                            <div class="nav-left" >

                                <nav class="navbar" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                                    <button class="navbar-toggler" type="button">
                                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                    <h5 class="mb-0  text-white title-font">ÜRÜN ÇEŞİTLERİMİZ</h5>
                                </nav>
                                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        @foreach($banners as $banner)
                                        <li> <a href="/urunler/{{$banner->banner_slug}}"><img height="30px" width="30px" src="/backend/images/banners/{{$banner->banner_file}}" alt="category-product">{{$banner->banner_title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="menu-block">
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Geri<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                    </li>
                                    <!--HOME-->

                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">TUHAFİYE</p></a>
                                        <ul>
                                            <li><a  href="/urunler/igne-cesitleri">İğne Çeşitleri</a></li>
                                            <li><a  href="/urunler/makaslar">Makas Çeşitleri</a></li>
                                            <li><a  href="/urunler/dantel-ve-kurdela">Dantel-Kurdele</a></li>
                                            <li><a  href="/urunler/yapistirici-malzemeleri">Yapıştırıcılar</a></li>
                                            <li><a  href="/urunler/dikis-malzemeleri">Dikiş Malzemeleri</a></li>
                                            <li><a  href="/urunler/tufahiye">Diğer Malzemeler</a></li>
                                            <li><a  href="/kategori/tuhafiye">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <!--mega-meu start-->
                                    <li class="mega" >
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">AMİGURUMİ </p></a>
                                        <ul class="mega-menu full-mega-menu ratio_landscape">
                                               <li>
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/ahsap-dislikler">
                                                                <div class="menu-title">

                                                                    <small class="text-light text-capitalize"><b>Ahşap Dişlikler</b></small> </div> </a>

                                                            </div>

                                                            <div  class="link-section p-1 border ">
                                                                <a href="/urunler/ahsap-dislikler">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Halka Diş Kaşıyıcılar</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/ahsap-dislikler">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Diş Kaşıyıcı Setleri</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/ahsap-dislikler">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Figürlü Diş Kaşıyıcılar</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <div class="menu-title">
                                                                   <a href="/urunler/amigurumi">
                                                                    <small class="text-light text-capitalize"><b>Amigurumi Standları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Amigurumi Kirpikler</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Eklem Aparatları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Hayvan Sesleri</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/harf-boncuklari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Harf Bonucklar</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/ahsap-boncuklar">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Ahşap Boncuklar</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/sonil">
                                                                      <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Şönil</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/goz-ve-burun">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Oyuncak Gözler</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/goz-ve-burun">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Oyuncak Burunlar</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/emzik-zinciri-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Emzik Malzemeleri</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çıngırak Zilleri</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Kilitli Poşetler</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/emzik-zinciri-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Mantar Klipsler</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/dugme-cesitleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Renkli Düğmeler</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/boncuk-cesitleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Nazar Boncukları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/emzik-zinciri-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Paraşüt İpler</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Vik Vik Çeşitleri</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Müzik Kutuları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Pileksi Etiketler</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a href="/urunler/amigurumi">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Metal Çıt Çıtlar</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--mega-meu end-->
                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">İP ÇEŞİTLERİ</p></a>
                                        <ul>
                                            <li><a  href="/urunler/cotton-gold-iplikler">Alize Cotton Gold</a></li>
                                            <li><a  href="/urunler/patiklik-iplik">Patiklik İp</a></li>
                                            <li><a  href="/urunler/patiklik-iplik">Kristal Lif İpleri</a></li>
                                            <li><a  href="/urunler/patiklik-iplik">Kadife İpler</a></li>
                                            <li><a  href="/urunler/rafya-ipleri">Rafya İpleri</a></li>
                                            <li><a  href="/urunler/patiklik-iplik">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">DÜĞME VE BONCUKLAR</p></a>
                                        <ul>
                                            <li><a  href="/urunler/dugme-cesitleri">Düğme Çeşitleri</a></li>
                                            <li><a  href="/urunler/boncuk-cesitleri">Boncuk Çeşitleri</a></li>
                                            <li><a  href="/kategori/dugme-ve-boncuk-cesitleri">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">KASNAK VE MAKROME</p></a>
                                        <ul>
                                            <li><a  href="/urunler/kasnak-cesitleri">Kasnak Çeşitleri</a></li>
                                            <li><a  href="/urunler/makrome-cesitleri">Makrome Çeşitleri</a></li>
                                            <li><a  href="/kategori/kasnak-ve-makrome">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">ŞİŞLER VE TIĞLAR</p></a>
                                        <ul>
                                            <li><a  href="/urunler/sisler-tiglar">Örgü Şişleri</a></li>
                                            <li><a  href="/urunler/sisler-tiglar">Tığ Çeşitleri</a></li>
                                            <li><a  href="/kategori/sisler-ve-tiglar">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <!--mega-meu start-->
                                    <li class="mega" >
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">ÇANTA MALZEMELERİ </p></a>
                                        <ul class="mega-menu full-mega-menu ratio_landscape">
                                            <li>
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-askilari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Askıları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border ">
                                                                <a  href="/urunler/canta-askilari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Setleri</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-zincileri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Zincirleri</b></small> </div></a>

                                                            </div>

                                                        </div>
                                                        <div class="col mega-box">

                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-saplari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Sapları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-tabanlari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Tabanları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-askilari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Kanvaları</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-tabanlari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Deri Tabanlar</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Yayları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Halkaları</b></small> </div></a>

                                                            </div>

                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Parça Deriler </b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Bursları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-saplari">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Sapları</b></small> </div></a>

                                                            </div>

                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Mantar Klipsler</b></small> </div></a>

                                                            </div>

                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Kaplamaları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Kilitleri</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Fermuarları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Telefon Çantaları</b></small> </div></a>

                                                            </div>
                                                            <div  class="link-section p-1 border">
                                                                <a  href="/urunler/canta-malzemeleri">
                                                                   <div class="menu-title">
                                                                    <small class="text-light text-capitalize"><b>Çanta Kancaları</b></small> </div></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--mega-meu end-->
                                    <li>
                                        <a  class="dark-menu-item" href="javascript:void(0)"><p style="font-size:13px">METAL VE DERİ</p></a>
                                        <ul>
                                            <li>    <a  href="/urunler/anahtarlik-cesitleri">Anahtarlık ve Kanca</a></li>
                                            <li><a  href="/urunler/toka-cesitleri">Takı ve Toka Çeşitleri</a></li>
                                            <li><a  href="/urunler/kece-tabanlar">Keçe Tabanları</a></li>
                                            <li><a  href="/kategori/metal-ve-deri">Tümü</a></li>
                                        </ul>
                                    </li>
                                    <!--mega-meu end-->
                                </ul>
                            </nav>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input">
            <div class="input-group">
        <span class="input-group-text">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932" style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve"><g><path d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z"/></g></svg>
        </span>
                <input type="text" class="form-control" placeholder="search your product">
                <span class="input-group-text close-searchbar">
          <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>
        </span>
            </div>
        </div>
    </div>
</header>
<!--header end-->
@yield('content')

<!-- footer start -->
<footer>
    <div class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main">
                        <div class="footer-box">
                            <div class="footer-title mobile-title">
                                <h5>Hakkımızda</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <p>Her ürünümüz, kaliteli malzemelerden üretilmiş ve titizlikle seçilmiştir. Popyohobi.com, müşteri memnuniyetini her zaman ön planda tutarak, kaliteli ürünleri uygun fiyatlarla sizlere sunar.</p>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5 style="text-transform:none">Hızlı Erişim</h5>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{ route('frontend.page', ['slug' => 'hakkimizda']) }}">Hakkımızda</a></li>
                                    <li><a href="{{ route('frontend.contact')}}">İletişim</a></li>
                                    <li><a href="{{ route('frontend.page', ['slug' => 'gizlilik-politikasi']) }}">Gizlilik Politikası</a></li>
                                    <li><a href="{{ route('frontend.page', ['slug' => 'mesafeli-satis-sozlesmesi']) }}">Satış Sözleşmesi</a></li>
                                    <li><a href="{{ route('frontend.page', ['slug' => 'kvkk-aydinlatma-metni']) }}">KVKK Aydınlatma Metni</a></li>
                                    <li><a href="{{ route('frontend.page', ['slug' => 'teslimat-ve-iade-kosullari']) }}">Teslimat ve İade</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5 style="text-transform:none">Bize Ulaşın</h5>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>{!!$adres!!}</li>
                                    <li><i class="fa fa-phone"></i> <span>{{$phone}}</span></li>
                                    <li><i class="fa fa-envelope-o"></i>{{$mail}}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer-box">
                            <div class="footer-title">
                                <h5 style="text-transform:none">Bülten Aboneliği</h5>
                                <small>Kampanyalarımızdan haberdar olmak için e-bültenimize kayıt olun.</small>
                            </div>
                            <div class="footer-contant">
                                <div class="newsletter-second">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Adınız Soyadınız" >
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Email" >
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button href="javascript:void(0)" class="btn btn-solid btn-sm">Abone Ol</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter dark-footer ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="footer-left">
                        <p style="text-transform:none">Tüm hakları saklıdır.www.popyohobi.com</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 col-sm-12">
                    <div class="footer-right">
                        <div class="col-xl-6 col-md-4 col-sm-12">
                            <div class="footer-right">
                                <ul class="sosiyal">
                                    <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/popyo_hobi_malzeme/"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!--Newsletter modal popup start
<div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="news-latter">
          <div class="modal-bg">
            <div class="newslatter-main">
              <div class="offer-content">
              <div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2>newsletter</h2>
                <p>Subscribe to our website mailling list <br> and get a Offer, Just for you!</p>
                <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                  <div class="form-group mx-sm-3">
                    <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                    <button type="submit" class="btn btn-theme btn-normal btn-sm " id="mc-submit">subscribe</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="imd-wrraper">
                <img src="/backend/assets/images/subscribe/1.jpg" alt="newsletterimg" class="img-fluid bg-img">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
Newsletter Modal popup end-->



<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart top ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div id="cart_details" class="cart_media">
            <ul id="product_list" class="cart_product">
                <!--  <li>
                    <div class="media">
                      <a href="product-page(left-sidebar).html">
                        <img alt="megastore1" class="me-3" src="/backend/assets/images/layout-2/product/1.jpg">
                      </a>
                      <div class="media-body">
                        <a href="product-page(left-sidebar).html">
                          <h4>redmi not 3</h4>
                        </a>
                        <h6> $80.00 <span>$120.00</span>  </h6>
                        <div class="addit-box">
                          <div class="qty-box">
                            <div class="input-group">
                              <button class="qty-minus"></button>
                              <input class="qty-adj form-control" type="number" value="1"/>
                              <button class="qty-plus"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>!-->

            </ul>
            <ul class="cart_total">
                <li>subtotal : <span>$1050.00</span> </li>
                <li>shpping <span>free</span> </li>
                <li>taxes <span>$0.00</span></li>
                <li> <div class="total">total<span>$1050.00</span> </div></li>
                <li> <div class="buttons">
                        <a href="cart.html" class="btn btn-solid btn-sm">Sepet</a>
                        <a href="checkout.html" class="btn btn-solid btn-sm ">Devam Et</a>
                    </div> </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add to cart bar end-->


<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>Hesabım</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form action="{{route('frontend.login')}}" class="theme-form" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input name="customer_email" type="text" class="form-control" id="email" placeholder="Email Adresiniz" required="">
            </div>
            <div class="form-group">
                <label for="review">Şifre</label>
                <input name="customer_password" type="password" class="form-control" id="review" placeholder="Şifreniz" required="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-solid btn-md btn-block ">Giriş Yap</button>
            </div>
            <div class="accout-fwd">
                <a href="forget-pwd.html" class="d-block"><h5>Şifrenizi unuttunuz mu?</h5></a>
                <h6 class="mt-5" >Kayıtlı değilseniz sisteme giriş yapabilmek için öncelikle kayıt olmanız gerekmektedir.?
                </h6>
                <br>
                <div class="form-group">
                    <a href="{{route('frontend.register')}}" class="btn btn-success btn-md btn-block ">Kayıt Ol</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Add to account bar end-->


<!-- cookie bar start
<div class="cookie-bar">
    <p>We use cookies to improve our site and your shopping experience. By continuing to browse our site you accept our cookie policy.</p>
    <a href="javascript:void(0)" class="btn btn-solid btn-xs">Onayla</a>
    <a href="javascript:void(0)" class="btn btn-solid btn-xs">İptal</a>
</div>
 cookie bar end -->

<!-- notification product
<div class="product-notification" id="dismiss">
  <span  onclick="dismiss();" class="btn-close" aria-hidden="true"></span>
  <div class="media">
    <img class="me-2" src="/backend/assets/images/layout-1/product/5.jpg" alt="Generic placeholder image">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Latest trending</h5>
Cras sit amet nibh libero, in gravida nulla.
    </div>
  </div>
</div>
notification product -->


<!-- latest jquery-->

<!-- slick js-->
<script src="/backend/assets/js/slick.js"></script>

<!-- popper js-->
<script src="/backend/assets/js/popper.min.js" ></script>
<script src="/backend/assets/js/bootstrap-notify.min.js"></script>

<!-- menu js-->
<script src="/backend/assets/js/menu.js"></script>

<!-- timer js -->
<script src="/backend/assets/js/timer2.js"></script>

<!-- Bootstrap js-->
<script src="/backend/assets/js/bootstrap.js"></script>

<!-- tool tip js -->
<script src="/backend/assets/js/tippy-popper.min.js"></script>
<script src="/backend/assets/js/tippy-bundle.iife.min.js"></script>

<!-- father icon -->
<script src="/backend/assets/js/feather.min.js"></script>
<script src="/backend/assets/js/feather-icon.js"></script>

<!-- Theme js-->
<script src="/backend/assets/js/modal.js"></script>
<script src="/backend/assets/js/script.js"></script>
@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.error('{{session('error')}}')</script>
@endif

@foreach($errors->all() as $error)
    <script>
        alertify.error('{{$error}}');
    </script>
@endforeach
<script>
    $(document).ready(function () {
        cartload();
    });
      function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<div class="item-count-contain">'+ value['totalcart'] +'</div>'));
            }
        });
    }


</script>

</body>

</html>
