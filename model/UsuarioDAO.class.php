<?php

require_once("../model/Usuario.class.php");
require_once("../util/ConectaPDO.php");

class UsuarioDAO {

    function __construct() {
        
    }
    public function cadastrar1($usuario){
        try{
            $conectaPDO = new ConectaPDO();
            $conexao = $conectaPDO->abreConexao();
            
            $sql = $conexao->prepare("INSERT INTO endereco(cep, numero, complemento, logradouro, bairro, cidade, uf)
                                      VALUES (:cep, :numero, :complemento, :logradouro, :bairro, :cidade, :uf)");
            
            $sql->bindValue(':cep', $usuario->getEndereco()->getCep());
            $sql->bindValue(':numero', $usuario->getEndereco()->getNumero());
            $sql->bindValue(':complemento', $usuario->getEndereco()->getComplemento());
            $sql->bindValue(':logradouro', $usuario->getEndereco()->getLogradouro());
            $sql->bindValue(':bairro', $usuario->getEndereco()->getBairro());
            $sql->bindValue(':cidade', $usuario->getEndereco()->getCidade());
            $sql->bindValue(':uf', $usuario->getEndereco()->getUf());
            
            $sql->execute();
            $usuario->getEndereco()->setId($conexao->lastInsertId());
            
            $this->cadastrar2($usuario);
            
        } catch (Exception $ex) {
            echo "Erro no cadastro1 (DAO)".$ex;
        }
    }
    public function cadastrar2($usuario) {
        try {
            $conectaPDO = new ConectaPDO();
            $conexao = $conectaPDO->abreConexao();

            $sql = $conexao->prepare("INSERT INTO usuario(login, senha, nome, 
                                      sobrenome, sexo, cpf, dataNasc, email, telefone, celular, endereco_id)
                                      VALUES (:login, :senha, :nome, :sobrenome,
                                      :sexo, :cpf, :dataNasc, :email, :telefone, :celular, :endereco_id)");
            $sql->bindValue(':login', $usuario->getLogin());
            $sql->bindValue(':senha', $usuario->getSenha());
            $sql->bindValue(':nome', $usuario->getNome());
            $sql->bindValue(':sobrenome', $usuario->getSobrenome());
            $sql->bindValue(':sexo', $usuario->getSexo());
            $sql->bindValue(':cpf', $usuario->getCpf());
            $sql->bindValue(':dataNasc', $usuario->getDataNasc());
            $sql->bindValue(':email', $usuario->getEmail());
            $sql->bindValue(':telefone', $usuario->getTelefone());
            $sql->bindValue(':celular', $usuario->getCelular());
            $sql->bindValue(':endereco_id', $usuario->getEndereco()->getId());

            $sql->execute();

            $conectaPDO->fechaConexao();

            header("Location: ../view/login.php");
        } catch (Exception $e) {
            echo "Erro no Cadastro (DAO)" . $e;
        }
    }

    public function listar($usuarioNivel) {
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();

        $sql = $conexao->prepare("SELECT * FROM usuario "
                . "WHERE ativo = '1' AND nivel < :nivel "
                . "ORDER BY nivel ,nome, sobrenome");
        $sql->bindValue(':nivel', $usuarioNivel);
        $sql->execute();
        $conectaPDO->fechaConexao();

        $usuarios = $sql->fetchAll();
        return $usuarios;
    }

    public function logar($usuario) {
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();

        $sql = $conexao->prepare("SELECT id, nome, nivel "
                . "FROM usuario "
                . "WHERE login = :login AND senha = :senha AND ativo = '1'");
        $sql->bindValue(':login', $usuario->getLogin());
        $sql->bindValue(':senha', $usuario->getSenha());

        $sql->execute();

        $users = $sql->fetchAll(PDO::FETCH_ASSOC);

        $conectaPDO->fechaConexao();
        if (count($users) <= 0) {
            echo "Usuário ou senha incorretos";

            exit;
        }

        $user = $users[0];

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['usuarioLogado'] = true;
        $_SESSION['usuarioId'] = $user['id'];
        $_SESSION['usuarioNome'] = $user['nome'];
        $_SESSION['usuarioNivel'] = $user['nivel'];

        header('Location: ../index.php');
    }

    public function visualizarPerfil($id) {
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();

        $sql = $conexao->prepare("SELECT id, nome, sobrenome, sexo, dataNasc, email, telefone, celular, nivel 
                                FROM usuario
                                WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        $users = $sql->fetchAll(PDO::FETCH_ASSOC);

        $conectaPDO->fechaConexao();
        if (count($users) <= 0) {
            echo "Usuário ou senha incorretos";

            exit;
        }
    }
    
    public function buscar($id){
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();
        
        $sql = $conexao->prepare("SELECT * FROM usuario "
                . "INNER JOIN endereco ON usuario.endereco_id = endereco.id "
                . "WHERE ativo = '1' AND usuario.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $conectaPDO->fechaConexao();

        $usuario = $sql->fetch();
        return $usuario;
        
  
    }
    
    public function desativar($id){
        try{
            $conectaPDO = new ConectaPDO();
            $conexao = $conectaPDO->abreConexao();
            $sql = $conexao->prepare("UPDATE usuario "
                    . "SET ativo = '0' "
                    . "WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            $conectaPDO->fechaConexao();
            
        header('Location: ../view/listaProdutos.php');
            
            
        }catch(Exception $e){
            echo "Erro no desativar (DAO)".$e;
            exit;
        }
        
    }
    
    public function alterar($usuario){
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();
        
        $sql = $conexao->prepare("UPDATE usuario "
                . "SET nome = :nome, sobrenome = :sobrenome, sexo = :sexo, cpf = :cpf, dataNasc = :dataNasc, email = :email, telefone = :telefone, celular = :celular "
                . "WHERE ativo = '1' AND id = :id");
        $sql->bindValue(":nome", $produto->getNome());
        $sql->bindValue(":sobrenome", $produto->getDescricao());
        $sql->bindValue(":sexo", $produto->getPeso());
        $sql->bindValue(":cpf", $produto->getPreco());
        $sql->bindValue(":dataNasc", $produto->getQuantidade());
        $sql->bindValue(":email", $produto->getQuantidade());
        $sql->bindValue(":telefone", $produto->getQuantidade());
        $sql->bindValue(":celular", $produto->getQuantidade());
        $sql->bindValue(":id", $produto->getId());
        $sql->execute();
        $conectaPDO->fechaConexao();

        header('Location: ../view/listaProdutos.php');
    }

}
