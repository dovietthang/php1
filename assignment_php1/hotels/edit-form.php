<?php  

$id = $_GET['id'];

$host = "127.0.0.1";
$dbname = "websites";
$dbhotelname = "root";

try{
    $connect = new PDO("mysql:host=$host;dbname=$dbname;charst=utf8", $dbhotelname);
}
catch(Exception $ex) {
    var_dump($ex->getMessage());
    die;
}
// câu jquery
$sql = "select * from hotels where id = $id";
//var_dump($sql);die;
// nạp câu truy vấn vào kết nối
$stmt = $connect->prepare($sql);

// thực thi câu truy vấn với CSDL
$stmt->execute();

// lấy dữ liệu từ câu sql
$data = $stmt->fetch();
//var_dump($data);die;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>
<div class="container" >
    <form action="save-edit.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <div class="form-group col-md-6">
            <label for="">Name</label>
            <input  id="inputEmail4" class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <img src="<?php echo $data['image']?>" alt="" width="150">
            <br>
            <label for="">Image</label>
            <input  id="inputEmail4" class="form-control" type="file" name="image" placeholder="">
        </div>
        <div>
            <button class="btn btn-sm btn-danger"  type="submit">Save</button>
            <a  class="btn btn-sm btn-danger" href="index.php" title="">Cancel</a>
        </div>
    </form>
    </div>

</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>