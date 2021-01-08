<?php  

require_once '../db.php';
//1. Lấy data từ form gửi sang
$name = trim($_POST['name']);
$hotel_id = $_POST['hotel_id'];
$price = trim($_POST['price']);
$image = $_FILES['image']; 
$detail = trim($_POST['detail']);
$status = trim($_POST['status']);
$avatar = "";

//validate
//1.name
$nameErr = "";
if(strlen($name) == 0){
	$nameErr = "Không được để trống tên phòng";
}
if($nameErr == "" && (strlen($name) < 4 || strlen($name) > 50)){
	$nameErr = "Tên phòng nằm trong khoảng 4-50 ký tự";
}
//2.price
$priceErr = "";
if(strlen($price) == 0){
	$priceErr = "Không được để trống giá phòng";
}
//3.image
$imageErr = "";
if($image['size'] == 0){
	$imageErr = "Hãy chọn ảnh đại diện";
}
$acceptExt = ['jpg', 'png', 'gif', 'jpeg'];
$file_parts = pathinfo($image['name']);
if($imageErr == "" && !in_array($file_parts['extension'], $acceptExt)){
	$imageErr = "File không đúng định dạng";
}
//4.detail
$detailErr = "";
if(strlen($detail) == 0){
	$detailErr = "Không được để trống detail";
}
//5.status
$statusErr = "";
if(strlen($status) == 0){
	$statusErr = "Không được để trống status";
} 

if($nameErr != "" 
    || $priceErr != ""
    || $imageErr != ""
    || $detailErr != ""
    || $statusErr != ""){
	header("location: add-form.php?nameErr=$nameErr&imageErr=$imageErr&priceErr=$priceErr&detailErr=$detailErr&statusErr=$statusErr");
	die;
}

//upload ảnh
if($image['size'] > 0) {  //kiểm tra kích cỡ ảnh
    $filename = uniqid() . "-" . $image['name'];
    move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
    $avatar = 'uploads/' . $filename;
}
// câu jquery
$sql = "insert into rooms
            (name, hotel_id, price, image, detail, status)
        values 
            ('$name', '$hotel_id', '$price', '$avatar', '$detail', '$status')";

executeQuery($sql);
header('location: index.php');

?>