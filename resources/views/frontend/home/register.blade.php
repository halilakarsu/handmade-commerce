@extends('frontend.layouts.index')
@section('title','Kayıt Ol | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
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
                                 <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label for="email">Adınız</label>
                                    <input name="customer_name" type="text" class="form-control" id="fname" placeholder="Soyadınızı giriniz" required="">
                                </div>
                                 <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label for="email">Soyadınız</label>
                                    <input name="customer_lastname" type="text" class="form-control" id="fname" placeholder="Adınızı giriniz" required="">
                                </div>
                                 <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label for="review">Telefon</label>
                                    <input name="customer_phone" type="text" class="form-control" id="name" placeholder="Telefon Numaranız" required="">
                                </div>
                                 <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label for="review">E-mail</label>
                                    <input name="customer_email" type="text" class="form-control" id="name" placeholder="Eposta adresiniz" required="">
                                </div>
                            </div>
                            <div class="row g-3">
                               <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                    <label >Şifre</label>
                                    <input type="password" class="form-control" name="customer_password" placeholder="Lütfen şifrenizi giriniz." required="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6"> 
                                    <label >Şifre Tekrar</label>
                                    <input type="password" class="form-control"  name="customer_password_confirmation" placeholder="Lütfen şifrenizi tekrar giriniz" required="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                      <label class="field-label">İl Seçiniz</label>
                                      <select class="form-control" name="customer_il" id="iller">
                                        <option value="">Lütfen Bir İl Seçiniz</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 col-xs-6">
                                      <label class="field-label">İlçe Seçini</label>
                                      <select class="form-control" name="customer_ilce" id="ilceler">
                                        <option value="">Önce bir il seçiniz</option>
                                      </select>
                                    </div>
                                     <div class="form-group col-md- col-sm-12 col-xs-6">
                                      <label class="field-label">Adres</label>
                                      <textarea name="customer_adres" class="form-control" required placeholder="Lütfen adresiniz yazınız."></textarea>
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
    <script src="/backend/assets/custom/ililce.js"></script>
@endsection
