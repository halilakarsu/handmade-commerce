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
                            <h3 style="text-transform:none">Ürün İşlemleri
                              <
                                <small><a href="{{route('backend.home')}}"><-Geri Dön</a>    </small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ürünler</li>
                            <li class="breadcrumb-item">Ürün Ekle</li>
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
                    <a href="{{route('products.create')}}" class="btn btn-success">+ Ekle</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Görsel</th>
                            <th>Ürün Adı</th>
                            <th>Fiyatı</th>
                            <th>Kategori</th>
                            <th>Durum</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($products as $item)

                        <tr id="item-{{$item->id}}">
                              <td  class="sortable">
                                <img width="90px" src="/backend/images/products/{{$item->product_file}}">
                            </td>
                            <td>{{$item->product_title}}</td>
                            <td>{{$item->product_price }}</td>
                            <td>{{$item->types->type_title ?? 'kategori yok' }}</td>
                            <td><div style="margin-left:-40px;margin-top:10px" class="form-check form-switch text-lg-left ">
                                    <label class="custom-switch">
                                        <input data-id="{{$item->id}}" type="checkbox" class="custom-switch-input" {{$item->product_status==1 ? "checked": ""}}>
                                        <span class="custom-switch-slider"></span>
                                    </label>
                                </div></td>
                              <td>
                                <div>
                                    <a href="{{ route('products.edit', $item->id)}}">
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
                        url: "{{ route('products.sortable') }}",
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
                url: 'products/switch/' + itemId,
                data: {sts: switchStatus}
            });
        });
        $(".fa-trash").click(function(){
           delete_id=$(this).attr('id');
           alertify.confirm('Silme İşlemini Onaylayın','Bu işlem bir daha geri alınamaz.',
               function (){
               $.ajax({
                   type:"DELETE",
                   url:"products/"+delete_id,
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
@section('js')
    <script>
    new DataTable('#example');  </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>

@endsection
