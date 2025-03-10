@extends('backend.layouts.index')
@section('title','Anasayfa')
@section('content')
<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Yönetim Paneli
                        <small>İçerik Yönetim Sistemin</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{route('backend.logout')}}">Çıkış</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Ürünler</span>
                            <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Kullanıcılar</span>
                            <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="message-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Siparişler</span>
                            <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-success card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">New Vendors</span>
                            <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
