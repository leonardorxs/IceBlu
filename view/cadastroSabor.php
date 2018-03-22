<?php
    session_start();

    if (!isset($_SESSION['usuarioNivel'])) {
        echo "Você não tem permissão para acessar essa página";
        exit();
    } elseif ($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {

    } else {
        echo "Você não tem permissão para acessar essa página";
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Produto - Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css" />
        <style>
            nav ul li a#produtos{
                background-color:#daebef;
            }
            .dadosCadastrais{
                margin: auto;
                max-width: 300px;
                min-width: 300px;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="description" content="Sorveteria Ice Blu">
        <meta name="keywords" content="Sorveteria Ice Blu">
        <meta name="author" content="Leonardo Rodrigues">
        <meta http-equiv="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav> <?php include_once "include/header.php"; ?> </nav>

        <div class="dadosCadastrais">
            <h1>Cadastro de Sabor</h1><br>
            <form action="../controller/SaborController.class.php" method="POST">
                Nome do Sabor: <input type="text" name="txtNome" autofocus>
                Descricao: <input type="text" name="txtDescricao">
                Ingredientes: <input type="text" name="txtIngredientes">
                <input style="display: block;" type="submit" name="acao" value="Cadastrar">
            </form>
        </div>

        <footer> <?php include_once "include/footer.php"; ?> </footer>
    </body>
</html>