@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!--slider start-->

    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1">
                      @foreach($sliders as $key)
                            <a href="products/">
                                <div class="collection-img mt-2">
                            <img src="/backend/images/sliders/{{$key->slider_file}}" class="img-fluid w-100 " alt="blog">
                            </div>
                            </a>
                       @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->
    <!--title start-->


    <!--discount banner start-->
    <section class="discount-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div  class="discount-banner-contain">
                        <h2 style="text-transform:none">Şimdi popyohobi ile alışverişin tam zamanı.</h2>
                        <h1 style="text-transform:none"><span>Kaliteli ve ucuzluğu adresi</span> <span>popyohobi.com!</span></h1>
                        <div class="rounded-contain rounded-inverse">
                            <div  class="rounded-subcontain">
                                KOŞULSUZ İADE ETME SEÇENEĞİMİZLE BEĞENMEDİĞİNİZ ÜRÜNLERİ GERİ ALIYORUZ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--discount banner end-->

    <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row ">
                @foreach($type1 as $row)
                <div class="col-md-4">
                    <a href="{{ route('frontend.products', ['slug' => $row->type_slug]) }}">
                    <div class="collection-banner-main banner-1  p-right">
                        <div class="collection-img mt-2">
                            <img  src="/backend/images/types/{{$row->type_file}}" class="img-fluid bg-img" alt="banner">
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
   <!--collection banner end-->

    <!--rounded category start-->
    <section class="rounded-category  rounded-category-inverse">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-6 no-arrow">

                        @foreach($banners as $row)
                        <div>
                            <div class="category-contain">
                                <a href="javascript:void(0)">
                                    <div class="img-wrapper">
                                        <img   src="/backend/images/banners/{{$row->banner_file}}" class="img-fluid" alt="category">
                                    </div>
                                    <div>
                                        <div  class="btn-rounded text-capitalize">
                                            {{$row->banner_title}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--rounded category end-->

    <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row ">
                @foreach($type2 as $row)
                    <div class="col-md-4">
                        <a href="{{ route('frontend.products', ['slug' => $row->type_slug]) }}">
                            <div class="collection-banner-main banner-1  p-right">
                                <div class="collection-img mt-2">
                                    <img  src="/backend/images/types/{{$row->type_file}}" class="img-fluid bg-img" alt="banner">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--collection banner end-->
    <script>
        $(document).ready(function () {
            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).attr('id');
                var quantity = $("#quantity").val();
                $.ajax({
                    url: "add-to-cart",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function (response) {
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                        cartload();
                    },
                });
            });
        });
    </script>
@endsection


