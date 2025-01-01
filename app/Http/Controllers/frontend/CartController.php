<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Products;


        class CartController extends Controller
        {
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
                            return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                        }
                    }
                } else  {
                    $products = Products::find($prod_id);
                    $prod_name = $products->product_title;
                    $prod_image = $products->product_file;
                    $priceval = $products->product_price;
                    if($products)
                    {
                        $item_array = array(
                            'item_id' => $prod_id,
                            'item_name' => $prod_name,
                            'item_quantity' => $quantity,
                            'item_price' => $priceval,
                            'item_image' => $prod_image
                        );
                        $cart_data[] = $item_array;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                    }
                }


            }


        public function cartloadbyajax()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }

}
