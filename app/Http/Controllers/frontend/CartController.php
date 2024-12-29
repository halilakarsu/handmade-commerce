


<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products; //

class CartController extends Controller
{
public function addCart(Request $request)
{
// Laravel session kullanımı
$cart = session()->get('shopping_cart', []);

if ($request->has('action') && $request->input('action') == 'add') {
$productId = $request->input('product_id');
$productName = $request->input('product_name');
$productImage = $request->input('product_image');
$productQuantity = $request->input('product_quantity');

// Sepet kontrolü, ürün zaten varsa, miktarı arttır
$isAvailable = false;

foreach ($cart as $key => $value) {
if ($value['product_id'] == $productId) {
// Ürün zaten sepette, miktarı artır
$cart[$key]['product_quantity'] += $productQuantity;
$isAvailable = true;
break;
}
}

// Ürün sepette değilse, yeni bir ürün ekle
if (!$isAvailable) {
$cart[] = [
'product_id' => $productId,
'product_name' => $productName,
'product_image' => $productImage,
'product_quantity' => $productQuantity,
];
}

// Sepeti session'a kaydet
session()->put('shopping_cart', $cart);
}

return response()->json([
'message' => 'Product added to cart successfully',
'cart' => $cart,
]);
}
}
