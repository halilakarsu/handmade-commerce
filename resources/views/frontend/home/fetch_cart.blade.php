
<?php
$total_quantity = 0;
$total_item = 0;
if(!empty($_SESSION["shopping_cart"]))
{
    @foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
    $output .= '
  <li>
   <div class="media">
     <a href="product-page(left-sidebar).html">
       <img alt="megastore1" class="me-3" src="/backend/assets/images/layout-2/product/1.jpg">
     </a>
     <div class="media-body">
       <a href="product-page(left-sidebar).html">
         <h4>redmi not 3</h4>
       </a>
       <h6> $80.00 <span>$120.00</span>  </h6>
       <div class="addit-box">
         <div class="qty-box">
           <div class="input-group">
             <button class="qty-minus"></button>
             <input class="qty-adj form-control" type="number" value="1"/>
             <button class="qty-plus"></button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </li>';
  @endforeach

    $output .= '
  <div style="margin-top:100px" class="mini-cart-footer">
  <div class="mini-cart-sub-total text-center">
  <h5 class="text-info" > You have a total '.$total_item.' items in your cart</h5>

  </div>
  <div class="btn-wrapper">
  <a href="shopping-cart" class="theme-btn-1 btn btn-effect-1" >View Cart</a>
  <a href="shopping-checkout " class="theme-btn-2 btn btn-effect-2">Checkout</a>
  </div>

  </div>';
}
else
{  $output ='<div class="alert alert-danger text-light"><h5 class="text-danger" > Sorry your cart is empty</h5> <br><a class="btn btn-success" href="product/categori/fruit">--->Go to Shopping</a></div>';

}


     $data = array('cart_details'=>	$output);

echo json_encode($data);


?>
