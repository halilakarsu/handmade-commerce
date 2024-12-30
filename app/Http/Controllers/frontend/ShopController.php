<?php
namespace App\Http\Controllers\Frontend; // İlgili namespace
use Illuminate\Http\Request;
use App\Models\Product; // Product modelini doğru kullanmak için

class ShopController extends Controller
{
public function addCart(Request $request)
{
// Laravel session kullanımı
$cart = session()->get('shopping_cart', []);
    dd($cart);
if ($request->has('action') && $request->input('action') == 'add')
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

return response()->json([
'message' => 'Product added to cart successfully',
'cart' => $cart,
]);
}

public function fetch()
{
$total_quantity = 0;
$total_item = 0;
$output = '';  // $output değişkenini başlatmalısınız.

// Sepet varsa
$cart = session()->get('shopping_cart', []);

if (!empty($cart)) {
foreach ($cart as $key => $values) {
// Sepetteki her ürün için $total_item ve $total_quantity hesaplanır.
$total_item++;
$total_quantity += $values['product_quantity'];

$output .= '
<li>
    <div class="media">
        <a href="product-page(left-sidebar).html">
            <img alt="product" class="me-3" src="' . $values['product_image'] . '">
        </a>
        <div class="media-body">
            <a href="product-page(left-sidebar).html">
                <h4>' . $values['product_name'] . '</h4>
            </a>
            <h6> $80.00 <span>$120.00</span> </h6>
            <div class="addit-box">
                <div class="qty-box">
                    <div class="input-group">
                        <button class="qty-minus"></button>
                        <input class="qty-adj form-control" type="number" value="' . $values['product_quantity'] . '"/>
                        <button class="qty-plus"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>';
}

$output .= '
<div style="margin-top:100px" class="mini-cart-footer">
    <div class="mini-cart-sub-total text-center">
        <h5 class="text-info">You have a total ' . $total_item . ' items and ' . $total_quantity . ' quantity in your cart</h5>
    </div>
    <div class="btn-wrapper">
        <a href="shopping-cart" class="theme-btn-1 btn btn-effect-1">View Cart</a>
        <a href="shopping-checkout" class="theme-btn-2 btn btn-effect-2">Checkout</a>
    </div>
</div>';
} else {
$output = '<div class="alert alert-danger text-light"><h5 class="text-danger">Sorry, your cart is empty</h5><br><a class="btn btn-success" href="product/categori/fruit">--->Go to Shopping</a></div>';
}

// JSON olarak cevap döndür
return response()->json([
'cart_details' => $output,
'total_item' => $total_item,
'total_quantity' => $total_quantity
]);
}
}
