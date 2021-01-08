
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
<?php 

require_once '../db.php';
$sql = "select * from hotels";
// var_dump($sql);die;
$result = executeQuery($sql, true);

?>
<style>
    table {margin: 0 auto; width:900px; text-align:center; background: };
</style>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">is</th>
            <th scope="col">name</th>
            <th scope="col">Image</th>
            <th>
            <a class="btn btn-sm btn-danger" href="add-form.php" title="">Add new</a>
            <a  class="btn btn-sm btn-danger" href="../rooms/index.php" title="">về room</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $u): ?>
            <tr>
                <td scope="row"><?php echo $u['id'] ?></td>
                <td scope="row"><?php echo $u['name'] ?></td>
                <td scope="row"><img src="<?php echo $u['image'] ?>" alt="" width="200px"></td>
                <td>
                    <a class="btn btn-sm btn-danger" href="edit-form.php?id=<?php echo $u['id']?>" title="">Edit</a>
                    <a class="btn btn-sm btn-danger" href="remove.php?id=<?php echo $u['id']?>" title="">Remove</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>