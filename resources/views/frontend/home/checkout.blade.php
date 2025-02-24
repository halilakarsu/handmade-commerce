@extends('frontend.layouts.index')
@section('title','Hobi Malzemeleri | Hobi Sitesi | popyohobi.com')

<!--section start-->
@section('content')
<!-- section start -->      
<style>




    .order-btn {
        padding: 12px 20px;
        border: 2px solid #ccc;
        border-radius: 10px;
        background-color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
    }

    .order-btn input {
        display: none; /* Radyo butonunu gizliyoruz */
    }

    .order-btn.active {
        background-color: #cf3180;
        color: white;
        border-color: #007bff;
    }
     .modal.fade .modal-dialog {
    transform: translate(0, -50%);
    opacity: 0;
    transition: all 0.3s ease-in-out;
  }

  .modal.fade.show .modal-dialog {
    transform: translate(0, 0);
    opacity: 1;
  }

  .btn-primary:hover, .btn-success:hover, .btn-secondary:hover {
    transform: translateY(-3px);
    transition: all 0.2s ease-in-out;
  }

  .btn-primary {
    background: linear-gradient(135deg, #670098, #cf3180);
    border: none;
  }

  .btn-success {
    background: linear-gradient(135deg, #670098, #cf3180);
    border: none;
  }

  .btn-secondary {
    background: #9e9e9e;
    border: none;
  }
</style>
<section class="section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form action="{{route('order.register')}}" method="POST">
                    <div class="row">
                      <div class="col-lg-6 col-sm-12 col-xs-12">
    <div class="checkout-title">
        <h3 class="text-center">Ödeme İşlemleri</h3>                           
    </div>
    <div class="theme-form">
        <div class="row check-out">
           
            @php
                $user = Auth::guard('registers')->user(); // registers guard'ı ile giriş yapan kullanıcı
            @endphp
            
            @if($user)
            <form action="{{route('order.register')}}" method="POST">
               @CSRF
                <!-- Kullanıcı giriş yapmışsa inputları gizleyerek session bilgilerini göster -->
                <p><strong>Adınız:</strong> {{ $user->customer_name }}</p>
                <input type="hidden" name="order_name" value="{{ $user->customer_name }}">

                <p><strong>Soyadınız:</strong> {{ $user->customer_lastname }}</p>
                <input type="hidden" name="order_lastname" value="{{ $user->customer_lastname }}">

                <p><strong>Telefon Numaranız:</strong> {{ $user->customer_phone }}</p>
                <input type="hidden" name="order_phone" value="{{ $user->customer_phone }}">

                <p><strong>E-mail:</strong> {{ $user->customer_email }}</p>
                <input type="hidden" name="order_email" value="{{ $user->customer_email }}">

                <p><strong>İl:</strong> {{ $user->customer_il }}</p>
                <input type="hidden" name="order_il" value="{{ $user->customer_il }}">

                <p><strong>İlçe:</strong> {{ $user->customer_ilce }}</p>
                <input type="hidden" name="order_ilce" value="{{ $user->customer_ilce }}">

                <p><strong>Adres:</strong> {{ $user->customer_adres }}</p>
                <input type="hidden" name="order_adres" value="{{ $user->customer_adres }}">
                <b><small>Teslimat Bilgilerinizde herhangi bir yanlışlık varsa.Hesabınıza giderek gerekli düzenlemeleri yapabilirsiniz.</small><br><a class="btn s btn-success" href="/hesabim">Bilgileri Güncelle</a></b>
            @else
            <form action="{{route('order.register')}}" method="POST">
               @CSRF
                <!-- Kullanıcı giriş yapmamışsa formu göster -->
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Adınız:</label>
                    <input type="text" name="order_name" required placeholder="Adınızı giriniz">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Soyadınız:</label>
                    <input type="text" name="order_lastname" required placeholder="Soyadınızı giriniz">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label class="field-label">Telefon Numaranız</label>
                    <input type="text" name="order_phone" required placeholder="Telefon">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label class="field-label">E-mail</label>
                    <input type="text" name="order_email" required placeholder="E-posta adresiniz">
                </div>

                <!-- İl ve İlçe Seçimi -->
                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label class="field-label">İl Seçiniz</label>
                    <select name="order_il" id="iller">
                        <option value="">Lütfen Bir İl Seçiniz</option>                                         
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-6">
                    <label class="field-label">İlçe Seçiniz</label>
                    <select name="order_ilce" id="ilceler">
                        <option value="">Önce bir il seçiniz</option>                                     
                    </select>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="field-label">Adresiniz</label>
                    <textarea name="order_adres" required placeholder="Açık Adresiniz"></textarea>
                </div>
            @endif
             @if(!$user)
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <small>Kişisel verileriniz, siparişinizin teslimatının sağlanması ve yasal yükümlülüklerimizin yerine getirilmesi için gerekli olması nedeniyle işlenecek olup, tarafınıza ait bir üyelik hesabı oluşturulmayacaktır.</small>
            </div>
            @endif
           <div class="container mt-5">
             <label>Ödeme Yöntemi Seçiniz</label><br>
        <div id="orderButtons" style="display: flex; gap: 10px;">
          
    <label class="order-btn active">
        <input type="radio" id="kredi" name="order_type" value="Kredi Kartı ile Ödeme" checked>
        Kredi Kartı ile Ödeme
    </label>

    <label class="order-btn">
        <input type="radio" id="kapida" name="order_type" value="Kapıda Ödeme">
        Kapıda Ödeme (PTT Kargo)
    </label>

    <label class="order-btn">
        <input type="radio" id="havale" name="order_type" value="Havale Ödeme">
        Havale Ödeme
    </label>
</div>
  </div>  
         
         
        <div class="form-group">
              <br>
          <label>Kargo Seç:</label><br>
          <div style="border:2px solid #ccc;border-radius:10px; padding:15px;" class="form-check cargo-option">
            <input class="form-check-input3" type="radio" name="order_cargo" id="cargo1" value="PTT Kargo" required checked>
            <label class="form-check-label1" for="cargo1">
              PTT Kargo 95 TL        
             <span class="kapidaOdeme">
              (+25 TL Kapıda Ödeme)
            </span>
             </div>
            <div style="border:2px solid #ccc;border-radius:10px; padding:15px;" id="cargo2" class="form-check cargo-option">              
            <input class="form-check-input4" type="radio" name="order_cargo"  value="Sürat Kargo" required>
            <label class="form-check-label4" for="cargo2">
              Sürat Kargo (95 TL)
            </label>
          </div>
        </div>        
      </div>      
    </div>
</div>

                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Ürünler <span>Tutar</span></div>
                                    </div>
                                    <ul class="qty">
                                           @php 
                                          $total="0";
                                          $dor_price=25;
                                          $cargo_price=95;
                                          @endphp
                                         @foreach ($cart_data as $data)
                                        <input type="hidden" name="cart_data[{{ $loop->index }}][item_name]" value="{{ $data['item_name'] }}">
                                        <input type="hidden" name="cart_data[{{ $loop->index }}][item_id]" value="{{ $data['item_id'] }}">
                                        <input type="hidden" name="cart_data[{{ $loop->index }}][item_quantity]" value="{{ $data['item_quantity'] }}">
                                        <input type="hidden" name="cart_data[{{ $loop->index }}][item_price]" value="{{ $data['item_price'] }}">
                                         @php($total=$data['item_price'] * $data['item_quantity'] + $total)
                                        <li><b><small>{{$data['item_name']}}>></small></b><span><small>{{$data['item_quantity'] }} ×   {{$data['item_price']}}₺ ={{$data['item_price']*$data['item_quantity']}}₺ </small></li>
                                       @endforeach
                                    </ul>  
                                 <input type="hidden" name="cargo_price" value="{{ $cargo_price }}"> 
                                      @if($total>95)
                                    <ul class="total">
                                        <li> Toplam <span class="count">{{$total}}.00₺</span></li>
                                        <li>Kargo Ücreti: <span class="count">{{$cargo_price  }}.00₺</span></li>
                                        <li class="kapidaOdeme">Kapıda Ödeme Ücreti: <span class="count">+{{$dor_price  }}.00₺</span></li>
                                        <li class="normalToplam"  >Genel Toplam <span class="count">{{$total+$cargo_price}}.00₺</span></li>
                                        <li class="kapidaOdeme">Genel Toplam <span class="count">{{$total+$cargo_price+$dor_price}}.00₺</span></li>
                                    </ul>                            
                                   </div>
                                 
                                <div class="payment-box">
                                <div class="text-right">
                                    <button type="submit" class="btn-solid btn-block">Devam Et <i class="fa fa-arrow-right"></i></button>
                                      <a href="/" class="text-center"><small class="text-center btn btn-block text-capitalize">Alışverişe Devam Et -></small></a></div>
                                </div>
                                </div>
                               </form>
                                 @else
                             <p>İşleme devam edebilmek için en az {{$kargo_ucret}} kadar alışveriş yapmanız lazım.<br></p>
                              <div align="left" class="text-right">
                               <a href="/cart" class="btn-normal btn bg-pink"> <i class="fa fa-shopping-cart"></i> SEPETİM</a> 
                               <a href="/" class="btn-normal btn"><i class="fa fa-paper-plane "></i>ALIŞVERİŞE DÖN</a></div>         
                               @endif
                            </div>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function () {
        $(".kapidaOdeme").hide(); // Sayfa yüklendiğinde gizle
    document.querySelectorAll('.order-btn').forEach(button => {
        button.addEventListener('click', function () {
            // Tüm butonlardaki "active" sınıfını kaldır
            document.querySelectorAll('.order-btn').forEach(btn => btn.classList.remove('active'));
         $("#kapida").on("click", function () {
          $("#cargo1").prop("checked", true);
          });

             $(".kapidaOdeme").show()
            // Tıklanan butona "active" sınıfı ekle
            this.classList.add('active');
            
            // İçindeki radio butonu işaretle
            this.querySelector('input').checked = true;

            // Seçilen input'un ID'si "kapida" ise cargo2'yi gizle
            if (this.querySelector('input').id === "kapida") {
                $("#cargo2").hide();
                  $(".normalToplam").hide();
                $(".kapidaOdeme").show();
            } else {
                $("#cargo2").show();
                 $(".normalToplam").show();
                $(".kapidaOdeme").hide();
            }
        });
    })
      });
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".cargo-option").forEach(option => {
        option.addEventListener("click", function () {
            this.querySelector("input").checked = true;
        });
    });
});

</script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="/backend/assets/custom/ililce.js"></script>
<script type="text/javascript">
document.getElementById("payment-2").checked = true;
document.getElementById("payment-3").checked = true;
</script>

@endsection
