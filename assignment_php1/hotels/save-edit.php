<?php  

require_once '../db.php';
//1. Lấy data từ form gửi sang
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_FILES['image'];
$avatar = "";

//upload ảnh
if($image['size'] > 0) {  //kiểm tra kích cỡ ảnh
    $filename = uniqid() . "-" . $image['name'];
    move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
    $avatar = 'uploads/' . $filename;
}
// câu jquery
$sql = "update hotels set 
			name = '$name'";
if($avatar != ""){
	$sql .= ",
		image = '$avatar'";
}
$sql .=	" where id = $id";

executeQuery($sql);
header('location: index.php')

?>