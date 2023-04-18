<?php
$id=$_GET['id'];
$connection=new PDO("mysql:host=127.0.0.1;dbname=123;chrset=utf8","root");
$query = "delete from slider where ma_slider=$id";
$stmt = $connection->prepare($query);
$stmt->execute(); 
header('location: slider.php');
?>