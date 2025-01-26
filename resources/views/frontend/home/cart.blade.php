
@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com ')
<!--section start-->
@section('content')
<section class="cart-section section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                @if(isset($cart_data))
                    @if(Cookie::get('shopping_cart'))
                        @php $total="0" @endphp
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">Görsel</th>
                        <th scope="col">ÜRÜN ADI</th>
                        <th scope="col">FİYATI</th>
                        <th scope="col">Adet</th>
                        <th scope="col">TOPLAM</th>
                        <th scope="col">SİL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cart_data as $data)
                    <tr class="cartpage">
                        <td>
                            <a href="javascript:void(0)"><img src="/backend/images/products/{{$data['item_image']}}" alt="cart"  class=" "></a>
                        </td>
                        <td><a href="javascript:void(0)">{{$data['item_name']}}</a>
                            <div class="mobile-cart-content">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="text" name="quantity" class="form-control input-number" value="{{$data['item_quantity']}}">
                                        </div>
                                    </div>
                                </div>
                                   <div class="col-xs-3">
                                    <h2 class="td-color"><a href="javascript:void(0)" class="icon"><i class="ti-close"></i></a></h2></div>
                            </div>
                        </td>
                        <td class="cart-product-sub-total">
                            <h2 class="cart-sub-total-price">{{number_format($data['item_price'],0)}}</h2></td>
                        <td class="cart-product-quantity">
                            <div class="input-group quantity">
                                <input type="hidden" class="product_id" value="{{ $data['item_id'] }}">
                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                    <span class="input-group-text">-</span>
                                </div>
                                <input type="text" class="qty-input form-control" maxlength="2" max="10" value="{{ $data['item_quantity'] }}">
                                <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>
                        </td>

                        <td class="cart-product-grand-total">
                            <h2 class="td-color">{{$data['item_price']*$data['item_quantity']}}</h2></td>
                        <td><button type="button" class="btn btn-danger btn-xs"> <i class="fa fa-times-circle"></i> Sil</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>Toplam Tutar :</td>
                        <td>
                            <h2>$6935.00</h2></td>
                    </tr>
                    </tfoot>
                </table>
                    @endif
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Sepetinizde hiç ürün yok.</h4>
                                <a href="{{ route('frontend.home') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Alışverişe Git</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ route('frontend.home') }}   " class="btn btn-normal">Alışverişe devam Et.</a> <a href="javascript:void(0)" class="btn btn-normal ms-3">Onayla</a></div>
        </div>
    </div>
</section>
<!--section end-->
<script>
    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });

// Update Cart Data

    $(document).ready(function () {

        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var thisClick=$(this);
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };

            $.ajax({
                url: '/update-to-cart',
                type: 'POST',
                data: data,
                success: function (response) {
                    thisClick.closest(".cartpage").find(".cart-grand-total-price").text("i am here");
                    //window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });

    });


</script>
@endsection


