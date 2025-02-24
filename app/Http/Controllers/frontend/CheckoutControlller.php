<?php

namespace App\Http\Controllers\frontend;
use App\Models\Categories;
use App\Models\Checkout;
use App\Models\Orders;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Types;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use DB;
class CheckoutControlller extends Controller
{
      public function index(){
         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data=json_decode($cookie_data,true);
         $types=Types::all();
         $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
      return view('frontend.home.checkout',compact('banners','categories','types','cart_data'));
    }
      public function success(){
         $types=Types::all();
         $banners=Banners::all()->sortBy('banner_title');
        $categories = Categories::with('types')->get();
          // Siparişi başarılı şekilde kaydedip, veritabanından alıyoruz
    $order_code=session('order_code');
    $orders = Checkout::where('order_code', $order_code)->first();
    $products=Orders::where('order_code',$order_code)->get();
      return view('frontend.account.success',compact('banners','categories','types','orders','products'));
    }

function generateOrderNumber($id) {
    // Geçerli yılı al, yılın son iki hanesini al
    $year = date('y'); // Örnek: 25 (2025 yılının son iki hanesi)
    $month = date('m'); // Örnek: 02 (Şubat ayı)
    $day = date('d');   // Örnek: 16 (Bugünün günü)
    // Sipariş numarasını oluştur: YılAyGün-ID/ id 3 basamağa tamamlıyorum.

}

public function saveOrder(Request $request)
{
    // Son ID'yi alıyoruz (max ile en son eklenen ID'yi alıyoruz)
    $lastOrderId = DB::table('checkouts')->max('id');  // Burada `checkouts` tablonuzun ismini kullanmalısınız.

    // Son ID'nin bir fazlasını alıyoruz
    $id = $lastOrderId + 1;

    // Sipariş numarasını oluşturuyoruz.yilin son rakami ay ve gün id+1 alıyoruz
    $order_code = $year_last_digit = substr(date('y'), -1).date('m').date('d').str_pad($id, 3, '0', STR_PAD_LEFT);

    // Doğrulama işlemleri
    $request->validate([
        'order_name' => 'required|string|max:255',
        'order_lastname' => 'required|string|max:255',
        'order_email' => 'required|email',
        'order_phone' => 'required|numeric',
        'order_il' => 'required|string|max:255',
        'order_ilce' => 'required|string|max:255',
        'order_adres' => 'required|string',
        'order_cargo' => 'required|string|max:255',
        'order_type' => 'required|string|max:255',
    ]);
       $cart_data = $request->input('cart_data');  // Formdan gelen veri
         session(['order_code' => $order_code]);
        // Siparişi oluşturmak (toplam fiyatı hesapla)
        $total_price = 0;
        $order_price = 0;
        $dor_price=25;
        $cargo_price=95;
          if($request->input('order_type')=="Kapıda Ödeme"){
              $cargo_price=$request->input('cargo_price')+$dor_price;  
            }else {
                $cargo_price = $request->input('cargo_price'); 
            }
             foreach ($cart_data as $data) {
          
          $order_price+= $data['item_price'] * $data['item_quantity'];
        }
        $total_price=$order_price+$cargo_price;

    // Checkout modelini kullanarak veriyi kaydetme
        $order = Checkout::create([
        'order_name' => $request->order_name,
        'order_lastname' => $request->order_lastname,
        'order_email' => $request->order_email,
        'order_phone' => $request->order_phone,
        'order_il' => $request->order_il,
        'order_ilce' => $request->order_ilce,
        'order_adres' => $request->order_adres,
        'order_cargo' => $request->order_cargo,
        'order_type' => $request->order_type,
        'order_code' => $order_code,
        'order_price' =>$order_price,
        'cargo_price' =>$cargo_price,
        'total_price'=>$total_price
    ]);

    // Sipariş numarasını session'a kaydediyoruz
      foreach($cart_data as $data)
    $products = Orders::create([
        'product_id' => $data['item_id'],
        'product_title' => $data['item_name'],
        'product_quantity' => $data['item_quantity'],
        'product_price' => $data['item_price'],
        'order_code' => $order_code
      ]);
    // Sipariş başarılıysa
    if ($order && $products) {
       session()->forget('cart_data');
       Cookie::queue('cart_data', '', -1); // Çerezi geçersiz kı
        // Başarıyla yönlendirme ve sipariş bilgilerini success sayfasına taşıma
        return redirect(route('order.success'))->with('success', 'Siparişiniz alındı');
    } else {  
        // Bir hata oluştuysa geri dön
        return back()->with('error', 'Sistemde bir sorun oluştu');
    }
}



}
