<?php
include("download.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estudante Curioso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="./assets/img/favicon.svg">
    <link rel='stylesheet' type='text/css' media='screen' href='./assets/css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./assets/css/upload.css'>

</head>

<body>
    <!-- Preloader -->
    <div class="spinner-wrapper" id="loader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <?php if(isset($_GET['name'])){
            $name = $_GET['name']; ?>
    <div class="header-01">
        <div class="header-data">
            <img src="./assets/img/chevron-double-left.svg" alt="voltar" onclick="history.back()">
            <h4 class="page-title"><?php echo $name;?></h4>
        </div>
    </div>
<?php } ?>

    <?php if(isset($_GET['name'])){
            $name = $_GET['name'];
        
        $result = mysqli_query($conn, "SELECT * FROM livros WHERE categoria = '$name'");
        while($row = $result -> fetch_array()) { 
        ?>

    <div class="reco" style="margin-top: 4rem;">
    <a href="baixar.php?name=<?php echo $row['name'] ?>" class="box-1 box-2">
                <img src="./assets/img/Book_Cover_Mockup.jpg" alt="Livros" class="main-icon">
                <figcaption class="main-text"><?php echo $row['name'];?></figcaption>
            </a>

    <?php } } ?>


    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/general.js"></script>
</body>

</html>