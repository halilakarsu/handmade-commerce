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
                            <h3>Ürün İşlemleri
                                <small>Kategori Ayarları</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Kategoriler</li>
                            <li class="breadcrumb-item active">Kategori Ayarları</li>
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
                            <th>Kategori</th>
                            <th>Durum</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($categories as $item)
                        <tr id="item-{{$item->id}}">
                            <td class="sortable">{{$item->categori_description}}</td>

                            @if($item->categori_type=='file')
                                <td>
                                <img width="30px" src="/backend/images/categories/{{$item->categori_value}}">
                                </td>
                            @else

                            <td>{{$item->categori_value}}</td>
                            @endif
                                   <td>
                                <div>
                                    <a href="{{route('categories.edit',['id'=>$item->id])}}">
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
        <!-- Container-fluid Ends-->
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
                        url: "{{ route('categories.sortable') }}",
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
        $(".fa-trash").click(function(){
           delete_id=$(this).attr('id');
           alertify.confirm('Silme İşlemini Onaylayın','Bu işlem bir daha geri alınamaz.',
               function (){
               location.href="/letmin/kategoriler/delete/"+delete_id;
            },
            function (){
            alertify.error('Silme işlemi iptal edildi')
            });
        });

    </script>


@endsection

