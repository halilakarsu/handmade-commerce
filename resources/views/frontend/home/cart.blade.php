@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com')

<!--section start-->
@section('content')
<style type="text/css">
    .bg-pink {
        background-color: #cf3180;
        text-align: center;
    }

  .qty-input {
    width: 100%;
    max-width: 60px;
    height:36.8px;
    padding: 5px;
    box-sizing: border-box;
  }

  /* Mobilde daha küçük bir genişlik */
  @media (max-width: 600px) {
    .qty-input {
      max-width:80%;
    }
  }
</style>

<section>
    <div class="container mt-5">
            
        
               @if(isset($cart_data) && count($cart_data) > 0)
            @if(Cookie::get('shopping_cart'))
                @php $total="0" @endphp
                 <div class="bg-pink">
            <h2 class="text-light">Alışveriş Sepetim</h2>
            <small class="text-center text-light">Sepetinize ait detaylar aşağıda listelenmektedir. Sepetinizi güncelleyebilirsiniz.</small>
        </div> 
                <table class="table table-striped">
                             <tbody>
                        @foreach ($cart_data as $data)
                            @php($total=$data['item_price'] * $data['item_quantity'] + $total)
                            <tr class="cartpage">
                                <td>
                                    <a href="{{ route('product.detail', ['slug' => $data['item_slug']]) }}">
                                        <img width="90px" src="/backend/images/products/{{$data['item_image']}}" alt="cart" class="">
                                    </a> 
                                    <br>
                                    <a class="text-dark" href="javascript:void(0)"><b>{{$data['item_name']}}</b></a>
                                   
                                </td>
                                   <td >
                                    <div class="input-group quantity">
                                        <input type="hidden" class="product_id" value="{{ $data['item_id'] }}">
                                        <input type="hidden" class="price" value="{{ $data['item_price'] }}">
                                        <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input  readonly type="text" class="qty-input form-control data" maxlength="3" max="1000" value="{{ $data['item_quantity'] }}">
                                        <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                            <span class="input-group-text">+</span>
                                        </div>
                                    
                                    
                                    <p class="mt-3d-block d-md-none"><b> Tutar:</b> {{number_format($data['item_price'],0)}}₺ x <span class="data">{{$data['item_quantity']}}</span>=<span class="result">{{number_format($data['item_price']*$data['item_quantity'],0)}}₺</span></p>
                                </td>
                                <td colspan="2">
                                    <p class="mt-3 d-none d-sm-block"><b> Tutar:</b>  {{number_format($data['item_price'],0)}}₺ x <span class="data">{{$data['item_quantity']}}</span>=<span class="result">{{number_format($data['item_price']*$data['item_quantity'],0)}}₺</span></p></td>
                             
                                <td colspan="2">  
                                 <a type="button" class=" btn btn-danger btn-xs delete_cart_data ml-3"><i class="fa fa-remove"></i> </a></td>
                                <td>  </td>
                            </tr> 
                        @endforeach
                    </tbody>
                    
                    <tr>
                       
                       <td colspan="2"> <h3 class="text-center">Genel Toplam:<span id="bigTotal">{{number_format($total,0)}}</span> ₺ </h3></td>
                        <td colspan="1">:</span></td>
                        <td colspan="4"></td>
                        
                    </tr>
                   
                </table>
                <div class="row cart-buttons">
            <div class="col-12"><a href="{{ route('frontend.home') }}   " class=" btn btn-danger bg-pink">Alışverişe devam Et</a> 
                <!-- Button trigger modal -->

@if($total<100)
<button data-toggle="modal" data-target="#exampleModalCenter" class="btn-success bg-lila btn">Ödemeye Geç</button>
        </div>
   @else
   @if(Auth::guard('registers')->check())
   <a href="{{route('checkout')}}"  class="btn-success bg-lila btn">Ödemeye Geç</a>
   @else
   <button data-toggle="modal" data-target="#exampleModalCenter2" class="btn-success bg-lila btn">Ödemeye Geç</button>
   @endif
    </div>
   @endif               
    @endif
        @else
            <div class="row">
                <div class="col-md-12 mycard py-5 text-center">
                    <div class="mycards">
                        <h4>Sepetinizde hiç ürün yok.</h4>
                        <a href="{{ route('frontend.home') }}" class="btn btn-upper btn-danger outer-left-xs mt-5 bg-lila">Alışverişe Git</a>
                    </div>
                </div>
            </div>
        @endif
        
    </div>
