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
                            <h2>ÜRÜNLER</h2>
                            <ul>
                                <li><a href="index.html">Anasayfa</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Ürünler</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!-- section start -->
    <section class="section-big-py-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-3 collection-filter category-side category-page-side">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block creative-card creative-inner category-side">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i>GERİ</span></div>

                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title mt-0">KATEGORİLER</h3>
                                <div class="collection-collapse-block-content mt-3">
                                    <div class="collection-brand-filter">
                                        @php($i=1)
                                        @foreach($categories as $category)
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item ">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$category->id}}" aria-expanded="true" aria-controls="collapseOne{{$category->id}}">
                                                            {{$category->categori_title}}
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{$category->id}}" class="accordion-collapse collapse {{$i==1? "show" : ""}}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        @foreach($category->types  as $type)
                                                            <div class="accordion-body">
                                                                <strong>{{$type->type_title}}</strong>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @php($i=$i+1)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card creative-card creative-inner">
                            <h5 class="title-border text-capitalize">Yeni Ürünler</h5>
                            <div class="slide-1">

                                <div>
                                    <div class="media-banner plrb-0 b-g-white1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>bajaj rex mixer</p></a>
                                                                <h6>$40.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>
                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>
                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>usha table fan</p></a>
                                                                <h6>$52.05 <span>$60.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>
                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>
                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html" tabindex="0">
                                                    <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html" tabindex="0"><p>sumsung galaxy</p></a>
                                                                <h6>$47.05 <span>$55.21</span></h6>
                                                            </div>
                                                            <div class="cart-info">
                                                                <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> </button>
                                                                <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" ><i  data-feather="heart" class="add-to-wish"></i></a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"><i  data-feather="eye"></i></a>
                                                                <a href="compare.html"  class="tooltip-top" data-tippy-content="Compare"><i  data-feather="refresh-cw"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner">
                            <a href="javascript:void(0)"><img src="../assets/images/category/side-banner.png" class="img-fluid " alt="side-banner"></a>
                        </div>
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="product-wrapper-grid product-load-more product">
                                            <div class="row">

                                                @foreach($types as $type)
                                                    @foreach($type->products as $product)
                                                        <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                                                            <div class="product-box">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        <a href="product-page(left-sidebar).html">
                                                                            <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid" alt="product">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-back">
                                                                        <a href="product-page(left-sidebar).html">
                                                                            <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid" alt="product">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center detail-inverse">
                                                                    <div class="detail-title">
                                                                        <div class="detail-left">
                                                                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                                                                            <a href="product-page(left-sidebar).html">
                                                                                <h6 class="price-title">
                                                                                    {{$product->product_title}}
                                                                                </h6>
                                                                            </a>
                                                                        </div>
                                                                        <div class="detail-right">
                                                                            <div class="check-price"> {{$product->product_price}} </div>
                                                                            <div class="price">
                                                                                <div class="price"> {{$product->product_price}} </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="icon-detail">
                                                                        <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart">
                                                                            <i  data-feather="shopping-cart"></i>
                                                                        </button>
                                                                        <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist">
                                                                            <i  data-feather="heart"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top" data-tippy-content="Quick View">
                                                                            <i  data-feather="eye"></i>
                                                                        </a>
                                                                        <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">
                                                                            <i  data-feather="refresh-cw"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">Daha Fazla Ürün</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->

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


