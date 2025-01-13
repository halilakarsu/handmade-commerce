@extends('frontend.layouts.index')
@section('title','popyohobi.com | Hakkımızda')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>{{ $pages->page_title}}</h2>
                        <ul>
                            <li><a href="/">Anasayfa</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">{!! $pages->page_title!!}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- about section start -->
<section class=" section-big-py-space">
    <div class="custom-container">
        <div class="row">

                <small>{!! $pages->page_description!!}</small>
                  </div>

    </div>
</section>
<!-- about section end -->
@endsection
