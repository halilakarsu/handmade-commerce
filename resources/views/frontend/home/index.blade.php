@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!--slider start-->
    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1 no-arrow">
                      @foreach($sliders as $key)
                            <section  class="collection-banner section-pt-space b-g-white ">
                                <div  class="custom-container">
                                    <div class="row collection2">
                                        <div  class="col-md-12">
                                            <div  class="collection-banner-main banner-1  p-right">
                                                <div class="collection-img">
                                                    <img src="/backend/images/sliders/{{$key->slider_file}}" class="img-fluid bg-img  " alt="banner">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                       @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->
    <div id="cart_details"></div>
    <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row collection2">
                <div class="col-md-4">
                    <div class="collection-banner-main banner-1  p-right">
                        <div class="collection-img">
                            <img src="/backend/assets/images/layout-2/collection-banner/1.jpg" class="img-fluid bg-img  " alt="banner">
                        </div>
                        <div class="collection-banner-contain">
                            <div>
                                <h3>women</h3>
                                <h4>fashion</h4>
                                <div class="shop">
                                    <a href="product-page(left-sidebar).html">
                                        shop now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="collection-banner-main banner-1 p-right">
                        <div class="collection-img">
                            <img src="/backend/assets/images/layout-2/collection-banner/2.jpg" class="img-fluid bg-img  " alt="banner">
                        </div>
                        <div class="collection-banner-contain ">
                            <div>
                                <h3>camera</h3>
                                <h4>lenses</h4>
                                <div class="shop">
                                    <a href="product-page(left-sidebar).html">
                                        shop now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="collection-banner-main banner-1 p-right">
                        <div class="collection-img">
                            <img src="/backend/assets/images/layout-2/collection-banner/3.jpg" class="img-fluid bg-img  " alt="banner">
                        </div>
                        <div class="collection-banner-contain ">
                            <div>
                                <h3>refrigerator</h3>
                                <h4>lG mini</h4>
                                <div class="shop">
                                    <a href="product-page(left-sidebar).html">
                                        shop now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--collection banner end-->

    <!--discount banner start-->
    <section class="discount-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="discount-banner-contain">
                        <h2>Discount on every single item on our site.</h2>
                        <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
                        <div class="rounded-contain rounded-inverse">
                            <div class="rounded-subcontain">
                                How does it feel, when you see great discount deals for each product?
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--discount banner end-->

    <!--product start-->
    <section class="product section-big-pb-space">
        <div class="custom-container">
            <div class="row ">
                <div class="col pr-0">
                    <div class="product-slide-5  no-arrow">
                        @foreach($products as $product)
                        <div>
                            <div class="product-box ">
                                <div class="product-imgbox">
                                    <div class="product-front">
                                        <a href="product-page(left-sidebar).html">
                                            <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid  " alt="product">
                                            <input name="product_file" type="hidden" id="image{{ $product->id }}" value="{{ $product->product_file }}">
                                        </a>
                                    </div>
                                    <div class="product-back">
                                        <a href="product-page(left-sidebar).html">
                                            <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid  " alt="product">
                                        </a>
                                    </div>
                                    <!-- ... -->
                                    <button id="{{$product->id}}" type="button" class="btn btn-outline btn-cart add-to-cart-btn tooltip-top add-cartnoty"  > Sepete Ekle </button>
                                    <!-- ... -->

                                    <div class="new-label">
                                        <div>Yeni</div>
                                        <input id="quantity" name="quantity" type="hidden"  value="1" min="1" />
                                    </div>
                                </div>
                                <div class="product-detail product-detail2 ">
                                    <a href="product-page(left-sidebar).html">
                                        <h3 id="name{{$product->id}}">{{$product->product_title}}</h3>
                                    </a>
                                    <h5>

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--product end-->
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


