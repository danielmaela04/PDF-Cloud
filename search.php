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


    <div class="header-01">
        <div class="header-data">
            <img src="./assets/img/chevron-double-left.svg" alt="voltar" onclick="history.back()">
            <h4 class="page-title">Resultados</h4>
        </div>
    </div>

    <?php
if (!isset($_GET['keyword'])) {
	header("Location: index.php");
	exit;
}

$exemplo = ($_GET['keyword']);

$nome = "%".trim($_GET['keyword'])."%";

$dbh = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$sth = $dbh->prepare('SELECT * FROM `livros` WHERE `name` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="reco" style="margin-top: 4rem;">
        <?php
             if (count($resultados)) {
                 foreach($resultados as $Resultado) {
             ?>
        <a href="baixar.php?name=<?php echo $Resultado['name'] ?>" class="box-1 box-2">
        <img class="main-icon" data-pdf-thumbnail-file="./files/<?php echo $Resultado['name'];?>" src="./assets/img/capa.jpg" alt="capa">
       <figcaption class="main-text">
                <?php echo $Resultado['name'];?>
            </figcaption>
        </a>

    <?php } } else { ?></div>
    <div class="not-result" style="display: grid !important;">
        <div class="text-result">Não foram encontrados resultados para <spam style="border-bottom: 1px solid #000000;"><?php echo $exemplo ?><span>
        </div>
    </div>
    <?php } ?>
    </div>


    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/general.js"></script>
    <script src="./assets/js/pdfThumbnails.js" data-pdfjs-src="./assets/js/pdf.js/build/pdf.js"></script>

</body>

</html>