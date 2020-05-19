<?php
ini_set("display_errors","1");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php require_once 'process.php'?>
<?php if (isset($_SESSION['message'])): ?>
<div class="alert-<?=$_SESSION['msg_type'] ?>">
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif; ?>
</div>
<div class="container">
<div class="row justify-content-center">
    <?php
    //var_dump($data);

    ?>

        <table class="table">
            <thead>
            <tr>
            <th>name</th>
            <th>location</th>
            <th colspan="2">actions</th>
            </tr>
            </thead>
            <?php  foreach ($data as $row):  ?>
                <tr>
                    <td><?php  echo $row['name']?></td>
                    <td><?php  echo $row['location']?></td>
                    <td>
                        <a href="index.php?edit=<?php echo  $row['id'];?>" class="btn btn-info">edit</a>
                        <a href="process.php?delete=<?php echo  $row['id'];?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            <?php  endforeach; ?>
        </table>
    </div>
<div>
    <div class="row justify-content-center">
<form action="process.php" method="POST">
    <div class="form-group">
    <label>name</label>
    <input  class="form-control" type="text" name="name" value="enter your name">
    </div>
    <div class="form-group">
    <label>location</label>
    <input class="form-control" type="text" name="location" value="enter your location">
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit" name="save">save</button>
    </div>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
