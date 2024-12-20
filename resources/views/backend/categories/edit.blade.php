@extends('backend.layouts.index')'
@section('title','Kategoriler')
@section('content')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Ürün İşlemleri
                                <small>Kategori Ayarları</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ürün İşlemleri</li>
                            <li class="breadcrumb-item active">Kategoriler</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <a href="{{route('categories.index')}}" type="submit"  class="btn btn-dark btn-xs col-md-1 "><-Geri Dön</a>
                        <div class="card-body">
                            <form action="{{route('categories.update',['id'=>$editCategori->id])}}" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    @csrf


                                        <div class="col-md-12">
                                         <img width="150px" src="/backend/images/categories/{{$editCategories->categori_value}}">
                                        </div>
                                    <div class="col-xl-3 col-md-4 ">
                                        <label><b>Kategori Adı</b></label>
                                    </div>
                                    <div class="col-md-8 mt-3">
                                        <input class="form-control" name="categori_value" type="file" required="">
                                    </div>
                                </div>
                                <input name="oldFile" type="hidden" value="{{$editCategories->categori_value}}">
                                <button type="submit"  class="btn btn-primary d-block">Güncelle</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@section('js')
    <script src="/backend/assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/styles.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/ckeditor.custom.js"></script>
@endsection
