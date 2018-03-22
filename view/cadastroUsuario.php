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
        <title>Cadastro - Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../util/css/general.css">
        <style>
            nav ul li a#cadastro{
                background-color:#daebef;
            }
            .dadosCadastrais{
                margin: auto;
                max-width: 1000px;
            }
            .formColumn{
                float: left;
                width: 30%;
                margin-right: 3%;
            }
            .formColumn:last-of-type{
                margin-right: none;
            }
            footer{
                margin-top: 20px;
                position: relative;
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
        <nav> <?php include_once "include/header.php"; ?> </nav>

        <!--form_cadastro-->
        <div class="corpo">
            <div class="dadosCadastrais">
                <h1>Cadastro de Usuário</h1><br>
                <form action="../controller/UsuarioController.class.php" method="POST">
                    <div class="formColumn">
                        Usuario <br> <input type="text" name="txtLogin" placeholder="Usuario" autofocus><br>
                        Senha <br> <input type="password" name="txtSenha" placeholder="Senha"><br>
                        Nome <br> <input type="text" name="txtNome" placeholder="Ex.: John"><br>
                        Sobrenome <br> <input type="text" name="txtSobrenome" placeholder="Ex.: Doe"><br>
                        Sexo <br> 
                        <input type="radio" name="rbSexo" value="m" checked >Masculino
                        <input type="radio" name="rbSexo" value="f" > Feminino<br>
                    </div>
                    <div class="formColumn">
                        CPF <br><input type="text" name="txtCpf" placeholder="Ex.: 000.000.000-00" ><br>
                        Data de Nascimento <br>
                        <input type="text" name="txtDataNasc" placeholder="aaaa" min="1930" max="2017" ><br>
                        Email <br><input type="email" name="txtEmail" placeholder="Ex.: exemplo@email.com" ><br>
                        Telefone <br> <input class="telcel" type="text" name="txtTelefone" placeholder="0000-0000" maxlength="8" ><br>
                        Celular <br> <input class="telcel" type="text" name="txtCelular" placeholder="0 0000-0000" maxlength="9" ><br>
                    </div>
                    <div class="formColumn">
                        CEP <br><input type="text" name="txtCep" placeholder="00000-000" ><br>
                        Logradouro <br><input type="text" name="txtLogradouro" placeholder="Rua Nome da Rua" ><br>
                        Número <br><input type="text" name="txtNumero" placeholder="000" ><br>
                        Complemento <br><input type="text" name="txtComplemento"><br>
                        Bairro <br><input type="text" name="txtBairro" placeholder="Bairro" ><br>
                        Cidade <br><input type="text" name="txtCidade" placeholder="Cidade" ><br>
                        Estado <br><input type="text" name="txtUf" placeholder="UF" ><br>       
                    </div>
                    <input style="display: block;" type="submit" name="acao" value="Cadastrar">

                </form>
            </div>
        </div>
        
        <!-- footer -->
        <footer> <?php include_once "include/footer.php"; ?> </footer>
        
    </body>
</html>