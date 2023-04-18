<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', '123') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['btn-dangky'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$vai_tro = trim($_POST['vai_tro']);
$dia_chi = trim($_POST['dia_chi']);
$anh = trim($_FILES['anh']['name']);

if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($dia_chi)) {
array_push($errors, "dia_chi is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM taikhoan WHERE ten_tk = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên,email hoặc chưa nhập!"); window.location="dang-ky.php";</script>';

// Dừng chương trình
// die ();
}
else {
$sql = "INSERT INTO taikhoan (ten_tk,mat_khau, email, vai_tro,dia_chi,anh) VALUES ('$username','$password','$email','$vai_tro','$dia_chi','$anh')";
echo '<script language="javascript">alert("Đăng ký thành công!");window.location="dang-nhap.php";</script>';

if (mysqli_query($conn, $sql)){
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Vai Trò: ".$_POST['vai_tro']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); ";</script>';
}
}
}
?>