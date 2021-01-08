<?php  

require_once '../db.php';
//1. Lấy data từ form gửi sang
$name = trim($_POST['name']);
$last_name = trim($_POST['last_name']);
$phone_number = trim($_POST['phone_number']);
$image = $_FILES['image']; 
$avatar = "";

//validate
//1.name

//upload ảnh
if($image['size'] > 0) {  //kiểm tra kích cỡ ảnh
    $filename = uniqid() . "-" . $image['username'];
    move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
    $avatar = 'uploads/' . $filename;
}

// câu jquery
$sql = "insert into hotels
            (id,name,image)
        values 
            ('$id','$name','$avatar')";

executeQuery($sql);
header('location: index.php');


?>
