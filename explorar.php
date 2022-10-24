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

    <section style="margin-top: 4rem;">           
<div class="Pesquisar">
            <form action="search.php" method="GET" class="search" style="margin: 1rem;">
                <span type="submit" class="button-search">
                    <img src="./assets/img/search0.svg" alt="pesquisar" class="search-button">
                </span>
                <input type="search" name="keyword" placeholder="Pesquisar Livros" class="input-search" autocomplete="off">
            </form>
        </div>

        <div class="categorias"> <?php
            $result = mysqli_query($conn, "SELECT * FROM categorias ORDER by ID DESC");
             while($row = $result -> fetch_array()) { ?>
            <a href="filter-categoria.php?name=<?php echo $row['nome'];?>" class="cat-1"><?php echo $row['nome'];?></a>
            <?php }?>
        </div>

    </section>
        
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/general.js"></script>
</body>

</html>