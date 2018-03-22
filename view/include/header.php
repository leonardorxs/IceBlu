<ul>
    <li><a id="inicio" href="../../ ">Ice Blu</a></li>
    <li><a id="produtos" href="../view/listaProdutos.php">PRODUTOS</a></li>
    <?php
        if(!isset($_SESSION['usuarioNivel'])){
        }elseif($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3){
            echo '<li><a id="usuarios" href="../view/listaUsuarios.php">USUARIOS</a></li>';
        }
    ?>
    <li><a id="sobre" href="../view/sobre.php">SOBRE</a></li>

    <?php
        if (!isset($_SESSION['usuarioNivel'])) {
            echo '<li style="float: right;"><a id="login" href="../view/login.php">LOGIN</a></li>';
            echo '<li style="float: right;"><a id="cadastro" href="../view/cadastroUsuario.php">CADASTRE-SE</a></li>';
        } elseif ($_SESSION['usuarioNivel'] == 1 OR $_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {
            echo '<li style="float: right;"><a id="perfil" href="#">PERFIL</a></li>';
            echo '<li style="float: right;"><a id="sair" href="../controller/logout.php">SAIR</a></li>';
        }
    ?>
    
</ul>