<?php

    require_once("../model/Usuario.class.php");
    require_once("../util/ConectaPDO.php");

class ProdutoDAO {
    //put your code here
    function __construct() {
        
    }
    
    public function cadastra($produto){
        try{
            $conectaPDO = new ConectaPDO();
            
            $conexao = $conectaPDO->abreConexao();
            
            $sql = $conexao->prepare("INSERT INTO produto (nome, descricao, peso, preco, quantidade, sabor_id, imagem_id) 
                    VALUES (:nome, :descricao, :peso, :preco, :quantidade, :sabor_id, :imagem_id)");
            
            $sql->bindValue(":nome", $produto->getNome());
            $sql->bindValue(":descricao", $produto->getDescricao());
            $sql->bindValue(":peso", $produto->getPeso());
            $sql->bindValue(":preco", $produto->getPreco());
            $sql->bindValue(":quantidade", $produto->getQuantidade());
            $sql->bindValue(":sabor_id", 2);
            $sql->bindValue(":imagem_id", 2);
            
            $sql->execute();
            
            $conectaPDO->fechaConexao();
            
            header("Location: ../view/listaProdutos.php");
            
        } catch (Exception $ex) {
            echo "Falha no cadastro (DAO)".$ex;
            exit;
        }
    }
    
    public function listar(){
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();

        $sql = $conexao->prepare("SELECT * FROM produto WHERE ativo = '1' ORDER BY nome");
        $sql->execute();
        $conectaPDO->fechaConexao();

        $produtos = $sql->fetchAll();
        return $produtos;
    }
    
    public function buscar($id){
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();
        
        $sql = $conexao->prepare("SELECT * FROM produto WHERE ativo = '1' AND id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $conectaPDO->fechaConexao();

        $produto = $sql->fetch();
        return $produto;
    }
    
    public function alterar($produto){
        $conectaPDO = new ConectaPDO();
        $conexao = $conectaPDO->abreConexao();
        
        $sql = $conexao->prepare("UPDATE produto "
                . "SET nome = :nome, descricao = :descricao, peso = :peso, preco = :preco, quantidade = :quantidade "
                . "WHERE ativo = '1' AND id = :id");
        $sql->bindValue(":nome", $produto->getNome());
        $sql->bindValue(":descricao", $produto->getDescricao());
        $sql->bindValue(":peso", $produto->getPeso());
        $sql->bindValue(":preco", $produto->getPreco());
        $sql->bindValue(":quantidade", $produto->getQuantidade());
        $sql->bindValue(":id", $produto->getId());
        $sql->execute();
        $conectaPDO->fechaConexao();

        header('Location: ../view/listaProdutos.php');
    }
    
    public function desativar($id){
        try{
            $conectaPDO = new ConectaPDO();
            $conexao = $conectaPDO->abreConexao();
            $sql = $conexao->prepare("UPDATE produto "
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
}
