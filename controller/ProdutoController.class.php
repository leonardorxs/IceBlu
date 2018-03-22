<?php

include_once "../model/Produto.class.php";
include_once "../model/ProdutoDAO.class.php";

$acao = "";
if (isset($_POST["acao"])) {
    $acao = $_POST["acao"];

switch ($acao) {
    case "Cadastrar":
        cadastrar();
        break;

    case "Listar":
        listar();
        break;

    case "Alterar":
        alterar();
        break;
    
    case "Desativar":
        desativar($_POST['txtId']);
        break;
    
    default:
        echo "Opção não encontrada!";
        break;
}
} elseif(isset($_GET["acao"])){
    $acao = $_GET["acao"];
}



function cadastrar() {
    try {
        $produto = new Produto();
        $produto->setNome($_POST["txtNome"]);
        $produto->setDescricao($_POST["txtDescricao"]);
        $produto->setPreco($_POST["txtPreco"]);
        $produto->setPeso($_POST["txtPeso"]);
        $produto->setQuantidade($_POST["txtQuantidade"]);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->cadastra($produto);
    } catch (Exception $ex) {
        echo "Falha no cadastro(Controller)".$ex;
        exit;
    }
}

function buscarId($id){
    try{
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->buscar($id);
    } catch (Exception $ex) {
        echo "Falha na visualização(Controller)".$ex;
    }
}

function listarProdutos(){
    try{
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->listar();
        
    } catch (Exception $ex) {
        echo "Falha na listagem(Controller)".$ex;
    }
    
}

function alterar(){
    try {
        $produto = new Produto();
        $produto->setId($_POST["txtId"]);
        $produto->setNome($_POST["txtNome"]);
        $produto->setDescricao($_POST["txtDescricao"]);
        $produto->setPreco($_POST["txtPreco"]);
        $produto->setPeso($_POST["txtPeso"]);
        $produto->setQuantidade($_POST["txtQuantidade"]);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->alterar($produto);
    } catch (Exception $ex) {
        echo "Falha na alteração(Controller)".$ex;
        exit;
    }
}

function desativar($id){
    $produtoDAO = new ProdutoDAO();
    $produtoDAO->desativar($id);
}


?>