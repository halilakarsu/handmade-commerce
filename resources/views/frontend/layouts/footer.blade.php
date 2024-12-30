
<!-- footer start -->
<footer>
  <div class="footer1">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="footer-main">
            <div class="footer-box">
              <div class="footer-title mobile-title">
                <h5>about</h5>
              </div>
              <div class="footer-contant">
                <div class="footer-logo">
                  <a href="index.html">
                    <img src="/backend/images/settings/{{$logo}}" class="img-fluid" alt="logo">
                  </a>
                </div>
                <p>Her ürünümüz, kaliteli malzemelerden üretilmiş ve titizlikle seçilmiştir. Popyohobi.com, müşteri memnuniyetini her zaman ön planda tutarak, kaliteli ürünleri uygun fiyatlarla sizlere sunar.</p>
              </div>
            </div>
            <div class="footer-box">
              <div class="footer-title">
                <h5 style="text-transform:none">Kategorilerimiz</h5>
              </div>
              <div class="footer-contant">
                <ul>
                  <li><a href="javascript:void(0)">Hakkımızda</a></li>
                  <li><a href="javascript:void(0)">contact us</a></li>
                  <li><a href="javascript:void(0)">terms &amp; conditions</a></li>
                  <li><a href="javascript:void(0)">returns &amp; exchanges</a></li>
                  <li><a href="javascript:void(0)">shipping &amp; delivery</a></li>
                </ul>
              </div>
            </div>
            <div class="footer-box">
              <div class="footer-title">
                <h5 style="text-transform:none">Bize Ulaşın</h5>
              </div>
              <div class="footer-contant">
                <ul class="contact-list">
                  <li><i class="fa fa-map-marker"></i>{!!$adres!!}</li>
                  <li><i class="fa fa-phone"></i> <span>{{$phone}}</span></li>
                  <li><i class="fa fa-envelope-o"></i>{{$mail}}</li>
                </ul>
              </div>
            </div>
            <div class="footer-box">
              <div class="footer-title">
                  <h5 style="text-transform:none">Bülten Aboneliği</h5>
                <small>Kampanyalarımızdan haberdar olmak için e-bültenimize kayıt olun.</small>
              </div>
              <div class="footer-contant">
                <div class="newsletter-second">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Adınız Soyadınız" >
                      <span class="input-group-text"><i class="ti-user"></i></span>
                    </div>
                  </div>
                  <div class="form-group ">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Email" >
                      <span class="input-group-text"><i class="ti-email"></i></span>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <a href="javascript:void(0)" class="btn btn-solid btn-sm">Abone Ol</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="subfooter dark-footer ">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-8 col-sm-12">
          <div class="footer-left">
            <p style="text-transform:none">Tüm hakları saklıdır.www.popyohobi.com</p>
          </div>
        </div>
        <div class="col-xl-6 col-md-4 col-sm-12">
          <div class="footer-right">
            <ul class="sosyal">
              <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->

<!--Newsletter modal popup start
<div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="news-latter">
          <div class="modal-bg">
            <div class="newslatter-main">
              <div class="offer-content">
              <div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2>newsletter</h2>
                <p>Subscribe to our website mailling list <br> and get a Offer, Just for you!</p>
                <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                  <div class="form-group mx-sm-3">
                    <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                    <button type="submit" class="btn btn-theme btn-normal btn-sm " id="mc-submit">subscribe</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="imd-wrraper">
                <img src="/backend/assets/images/subscribe/1.jpg" alt="newsletterimg" class="img-fluid bg-img">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
Newsletter Modal popup end-->



<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart top ">
  <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>my cart</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeCart()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div id="cart_details" class="cart_media">
      <ul class="cart_product">
      <!--  <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="/backend/assets/images/layout-2/product/1.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>redmi not 3</h4>
              </a>
              <h6> $80.00 <span>$120.00</span>  </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>!-->

      </ul>
      <ul class="cart_total">
        <li>subtotal : <span>$1050.00</span> </li>
          <li>shpping <span>free</span> </li>
        <li>taxes <span>$0.00</span></li>
        <li> <div class="total">total<span>$1050.00</span> </div></li>
        <li> <div class="buttons">
            <a href="cart.html" class="btn btn-solid btn-sm">Sepet</a>
            <a href="checkout.html" class="btn btn-solid btn-sm ">Devam Et</a>
          </div> </li>
      </ul>
    </div>
  </div>
</div>
<!-- Add to cart bar end-->


<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
  <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>Hesabım</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeAccount()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <form action="{{route('frontend.login')}}" class="theme-form" method="post">
        @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input name="customer_email" type="text" class="form-control" id="email" placeholder="Email Adresiniz" required="">
      </div>
      <div class="form-group">
        <label for="review">Şifre</label>
        <input name="customer_password" type="password" class="form-control" id="review" placeholder="Şifreniz" required="">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-solid btn-md btn-block ">Giriş Yap</button>
      </div>
      <div class="accout-fwd">
        <a href="forget-pwd.html" class="d-block"><h5>Şifrenizi unuttunuz mu?</h5></a>
       <h6 class="mt-5" >Kayıtlı değilseniz sisteme giriş yapabilmek için öncelikle kayıt olmanız gerekmektedir.?
       </h6>
          <br>
          <div class="form-group">
              <a href="{{route('frontend.register')}}" class="btn btn-success btn-md btn-block ">Kayıt Ol</a>
          </div>
      </div>
    </form>
  </div>
</div>
<!-- Add to account bar end-->


<!-- cookie bar start -->
<div class="cookie-bar">
  <p>We use cookies to improve our site and your shopping experience. By continuing to browse our site you accept our cookie policy.</p>
  <a href="javascript:void(0)" class="btn btn-solid btn-xs">Onayla</a>
  <a href="javascript:void(0)" class="btn btn-solid btn-xs">İptal</a>
</div>
<!-- cookie bar end -->

<!-- notification product
<div class="product-notification" id="dismiss">
  <span  onclick="dismiss();" class="btn-close" aria-hidden="true"></span>
  <div class="media">
    <img class="me-2" src="/backend/assets/images/layout-1/product/5.jpg" alt="Generic placeholder image">
    <div class="media-body">
      <h5 class="mt-0 mb-1">Latest trending</h5>
Cras sit amet nibh libero, in gravida nulla.
    </div>
  </div>
</div>
notification product -->
>
<!-- latest jquery-->

<!-- slick js-->
<script src="/backend/assets/js/slick.js"></script>

<!-- popper js-->
<script src="/backend/assets/js/popper.min.js" ></script>
<script src="/backend/assets/js/bootstrap-notify.min.js"></script>

<!-- menu js-->
<script src="/backend/assets/js/menu.js"></script>

<!-- timer js -->
<script src="/backend/assets/js/timer2.js"></script>

<!-- Bootstrap js-->
<script src="/backend/assets/js/bootstrap.js"></script>

<!-- tool tip js -->
<script src="/backend/assets/js/tippy-popper.min.js"></script>
<script src="/backend/assets/js/tippy-bundle.iife.min.js"></script>

<!-- father icon -->
<script src="/backend/assets/js/feather.min.js"></script>
<script src="/backend/assets/js/feather-icon.js"></script>

<!-- Theme js-->
<script src="/backend/assets/js/modal.js"></script>
<script src="/backend/assets/js/script.js"></script>

@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.error('{{session('error')}}')</script>
    @endif

@foreach($errors->all() as $error)
    <script>
        alertify.error('{{$error}}');
    </script>
    @endforeach

    </body>

</html
