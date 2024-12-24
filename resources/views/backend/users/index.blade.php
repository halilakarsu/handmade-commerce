@extends('backend.layouts.index')'
@section('title','Alt Kategoriler Sayfası')
@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="text-transform:none">Kullanıcı İşlemleri
                                <small><a href="{{route('users.index')}}" class="btn btn-primary btn-xs">Kullanıcılar</a>
                                    <a href="{{route('users.create')}}" class="btn btn-success btn-xs" > +Ekle</a></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Kullanıcılar </li>
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
                            <th>Görsel</th>
                            <th>Kullanıcı Adı</th>
                            <th>Email</th>
                            <th>Rolü</th>
                            <th>Durum</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($users as $item)
                        <tr id="item-{{$item->id}}">
                              <td  class="sortable">
                                <img width="90px" src="/backend/images/users/{{$item->user_file}}">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email }}</td>
                            <td>{{$item->user_role==0 ? "Kullanıcı" : "Admin" }}</td>
                            <td ><div style="margin-left:-40px;margin-top:10px" class="form-check form-switch text-lg-left ">
                                    <label class="custom-switch">
                                        <input data-id="{{$item->id}}" type="checkbox" class="custom-switch-input" {{$item->user_status==1 ? "checked": ""}}>
                                        <span class="custom-switch-slider"></span>
                                    </label>
                                </div></td>
                              <td>
                                <div>
                                    <a href="{{ route('users.edit', $item->id)}}">
                                    <i class="fa fa-edit me-2 font-success"></i></a>
                                     <i id="{{$item->id}}" class="fa fa-trash font-danger"></i>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // AJAX ayarları
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Sortable yapılandırması
            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function(event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{ route('users.sortable') }}",
                        success: function(msg) {
                            if (msg) {
                                alertify.success("Sıralama Değişti");
                            } else {
                                alertify.error("Sıralama Değişmedi.");
                            }
                        }
                    });
                }
            });
            // Seçimleri devre dışı bırak
            $('#sortable').disableSelection();
        });
        $(document).on('click', '.custom-switch-input', function() {
            var itemId = $(this).data('id');
            var switchStatus  = $(this).is(':checked') ? '1' : '0';

            $.ajax({
                type: "POST",
                url: 'users/switch/' + itemId,
                data: {sts: switchStatus}
            });
        });
        $(".fa-trash").click(function(){
           delete_id=$(this).attr('id');
           alertify.confirm('Silme İşlemini Onaylayın','Bu işlem bir daha geri alınamaz.',
               function (){
               $.ajax({
                   type:"DELETE",
                   url:"users/"+delete_id,
                   success:function(msg) {
                       if (msg) {
                           $("#item-"+delete_id).remove();
                           alertify.success("Silme İşlemi Başarılı");
                       } else {
                           alertify.error("Silme İşlemi Başarısız");
                       }
                   }
               });

            },
            function (){
            alertify.error('Silme işlemi iptal edildi')
            });
        });

    </script>


@endsection

