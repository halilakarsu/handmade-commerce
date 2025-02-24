@extends('backend.layouts.index')'
@section('title','Siparişler Sayfası')
@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="text-transform:none">Siparişler
                            <small><a href="{{route('categories.index')}}" class="btn btn-danger btn-xs">X Vazgeç</a>
                                <a href="{{route('categories.create')}}" class="btn btn-success btn-xs" > +Ekle</a></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Siparişler</li>
                            <li class="breadcrumb-item active">Sipariş Ayarları</li>
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
                        <thead class="bg-danger">
                        <tr>
                            <th>Tarih</th>
                            <th>Adı Soyadı</th>
                            <th>Tutar</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                         </tr>
                        </thead>
                        <tbody id="sortable">
                        @foreach($checkouts as $item)
                        <tr id="item-{{$item->id}}">
                              <td width="5%" class="bg-success" class="sortable">
                               {{date("d.m.Y",strtotime($item->created_at))}}
                            </td>
                            <td>{{$item->order_name." ".$item->order_lastname}}</td>
                             <td>{{$item->order_price}}</td>
                             <td>{{$item->order_status}}</td>
                             <td><a href="{{route('order.detail',['order_code'=>$item->order_code])}}" class="btn btn-success btn-xs">Detaylar</a>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                                Durum Seç
                                </button>
                             </td>
                        </tr>
                        <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 15px; box-shadow: 0px 10px 30px rgba(0,0,0,0.1);">
      <div class="modal-header" style="background: linear-gradient(135deg, #00bcd4, #3f51b5); color: white; border-radius: 15px 15px 0 0;">
        <h5 class="modal-title" id="exampleModalCenterTitle">Sipariş Durumunu Seç</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
          <span class="text-dark" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('order.status')}}" method="POST">
        <!-- Select box -->
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="orderStatus">Sipariş Durumu:</label>
          <select name="order_status" class="form-control" id="orderStatus" style="border-radius: 10px; padding: 12px;">
            <option value="Beklemede">Beklemede</option>
            <option value="Kargoya verildi">Kargoya Verildi</option>
            <option value="İptal edildi">İptal Edildi</option>
            <option value="Hazırlanıyor">Hazırlanıyor</option>
          </select>
           <input type="hidden" name="orderId" value="{{$item->id}}" id="orderIdInput">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" style="border-radius: 10px; padding: 10px 20px;">Kapat</button>
        <button  type="submit" class="btn btn-success btn-lg"  style="border-radius: 10px; padding: 10px 20px;">Durumu Kaydet</button>
    </form>
      </div>
    </div>
  </div>
</div>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
  

<!-- Bootstrap JS ve jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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
        $(document).on('click', '.custom-switch-input', function() {
            var itemId = $(this).data('id');
            var switchStatus  = $(this).is(':checked') ? '1' : '0';

            $.ajax({
                type: "POST",
                url: 'categories/switch/' + itemId,
                data: {sts: switchStatus}
            });
        });
        $(".fa-trash").click(function(){
           delete_id=$(this).attr('id');
           alertify.confirm('Silme İşlemini Onaylayın','Bu işlem bir daha geri alınamaz.',
               function (){
               $.ajax({
                   type:"DELETE",
                   url:"categories/"+delete_id,
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

