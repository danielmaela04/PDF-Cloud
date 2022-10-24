<?php
    include('src/upload.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estudante Curioso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="./assets/img/favicon.svg">
    <link rel='stylesheet' type='text/css' media='screen' href='./assets/css/upload.css'>
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

    <div class="header-01">
        <div class="header-data">
           <a href="index.php"><img src="./assets/img/chevron-double-left.svg" alt="voltar"></a>
            <h4 class="page-title">Upload</h4>
        </div>
    </div>

    <form action="carregar.php" method="post" enctype="multipart/form-data" style="margin: 1rem;">
        <div class="custom-file-upload">
            <input type="file" name="pdf" id="fileuploadInput" accept=".pdf">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <img src="./assets/img/upload.svg" width="40px" height="40px">
                        <i>Clique aqui para efectuar o Upload</i>
                    </strong>
                </span>
            </label>
        </div>
        <select name="categoria" class="btn name-file" style="margin-top: 1rem;">
            <option disabled selected value="">Categoria</option>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM categorias ORDER by ID DESC");
             while($row = $result -> fetch_array()) { ?>
            <option value="<?php echo $row['nome'];?>"><?php echo $row['nome'];?></option>
            <?php }?>
        </select>
        <div class="button-container" style="margin-top: 1rem;">
            <button type="submit" name="submit" class="btn">Carregar</button>
        </div>
    </form>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/general.js"></script>
    <script src="./assets/js/register.js"></script>
</body>

</html>