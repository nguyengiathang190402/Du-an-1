<?php
session_start();
$connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
$query = "select * from danhmuc";
$stmt = $connection->prepare($query);
$stmt->execute();
$danh_muc = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="./assets/for-all.css">
    <link rel="stylesheet" href="./assets/gioi-thieu.css">
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
                    <a href=""><?=$dm['ten_loai']?></a>
                        <?php endforeach ?>
               </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                        <li><a href="">Bài viết</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="container">
            <div class="paragraph">
                <p>Xin chào quý khách! – Chào mừng quý khách đến với Website bán hàng của SeVen Shop
                    Lời đầu tiên, SeVen Shop xin phép được gửi tới quý khách hàng lời chúc sức khỏe, thành đạt và
                    hạnh phúc.
                    Hiện tại Qcshop đang kinh doanh các mẫu quần áo và xu thế thời trang với chất lượng cải thiện
                    liên tục để hoàn hảo nhất cho Quý khách hàng của mình.</p>
                <div class="shop__img grid grid-cols-2">
                    <img src="./assets/img/img1.png" alt="">
                    <img src="./assets/img/img2.png" alt="">
                </div>
                <p>Sau một thời gian hoạt động kinh doanh, những sản phẩm mang chúng tôi đem đến cho khách hàng đã tạo
                    ra hài lòng, sự đánh giá tốt về chất lượng sản phẩm cũng như sự tư vấn nhiệt tình của cửa hàng.
                    SeVen Shop sẽ nỗ lực hơn nữa, sẽ luôn luôn cập nhật những mẫu quần áo hot nhất, thời trang nhất để
                    đáp ứng nhu cầu những khách hàng thân yêu của mình.

                    SeVen Shop tự tin là một trong những cửa hàng chất lượng nhất, đem đến cho khách hàng sự trải nghiệm
                    sản phẩm tuyệt vời nhất. Sự ủng hộ và tin tưởng của quý khách sẽ trở thành nguồn cảm hứng lớn lao
                    cho Qcshop tiếp tục cố gắng và phụng sự quý vị.

                    Xin cảm ơn sự tin tưởng và ủng hộ của quý khách trong thời gian qua.
                    <br>
                    Trân trọng.
                </p>
            </div>
            <div class="aside mt-8">
            
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
</body>

</html>