@extends('frontend.layouts.index')
@section('title','popyohobi.com | Hakkımızda')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>İletişim</h2>
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="contact-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row section-big-pb-space">
                <div class="col-xl-6 offset-xl-3">
                    <h3 class="text-center mb-3">BİZE ULAŞIN</h3>
                    <form action="{{route('frontend.send')}}" method="POST" class="theme-form">
                        <div class="row">
                           @CSRF
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Adınız Soyadınız</label>
                                    <input type="text" name="sender_name" class="form-control" id="name" placeholder="Adınızı ve soyadınızı yazınız" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="review">Telefon Numaranız</label>
                                    <input type="text" name="sender_phone" class="form-control" id="review" placeholder="Telefon numaranızı yazınız." required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" name="sender_email" class="form-control" placeholder="Email Adresiniz." required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Konu</label>
                                    <input type="text" name="sender_subject" class="form-control" placeholder="Mesajınızın Konusu." required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label >Mesaj.</label>
                                    <textarea name="sender_message" class="form-control" placeholder="Lüten mesajınızı yazınız."  rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </section>
    <!--Section ends-->


@endsection
