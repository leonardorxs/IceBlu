<?php
    session_start();

    include_once '../controller/ProdutoController.class.php';

    $produtos = listarProdutos();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Produtos - Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css" />
        <style>
            nav ul li a#produtos{
                background-color:#daebef;
            }
            
            .listaProdutos{
                margin: auto;
                max-width: 1000px;
                border: 1px solid gray;
            }
            .produto{
                float: left;
                margin: auto;
                width: 30%;
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
        
        <table class="tabela">
            <thead>
                <tr>
                    <?php 
                        if(!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){

                        }elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3){
                    ?>
                    <td>Id</td>
                    <?php } ?>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Peso</td>
                    <td>Preco</td>

                    <?php 
                        if(!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){

                        }elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3){
                    ?>
                         <td>Quantidade</td>
                    <?php } ?>
                </tr>
            </thead>
            <?php 
                foreach($produtos as $prod){
            ?>
            <tbody>
                <tr>
                    <?php 
                        if(!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){

                        }elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3){
                    ?>
                    <td><?= $prod['id'] ?></td>
                    <?php } ?>
                    <td><?= $prod['nome'] ?></td>
                    <td><?= $prod['descricao'] ?></td>
                    <td><?= $prod['peso'] ?></td>
                    <td><?= $prod['preco'] ?></td>
                    <?php 
                        if(!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){

                        }elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3){
                    ?>
                        <td><?= $prod['quantidade'] ?></td>
                        <td><a class="button" href="alterarProduto.php?id='<?= $prod['id'] ?>' " >Alterar</a></td>
                    <?php } ?>
                </tr>
            </tbody>
            <?php 
                } 
            ?>
        </table>
        <?php
            if (!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1) {

            } elseif ($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {
                echo '<a style="text-decoration: none;" href="../view/cadastroProduto.php">Cadastrar novo Produto</a>';
            }
        ?>
        <footer> <?php include_once "include/footer.php"; ?> </footer>
    </body>
</html>
