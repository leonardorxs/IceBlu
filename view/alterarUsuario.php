<?php
    session_start();
    
    include_once '../controller/UsuarioController.class.php';
    
    if (!isset($_SESSION['usuarioNivel']) OR $_SESSION['usuarioNivel'] == 1){
        echo "Você não tem permissão para acessar essa página";
        exit();
    }elseif ($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $user = buscarId($id);
    }

    echo $user['usuario.id'];
    exit;
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
            <h1>Alterar Usuario </h1>
            
                <form action="../controller/UsuarioController.class.php" method="POST">
                    <div class="formColumn">
                        <input type="hidden" name="txtId" value=" <?= $user['id']?> " />
                        Nome <br> <input type="text" name="txtNome" value=" <?= $user['nome'] ?>"><br>
                        Sobrenome <br> <input type="text" name="txtSobrenome" value=" <?= $user['sobrenome'] ?>"><br>
                        Sexo <br> 
                        <input type="radio" name="rbSexo" value="m" checked >Masculino
                        <input type="radio" name="rbSexo" value="f" > Feminino<br>
                    </div>
                    <div class="formColumn">
                        CPF <br><input type="text" name="txtCpf" value=" <?= $user['cpf'] ?>" ><br>
                        Data de Nascimento <br>
                        <input type="text" name="txtDataNasc" value=" <?= $user['dataNasc'] ?>" min="1930" max="2017" ><br>
                        Email <br><input type="email" name="txtEmail" value=" <?= $user['email'] ?>" ><br>
                        Telefone <br> <input class="telcel" type="text" name="txtTelefone" value=" <?= $user['telefone'] ?>" maxlength="8" ><br>
                        Celular <br> <input class="telcel" type="text" name="txtCelular" value=" <?= $user['celular'] ?>" maxlength="9" ><br>
                    </div>
                    <div class="formColumn">
                        CEP <br><input type="text" name="txtCep" value=" <?= $user['cep'] ?>" ><br>
                        Logradouro <br><input type="text" name="txtLogradouro" value=" <?= $user['logradouro'] ?>" ><br>
                        Número <br><input type="text" name="txtNumero" value=" <?= $user['numero'] ?>" ><br>
                        Complemento <br><input type="text" name="txtComplemento" value=" <?= $user['complemento'] ?>"><br>
                        Bairro <br><input type="text" name="txtBairro" value=" <?= $user['bairro'] ?>" ><br>
                        Cidade <br><input type="text" name="txtCidade" value=" <?= $user['cidade'] ?>" ><br>
                        Estado <br><input type="text" name="txtUf" value=" <?= $user['uf'] ?>" ><br>       
                    </div>
                        <input style="display: block; float:right" type="submit" name="acao" value="Alterar">
                        <input style="float: left;" type="submit" name="acao" value="Desativar">

                </form>
        </div>
        
        <!--footer-->
        <footer> <?php include_once 'include/footer.php'; ?> </footer>
    
    </body>
</html>