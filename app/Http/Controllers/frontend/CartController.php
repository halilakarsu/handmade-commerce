<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\backend\BannersController;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Products;
use App\Models\Types;
use function Pest\Laravel\json;

class CartController extends Controller
        {

    public function cart() {
        $types =Types::all();
        $banners =Banners::all();
        $categories = Categories::with('types')->get();
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data=json_decode($cookie_data,true);
        return view('frontend.home.cart',compact('cart_data','categories','types','banners'));
    }

    public function addtocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Sepette daha önce eklenmiş ürünleri al
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = [];
        }

        // Sepetteki ürünlerin ID'lerini al
        $item_id_list = array_column($cart_data, 'item_id');

        // Eğer ürün zaten sepette varsa
        if (in_array($prod_id, $item_id_list)) {
            // Sepetteki ürünü bul ve miktarını arttır
            foreach ($cart_data as $key => $value) {
                if ($cart_data[$key]['item_id'] == $prod_id) {
                    // Sepetteki ürünün mevcut miktarını al ve yeni miktarı ekle
                    $cart_data[$key]['item_quantity'] += $quantity; // Var olan miktarı arttır
                    // Sepet verisini güncelle
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => '"' . $cart_data[$key]['item_name'] . '" adlı ürün miktarınız arttırıldı.']);
                }
            }
        } else {
            // Ürün sepette yoksa, yeni bir ürün ekle
            $product = Products::find($prod_id);

            if ($product) {
                $prod_name = $product->product_title;
                $prod_image = $product->product_file;
                $priceval = $product->product_price;
                $pridisc = $product->product_discount;
                $slug = $product->product_slug;

                $item_array = [
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'item_disc' => $pridisc,
                    'item_slug' => $slug
                ];

                // Yeni ürünü sepete ekle
                $cart_data[] = $item_array;
                $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => '"' . $prod_name . '" adlı ürün sepetinize eklendi.']);
            }
        }
    }

public function updatetocart(Request $request)
{
    $prod_id = $request->input('product_id');
    $quantity = $request->input('quantity');
    $price = $request->input('price');
    $total = $request->input('total');

    if (Cookie::get('shopping_cart')) {
        $cookie_data = Cookie::get('shopping_cart');
        $cart_data = json_decode($cookie_data, true);
        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    $cart_data[$keys]["item_quantity"] = $quantity;
                    $cart_data[$keys]["item_price"] = $price;
                    
                    // JSON_UNESCAPED_UNICODE ile Türkçe karakterlerin doğru şekilde saklanmasını sağlar
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);

                    $minutes = 60 * 24 * 15;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                    return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" miktarı güncellendi.']);
                }
            }
        }
    }
}



    public function cartloadbyajax()
    {
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            $products = [];
            foreach ($cart_data as $item) {
                $product = Products::find($item['item_id']);
                $products[] = [
                    'product_name' => $product->product_title,
                    'product_image' => $product->product_file,
                    'product_quantity' => $item['item_quantity']
                ];
            }

            echo json_encode([
                'totalcart' => $totalcart,
                'products' => $products
            ]);
            die;
        } else {
            echo json_encode([
                'totalcart' => "0",
                'products' => []
            ]);
            die;
        }
    }
    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'Ürün sepetten çıkarıldı.']);
                }
            }
        }
    }


}
