<div class="shopping-cart">

<h2>Sản phẩm có trong giỏ</h2>

<?php

if(isset($_SESSION["products"]))

{

    $total = 0;

    echo '<ol>';

    foreach ($_SESSION["products"] as $cart_itm)

    {

        echo '<li class="cart-itm">';

        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';

        echo '<h3>'.$cart_itm["name"].'</h3>';

        echo '<div class="p-code">mã sp : '.$cart_itm["code"].'</div>';

        echo '<div class="p-qty">số lượng : '.$cart_itm["qty"].'</div>';

        echo '<div class="p-price">giá :'.$currency.$cart_itm["price"].'</div>';

        echo '</li>';

        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);

        $total = ($total + $subtotal);

    }

    echo '</ol>';

    echo '<span class="check-out-txt"><strong>Tổng : '.$currency.$total.'</strong><br> <a href="view_cart.php">Chuyển qua thanh toán!</a></span>';
echo '<br>';
    echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">xóa sản phẩm khỏi giỏ</a></span>';

}else{

    echo 'Your Cart is empty';

}

?>

</div>