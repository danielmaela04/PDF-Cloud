<?php
include('src/db.php')
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
    
    <div class="container">
    <div class="filterDiv home">
        <section>
            <div class="header"></div>
            <div class="box-0">
                <div class="circulo">
                    <img src="./assets/img/translate.svg" alt="compartilhar" width="24px" height="24px">
                </div>
                <div class="progresso">
                    <img src="./assets/img/history.svg" alt="Modo" class="modo">
                </div>
                <a href="./explorar.php" class="circulo">
                    <img src="./assets/img/search.svg" alt="Favoritos">
                </a>
            </div>
        </section>

        <main class="tema">
        <?php
            $result = mysqli_query($conn, "SELECT * FROM livros ORDER by ID DESC");
             while($row = $result -> fetch_array()) { ?>
            <a href="baixar.php?name=<?php echo $row['name'] ?>" class="box-1 box-2">
                <img class="main-icon" data-pdf-thumbnail-file="./files/<?php echo $row['name'];?>" src="./assets/img/capa.jpg" alt="capa">
                <figcaption class="main-text"><?php echo $row['name'];?></figcaption>
            </a>
            <?php }?>
        </main>

        <section class="new-book">
            <a href="./carregar.php" class="new-1">
                <img src="./assets/img/plus-circle-dotted.svg" alt="novo livro">
            </a>
        </section>
    </div>

    <section class="filterDiv explorar">
    <main class="tema main-container" style="margin-top: .6rem;">
        <?php
            $result = mysqli_query($conn, "SELECT * FROM livros ORDER by ID DESC");
             while($row = $result -> fetch_array()) { ?>
            <a href="baixar.php?name=<?php echo $row['name'] ?>" class="box-1 box-2">
                <img src="./assets/img/Book_Cover_Mockup.jpg" alt="Livros" class="main-icon">
                <figcaption class="main-text"><?php echo $row['name'];?></figcaption>
            </a>
            <?php }?>
        </main>
    </section>

    <section class=" filterDiv menu">
        <div class="anuncio">
            <img src="./assets/img/Book_Cover_Mockup.jpg" alt="anuncio" class="ads-img">
        </div>
        <div class="menu-princ">
            <a href="#" class="menu-wrapper-1">
                <img src="./assets/img/facebook.svg" alt="facebook" class="menu-icon">
                <div class="text-menu">
                    <h1 class="menu-text-1">Siga-nos no Facebook</h1>
                    <h5 class="des-menu">@estudo.antes</h5>
                </div>
            </a>

            <a href="malito: danielmaela04@gmail.com" class="menu-wrapper-1">
                <img src="./assets/img/email.svg" alt="email" class="menu-icon">
                <div class="text-menu">
                    <h1 class="menu-text-1">Envie-nos um E-mail</h1>
                    <h5 class="des-menu">Isso não é padrão de todos os browser, isso eu posso te garantir.</h5>
                </div>
            </a>
            <a href="#" class="menu-wrapper-1">
                <img src="./assets/img/dmca.svg" alt="dmca" class="menu-icon">
                <div class="text-menu">
                    <h1 class="menu-text-1">DMCA</h1>
                    <h5 class="des-menu">Saiba mais sobre os direitos autorais</h5>
                </div>
            </a>
            <a href="#" class="menu-wrapper-1">
                <img src="./assets/img/sobre.svg" alt="sobre" class="menu-icon">
                <div class="text-menu">
                    <h1 class="menu-text-1">Sobre nos</h1>
                    <h5 class="des-menu">v 1.0.0 Desenvolvido por Daniel04</h5>
                </div>
            </a>
            <a href="#" class="menu-wrapper-1">
                <img src="./assets/img/more.svg" alt="mais" class="menu-icon">
                <div class="text-menu">
                    <h1 class="menu-text-1">Mais informações</h1>
                    <h5 class="des-menu">Saiba mais sobre os termos e politica de privacidade</h5>
                </div>
            </a>
        </div>
    </section>

    <section class="menu-bottom" id="menuBottom">
        <div class="menu-wrapper" onclick="filter('home')">
            <img src="./assets/img/house.svg" alt="pagina inicial">
            <figcaption class="menu-text active col-2">Inicio</figcaption>
        </div>

        <div class="menu-wrapper" onclick="filter('explorar')">
            <img src="./assets/img/popular.svg" alt="pagina inicial">
            <figcaption class="menu-text col-2">Popular</figcaption>
        </div>
        <div class="menu-wrapper" onclick="filter('menu')">
            <img src="./assets/img/list.svg" alt="pagina inicial">
            <figcaption class="menu-text col-2">Menu</figcaption>
        </div>
    </section>
</div>
    
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/general.js"></script>
    <script src="./assets/js/pdfThumbnails.js" data-pdfjs-src="./assets/js/pdf.js/build/pdf.js"></script>
</body>

</html>