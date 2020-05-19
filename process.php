<?php
ini_set("display_errors","1");
session_start();

$host = 'localhost';
$user = 'imane';
$password = '123';
$dbname = 'data';
$dsn ='mysql:host='.$host.';dbname='.$dbname;
$pdo = new PDO($dsn, $user,$password);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//error handling
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//fetch mode has to be associative array when we fetch from db
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
$getAll =$pdo->prepare("SELECT * FROM crud_table");
$getAll->execute();
$data = $getAll->fetchAll();

if(isset($_POST['save'])){
    $name =  $_POST['name'];
    $location = $_POST['location'];
$_SESSION ['message'] = "Record has been saved";
    $_SESSION ['msg_type'] = "success";
    $stmt = $pdo->query("INSERT INTO crud_table (name,location) VALUES ('$name','$location')");
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id =  $_GET['delete'];
    $stmt = $pdo->query("DELETE FROM crud_table WHERE id=$id");
    $_SESSION ['message'] = "Record has been deleted";
    $_SESSION ['msg_type'] = "danger";
    header("location: index.php");

}
/*$mysqli = new mysqli('jdbc:mysql://localhost:3306/crud','imane','123','crud')
or die(mysqli_error($mysqli));*/

/*  $mysqli->query("INSERT INTO data (name,location) VALUES ('$name','$location')")
  or die($mysqli->error);*/
