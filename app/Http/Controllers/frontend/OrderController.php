<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {   $checkouts=Checkout::all();
        return view('backend.orders.index',compact('checkouts'));
    }

    public function detail($order_code)
    {     $checkouts=Checkout::where('order_code',$order_code)->first(); 
          $orders=Orders::where('order_code',$order_code)->first();
          $products = DB::table('orders')  // 'orders' tablosunu sorguluyoruz
            ->join('products', 'orders.product_id', '=', 'products.id') 
             ->where('order_code',$order_code)
            ->get();  // Tüm kolonları alıyoru
        return view('backend.orders.detail',compact('orders','products','checkouts'));
    }

    public function create(Request $request){
    $orders=OrderController::create([
     'product_id'=>$request->product_id,
     'product_quantity'=>$request->product_quantity,
     'product_price'=>$request->product_price,
     'order_code'
    ]);
}
    public function status(Request $request)
{
    // Sipariş durumunu ve orderId'yi kontrol et
$request->validate([
    'orderId' => 'required|exists:checkouts,id', // orderId'nin mevcut olduğundan emin ol
    'order_status' => 'required|string' // order_status string olmalı
]);

// Veritabanı işlemi
$order = Checkout::find($request->orderId);
if (!$order) {
    return response()->json(['error' => 'Sipariş bulunamadı.'], 404);
}

$order->order_status = $request->order_status;
$order->save();

return redirect(route('order.index'))->with('success', 'Sipariş durumu başarıyla güncellendi.');

}

    }

