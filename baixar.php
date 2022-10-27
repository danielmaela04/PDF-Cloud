<?php
    include('src/db.php');
    include('download.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estudante Curioso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="./assets/img/favicon.svg">
    <link rel='stylesheet' type='text/css' media='screen' href='./assets/css/down.css'>
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
            <h4 class="page-title">Detalhes</h4>
        </div>
    </div>
    <?php if(isset($_GET['uid'])){
            $uid = $_GET['uid'];
        
        $result = mysqli_query($conn, "SELECT * FROM livros WHERE id = '$uid'");
        while($row = $result -> fetch_array()) { 
        ?>
    <section class="preview">
        <form action="" method="" style="margin: 1rem; display: flex; flex-direction: column; gap: 1rem;" id="ajax">
            <input type="text" name="uid" value="<?php echo $uid ?>" style="display: none;">
            <input type="text" name="name" class="btn name-file" placeholder="Digite o seu nome" required="required">
            <input type="email" name="email" placeholder="Digite o seu email" class="btn name-file" required="required">
            <textarea name="desc" placeholder="Digite uma descrição" class="btn name-file" required="required" placeholder="Digite uma descrição"></textarea>
            <div class="button-container" style="margin-top: 1rem; gap: 1rem;">
                <button type="submit" name="submit" class="btn" id="submit">Enviar</button>
                <span class="btn" onclick="closeModal()" style="text-align: center;">Cancelar</span>
            </div>
        </form>
    </section>

    <section class="preview-pdf">
    <iframe src="files/css-grid (4).pdf" width="100%" height="100px" scrolling="no" style="border:none;"></iframe>
        <div class="col-x" onclick="closeModal_pdf()">
            <div class="close-button">
                <img src="./assets/img/x-circle.svg" alt="sair" class="col-x">
            </div>
        </div>
    </section>

    <section class="boock-down">
        <div class="boock-detail">
            <img class="down-capa" data-pdf-thumbnail-file="./files/<?php echo $row['name'];?>.pdf"
                src="./assets/img/capa.jpg" alt="capa">
            <figcaption class="boock-title">
                <?php echo $row['name'];?>
            </figcaption>
        </div>
    </section>
    <div class="status">
        <a href="download.php?id=<?php echo $row['id'];?>" class="status-1">
            <img src="./assets/img/download.svg" alt="downloads">
            <figcaption class="status-text">Baixar</figcaption>
        </a>
        <div class="status-1">
            <img src="./assets/img/eye.svg" alt="downloads">
            <figcaption class="status-text" onclick="openModal_pdf()">Visualizar</figcaption>
        </div>
        <div class="status-1" onclick="openModal()">
            <img src="./assets/img/exclamation-triangle.svg" alt="downloads">
            <figcaption class="status-text">Reportar</figcaption>
        </div>
    </div>

    <section class="action">
        <div class="action-button">
            <span class="action-text">Visualizar</span>
        </div>
        <div class="action-button down-button">
            <span class="action-text">Baixar</span>
        </div>
    </section>

    <div class="uploads">
        <h1 class="total-boock details">Detalhes</h1>
    </div>

    <div class="detalhes-container">
        <div class="detalhes">Tamanho:</div>
        <span class="author-upload">
            <?php echo number_format($row['size']/(1024*1024),2);?> MB
        </span>
    </div>
    <div class="detalhes-container">
        <div class="detalhes">Downloads:</div>
        <span class="author-upload">
            <?php echo $row['download']; ?>
        </span>
    </div>
    <div class="detalhes-container">
        <div class="detalhes">Categoria:</div>
        <span class="author-upload">
            <?php echo $row['categoria']; ?>
        </span>
    </div>
    <?php }} ?>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/general.js"></script>
    <script src="./assets/js/report.js"></script>
    <script src="./assets/js/pdfThumbnails.js" data-pdfjs-src="./assets/js/pdf.js/build/pdf.js"></script>
</body>

</html>