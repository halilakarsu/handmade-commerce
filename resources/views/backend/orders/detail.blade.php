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
                            <small><a href="{{route('order.index')}}" class="btn btn-danger btn-xs">X Geri</a>
                                 <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter">
                                Durum Seç
                                </button></small>
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
                     <table class="table">
                               <tr  class="bg-dark">
                                <td><b>Sipariş Kodu:</b>{{ $orders->order_code }}</td>
                                <td><b>Müşteri Adı Soyadı:</b>{{ $checkouts->order_name." ".$checkouts->order_lastname }}</td>
                                <td colspan="2"><b>Sipariş Tarihi ve Saati:</b>{{ date("d.m.Y - H:i:s", strtotime($orders->created_at)) }}</td>
                                <tr>
                                      <tr class="bg-dark">
                                <td><b>Ödeme Tipi:</b>{{ $checkouts->order_type }}</td>
                                <td><b>Kargo:</b>{{ $checkouts->order_cargo}}</td>
                                <td><b>İl/İlçe:</b>{{ $checkouts->order_il."/".$checkouts->order_ilce }}</td>
                                  <td><b>Tutar:</b>{{ $checkouts->order_price}} ₺</td>
                               </tr>
                             <!-- Button trigger modal -->
                       

                               
                           </table>
                    <table class="table table-striped">
                         
                        <tbody id="sortable">
                       @foreach($products    as $product)
                    <tr>
                    <td colspan="2"><img width="100px" src="/backend/images/products/{{ $product->product_file }}"><br>
                    {{ $product->product_title }}</td>  
                    <td colspan="2"> {{ $product->product_quantity }}x 
                    {{ $product->product_price }}₺=
                    {{ $product->product_price*$product->product_quantity  }}₺</td> 
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-danger">
                            <td colspan="3">
                        <td class="bg-danger"><b>Toplam:</b>{{ $checkouts->order_price}} ₺</td>
                    </td>
                </tr></tfoot>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- Button trigger modal -->



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
           <input type="hidden" name="orderId" value="{{$checkouts->id}}" id="orderIdInput">
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

<!-- Bootstrap JS ve jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<!-- Özel Stil ve Animasyonlar -->
<style>
  .modal.fade .modal-dialog {
    transform: translate(0, -50%);
    opacity: 0;
    transition: all 0.3s ease-in-out;
  }

  .modal.fade.show .modal-dialog {
    transform: translate(0, 0);
    opacity: 1;
  }

  .btn-primary:hover, .btn-success:hover, .btn-secondary:hover {
    transform: translateY(-3px);
    transition: all 0.2s ease-in-out;
  }

  .btn-primary {
    background: linear-gradient(135deg, #00bcd4, #3f51b5);
    border: none;
  }

  .btn-success {
    background: linear-gradient(135deg, #4caf50, #8bc34a);
    border: none;
  }

  .btn-secondary {
    background: #9e9e9e;
    border: none;
  }
</style>


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

