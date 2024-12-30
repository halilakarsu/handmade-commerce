@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com ')

@section('content')
    <!--slider start-->
    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1 no-arrow">
                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img">
                                    <ul class="layout1-slide-1">
                                        <li id="img-1"><img src="/backend/assets/images/layout-2/slider/1.1.png" class="img-fluid" alt="slider"></li>
                                        <li id="img-2" class="slide-center"><img src="/backend/assets/images/layout-2/slider/1.2.png" class="img-fluid" alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h1>mi<span>Mobile</span></h1>
                                        <h4>fast and light</h4>
                                        <h2>Pixel Perfect Deal Camera</h2>
                                        <a href="product-page(left-sidebar).html" class="btn btn-normal">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img">
                                    <ul class="layout1-slide-2">
                                        <li id="img-3" class="slide-center"><img src="/backend/assets/images/layout-2/slider/2.1.png" class="img-fluid" alt="slider"></li>
                                        <li id="img-4" class="slide-center"><img src="/backend/assets/images/layout-2/slider/2.2.png" class="img-fluid" alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h1>big<span>Sale</span></h1>
                                        <h4>now start at $99</h4>
                                        <h2>50% off</h2>
                                        <a href="product-page(left-sidebar).html" class="btn btn-normal">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img">
                                    <ul class="layout1-slide-3">
                                        <li id="img-5"><img src="/backend/assets/images/layout-2/slider/3.2.png" class="img-fluid" alt="slider"></li>
                                        <li id="img-6" class="slide-center"><img src="/backend/assets/images/layout-2/slider/3.1.png" class="img-fluid" alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h1>camera<span>Sale</span></h1>
                                        <h4>now start at $79</h4>
                                        <h2>70% off today</h2>
                                        <a href="product-page(left-sidebar).html" class="btn btn-normal">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <button id="{{$product->id}}" type="button" class="btn btn-outline btn-cart add_to_cart tooltip-top add-cartnoty"  > Sepete Ekle </button>
                                    <!-- ... -->

                                    <div class="new-label">
                                        <div>Yeni</div>
                                        <input name="quantity" type="hidden" id="quantity{{$product->id}}" value="1" min="1" />
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
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!--product end-->
@endsection
@section('js')

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        load_cart_data();

        // Sepet verilerini yüklemek için AJAX
        function load_cart_data() {
            $.ajax({
                url: "{{ route('fetch') }}",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#cart_details').html(data.cart_details);
                }
            });
        }

        // Sepete ürün eklemek için AJAX
        $(document).on('click', '.add_to_cart', function(){
            var product_id = $(this).attr("id");
            var product_name= $('#name' + product_id).val();   // data-* özelliğinden ürün adı alındı
            var product_image = $('#image' + product_id).val();  // data-* özelliğinden ürün resmi alındı
            var product_quantity = $('#quantity' + product_id).val();
            if (product_quantity > 0) {
                $.ajax({
                    url: "{{ route('addCart') }}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_image: product_image,
                        product_quantity: product_quantity
                    },
                    success: function(data) {
                        load_cart_data();  // Sepet güncelleniyor
                    }
                });
            } else {
                alert("Please Enter Quantity");  // Hata mesajı düzeltildi
            }
        });
    });

</script>
@endsection
