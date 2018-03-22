<?php
session_start();

if (!isset($_SESSION['usuarioNivel'])) {
    
} else {
    echo "Você não tem permissão para acessar essa página";
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login - Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css" />
        <script src="../util/js/general.js"></script>
        <style>
            nav ul li a#login{
                background-color:#daebef;
            }
            .login{
                margin: 10% auto;
                max-width: 400px;
            }
            form{
                margin: auto;
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
        <div class="login">
            <h1>Login</h1>
            <form action="../controller/UsuarioController.class.php" method="POST">
                Usuário<input type="text" name="txtUsuario" autofocus placeholder="Usuário" /><br />
                Senha<input type="password" name="txtSenha" placeholder="Senha" /><br />
                <input style="float:left;" type="submit" name="acao" value="Logar" />
            </form>
            <a href="#" style="float: right;">Esqueci minha senha =/</a>
        </div>

        <footer> <?php include_once "include/footer.php"; ?> </footer>
    </body>
</html>