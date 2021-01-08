<?php  

require_once '../db.php';
//1. Lấy data từ form gửi sang
$id = $_POST['id'];
$name = $_POST['name'];
$hotel_id = $_POST['hotel_id'];
$price = $_POST['price'];
$image = $_FILES['image'];
$detail = $_POST['detail'];
$status = $_POST['status'];
$avatar = "";

//upload ảnh
if($image['size'] > 0) {  //kiểm tra kích cỡ ảnh
    $filename = uniqid() . "-" . $image['name'];
    move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
    $avatar = 'uploads/' . $filename;
}
// câu jquery
$sql = "update rooms set 
			name = '$name',
            hotel_id = '$hotel_id',
            price = '$price',
            detail = '$detail',
            status = '$status'";
if($avatar != ""){
	$sql .= ",
		        image = '$avatar'";
}
$sql .=	" where id = $id";

executeQuery($sql);
header('location: index.php')

?>