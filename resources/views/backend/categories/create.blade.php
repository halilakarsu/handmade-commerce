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
                            <h3 style="text-transform:none">Kategoriler
                                <small><a href="{{route('categories.index')}}"><- Geri Dön</a></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Kategori İşlemleri</li>
                            <li class="breadcrumb-item active">Kategori Ekle</li>
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
                    <div class="card-body">
                        <div class="row product-adding">
                            <div class="col-xl-5">
                                <div class="add-product">
                                    <div class="row">
                                        <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                            <h5>Görsel Yükle</h5>
                                        </div>
                                        <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <hr>
                                            <br>
                                            <div class="col-xl-3 xl-50 col-sm-6 col-3 text-center">
                                                <input   class="form-control btn btn-primary col-3" required name="categori_file" type="file">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">

                                <div class="form">

                                    <div class="form-group mb-3  row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustom01" >Kategori :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control" placeholder="Lütfen kategori adı giriniz." id="validationCustom01" type="text" name="categori_title"  value="" required="">

                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="validationCustom02" >Seo Link :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <input name="categori_slug" placeholder="Lütfen seo link giriniz."  class="form-control " id="validationCustom02" type="text" required="">

                                        </div>
                                    </div>

                                </div>
                                <div class="form">
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-sm-4 mb-0">
                                            <label for="exampleFormControlSelect1" >Durum :</label>
                                        </div>
                                        <div class="col-xl-8 col-sm-7">
                                            <select class="form-control digits" name="categori_status" id="exampleFormControlSelect1">
                                                <option value="1" >Aktif</option>
                                                <option value="0" >Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input name="oldFile" type="hidden">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4">Açıklama :</label>
                                        <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                            <textarea name="categori_description" id="editor1"  cols="10" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-xl-3 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">Yükle</button>
                                    <a href="{{route('categories.index')}}" type="button" class="btn btn-light">Vazgeç</a>
                                </div>
                                </form>
                            </div>
                        </div>
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
