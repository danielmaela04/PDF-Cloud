<?php
include("db.php");
$errors = 1;

 $target = "files/";
 
if(isset($_POST['submit'])){
 $target = $target.basename($_FILES['pdf'] ['name']);
 $type = pathinfo($target, PATHINFO_EXTENSION);
 if($type != 'pdf'){
  echo "<script>alert('Sao permitidos apenas arquivos com a extensao .pdf');</script>";
  $errors = 0;
 }
  $filesize = $_FILES['pdf'] ['size'];
if ($filesize < 100 && $filesize< 50000000) {
   echo "<script>alert('O Maximo permitido de upload sao 50MB');</script>"; 
    $errors = 0;
   }

 if($errors == 0){
  echo "";
 } else {
  $uplaod_success = move_uploaded_file($_FILES['pdf'] ['tmp_name'], $target);
  if($uplaod_success == TRUE){
    $id = uniqid();
   $name_extension = $_FILES['pdf']['name'];
   $size = $_FILES['pdf']['size'];
   $categoria = $_POST['categoria'];
   $name = pathinfo($name_extension, PATHINFO_FILENAME);
   $result = mysqli_query($conn,"INSERT INTO livros (id, name, size, type, categoria) VALUES ('$id', '$name', '$size', '$type', '$categoria')");
   if($result == TRUE){
    echo "<script>alert('O arquivo foi carregado com sucesso') </script>";
   }
 }
}
}
?>
