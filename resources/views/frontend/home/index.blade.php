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


@endsection
