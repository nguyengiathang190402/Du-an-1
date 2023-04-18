<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="./assets/auth.css">
    <link rel="stylesheet" href="./assets/for-all.css">
</head>
<body>
    <div class="wrapper">
        <header class="mb-10">
            <div class="header__top">
                <span class="pl-72">SeVen Shop</span>
                <span class="time">08:00 - 20:00</span>
                <span class="pl-72">Xuân Phương - Nam Từ Liêm - Hà Nội</span>
            </div>
            <div class="header_main flex justify-between py-8">
                <a href=""><img src="./assets/img/logo 1.svg" alt="" class="logo"></a>
                <div class=" auth pr-20">
                    <a href="" class="mr-2 login">Đăng ký</a>
                    <a href="dang-nhap.php" class="mr-2 sign__up">Đăng nhập</a>
                    <a href="gio-hang.html" class="cart"><i class="fas fa-cart-plus icon"></i></a>
                </div>
            </div>
            <div class="header_bottom py-3">
                <nav>
                    <ul>
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                        <li><a href="">Bài viết</a></li>
                        <li><a href="">Liên hệ</a></li>
                        <span style="color: while;padding-left: 550px;"><?php if(isset($_SESSION['username'])){ echo "Xin chào <b>" .$_SESSION['username'];}?></span>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main__login grid grid-cols-2">
<div class="big__logo">
    <img src="./assets/img/big-logo.png" alt="">
</div>
<div class="form">
    
    <form action="xulydangky.php" class="form__auth" method="post"enctype="multipart/form-data">
<h1>Đăng ký</h1>
<div>
    <input type="text" name="username" placeholder="Nhập họ và tên tại đây">
</div>
<div>
    <input type="text" name="vai_tro" value="1" hidden>
</div>
<div>
    <input type="email" name="email" placeholder="Nhập email tại đây">
</div>
<div>
    <input type="text" name="dia_chi" placeholder="Nhập địa chỉ tại đây">
</div>
<div>
    <input type="password" name="password" placeholder="Nhập mật khẩu tại đây">
</div>

<div>
    <input type="file" name="anh" placeholder="Nhập lại mật khẩu tại đây">
</div>
<button class="btn__auth" name="btn-dangky"> ĐĂNG KÝ</button>
<div class="redirect__signup">
    <span >Bạn đã có tài khoản ? <a href="">Đăng nhập</a></span>
</div>
    </form>
  
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