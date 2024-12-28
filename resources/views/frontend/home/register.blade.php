@extends('frontend.layouts.index')
@section('title','Kayıt Ol | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">SİSTEME KAYIT OL</h3>
                        <form action="{{route('frontend.registerStore')}}" method="POST" class="theme-form">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="email">Adınız Soyadınız</label>
                                    <input name="customer_name" type="text" class="form-control" id="fname" placeholder="Lütfen adınızı ve soyadınızı giriniz" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="review">Telefon</label>
                                    <input name="customer_phone" type="text" class="form-control" id="name" placeholder="Telefon Numaranız" required="">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label >Email Adresiniz</label>
                                    <input name="customer_email" type="email" class="form-control"  placeholder="Email" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label >Şifre</label>
                                    <input type="password" class="form-control" name="customer_password" placeholder="Lütfen şifrenizi giriniz." required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label >Şifre Tekrar</label>
                                    <input type="password" class="form-control"  name="customer_password_confirmation" placeholder="Lütfen şifrenizi tekrar giriniz" required="">
                                </div>
                                <div class="col-md-12 form-group"><button type="submit" class="btn btn-normal">Hesap Oluştur</button></div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 ">
                                    <p >Yoksa sisteme daha Önce kayıtlı mısınız?  <a href="{{route('frontend.login')}}" class="txt-default">Giriş Yap</a></p>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
