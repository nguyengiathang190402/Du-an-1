<?php
$id=$_GET['id'];
$connection=new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8","root");
$query = "update donhang set trang_thai ='1' where ma_dh=$id";
$stmt = $connection->prepare($query);
$stmt->execute(); header('location: thongke.php');
?>