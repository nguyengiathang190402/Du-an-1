<?php
session_start();

include_once("config.php");
if (isset($_POST['btn-binhluan'])) {
    $ten_kh = $_POST['ten_kh'];
    $noi_dung = $_POST['noi_dung'];
    $ma_sp = $_POST['ma_sp'];
    $ngay_bl = $_POST['ngay_bl'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
    $query = "insert into binhluan (ten_kh,noi_dung,ma_sp,ngay_bl) values('$ten_kh','$noi_dung','$ma_sp','$ngay_bl')";
    $stmt = $connection->prepare($query);
    $stmt->execute();
}
$id = $_GET['id'];
$connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
$query = "select * from sanpham where ma_sp=$id";
$stmt = $connection->prepare($query);
$stmt->execute();
$san_pham = $stmt->fetchAll();
$connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
$query = "select * from binhluan where ma_sp=$id";
$stmt = $connection->prepare($query);
$stmt->execute();
$binh_luan = $stmt->fetchAll();
?>
<?php
$connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
$query = "select * from danhmuc";
$stmt = $connection->prepare($query);
$stmt->execute();
$danh_muc = $stmt->fetchAll();

?>
<?php
$query = "SELECT * FROM sanpham
WHERE gia < 400000
ORDER BY gia DESC LIMIT 0, 4";
$stmt = $connection->prepare($query);
$stmt->execute();
$giare = $stmt->fetchAll();
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
    <link rel="stylesheet" href="./assets/for-all.css">
    <link rel="stylesheet" href="./assets/detail-product-page.css">
</head>

<body>
    <div class="wrapper bg-indigo-50">
        <header class="mb-10">
            <div class="header__top">
                <span class="pl-72">SeVen Shop</span>
                <span class="time">08:00 - 20:00</span>
                <span class="pl-72">Xuân Phương - Nam Từ Liêm - Hà Nội</span>
            </div>
            <div class="header_main flex justify-between py-8">
                <a href=""><img src="./assets/img/logo 1.svg" alt="" class="logo"></a>
                <form action="" class="search">
                    <input type="text" class="search__input" placeholder="Tìm kiếm tại đây">
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
                    <?php foreach ($danh_muc as $dm) : ?>
                        <a href=""><?= $dm['ten_loai'] ?></a>
                    <?php endforeach ?>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="">Giới thiệu</a></li>
                        <li><a href="">Bài viết</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="container">
            <?php foreach ($san_pham as $s) : ?>
                <div class="content">
                    <div class="box__product__detail">

                        <img style="padding: 20px;" src="<?php echo $s['anh'] ?>" alt="">
                        <a href="" class="product__detail__name"><?php echo $s['ten_sp'] ?></a>
                        <a href="" class="product__detail__price"><?php echo $s['gia'] ?>₫</a>
                        <ul class="quality__assurance">
                            <li>✓ Ảnh sản phẩm chụp trực tiếp</li>
                            <li>✓ Miễn phí ship hoàn toàn tất cả các sản phẩm, tất cả các tỉnh thành</li>
                            <li>✓ Nhận hàng sau 1 – 3 ngày kể từ ngày đặt hàng</li>
                            <li>✓ Nội thành Hà Nội nhận hàng trong 12 giờ</li>
                            <li>✓ Shop cam kết chất lượng của sản phẩm tương đương với số tiền bạn bỏ ra</li>
                            <li>✓ Nhận hàng và kiểm tra trước khi thanh toán</li>
                            <li>✓ Shop cam kết hoàn tiền 110% nếu như sản phẩm không làm khách hàng hài lòng</li>
                            <li>✓ Bảo hành sản phẩm 06 tháng</li>
                        </ul>

                    </div>
                    <div class="aside mt-8">
                        <h1>Sản phẩm giá tốt</h1>
                        <?php foreach($giare as $low): ?>
                        <div class="other__products">
                            <a href="chi-tiet-san-pham.php?id=<?=$low['ma_sp']?>"><img src="<?=$low['anh']?>" alt=""></a>
                            <div class="aside__product_informations">

                                <span class="other__products__name"><a href="chi-tiet-san-pham.php?id=<?=$low['ma_sp']?>"><?=$low['ten_sp']?></a></span>
                                <span class="other__products__price"><?=number_format($low['gia'],2)?>đ</span>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="add__to__cart">
                    <form action="cart_update.php" method="post" class="size grid grid-cols-4">
                        <?php
                        $current_url = base64_encode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                        $results = $mysqli->query("SELECT * FROM sanpham where ma_sp = $id;");

                        if ($results) {

                            //output results from database

                            while ($obj = $results->fetch_object()) {
                                echo '<input type="hidden" name="product_code" value="' . $obj->ma_sp . '" />';
                                echo '<input type="hidden" name="type" value="add" />';
                                echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
                            }
                        } ?>
                        <div>
                            <span>M</span>
                            <input type="radio" name="size" id="" value="0" checked>
                        </div>
                        <div>
                            <span>L</span>
                            <input type="radio" name="size" id="" value="1">
                        </div>
                        <div>
                            <span>XL</span>
                            <input type="radio" name="size" id="" value="2">
                        </div>
                        <div>
                            <span>XXL</span>
                            <input type="radio" name="size" id="" value="3">
                        </div>
                        <input type="number" name="product_qty" min="1" class="change__products__number" placeholder="">
                        <button class="btn__add__to__cart" name="add_to_cart">THÊM VÀO GIỎ HÀNG</button>
                    </form>
                </div>
                <div class="product__description">
                    <h1>Mô tả sản phẩm</h1>
                    <p class="description">
                        
                        <?php echo $s['mo_ta'] ?>
                    </p>
                </div>
            <?php endforeach ?>
            <div class="comments">

                <h1>Bình luận</h1>
                <?php if(isset($_SESSION['username'])):?>
                    <form action="" method="post">
                    <input type="text" name="ma_bl" readonly placeholder="auto number" value="" hidden>
                    <input name="ma_sp" type="text" value="<?php echo $id ?>" hidden>
                    <input name="ten_kh" type="hidden" value="<?=$_SESSION['username']?>">
                    <input name="ngay_bl" type="text" value="<?php echo date("d-m-Y"); ?>" hidden>
                  <textarea name="noi_dung" id="editor"></textarea>
                    <input class="btn__commment" name="btn-binhluan" type="submit" value="Gửi bình luận">
                    <?php else: ?>
                    Bạn cần <a style="color:blue"; href="./dang-nhap.php">Đăng nhập</a> để bình luận cho sản phẩm .
                    <?php endif; ?>
                
                    
                </form>
            </div>
            <div class="show__comments">
                <div style="border-width: 3px;padding-top: 5px; padding-bottom: 35px;margin-right: 10px;margin-left: -24px;" class="commnent__box">
                    <?php foreach ($binh_luan as $item) : ?>
                        <?php echo $item['ngay_bl'];?>
                         -
                        <?php echo $item['ten_kh']?>
                         :
                        <?php echo $item['noi_dung']; ?> <br />
                    <?php endforeach ?>

                </div>
        </main>
        <footer>
            <div class="footer__main grid grid-cols-4">
                <div class="col">
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
                    <input type="text" placeholder="Nhập Email của bạn">
                    <button class="news__signup">Đăng Ký</button>
                </div>
            </div>
            <div class="footer__bottom">
                <span>Design by SeVen.All right reserved</span>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fas fa-envelope"></i></a>
                <a href=""><i class="fas fa-phone-square-alt"></i></a>
            </div>
        </footer>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/balloon/ckeditor.js"></script>
    <script>
        BalloonEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>