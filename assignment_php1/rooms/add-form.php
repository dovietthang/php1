<?php

require_once '../db.php';
$sql = "select * from hotels";
$result = executeQuery($sql, true);
$sqlDepartment = "select * from rooms";
$departArr = executeQuery($sqlDepartment, true);
$nameErr = isset($_GET['nameErr']) == true ? $_GET['nameErr'] : "";
$priceErr = isset($_GET['priceErr']) == true ? $_GET['priceErr'] : "";
$imageErr = isset($_GET['imageErr']) == true ? $_GET['imageErr'] : "";
$detailErr = isset($_GET['detailErr']) == true ? $_GET['detailErr'] : "";
$statusErr = isset($_GET['statusErr']) == true ? $_GET['statusErr'] : "";


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
    <form action="save-add.php" enctype="multipart/form-data" method="post">
        <div class="form-row">
           <div class="form-group col-md-6">
                 <label for="inputEmail4">Name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4">
                <?php if ($nameErr != ""): ?>
				    <p style="color: red"><?php echo $nameErr ?></p>
			    <?php endif ?>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">hotel_id</label>
                <select id="inputState" class="form-control" name="hotel_id">
                    <?php foreach ($result as $depart): ?>
                    <option value="<?php echo $depart['id'] ?>"><?php echo $depart['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                 <label for="inputEmail4">Price</label>
                <input type="nuber" name="price"  class="form-control" id="inputEmail4">
                <?php if ($priceErr != ""): ?>
                  <p style="color: red"><?php echo $priceErr ?></p>
                <?php endif ?>
            </div>

            <div class="form-group col-md-6">
                 <label for="inputEmail4">image</label>
                <input type="file" name="image" class="form-control" id="inputEmail4">
                <?php if ($imageErr != ""): ?>
				    <p style="color: red"><?php echo $imageErr ?></p>
			    <?php endif ?>
            </div>
            <div class="form-group col-md-6">
                 <label for="inputEmail4">Detail</label>
                <input type="text" name="detail" class="form-control" id="inputEmail4">
                <?php if ($detailErr != ""): ?>
				    <p style="color: red"><?php echo $detailErr ?></p>
			    <?php endif ?>
            </div>
            <div class="form-group col-md-6">
                 <label for="inputEmail4">status</label>
                <input type="text" name="status" class="form-control" id="inputEmail4">
                <?php if ($statusErr != ""): ?>
				    <p style="color: red"><?php echo $statusErr ?></p>
		    	<?php endif ?>
            </div>
        </div>

        <div>
            <button  class="btn btn-sm btn-danger" type="submit">Save</button>
            <a class="btn btn-sm btn-danger" href="index.php" title="">Cancel</a>
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