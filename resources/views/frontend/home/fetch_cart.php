
<?php
$total_quantity = 0;
$total_item = 0;
$main_cart='<table class="table"><tbody>';
$output = '
<div class="mini-cart-product-area ltn__scrollbar">';
if(!empty($_SESSION["shopping_cart"]))
{
    $main_cart.='<thead>

</thead>';
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $product=$db->prepare("select *from products inner join types on products.type_id=types.type_id inner join categories on types.categori_id=categories.categori_id  where products.product_id=?");
        $product->execute(array($values['product_id']));
        $product_get=$product->fetch(PDO::FETCH_ASSOC);
        $total_item = $total_item + 1;
        $total_quantity = $total_quantity + $values["product_quantity"];
        $output .= '

      <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

    <div  class="mini-cart-item clearfix">
    <div class="mini-cart-img">
    <a href="product-details/'.$product_get['product_seflink'].'"><img src="'.$values["product_image"].'" alt="Image"></a>
    <span id="'.$values['product_id'].'" class="mini-cart-item-delete delete"><i class="icon-cancel"></i></span>
    </div>
    <div class="mini-cart-info">
    <h6><a href="product-details/'.$product_get['product_seflink'].'">'.$values["product_name"].'</a></h6>

    </div>

    </div>

 <div style="margin-top:-20px" class="cart-plus-minus mb-3">
    <div id="'.$values['product_id'].'" class=" azalt-cart dec qtybutton">-</div>

    <input id="quantityU'.$values['product_id'].'" min="1" type="number" value="'.max($values["product_quantity"],1).'" name="product-qty" class="cart-plus-minus-box">
    <div  id="'.$values['product_id'].'"  class="update-cart inc qtybutton">+</div>
</div>
    </div>';


        $main_cart .= '
    <tr class="text-center">
        <td  class="cart-product-image">
            <a href="product-details/'.$product_get['product_seflink'].'"><img src="'.$values["product_image"].'" alt="#"></a>

            <h4 class="text-center"><a href="product-details/'.$product_get['product_seflink'].'"><div>'.$values["product_name"].'</div></a></h4>
              <div class="mt-1">
               <a href="javascript:void(0)" id="'.$values['product_id'].'" class="delete text-danger">Remove</a>
            </div>
        </td>
        <td  class="cart-product-quantity ">



<div class="cart-plus-minus">
    <div id="'.$values['product_id'].'" class=" azalt-cart dec qtybutton">-</div>
    <!-- Minimum değeri 1 olarak ayarla (min="1" yerine min="2" idi) -->
    <input id="quantityU'.$values['product_id'].'" min="1" type="number" value="'.$values["product_quantity"].'" name="product-qty" class="cart-plus-minus-box">
    <div  id="'.$values['product_id'].'"  class="update-cart inc qtybutton">+</div>
</div>



        </td>
    </tr>';


    }
    $main_cart.='<tr class="cart-coupon-row">
  <td><td>
    <h5 class="text-success" > You have a total '.$total_item.' items and total '.$total_quantity.' quantity in your cart</h5>
    </td>
    <td>
  <a href="product/'.$product_get['type_seflink'].'"> <button type="submit" class="btn theme-btn-2 btn-effect-2">Go to Shopping</button></a>
  <a href="shopping-checkout"><button type="submit" class="btn theme-btn-1 btn-effect-2 ">Checkout</button></a>
  </td>
  </tr>';
    $output .= '
  <div style="margin-top:100px" class="mini-cart-footer">
  <div class="mini-cart-sub-total text-center">
  <h5 class="text-info" > You have a total '.$total_item.' items in your cart</h5>

  </div>
  <div class="btn-wrapper">
  <a href="shopping-cart" class="theme-btn-1 btn btn-effect-1" >View Cart</a>
  <a href="shopping-checkout " class="theme-btn-2 btn btn-effect-2">Checkout</a>
  </div>

  </div>	';
}
else
{  $output ='<div class="alert alert-danger text-light"><h5 class="text-danger" > Sorry your cart is empty</h5> <br><a class="btn btn-success" href="product/categori/fruit">--->Go to Shopping</a></div>'
;
    $main_cart.='<div class="alert alert-danger text-light"><h5 class="text-success" > Sorry your cart is empty <a class=" btn btn-danger"  href="product/categori/fruit">--->Go to Shopping</a></h5></div>';
}
$main_cart.='</tr></tbody></table>';
$output .= '</div>';
$data = array(
    'cart_details'		=>	$output,
    'main_cart'		=>	$main_cart,
    'total_item' =>$total_item,
    'total_quantity' =>$total_quantity,
);

echo json_encode($data);


?>
