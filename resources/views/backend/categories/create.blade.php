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
                                <small><a href="{{route('categories.index')}}"><- Geri Dön</a></small>
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
                        <div class="card-body">
                            <a href="{{route('categories.index')}}" type="submit"  class="btn btn-dark btn-xs col-md-1 "><-Geri Dön</a>
                            <div class="row product-adding">

                                <div class="col-xl-8">
                                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form">
                                            <div class="form-group mb-3  row">
                                                <div class="col-xl-3 col-sm-4 mb-0">
                                                    <label for="validationCustom01" >Kategori Adı :</label>
                                                </div>
                                                <div class="col-xl-8 col-sm-7">
                                                    <input  class="form-control"
                                                            placeholder="Lütfen kategori adı giriniz." name="categori_title"  type="text" required="">
                                                </div>
                                            </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Kategori Seo Link :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input  class="form-control"
                                                        placeholder="Lütfen seo link giriniz." name="categori_slug"  type="text" required="">
                                            </div>
                                        </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-xl-3 col-sm-4 mb-0">
                                                    <label for="validationCustom02" >Açıklama :</label>
                                                </div>
                                                <div class="col-xl-8 col-sm-7">
                                          <input  class="form-control"    placeholder="Lütfen açıklama giriniz." name="categori_description"  type="text" required="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="offset-xl-3 offset-sm-4">
                                            <button type="submit" class="btn btn-primary">Ekle</button>
                                            <a href="{{route('categories.index')}}"  type="button" class="btn btn-light">Vazgeç</a>
                                        </div>


                                <div style="height:380px" class="col-xl-4">
                                    <div class="add-product ">
                                        <div class="row">
                                            <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                             <h5>Görsel Yükle</h5><br>
                                            <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                <ul class="file-upload-product">
                                                    <li><div class="box-input-file">
                                                  <input name="categori_file" required class="upload" type="file"><i class="fa fa-upload"></i></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                            </form>
                                    </div>
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
