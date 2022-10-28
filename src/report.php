<?php 
include('db.php');

$uid = $_POST['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$desc = $_POST['desc'];

$db = mysqli_query($conn, "INSERT INTO report (uid, name, email, desc) 
VALUES ('$uid', '$name', '$email', '$desc')");
mysqli_close($conn);
?>