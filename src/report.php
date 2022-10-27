<?php 
include('db.php');

$uid = $_POST['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$desc = $_POST['desc'];

$db = mysqli_query($conn, "INSERT INTO report (uid, name, email, descr) VALUES ('$uid', '$name', '$email', '$desc')");
?>