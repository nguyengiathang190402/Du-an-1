<?php 
session_start();

include_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/for-all.css">
    <link rel="stylesheet" href="./assets/cart.css">
</head>
<body>
<div class="wrapper bg-indigo-50">
    <header>
        <div class="header__top ">
            <span class="pl-72">SeVen Shop</span>
            <span class="time">08:00 - 20:00</span>
            <span class="pl-72">Xuân Phương - Nam Từ Liêm - Hà Nội</span>
        </div>
        <div class="header_main flex justify-between py-8">
            <a href=""><img src="./assets/img/logo 1.svg" alt="" class="logo"></a>
            <form action="search.php"method="get" class="search">
                <input name="search" type="text" class="search__input" placeholder="Tìm kiếm tại đây">
                <button class="btn__search"><i class="fas fa-search"></i></button>
            </form>
            <div class=" auth pr-20">
                <?php if(isset($_SESSION['username'])):?>
                    <a href="">Xin chào : <?= $_SESSION['username']?>,</a>
                    <a href="./log-out.php">Đăng Xuất</a>
                    <?php else: ?>
                    <a href="dang-nhap.php" class="mr-2">Đăng nhập</a>
                    <a href="dang-ky.php" class="mr-2">Đăng ký</a>
                    <?php endif; ?>
                    <a href="gio-hang.php"><i class="fas fa-cart-plus icon"></i></a>
                </div>
        </div>
        <div class="header_bottom py-3">
        <div class="category">
           <!-- <?php foreach ($danh_muc as $dm) : ?>
                <a href=""><?=$dm['ten_loai']?></a>
                    <?php endforeach ?> -->
           </div>
            <nav>
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                    <li><a href="bai-viet.php">Bài viết</a></li>
                    <li><a href="lien-he.php">Liên hệ</a></li>
                   
                </ul>
            </nav>
            
        </div>
    </header>
    <div class="container">
       <table class="table">
          
           <tbody>
           <?php



    if(isset($_SESSION["products"]))

    {

        $total = 0;

        echo '<form method="post" action="">';

        echo '<ul>';

        $cart_items = 0;

        foreach ($_SESSION["products"] as $cart_itm)

        {
            $current_url = base64_encode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
           $product_code = $cart_itm["code"];

           $results = $mysqli->query("SELECT ten_sp, gia,anh,ma_sp FROM sanpham WHERE ma_sp='$product_code' LIMIT 1");

           $obj = $results->fetch_object();

            

            echo '<li class="cart-itm">';



            
            

            echo "<b>Hình ảnh : </b> <img style='width:100px' src=".$obj->anh." /><br>";
            
            echo '<div class="product-info">';

            echo '<h3>'.$obj->ten_sp.' (Mã:'.$product_code.')</h3> ';
            echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
            echo '<div class="p-price">'.$currency.$obj->gia.'</div>';

            echo '<div class="p-qty">Số Lượng: '.$cart_itm["qty"].'</div>';
            echo '<input name="sdt" type="text" placeholder="nhập SDT">
            <input name="dia_chi_gh" type="text" placeholder="nhập địa chỉ nhận hàng">';
            echo '<input name="ten_nguoi_nhan" type="text" placeholder="nhập tên người nhận">
            <input name="ghi_chu" type="text" placeholder="nhập ghi chú nếu có ">';
           

            echo '</div>';

            echo '</li>';

            $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);

            $total = ($total + $subtotal);



            echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->ten_sp.'" />';

            echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';

            

            echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';

            $cart_items ++;

            

        }

        echo '</ul>';

        echo '<span class="check-out-txt">';

        echo '<strong>Total : '.$currency.$total.'</strong>  ';

        echo '</span>';
        echo '<br>';
        echo '</div>';
        echo '<button name="mua" class="btn btn-primary pd">Tiến hành thanh toán</button>';
        echo '</div>';
        echo '</form>';
      
        if(isset($_POST['mua'])){
            $ten_kh = $_SESSION['username'];
            $ten_sp = $obj->ten_sp;
            $so_luong = $cart_itm["qty"];
            $gia = $obj->gia;
            $tong_tien =  $total;
            $ngay_dat_hang= date("d-m-Y");
            $sdt = $_POST['sdt'];
            $dia_chi_gh = $_POST['dia_chi_gh'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $ma_sp = $obj->ma_sp;
            $connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
            $query = "insert into donhang (ten_kh,ten_sp,so_luong,gia,sdt,tong_tien,ngay_dathang,dia_chi_gh,ghi_chu,ma_sp,ten_nguoi_nhan) values('$ten_kh','$ten_sp','$so_luong','$gia','$sdt','$tong_tien','$ngay_dat_hang','$dia_chi_gh','$ghi_chu','$ma_sp','$ten_nguoi_nhan')";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            echo '<script>';
            echo 'alert("ok mày");';
            echo '</script>';
            header('location:index.php');
            
            
        }
        
     
    
    
       
    

    }else{

        echo 'Your Cart is empty';

    }

?>
           </tbody>
       </table>
       
    <footer>
        <div class="footer__main grid grid-cols-4">
            <div class="col">
                <img  src="" alt="">
                <h1>Về chúng tôi</h1>
                <p>SeVen là cửa hàng chuyên cung cấp sản phẩm thời trang nam nữ cho tất cả các bạn trẻ.</p>
            </div>
            <div class="col">
                <h1>Thông tin liên hệ</h1>
                <ul>
                    <li><a href="">Địa chỉ : Trịnh Văn Bô,Xuân Phương, Nam Từ Liêm, Hà Nội.</a></li>
                    <li><a href="">Hotline : 0384765432</a></li>
                    <li><a href="">Email : seven@gmail.com</a></li>
                </ul>
            </div>
            <div class="col">
                <h1>Chính sách cửa hàng</h1>
                <ul>
                    <li><a href="">Hướng dẫn đặt hàng</a></li>
                    <li><a href="">Thanh toán & vận chuyển</a></li>
                    <li><a href="">Bảo hành & đổi trả</a></li>
                    <li><a href="">Đánh giá của khách hàng</a></li>
                    <li><a href="">Chính sách bảo mật thông tin</a></li>
                </ul>
            </div>
            <div class="col">
                <h1>Nhận bản tin của chúng tôi !</h1>
                <input style="width:100%;" type="text" placeholder="Nhập Email của bạn">
                <button class="news__signup">Đăng Ký</button>
            </div>
        </div>
        <div class="footer__bottom">
            <span>Design by SeVen.All right reserved</span>
            <a style="padding: 0;" href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fas fa-envelope"></i></a>
            <a href=""><i class="fas fa-phone-square-alt"></i></a>
        </div>
    </footer>
</div>
</body>
</html>