@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com ')
@section('content')
        <!--rounded category start-->
    <section class="rounded-category b-g-white  rounded-category-inverse">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div style="overflow-x:scroll ;" class="slide-6 no-arrow ">

                        @foreach($banners as $row)
                        <div>
                            <div class="category-contain">
                                <a href="urunler/{{$row->banner_slug}}">
                                    <div class="img-wrapper">
                                        <img   src="/backend/images/banners/{{$row->banner_file}}" class="img-fluid" alt="category">
                                    </div>
                                    <div>
                                        <div  class="btn-rounded text-capitalize">
                                           <p class="text-dark"> {{$row->banner_title}}</p>
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
      <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1">
                      @foreach($sliders as $key)
                            <a href="{{$key->slider_slug}}">
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
       <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row ">
               @foreach($categories as $row)
    <div class="col-md-4">
        @if($row->types->count() == 1)
            <a href="{{ route('frontend.products', ['slug' => $row->types->first()->type_slug]) }}">
        @else
            <a href="{{ route('frontend.types', ['slug' => $row->categori_slug]) }}">
        @endif
            <div class="collection-banner-main banner-1 p-right">
                <div class="collection-img mt-2">
                    <img src="/backend/images/categories/{{$row->categori_file}}" class="img-fluid bg-img" alt="banner">
                   
                </div>
            </div>
        </a>
    </div>
@endforeach

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
                        //alertify.set('notifier','position','top-right');
                        //alertify.success(response.status);
                        cartload();
                    },
                });
            });
        });
    </script>

@endsection


