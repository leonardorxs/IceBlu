<?php
include_once "../model/Endereco.class.php";
include_once "../model/Usuario.class.php";
include_once "../model/UsuarioDAO.class.php";

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

        case "Logar":
            logar();
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
}elseif(isset($_GET["acao"])){
    $acao = $_GET["acao"];
}else{}

function cadastrar() {
    $endereco = new Endereco();
    $endereco->setCep($_POST["txtCep"]);
    $endereco->setNumero($_POST["txtNumero"]);
    $endereco->setLogradouro($_POST["txtLogradouro"]);
    $endereco->setComplemento($_POST["txtComplemento"]);
    $endereco->setBairro($_POST["txtBairro"]);
    $endereco->setCidade($_POST["txtCidade"]);
    $endereco->setUf($_POST["txtUf"]);
    
    $usuario = new Usuario($endereco);
    
    $usuario->setLogin($_POST["txtLogin"]);
    $usuario->setSenha(md5($_POST["txtSenha"]));
    $usuario->setNome($_POST["txtNome"]);
    $usuario->setSobrenome($_POST["txtSobrenome"]);
    $usuario->setSexo($_POST["rbSexo"]);
    $usuario->setCpf($_POST["txtCpf"]);
    $usuario->setDataNasc($_POST["txtDataNasc"]);
    $usuario->setEmail($_POST["txtEmail"]);
    $usuario->setTelefone($_POST["txtTelefone"]);
    $usuario->setCelular($_POST["txtCelular"]);
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->cadastrar1($usuario);
}

function listarUsuarios($usuarioNivel){
    $usuarioDAO = new UsuarioDAO();
    return $usuarioDAO->listar($usuarioNivel);
}


function logar() {
    try{
    if (!empty($_POST) AND ( empty($_POST['txtUsuario']) OR empty($_POST['txtSenha']))) {
        echo "Usuário ou senha inválidos!";
        exit;
    }
    $endereco = new Endereco();
    $usuario = new Usuario($endereco);
    $usuario->setLogin($_POST["txtUsuario"]);
    $usuario->setSenha(md5($_POST["txtSenha"]));
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->logar($usuario);
    }catch(Exception $e){
        echo "Falha no logar (Controller)".$e;
        exit;
    }
}
function buscarId($id){
    try{
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->buscar($id);
    } catch (Exception $ex) {
        echo "Falha na visualização(Controller)".$ex;
    }
}

function desativar($id){
    try{
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->desativar($id);
    } catch (Exception $ex) {
        echo "Falha no desativar(Controller)".$ex;
    }
}
?>