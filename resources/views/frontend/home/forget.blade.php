@extends('frontend.layouts.index')
@section('title','Kayıt Ol | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                    <div class="theme-card">
                        <h3 class="text-center">ŞİFREMİ UNUTTUM</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('frontend.login')}}" method="post" class="theme-form" >
                            <div class="form-group">
                                @csrf
                                <label >Email</label>
                                <input name="customer_email" type="text" class="form-control"  placeholder="Email Adresiniz" required="">
                            </div>
                           
                            <button type="submit" class="btn btn-solid bg-pink">Gönder</button>
                            <a class="float-end txt-default mt-2" href="forget-pwd.html">GİRİŞ YAP</a>
                        </form>
                        <p class="mt-3">Yoksa hesabınız hala yok mu? Hemen kayıt ol buttonuna basarak hızlı bir şekilde sisteme kayıt olabilirsiniz.</p>
                        <a href="{{route('frontend.register')}}" class="btn btn-secondary btn-sm">Kayıt Ol</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
