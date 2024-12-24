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
                            <h3>Sİte Ayarları</h3>
                                <small><a href="{{route('home.index')}}"><- Geri Dön</a></small>
                            </h3>                        </div>
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
                            <th></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($settings as $item)
                        <tr id="item-{{$item->id}}">
                            <td class="sortable">{{$item->settings_description}}</td>

                            @if($item->settings_type=='file')
                                <td>
                                <img width="30px" src="/backend/images/settings/{{$item->settings_value}}">
                                </td>
                            @else

                            <td>{{$item->settings_value}}</td>
                            @endif
                                   <td>
                                <div>
                                    <a href="{{route('settings.edit',['id'=>$item->id])}}">
                                    <i class="fa fa-edit me-2 font-success"></i></a>
                                    @if($item->settings_delete)
                                    <i id="{{$item->id}}" class="fa fa-trash font-danger"></i>
                                     @endif
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
                        url: "{{ route('settings.sortable') }}",
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
               location.href="/letmin/ayarlar/delete/"+delete_id;
            },
            function (){
            alertify.error('Silme işlemi iptal edildi')
            });
        });

    </script>


@endsection

