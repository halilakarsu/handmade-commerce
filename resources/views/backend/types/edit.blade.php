@extends('backend.layouts.index')'
@section('title','Alt Kategori Güncelle')
@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="text-transform:none">Alt Kategori Güncelle
                                <small><a href="{{route('categories.index')}}"><- Geri Dön</a></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Alt Kategoriler</li>
                            <li class="breadcrumb-item active">Güncelle</li>
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
                                            <h5 class="text-center">Yüklü Görsel</h5>
                                            <img src="/backend/images/types/{{$types->type_file}}" alt="image-edit" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                        </div>
                                        <form method="POST" action="{{route('types.update',$types->id)}}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <hr>
                                            <br>
                                            <h5>Görseli Değiştir</h5>
                                            <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                <input class="form-control btn btn-primary col-3" name="type_file" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">

                                    <div class="form">

                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Alt Kategori :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input class="form-control" id="validationCustom01" type="text" name="type_title"  value="{{$types->type_title}}" required="">

                                            </div>
                                        </div>

                                        <div class="form-group mb-3 row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom02" >Seo Link :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input name="type_slug" value="{{$types->type_slug}}" class="form-control " id="validationCustom02" type="text" required="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form">
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="exampleFormControlSelect1" >Kategorisi :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <select class="form-control digits" name="type_categori_id" id="exampleFormControlSelect1">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id==$types->type_categori_id ? "selected" : "" }}>
                                                        {{$category->categori_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="exampleFormControlSelect1" >Durum :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <select class="form-control digits" name="type_status" id="exampleFormControlSelect1">
                                                    <option value="1" {{$types->type_status=="1" ? "selected" : "" }}>Aktif</option>
                                                    <option value="0" {{$types->type_status=="0" ? "selected" : "" }}>Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input name="oldFile" type="hidden" value="{{$types->type_file}}">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-sm-4">Açıklama :</label>
                                            <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                <textarea name="type_description" id="editor1"  cols="10" rows="4">{{$types->type_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-xl-3 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">Güncelle</button>
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


@endsection

@section('js')
    <script src="/backend/assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/styles.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="/backend/assets/js/editor/ckeditor/ckeditor.custom.js"></script>
@endsection
