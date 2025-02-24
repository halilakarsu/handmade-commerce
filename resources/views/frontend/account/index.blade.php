@extends('frontend.layouts.index')
@section('title','Ürünler | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            
                            <ul>
                                <li><a class="text-capitalize" href="/">Anasayfa</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a class="text-capitalize" href="javascript:void(0)">Hesabım</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-py-space b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">Hesabım</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> Geri</span></div>
                        <div class="block-content ">
                            <ul>
                                <li class="active"><a href="javascript:void(0)">Hesap Bilgilerim</a></li>
                                <li><a href="javascript:void(0)">Siparişler</a></li>
                                <li><a href="javascript:void(0)">Favorilerim</a></li>
                                <li><a href="javascript:void(0)">Hesabım</a></li>
                                <li><a href="javascript:void(0)">Şifre Değiştir</a></li>
                                <li class="last"><a href="{{route('frontend.logout')}}">Çıkış</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div align="right" class="page-title">
                                <a href="/" class="btn btn-solid btn-xs mb-3"><i class="fa fa-shopping-cart"></i> Alışverişe Git</a>
                                <a href="{{route('frontend.logout')}}" class="btn bg-danger btn-solid btn-xs mb-3"><i class="fa fa-times"></i> Çıkış</a>
                                </div>
                                 <div class="page-title">
                                
                                <h2>Merhaba {{Auth::guard('registers')->user()->customer_name}}!</h2></div>
                            <div class="welcome-msg">

                                
                                <p>Bu panodan, son hesap aktivitelerinize genel bir bakış yapabilir ve hesap bilgilerinizi güncelleyebilirsiniz.Bilgilerinizi görüntülemek veya düzenlemek için menüdeki bağlantılardan birini seçin.</p>
                            </div>
                            <hr>
                            <div class="box-account box-info">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>İletişim Bilgileri </h3></div>
                                            <div class="box-content">
                                                <h6>{{Auth::guard('registers')->user()->customer_name}}</h6>
                                                <h6>{{Auth::guard('registers')->user()->customer_email}}</h6>
                                                <h6><a href="javascript:void(0)">Şifre Değiştir</a></h6></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>İşlemler</h3><a href="javascript:void(0)">Güncelle</a></div>
                                            <div class="box-content">
                                                <p>İşlemlerinizi buradan güncelleyebilirsiniz.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Adres İşlemleri</h3><a href="javascript:void(0)">Adres Yönetimi</a></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6>Güncel Adresiniz</h6><address>Fatura adresinizi buradan değiştirebilirsiniz.<br><a href="javascript:void(0)">Adres Güncelle</a></address></div>
                                            <div class="col-sm-6">
                                                <h6>Güncel Teslimat Adresiniz</h6><address>You have not set a default shipping address.<br><a href="javascript:void(0)">Adres Güncelle</a></address></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

@endsection


