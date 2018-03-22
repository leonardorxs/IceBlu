<?php
    session_start();

    include_once '../controller/UsuarioController.class.php';

    if (!isset($_SESSION['usuarioNivel'])) {
        echo "Você não tem permissão para acessar essa página";
        exit();
    } elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {
        
    }
    else{
        echo "Você não tem permissão para acessar essa página";
        exit();
    }
    
    $usuarios = listarUsuarios($_SESSION['usuarioNivel']);
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css">
        <meta charset="UTF-8">
        <meta name="description" content="Sorveteria Ice Blu">
        <meta name="keywords" content="Sorveteria Ice Blu">
        <meta name="author" content="Leonardo Rodrigues">
        <meta http-equiv="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body>
        <nav>
            <?php include_once "../view/include/header.php"; ?>
        </nav>
        <table class="tabela">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cpf</td>
                <td>Data de Nascimento</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>Celular</td>
                <td>Nivel</td>
            </tr>

            <?php foreach ($usuarios as $user) {
                
             ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nome'] . " " . $user['sobrenome'] ?></td>
                    <td><?= $user['sexo'] ?></td>
                    <td><?= $user['cpf'] ?></td>
                    <td><?= $user['dataNasc'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['telefone'] ?></td>
                    <td><?= $user['celular'] ?></td>
                    <td><?= $user['nivel'] ?></td>
                    <td><a class="button" href="alterarUsuario.php?id='<?= $user['id'] ?>' " >Alterar</a></td>
                </tr>
            <?php } ?>

        </table>
        <footer>
            <?php include_once "../view/include/footer.php"; ?>
        </footer>

    </body>
</html>
