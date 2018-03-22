<?php
    session_start();
    
    if (!isset($_SESSION['usuarioId'])) {
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
            footer{
                position: relative;
                margin-top: 20px;
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
        
        <!-- header -->
        <nav> <?php include_once "include/header.php"; ?> </nav>
        
        <div class="dadosCadastrais">
                <h1>Cadastro de Produto</h1><br>
                <form action="../controller/ProdutoController.class.php" method="POST">
                    Nome do Produto: <input type="text" name="txtNome" autofocus>
                    Descricao: <input type="text" name="txtDescricao">
                    Peso: <input type="number" name="txtPeso">
                    Preço: <input type="number" name="txtPreco">
                    Quantidade: <input type="number" name="txtQuantidade">
                    <input style="display: block;" type="submit" name="acao" value="Cadastrar">
                </form>
            </div>
        
        <!-- footer --> 
        <footer> <?php include_once "include/footer.php"; ?> </footer>
    </body>
</html>