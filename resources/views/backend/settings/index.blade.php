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
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">

                <div class="card-body vendor-table">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Açıklama</th>
                            <th>İçerik</th>
                            <th>Anahtar Değer</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $item)
                        <tr id="{{$item->id}}">
                            <td>{{$item->settings_description}}</td>
                            <td>{{$item->settings_value}}</td>
                            <td>{{$item->settings_key}}</td>
                            <td>
                                <div>
                                    <i class="fa fa-edit me-2 font-success"></i>
                                    <i class="fa fa-trash font-danger"></i>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
@endsection
