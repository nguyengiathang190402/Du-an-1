<?php

if (isset($_POST['btn_add'])) {
    $ten_slider = $_POST['ten_slider'];
    $anh = $_FILES['anh']['name'];
    $thoi_gian = $_POST['thoi_gian'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8", "root");
    $query = "insert into slider (ten_slider,anh,thoi_gian) values('$ten_slider','$anh','$thoi_gian')";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: slider.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
    table,
    th,
    td {
        border: 1px solid black;
        color: black;
    }

    form {
        width: 1300px;
    }
</style>

<head>
    <meta charset="utf-8">
    <title>Welcome SEVEN SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">

    <!-- C3 Chart css -->
    <link href="assets\libs\c3\c3.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets\images\flags\us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets\images\flags\germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets\images\flags\italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets\images\flags\spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="assets\images\flags\russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-email-outline noti-icon"></i>
                        <span class="badge badge-purple rounded-circle noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Chat
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <div class="inbox-widget">
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets\images\users\avatar-1.jpg" class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Cristina Pride</p>
                                        <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets\images\users\avatar-2.jpg" class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Sam Garret</p>
                                        <p class="inbox-item-text text-truncate">Yeah everything is fine</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets\images\users\avatar-3.jpg" class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Karen Robinson</p>
                                        <p class="inbox-item-text text-truncate">Wow that's great</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets\images\users\avatar-4.jpg" class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Sherry Marshall</p>
                                        <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets\images\users\avatar-5.jpg" class="rounded-circle" alt=""></div>
                                        <p class="inbox-item-author">Shawn Millard</p>
                                        <p class="inbox-item-text text-truncate">Yeah everything is fine</p>

                                    </div>
                                </a>
                            </div> <!-- end inbox-widget -->

                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <i class="mdi mdi-comment-account-outline text-info"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="noti-time">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon text-success">
                                    <i class="mdi mdi-account-plus text-primary"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="noti-time">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon text-danger">
                                    <i class="mdi mdi-heart text-danger"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <small class="noti-time">3 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon text-warning">
                                    <i class="mdi mdi-comment-account-outline text-primary"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admi
                                    <small class="noti-time">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon text-purple">
                                    <i class="mdi mdi-account-plus text-danger"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="noti-time">7 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon text-danger">
                                    <i class="mdi mdi-heart text-danger"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                    <small class="noti-time">Carlos Crouch liked</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                            See all notifications
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets\images\users\avatar-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            Thompson <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Cài đặt</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Đăng xuất</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li>


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/SEVEN SHOP.png" style="max-width:25%" alt="">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="assets/images/SEVEN SHOP.png" style="max-width:25%" alt="">
                    </span>
                </a>

                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/SEVEN SHOP.png" style="max-width:25%" alt="">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="assets/images/SEVEN SHOP.png" style="max-width:25%" alt="">
                    </span>
                </a>
            </div>

            <!-- LOGO -->


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-speedometer"></i>
                                <span> Bảng điều khiển </span>
                                <span class="badge badge-info badge-pill float-right"> 3 </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="index.html">Bảng điều khiển 1</a></li>
                                <li><a href="dashboard-2.html">Bảng điều khiển 2</a></li>
                                <li><a href="dashboard-3.html">Bảng điều khiển 3</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-basket"></i>
                                <span> UI Elements </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-fontawesome.html">Font Awesome Icons</a></li>
                                <li><a href="ui-materialdesign.html">Material Design Icons</a></li>
                                <li><a href="ui-ionicons.html">Ion Icons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-bootstrap-ui.html">BS Elements</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-notification.html">Notification</a></li>
                                <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-ios-apps"></i>
                                <span> Các Thành Phần </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="components-grid.html">Lưới điện</a></li>
                                <li><a href="components-portlets.html">Portlets</a></li>
                                <li><a href="components-widgets.html">Vật dụng</a></li>
                                <li><a href="components-nestable-list.html">Nesteble</a></li>
                                <li><a href="components-calendar.html">Lịch</a></li>
                                <li><a href="components-range-sliders.html">Thanh trượt Phạm vi</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-speedometer"></i>
                                <span> Forms </span>
                                <span class="badge badge-danger badge-pill float-right"> 8 </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="forms-elements.html">Các yếu tố chung</a></li>
                                <li><a href="forms-validation.html">Xác thực biểu mẫu</a></li>
                                <li><a href="forms-advanced.html">Biểu mẫu nâng cao</a></li>
                                <li><a href="forms-wizard.html">Trình hướng dẫn biểu mẫu</a></li>
                                <li><a href="form-quilljs.html">Biên tập viên</a></li>
                                <li><a href="forms-uploads.html">Multiple File Upload</a></li>
                                <li><a href="forms-image-crop.html">Cắt hình ảnh</a></li>
                                <li><a href="forms-xeditable.html">X-Editable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-ios-list"></i>
                                <span> Bảng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Bảng cơ sở dữ liệu</a></li>
                                <li><a href="tables-editable.html">Bảng có thể chỉnh sửa</a></li>
                                <li><a href="tables-responsive.html">Bảng đáp ứng</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-3effect">
                                <i class="ion-md-pie"></i>
                                <span> Biểu đồ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="charts-morris.html">Biểu đồ tròn</a></li>
                                <li><a href="charts-chartjs.html">Bảng thống kê</a></li>
                                <!-- <li><a href="charts-flot.html">Flot Chart</a></li>
                        <li><a href="charts-rickshaw.html">Rickshaw Chart</a></li>
                        <li><a href="charts-peity.html">Peity Chart</a></li>
                        <li><a href="charts-c3.html">C3 Chart</a></li>
                        <li><a href="charts-other.html">Other Chart</a></li> -->
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-mail"></i>
                                <span> Mail </span>
                                <span class="badge badge-warning badge-pill float-right">12</span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="email-inbox.html">Hộp thư đến</a></li>
                                <li><a href="email-compose.html">Soạn mail</a></li>
                                <li><a href="email-read.html">Xem thư</a></li>
                                <li><a href="email-templates.html">Mẫu thư điện tử</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-map"></i>
                                <span> Bản đồ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="maps-gmap.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion ion-ios-hourglass"></i>
                                <span> Bố cục </span>
                                <span class="badge badge-danger badge-pill float-right">New</span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="layouts-horizontal.html">Nằm ngang</a></li>
                                <li><a href="layouts-light-sidebar.html">Thanh bên nhẹ</a></li>
                                <li><a href="layouts-small-sidebar.html">Thanh bên nhỏ</a></li>
                                <li><a href="layouts-sidebar-collapsed.html">Đã thu gọn thanh bên</a></li>
                                <li><a href="layouts-unsticky.html">Bố cục không dính</a></li>
                                <li><a href="layouts-boxed.html">Bố cục đóng hộp</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-copy"></i>
                                <span> Các chức năng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="list.php">Tài Khoản</a></li>
                                <li><a href="loaihang.php">Loại hàng</a></li>
                                <li><a href="sanpham.php">Sản Phẩm</a></li>
                                <li><a href="donhang.php">Đơn hàng</a></li>
                                <li><a href="baiviet.php">Bài Viết</a></li>
                                <li><a href="binhluan.php">Bình Luận</a></li>
                                <li><a href="slider.php">Slider</a></li>
                                <li><a href="pages-lock-screen.html"></a></li>
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-404.html">404 Error</a></li>
                                <li><a href="pages-404_alt.html">404 alt</a></li>
                                <li><a href="pages-500.html">500 Error</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-share-variant"></i>
                                <span> Cấp độ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level nav" aria-expanded="false">
                                <li>
                                    <a href="javascript: void(0);">Level 1.1</a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-third-level nav" aria-expanded="false">
                                        <li>
                                            <a href="javascript: void(0);">Level 2.1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Level 2.2</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">C3 Chart</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="#">Velonic</a></li>
                                        <li class="breadcrumb-item"><a href="#">Charts</a></li>
                                        <li class="breadcrumb-item active">C3 Chart</li>
                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">



                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Mã Slider</span>
                                <input type="text" class="form-control" placeholder="Slider ID" aria-label="Username" aria-describedby="basic-addon1" name="ma_slider" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tên Slider</span>
                                <input type="text" class="form-control" placeholder="Slider Name" aria-label="Username" aria-describedby="basic-addon1" name="ten_slider">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Ảnh Slider</span>
                                <input type="file" class="form-control" placeholder="Image" aria-label="Username" aria-describedby="basic-addon1" name="anh_slider">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Thời gian tạo Slider</span>
                                <input type="date" class="form-control" placeholder="Image" aria-label="Username" aria-describedby="basic-addon1" name="thoi_gian">
                            </div>
                            <button class="btn btn-success" name="btn_add">Thêm</button>
                            <button class="btn btn-secondary" type="reset">Nhập lại</button>
                        </form>

                    </div>


                </div>



            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2015 - 2020 &copy; Velonic theme by <a href="">Coderthemes</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="assets\images\layouts\light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets\images\layouts\dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets\images\layouts\rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>

    <!-- Vendor js -->
    <script src="assets\js\vendor.min.js"></script>

    <!--C3 Chart-->
    <script src="assets\libs\d3\d3.min.js"></script>
    <script src="assets\libs\c3\c3.min.js"></script>

    <!-- Init js -->
    <script src="assets\js\pages\c3.init.js"></script>

    <!-- App js -->
    <script src="assets\js\app.min.js"></script>

</body>

</html>