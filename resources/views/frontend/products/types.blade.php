@extends('frontend.layouts.index')
@section('title','Kategoriler | Hakkımızda')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                               <ul>
                                <li><a href="/">Anasayfa</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">KATEGORİLER</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

       <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row ">
                 @foreach($typeCategory as $category)  <!-- Loop through categories -->
                 @foreach($category->types->sortBy('type_must') as $type)  <!-- Loop through types of each category -->
                    <div class="col-md-4">
                        <a href="{{ route('frontend.products', ['slug' => $type->type_slug])}}">
                            <div class="collection-banner-main banner-1 p-right">
                                <div class="collection-img mt-2">
                                    <img src="/backend/images/types/{{$type->type_file}}" class="img-fluid bg-img" alt="banner">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endforeach
            </div>
        </div>
    </section>
   <!--collection banner end-->


@endsection

