<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sobre - IceBlu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css" />
        <script src="../util/js/general.js"></script>
        <style>
            .sobreProjeto{
                margin: auto;
                max-width: 800px;
            }
            nav ul li a#sobre{
                background-color:#daebef;
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
        <div class="sobreProjeto">
        <table class="tabela">
            <caption>Técnologias utilizadas</caption>
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Implementação</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>WAMP (Apache 2.4, MySQL 5.7, PHP 7.1)</td>
                    <td>Ok</td>
                </tr>
                <tr>
                    <td>PDO</td>
                    <td>Ok</td>
                </tr>
                <tr>
                    <td>HTML 5, CSS 3</td>
                    <td>Ok</td>
                </tr>
                <tr>
                    <td>Bootstrap</td>
                    <td>NYI</td>
                </tr>
                <tr>
                    <td>JavaScript</td>
                    <td>NYI</td>
                </tr>
            </tbody>
        </table>
        </div>
        <footer> <?php include_once "include/footer.php"; ?> </footer>
    </body>
</html>