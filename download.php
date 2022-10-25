<?php
include("src/db.php");

if(isset($_GET['id'])) {

$var_1 = $_GET['id'];

$sql = "SELECT * FROM livros WHERE id = $var_1";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_assoc($result);

$file = 'files/' . $files['name'] .= '.pdf';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);

    $newCount = $files['download'] + 1;
    $updateQuery = "UPDATE `livros` SET `download` = '$newCount' WHERE id = $var_1";
    mysqli_query($conn, $updateQuery);
    exit;
    }
}
?>

