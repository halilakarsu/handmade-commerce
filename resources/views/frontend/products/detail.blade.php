@extends('frontend.layouts.index')
@section('title','Ürün Detayı | Hobi Sitesi | popyohobi.com ')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>ÜRÜN DETAYI</h2>
                            <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">{{$detail->product_title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-slick no-arrow">
                            <div><img src="/backend/images/products/{{$detail->product_file}}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                        </div>

                    </div>
                    <div class="col-lg-7 rtl-text">
                        <div class="product-right">
                            <div class="pro-group">
                                <h1 class="text-lila">{{$detail->product_title}}</h1>
                                <ul class="pro-price">
                                    <li> <h2 class="text-price-detail">{{$detail->product_price}}₺</h2></li>
                                </ul>
                            </div>

                            <div id="selectSize" class="pro-group addeffect-section product-description border-product mb-0">

                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt="" class="img-fluid "></div>
                                        </div>
                                    </div>
                                </div>



                                <h6 class="product-title">Miktar</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" id="quantity" name="quantity" type="number" value="1"/>
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <button id="{{$detail->id}}"id="cartEffect" class="btn cart-btn btn-normal tooltip-top add-to-cart-btn" data-tippy-content="Beni sepete Ekle">
                                        <i class="fa fa-shopping-cart"></i>
                                        Sepete Ekle
                                    </button>

                                </div>
                            </div>


                            <div class="pro-group">
                                <h6 class="product-title">Ürün Bilgileri</h6>
                                <p>{!! $detail->product_description!!}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
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
                    url: "/add-to-cart",
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


