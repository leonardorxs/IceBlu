<?php
    session_save_path();
    
    if (!isset($_SESSION['usuarioId'])) {
        echo "Você não tem permissão para acessar essa página";
        exit();
    } elseif ($_SESSION['usuarioNivel'] == 2 OR $_SESSION['usuarioNivel'] == 3) {

    } else {
        echo "Você não tem permissão para acessar essa página";
        exit();
    }
?>