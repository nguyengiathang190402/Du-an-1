<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['btn-dangnhap']))
{
//Kết nối tới database
include('connect.php');
  
//Lấy dữ liệu nhập vào
$username = addslashes($_POST['ten_tk']);
$password = addslashes($_POST['password']);
$errors = "";

//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}
if(empty($username)){
  $errors .= "email-err=Vui lòng nhập email&";
}
if(empty($password)){
  $errors .= "password-err=Vui lòng nhập mật khẩu&";
}

$errors = rtrim($errors, '&');
if(strlen($errors) > 0) {
  header('location: login.php?'. $errors);
  die;
}
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT ten_tk,mat_khau FROM taikhoan WHERE ten_tk='$username'";

$result = mysqli_query($connect, $query) or die( mysqli_error($connect));

if (!$result) {
echo "Tên đăng nhập không đúng!";
} else {
//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);
  echo $row['mat_khau'];
  echo $password;
//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['mat_khau']) {
header('location: dang-nhap.php');

}else{
    $_SESSION['username'] = $username;
     header('location: index.php');
}

}
  

  
//Lưu tên đăng nhập

echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành côngok. <a href=''>Thoát</a>";
die();
$connect->close();
}
?>