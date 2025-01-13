<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Products;
use function Pest\Laravel\json;

class CartController extends Controller
        {

    public function cart()
    {     $categories = Categories::with('types')->get();
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data=json_decode($cookie_data,true);
        return view('frontend.home.cart',compact('cart_data','categories'));
    }

    public function addtocart(Request $request)
            {

                $prod_id = $request->input('product_id');
                $quantity = $request->input('quantity');
                if(Cookie::get('shopping_cart'))
                {
                    $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                    $cart_data = json_decode($cookie_data, true);
                }
                else
                {
                    $cart_data = array();
                }

                $item_id_list = array_column($cart_data, 'item_id');
                $prod_id_is_there = $prod_id;
                if(in_array($prod_id_is_there, $item_id_list))
                {
                    foreach($cart_data as $keys => $values)                    {
                        if($cart_data[$keys]["item_id"] == $prod_id)
                        {
                            $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                            return response()->json(['status'=>'Bu ürün zaten daha önce sepetinize eklenmiş','status2'=>'2']);
                        }
                    }
                } else  {
                    $products = Products::find($prod_id);
                    $prod_name = $products->product_title;
                    $prod_image = $products->product_file;
                    $priceval = $products->product_price;
                    $pridisc = $products->product_discount;
                    if($products)
                    {
                        $item_array = array(
                            'item_id' => $prod_id,
                            'item_name' => $prod_name,
                            'item_quantity' => $quantity,
                            'item_price' => $priceval,
                            'item_image' => $prod_image,
                            'item_disc' => $pridisc
                        );
                        $cart_data[] = $item_array;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$prod_name.'" adlı ürün sepetinize eklendi.']);
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


}
