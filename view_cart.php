<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

session_start();

include_once("config.php");

    if(isset($_SESSION["products"]))

    {

        $total = 0;

        echo '<form method="post" action="PAYMENT-GATEWAY">';

        echo '<ul>';

        $cart_items = 0;

        foreach ($_SESSION["products"] as $cart_itm)

        {

           $product_code = $cart_itm["code"];

           $results = $mysqli->query("SELECT ten_sp,mo_ta, gia,anh FROM sanpham WHERE ma_sp='$product_code' LIMIT 1");

           $obj = $results->fetch_object();

            

            echo '<li class="cart-itm">';



            echo '<div class="p-price">'.$currency.$obj->gia.'</div>';
            

            echo "<b>Hình ảnh : </b> <img src=".$obj->anh." /><br>";
            
            echo '<div class="product-info">';

            echo '<h3>'.$obj->ten_sp.' (Code :'.$product_code.')</h3> ';

            echo '<div class="p-qty">Số Lượng: '.$cart_itm["qty"].'</div>';

            echo '<div>'.$obj->mo_ta.'</div>';

            echo '</div>';

            echo '</li>';

            $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);

            $total = ($total + $subtotal);



            echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->ten_sp.'" />';

            echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';

            echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->mo_ta.'" />';

            echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';

            $cart_items ++;

            

        }

        echo '</ul>';

        echo '<span class="check-out-txt">';

        echo '<strong>Total : '.$currency.$total.'</strong>  ';

        echo '</span>';

        echo '</form>';

        

    }else{

        echo 'Your Cart is empty';

    }

?>
</body>
</html>