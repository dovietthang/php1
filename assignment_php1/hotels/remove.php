<?php  

require_once '../db.php';
$id = $_GET['id'];
$sql = "delete from hotels where id = $id";
// nạp câu truy vấn vào kết nối
executeQuery($sql);
header('location: index.php');

?>