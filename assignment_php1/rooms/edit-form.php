<?php  

require_once '../db.php';
$id = $_GET['id'];
$sql = "select * from rooms where id = $id";
$data = executeQuery($sql, false);
$sqlDepartment = "select * from hotels";
$departArr = executeQuery($sqlDepartment, true);

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
    <div class="form-row">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <div class="form-row">
           <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input id="inputEmail4" class="form-control" type="text" name="name" value="<?php echo $data['name']?>" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputState" >Hotel_id</label>
            <select class="form-control" id="inputState" name="hotel_id">
				<?php foreach ($departArr as $depart): ?>
					<option 
						<?php if ($data['hotel_id'] == $depart['id']): ?>
							selected
						<?php endif ?>
						value="<?php echo $depart['id'] ?>"><?php echo $depart['name'] ?>
                    </option>
				<?php endforeach ?>
			</select>
        </div>
        <div class="form-group col-md-6" >
            <label for="inputEmail4" for="">Price</label>
            <input id="inputEmail4" class="form-control" type="text" name="price" value="<?php echo $data['price']?>" placeholder="">
        </div>
        <div class="form-group col-md-6" >
            <img src="<?php echo $data['image']?>" alt="" width="150">
            <br>
            <label for="inputEmail4">Image</label>
            <input id="inputEmail4" class="form-control" type="file" name="image" placeholder="">
        </div>
        <div class="form-group col-md-6" >
            <label for="inputEmail4">Detail</label>
            <input id="inputEmail4" class="form-control" type="text" name="detail" value="<?php echo $data['detail']?>" placeholder="">
        </div>
        <div class="form-group col-md-6" >
            <label for="inputEmail4">Status</label>
            <input  id="inputEmail4" class="form-control" type="text" name="status" value="<?php echo $data['status']?>" placeholder="">
        </div>
        </div>
        <div>
            <button  class="btn btn-sm btn-danger"  type="submit">Save</button>
            <a   class="btn btn-sm btn-danger" href="index.php" title="">Cancel</a>
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