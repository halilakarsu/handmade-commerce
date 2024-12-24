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
                            <h3 style="text-transform:none">Sayfa İşlemleri </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Sayfalar</li>

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
                    <a href="{{route('pages.create')}}" class="btn btn-success">+ Ekle</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Görsel</th>
                            <th>Sayfa</th>
                            <th>Durum</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($pages as $item)
                        <tr id="item-{{$item->id}}">
                              <td  class="sortable">
                                <img width="90px" src="/backend/images/pages/{{$item->page_file}}">
                            </td>
                            <td>{{$item->type_title}}</td>
                            <td>{{$item->categories->page_title }}</td>
                              <td>
                                <div>
                                    <a href="{{ route('pages.edit', $item->id)}}">
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
                        url: "{{ route('pages.sortable') }}",
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
               $.ajax({
                   type:"DELETE",
                   url:"pages/"+delete_id,
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