</section>
<!--modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 15px; box-shadow: 0px 10px 30px rgba(0,0,0,0.1);">
      <div class="modal-header" style="background: linear-gradient(135deg, #670098, #cf3180); color: white; border-radius: 15px 15px 0 0;">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tutar Yetersiz!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span class="text-dark" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('order.status')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
         <br>
          <h4>İşleme devam edebilmeniz için sepetinizde en az 100₺ tutarında ürün olmalıdır.</h4><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px; padding: 10px 20px;">Kapat</button>
        <a href="{{ route('frontend.home') }}"  class="btn btn-success bg-pink" style="border-radius: 10px; padding: 10px 20px;">Alışveriş Yap</a>
      </div>
    </form>
  </div>
</div>
</div>
<div  class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2Title" aria-hidden="true">
  <div style="width:380px" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 15px; box-shadow: 0px 10px 30px rgba(0,0,0,0.1);">
      <div class="modal-header" style="background: linear-gradient(135deg, #670098, #cf3180); color: white; border-radius: 15px 15px 0 0;">
        <h5 class="modal-title" id="exampleModalCenter2Title">İşlem Seçiniz!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span class="text-dark" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('order.status')}}" method="POST">
        @csrf
        @method('PUT')
        <div class=" text-center">
        <a href="{{route('frontend.enter')}}" class="btn btn-solid btn-xl">GİRİŞ YAP</a>
        <a href="{{route('frontend.register')}}" class="btn btn-solid">ÜYE OL</a><br><br>
        <a class="btn btn-sm btn-secondary"  href="{{ route('checkout') }}">Üye Olmadan Devam Et</a><br>
      </div>
      </div>
     
    </form>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function () {
    // Artış butonu
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        // İlgili input'u buluyoruz
        var $input = $(this).closest('tr').find('.data');
        var price = parseFloat($(this).closest(".cartpage").find('.price').val()); 
        var incre_value = $input.val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        $input.val(value); 
        $(this).closest('tr').find('.data').text(value);
        $(this).closest('tr').find('.result').text(value * price + "₺");

        // Genel toplamı güncelle
        updateTotal();
    });

    // Azalış butonu
    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        // İlgili input'u buluyoruz
        var $input = $(this).closest('tr').find('.data');
        var price = parseFloat($(this).closest(".cartpage").find('.price').val());  
        var decre_value = $input.val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;

        value--;
        if (value > 0) { // Minimum değer 1'den küçük olmamalıdır
            $input.val(value); // Değeri güncelle
            $(this).closest('tr').find('.data').text(value);
            $(this).closest('tr').find('.result').text(value * price + "₺");
        }

        // Genel toplamı güncelle
        updateTotal();
    });

    // Update Cart Data
    $(document).ready(function () {
        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var thisClick = $(this);
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var price = $(this).closest(".cartpage").find('.price').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity': quantity,
                'product_id': product_id,
                'price': price,
            };

            $.ajax({
                url: '/update-to-cart',
                type: 'POST',
                data: data,
                success: function (response) {
                    // Her ürünün fiyatını ve miktarını alıp toplamı hesapla
                    updateTotal();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
    });

    // Sepet verisini silme işlemi
    $(document).ready(function () {
        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

            $.ajax({
                url: 'delete-from-cart',
                type: 'DELETE',
                data: data,
                success: function (response) {
                    alertify.success(response.status);
                    window.location.reload();
                }
            });
        });
    });

    // Genel toplamı güncelleyen fonksiyon
    function updateTotal() {
        let totalPrice = 0;

        $(".cartpage").each(function () {
            // Her ürünün fiyatını ve miktarını alıp toplamı hesapla
            let price = parseFloat($(this).find('.price').val());
            let quantity = parseInt($(this).find('.qty-input').val());
            totalPrice += price * quantity; // Her ürünün toplamını ekle
        });

        // Toplam fiyatı sayfada güncelle
        $(".total").text(totalPrice.toFixed(2) + "₺");
        $(".bigTotal").text(totalPrice.toFixed(2) + "₺");
    }
});
</script>

@endsection
