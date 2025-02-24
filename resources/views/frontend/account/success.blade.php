@extends('frontend.layouts.index')
@section('title','Ürünler | Hobi Sitesi | popyohobi.com ')
@section('content')
@php($total=0)

<!-- thank-you section start -->
<section class="section-big-py-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>Teşekkürler</h2><br>
                    <p>Siparişiniz alındı.En kısa zamanda adresinize gönderilecektir.</p><br>
                    <p>Sipariş Kodu:<strong>{{ $orders->order_code }}</strong></p>
                     @if($orders->order_type=="Havale ile Ödeme")
                      <p><b>Lütfen Sipariş Kodunu Açıklama Kısmına Yazınız.<b></p>
                     @endif
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- order-detail section start -->
<section class="section-big-py-space mt--5 b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-order">
                    <h3>SİPARİŞ DETAYLARI</h3>
                     @foreach($products as $data)
                     @php($total=$total+$data->product_quantity*$data->product_price)
                    <div class="row product-order-detail">
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>Ürün Adı:</h4>
                                    <h5>{{$data->product_title}}</h5></div>
                            </div>
                            <div class="col-2 order_detail">
                                <div>
                                    <h4>Adet:</h4>
                                    <h5>{{$data->product_quantity}}</h5></div>
                            </div>
                            <div class="col-1 order_detail">
                                <div>
                                    <h4>Fiyat:</h4>
                                    <h5>{{$data->product_price}}</h5></div>
                            </div>
                            <div class="col-1 order_detail">
                                <div>
                                    <h4>Tutar:</h4>
                                    <h5>{{$data->product_price*$data->product_quantity}}</h5></div>
                            </div>
                        </div>
                        @endforeach
                    <div class="total-sec">
                        <ul>
                            <li>Toplam <span>{{$orders->total_price}} ₺</span></li>
                            <li>Kargo <span>{{$orders->cargo_price}}₺</span></li>
                          
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>Ödenecek Tutar <span>{{$orders->order_price}}₺</span></h3></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>Sipariş Özeti</h4>
                        <ul class="order-detail">
                            <li>Sipariş No:{{ session('order_code') }}</li>
                            <li>Sipariş Tarihi: {{ date('d.m.Y', strtotime($orders->created_at)) }}</li>
                            <li>Sipariş Tutarı:{{$total+$data->cargo_price}} ₺</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>Teslimat Adresi</h4>
                        <ul class="order-detail">
                            <li>{{$orders->order_adres}}</li>
                            <li>{{$orders->order_ilce}}.</li>
                            <li>{{$orders->order_il}}</li>
                            <li>{{$orders->order_phone}}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>Ödeme Tipi:</h4>
                        <p>{{ $orders->order_type }}</p>
                    </div>
                    <div class="col-md-12">
                        <div class="delivery-sec">
                            <h3>Sipariş Tarihi</h3>
                          <h2>{{ date('d.m.Y', strtotime($orders->created_at)) }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection