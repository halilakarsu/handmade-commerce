<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/themify.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/backend/assets/custom/custom.css">
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
    <!-- jQuery -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


<style type="text/css">
    .bg-pink {
        background-color: #cf3180;
        text-align: center;
    }
.text-pink {
        background-color: #cf3180;
        text-align: center;
    }
    .text-lila {
        color: #670098;
        text-align: center;
    }

.bg-lila {
        background-color: #670098;
        text-align: center;
    }
  .master {
   margin-top:-35px !important;
   margin-right:-5px !important;
    
 }

   .menu {
   margin-top:70px !important;
   margin-right:-5px !important;
    
 }
 
  /* Mobilde daha küçük bir genişlik */
  @media (max-width: 600px) {
    .ara-input {
      max-width:65%;

    }
  }

  .poppins-regular {
  font-family: "Poppins", serif;
  font-weight: 400;
  font-style: normal;
}

.poppins-medium {
  font-family: "Poppins", serif;
  font-weight: 400;
  font-style: normal;
}

.poppins-bold {
  font-family: "Poppins", serif;
  font-weight: 700;
 font-style: normal; 
}
.poppins-semibold {
  font-family: "Poppins", serif;
  font-weight: 500;
 font-style: normal; 
 font-size:15px;
}

  body,html {
    overflow-x: hidden;
}
</style>
</head>

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
      <div class="top-header">
        <div class="custom-container">
            <div class="row">

                <div class="col-xl-8 col-md-8 col-sm-9">
                    <div class="top-header-left">

                        <div class="app-link ml-5">
                            <h4 class="text-white">
                                <b>900₺</b> üzerinde alışveriş yaptığınızda kargo Bedava !
                                
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 d-none d-sm-block">
                    <div class="top-header-left">

                        <div class="app-link">
                            <ul>
                                @if(!Auth::guard('registers')->check())
                                <li><a style="cursor:pointer" onclick="openAccount()" class="text-white"><i class="fa fa-sign-in"></i> Giriş Yap |</a></li>
                               <li><a   href="{{route('frontend.register')}}"style="cursor:pointer" class="text-white"><i class="fa fa-user-plus" ></i> Kayıt Ol |</a></li>
                              @else
                              <a href="{{route('frontend.account')}}"style="cursor:pointer" class="text-white"><i class="fa fa-user" ></i> Hesabım |</a></li>
                           

                               @endif   <li><a   href="{{route('frontend.contact')}}"style="cursor:pointer" class="text-white"><i class="fa fa-info-circle" ></i> Hakkımızda |</a></li>
                                <li><a   href="{{route('frontend.contact')}}"style="cursor:pointer" class="text-white"><i class="fa fa-phone-square" ></i> İletişim</a></li>
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
                        <div class="logo-sm-center mt-2 mb-2">
                            <div class="input-box d-block d-sm-none">
                            <form action="{{route('frontend.search')}}" method="GET" class="theme-form">
                                @csrf
                                <div class="input-group master">
                                      <a href="/">
                                <img style="margin-right:5px"  width="70px" src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                            </a>                                  
                                    <input required type="text" id="product_title" name="search_term"  autocomplete="off" class="form-control ara-input" placeholder="Aradığınız ürünü yazınız">
                                    <div   id="productList bg-lila"></div>
                                    <button type="submit" class="btn btn-solid bg-lila"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>     <a class="d-none d-sm-block" href="/">
                                <img  style="margin-left:-80px" width="180px" src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                            </a> 
                       <div style="margin-left:265px"  class="input-block">
                              <div class="input-box">
                            <form action="{{route('frontend.search')}}" method="GET" class="theme-form">
                                @csrf
                                <div class="input-group">
                                 <input required type="text" id="product_title text-center" name="search_term"  autocomplete="off" class="form-control" placeholder="Aradığınız ürünü yazınız">
                                    <div id="productList bg-lila"></div>
                                    <button type="submit" class="btn btn-solid"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>            
                        <div class="header-right">
                        <div class="icon-block">
                            <ul>                                
                                <li class="mobile-cart item-count d-none d-md-block">
                                    <a href="{{route('cart')}}">
                                        <div class="cart-block">
                                            <div class="cart-icon">
                                                <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"></path></g></svg>
                                            </div> 
                                            <div class="cart-item">
                                                <h5>ALIŞVERİŞ</h5>
                                                <h5>SEPETİNİZ</h5>
                                            </div>
                                        </div>
                                    </a>
                                 <div class="basket-item-count item-count-contain">
                                        0
                                    </div> 

                                </li>

                            </ul>
                        </div>
                       </div>
                        <div  class="menu-nav menu">

                       
                <span >
                   <hr>
                  <a style="font-size:20px;" href="{{route('cart')}}"><span style="color:#670098;margin-right:45px;" class="fa fa-shopping-cart text-lila"> <b  
                    class="basket-item-count-mobile item-count-contain"></b></i></a>
                    @if(!Auth::guard('registers')->check())
                    <a style="font-size:20px;"  onclick="openAccount()"  href="javascript:void(0)">
                      @else
                    <a style="font-size:20px;"    href="/hesabim">
                     @endif
                        <span style="color:#670098;margin-right:35px;" class="fa fa-user text-lila"><b  
                > Hesabım </b></i></a>
                  <i style="color: #670098" class="fa fa-bars text-lila toggle-nav"><b style="font-size:20px;margin-right:40px"  class="text-lila"> Menü</b></i>

                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div style="background-color:#670098;" class="category-header-2"  >
        <div class="custom-container"  >
            <div class="row">
                <div class="col-12">
                    <div class="navbar-menu">
                        <div  class="logo-block">
                            <div class="brand-logo logo-sm-center">
                                <a href="/">
                                    <img  src="/backend/images/settings/{{$logo}}" class="img-fluid  " alt="logo">
                                </a>
                            </div>
                        </div>
                         <div class="nav-block " style="margin-top:-80px;margin-left:360px">
                            <div  class="nav-left" >
                                <nav  style="height:20px!important" class="navbar btn-solid" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                                    <button style="margin-top:-10px" class="navbar-toggler mb-3" type="button">
                                        <span class="navbar-icon mt-"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                    <h5 style="margin-top:-9px" class="mb-0  text-white title-font mb-3">ÜRÜN ÇEŞİTLERİMİZ</h5>
                                </nav>
                                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        @foreach($banners as $banner)
                                        <li> <a  href="/urunler/{{$banner->banner_slug}}"><img height="30px" width="30px" src="/backend/images/banners/{{$banner->banner_file}}" alt="category-product">{{$banner->banner_title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="menu-block text-center">
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li class="text-lila">
                                        <div class="mobile-back text-right ">GERİ<i class="fa fa-angle-right ps-2 text-lila" aria-hidden="true"></i></div>
                                    </li>
                                    <!--HOME-->
                                    @foreach($categories->sortBy('categori_must') as $category)
                                    <!--mega-meu end-->
                                     @if($category->types->count() == 1)
                                    <li class="d-block d-md-none">
                                        <a  class="dark-menu-item " href="/urunler/{{$category->types->first()->type_slug}}">
                                            <h1 class="poppins-bold" style="font-size:15px"><b>{{$category->categori_title}}</b></h1></a>                   
                                    </li>
                                      @else
                                       <li class="d-block d-md-none">
                                        <a  class="dark-menu-item " href="javascript:void(0)"><h1 class="poppins-bold" style="font-size:15px"><b>{{$category->categori_title}}</b></h1></a>                                      
                                        <ul>

                                           @foreach($category->types->sortBy('type_must') as $type)

                                            <li ><a class="text-light" href="/urunler/{{$type->type_slug}}">
                                                <h3 class="poppins-semibold"><i class="fa fa-arrow-right"></i>{{$type->type_title}}</h3></a>
                                                                                           </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                   @endif
                                 @endforeach
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

<div class='nav-whatsapp'>
  <div class='wrapperWA '>
    <div class="wrapperWA-header">
      <h2>Canlı Destek Hattı</h2>
      <div class='closeWA'>
        <svg class='h-6 w-6' fill='none' stroke='#f40076' viewbox='0 0 24 24'><path d='M6 18L18 6M6 6l12 12' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'></path></svg>
      </div>
    </div>
    <form action="{{route('whatsapp.send')}}" method="GET" id="whatsappForm">
        @csrf
    <div class='form-container' id='waform-IT'>
      <div class='formC'>
        <div class='Fcontrol'>
          <input class='cName' id='cName' name='name' required='required' type='text'>
          <span class='nameC'>Adınız Soyadınız</span>
          <span class='valid' id='error_name'></span>
        </div>
        
      </div>
      <div class='formC'>
        
        <div class='Fcontrol'>
          <textarea class='cMessage' id='cMessage' name='message' required='required'></textarea>
          <span class='messageC'>Mesajınız</span>
          <span class='valid' id='error_message'></span>
        </div>
      </div>
      <div class='formB'>
        <button type="submit" class='whatsapp-send' onclick='sendToWhatsApp()'><svg viewbox='0 0 32 32'>
        <path d='M16 2a13 13 0 0 0-8 23.23V29a1 1 0 0 0 .51.87A1 1 0 0 0 9 30a1 1 0 0 0 .51-.14l3.65-2.19A12.64 12.64 0 0 0 16 28a13 13 0 0 0 0-26Zm0 24a11.13 11.13 0 0 1-2.76-.36 1 1 0 0 0-.76.11L10 27.23v-2.5a1 1 0 0 0-.42-.81A11 11 0 1 1 16 26Z'></path><path d='M19.86 15.18a1.9 1.9 0 0 0-2.64 0l-.09.09-1.4-1.4.09-.09a1.86 1.86 0 0 0 0-2.64l-1.59-1.59a1.9 1.9 0 0 0-2.64 0l-.8.79a3.56 3.56 0 0 0-.5 3.76 10.64 10.64 0 0 0 2.62 4 8.7 8.7 0 0 0 5.65 2.9 2.92 2.92 0 0 0 2.1-.79l.79-.8a1.86 1.86 0 0 0 0-2.64Zm-.62 3.61c-.57.58-2.78 0-4.92-2.11a8.88 8.88 0 0 1-2.13-3.21c-.26-.79-.25-1.44 0-1.71l.7-.7 1.4 1.4-.7.7a1 1 0 0 0 0 1.41l2.82 2.82a1 1 0 0 0 1.41 0l.7-.7 1.4 1.4Z'></path></svg>Whatsaptan Gönder </button>
      </div>
    </div>
  </div>
  <div class='whatsapp-float'>
    <div class='whatsapp-icon'>
      <svg viewbox='0 0 512 512'><path d='M414.73 97.1A222.14 222.14 0 0 0 256.94 32C134 32 33.92 131.58 33.87 254a220.61 220.61 0 0 0 29.78 111L32 480l118.25-30.87a223.63 223.63 0 0 0 106.6 27h.09c122.93 0 223-99.59 223.06-222A220.18 220.18 0 0 0 414.73 97.1zM256.94 438.66h-.08a185.75 185.75 0 0 1-94.36-25.72l-6.77-4-70.17 18.32 18.73-68.09-4.41-7A183.46 183.46 0 0 1 71.53 254c0-101.73 83.21-184.5 185.48-184.5a185 185 0 0 1 185.33 184.64c-.04 101.74-83.21 184.52-185.4 184.52zm101.69-138.19c-5.57-2.78-33-16.2-38.08-18.05s-8.83-2.78-12.54 2.78-14.4 18-17.65 21.75-6.5 4.16-12.07 1.38-23.54-8.63-44.83-27.53c-16.57-14.71-27.75-32.87-31-38.42s-.35-8.56 2.44-11.32c2.51-2.49 5.57-6.48 8.36-9.72s3.72-5.56 5.57-9.26.93-6.94-.46-9.71-12.54-30.08-17.18-41.19c-4.53-10.82-9.12-9.35-12.54-9.52-3.25-.16-7-.2-10.69-.2a20.53 20.53 0 0 0-14.86 6.94c-5.11 5.56-19.51 19-19.51 46.28s20 53.68 22.76 57.38 39.3 59.73 95.21 83.76a323.11 323.11 0 0 0 31.78 11.68c13.35 4.22 25.5 3.63 35.1 2.2 10.71-1.59 33-13.42 37.63-26.38s4.64-24.06 3.25-26.37-5.11-3.71-10.69-6.48z'></path></svg>
    </div>
     <span class="whatsapp-text bg-success text-light mt-2 mb-2">Canlı Destek 7/24. </span> 
  </div>  
</div>
</form>
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
                                    <a href="/">
                                        <img src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <p style="text-align:justify;">Popyohobi.com olarak, örgü ipleri ve hobi malzemeleri konusunda müşterilerimize en kaliteli ürünleri sunma misyonuyla yola çıktık. Kurucusu Belgin Salkım, Bir Amigurumi Eğitmeni olarak instagram üzerinden deneyimlerini ve you tube üzerinden tariflerini sizlerle yıllardır paylaşmaktadır.</p><p class="d-block d-md-none" style="text-align:justify;"> İnstagram üzerinden amigurumi_popyo ve popyo_hobi_malzeme sayfalarından bizleri ve yeni amigurumi tariflerimizi takip edebilir bizimle iletişime geçebilirsiniz. Yaratıcılığınızı özgürce ifade edebileceğiniz, el emeğinizle oluşturduğunuz projelerinizde size destek olmayı amaçlıyoruz. Geniş ürün yelpazemizle, her türlü örgü, dikiş, nakış ve diğer hobi çalışmalarınız için ihtiyaç duyduğunuz malzemeleri bir araya getiriyoruz.</p>
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
                                    <li><span><i class="fa fa-map-marker"></i>Mahmutbey Mah.<br>İSTOÇ

                                        Bağcılar /İSTANBUL</li>
                                    <li style="text-transform:none"><i class="fa fa-envelope-o"></i>{{$mail}}</li>
                                      <li style="text-transform:none"><a href="https://www.instagram.com/popyo_hobi_malzeme/"><i class="fa fa-instagram"></i>İnstagram:popyo_hobi_malzeme<br>(takip için tıklayınız)</li>
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

<!-- father icon -->
<script src="../assets/js/feather.min.js"></script>
<script src="../assets/js/feather-icon.js"></script>




<!-- elevatezoom js-->
<script src="/backend/assets/js/jquery.elevatezoom.js"></script>

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
                $('.basket-item-count-mobile').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge badge-pill">'+ value['totalcart'] +'</span>'));
                $('.basket-item-count-mobile').append($('<span style="margin-top:-100px !important" class="text-lila ">('+ value['totalcart'] +' ürün)</span>')); 
               $('#total').html(value['total_price']);
            }
        });
    }

    $(document).ready(function () {
        // Arama yapıldıkça AJAX ile sonuçları güncelle
        $('#product_title').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: { query: query, _token: _token },
                    success: function (data) {
                        // dropdown menüsünü göster
                        $("#productList").fadeIn();
                        $("#productList").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: " + status + ": " + error);
                    }
                });
            } else {
                // Eğer arama kutusu boşsa dropdown'u gizle
                $("#productList").fadeOut();
                $("#productList").html('');
            }
        });

        // "Daha Fazla Ürün" butonuna tıklama
        $(document).on('click', '#viewAllResults', function (e) {
            e.preventDefault(); // Formun submit olmasını engelle
            var query = $('#product_title').val();
            if (query != '') {
                window.location.href = "{{ route('frontend.search') }}?search_term=" + query;
            }
        });

        // Kullanıcı bir ürün öğesine tıklarsa
        $(document).on('click', '.product-item', function (e) {
            e.preventDefault();
            var productTitle = $(this).find('h5').text();
            // Arama kutusuna tıklanan ürünün adını yaz
            $('#product_title').val(productTitle);
            window.location.href = "{{ route('frontend.search') }}?search_term=" + productTitle;
        });

        // Eğer kullanıcı başka bir yere tıklarsa, dropdown menüsünü gizle
        $(document).click(function (e) {
            if (!$(e.target).closest('#product_title').length) {
                $('#productList').fadeOut();
            }
        });

    });
</script>
    <script>
var menuToggle = document.querySelector(".whatsapp-float"),
    wrapperMenu = document.querySelector(".nav-whatsapp"),
    closeBtn = document.querySelector(".closeWA");
menuToggle.onclick = function() {
  wrapperMenu.classList.toggle('active');
}
closeBtn.onclick = function() {
  wrapperMenu.classList.remove('active');
};

</script>
 @yield('js')

</body>

</html>
