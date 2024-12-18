@extends('backend.layouts.index')'
@section('title','Ayarlar Sayfası')
@section('content')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Sİte Ayarları
                                <small>Genel Ayarlar</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ayarlar</li>
                            <li class="breadcrumb-item active">Genel Ayarlar</li>
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
                        <a href="{{route('settings.index')}}" type="submit"  class="btn btn-dark btn-xs col-md-1 "><-Geri Dön</a>
                        <div class="card-body">
                            <form action="{{route('settings.update',['id'=>$editSettings->id])}}" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    @csrf
                                    <div class="col-xl-3 col-md-4 ">
                                        <label><b>{{ucwords($editSettings->settings_description)}}</b></label>
                                    </div>
                                    @if($editSettings->settings_type=='file')
                                    <div class="col-md-8">
                                        <input class="form-control" name="settings_value" type="file" required="">
                                    </div>
                                    @endif
                                    @if($editSettings->settings_type=='text')
                                        <div class="col-md-8">
                                            <input class="form-control"  name="settings_value" type="text" required="" value="{{$editSettings->settings_value}}">
                                        </div>
                                    @endif
                                    @if($editSettings->settings_type=='textarea')
                                        <div class="col-md-8">
                                      <textarea required id="editor1" name="settings_value" cols="10" rows="4">{{$editSettings->settings_value}}</textarea>
                                        </div>
                                    @endif
                                </div>

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
