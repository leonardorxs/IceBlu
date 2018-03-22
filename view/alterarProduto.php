<?php
    session_start();
    include_once '../controller/ProdutoController.class.php';
    
    
    if (!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){
        echo "Você não tem permissão para acessar essa página";
        exit();
    }elseif ($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $prod = buscarId($id);
    }
    
?>
<html>
    <head>
        <title>Login - Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css" />
        <script src="../util/js/general.js"></script>
        <style>
            nav ul li a#produtos{
                background-color:#daebef;
            }
            .dadosCadastrais{
                margin: 0 auto 60px auto;
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
        <!--header-->
        <nav> <?php include_once 'include/header.php'; ?> </nav>
        
        <div class="dadosCadastrais">
            <h1>Alterar Produto </h1>
            <form action="../controller/ProdutoController.class.php" method="POST">
                <input type="hidden" name="txtId" value=" <?= $prod['id'] ?>" />
                Nome do Produto: <input type="text" name="txtNome" autofocus value="<?= $prod['nome'] ?>">
                Descricao: <input type="text" name="txtDescricao" value="<?= $prod['descricao'] ?>">
                Peso: <input type="number" name="txtPeso" value="<?= $prod['peso'] ?>">
                Preço: <input type="number" name="txtPreco" value="<?= $prod['preco'] ?>">
                Quantidade: <input type="number" name="txtQuantidade" value="<?= $prod['quantidade'] ?>">
                <input style="display: block; float:right" type="submit" name="acao" value="Alterar">
                <input style="float: left;" type="submit" name="acao" value="Desativar">
            </form>
        </div>
        
        <!--footer-->
        <footer> <?php include_once 'include/footer.php'; ?> </footer>
    
    </body>
</html>