<?php

    include_once "../model/Sabor.class.php";
    include_once "../model/SaborDAO.class.php";

    $acao = "";
    if (isset($_POST["acao"])) {
        $acao = $_POST["acao"];
    } else {
        $acao = $_GET["acao"];
    }

    switch ($acao) {
    case "Cadastrar":
        cadastrar();
        break;

    case "Listar":
        listar();
        break;

    case "Logar":
        logar();
        break;

    case "Alterar":
        alterar();
        break;

    default:
        echo "Opção não encontrada!";
        break;
    }

    function cadastrar() {
        $sabor = new Sabor();
        $sabor->setNome($_POST["txtNome"]);
        $sabor->setDescricao($_POST["txtDescricao"]);
        $sabor->setIngredientes($_POST["txtIngredientes"]);
        
        $saborDAO = new SaborDAO();
        $saborDAO->cadastra($sabor);
    }
