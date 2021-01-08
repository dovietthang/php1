<?php 

function executeQuery($sqlQuery, $fetchAll = true){ 
	$host = "127.0.0.1";
	$dbname = "websites"; // tên database
	$dbhotelname = "root";
	
	try{
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbhotelname);	
		
	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}
	// nạp câu truy vấn vào kết nối
    $stmt = $connect->prepare($sqlQuery);
    
	// thực thi câu truy vấn với csdl
    $stmt->execute();
    
	// thu thập kết quả trả về
	if($fetchAll == true){
		return $stmt->fetchAll();
	}
	return $stmt->fetch();
}

?>