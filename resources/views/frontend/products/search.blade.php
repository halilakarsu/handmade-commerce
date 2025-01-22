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
                                                <div class="accordion-item bg-light">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$category->id}}" aria-expanded="true" aria-controls="collapseOne{{$category->id}}">
                                                            <h4 class="text-danger "><b>{{$category->categori_title}}</b></h4>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{$category->id}}" class="accordion-collapse collapse {{$i==1? "show" : ""}}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        @foreach($category->types  as $type)
                                                            <div class="accordion-body">
                                                                <strong>   <a href="">{{$type->type_title}}</a></strong>
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
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filtrele</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid  product">
                                            <div class="row items">
                                                @foreach ($categoriPro as $category)
                                                    @foreach ($category->types as $type)
                                                        @foreach ($type->products as $product)
                                                            <div class="col-xl-3 col-md-4 col-6 col-grid-box item">
                                                                <div class="product-box">
                                                                    <div class="product-imgbox">
                                                                        <div class="product-front">
                                                                            <!-- Ürün sayfasına yönlendirme -->
                                                                            <a href="">
                                                                                <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid" alt="product">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-back">
                                                                            <a href="">
                                                                                <img src="/backend/images/products/{{$product->product_file}}" class="img-fluid" alt="product">
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="product-detail product-detail2">
                                                                        <a href="">
                                                                            <h3>{{$product->product_title}}</h3>
                                                                        </a>
                                                                        <h5>
                                                                            {{$product->product_price}}
                                                                            <span>{{$product->product_price}}</span>
                                                                        </h5>
                                                                        <button class="tooltip-top add-cartnoty" data-tippy-content="Beni Sepete Ekle">
                                                                            Sepete Ekle
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach


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


